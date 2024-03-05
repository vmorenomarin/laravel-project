@extends('templates.principal')


@section('content')


<dialog id="miModal">
    <a href="/expense_reports/{{$report['id']}}/" id="cerrarModal" title="Cancelar">
        <span class="material-symbols-outlined">cancel</span>
    </a>
    <h2>Confirmar el envío de e-mail para reporte {{$report['id']}}</h2>
    <form action="/expense_reports/{{$report->id}}/sendEmail" method="POST" id="expense">
        @csrf
        <!-- @method('post') -->
        <!-- <div class="fields"> -->
        <div class="columnForm first">
            <div class="inputForm">
                <label for="email">
                    E-mail address
                </label>
                <input type="email" id="email" name="email" placeholder="user@mail.com" required pattern=".+@.+\.com">
            </div>
        </div>
        <!-- </div> -->

        <p>¿Está seguro de enviar el reporte <b>{{$report['description']}}</b> ({{$report['id']}})?</p>
        <div class="buttons">
            <button type="submit" class="button">
                <span class="material-symbols-outlined">email </span>
                Send
            </button>
        </div>
    </form>

</dialog>


<script>
document.querySelectorAll('.inputForm input').forEach(input => {
    input.addEventListener('change', () => {
        document.querySelector('button[type="submit"]').disabled = false;
    });
})
</script>
@endsection