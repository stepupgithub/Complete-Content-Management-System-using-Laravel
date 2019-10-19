<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use App\Role;
use App\Post;
use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;

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
        if(trim($request->password) == '')
        {
             $input = $request->except('password');
        }
        else
        {
             $input = $request->all();
             $input['password'] = bcrypt($request->password);
        }


        if($file = $request->file('photo_id'))
        {
             $name = time() . $file->getClientOriginalName();
             $file->move('images', $name);
             $photo = Photo::create(['file' => $name]);
             $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('/admin/users');
    }


    public function show($id)
    {
     return view('admin.users.show');
    }


    public function edit($id)
    {
     $user = User::findOrFail($id);
     $roles = Role::lists('name', 'id')->all();
     return view('admin.users.edit', compact('user','roles'));
    }


    public function update(UsersEditRequest $request, $id)
    {
       $user = User::findOrFail($id);

       if(trim($request->password) == '')
        {
             $input = $request->except('password');
        }
        else
        {
             $input = $request->all();
             $input['password'] = bcrypt($request->password);
        }


       if($file = $request->file('photo_id'))
       {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
       }

       $user->update($input);
       return redirect('/admin/users');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->photo['file'])
        {
          unlink(public_path() . $user->photo['file']);
        }
        $user->delete();
        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/users');
    }
}
