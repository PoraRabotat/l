<!DOCTYPE html>
<html>
<head><title>Создать заявление</title></head>
<body>
    <h1>Новое заявление</h1>
    <a href="{{ route('reports.index') }}">← Назад к списку</a>

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        <p>
            <label>Номер авто:</label><br>
            <input type="text" name="number" value="{{ old('number') }}">
            @error('number') <span style="color:red">{{ $message }}</span> @enderror
        </p>
        <p>
            <label>Описание:</label><br>
            <textarea name="text" rows="4" cols="50">{{ old('text') }}</textarea>
            @error('text') <span style="color:red">{{ $message }}</span> @enderror
        </p>
        <button type="submit">Создать</button>
    </form>
</body>
</html>