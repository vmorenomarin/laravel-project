@extends('templates.principal')

@section('content')
<div class="main">
    <h2>Reports</h2>

    @if($dataReport->count()>0)
    <table class="report-table">
        <thead>
            <th>ID Report</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Paid</th>
            <th>Edit</th>
        </thead>
        <tbody>
            @foreach($dataReport as $record)
            <tr>
                <td>
                    {{$record['id']}}
                </td>
                <td>
                    <a href="expense_reports/{{$record['id']}}" title=" Ver detallle reporte {{$record['id']}}">
                        {{$record['description']}} <span
                            class=" material-symbols-outlined edit-button">jump_to_element</span>
                    </a>
                </td>
                <td>$ {{$record['price']}}</td>
                <td>{!! $record['is_active']==true ?
                    '<span class="material-symbols-outlined icon-table-positive">check_circle</span>' : '<span
                        class="material-symbols-outlined icon-table-negative">unpublished</span>' !!}
                </td>
                <td>
                    <a href="expense_reports/{{$record['id']}}/edit" class="buttonNoText">
                        <span class="material-symbols-outlined edit-button">edit</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Total: ${{$dataReport[0]['total']}}</h2>
    @else

    <div class="alert alert-info">
        Must create a new report. Click on "Add report" button.
    </div>

    @endif



    <a href=" /expense_reports/create" id="abrirModal" class="button">
        <span class="material-symbols-outlined">
            add_circle
        </span>
        Add report
    </a>
</div>

@endsection