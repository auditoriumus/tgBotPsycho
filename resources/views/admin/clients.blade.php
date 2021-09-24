@extends('layout.app')

@section('content')
    @if(!empty($clients))
        <div class="mt-3 row">
            <form action="{{ route('get_clients_csv') }}" method="get" class="col-3">
                @csrf
                <button type="submit" class="btn btn-success">Скачать список клиентов</button>
            </form>
            <form action="{{ route('get_specialists_csv') }}" method="get" class="col-4">
                @csrf
                <button type="submit" class="btn btn-success">Скачать список по специалистам</button>
            </form>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ФИО</th>
                <th scope="col">Телефон</th>
                <th scope="col">Почта</th>
                <th scope="col">Специалист</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client['name']}}</th>
                    <td>{{$client['phone']}}</td>
                    <td>{{$client['email']}}</td>
                    <td>{{$client['specialist']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h2>Клиентов нет</h2>
    @endif
@endsection
