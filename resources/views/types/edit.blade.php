<form action="{{ url('types/update') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $type['id'] }}">
    <label>Nome:</label><br>
    <input name="name" type="text" value="{{ $type['name'] }}" /><br>
<br>
    <input type="submit" value="Salvar" />
</form>