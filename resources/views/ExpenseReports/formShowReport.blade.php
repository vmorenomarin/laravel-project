@extends('templates.principal')


@section('content')
<div class="main">
    <h2>Report {{$report->id}}: {{$report->description}}</h2>
    <table>
        <thead>
            <th>Descripción</th>
            <th>Price</th>
            <th>Grab Date</th>
            <th>Edit</th>
        </thead>
        <t@body>
            @forEach($report->expenses as $expense)
            <tr>
                <td>{{$expense->description}}</td>
                <td>${{$expense->price}}</td>
                <td>{{date('d/m/Y', strtotime($expense->created_at))}}</td>
                <td><span class="material-symbols-outlined edit-button"><a
                            href="/expenses/{{$expense['id']}}/edit">edit</a></span>
                </td>
            </tr>
            @endforeach
        </t@body>

    </table>
    <h2>Total: ${{$report->expenses->sum('price')}}</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div id="new_expense_wrapper">
        <form action="{{route('expenses.store')}}" method=" POST" id="new_expense">
            @csrf
            <div class="fields">
                <div class="rowForm">
                    <div class="inputForm">
                        <label for="description">
                            Description
                        </label>
                        <input type="text" id="description" name="description">
                    </div>
                    <div class="inputForm">
                        <label for="price">
                            Price
                        </label>
                        <input type="number" id="price" name="price">
                    </div>
                    <div class="confirm">
                        <span>
                            Add
                        </span>
                        <button id="add_expense" type="submit">
                            <span class="material-symbols-outlined" title="Agregar detalle">
                                check
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="footer-buttons">
        <a href="/expense_reports" id="addSpent" class="button">
            <span class="material-symbols-outlined">
                arrow_back
            </span>
            Regresar
        </a>
        <a onclick="document.querySelector('#new_expense_wrapper').classList.add('show');" id="addSpent" class="button">
            <span class="material-symbols-outlined">
                add_circle
            </span>
            Agregar detalle
        </a>
    </div>
</div>

@endsection