<h1> Dúvida {{ $support->id}} <h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="subject">Assunto</label>
        <input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ $support->subject }}">
    </div>
    <div>
        <label for="body">Descrição</label>
        <textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição">
            {{ $support->body }}
        </textarea>
    </div>
    <div>
        <button type="submit">Cadastrar</button>
    </div>
</form>    