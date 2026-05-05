<header>
    <h1>Editar Contato - {{ $contato->nome }}</h1>
</header>
<div>
    <form action="{{ route('contatos.update', $contato->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $contato->nome }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $contato->email }}" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="{{ $contato->telefone }}"><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="{{ $contato->cidade }}"><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="{{ $contato->estado }}"><br><br>

        <button type="submit">Atualizar</button>
        <button type="reset">Limpar</button>
    </form>
    <br>
    <br>
    <a href="{{ route('contatos.index') }}">Voltar para a lista de contatos</a>
</div>
