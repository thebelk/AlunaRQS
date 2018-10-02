@extends('layouts.app')
@section('pagetitle')
  <h3></h3> 
@endsection
@section('x_search')
	
@endsection
@section('x_content')
  <div class="x_panel">
	    <div class="x_title">
			<h2>Historial Orden de Compras</h2> &nbsp&nbsp&nbsp
			<a  href="/ordencompra/create" class="btn btn-warning" role="button">Nueva Orden </a>
			<div class=" col-md-2 col-sm-2 col-xs-6 right">
				<a  href="/ordencompra/export" class="btn btn-primary  left" role="button"><i class="glyphicon glyphicon-cloud-download" aria-hidden="true"></i>&nbsp&nbsp Descargar </a>
			</div><!--
			<div class=" col-md-3 col-sm-3 col-xs-6 right">
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
						<th class="text-center">Autorizado por</th>
						<th class="text-center">Fecha Creación </th>
						<th class="text-center">Fecha Edición </th>
						<th>Opciones  </th>
						<!--<th>Eliminar</th>-->
					</tr>
				  </thead>
				<tbody>
					@foreach($ordencompras as $ocp)
						<tr>
							<td>{{$ocp->id}}</td>
							<td>{{$ocp->no_ocp}}</td>
							<td>{{$ocp->cnp_ocp}}</td>
							<td>{{$ocp->proveedor->raz_soc}}</td>
							<td>{{$ocp->proveedor->tip_doc}}. {{$ocp->proveedor->num_doc}}</td>
							<td>{{$ocp->form_pag}}</td>
							<td>{{$ocp->aut_ocp}}</td>
							<td>
								@if($ocp->created_at)
									{{$ocp->created_at->format('Y-m-d') }}
								@endif
							</td>	
							<td>
								@if($ocp->modified_at)
									{{$ocp->modified_at->format('Y-m-d') }}
								@endif
							</td>
														
							<td>
								<a href="{{ url('/ordencompra/'.$ocp->id.'/edit') }}" title="Editar" class="btn btn-info glyphicon glyphicon-pencil btn-xs" data-title="Editar"></a>
								<a href="{{ url('/ordencompra/'.$ocp->id) }}" title="Detalle" class="btn btn-success glyphicon glyphicon-file btn-xs" data-title="Detalle"></a>
								<a href="{{ url('/ordencompra/export-pdf/'.$ocp->id) }}" title="Descargar" class="btn btn-primary glyphicon glyphicon-cloud-download btn-xs" data-title="Descargar"></a>
							</td>
					
						</tr>
					@endforeach                   
					
				</tbody>
				</table>
			</div>
        </div>
		
	</div>
@endsection
