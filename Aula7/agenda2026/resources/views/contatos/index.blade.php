<script>
    function confirmDelete(contatoId) {
        if (confirm('Tem certeza que deseja excluir este contato?')) {
            document.getElementById('deleteform-' + contatoId).submit();
        }
    }
</script>
<header>
    <h1>Lista de Contatos</h1>
</header>

<div>
    <a href="{{ route('contatos.create') }}">Novo Contato</a>
</div>

<div style="margin: 20px 0px;">
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
</div>

<div>
    @foreach ($contatos as $contato)
        <p><a href="{{ route('contatos.show', $contato->id) }}">{{ $contato->id }} - {{ $contato->nome }} - {{ $contato->email }}</a>
        &nbsp;|&nbsp;
        <a href="{{ route('contatos.edit', $contato->id) }}">Editar</a>
        &nbsp;|&nbsp;
        <a href="#" onclick="confirmDelete({{ $contato->id }});">Excluir</a>
        <form id="deleteform-{{ $contato->id }}" action="{{ route('contatos.destroy', $contato->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
        </form>
    </p>
    @endforeach
</div>

