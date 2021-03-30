@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Instituições</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Instituições</li>
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
						<h3 class="card-title">Nova Instituição</h3>
					</div>
					<div class="card-body">

						{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\InstitutionController@store', 'id'=>'form']) !!}	
                            <div class="form-group row text-left">
                                {!! Form::label('institutionData','Dados da Instituição:',['class'=>'col-sm-3 col-form-label font-weight-normal text-uppercase']) !!}
                                <div class=" col-sm-9"></div>
                            </div>

							<div class="form-group row">
                                {!! Form::label('institutionName','Nome:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                {!! Form::text('institutionName', null, [ 'class' => 'form-control ' . ( $errors->has('institutionName') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('institutionName'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('institutionName') }}</strong>
                                        </div>
                                    @endif
                                </div>
							</div>

							<div class="form-group row">
                                {!! Form::label('district_id','Distrito:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                {!! Form::select('district_id',$districts,null,[ 'class' => 'form-control custom-select form-control-border ' . ( $errors->has('district_id') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('district_id'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('district_id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row text-left">
                                {!! Form::label('userData','Dados do Utilizador:',['class'=>'col-sm-3 col-form-label font-weight-normal text-uppercase']) !!}
                                <div class=" col-sm-9"></div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('userName','Nome:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('userName',null,['class'=>'form-control' . ( $errors->has('userName') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('userName'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('userName') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                {!! Form::label('userEmail','E-mail:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::email('userEmail',null,['class'=>'form-control'. ( $errors->has('userEmail') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('userEmail'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('userEmail') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('userPassword','Palavra-passe:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::password('userPassword',['class'=>'form-control' . ( $errors->has('userPassword') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('userPassword'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('userPassword') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('is_active','Estado:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('is_active',array(0=>'Inactivo',1=>'Activo'),null,['class'=>'form-control custom-select']) !!}
                                    @if($errors->has('is_active'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('is_active') }}</strong>
                                        </div>
                                    @endif
                                </div>
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
