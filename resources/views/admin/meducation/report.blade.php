@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.css') }}">
@stop
@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Produtividade</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
        <li class="breadcrumb-item active">Produtividade</li>
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
									<h3 class="card-title">Produtividade Geral</h3>
								</div>
								<div class="card-body  table-responsive">
								<table id="table" class="table table-striped">
									<thead>
										<tr>
											<th>Instituição</th>
											<th>Estudantes</th>
											<th>Professores</th>
											<th>Distrito</th>
											<th>Provincia</th>
										</tr>
									</thead>
									<tbody>
										@if($institutions)
											@foreach($institutions as $institution)
												<tr>
													<td>{{$institution->name}}</td>
													<td>{{$institution->students->count()}}</td>
													<td>{{$institution->teachers->count()}}</td>
													<td>{{$institution->district->name}}</td>
													<td>{{$institution->district->province->name}}</td>
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

@section('js')
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
    ( function( $ ){
		$('#table').DataTable({
	      "paging": true,
	      "lengthChange": true,
	      "searching": true,
	      "ordering": true,
	      "info": true,
	      "autoWidth": true
	    });
    })(jQuery);
  </script>@stop