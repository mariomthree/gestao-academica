@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Provincias</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Provincias</li>
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
						<div class="col-sm-12 col-md-5">

							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Nova Provincia</h3>
								</div>
								<div class="card-body">

									<div class="success text-center">
										<strong>Dados actualidados.</strong>
									</div>

									{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\ProvinceController@store', 'id'=>'form']) !!}	
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
											{!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}
										</div>
									{!! Form::close() !!}
								</div>
							</div>

						</div>
						<div class="col-sm-12 col-md-7">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Todas Provincias</h3>
								</div>
								<div class="card-body  table-responsive">
								<table id="table" class="table table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Acção</th>
										</tr>
									</thead>
									<tbody>
										@if($provinces)
											@foreach($provinces as $province)
												<tr>
													<td>{{$province->name}}</td>
													<td class="text-right py-0 align-middle">
														{!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\ProvinceController@destroy',$province->id]]) !!}
														<div class="btn-group btn-group-sm">
															<a href="{{route('provinces.edit',$province->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
															<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
														</div>
													{!! Form::close() !!}
													</td>
												</tr>
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /.row -->
@stop
