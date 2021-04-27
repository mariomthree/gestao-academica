@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Perfil</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
            <li class="breadcrumb-item active">Perfil</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@stop

@section('content')
<div class="row">
    <div class="card card-secondary" style="width: 100%;">
        <div class="card-header">
        </div>
        <div class="accountiner-fluid" style="padding: 20px;">
            <div class="text-center">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
            </div>
            {!! Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\ProfileController@profileUpdate', $user->id],'id'=>'form','files'=>true]) !!}
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile mt-4">
                            <div class="text-center">

                                <img id="profile-user-img" style="height: 128px; width: 128px;" class="profile-user-img img-fluid img-circle" src="{{$user->adminlte_image()}}" alt="User profile picture">
                            </div>
                            <div class="form-group" style="margin-top: 3.5rem;">
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
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#account" data-toggle="tab">Conta</a></li>
                                <li class="nav-item"><a class="nav-link" href="#account-security" data-toggle="tab">Segurança da Conta</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="account">
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
                                            {!! Form::number('telephone',null,['class'=>'form-control'. ( $errors->has('telephone') ? ' is-invalid' : '' )]) !!}
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
                                            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.tab-pane -->
                               
                                <div class="tab-pane" id="account-security">
                                    {!! Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\ProfileController@profilePasswordUpdate', $user->id],'id'=>'form','files'=>true]) !!}

                                    <div class="form-group row">
                                        {!! Form::label('password','Palavra-passe Actual:',['class'=>'col-sm-4 col-form-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::password('password',['class'=>'form-control' . ( $errors->has('password') ? ' is-invalid' : '' ),'size'=>9]) !!}
                                            @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('new_password','Nova Palavra-passe:',['class'=>'col-sm-4 col-form-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::password('new_password',['class'=>'form-control' . ( $errors->has('new_password') ? ' is-invalid' : '' ),'size'=>9]) !!}
                                            @if($errors->has('new_password'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {!! Form::label('password_confirmation','Confirmar Nova Palavra-passe:',['class'=>'col-sm-4 col-form-label']) !!}
                                        <div class="col-sm-8">
                                            {!! Form::password('password_confirmation',['class'=>'form-control' . ( $errors->has('password_confirmation') ? ' is-invalid' : '' ),'size'=>9]) !!}
                                            @if($errors->has('password_confirmation'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-9 offset-3">
                                            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.row -->
    @stop