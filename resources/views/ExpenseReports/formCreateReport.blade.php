@extends('layouts.app')

@section('content')


<dialog id="miModal">
    <a href="/expense_reports" id="cerrarModal" title="Cerar sin guardar" class="buttonNoText">
        <span class="material-symbols-outlined">
            cancel
        </span>
    </a>
    <h2>Add a new report</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/expense_reports" method="POST" id="reports">
        @csrf
        <div class="fields">
            <div class="columnForm first">
                <div class="inputForm">
                    <label for="description">
                        Description
                    </label>
                    <input type="text" id="description" name="description">
                </div>
            </div>
            <div class="columnForm">
                <div class="inputForm">
                    <label for="price">
                        Price
                    </label>
                    <input type="number" id="price" name="price" disabled>
                </div>
                <div class="inputForm">
                    <label for="toggle">
                        Paid?
                    </label>
                    <div class="switchContent">
                        <span class="label-value off" data-value="N">No</span>
                        <div class=" switch">
                            <input type="checkbox" id="toggle" name="toggle">
                            <div class=" thumb">
                            </div>
                        </div>
                        <span class="label-value on" data-value="Y">Yes</span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="button"><span class="material-symbols-outlined">
                save
            </span>Save</button>
    </form>




</dialog>

@endsection