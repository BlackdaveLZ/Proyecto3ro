<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users=User::all();

        // $users=DB::select("
        // SELECT * FROM users u
        // JOIN roles r ON u.rol_id=r.rol_id 
        // ");

        $users = DB::table('users as u')
        ->join('roles as r','u.rol_id','=','r.rol_id')
        ->select('*')
        ->get();

        return view('users.index')
        ->with('users',$users)
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles=Roles::all();
        return view('users.create', ['roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        // dd($input);
        User::create($input);
        return redirect(route('users.index') );
        //guardar los datos del registro
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($usu_id)
    {
        //
        $users= User::find($usu_id);
        $roles= Roles::all();

       return view('users.edit',['user' => $users, 'roles'=>$roles]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $usu_id)
    {
        //actualizar
        $input=$request->all();
        $users=User::find($usu_id);
        $users->update($input);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($usu_id)
    {
        //
        $users=User::find($usu_id);
        $users->delete();
        return redirect()->route('users.index');
    }
}
