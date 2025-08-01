<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container px-4 py-6 mx-auto">
        <div class="flex justify-between w-full">
            <h1 class="mb-4 text-6xl font-bold">Daftar Blogs</h1>

            <div class="flex items-center space-x-3">
                <form method="GET" class="w-lg">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input name="title" type="search" id="default-search"
                            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search" value="{{ $title }}" />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
            
            </form>
            <a href="{{ route('blog.create') }}" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
                <a href="{{ route('blog.trash') }}" type="button"
                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">Restore</a>
            </div>
        </div>
        
        @if (session('sukses'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50">{{ session('sukses') }}</div>
        @elseif (session('gagal'))<div class="p-4 text-sm text-red-800 rounded-lg bg-red-50">{{ session('gagal') }}</div>
        @endif

        <div class="mb-5 overflow-x-auto rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900">No</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Title</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Status</th>
                        <th class="w-1/6 px-6 py-4 font-medium text-gray-900">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @if ($blogss->count() == 0)
                        <tr>
                            <td colspan="4" class="py-6 text-2xl text-center">No Data Found With
                                <strong>{{ $title }}</strong> Keyword</td>
                        </tr>
                    @endif

                    @foreach ($blogss as $item)
                        <tr>
                            <td class="px-6 py-6">
                                {{ ($blogss->currentpage() - 1) * $blogss->perpage() + $loop->iteration }}</td>
                            <td class="px-6 py-6">{{ $item->title }}</td>
                            <td class="px-6 py-6">
                                @if ($item->status == 'Active')
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">{{ $item->status }}</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 space-x-2 text-sm text-center">
                                <a href="{{ route('blog.show', ['id' => $item->id]) }}"
                                    class="inline-block px-3 py-1 transition border border-green-600 rounded green-blue-600 hover:bg-green-600 hover:text-white">View</a>
                                <a href="{{ route('blog.edit', ['id' => $item->id]) }}"
                                    class="inline-block px-3 py-1 text-blue-600 transition border border-blue-600 rounded hover:bg-blue-600 hover:text-white">Edit</a>
                                
                                <form class="inline" action="{{ route('blog.delete', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="confirm('Hapus data ini ?')"
                                    class="inline-block px-3 py-1 text-red-600 transition border border-red-600 rounded hover:bg-red-600 hover:text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $blogss->links() }}
    </div>
    {{-- <h1>BLOGs LIST</h1>
    @foreach ($blogss as $blog)
        <li>{{ $blog->title }} - {{ $blog->status }}</li>
    @endforeach --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
