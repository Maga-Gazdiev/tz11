@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список лидов</h1>
    <p>Всего лидов: {{ $leadsCount }}</p>
    <p>Новые: {{ $statusCounts['new'] }}</p>
    <p>В работе: {{ $statusCounts['in_progress'] }}</p>
    <p>Завершенные: {{ $statusCounts['completed'] }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->id }}</td>
                <td>{{ $lead->first_name }}</td>
                <td>{{ $lead->last_name }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->phone }}</td>
                <td>{{ $lead->created_at->format('d-m-Y') }}</td>
                <td>
                    <form method="POST" action="{{ route('leads.update', $lead->id) }}">
                        @csrf
                        @method('PUT')
                        <select name="status_id" class="form-control" onchange="this.form.submit()">
                            @foreach($statuses as $status)
                            <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                            @endforeach
                        </select>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('leads.destroy', $lead->id) }}" onsubmit="return confirm('Вы уверены, что хотите удалить этот лид?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
