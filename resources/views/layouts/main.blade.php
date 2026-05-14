<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'НарушенийНЕТ' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-white shadow p-4">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-xl font-bold text-gray-800">Шапка сайта НарушенийНЕТ</h1>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto p-6 w-full">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white p-4 mt-auto">
        <div class="max-w-7xl mx-auto text-center">
            &copy; {{ date('Y') }} Подвал сайта. Все права защищены.
        </div>
    </footer>
</body>
</html>