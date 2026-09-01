<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 py-10 px-4">

    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8 border-b-2 border-red-500 pb-4">
            <h1 class="text-3xl font-bold text-red-600">Daftar Post</h1>
            <p class="text-gray-500 text-sm mt-1">Menampilkan seluruh postingan terbaru</p>
        </div>

        <!-- Grid Container untuk Post Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2 hover:text-red-600 transition-colors">
                        {{ $post->title }}
                    </h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $post->content }}
                    </p>
                </div>
            @empty
                <div class="col-span-full bg-yellow-50 text-yellow-800 p-4 rounded-md text-center border border-yellow-200">
                    Belum ada postingan yang tersedia.
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>