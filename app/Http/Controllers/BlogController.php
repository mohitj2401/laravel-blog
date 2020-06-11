<?php

namespace App\Http\Controllers;
use App\User;
use App\Blog;
use File;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=auth()->user()->blog->sortByDesc('created_at')->take(10);
        // dd($posts);
        // {{ $calls->created_at->diffForHumans() }}
        return view('index',['posts'=>$posts]);
    }

    public function about()
    {
       
        return view('about');
    }

    public function create()
    {
       
        return view('createpost');
    }

    public function store(Request $request)
    {
        
            // dd($user);
            $request->validate([
                'title' => 'required|min:10|max:255',
                'content' => 'required|min:50',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            // dd($user->image);
            

            $slug = Str::of($request->title)->slug('-');
            $slug=$slug.rand(1,999);
            for($i=0;Blog::where('slug',$slug)->count()>0;$i++){
                $slug=$slug.rand(10,100);

            }
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $blog=new Blog;
            $blog->image=$imageName;
            $blog->slug=$slug;
            $blog->title=$request->title;
            $blog->content=$request->content;
            $blog->user_id=auth()->user()->id;
            $blog->save();
           

            

        
        return redirect('/blog');

    }
    public function edit($slug)
    {
        $post=Blog::where('slug',$slug)->first();
        return view('editpost',['post'=>$post]);
    }


    public function update(Request $request,$slug)
    {
        $blog=Blog::where('slug',$slug);
       if($request->has('image')){
            // dd($user);
            $request->validate([
                'title' => 'required|min:10|max:255',
                'content' => 'required|min:50',
            ]);

            File::delete('images/'.$blog->image);
            // dd($user->image);
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            
            $blog->update(['title'=>$request->title,'content'=>$request->content,'image'=>$imageName]);

        }else{
            // dd($blog);
            $request->validate([
                'title' => 'required|min:10|max:255',
                'content' => 'required|min:50',
            ]);

            $blog->update(['title'=>$request->title,'content'=>$request->content]);
        }
        return redirect('/blog');
        
    }


    public function delete($slug)
    {
        Blog::where('slug', $slug)->delete();
        return redirect('blog');
    }

    public function blogpost($slug)
    {
        $post=Blog::where('slug',$slug)->first();

        return view('blog-post',['post'=>$post]);
        
    }

    public function bloglist()
    {

        $posts=auth()->user()->blog->sortByDesc('created_at');
        // dd($posts);
        // {{ $calls->created_at->diffForHumans() }}
        return view('index',['posts'=>$posts]);
        return view('blog-list');
        
    }

    public function aboutedit()
    {
        return view('aboutedit');
    }

    public function aboutupdate(Request $request,User $user)
    {   
        // dd($request->all());

        
        if($request->has('image')){
            // dd($user);
            $request->validate([
                'name' => 'required|min:3|max:255',
                'about' => 'required|min:10|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            File::delete('images/'.$user->image);
            // dd($user->image);
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            
            $user->update(['name'=>$request->name,'about'=>$request->about,'image'=>$imageName]);

        }else{
            // dd($user);
            $request->validate([
                'name' => 'required|min:3|max:255',
                'about' => 'required|min:10|max:255',
            ]);
            $user->update(['name'=>$request->name,'about'=>$request->about]);
        }
        return redirect('/blog');
        
    }

}
