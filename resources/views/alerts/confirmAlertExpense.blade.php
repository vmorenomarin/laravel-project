@extends('templates.principal')


@section('content')


<dialog id="miModal">
    <h2>Eliminar gasto {{$expense['id']}}</h2>
    <form action="{{ route('expenses.destroy', $expense['id'])}}" method="POST" id="expense">
        @csrf
        @method('delete')
        <p>¿Está seguro de eliminar el gasto <b>{{$expense['description']}}</b> ({{$expense['id']}})?</p>
        <a href="/expenses/{{$expense['id']}}/edit" id="cerrarModal" title="Cancelar">
            <span class="material-symbols-outlined">cancel</span>
        </a>
        <div class="buttons alert">
            <button type="submit" class="button">
                <span class="material-symbols-outlined">delete </span>
                Eliminar
            </button>
        </div>
    </form>

</dialog>

@endsection