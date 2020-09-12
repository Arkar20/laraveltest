<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function delete($id)
	{
			$comment=Comment::find($id);
			$comment->delete();

            return back()->with('info',"A Comment Has Deleted!");

	}

	public function create()	
	{
		$comment = new Comment;
		  $comment->article_id = request() -> article_id; 
             $comment->comment = request() -> comment;
             $comment->save() ;
		
		return back();
	}

}
