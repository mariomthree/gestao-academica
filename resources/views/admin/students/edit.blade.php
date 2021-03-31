@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Estudantes</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Estudantes</li>
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
									<h3 class="card-title">Actualizar Estudante</h3>
								</div>
								<div class="card-body">

									{!! Form::model($students, ['method'=>'PATCH','action'=>['App\Http\Controllers\StudentController@update',$students->id], 'id'=>'form']) !!}	
							
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
                                        {!! Form::label('birthdate','Data de Nascimento:') !!}
							            {!! Form::date('birthdate', null, [ 'class' => 'form-control ' . ( $errors->has('birthdate') ? ' is-invalid' : '' )]) !!}
								        @if($errors->has('birthdate'))
								    	        <div class="invalid-feedback">
										            <strong>{{ $errors->first('birthdate') }}</strong>
									            </div>
							            	@endif
							            </div>
										<div class="form-group">
										{!! Form::label('province_id','Provincia:') !!}
										{!! Form::select('province_id',$provinces,null,[ 'class' => 'form-control custom-select form-control-border ' . ( $errors->has('province_id') ? ' is-invalid' : '' )]) !!}
											@if($errors->has('province_id'))
												<div class="invalid-feedback">
													<strong>{{ $errors->first('province_id') }}</strong>
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
