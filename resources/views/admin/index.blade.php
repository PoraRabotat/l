<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Административная панель') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">ФИО</th>
                            <th class="px-4 py-2 text-left">Текст заявления</th>
                            <th class="px-4 py-2 text-left">Номер авто</th>
                            <th class="px-4 py-2 text-left">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">
                                {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }} {{ $report->user->middlename ?? '' }}
                            </td>
                            <td class="px-4 py-2 max-w-xs truncate">{{ $report->description }}</td>
                            <td class="px-4 py-2 font-mono">{{ $report->car_number }}</td>
                            <td class="px-4 py-2">
                                <!-- Форма смены статуса -->
                                <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status_id" class="border rounded px-2 py-1 text-sm">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $status->id == $report->status_id ? 'selected' : '' }}>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>