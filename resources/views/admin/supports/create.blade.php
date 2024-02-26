<h1>Nova Dúvida</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <div>
        <label for="subject">Assunto</label>
        <input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ old('subject') }}">
    </div>
    <div>
        <label for="body">Descrição</label>
        <textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    </div>
    <div>
        <button type="submit">Cadastrar</button>
    </div>
</form>