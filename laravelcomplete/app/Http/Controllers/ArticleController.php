<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','detail']);
    }
    public function index()
    {
        // $data = Article::all(); all ko htoke py
        $data=Article::orderBy('id','desc')->paginate(5);

        return view('articles/index', [
            'articles' => $data
        ]);
    }

    public function detail($id)
    {
      $data=Article::find($id); //finding the required id
        return view('articles/detail',
            [
                    'article'=> $data
            ]);
    }
    public function add()
    

    {
        $data=Category::all();
return view('articles/add',['categories'=> $data]);
    }
    public function create()
    {
            $validator=validator(request()->all(),
                    [
                        "title" => "required",
                        "body"=>"required",
                        "category_id"=>"required",

                    ]
        );
            if ($validator->fails()) 
            {
                    return back()->withErrors($validator);
            }



        $article = new Article;

             $article->title = request()-> title; 
             $article->body = request()-> body; 
             $article->category_id = request()-> category_id; 
             // $_POST['title']

           
            $article->save();

            return redirect('/articles');


    }
    public function delete($id)
    {
        $article=Article::find($id);
        $article->delete();

         return redirect('/articles')->with('info','An article has deleted');


    }
}
