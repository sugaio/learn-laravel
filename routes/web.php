<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use PHPUnit\Framework\Attributes\Group;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('url', function () {
//     return 'isi response';
// });

// Route::get('/hello', function () {
//     return 'Heloo dari Laravel 11';
// });

// Route::get('/blog', function () {
//     return view('blog');
// });

// Route::get('/blog', function () {
//     return view('blog', ['data' => 'Blog 1', 'title' => 'Belajar Laravel 11']);
// });

route::get('/blog', function () {
    $data = 'Blog 2';
    $title = 'Belajar Laravel 11';
    return view('blog', ['data' => $data, 'title' => $title]);
});

route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
route::get('/blogs/{id}/detail', [BlogController::class, 'show'])->name('blog.show');
route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
route::patch('blogs/{id}/update', [BlogController::class, 'update'])->name('blog.update');
route::delete('/blogs/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');

// versi update simpel
// route::view('/tentang', 'about');
// route::view('/blog', 'blog', ['data' => 'Blog 1', 'title' => 'Belajar Laravel 11']);

// route::get('/produk/{id}', function ($id) {
//     return 'Ini halaman informasi detail produk id : '.$id;
// });

// route::get('/user/{nama?}', function ($nama = 'Tamu') {
//     return "Haloo selamat rawuh, $nama!";
// });

// route::get('/profil', function () {
//     return 'Ini halaman profile';
// })->name('prf');

// route::get('ke-profile', function () {
//     return redirect()->route('prf');
// });

// route::redirect('/beranda', '/hitung');

// route::get('/blog', [BlogController::class, 'index']);

// // Group
// route::prefix('admin')->group(function () {
//     route::get('/dashboard', function () {
//         return 'Admin Dashboard';
//     });
//     route::get('/profile', function () {
//         return 'Ini halaman profile';
//     });
// });

// route::resource('/posts', PostController::class);
