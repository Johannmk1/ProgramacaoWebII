<header>    
    <h1>Lista de Contatos</h1>
</header>
<div>
    @foreach($contatos as $contato)
        <p><a href="{{route('contatos.show', $contato->id)}}"> {{$contato->id}} - {{$contato->nome}} - {{$contato->email}}</a></p> 
    @endforeach
</div>
