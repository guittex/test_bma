<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->method() == "POST"){
            $rules = [
                'email'    => 'unique:users'
              ];
              
            $messages = [
                'unique'    => 'E-mail já esta em uso'
            ];
            
            $request->validate($rules,$messages);

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->birth_date = date('Y-m-d', strtotime($request->birth_date));

            $user->save();

            return redirect("/")->with('msg', 'Salvo com successo');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $user = User::findOrFail($id);

        if($request->method() == 'POST'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);

            $user->save();

            return redirect("/")->with('msg', 'Salvo com successo');
        }

        return view("users.edit", [
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/')->with('msg', 'Deletado com sucesso');
    }
}
