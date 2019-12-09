<?php

namespace App\Http\Controllers;

use App\ChatRoom;
use Illuminate\Http\Request;
use Storage;
use App\Http\Requests\ChatRoomsRequest;

class ChatRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chatrooms.index')->with(['chatrooms'=>ChatRoom::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chatrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ChatRoomsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChatRoomsRequest $request)
    {
       ChatRoom::create($request->validated());
       session()->flash('info','Proceso ejecutado correctamente');
       return redirect()->route('chatrooms.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ChatRoom $chatRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatRoom $chatRoom)
    {
        return view('chatrooms.edit',compact('chatRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChatRoomsRequest  $request
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function update(ChatRoomsRequest $request, ChatRoom $chatRoom)
    {
     $chatRoom->fill($request->validated());
     $chatRoom->save();
     session()->flash('info','Proceso ejecutado correctamente');
     return redirect()->route('chatrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatRoom  $chatRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatRoom $chatRoom)
    {
        $image=$chatRoom->path_image;
        $chatRoom->delete();
        Storage::disk('public')->delete($image);
        session()->flash('info','Proceso ejecutado correctamente');
        return redirect()->route('chatrooms.index');
    }
}
