<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class ConsoleCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * p= 0 => Thead, 1 => filtertype, 2 => form_name, 3 => map_with_model_col
     */
    protected $signature = 'dummy {class} {function} {view} {p*} {--model=} {--checkbox=yes} {--filters=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create Dashboard ! Inspired By Artisan.";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return $this->exec();
    }
    
    public function exec()
    {
        $class = $this->argument('class');
        $function = $this->argument('function');
        $view = $this->argument('view');
        $params = $this->argument('p');
        $has_filters = $this->option('filters');
        $model = $this->option('model');
        $has_checkbox = $this->option('checkbox');
        $cPaths = explode('/', $class);
        $class_name = end($cPaths);
        array_pop($cPaths);
        $vPaths = explode('/', $view);
        $view_name = end($vPaths);
        array_pop($vPaths);
        $vPaths = implode("/", $vPaths);
        $class_path = 'app/Http/Controllers/'.$class.'.php';
        $view_path = 'resources/views/'.$view.'.blade.php';

        if(view()->exists($view))
        {
            $this->error('View already exist! : '.$view_path);
            exit();
        }
        $this->makeDir('v',$vPaths);
        if(!file_exists($class_path))
        {
            $cPaths = implode("/", $cPaths);
            $this->makeDir('c',$cPaths);
            $this->info('Creating Controller : '.$class_name);
            $this->createController($class_path,$cPaths,$class_name,$function,$view,$model,$params);
        }
        else
        {
            $this->info('Adding a function in controller : '.$class_name);
            $this->updateController($class_path,$function,$view,$model,$params);
        }

        $this->createView($view_path, $view_name, $params, $has_filters, $has_checkbox);
    }
    public function function_content($function,$view,$params,$model = '')
    {
        $content = "public function $function()\n    {\n        ";
        if(!empty($model)){
            $content .= 'if(session()->has(\''.$function.'Action\')){';
            $content .= "\n";
            $content .= '            $table = \App\\'.$model.'::';
            foreach ($params as $key => $item) {
                $col = explode(':', $item);
                if(isset($col[3])){
                    // $content .= 
                } else if(isset($col[2])){

                }
            }
            unset($item);
            $content .= "paginate(2);\n";
            $content .= '        } else {';
            $content .= "\n";
            $content .= '            $table = \App\\'.$model.'::paginate(2);';
            $content .= "\n";
            $content .= '        }';
        } else {
            $content .= '$table = []';
        }
        $content .= "\n        return view(\"$view\", array('table' => ";
        $content .= '$table';
        $content .= "));\n    }\n    public function $function"."Action(Request ";
        $content .= '$request';
        $content .= ")\n    {\n";
        $content .= '        $data = [];';
        $content .= "\n";
        foreach ($params as $item) {
            $col = explode(':', $item);
            if(isset($col[3])){
                $content .= '        if($request->'.$col[3].'){';
                $content .= "\n";
                $content .= '            $data[\''.$col[2].'\'] = $request->'.$col[3].';';
                $content .= "\n";
                $content .= '        }';
                $content .= "\n";
            } else if(isset($col[2])){
                $content .= '        if($request->'.$col[2].'){';
                $content .= "\n";
                $content .= '            $data[\''.$col[2].'\'] = $request->'.$col[2].';';
                $content .= "\n";
                $content .= '        }';
                $content .= "\n";
            }
        }
        unset($item);
        $content .= '        if(!empty($data)){';
        $content .= "\n";
        $content .= '            session([\''.$function.'Action\' => $data]);';
        $content .= "\n        }\n";
        $content .= '        return redirect(\'dash\');';
        $content .= "\n";
        $content .= "    }";
        return $content;
    }
    public function makeDir($what='c',$path)
    {
        if($what=='c'){
            if(!file_exists('app/Http/Controllers/'.$path))
            {
                $this->info('Creating Controller Directory : '.$path);
                mkdir('app/Http/Controllers/'.$path,0775,true);
            }
        }
        else if($what=='v')
        {
            if(!file_exists('resources/views/'.$path))
            {
                $this->info('Creating View Directory : '.$path);
                mkdir('resources/views/'.$path,0775,true);
            }
        }
    }
    public function createController($class_path,$cPaths,$class_name,$function,$view,$model,$params)
    {
        $file = fopen($class_path, "w");
        $content = "<?php\n\nnamespace App\Http\Controllers";
        if(!empty($cPaths)){
            $content .= "\\".str_replace('/', '\\', $cPaths);
        }
        $content .= ";\n\nuse Illuminate\Http\Request;\nuse App\Http\Controllers\Controller;\n\nclass $class_name extends Controller\n{\n    ".$this->function_content($function,$view,$params,$model)."\n}";
        fwrite($file, $content);
        fclose($file);
    }
    public function updateController($class_path,$function,$view,$model,$params)
    {
        $file = fopen($class_path, "r+");
        $info = file($class_path);
        $max_line = count($info)-1;
        $inc = 0;
        $before = "";
        while ($line = fgets($file)) {
            if($inc == $max_line-1){
                fwrite($file, "    ".$this->function_content($function,$view,$params,$model)."\n}");
            } else {
                $before += $line;
            }
            ++$inc;
        }
        fclose($file);
    }
    public function createView($view_path, $view_name, array $columns=array(), $has_filters='1', $has_checkbox = 'yes')
    {
        $this->info('Creating View : '.$view_path);
        $file = fopen($view_path, "w");
        $content = "@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-xs-12\">";
        if($has_filters == '1'){
            $content .= "\n            <form method=\"post\" action=\"/$view_name";
            $content .= "Action\">\n";
            $content .= '            <button class="btn">Submit</button>{{ csrf_field() }}';
            $content .= "\n";
        }
        $content .= "            <table class=\"table table-bordered\">
                <thead>
                    <tr>";
                    if($has_filters == '1'){
                        foreach ($columns as $key => $column) {
                            $col = explode(':', $column);
                            $content .= "\n                        <th>";
                            if($has_checkbox=='yes'){
                                if ($key==0) {
                                    $content .= '<input type="checkbox" class="checkbox_parent"> ';
                                }
                            }
                            $content .= "$col[0]";
                            if(isset($col[1]))
                            {
                                if(isset($col[2])){
                                    $input_name = $col[2];
                                } else {
                                    $input_name = strtolower(str_replace(' ', '_', $col[0]));
                                }
                                $content .= $this->page_filters($col[1],$input_name);
                            }
                            $content .= "</th>";
                        }
                        unset($column);
                    } else {
                        foreach ($columns as $key => $column) {
                            $content .= "\n                        <th>$column";
                            $content .= "</th>";
                        }
                        unset($column);
                    }
        $content .= "\n                    </tr>
                </thead>
                <tbody>\n";
        $content .= '                    @foreach($table as $row)';
        $content .= "\n                        <tr>\n";
        foreach ($columns as $key => $column) {
            $col = explode(':', $column);
            $content .= '                            <td>';
            if($has_checkbox=='yes'){
                if($key==0){
                    $content .= '<input type="checkbox" name="id[]" value="';
                    if(isset($col[3])){
                        $content .= '{{ $row->'.$col[3].' }}';
                    } else if(isset($col[2])){
                        $content .= '{{ $row->'.$col[2].' }}';
                    }
                    $content .= '"> ';
                }
            }
            if(isset($col[3])){
                $content .= '{{ $row->'.$col[3].' }}';
            } else if(isset($col[2])){
                $content .= '{{ $row->'.$col[2].' }}';
            }
            $content .= '</td>';
            $content .= "\n";
        }
        unset($column);
        $content .= "                        </tr>\n";
        $content .= '                    @endforeach';
        $content .= "\n                </tbody>
            </table>\n";
        if($has_filters == '1'){
            $content .= "            </form>\n";
        }
        $content .= '            {{ $table->links() }}';
        $content .= "\n        </div>
    </div>
</div>

@endsection";
        fwrite($file, $content);
        fclose($file);
    }
    public function page_filters($column,$name)
    {
        switch ($column) {
            case 'i':
                return '<input class="form-control" type="text" name="'.$name.'">';
                break;

            case 'd';
                return '<select class="form-control" name="'.$name.'"><option></option></select>';
                break;
        }
    }
}
