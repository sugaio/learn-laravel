<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-5xl p-6 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Beranda Blog</h1>
        
        <div class="grid gap-6">
            @forelse ($blogs as $blog )
                <div class="p-6 transition bg-white rounded-lg shadow hover:shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $blog->title }}</h2>
                    <p class="mt-2 text-gray-600">{{ Str::limit($blog->deskripsi, 100) }}</p>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex gap-4">
                            <span class="inline-block px-3 py-1 text-sm bg-green-100 rounded">
                                Penulis : {{ $blog->user->name }}
                            </span>
                            <span class="inline-block px-3 py-1 text-sm bg-yellow-100 rounded">
                                Dibuat : {{ $blog->created_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <a href="{{ route('blogs.detail', $blog->id) }}" class="font-medium text-blue-600 hover:underline">Lihat blog →</a>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada artikel</div>
            @endforelse
        </div>
    </div>
</body>
</html>
