@extends('layouts.app')
@section('pagetitle')
  <h3></h3> 
@endsection
@section('x_search')
	
@endsection
@section('x_content')
  <div class="x_panel">
	    <div class="x_title">
			<h2>Historial Requisiciones</h2> &nbsp&nbsp&nbsp
			@permission('ver-nueva-rqs-historial-rqs-usuarios')			
				<a  href="\requisicion\create" class="btn btn-warning" role="button">Nueva Requisicion</a>
			@endpermission
			@permission('ver-descargar-todo-historial-rqs-usuarios')
				<div class=" col-md-2 col-sm-2 col-xs-6 right">
						<a  href="/requisicion/export" class="btn btn-primary  left" role="button"><i class="glyphicon glyphicon-cloud-download" aria-hidden="true"></i>&nbsp&nbsp Descargar </a>
				</div>
			@endpermission<!--
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
						<th class="text-center">Código</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Antiguedad</th>
						<th class="text-center">Asunto</th>
						<th class="text-center">Estado</th>
						<th class="text-center">Solicitante</th>
						<th class="text-center">Cargo</th>
						<th class="text-center"> Dependencia</th>
						
						<th>Opciones  </th>
						<!--<th>Eliminar</th>-->
					</tr>
				  </thead>
				  <tbody>
				
					@foreach($requisiciones as $requisicion)
					
						<tr>
							<td>{{$requisicion->id}}</td>
							<td>{{$requisicion->created_at->format('d-m-Y')}}</td>
							<td>{{$now->diff($requisicion->created_at)->days}} día(s)</td>
							<td>{{$requisicion->asn_rqs}}</td>
							<td>{{$requisicion->estadorequisicion->desc_est_req}}</td>
							@if($requisicion->registrohistoricorequisicion->count() == 0)
								<td>Sin Creación</td>
							@else
								@foreach($requisicion->registrohistoricorequisicion as $registrorqs)
									@if ($loop->first)
											@if($registrorqs->user === null)
											<td>Sin Creación</td>
										@else
											<td>{{$registrorqs->user->nom_usr .' '. $registrorqs->user->ape_usr}}</td>																						
										@endif
										<td>{{$requisicion->cargo->des_crg  }}</td>
										<td>{{$requisicion->area->tipoarea->des_tip_are}} / {{$requisicion->area->des_are}}</td>
									@endif
								@endforeach 
							@endif
														
							
							
							<td>
								@if($requisicion->registrohistoricorequisicion->first()->user->id == Auth::user()->id && $requisicion->estadorequisicion->id == 1)
									<a href="{{ url('/requisicion/'.$requisicion->id.'/edit') }}" title="Editar" class="btn btn-info glyphicon glyphicon-pencil btn-xs" data-title="Editar"></a>
								@endif
								<a href="{{ url('/requisicion/'.$requisicion->id) }}" title="Detalle" class="btn btn-success glyphicon glyphicon-file btn-xs" data-title="Detalle"></a>							
								<a href="{{ url('requisicion/export-pdf/'.$requisicion->id) }}'.$requisicion->id) }}" title="Descargar" class="btn btn-primary glyphicon glyphicon-cloud-download btn-xs" data-title="Descargar"></a><!--
								<a href="" title="Acción" class="btn btn-primary glyphicon glyphicon-ok btn-xs" data-title="Acción"></a>--></td>
					
						</tr>   
					@endforeach
					
				  </tbody>
				</table>
			</div>
        </div>
		
	</div>
	

@endsection

