@extends('layout.app')


@section('content')
    <a href="{{route('stores.create' )}}" class="btn btn-sm btn-success" style="margin-top: 35px">Criar loja</a>
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
                    <a href="{{route('stores.edit', ['store'=> $store->id] )}}" class="btn btn-sm btn-primary">Editar</a>
                    <a href="{{route('stores.destroy', ['store'=> $store->id] )}}" class="btn btn-sm btn-danger">Remover</a>
                </th>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
    {{$stores->links()}}

@endsection
