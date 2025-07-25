<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl p-6 mx-auto mt-10 bg-white rounded shadow-md-lg">
        <h1 class="mb-6 text-2xl font-semibold text-gray-700">Detail Blog</h1>

        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="border-gray-100 p-4 rounded bg-gray-100">{{ $blog->title }}</div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="border-gray-100 p-4 rounded bg-gray-100">{{ $blog->deskripsi }}</div>
            </div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="border-gray-100 p-4 rounded bg-gray-100">{{ $blog->status }}</div>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Created At</label>
                <div class="border-gray-100 p-4 rounded bg-gray-100">{{ $blog->created_at }}</div>
            </div>
                
                <a href="{{ route('blog.index') }}" class="text-sm text-gray-600 hover:underline">Back</a>
            </div>
        </div>
    </div>

</body>
</html>
