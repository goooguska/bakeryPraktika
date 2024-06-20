@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 2</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Название изделия</th>
        <th class="bgc-green">Общее количество</th>
    </tr>
    @foreach($queries as $query)
  
    <tr>
        <th>{{ $query->product_name }}</th>
        <th>{{ $query->total_quantity }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection

