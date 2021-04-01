@extends('adminlte::page')

@section('title', 'Gestão Academica')

@section('content_header')
    <h1 class="m-0 text-dark">Painel de Controle</h1>
@stop

@section('content')
    <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        @if(Auth::user()->hasRole(['institution','meducation']))
              <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-fw fa-graduation-cap"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" >Instituições</span>
                  <span class="info-box-number">
                  {{$institutions}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-fw fa-user-graduate"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Estudantes</span>
                    <span class="info-box-number">{{$students}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fw fa-chalkboard-teacher "></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Professores</span>
                    <span class="info-box-number">{{$teachers}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-globe-africa"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Distritos</span>
                    <span class="info-box-number">{{$districts}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
          @elseif(Auth::user()->hasRole(['admin']))
          <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-fw fa-graduation-cap"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Utilizadores</span>
                    <span class="info-box-number">{{$users}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-fw fa-user-graduate"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Provincias</span>
                    <span class="info-box-number">{{$provinces}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fw fa-chalkboard-teacher "></i></span>
                  <div class="info-box-content">
                  <span class="info-box-text">Distritos</span>
                    <span class="info-box-number">{{$districts}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-globe-africa"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Tipos de Ensino</span>
                    <span class="info-box-number">{{$teachings}}</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
          @endif
    </div>

@stop

@section('js')
@stop