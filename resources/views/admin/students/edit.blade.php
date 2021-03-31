@extends('adminlte::page')

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Actualizar Estudantes</h1>
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
		<div class="card-body" style="padding: 20px;">
			{!! Form::model($student,['method'=>'PATCH','action'=>['App\Http\Controllers\StudentController@update',$student->id],'id'=>'form','files'=>true]) !!}

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="card">
						<div class="card-header p-2">
						</div><!-- /.card-header -->
						<div class="card-body">

							{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\StudentController@store', 'id'=>'form']) !!}	
						
								<div class="form-group row">
									{!! Form::label('name','Nome:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
									{!! Form::text('name', null, [ 'class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
										@if($errors->has('name'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('name') }}</strong>
											</div>
										@endif
									</div>
								</div>
										
								<div class="form-group row">
									{!! Form::label('birthdate','Data de Nascimento:' ,['class'=>'col-sm-3 col-form-label'])  !!}
									<div class="col-sm-9">
										{!! Form::date('birthdate', null, [ 'class' => 'form-control ' . ( $errors->has('birthdate') ? ' is-invalid' : '' )]) !!}
										@if($errors->has('birthdate'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('birthdate') }}</strong>
											</div>
										@endif
									</div>
								</div>
										
								<div class="form-group row">
									{!! Form::label('gender','Sexo:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::select('gender',array('M'=>'Masculino','F'=>'Femenino'),null,['class'=>'form-control custom-select']) !!}
										@if($errors->has('gender'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('gender') }}</strong>
											</div>
										@endif
									</div>
								</div>

								<div class="form-group row">
									{!! Form::label('entry_date','Data de Ingresso:',['class'=>'col-sm-3 col-form-label'])  !!}
									<div class="col-sm-9">
									{!! Form::date('entry_date', null, [ 'class' => 'form-control ' . ( $errors->has('entry_date') ? ' is-invalid' : '' )]) !!}
										@if($errors->has('entry_date'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('entry_date') }}</strong>
											</div>
										@endif
									</div>
								</div>

								<div class="form-group">
									{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
								</div>

							{!! Form::close() !!}
		
					
						</div><!-- /.card-body -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
			{!! Form::close() !!}
		</div>
	</div>
</div>
<!-- /.row -->
@stop