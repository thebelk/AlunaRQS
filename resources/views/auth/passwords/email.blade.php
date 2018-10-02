@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div class="login-body">
				<article class="container-login center-block">
					<section>
						<ul id="top-bar" class="nav nav-tabs nav-justified">
							<li class="active"><a >Restaurar Contraseña</a></li>
							<li><a >Fundación Aluna </a></li>
						</ul>
						<div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
							<div id="login-access" class="tab-pane fade active in">
								<br/>
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif	
								<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
									{{ csrf_field() }}

									<div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
										<label for="usuario" class="sr-only">Usuario</label>
											<input type="text" class="form-control"  id="usuario" name="usuario" value="{{ old('usuario') }}" required autofocus
												placeholder="usuario" tabindex="1" value="" />
												 @if ($errors->has('usuario'))
													<span class="help-block">
														<strong>{{ $errors->first('usuario') }}</strong>
													</span>
												@endif
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-danger">
											Enviar link para reestablecer contraseña
										</button>
									
									</div>
								</form>			
							</div>
						</div>
					</section>
				</article>
			</div>
        </div>
    </div>
</div>
@endsection
