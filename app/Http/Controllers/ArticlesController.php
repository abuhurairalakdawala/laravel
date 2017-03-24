<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = \App\Models\Article::paginate(5);
        // echo 'ok';
        foreach ($articles as $key => $article) {
            // if(count($article->comments) > 0){
            //     var_dump($article->comments());
            // } else {
            //     echo '<br>no relation';
            // }
            $comments = $article->comments;
            foreach ($comments as $key => $value) {
                var_dump($value->comment);
            }
            // var_dump($article->comments);
        }
        // return $articles;
        // ($object->comments());
        // $articles = $object::latest('id')->paginate(5);
        // return view('articles.index', [ 'articles' => $articles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new \App\Models\Article();
        $article->name = $request->name;
        $article->description = $request->description;
        $article->save();
        redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
