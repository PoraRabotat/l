<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заявлений</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #333; color: #fff; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 4px; display: inline-block; margin: 5px; }
        .btn-create { background: #2ecc71; color: #fff; }
        .btn-edit { background: #3498db; color: #fff; }
        .btn-delete { background: #e74c3c; color: #fff; border: none; cursor: pointer; }
        .btn-view { background: #95a5a6; color: #fff; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('reports.index') }}">← На главную</a>
    <a href="{{ route('reports.create') }}" class="btn btn-create">Создать заявление</a>
    
</nav>

<h1>Список заявлений</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Номер авто</th>
            <th>Описание</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->car_number ?? 'Не указан' }}</td>
                <td>{{ Str::limit($report->text, 50) }}</td>
                <td>{{ $report->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('reports.show', $report->id) }}" class="btn btn-view">Просмотр</a>
                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-edit">Редактировать</a>
                     | 
                    <!-- Форма удаления -->
                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>