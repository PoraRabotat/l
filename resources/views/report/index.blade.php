<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <head> 
                @Vite(['resources/css/app.css', 'resources/js/app.js'])
                <title>Список заявлений</title>
            </head>
            <body>
                <h1>Заявления</h1>


                <a href="{{ route('reports.create') }}">Создать заявление</a>

                <x-filter :sort="$sort" :status="$statusFilter" />
                
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <th>№ Авто</th><th>Описание</th><th>Дата создания</th><th>Действия</th><th>Статус</th>
                    </tr>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->number }}</td>
                        <td>{{ $report->text }}</td>
                        <td>{{ $report->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('reports.show', $report) }}">Редактировать</a> | 
                            <form action="{{ route('reports.destroy', $report) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Удалить заявление?')">Удалить</button>
                            </form><!-- Кнопки удаления/редактирования добавим на следующих шагах -->
                        </td>
                        <td>
                            <x-status :type="$report->status->id">
                                {{ $report->status->name ?? 'Без статуса' }}
                            </x-status>
                        </td>
                    </tr>
                    @endforeach

                    <div class="mt-4">
                        {{ $reports->appends(request()->query())->links() }}
                    </div>
                </table>
            </body>
        </div>
    </div>
</x-app-layout>
