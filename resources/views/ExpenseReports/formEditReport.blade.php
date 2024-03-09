@extends('templates.principal')


@section('content')


<dialog id="miModal">
    <a href="/expense_reports" id="cerrarModal" title="Cerar sin guardar" class="buttonNoText">
        <span class="material-symbols-outlined">
            cancel
        </span>
    </a>
    <h2>Editar reporte {{$report['id']}}</h2>
    <form action="/expense_reports/{{$report['id']}}" method="POST" id="reports">
        <input type="hidden" id="editMode">
        @csrf
        @method('put')
        <div class="fields">
            <div class="columnForm first">
                <div class="inputForm">
                    <label for="description">
                        Description
                    </label>
                    <input type="text" id="description" name="description" value="{{$report['description']}}">
                </div>
            </div>
            <div class="columnForm">
                <div class="inputForm">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" id="price" name="price" value="{{$report['price']}}" disabled>
                </div>
                <div class=" inputForm">
                    <label for="toggle">
                        ¿Pagado?
                    </label>
                    <div class="switchContent">
                        <span class="label-value off" data-icon="block" data-value="N">No</span>
                        <div class=" switch">
                            <input type="checkbox" id="toggle" name="toggle"
                                value="{!!$report['is_active']==1 ? 'S':'N'  !!}">
                            <div class="thumb">
                                <span class="material-symbols-outlined "></span>
                            </div>
                        </div>
                        <span class="label-value on" data-icon="check_circle" data-value="S">Sí</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="/expense_reports/{!!$report['id']!!}/confirmDelete" id="delete-btn" title="Eliminar reporte"
                class="buttonNoText"><span class="material-symbols-outlined">
                    delete </span></a>
            <button type="submit" class="button"><span class="material-symbols-outlined">
                    save </span>Guardar</button>
        </div>
    </form>

</dialog>

@endsection