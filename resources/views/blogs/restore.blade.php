<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trashed Blogs</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-semibold text-gray-700">Trashed Blog</h1>
        
        <div class="mb-5">
            <p class="block mb-5 text-sm font-medium text-gray-700">Blog Title</p>
            @foreach ($blogs as $blog )
                <div class="flex items-center justify-between gap-3">
                    <span class="w-full p-3">{{ $blog->title }}</span>
                    <a href="{{ route('blog.restore', $blog->id) }}" class="px-4 py-2 text-sm text-gray-600 border border-yellow-600 rounded hover:underline hover:bg-yellow-400 hover:text-white">Restore</a>
                </div>
            @endforeach
        </div>

        <a href="{{ route('blog.index') }}" class="px-3 py-3 text-sm text-gray-600 border border-yellow-400 rounded hover:underline hover:bg-yellow-400 hover:text-white">Kembali</a>
    </div>
    
</body>
</html>
