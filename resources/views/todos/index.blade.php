@extends('app')
    @section('content')
        <h2>TODO LIST</h2>
        <table>
            <thead>
            <tr>
                <th>title</th>
                <th>Status Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->status_name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @endsection