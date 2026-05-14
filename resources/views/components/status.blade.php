@props(['type'])

@php
    $classes = match((int)$type) {
        1 => 'text-blue-600 font-semibold',      // Новое
        2, 3 => 'text-green-600 font-semibold',  // В работе / Завершено
        default => 'text-red-600 font-semibold', // Отклонено и другие
    };
@endphp

<div class="inline-block bg-white px-3 py-1 rounded shadow-sm border">
    <p class="text-sm text-gray-600">Статус заявки: 
        <span {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</span>
    </p>
</div>