@extends('adminlte::page')

@section('title', 'Gestão Academica')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Actualizar utilizador</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Página inícial</a></li>
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
			{!! Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\UserController@update', $user->id],'id'=>'form','files'=>true]) !!}
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
								src="{{$user->adminlte_image()}}"
								alt="User profile picture">
						</div>
						<ul class="list-group list-group-unbordered mb-3" style="margin-top: 4.2rem;">
							<li class="list-group-item">
							<b>Foto do Perfil:</b>
							</li>
						</ul>
						<div class="form-group">
							<div class="custom-file">
								{!!Form::label('photo_id','Foto:',['class'=>'custom-file-label']) !!}
								{!! Form::file('photo_id',null,['class'=>'form-control custom-file-input']) !!}       
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
										{!! Form::text('name',null,['class'=>'form-control']) !!}
									</div>
								</div>
								<div class="form-group row">
									{!! Form::label('telephone','Telefone:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::number('telephone',null,['class'=>'form-control']) !!}
									</div>
								</div>
								<div class="form-group row">
									{!! Form::label('email','Email:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::email('email',null,['class'=>'form-control']) !!}
									</div>
								</div>
								@if(Auth::user()->role->name == 'Administrator')
								<div class="form-group row">
									{!! Form::label('role_id','Função:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::select('role_id',[''=>'Selecionar']+$roles,null,['class'=>'form-control custom-select']) !!}
									</div>
								</div>
								
								<div class="form-group row">
									{!! Form::label('is_active','Estado:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::select('is_active',array(1=>'Activo',0=>'Inactivo'),null,['class'=>'form-control custom-select']) !!}
									</div>
								</div>
								@endif
								<div class="form-group row">
									{!! Form::label('password','Palavra-passe:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::password('password',['class'=>'form-control']) !!}
									</div>
								</div>
								<div class="form-group row">
									{!! Form::label('description','Descrição:',['class'=>'col-sm-3 col-form-label']) !!}
									<div class="col-sm-9">
										{!! Form::textarea('description',null,['class'=>'form-control','rows'=>3]) !!}	
										<small>Breve descrição do utilizador.</small>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-9 offset-3">
										{!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
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

@section('js')
<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/additional-methods.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/localization/messages_pt_PT.min.js') }}"></script>

<script>
(function($){ 
	$('#form').validate({
          rules: {
            name: {
              required: true
            },
            email :{
			  required: true,
			  email: true
            },
            telephone: {
              required: true,
              maxlength: 9,
              minlength: 9
            },
            is_active: {
              required: true,
			},
			role_id: {
              required: true,
            }
          },
          messages: {
            name: {
              required:  $.validator.messages.required,
            },
            email: {
              required:  $.validator.messages.required,
              email:  $.validator.messages.email
            },
            telephone: {
              required:  $.validator.messages.required,
              minlength:  $.validator.messages.minlength,
              maxlength:  $.validator.messages.maxlength
            },            
            is_active: {
              required:  $.validator.messages.required
            },            
            role_id: {
              required:  $.validator.messages.required
            }
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.col-sm-9').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
      });
})(jQuery);
</script>
@stop