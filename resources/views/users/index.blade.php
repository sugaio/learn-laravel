
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container px-4 py-6 mx-auto">
        <div class="flex justify-between w-full">
            <h1 class="mb-4 text-6xl font-bold">Daftar user</h1>
        </div>

        <div class="mb-5 overflow-x-auto rounded-lg shadow">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900">No</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Nama</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Email</th>
                        <th class="w-1/6 px-6 py-4 font-medium text-gray-900">Phone</th>
                    </tr>
                </thead>

                <tbody class="bg-white">

                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-6">
                                {{ ($users->currentpage() - 1) * $users->perpage() + $loop->iteration }}</td>
                            <td class="px-6 py-6">{{ $user->name }}</td>
                            <td class="px-6 py-6">{{ $user->email }}</td>
                            <td class="px-6 py-6">{{ $user->phone->phone_number ?? '-'}}</td>
                            <td class="px-6 py-4 space-x-2 text-sm text-center">
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
    {{-- <h1>users LIST</h1>
    @foreach ($userss as $user)
        <li>{{ $user->title }} - {{ $user->status }}</li>
    @endforeach --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
