<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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

    public function updateimg(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        // return $request->file('file');
        $image =  $request->file('file');
        $nombre = $image->getClientOriginalName();
        // $request->file('file')->store('imgProfile');
        Storage::disk('public')->put($nombre, file_get_contents($request->file('file')->getPathName()));

        // return $nombre;
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                // 'id' => '',
                'name' => 'required',
                'email' => 'required|email',
                'file' => 'image|max:2048',
                // 'password' => 'required',
            ]
        );

        $nombre = auth()->user()->imgProfile;

        if ($request->file('file')) {
            $image =  $request->file('file');
            $nombre = $image->getClientOriginalName();
            Storage::disk('public')->put($nombre, file_get_contents($request->file('file')->getPathName()));
        }

        /* $user = User::find(request('id'));
        $user->name = request('name');
        $user->email = request('email');
        $user->imgProfile = $nombre;
        $user->save(); */

        DB::table('users')->where('id', request('id'))->update(['name' => request('name'), 'email' => request('email'), 'imgProfile' => $nombre]);

        return view('Home');
    }
}
