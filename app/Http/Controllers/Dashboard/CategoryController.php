<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\PutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



use App\Http\Requests\category\StoreRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return route("poste.create");
       // return redirect ("/category/create");
        //return redirect()-> route("post.create");
        //return to_route("post.create");


        $categories=Category::paginate(2);
        echo view('dashboard.post.index', compact('categories'));
        
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
        $category = New Category();
        //dd($post);
        echo view('dashboard.category.create', compact('categories', 'category') );
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
        
        Category::create($request->validated());
        return to_route("category.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("dashboard.category.show", compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories=Category::pluck('id','title');
        echo view('dashboard.post.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Category $category)
    {
       
        //dd($request->validated());

        $data=$request->validated();
       
        $category->update($data);
        //$request->session()->flash('status', "Registro actualizado :)!");
        //$request->validated()["image"]->move(public_path("image",$filename));
        return to_route("category.index")->with('status', "Registro actualizado :)!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //echo "destroy";
        $category->delete();
        //return to_route("post,index");
        return to_route("category.index")->with('status', "Registro eliminado :)!");

    }
}
