<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="flex items-center justify-center h-screen bg-gray-100" >
    <div class="w-full max-w-sm p-6 bg-white rounded shadow-md">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">🔐 Login Admin</h2>
        
        @if (session('gagal'))<div class="p-4 text-sm text-red-800 rounded-lg bg-red-50">{{ session('gagal') }}</div>
        @endif
        
        <form action="{{ route('authenticate') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="block w-full px-2 py-4 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-200 focus:ring-opacity-50">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" required autofocus class="block w-full px-2 py-4 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-200 focus:ring-opacity-50">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-2">
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg:blue-700">Masuk</button>
            </div>
        </form>
    </div>
    
</body>
</html>
