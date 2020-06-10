<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->get('tag')) {

            $articles = Blog::where('tag_id', $request->get('tag'))->get();
        } else {
            $articles = Blog::all();
        }
        $tags = BlogTag::all();
        return view('blogs.index', compact('articles', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            if (!auth()->user()->is_admin) {
                return back();
            }
            $tags = BlogTag::all();
            return view('blogs.create', compact('tags'));
        }
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return back();
        }
        $data = request()->validate(
            [
                'name' => 'required|string|max:190',
                'description' => 'required|string',
                'main_photo' => 'required|image',
                'tag_id' => 'required|exists:blog_tags,id',
            ]);

        $data['main_photo'] = $request->file('main_photo')->store('public');

        Blog::create($data);
        toast('Articulo agregado!', 'success', 'top-right');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Blog::find($id);

        return view('blogs.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            if (!auth()->user()->is_admin) {
                return back();
            }
            $article = Blog::find($id);
            $tags = BlogTag::all();

            return view('blogs.edit', compact('article', 'tags'));
        }
        return redirect()->route('login');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_admin) {
            return back();
        }
        $data = request()->validate(
            [
                'name' => 'required|string|max:190',
                'description' => 'required|string',
                'main_photo' => 'nullable|image',
                'tag_id' => 'required|exists:blog_tags,id',

            ]);
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = $request->file('main_photo')->store('public');

        }
        $article = Blog::find($id);
        $article->update($data);
        alert()->success('Modificado correctamente');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->is_admin) {
            return back();
        }
        $article = Blog::find($id);
        $article->delete();
        alert()->error('Elimiando correctamente');

        return redirect()->route('blog.index');

    }
}
