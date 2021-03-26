@extends('admin.layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap5.min.css"> 

<style>
  td {
    font-size: 9px;
  }
    th {
    font-size: 11px;
  }
    .card-header {
    padding: .4rem 1.25rem;
  }
</style>

@section('content')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            {{-- alerts --}}
            @include('admin.layouts.alerts.session')
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Pacientes:</h1>
                </div>
                <div class="col-auto">						    
                    <a class="btn app-btn-primary" onclick = "exportTableToExcel('tblData')">
                        @include('admin.layouts.svg.download')
                        Download CSV
                    </a>
                </div>

                
            </div><!--//row-->
           
            {{-- 
            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todos</a>
                <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Por Idade</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
            </nav> 
            --}}
            
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left display" id="tableId" >
                                    <thead>
                                        <tr>
                                            <th class="cell">COD</th>
                                            <th class="cell">NOME</th>
                                            <th class="cell">CPF</th>
                                            <th class="cell">NASCIMENTO</th>
                                            <th class="cell">IDADE</th>
                                            <th class="cell">ENDEREÇO</th>
                                            <th class="cell">CNS</th>
                                            <th class="cell">UBS </th>
                                            <th class="cell">CELULAR</th>
                                            {{-- <th class="cell"><input type="checkbox" name="all" ></th> --}}

                                        </tr>
                                    </thead>
                                    @isset($pacientes)
                                    <form action="{{ route('agendas.agendarLote')  }}" method="POST">
                                        @csrf
                                        <tbody>
                                            @foreach ($pacientes as $paciente)
                                                <tr>
                                                    <td class="cell">{{ $paciente->id }}</td>
                                                    <td class="cell"><span class="truncate">{{ $paciente->nome }}</span></td>
                                                    <td class="cell">{{ $paciente->cpf }}</td>
                                                    <td class="cell">{{ \Carbon\Carbon::parse($paciente->dt_nascimento)->format('d-m-Y') }}</td>
                                                    <td class="cell">{{ \Carbon\Carbon::now()->diffInYears($paciente->dt_nascimento)}} </td>
                                                    <td class="cell">{{ $paciente->rua }}-{{ $paciente->num }}, {{ $paciente->bairro }} </td>
                                                    <td class="cell">{{ $paciente->cns }}</td>
                                                    <td class="cell">{{ $paciente->ubs }}</td>
                                                    <td class="cell">{{ $paciente->celular }}</td>
                                                    {{-- <td class="cell"><input type="checkbox" class="marcar" name="pacientes[]" value="{{ $paciente->id }}" @isset($campanha_id) checked @endisset /></td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        @isset($campanha_id)
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <div class="col-auto">
                                                        <input type="date" name="dh_agendamento" class="form-control search-orders" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="user_id" value="{{Auth::id()}}" />
                                                    <input type="hidden" name="campanha_id" value="{{ $campanha_id }}" required />
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn app-btn-secondary" onclick="confirm('Confirmar agendamento?')"" > Agendar </button>
                                                    </div>
                                                </td> 
                                            </tr> 
                                        </tfoot>
                                        @endisset
                                    </form>
                                 @endisset
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->

                    {{-- 
                        <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                        </nav><!--//app-pagination--> 
                    --}}

                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->    	
    
@endsection

@section('javascritp')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
{{-- scripts necessarios --}}
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
    var table = $('#tableId').DataTable( {
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
        language: {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"},
        paging:   false,
        info:     false,
        bFilter: false,
        ordering: true,
        lengthChange: false,
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

</script>

@stop