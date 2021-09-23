<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::findOrFail(auth()->id());
        return view('user/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $id = auth()->id();
        $user = User::findOrFail($id);
        return view('user/edit', compact('user'));
    }

    public function editPassword($id)
    {
        //
        $id = auth()->id();
        $user = User::findOrFail($id);
        return view('user/edit-password', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $updateUser = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'nickname' => 'required'
        ]);
        if ($request->email) {
            if ($request->email == $user->email ) {
                $request->validate([
                    'email' => 'required|email'
                ]);
            } else {
                $request->validate([
                    'email' => 'required|email|unique:users'
                ]);
            }
        };

        $updateUser = $request->except(['_token', '_method']);

        User::whereId($id)->update($updateUser);
        return redirect('/user')->with('message', 'Profil modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/login')->with('message', 'Profil supprimé');
    }
}