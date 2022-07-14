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

    public function acceptDean($userID)
    {
        if (Gate::allows('onlyAdmins', auth()->user())) {
            $user = User::find($userID);
            $user->isAdmin = true;
            $user->save();
            return redirect('/')->with('message', 'User has been made into an admin');
        } else {
            return redirect('/')->with('message', 'You are not an admin, you can not allow');
        }
    }

    public function denyDean($userID)
    {
        if (Gate::allows('onlyAdmins', auth()->user())) {
            $user = User::find($userID);
            $user->isAdmin = false;
            $user->save();
            return redirect('/')->with('message', 'User was denied being an admin');
        } else {
            return redirect('/')->with('message', 'You are not an admin, you can not deny');
        }
    }
}
