@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 3</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Название ингредиента</th>
        <th class="bgc-green">Название поставщика</th>
        <th class="bgc-green">Цена</th>
        <th class="bgc-green">Дата поставки</th>

    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->ingredient }}</th>
        <th>{{ $query->provider }}</th>
        <th>{{ $query->cost }}</th>
        <th>{{ $query->date_of_delivery }}</th>

    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection