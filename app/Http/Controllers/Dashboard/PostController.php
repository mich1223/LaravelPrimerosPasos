<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return route("poste.create");
       // return redirect ("/post/create");
        //return redirect()-> route("post.create");
        //return to_route("post.create");


        $posts=Post::paginate(2);
        echo view('dashboard.post.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('id','title');
        //dd($categories);
        $post = New Post();
        //dd($post);
        echo view('dashboard.post.create', compact('categories', 'post') );
        //return to_route("post.index")->with('status', "Registro Creado :)!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
       
        //$validated=$request ->validate(StoreRequest::myRules());
        //$validated = Validator::make($request->all(), StoreRequest::myRules());
        //dd($validated->fails());
        //dd($validated->errors());
        //$data=array_merge($request->all(), ['image'=> '']);
        // dd($data);
        //$data=$request->validated();
        //$data['slug']=Str::slug($data['title']);
        //dd($data);
        //  Post::create($data);
        Post::create($request->validated());
        return to_route("post.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::pluck('id','title');
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
       
        //dd($request->validated());

        $data=$request->validated();
        if(isset($request->validated()['image']) ){
            
            
            $data["image"]=$filename= time().".".$data["image"]->extension();
            //dd($filename);
            $request->image->move(public_path("image"), $filename);
           
        }
        $post->update($data);
        //$request->session()->flash('status', "Registro actualizado :)!");
        //$request->validated()["image"]->move(public_path("image",$filename));
        return to_route("post.index")->with('status', "Registro actualizado :)!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //echo "destroy";
        $post->delete();
        //return to_route("post,index");
        return to_route("post.index")->with('status', "Registro eliminado :)!");

    }
}
