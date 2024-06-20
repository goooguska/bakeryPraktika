@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 8</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Имя пользователя</th>
        <th class="bgc-green">Email пользователя</th>
        <th class="bgc-green">количество</th>
        <th class="bgc-green">Дата продажи</th>
    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->firstName }}</th>
        <th>{{ $query->email }}</th>
        <th>{{ $query->quantity }}</th>
        <th>{{ $query->date_sale }}</th>

    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection
