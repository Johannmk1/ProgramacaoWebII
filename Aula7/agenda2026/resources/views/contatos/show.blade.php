<header>
    <h1>Detalhes do Contato - {{ $contato->nome }}</h1>
</header>
<div>
    <ul>
        <li>ID: {{ $contato->id }}</li>
        <li>Nome: {{ $contato->nome }}</li>
        <li>Email: {{ $contato->email }}</li>
        <li>Telefone: {{ $contato->telefone }}</li>
        <li>cidade: {{ $contato->cidade }}</li>
        <li>Estado: {{ $contato->estado }}</li>
    </ul>
    <br>
    <a href="{{ route('contatos.index') }}">Voltar para a lista de contatos</a>
</div>
