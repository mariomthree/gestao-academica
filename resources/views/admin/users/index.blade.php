@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Utilizadores</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Utilizadores</li>
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
									<h3 class="card-title">Todos Utilizadores</h3>
								</div>
								<div class="card-body  table-responsive">
								<table id="table" class="table table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Email</th>
											<th>Função</th>
											<th>Estado</th>
											<th>Acção</th>
										</tr>
									</thead>
									<tbody>
										@if($users)
											@foreach($users as $user)
												<tr>
													<td>{{$user->name}}</td>
													<td>{{$user->email}}</td>
													<td>{{$user->is_active == 1 ? 'Activo' : 'Inactivo'}}</td>
													<td>{{$user->roles->get(0)->name}}</td>
													<td class="text-right py-0 align-middle">
														{!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\UserController@destroy',$user->id]]) !!}
														<div class="btn-group btn-group-sm">
															<a href="{{route('users.edit',$user->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
