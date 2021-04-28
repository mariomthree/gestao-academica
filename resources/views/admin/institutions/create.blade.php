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
                                {!! Form::label('institution','Nome:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                {!! Form::text('institution', null, [ 'class' => 'form-control ' . ( $errors->has('institution') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('institution'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('institution') }}</strong>
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

                            <div class="form-group row">
                                {!! Form::label('teaching_id','Ensino:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    @foreach($internships as $teaching)
                                    <div class="form-check">
                                        <input class="form-check-input"  id="{{$teaching->id}}" name="teaching_id[]" type="checkbox" value="{{$teaching->id}}">
                                        <label class="font-weight-normal form-check-label" id="{{$teaching->id}}">{{$teaching->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="form-group row text-left">
                                {!! Form::label('userData','Dados do Utilizador:',['class'=>'col-sm-3 col-form-label font-weight-normal text-uppercase']) !!}
                                <div class=" col-sm-9"></div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('name','Nome:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('name',null,['class'=>'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                {!! Form::label('email','E-mail:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::email('email',null,['class'=>'form-control'. ( $errors->has('email') ? ' is-invalid' : '' )]) !!}
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('telephone','Telefone:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::number('telephone',null,['class'=>'form-control'.($errors->has('telephone') ? ' is-invalid' : '' ),'min'=>0,'size'=>9]) !!}
                                    @if($errors->has('telephone'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('telephone') }}</strong>
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
