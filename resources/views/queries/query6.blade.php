@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 6</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">ФИО пекаря</th>
        <th class="bgc-green">Название изделия</th>
        <th class="bgc-green">Количество</th>
        <th class="bgc-green">Дата выпечки</th>

    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->baker_name }}</th>
        <th>{{ $query->product_name }}</th>
        <th>{{ $query->quantity }}</th>
        <th>{{ $query->date_baking }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection
