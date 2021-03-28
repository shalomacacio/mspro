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
                    <th>Campanha</th>
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
                @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->titulo }}</td>
                    <td>{{ $agenda->nome }}</td>
                    <td>{{ $agenda->sexo }}</td>
                    <td>{{ \Carbon\Carbon::now()->diffInYears($agenda->dt_nascimento) }}</td>
                    <td>{{ $agenda->rua }}-{{ $agenda->num }}, {{ $agenda->bairro }}</td>
                    <td>{{ $agenda->celular }}</td>
                    <td>{{ $agenda->cpf }}</td>
                    <td>{{ $agenda->cns }}</td>
                    <td>{{ $agenda->ubs }}</td>
                    <td>{{ $agenda->agente_saude }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Campanha</th>
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
<script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>


<script>
$(document).ready(function() {

    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        // if(title == 'Sexo' || title == 'CPF' || title == 'Celular' || title == 'CNS' || title == 'Ag Saude'   ){
        //      $(this).html( '<input type="text" placeholder="'+title+'" style="width: 100%"  />' );
        // } else{
        //     $(this).html( '<input type="text" placeholder="'+title+'" style="width: 100%"  />' );
        // }
        $(this).html( '<input type="text" placeholder="'+title+'" style="width: 100%"  />' );
        
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('#example').DataTable( {
        processing: true,
        lengthChange: false,
        buttons: [ 
            'excel', 
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ],
        paging:   true,
        info:     true,
        bFilter: true,
        ordering: true,
        pageLength: 100,
        language: {
            search: "Pesquisar",
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