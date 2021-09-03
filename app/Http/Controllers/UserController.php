<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('users.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']   = Group::arrayForList();
        $this->data['mode']     = 'create';
        return view('users.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $users = $request->all();
        if (User::create($users)) {
            Session::flash('message', 'User Created Successfully');
        }
        return redirect()->to('users');
    }

    public function show($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['group']        = Group::arrayForList();
        $this->data['menu_active']  = 'users';
        
        return view('users.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']     = User::findOrFail($id);
        $this->data['groups']   = Group::arrayForList();
        $this->data['mode']     = 'edit';
        return view('users.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $updateData = $request->all();
        $user = User::findOrFail($id);
        $user-> group_id    =  $updateData['group_id'];
        $user-> name        =  $updateData['name'];
        $user-> email       =  $updateData['email'];
        $user-> phone       =  $updateData['phone'];
        $user-> address     =  $updateData['address'];
        
        
        if ($user -> save()) {
            Session::flash('message', 'User Updated Successfully');
        }

        return redirect()->to('users');

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
        if ($user->delete()) {
            Session::flash('message', 'User Delete Successfully');
        }
        return redirect()->back();
    }
}
