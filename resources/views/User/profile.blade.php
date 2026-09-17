<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Minimarket</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen">

    <!-- Top Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center space-x-8">
                    <span class="text-lg font-extrabold text-indigo-600">🛒 Minimarket App</span>
                    <a href="{{ route('user.dashboard') }}" class="text-sm font-medium text-indigo-600">Home</a>
                    <a href="{{ route('user.profile') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Profil Saya</a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs bg-red-50 text-red-600 px-3 py-2 rounded-md hover:bg-red-100 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Area -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang di Portal Pelanggan!</h1>
            <p class="text-gray-500">Role Anda: <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-0.5 rounded uppercase">{{ Auth::user()->role }}</span></p>
        </div>
    </main>

</body>
</html>