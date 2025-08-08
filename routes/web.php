<?php

use App\Http\Controllers\AuthController;
use App\Models\Phone;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\TagController;

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

route::prefix('admin')->middleware('auth')->group(function () {
    route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
    route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
    route::get('/blogs/{id}/detail', [BlogController::class, 'show'])->name('blog.show');
    route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    route::patch('blogs/{id}/update', [BlogController::class, 'update'])->name('blog.update');
    route::delete('/blogs/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
    route::get('/blogs/trash', [BlogController::class, 'trash'])->name('blog.trash');
    route::get('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('blog.restore');

    route::middleware('admin')->group(function () {
        route::get('/users', [UserController::class, 'index'])->name('users.index');
        route::get('/phone', [PhoneController::class, 'index'])->name('phone.index');
    
        route::post('/komentar/{id}', [KomentarController::class, 'store'])->name('komentar.store');
        route::get('/komentar', [KomentarController::class, 'index'])->name('komentar.index');
        route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
    
        route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    });
    
    route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

route::middleware('guest')->group(function () {
    route::get('/login', [AuthController::class, 'login'])->name('login');
    route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});


route::get('/blogs', [BlogController::class, 'beranda'])->name('blogs.beranda');
route::get('blogs/{id}', [BlogController::class, 'detail'])->name('blogs.detail');

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
