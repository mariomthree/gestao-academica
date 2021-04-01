<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
       $user = Auth::user(); 
       $roles = Role::pluck('name','id');

       return view('admin.users.profile',[
           'user' => $user,
           'roles' => $roles
       ]); 
    }


    public function updatePassword()
    {

    }


    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->except('role_id');
        $data['password'] = $user->password;
        $data['photo_id'] = $this->uploadPhotoAndReturnPhotoId($request, $user);
        $user->update($data);
       
        $role = Role::findOrFail($request->role_id);
        $user->detachRoles($user->roles);
        $user->attachRole($role);

        return redirect('admin/users')->with('success','Utilizador actualizado.');
    }

    private function uploadPhotoAndReturnPhotoId(Request $request, User $user = null){
        $photo_id = $user->photo_id;
        if ($request->file('photo_id')) {
            $path = $request->file('photo_id')->store('uploads/avatars');
            if($user->photo_id){
                $photo = Photo::findOrFail($user->photo_id);
                $photo->file = $path;
                $photo->save();
            }else{
                $photo = Photo::create(['file' => $path]);
                $photo_id = $photo->id;
            }
        }
        return $photo_id;
    }
}
