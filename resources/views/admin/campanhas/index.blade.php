@extends('admin.layouts.app')

@section('content')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Campanhas:</h1>
                </div>
                <div class="col-auto">
                     <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    @csrf

                                    {{-- <div class="col-auto">
                                        <select class="form-select w-auto" name="campanha_id" required >
                                            <option selected value=" ">--CAMPANHA--</option>
                                            @foreach ($campanhas as $camp)
                                                <option value="{{ $camp->id }}">{{ $camp->titulo }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div> --}}

                                    {{-- <div class="col-auto">
                                        <input type="number" name="idade_min" class="form-control search-orders" placeholder="IDADE MÍNIMA" required>
                                    </div>   
                                    <div class="col-auto">
                                        <input type="number" name="idade_max" class="form-control search-orders" placeholder="IDADE MÁXIMA" required>
                                    </div>                                   --}}

                                    <div class="col-auto">
                                        <a href="{{ route('campanhas.create') }}" class="btn app-btn-secondary"> Nova Campanha </a>
                                    </div>
                                </form>
                                
                            </div><!--//col-->

                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
           
            
            {{-- <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Todos</a>
                <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Por Idade</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a>
            </nav> --}}
            
            
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">COD</th>
                                            <th class="cell">TITULO</th>
                                            <th class="cell">DESCRICAO</th>
                                            <th class="cell">INICIO </th>
                                            <th class="cell">FIM</th>
                                            <th class="cell">ATIVA </th>
                                            <th class="cell">AÇÕES </th>
                                        </tr>
                                    </thead>
                                    @isset($campanhas)
                                    <form action="{{ route('campanhas.store')  }}" method="POST">
                                        @csrf
                                        <tbody>
                                            @foreach ($campanhas as $campanha)
                                                <tr>
                                                    <td class="cell">{{ $campanha->id }}</td>
                                                    <td class="cell">{{ $campanha->titulo }}</td>
                                                    <td class="cell">{{ $campanha->descricao }}</td>
                                                    <td class="cell">{{ $campanha->dt_inicio }}</td>
                                                    <td class="cell">{{ $campanha->dt_fim }}</td>
                                                    <td class="cell">@if ($campanha->ativa == 0) NÃO  @else SIM @endif </td>
                                                    <td class="cell"><a class="btn-sm app-btn-primary" href="{{ route('campanhas.edit', $campanha->id) }}">Editar</a></td>
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </form>
                                 @endisset
                                </table>
                            </div><!--//table-responsive-->
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->

                    {{-- <nav class="app-pagination">
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
                    </nav><!--//app-pagination--> --}}
                    
                </div><!--//tab-pane-->
      
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
    
    
</div><!--//app-wrapper-->    	
    
@endsection