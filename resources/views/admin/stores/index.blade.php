@extends('layout.app')


@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Açoes</th>
        </tr>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <th>{{$store->id}}</th>
                <th>{{$store->name}}</th>
                <th>
                    <a href="{{route('stores.edit', ['store'=> $store->id] )}}" class="btn btn-sm btn-link">Editar</a>
                    <a href="{{route('stores.destroy', ['store'=> $store->id] )}}" class="btn btn-sm btn-danget">Remover</a>
                </th>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
    {{$stores->links()}}

@endsection
