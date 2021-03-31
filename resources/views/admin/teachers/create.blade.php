@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Professor</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Professor</li>
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
		<div class="text-center">
			@if(Session::has('success'))
				<div class="alert alert-success">
					{{session('success')}} 
				</div>
			@endif
		</div>
		<div class="row">
		
			<div class="col-sm-12 col-md-12">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Novo Professor</h3>
					</div>
					<div class="card-body">

						{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\TeacherController@store', 'id'=>'form']) !!}	

							{!! Form::label('name','Nome:') !!}
							<div class="form-group">
							{!! Form::text('name', null, [ 'class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
								@if($errors->has('name'))
									<div class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
									</div>
								@endif
							</div>
                            {!! Form::label('name','Data de Aniversario:') !!}
							<div class="form-group">
							{!! Form::text('name', null, [ 'class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
								@if($errors->has('name'))
									<div class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
									</div>
								@endif
							</div>
                            {!! Form::label('name','Genero:') !!}
							<div class="form-group">
							{!! Form::text('name', null, [ 'class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
								@if($errors->has('name'))
									<div class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
									</div>
								@endif
							</div>
							
                            {!! Form::date('date','Data de registo:') !!}
							<div class="form-group">
							{!! Form::text('name', null, [ 'class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
								@if($errors->has('name'))
									<div class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
									</div>
								@endif
							</div>
                        
							<div class="form-group">
								{!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}
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
