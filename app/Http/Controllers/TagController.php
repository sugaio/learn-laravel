<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('blogs')->get();
        // dd ($tags);
        return view('blogs.tag', compact('tags'));
    }
}
