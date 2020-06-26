<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(10);
        return view('user.index',compact('users'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->is_admin=false;
        $user->save();
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('articles');
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,'.$user->id],

        ]);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('user.index');
    }
    public function changePassword(Request $request,User $user){
        return view('user.changePassword',compact('user'));
    }
    public function passwordUpdate(Request $request,User $user){
        $request->validate([

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index');

    }

    public function setAdmin(User $user){
        if($user->is_admin==false||$user->id==1){
            $user->is_admin=true;
        }else{
            $user->is_admin=false;
        }
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->loadCount('store','articles');
        if($user->store_count==0&&$user->articles_count==0){
            $user->delete();
            return redirect()->route('user.index')->with('alert-success','User '.$user->name.'is deleted successfully');
        }
        return redirect()->route('user.index')->with('alert-warning','Can\'t delete user with store and articles');
    }
}
