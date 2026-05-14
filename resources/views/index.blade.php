<x-main-layout>
    <x-slot:title>Главная страница</x-slot:title>
    <h2 class="text-2xl font-semibold mb-4">Добро пожаловать!</h2>
    <p>Это контент главной страницы.</p>
    <a href="{{ route('second') }}" class="text-blue-600 hover:underline mt-4 inline-block">Перейти на вторую страницу →</a>
</x-main-layout>