<x-main-layout>
    <x-slot:title>Вторая страница</x-slot:title>
    <h2 class="text-2xl font-semibold mb-4">Вторая страница</h2>
    <p>Здесь расположен дополнительный контент.</p>
    <a href="{{ route('home') }}" class="text-blue-600 hover:underline mt-4 inline-block">← Вернуться на главную</a>
</x-main-layout>