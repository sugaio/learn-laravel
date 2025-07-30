<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Nomor Telepon</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="py-10 bg-gray-100">
    <div class="max-w-4xl p-6 mx-auto bg-white rounded shadow">
        <h1 class="mb-6 text-2xl font-bold">Daftar Nomor Telephone</h1>
        
        <table class="w-full mt-4 border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border text-leff">No</th>
                    <th class="px-4 py-2 border text-leff">Nama Provider</th>
                    <th class="px-4 py-2 border text-leff">Nomor Telephone</th>
                    <th class="px-4 py-2 border text-leff">Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phone as $index => $phone )
                    <tr class="border-t">
                        <td class="px-4 border">{{ $index + 1 }}</td>
                        <td class="px-4 border">{{ $phone->provider_name }}</td>
                        <td class="px-4 border">{{ $phone->phone_number }}</td>
                        <td class="px-4 border">{{ $phone->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
</body>
</html>
