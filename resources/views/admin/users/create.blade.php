@extends('adminlte::page')

@section('title', 'Medicine')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Adicionar Utilizadores</h1>
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
		<div class="card-body" style="padding: 20px;">
			{!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\UserController@store'],'id'=>'form','files'=>true]) !!}
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile mt-4">
						<div class="text-center">

							<img id="profile-user-img" style="height: 128px; width: 128px;" class="profile-user-img img-fluid img-circle"
								src="/vendor/adminlte/dist/img/user.png"
								alt="User profile picture">
						</div>
						<ul class="list-group list-group-unbordered mb-3" style="margin-top: 4.2rem;">
							<li class="list-group-item">
							<b>Profile picture:</b>
							</li>
						</ul>
						<div class="form-group">
							<div class="custom-file">
								{!!Form::label('photo_id','Picture:',['class'=>'custom-file-label']) !!}
								{!! Form::file('photo_id',null,['class'=>'form-control custom-file-input','accept'=>'image/*']) !!}       
							</div>
						</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					</div>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="card">
						<div class="card-header p-2">
						</div><!-- /.card-header -->
						<div class="card-body">

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
									{!! Form::label('telephone','Telefone:',['class'=>'col-sm-3 col-form-label ']) !!}
									<div class="col-sm-9">
										{!! Form::number('telephone',null,['class'=>'form-control'. ( $errors->has('telephone') ? ' is-invalid' : '' ),'size'=>9]) !!}
										@if($errors->has('telephone'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('telephone') }}</strong>
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
									{!! Form::label('password','Palavra-passe:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('password',['class'=>'form-control' . ( $errors->has('password') ? ' is-invalid' : '' )]) !!}
										@if($errors->has('password'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('password') }}</strong>
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
								<div class="form-group row">
									{!! Form::label('role_id','Função:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::select('role_id',$roles,null,['class'=>'form-control custom-select']) !!}
										@if($errors->has('role_id'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('role_id') }}</strong>
											</div>
										@endif
									</div>
								</div>
								<div class="form-group row">
									{!! Form::label('description','Descrição:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::textarea('description',null,['class'=>'form-control' . ( $errors->has('description') ? ' is-invalid' : '' ),'rows'=>3]) !!}	
										<small>Breve descrição sobre o utilizador.</small>
										@if($errors->has('description'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('description') }}</strong>
											</div>
										@endif
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-9 offset-3">
										{!! Form::submit('Adicionar',['class'=>'btn btn-primary']) !!}
									</div>
								</div>
						</div>
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