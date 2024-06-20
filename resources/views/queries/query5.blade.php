@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 5</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Выпеченное изделие</th>
        <th class="bgc-green">Общее число выпеченных изделий</th>
        <th class="bgc-green">Общая сумма выпеченных изделий</th>
    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->name }}</th>
        <th>{{ $query->total_quantity }}</th>
        <th>{{ $query->total_cost }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection
