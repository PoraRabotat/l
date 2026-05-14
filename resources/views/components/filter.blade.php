<div class="bg-white p-4 rounded shadow mb-6">
    <div class="flex flex-wrap items-center gap-4 mb-4">
        <span class="font-semibold text-gray-700">Сортировка:</span>
        <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" 
           class="text-blue-600 hover:underline {{ ($sort == 'desc' || is_null($sort)) ? 'font-bold' : '' }}">
            Сначала новые
        </a>
        <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" 
           class="text-blue-600 hover:underline {{ $sort == 'asc' ? 'font-bold' : '' }}">
            Сначала старые
        </a>
    </div>

    <div>
        <p class="font-semibold text-gray-700 mb-2">Фильтрация по статусу:</p>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('reports.index', ['sort' => $sort, 'status' => null]) }}" 
               class="px-3 py-1 rounded text-sm {{ is_null($status) ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Все
            </a>
            @foreach($statuses as $st)
                <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $st->id]) }}" 
                   class="px-3 py-1 rounded text-sm {{ $status == $st->id ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    {{ $st->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>