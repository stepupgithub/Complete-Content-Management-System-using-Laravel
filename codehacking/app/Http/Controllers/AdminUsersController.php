<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\UsersRequest;

class AdminUsersController extends Controller
{

    public function index()
    {
         $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
     return view('admin.users.create');
    }


    public function store(UsersRequest $request)
    {
        User::create($request->all());
        return redirect('/admin/users');
     // return $request->all();
    }


    public function show($id)
    {
     return view('admin.users.show');
    }


    public function edit($id)
    {
     return view('admin.users.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
