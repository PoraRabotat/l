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
            <input type="text" name="car_number" value="{{ old('car_number') }}">
            @error('car_number') <span style="color:red">{{ $message }}</span> @enderror
        </p>
        <p>
            <label>Описание:</label><br>
            <textarea name="description" rows="4" cols="50">{{ old('description') }}</textarea>
            @error('description') <span style="color:red">{{ $message }}</span> @enderror
        </p>
        <button type="submit">Создать</button>
    </form>
</body>
</html>