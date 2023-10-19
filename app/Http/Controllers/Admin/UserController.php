<?php

<<<<<<< HEAD
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:users.index|users.create|users.edit|users.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->when(request()->q, function($users) {
            $users = $users->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password'))
        ]);

        //assign role
        $user->assignRole($request->input('role'));

        if($user){
=======


namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;



class UserController extends Controller

{

    /**

     * __construct

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware(['permission:users.index|users.create|users.edit|users.delete']);

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $users = User::latest()->when(request()->q, function($users) {

            $users = $users->where('name', 'like', '%'. request()->q . '%');

        })->paginate(10);



        return view('admin.user.index', compact('users'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::latest()->get();

        return view('admin.user.create', compact('roles'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'name'      => 'required',

            'email'     => 'required|email|unique:users',

            'password'  => 'required|confirmed'

        ]);



        $user = User::create([

            'name'      => $request->input('name'),

            'email'     => $request->input('email'),

            'password'  => bcrypt($request->input('password'))

        ]);



        //assign role

        $user->assignRole($request->input('role'));



        if($user){

>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
            //redirect dengan pesan sukses
            return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

<<<<<<< HEAD
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
=======


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit(User $user)

>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
    {
        $roles = Role::latest()->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

<<<<<<< HEAD
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
=======


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, User $user)

    {

>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$user->id
        ]);

<<<<<<< HEAD
        $user = User::findOrFail($user->id);

        if($request->input('password') == "") {
            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email')
            ]);
        } else {
            $user->update([
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password'))
            ]);
        }

        //assign role
        $user->syncRoles($request->input('role'));

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.user.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $user = User::findOrFail($id);
        $user->delete();


        if($user){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
=======


        $user = User::findOrFail($user->id);



        if($request->input('password') == "") {

            $user->update([

                'name'      => $request->input('name'),

                'email'     => $request->input('email')

            ]);

        } else {

            $user->update([

                'name'      => $request->input('name'),

                'email'     => $request->input('email'),

                'password'  => bcrypt($request->input('password'))

            ]);

        }



        //assign role

        $user->syncRoles($request->input('role'));



        if($user){

            //redirect dengan pesan sukses

            return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Diupdate!']);

        }else{

            //redirect dengan pesan error

            return redirect()->route('admin.user.index')->with(['error' => 'Data Gagal Diupdate!']);

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

        $user = User::findOrFail($id);

        $user->delete();





        if($user){

            return response()->json([

                'status' => 'success'

            ]);

        }else{

            return response()->json([

                'status' => 'error'

            ]);

        }

    }

>>>>>>> aeaa1901be2ed012d25892bfa1eb8031346f5d8d
}