<table>
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
            <th></th>
        </tr>
    @endforeach
    </tbody>
    </thead>
</table>


{{$stores->links()}}
