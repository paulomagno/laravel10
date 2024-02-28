@csrf
<div>
    <label for="subject">Assunto</label>
    <input type="text" name="subject" id="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}">
</div>
<div>
    <label for="body">Descrição</label>
    <textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
</div>
<div>
    <button type="submit">Cadastrar</button>
</div>