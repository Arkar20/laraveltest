@extends('layouts/app')

@section('content')
    <div class="container">
                
 @if (session('info'))
            <div class="alert alert-warning">
                {{session('info') }}
            </div>       
                    
                @endif 
       
            <div class="panel panel-info">
                <div class="panel-heading">
                    {{ $article->title }}
                </div>
                <div class="panel-body">
                    {{ $article->body }}
                </div>
                <div class="panel-footer">
                    {{ $article->created_at->diffForHumans()}}
                    <div class="pull-right">
                        <a href="{{ url("/articles/delete/$article->id")}}" class="text-danger">Delete</a>
                    </div>
                </div>
               
            </div>
                    <div class="contianer mr-5">
                        
                        <div class="h3">Comments {{count($article->comments)}}</div>
                <ul class="list-group">
                        @foreach ($article->comments as $comment)
                          <li class="list-group-item">
                            <a href="{{ url("comments/delete/$comment->id")}}" class="close">
                                &times;
                            </a>
                            {{ $comment->comment }}

                          </li>  
                        @endforeach
                    
                    
                </ul>
                    </div>
            
          <form action="{{ url("/comments/add") }}"  method="post">
            {{csrf_field()}} 
                <input type="hidden" name="article_id" value="{{$article->id}}">  
                <textarea name="comment"    class="form-control"></textarea>
                <br>
                <input type="submit" class="btn btn-info" value="Comment">


          </form>

        <!-- diffforhumans = difference between last uploaded -->
    </div>

@endsection
