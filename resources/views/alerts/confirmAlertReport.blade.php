@extends('templates.principal')


@section('content')


<dialog id="miModal">
    <h2>Eliminar reporte {{$report['id']}}</h2>
    <form action="/expense_reports/{{$report['id']}}" method="POST" id="reports">
        @csrf
        @method('delete')
        <p>¿Está seguro de eliminar el reporte {{$report['id']}}</p>
        <a href="/expense_reports/{!!$report['id']!!}/edit" id="cerrarModal" title="Cancelar">
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