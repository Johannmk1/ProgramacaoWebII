<header>
    <h1>Novo Contato</h1>
</header>
<div>
    <form action="{{ route('contatos.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade"><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado"><br><br>

        <button type="submit">Criar</button>
        <button type="reset">Limpar</button>
    </form>
    <br>
    <br>
    <a href="{{ route('contatos.index') }}">Voltar para a lista de contatos</a>
</div>
