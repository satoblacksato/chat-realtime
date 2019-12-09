@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                           <b>CHAT ROOMS</b>
                        </div>
                        <div class="col-md-4 text-right"><a class="btn btn-danger btn-sm" href="{{route('chatrooms.index')}}">REGRESAR</a></div>
                    </div>
                </div>
                {!!Form::open(['route'=>['chatrooms.update',$chatRoom],'files'=>true,'method'=>'PUT'])!!}
                <div class="card-body">
                    {!! Field::text('name',$chatRoom->name,['label'=>'Nombre de la Sala','required']) !!}
                    {!! Field::textarea('description',$chatRoom->description,['rows'=>3,'label'=>'Descripción de la Sala','required']) !!}
                    {!! Field::file('path_image',['label'=>'Imagen de la sala'])!!}
                    <img src="{{ asset('storage/'.$chatRoom->path_image)}}" width="100%"/>
                </div>
                <div class="card-footer">
                    {!! Form::submit('GRABAR',['class'=>'btn btn-primary btn-block'])!!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
