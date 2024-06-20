@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 9</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Название изделия</th>
        <th class="bgc-green">Среднее число продаж</th>
    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->product_name }}</th>
        <th>{{ $query->avg_monthly_sales }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection
