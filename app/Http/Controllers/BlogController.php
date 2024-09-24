<?php

namespace App\Http\Controllers;

use id;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
         $messages = Blog::with('user')->orderBy('created_at', 'asc')->get();  

         return view('blog.index', compact('messages','admin'));
     
    }


    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'message' => 'required',
        ]);

        Blog::create([
            'message' => $request->message,
            'user_id'=>Auth::id(),
        ]);
        return redirect()->route('blogs.index');
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
            $blog=Blog::findOrFail($id);
            $blog->update($request->only('title','content'));

            return redirect()->route('blogs.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index');
    }

   
}
