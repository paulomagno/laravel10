<h1>Listagem dos suportes</h1>

<table>
    <thead>
        <tr>
            <th>Assunto</th>
            <th>status</th>
            <th>descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td> > </td>
            </tr>
        @endforeach
    </tbody>