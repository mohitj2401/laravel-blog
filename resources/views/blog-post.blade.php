@extends('layouts.applayout')	
@section('content')
    

	    <article class="blog-post px-3 py-5 p-md-5">
		    <div class="container">
			    <header class="blog-post-header">
				    <h2 class="title mb-2">{{$post->title}}</h2>
				    <div class="meta mb-3"><span class="date">Published {{$post->created_at->diffForHumans()}}</span><span class="time">5 min read</span><span class="comment"><a href="#">4 comments</a></span></div>
			    </header>
			    
			    <div class="blog-post-body">
				    <figure class="blog-banner">
				        <a href="https://made4dev.com"><img class="img-fluid" src="{{asset('/images/'.$post->image)}}" alt="image"></a>
					<figcaption class="mt-2 text-center image-caption">Image Credit:{{auth()->user()->name}}</figcaption>
				    </figure>
					<p>{{$post->content}}</p>
				    
				    				   
			    </div>
				    
			    <nav class="blog-nav nav nav-justified my-5">
				  <a class="nav-link-prev nav-item nav-link rounded-left" href="/blog/post/edit/{{$post->slug}}">Edit<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
				  <a class="nav-link-next nav-item nav-link rounded-right" href="/blog/post/delete/{{$post->slug}}">Delete<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
				</nav>
				
				
		    </div><!--//container-->
	    </article>
	    
	  
        @endsection	 