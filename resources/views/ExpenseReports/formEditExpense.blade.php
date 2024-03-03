@extends('templates.principal')

@section('content')

<dialog id="miModal">
    <a href="/expense_reports/{{$dataExpense['expense_report_id']}}" id="cerrarModal" title="Cerar sin guardar">
        <span class="material-symbols-outlined">
            cancel
        </span>
    </a>
    <h2>Edit Expense {{$dataExpense['id']}}: {{$dataExpense['description']}}</h2>
    <form action="/expense_reports/{{$dataExpense['id']}}" method="POST" id="expense">
        <input type="hidden" id="editMode">
        @csrf
        @method('put')
        <div class="fields">
            <div class="columnForm first">
                <div class="inputForm">
                    <label for="description">
                        Description
                    </label>
                    <input type="text" id="description" name="description" value="{{$dataExpense['description']}}">
                </div>
            </div>
            <div class="columnForm">
                <div class="inputForm">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" id="price" name="price" value="{{$dataExpense['price']}}">
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="/expenses/{{$dataExpense['id']}}/confirmDelete" id="delete-btn" title="Delete expense"><span
                    class="material-symbols-outlined">
                    delete </span></a>
            <button type="submit" class="button"><span class="material-symbols-outlined">
                    save </span>Save</button>
        </div>
    </form>

</dialog>

@endsection