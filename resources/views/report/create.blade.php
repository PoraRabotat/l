<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Новое заявление</h1>
            <a href="{{ route('reports.index') }}">← Назад к списку</a>

            <form action="{{ route('reports.store') }}" method="POST">
                @csrf
                <p>
                    <label>Номер авто:</label><br>
                    <input type="text" name="number" value="{{ old('number') }}">
                </p>
                <p>
                    <label>Описание:</label><br>
                    <textarea name="text" rows="4" cols="50">{{ old('text') }}</textarea>
                </p>
                <button type="submit">Создать</button>
            </form>
        </div>
    </div>
</x-app-layout>
