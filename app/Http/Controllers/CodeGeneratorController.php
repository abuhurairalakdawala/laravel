<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeGeneratorController extends Controller
{
	public $tab = '    ',
           $no_of_items = 0,
           $dd_query = array(),
           $session_name =  '';
    public function __construct()
    {
        $this->session_name =  substr(md5(time()), 0, 6);
    }
    public function index()
    {
        $filter = array();
        if(session()->has('a53dd5')) {
            $filter = session('a53dd5');
        }
        $name_dd = \App\User::select('id','email')->get();
    	\App\Facades\Assets::setJs('code_generator.js');
    	return view('generate_code', [ 'name_dd' => $name_dd, 'filter' => $filter ]);
    }
    public function indexAction(Request $request)
    {
    	$this->validate($request, [
	        'header.*' => 'required'
	    ]);
	    $headers = $request->header;
	    $filter_type = $request->filter_type;
        $input_name = $request->input_name;
        $has_checkbox = $request->has_checkbox;
        $header_txt = $this->make_header($headers, $has_checkbox);
        $filter_txt = "$this->tab$this->tab<tr>";

        for($i=0;$i<$this->no_of_items;$i++){
	    	$iname = '?';
            $ivalue = array();
	    	if(isset($input_name[$i])){
	    		$iname = $input_name[$i];
	    	}
            if($filter_type['value'][$i]){
                $json = json_decode($filter_type['value'][$i],true);
                if($json){
                    $ivalue = $json;
                } else {
                    preg_match('~select\((.*?)\)~', $filter_type['value'][$i], $output);
                    if(!isset($output[1])){
                        echo '<div class="alert alert-danger" role="alert">Invalid Query '.$filter_type['value'][$i].'</div>';
                        exit();
                    }
                    $d_fields = explode(',', $output[1]);
                    $d_fields = array_map('trim',$d_fields);
                    if(!isset($d_fields[1])){
                        echo '<div class="alert alert-danger" role="alert">Invalid Fields '.$filter_type['value'][$i].' Atleast Two Required</div>';
                        exit();
                    }
                    $ft_val = str_replace($output[1], "'".implode("','", $d_fields)."'", $filter_type['value'][$i]);
                    $for_c[0] = '\''.$input_name[$i].'_dd\' => $'.$input_name[$i].'_dd, ';
                    $for_c[1] = '$'.$input_name[$i].'_dd = \App\\'.$ft_val.'->get();';
                    $this->dd_query[] = $for_c;
                    $ivalue = (object)$d_fields;
                }
            }
	    	$filter_txt .= "$this->tab$this->tab<br>$this->tab$this->tab$this->tab<td><br>$this->tab$this->tab$this->tab$this->tab".$this->page_filters($filter_type['type'][$i],$iname,$ivalue)."\n$this->tab$this->tab$this->tab</td>";
	    }
        $filter_txt .= "<br>$this->tab$this->tab</tr>";
        $return = '<pre>';
        $return .= '<h3 style="margin-top:0">Paste in your views</h3>'.
                e("<table class=\"table table-bordered\">\n$this->tab<thead>").
                    e(str_replace('<br>', "\n", $header_txt)).
                    e(str_replace('<br>', "\n", $filter_txt)).
                e("\n$this->tab</thead>\n$this->tab<tbody>\n$this->tab</tbody>\n</table>");
        $return .= '</pre>';
        $return .= $this->store_post_in_session($input_name,$filter_type['type']);
        if(!empty($this->dd_query)){
            $return .= '<pre><h3 style="margin-top:0;">Queries for dropdown</h3>';
            $return .= '<ul>';
            $v_arr = '';
            foreach ($this->dd_query as $query_item) {
                $return .= '<li>';
                $return .= '<b>Query : </b>'.$query_item[1];
                $v_arr .= $query_item[0];
                $return .= '</li>';
            }
            unset($query_item);
            $return .= '</ul>';
            $return .= '<br><h3>Pass Data To Views</h3>[ '.trim($v_arr,', ').' ]';
            $return .= '</pre>';
        }
        $return .= $this->get_session_data();
        return $return;
    }
    public function make_header($headers, $has_checkbox)
    {
        $header_txt = "\n$this->tab$this->tab<tr>\n";
        foreach ($headers as $key => $header) {
            ++$this->no_of_items;
            $header_txt .= "$this->tab$this->tab$this->tab<th>";
            if($has_checkbox){
                if($key == 0){
                    $header_txt .= '<input type="checkbox" class="checkbox_parent"> ';
                }
            }
            $header_txt .= "$header</th><br>";
	    }
	    unset($header);
	    $header_txt .= "$this->tab$this->tab</tr>\n";
	    return $header_txt;
    }
    public function page_filters($column,$name='?',$value=array())
    {
        switch ($column) {
            case '1':
                return '<input class="form-control" type="text" name="'.$name.'" value="@if(isset($filter[\''.$name.'\'])){{ $filter[\''.$name.'\'] }}@endif">';
                break;

            case '2':
                $return = '<select class="form-control" name="'.$name.'"><option value="">Select An Option</option>';
                if(is_array($value)){
                    foreach ($value as $key => $val) {
                        $return .= "\n$this->tab$this->tab$this->tab$this->tab$this->tab<option value=\"$val\">$key</option>";
                    }
                    unset($val);
                } else if(is_object($value)) {
                    $return .= "\n$this->tab$this->tab$this->tab$this->tab$this->tab";
                    $return .= '@foreach($'.$name.'_dd as $value)';
                    $return .= "\n$this->tab$this->tab$this->tab$this->tab$this->tab$this->tab";
                    $value = (array)$value;
                    $return .= '<option value="{{ $value->'.$value[0].' }}">{{ $value->'.$value[1].' }}</option>';
                    $return .= "\n$this->tab$this->tab$this->tab$this->tab$this->tab";
                    $return .= '@endforeach';
                }
                $return .= "\n$this->tab$this->tab$this->tab$this->tab</select>";
                return $return;
                break;
            case '3':
                return '<input class="form-control date-input" type="text" name="'.$name.'_from" value="@if(isset($filter[\''.$name.'_from\'])){{ $filter[\''.$name.'_from\'] }}@endif"><br>'.$this->tab.$this->tab.$this->tab.$this->tab.'<input class="form-control date-input" type="text" name="'.$name.'_to" value="@if(isset($filter[\''.$name.'_to\'])){{ $filter[\''.$name.'_to\'] }}@endif">';
                break;
        }
    }
    public function store_post_in_session($input,$column)
    {
        if(empty($input)){exit();}
        $return = '<pre>public function (Request $request){';
        $return .= "\n";
        $return .= $this->tab.'$data = [];';
        $return .= "\n";
        foreach ($input as $key => $value) {
            if (empty($value)) {
                continue;
            }
            if($column[$key] == 3){
                $return .= $this->tab.'if($request->'.$value.'_from){';
                $return .= "\n$this->tab$this->tab";
                $return .= '$data[\''.$value.'_from\'] = $request->'.$value.'_from;';
                $return .= "\n$this->tab}\n";
                $return .= $this->tab.'if($request->'.$value.'_to){';
                $return .= "\n$this->tab$this->tab";
                $return .= '$data[\''.$value.'_to\'] = $request->'.$value.'_to;';
                $return .= "\n$this->tab}\n";
            } else {
                $return .= $this->tab.'if($request->'.$value.'){';
                $return .= "\n$this->tab$this->tab";
                $return .= '$data[\''.$value.'\'] = $request->'.$value.';';
                $return .= "\n$this->tab}\n";
            }
        }
        unset($value);
        $return .= $this->tab.'session([ \''.$this->session_name.'\' => $data ]);';
        $return .= "\n";
        $return .= $this->tab.'return redirect()->back();';
        $return .= "\n}";
        $return .= '</pre>';
        return $return;
    }
    public function get_session_data()
    {
        $return = '<pre><h3 style="margin-top:0">Add To Your Controller</h3>$filter = array();';
        $return .= "\n";
        $return .= 'if(session()->has(\''.$this->session_name.'\')) {';
        $return .= "\n";
        $return .= $this->tab.'$filter = session(\''.$this->session_name.'\');';
        $return .= "\n";
        $return .= '}</pre>';
        $return .= '<pre><h3 style="margin-top:0">Pass Filters To Views</h3>[ \'filter\' => $filter ]</pre>';
        return $return;
    }
}
