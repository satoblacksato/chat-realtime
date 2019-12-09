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
                        <div class="col-md-4 text-right"><a class="btn btn-primary btn-sm" href="{{route('chatrooms.create')}}">CREAR</a></div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($chatrooms as $room)
                            <tr>
                                <th scope="row">{{$room->id}}</th>
                                <td>{{$room->name}}</td>
                                <td>{{$room->description}}</td>
                                <td>
                               {!!Form::open(['route'=>['chatrooms.destroy',$room],'method'=>'DELETE',
                                        'onsubmit'=>'return confirm("estas seguro que deseas eliminar el registro?")'])!!}
                                  <a href="{{route('chatrooms.edit',$room)}}" class="btn btn-primary btn-sm">
                                  <i class="fa fa-edit"></i>
                                  </a>
                                  {!!Form::button("<i class='fa fa-trash'></i>",
                                  ['type'=>'submit','class'=>'btn btn-danger btn-sm'])!!}
                               {!!Form::close()!!}
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4">NO EXISTEN SALAS DE CHAT</td></tr>
                        @endforelse
                       
                    </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    {{$chatrooms->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
