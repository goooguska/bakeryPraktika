@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 4</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Название ингредиента</th>
        <th class="bgc-green">Название изделия</th>
        <th class="bgc-green">Количество изделий</th>
    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->ingredient_name }}</th>
        <th>{{ $query->name }}</th>
        <th>{{ $query->total_products }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection
