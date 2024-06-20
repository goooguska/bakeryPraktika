@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 10</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Общее число продаж</th>
        <th class="bgc-green">Общая сумма продаж</th>

    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->total_quantity }}</th>
        <th>{{ $query->total_sales }}</th>

    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection
