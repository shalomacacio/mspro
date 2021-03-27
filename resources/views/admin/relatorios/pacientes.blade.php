@extends('admin.layouts.app')

@section('css')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap5.min.css">
<style>
    td {
      font-size: 9px;
    }
    th {
      font-size: 11px;
    }
</style>

@stop

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">

        <table id="example" class="table table-striped display compact" style="width:100%">
            <thead>
                <tr>
                    <th>Cod</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Endereço</th>
                    <th>Celular</th>
                    <th>CPF</th>
                    <th>CNS</th>
                    <th>UBS</th>
                    <th>Ag Saude</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ $paciente->sexo }}</td>
                    <td>{{ \Carbon\Carbon::now()->diffInYears($paciente->dt_nascimento) }}</td>
                    <td>{{ $paciente->rua }}-{{ $paciente->num }}, {{ $paciente->bairro }} </td>
                    <td>{{ $paciente->celular }}</td>
                    <td>{{ $paciente->cpf }}</td>
                    <td>{{ $paciente->cns }}</td>
                    <td>{{ $paciente->ubs }}</td>
                    <td>{{ $paciente->agente_saude }}</td>   
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Cod</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Endereço</th>
                    <th>Celular</th>
                    <th>CPF</th>
                    <th>CNS</th>
                    <th>UBS</th>
                    <th>Ag Saude</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection

@section('javascritp')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>


<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'excel', 'pdf'],
        paging:   true,
        info:     true,
        bFilter: false,
        ordering: true,
        pageLength: 100,
        language: {
            info: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            paginate: {
            "next": "Próximo",
            "previous": "Anterior",
            "first": "Primeiro",
            "last": "Último"
        },

        }
        
        

    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
@stop