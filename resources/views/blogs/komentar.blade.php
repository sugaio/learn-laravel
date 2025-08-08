<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Komentar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="py-10 bg-gray-100">
    <div class="p-6 mx-auto bg-white rounded shadow max-6-xl">
        <h1 class="mb-6 text-2xl font-bold">📂 Manage Komentar Blog</h1>
        @if (session('sukses'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">{{ session('sukses') }}</div>
        @endif
        
        <table class="w-full border border-gray-300 table-auto">
            <thead class="bg-gray-100">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 text-left border">Nama</th>
                <th class="px-4 py-2 text-left border">Pesan</th>
                <th class="px-4 py-2 text-left border ">Postingan</th>
                <th class="px-4 py-2 text-left border">Tanggal</th>
                <th class="px-4 py-2 text-left border">Aksi</th>
            </thead>
            <tbody>
                @forelse ($komentars as $index => $komentar )
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 text-center border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $komentar->komentar_nama }}</td>
                        <td class="px-4 py-2 border">{{ Str::limit($komentar->komentar_text, 50) }}</td>
                        <td class="px-4 py-2 text-blue-700 border">
                            <a href="{{ route('blogs.detail', $komentar->blog_id) }}" target="_blank" class="hover:underline">{{ $komentar->blog->title }}</a>
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-600 border">{{ $komentar->created_at->format('d M Y H:i') }}</td>
                        <td class="px-4 py-2 text-center border">
                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin hapus komentar ini ?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 text-sm text-white bg-red-300 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">Belum ada komentar</td>
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
