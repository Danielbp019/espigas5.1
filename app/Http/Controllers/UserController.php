<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search($request->name)
            ->role($request->role)
            ->paginate(20);
        return view('user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request['name'],
                'role' => $request['role'],
                'password' => $request['password'], //en el modelo se define la encriptacion
                'active' => $request['active'],
            ]);
            Session::flash('message', 'Usuario Creado Correctamente');
            return Redirect::to('/user');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al crear el usuario. Por favor, inténtalo de nuevo.');
            return Redirect::to('/user');
        }
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
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user,
        ]);
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
        try {
            $user = User::find($id); //se busca por id
            $user->fill($request->all());
            $user->save();
            Session::flash('message', 'Usuario Actualizado Correctamente');
            return Redirect::to('/user');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al actualizar el usuario. Por favor, inténtalo de nuevo.');
            return Redirect::to('/user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);
            Session::flash('message', 'Usuario Eliminado Correctamente');
            return Redirect::to('/user');
        } catch (\Exception $e) {
            Session::flash('error', 'Hubo un problema al eliminar el usuario. Por favor, inténtalo de nuevo.');
            return Redirect::to('/user');
        }
    }
}
