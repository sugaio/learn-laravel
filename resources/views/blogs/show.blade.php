<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="py-10 bg-gray-100">
    <div class="max-w-4xl p-6 mx-auto bg-white rounded shadow">
        <h1 class="mb-2 text-3xl font-bold text-gray-800">{{ $blog->title }}</h1>
        <p class="inline mb-4 mr-3 text-sm text-gray-500">
            Penulis : 
            <span class="px-2 py-1 text-xs text-green-700 bg-green-100 rounded">{{ $blog->user->name }}</span>
        </p>
        <p class="inline mb-4 mr-3 text-sm text-gray-500">
            Email : 
            <span class="px-2 py-1 text-xs text-blue-700 bg-blue-100 rounded">{{ $blog->user->email }}</span>
        </p>
        <p class="inline mb-4 mr-3 text-sm text-gray-500">
            Dibuat : 
            <span class="px-2 py-1 text-xs text-green-700 bg-green-100 rounded">{{ $blog->created_at->diffForHumans() }}</span>
        </p>
        
        <p class="mb-4 text-sm text-gray-500">Tag :
            @foreach ($blog->tags as $tag )
                <span class="px-2 py-1 mr-1 text-gray-700 bg-gray-100 rounded text-sx">{{ $tag->nama }}</span>
            @endforeach
        </p>
        
        <div class="mb-8 leading-relaxed text-gray-700">{{ $blog->deskripsi }}</div>

        <hr class="my-6">
        
        <h2 class="mb-4 text-xl font-semibold">Komentar</h2>
        @foreach ($blog->komentars as $komentar )
        <div class="pl-4 mb-4 border-l-4 border-blue-500">
            <p class="text-gray-800 font-meddium">{{ $komentar->komentar_nama }}</p>
            <p class="text-xs text-gray-600">{{ $komentar->komentar_text }}</p>
            <p class="text-xs text-gray-400">{{ $komentar->created_at->diffForHumans() }}</p>
        </div>
        @endforeach

        @if ($blog->komentars->isEmpty())
            <p class="mb-4 italic text-gray-500">Belum ada komentar</p>
        @endif
        
        <div class="mt-8">
            <h3 class="mb-2 text-lg font-semibold">Tinggalkan Komentar</h3>
            @if (session('sukses'))
                <div class="px-4 py-2 mb-4 text-green-800 bg-green-100 border border-green-400 rounded">{{ session('sukses') }}</div>
            @elseif (session('gagal'))
                <div class="px-4 py-2 mb-4 text-red-800 bg-red-100 border border-red-400 rounded"></div>
            @endif
            <form action="{{ route('komentar.store', $blog->id) }}" method="POST" class="space-y-4">
                @csrf
                <div class="">
                    <label for="name" class="block" font-medium>Nama</label>
                    <input type="text" name="name" id="name" required class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500">
                    @error('name')
                        <div class="p-4 mt-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="message" class="block" font-medium>Komentar</label>
                    <input type="text" name="message" id="message" required class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500">
                    @error('message')
                        <div class="p-4 mt-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">Komentar</button>
                    <a href="{{ route('blogs.beranda') }}" class="px-4 py-2 text-white bg-yellow-600 rounded hover:bg-yellow-700">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
