<!DOCTYPE html>
<html>
<head><title>Список заявлений</title></head>
<body>
    <h1>Заявления</h1>
    <a href="{{ route('reports.create') }}">Создать заявление</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>№ Авто</th><th>Описание</th><th>Дата создания</th><th>Действия</th>
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
        </tr>
        @endforeach
    </table>
</body>
</html>