<?php

namespace App\Http\Controllers;

use App\Models\Waifu;
use App\Mail\TestEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'waifus.index',
            [
                // to use pages, use paginate() instead of get()
                //'waifus' => Waifu::latest()->filter(request(['tag', 'search']))->get()
                'waifus' => Waifu::latest()->filter(request(['tag', 'search']))->paginate(4)
            ]
        );
    }

    public function private()
    {
        if (Gate::allows('onlyAdmins', auth()->user())) {
            return view('private');
        } else {
            abort(403);
        }
    }

    public function acceptDean()
    {
        $user = User::find(2);
        $user->isAdmin = true;
        $user->save();
    }

    public function denyDean()
    {
        $user = User::find(2);
        $user->isAdmin = false;
        $user->save();
    }
}
