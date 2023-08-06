<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <h1 class="text-center text-gray-700 text-4xl">E-School</h1>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a class="rounded py-2 px-3 bg-cyan-600 hover:bg-cyan-700 text-white text-center" target="_blank" href="/admin">Login as Admin</a>
                        <a class="rounded py-2 px-3 bg-cyan-600 hover:bg-cyan-700 text-white text-center" target="_blank" href="/student">Login as Student</a>
                        <a class="rounded py-2 px-3 bg-cyan-600 hover:bg-cyan-700 text-white text-center" target="_blank" href="/guardian">Login as Guardian</a>
                        {{-- <a class="rounded py-2 px-3 bg-cyan-600 hover:bg-cyan-700 text-white text-center" target="_blank" href="/teacher">Login as Teacher</a>
                        <a class="rounded py-2 px-3 bg-cyan-600 hover:bg-cyan-700 text-white text-center" target="_blank" href="/librarian">Login as Librarian</a>
                        <a class="rounded py-2 px-3 bg-cyan-600 hover:bg-cyan-700 text-white text-center" target="_blank" href="/accountant">Login as Accountant</a> --}}
                    </div>
                </div>

                <div class="mt-16">
                    <p class="text-center text-gray-700">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                </div>
            </div>
        </div>
    </body>
</html>
