<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bouncer;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function role(){
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
        $moderator = Bouncer::role()->firstOrCreate([
            'name' => 'moderator',
            'title' => 'Moderator',
        ]);


        $createChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'create-chatroom',
            'title' => 'create chatroom',
        ]);
        $editChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'edit-chatroom',
            'title' => 'edit chatroom',
        ]);
        $deleteChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'delete-chatroom',
            'title' => 'delete chatroom',
        ]);
        $indexChatRoom = Bouncer::ability()->firstOrCreate([
            'name' => 'index-chatroom',
            'title' => 'index chatroom',
        ]);

        $asignaRol = Bouncer::ability()->firstOrCreate([
            'name' => 'asigna-rol',
            'title' => 'asigna roles al sitio',
        ]);

        Bouncer::allow($admin)->to($createChatRoom);
        Bouncer::allow($admin)->to($editChatRoom);
        Bouncer::allow($admin)->to($deleteChatRoom);
        Bouncer::allow($admin)->to($indexChatRoom);
        Bouncer::allow($admin)->to($asignaRol);


        Bouncer::allow($moderator)->to($editChatRoom);
        Bouncer::allow($moderator)->to($indexChatRoom);


        (User::findOrFail(1))->assign('admin');
        (User::findOrFail(2))->assign('moderator');
        return redirect()->route('home');
    }
}
