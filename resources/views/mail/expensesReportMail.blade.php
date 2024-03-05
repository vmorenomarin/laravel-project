<div class="main">
    <h2>Report {{$report->id}}: {{$report->description}}</h2>
    <table>
        <thead>
            <th>Descripción</th>
            <th>Price</th>
            <th>Grab Date</th>
        </thead>
        <t@body>
            @forEach($report->expenses as $expense)
            <tr>
                <td>{{$expense->description}}</td>
                <td>${{$expense->price}}</td>
                <td>{{date('d/m/Y', strtotime($expense->created_at))}}</td>
            </tr>
            @endforeach
        </t@body>

    </table>
    <h2>Total: ${{$report->expenses->sum('price')}}</h2>
</div>