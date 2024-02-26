<h1>Nova Dúvida</h1>

<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <div>
        <label for="subject">Assunto</label>
        <input type="text" name="subject" id="subject" placeholder="Assunto">
    </div>
    <div>
        <label for="body">Descrição</label>
        <textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    </div>
    <div>
        <button type="submit">Cadastrar</button>
    </div>
</form>