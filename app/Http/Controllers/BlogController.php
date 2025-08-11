<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->title;
        // $blogs = DB::table('blogs')->where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at', 'desc')->paginate(10);
        $user = Auth::user();
        $blogs = Blog::with(['tags', 'komentars'])->when($user->role !== 'admin', function ($query) use ($user) { 
            $query->where('user_id', $user->id);  
        })->where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at', 'desc')->paginate(10);
        return view('blog', ['blogss' => $blogs, 'title' => $title]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('/blogs/create', compact('tags'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // return $request->all();
        $request->validate([
            'title' => 'required|unique:blogs|max:20',
            'description' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:png,jpg|max:2048',
        ]);

        // Query builder
        // $data = DB::table('blogs')->insert([
        //     'title' => $request->title,
        //     'deskripsi' => $request->description,
        //     'status' => $request->status,
        //     'user_id' => fake()->numberBetween(401, 500),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // eloquent
        $user = Auth::user();

        if($request->file('image')) {
            $image = Storage::disk('public')->putFile('images', $request->file('image'));
        }
        // $id_min = User::pluck('id')->min();
        // $id_max = User::pluck('id')->max();
        $data = Blog::create([
            'title' => $request->title,
            'deskripsi' => $request->description,
            'status' => $request->status,
            'user_id' => $user->id,
            'image' => $image,
        ]);

        $data->tags()->attach($request->tags);

        if (!$data) {
            return redirect()->route('blog.index')->with('gagal', 'Blog gagal ditambahakan');
        }

        return redirect()->route('blog.index')->with('sukses', 'Blog berhasil ditambahkan.');
    }

    public function show($id)
    {
        // query builder
        // $blog = DB::table('blogs')->where('id', $id)->first();

        // eloquent orm
        $blog = Blog::findOrFail($id);
        // if(!$blog) {
        //     abort(404);
        // }
        return view('blogs/detail', ['blog' => $blog]);
    }

    public function edit($id)
    {
        // $blog = DB::table('blogs')->where('id', $id)->first();
        // if(!$blog) {
        //     abort(404);
        // }
        $tags = Tag::all();
        $blog = Blog::with('tags')->findOrFail($id);

        // if (! Gate::allows('update-post', $blog)) {
        //     // abort(403);
        //     return redirect()->route('blog.index')->with('gagal', 'Tidak bisa edit blog punya orang lain');
        // }

        return view('blogs/edit', ['blog' => $blog, 'tags' => $tags]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,'.$id.'|max:255',
            'description' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:png,jpg|max:2048',
        ]);

        // query builder
        // DB::table('blogs')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'deskripsi' => $request->description,
        //     'status' => $request->status,
        //     'user_id' => fake()->numberBetween(401, 500),
        //     'updated_at' => now()
        // ]);
        $user = Auth::user();
        // $id_min = User::pluck('id')->min();
        // $id_max = User::pluck('id')->max();
        $blog = Blog::findOrFail($id);

        // if ($request->user()->cannot('update', $blog)) {
        //     abort(403);
        // }

        Gate::authorize('update', $blog);

        if($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            } 

            $image = Storage::disk('public')->putFile('images', $request->file('image'));
        }

        $blog->update([
            'title' => $request->title,
            'deskripsi' => $request->description,
            'status' => $request->status,
            'user_id' => $user->id,
            'image' => $image,
        ]);

        $blog->tags()->sync($request->tags);

        return redirect()->route('blog.index')->with('sukses', 'Blog berhasil diupdate.');
    }

    public function delete(Request $request, $id)
    {
        // $blog = DB::table('blogs')->where('id', $id)->delete();
        // $blog = Blog::destroy($id);

        // if ($request->user()->cannot('delete', $blog))
        // Gate::authorize('update', $blog);

        $blog = Blog::findOrFail($id);
        $response = Gate::inspect('delete', $blog);

        if ($response->allowed()) {
            $blog->delete();

            return redirect()->route('blog.index')->with('sukses', 'Blog berhasil dihapus.');
        } else {
            abort(403, $response->message());
        }

        if(!$blog) {
            return redirect()->route('blog.index')->with('gagal', 'Blog gagal dihapus.');
        }

        
    }

    public function trash()
    {
        $blog = Blog::onlyTrashed()->get();
        return view('blogs.restore', ['blogs' => $blog]);
    }

    public function restore($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id)->restore();
        
        if(!$blog) {
            return redirect()->route('blog.index')->with('gagal', 'Datablog gagal di Restore!');
        }

        return redirect()->route('blog.index')->with('sukses', 'Data blog Restore Sukses.');
    }

    public function beranda()
    {
        $blogs = Blog::with('user')->where('status', 'Active')->orderBy('created_at', 'desc')->get();
        // return $blogs; untuk cek data
        return view('blogs.index', compact('blogs'));
    }

    public function detail($id)
    {
        $blog = Blog::with(['user', 'komentars', 'tags'])->findOrFail($id);
        // dd($blog); untuk cek data
        return view('blogs.show', compact('blog'));
    }
}
