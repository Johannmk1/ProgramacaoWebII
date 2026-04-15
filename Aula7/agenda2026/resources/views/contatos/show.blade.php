<header>
    <h1>Detalhes do Contato - {{$contato->nome}}</h1>

<div>
    <ul>
        <li>ID:{{$contato->id}}</li><!-- Life is available only in the present moment. - Thich Nhat Hanh -->
        <li>Nome:{{$contato->nome}}</li>
        <li>Email:{{$contato->email}}</li>
        <li>Telefone:{{$contato->telefone}}</li>
        <li>Cidade:{{$contato->cidade}}</li>    
        <li>Estado:{{$contato->estado}}</li>
    </ul>
    <br>
    <a href="{{ route('contatos.index')}}">Voltar a lista de Contatos</a>


</div>