<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email Dikirim</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="max-w-md p-6 text-center bg-white rounded-lg shadow-lg">
        <h1 class="mb-2 text-xl font-bold">Verifikasi Email Dikirim</h1>
        <p class="mb-4 text-gray-600">
            Link sudah kami kirim ke email anda (cek folder spam juga), silahkan cek dan verifikasi.
        </p>
        <form action="{{ route('verification.send') }}" method="POST" class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
            @csrf
            <button type="submit">Kirim Ulang Verifikasi Email</button>
        </form>
    </div>

    
</body>
</html>
