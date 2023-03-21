<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

class VistaController extends Controller
{
    /* 
    ? index para mostrar todos los datos
    ? store para guardar datos
    ? update para actualizar
    ? destroy para eliminar
    ? edit para mostrar un formulario de edicion
    */

    /* public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    } */

    /* public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        dd($user);

        return view('login.login');
    } */

    public function update()
    {
        $this->validate(
            request(),
            [
                // 'id' => '',
                'name' => 'required',
                'email' => 'required|email',
                // 'password' => 'required',
            ]
        );

        // dd($this);
        $user = User::find(request('id'));
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        // dd($user);

        return view('pagues/user-profile');
    }
}
