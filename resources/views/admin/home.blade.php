@extends('adminlte::page')

@section('title', 'Gestão Academica')

@section('content_header')
    <h1 class="m-0 text-dark">Painel de Controle</h1>
@stop

@section('content')
    <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-fw fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" >Instituições</span>
                <span class="info-box-number">
                  786 000
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
                <span class="info-box-number">41 410</span>
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
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ITEM 03</span>
                <span class="info-box-number">20%</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    </div>

@stop

@section('js')
@stop