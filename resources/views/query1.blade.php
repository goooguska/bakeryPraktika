
@section('content')
    <div class="container">
        <h1>Результат запроса 1</h1>
        @if($articles->count())
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название поставщика</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Нет результатов</p>
        @endif
    </div>
@endsection
