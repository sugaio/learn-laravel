<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Tag</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="py-10 bg-gray-100">
    <div class="p-6 mx-auto bg-white rounded shadow max-6-xl">
        <h1 class="mb-6 text-2xl font-bold">📂 Manage Tag Blog</h1>
        @if (session('sukses'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">{{ session('sukses') }}</div>
        @endif
        
        <table class="w-full border border-gray-300 table-auto">
            <thead class="bg-gray-100">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 text-left border">Nama</th>
                <th class="px-4 py-2 text-left border">Jumlah Blog</th>
                <th class="px-4 py-2 text-left border ">Judul Blog Terkait</th>
            </thead>
            <tbody>
                @forelse ($tags as $index => $tag )
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-center border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 font-semibold border">{{ $tag->nama }}</td>
                        <td class="px-4 py-2 border">{{ $tag->blogs->count() }}</td>
                        <td class="px-4 py-2 border">
                            @foreach ($tag->blogs as $blog )
                                <span class="inline-block px-2 py-1 mb-1 mr-1 text-xs bg-gray-200 rounded">{{ $blog->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500">Belum ada tag yang tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-5">
            <a href="{{ route('blog.index') }}" class="px-4 py-2 text-white transition rounded bg-yeloow-600 hover:bg-yellow-600">Kembali</a>
        </div>
    </div>
    
</body>
</html>
