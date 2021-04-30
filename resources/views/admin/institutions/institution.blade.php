@extends('adminlte::page')

@section('title')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dados da Instituição</h1>
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
		<div class="card-body" style="padding: 20px;">
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						<div class="card-header p-2">
						</div><!-- /.card-header -->
						<div class="card-body">
						<div class="card-body">

							<div class="form-group row">
								{!! Form::label('name','Nome:',['class'=>'col-sm-3 col-form-label']) !!}
								<div class="col-sm-9">
									{!! Form::text('name',$institution->name,['disabled'=>'disabled','class'=>'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
									@if($errors->has('name'))
										<div class="invalid-feedback">
											<strong>{{ $errors->first('name') }}</strong>
										</div>
									@endif
								</div>
							</div>

							<div class="form-group row">
								{!! Form::label('province','Provincia:',['class'=>'col-sm-3 col-form-label']) !!}
								<div class="col-sm-9">
									{!! Form::text('province',$institution->district->province->name,['disabled'=>'disabled','class'=>'form-control' . ( $errors->has('province') ? ' is-invalid' : '' )]) !!}
									@if($errors->has('province'))
										<div class="invalid-feedback">
											<strong>{{ $errors->first('province') }}</strong>
										</div>
									@endif
								</div>
							</div>

							<div class="form-group row">
								{!! Form::label('district','Distrito:',['class'=>'col-sm-3 col-form-label']) !!}
								<div class="col-sm-9">
									{!! Form::text('district',$institution->district->name,['disabled'=>'disabled','class'=>'form-control' . ( $errors->has('district') ? ' is-invalid' : '' )]) !!}
									@if($errors->has('district'))
										<div class="invalid-feedback">
											<strong>{{ $errors->first('district') }}</strong>
										</div>
									@endif
								</div>
							</div>

                            <div class="form-group row">
                                {!! Form::label('internship_id','Niveis:',['class'=>'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    @foreach($internships as $teaching)
                                        <div class="form-check">
                                            @if($institution->internships->where('name',$teaching->name)->count() > 0)
                                            <input checked class="form-check-input"  id="{{$teaching->id}}" name="internship_id[]" type="checkbox" value="{{$teaching->id}}">
                                            @else
                                            <input disabled class="form-check-input"  id="{{$teaching->id}}" name="internship_id[]" type="checkbox" value="{{$teaching->id}}">
                                            @endif
                                            <label class="font-weight-normal form-check-label" id="{{$teaching->id}}">{{$teaching->name}}</label>
                                        </div>
                                    @endforeach
									@if($errors->has('internship_id'))
										<div class="invalid-feedback">
											<strong>{{ $errors->first('internship_id') }}</strong>
										</div>
									@endif
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
		</div>
	</div>
</div>
<!-- /.row -->
@stop

