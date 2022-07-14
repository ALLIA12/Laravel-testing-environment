<?php

namespace App\Http\Controllers;

use App\Models\Waifu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WaifuController extends Controller
{
    // show all
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
    // show single 
    public function show(Waifu $waifu)
    {
        return view('waifus.show', ['waifu' =>  $waifu]);
    }

    // show create form
    public function create()
    {
        return view('waifus.create');
    }


    // store waifu data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('waifus', 'company')],
            'game' => 'required',
            'age' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'descreption' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('logos', 'public');
            //                        add the file path ,     upload the file
        }

        $formFields['user_id'] = auth()->id();

        Waifu::create($formFields);

        // To flash a message to the user do Something like this, but idk what the class to import is
        // Session::flash('message','Waifu created');

        // another way is with the ->with
        return redirect('/')->with('message', 'Waifu created succesfully');
    }

    //Show Edit form
    public function edit(Waifu $waifu)
    {
        //Make sure logged in user is owner
        if (auth()->user()->id != $waifu->user_id) {
            abort(403, 'Unauthorized Action');
        }
        return view('waifus.edit', ['waifu' => $waifu]);
    }

    //Update waifu data
    public function update(Request $request, Waifu $waifu)
    {
        //Make sure logged in user is owner
        if (auth()->user()->id != $waifu->user_id) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'game' => 'required',
            'age' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'descreption' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('logos', 'public');
            //                        add the file path ,     upload the file
        }


        $waifu->update($formFields);

        // To flash a message to the user do Something like this, but idk what the class to import is
        // Session::flash('message','Waifu created');

        // another way is with the ->with
        return back()->with('message', 'Waifu updated succesfully');
    }

    //Delete waifu
    public function destroy(Waifu $waifu)
    {
        //Make sure logged in user is owner
        if (auth()->user()->id != $waifu->user_id) {
            abort(403, 'Unauthorized Action');
        }
        $waifu->delete();
        return redirect('/')->with('message', 'Waifu deleted succesfully');
    }

    // Manage Waifus
    public function manage()
    {
        // ignore the warning, it will go to the model instead of the guard file
        return view('waifus.manage', ['waifus' => auth()->user()->waifus()->get()]);
    }
}
