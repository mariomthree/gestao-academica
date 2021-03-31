@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tipo de Ensino</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Tipo de Ensino</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@stop

@section('content')
<div class="row">
				<div class="card card-secondary" style="width: 100%;">
				    <div class="card-header">
				    </div>
				    <div class="container-fluid" style="padding: 20px;">
					
					<div class="row">
						<div class="col-sm-12 col-md-12">

							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Actualizar Tipo de Ensino</h3>
								</div>
								<div class="card-body">

									{!! Form::model($teaching, ['method'=>'PATCH','action'=>['App\Http\Controllers\TeachingController@update',$teaching->id], 'id'=>'form']) !!}	
										{!! Form::label('name','Nome:') !!}
										<div class="form-group">
										{!! Form::text('name', null, [ 'class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
											@if($errors->has('name'))
												<div class="invalid-feedback">
													<strong>{{ $errors->first('name') }}</strong>
												</div>
											@endif
										</div>
										<div class="form-group">
											{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
										</div>
									{!! Form::close() !!}
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
			<!-- /.row -->
@stop
