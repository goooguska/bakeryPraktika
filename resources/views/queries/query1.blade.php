@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 1</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">ID</th>
        <th class="bgc-green">Название поставщика</th>
    </tr>
    @foreach($queries as $query)
  
    <tr>
        <th>{{ $query->id }}</th>
        <th>{{ $query->name }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection

