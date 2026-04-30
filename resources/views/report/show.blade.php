<!DOCTYPE html>
<html>
<head>
    
    <title>Редактировать заявление</title>
</head>
<body>
    <h1>Редактирование заявления #{{ $report->id }}</h1>
    <a href="{{ route('reports.index') }}">← Назад к списку</a>

    <form action="{{ route('reports.update', $report) }}" method="POST">
        @csrf
        @method('PUT') <!-- Переопределяем POST на PUT для Laravel -->

        <p>
            <label>Номер авто:</label><br>
            <input type="text" name="number" value="{{ old('number', $report->number) }}">
            @error('number') <span style="color:red">{{ $message }}</span> @enderror
        </p>
        <p>
            <label>Описание:</label><br>
            <textarea name="text" rows="4" cols="50">{{ old('text', $report->text) }}</textarea>
            @error('text') <span style="color:red">{{ $message }}</span> @enderror
        </p>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>