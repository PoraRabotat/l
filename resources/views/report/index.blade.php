<!DOCTYPE html>
<html>
<head><title>Список заявлений</title></head>
<body>
    <h1>Заявления</h1>


    <a href="{{ route('reports.create') }}">Создать заявление</a>

    <div class="mb-3">
        <a href="{{ route('reports.index', ['status' => null, 'sort' => $sort]) }}" 
        class="btn btn-sm {{ is_null($statusFilter) ? 'btn-primary' : 'btn-outline-secondary' }}">
            Все
        </a>
        @foreach($statuses as $st)
            <a href="{{ route('reports.index', ['status' => $st->id, 'sort' => $sort]) }}" 
            class="btn btn-sm {{ $statusFilter == $st->id ? 'btn-primary' : 'btn-outline-secondary' }}">
                {{ $st->name }}
            </a>
        @endforeach
    </div>
    

    <div class="mb-3">
        <a href="{{ route('reports.index', ['sort' => 'created_at_asc', 'status' => $statusFilter]) }}" class="btn btn-sm btn-outline-primary">По дате ↑</a>
        <a href="{{ route('reports.index', ['sort' => 'created_at_desc', 'status' => $statusFilter]) }}" class="btn btn-sm btn-outline-primary">По дате ↓</a>
    </div>


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
            <td>{{ $report->status->name ?? 'Без статуса' }}</td>
        </tr>
        @endforeach

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </table>


</body>
</html>