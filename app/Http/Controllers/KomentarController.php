<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'message' => 'required',
        ]);

        Komentar::create ([
            'komentar_nama' => $request->name,
            'komentar_text' => $request->message,
            'blog_id' => $id,
        ]);

        return redirect()->route('blogs.detail', $id)->with('sukses', 'Komentar berhasil diposting.');
    }

    public function index() {
        $komentars = Komentar::with('blog')->get();
        return view('blogs.komentar', compact('komentars'));
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id)->delete();
        return redirect()->route('komentar.index')->with('sukses', 'Komentar berhasil dihapus.');
    }
}
