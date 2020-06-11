@extends('layouts.applayout')
@section('content')
{{--     
<section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">DevBlog - A Blog Template Made For Developers</h2>
			    <div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
			    <form class="signup-form form-inline justify-content-center pt-3">
                    <div class="form-group">
                        <label class="sr-only" for="semail">Your email</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
		    </div><!--//container-->
	    </section> --}}
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
				@if($posts->count()>0)
					@foreach ($posts as $post)
						
					
					<div class="item mb-5">
						<div class="media">
							<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{asset('/images/'.$post->image)}}" alt="image">
							<div class="media-body">
								<h3 class="title mb-1"><a href="/blog/post/{{$post->slug}}">{{$post->title}}</a></h3>
								<div class="meta mb-1"><span class="date">{{$post->created_at->diffForHumans()}}</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
								<div class="intro">{{Str::limit($post->content,200)}}</div>
								<a class="more-link" href="/blog/post/{{$post->slug}}">Read more &rarr;</a>
							</div><!--//media-body-->
						</div><!--//media-->
					</div><!--//item-->
					@endforeach
				@else
					<h1>U don't have any blog post at this time . plz add some by<a href="/blog/create"> click here</a></h1>
				@endif
		    </div>
	    </section>
@endsection    
	    