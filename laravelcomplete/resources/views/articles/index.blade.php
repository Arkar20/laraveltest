@extends('layouts/app')

@section('content')
        
    <div class="container">
            @if (session('info'))
            <div class="alert alert-warning">
                {{session('info') }}
            </div>       
                    
                @endif    

        @foreach($articles as $article)
            <div class="panel panel-success">
                <div class="panel-heading">
           <a href="  {{url("/articles/detail/$article->id")}}    ">
                    {{$article->title}}
               </a>
                         
                  
                </div>
                <div class="panel-body">
                    {{ $article->body }}
                </div>
                <div class="panel-footer">
                    <p>Category : {{$article -> category -> name}}</p>
                    {{ $article->created_at->diffForHumans()}}
                    }
                     <div class="pull-right">Comments <span class="badge badge-success">{{count($article->comments)}}</span></div>
                </div>
            </div>

           
        @endforeach
          <div class="footer text-center">
                <!-- link nk pw chin -->
                    {{ $articles->links() }} 

            </div>


        <!-- diffforhumans = difference between last uploaded -->
    </div>
@endsection
