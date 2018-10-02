@extends('layouts.app')
@section('pagetitle')
  <h3></h3> 
@endsection
@section('x_search')
	
@endsection
@section('x_content')
  <div class="x_panel">
	    <div class="x_title">
			<h2>Historial de Facturas</h2> &nbsp&nbsp&nbsp
						
			<a  href="/factura/create" class="btn btn-warning" role="button">Nueva Factura </a>
			<!--<div class="col-md-3 col-sm-3 col-xs-12 right">
				<div id="reportrange" class="pull-center" style="background: #fff; cursor: pointer; padding: 8px 10px; border: 1px solid #ccc">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
					<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
				</div>
			</div>-->
			
			<div class="clearfix"></div> 
	    </div>
		<div class="x_content"><br/>
			<div class="table-responsive">
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				  <thead>
				   <tr>
						<th class="text-center">Código </th>
						<th class="text-center">No. Documento </th>
						<th class="text-center">Concepto</th>
						<th class="text-center">Proveedor</th>
						<th class="text-center">Doc. Proveedor</th>
						<th class="text-center">Forma de pago </th>
						<th class="text-center">Comprado por</th>
						<th class="text-center">Fecha Creación </th>
						<th class="text-center">Fecha Edición </th>
						<th>Opciones  </th>
						<!--<th>Eliminar</th>-->
					</tr>
				  </thead>
				  <tbody>
					
					@foreach($facturas as $fact)
						<tr>
							<td>{{$fact->id}}</td>
							<td>{{$fact->no_fact}}</td>
							<td>{{$fact->cnp_fact}}</td>
							<td>{{$fact->proveedor->raz_soc}}</td>
							<td>{{$fact->proveedor->tip_doc}}. {{$fact->proveedor->num_doc}}</td>
							<td>{{$fact->form_pag}}</td>
							<td>{{$fact->comp_fact}}</td>
							<td>
								@if($fact->created_at)
									{{$fact->created_at->format('Y-m-d') }}
								@endif
							</td>	
							<td>
								@if($fact->modified_at)
									{{$fact->modified_at->format('Y-m-d') }}
								@endif
							</td>
														
							<td>
		
								<a href="{{ url('/factura/'.$fact->id) }}" title="Detalle" class="btn btn-success glyphicon glyphicon-file btn-xs" data-title="Detalle"></a>
							</td>
					
						</tr>
					@endforeach                       
					
				  </tbody>
				</table>
			</div>
        </div>
		
	</div>
@endsection
