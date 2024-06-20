@section('content')
    <x-moonshine::table>
    <x-slot:thead class="text-left">
        <th colspan="4">Запрос 7</th>
    </x-slot:thead>
    <x-slot:tbody>
    <tr>
        <th class="bgc-green">Рецепт</th>
        <th class="bgc-green">Нужный ингредиент</th>
    </tr>
    @foreach($queries as $query)
    <tr>
        <th>{{ $query->recipe }}</th>
        <th>{{ $query->ingredient }}</th>
    </tr>
    @endforeach
       
    </x-slot:tbody>
</x-moonshine::table>
@endsection

