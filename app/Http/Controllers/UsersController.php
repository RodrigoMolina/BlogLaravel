<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    

    	$users = User::orderBy('id','ASC')->paginate(3);

    	return view('admin.users.index')->with('users', $users);
    }


    public function create(){
    	return view('admin.users.create');
    }

    public function store(UserRequest $request){

    	$user = new User($request->all());
    	$user->password = bcrypt($request->password);
    	$user->save();

        Flash::success("Se ha registrado a ".$user->name." de forma exitosa.");

    	return redirect()->route('users.index');

    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        Flash::error('El usuario '. $user->name . ' a sido borrado de forma exitosa');
        return redirect()->route('users.index');
    }

    public function edit($id){

        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        //Otra forma de hacerlo!
        //$user = fill($request->all());
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->save();

        Flash::warning('El Usuario '. $user->name . ' a sido editado.');
        return redirect()->route('users.index');   
    }

    

}
