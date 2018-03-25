<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::all();
        return view('list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'title'     => 'required|string',
                'content'   => 'required|string'
            ],
            [
                'title.required'     => 'Please enter the title',
                'content.required'   => 'Please enter the content'
            ]
        );

        if($validate->fails()){
            return redirect()
                ->back()
                ->withErrors($validate);
        };

        Blog::create($request->all());

        return redirect()
		    		->route('blog.index')
		    		->with(['status' => 'success', 'message' => 'Post was saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $post = $blog;
        return view('editform',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validate = Validator::make($request->all(),
            [
                'title'     => 'required|string',
                'content'   => 'required|string'
            ],
            [
                'title.required'     => 'Please enter the title',
                'content.required'   => 'Please enter the content'
            ]
        );

        if($validate->fails()){
            return redirect()
                ->back()
                ->withErrors($validate);
        };

        Blog::where(['id' => $blog->id])
        ->update($request->only(['title','content']));

        return redirect()
            ->route('blog.index')
            ->with(['status' => 'success', 'message' => 'Post was saved successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
