<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        $roles = Role::pluck('name', 'id');

        return view('admin.users.profile', [
            'user' => $user,
            'roles' => $roles
        ]);
    }


    public function profilePasswordUpdate(ProfilePasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data['password'] = Hash::make($request->new_password);
        $user->update($data);
        return redirect('admin/profile')->with('success', 'Palavra-passe actualizada.');
    }

    public function profileUpdate(ProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $data['photo_id'] = $this->uploadPhotoAndReturnPhotoId($request, $user);
        $user->update($data);
        return redirect('admin/profile')->with('success', 'Utilizador actualizado.');
    }

    private function uploadPhotoAndReturnPhotoId(Request $request, User $user = null)
    {
        $photo_id = $user->photo_id;
        if ($request->file('photo_id')) {
            
            $str_path = $request->file('photo_id')->store('public/users');
            $array_path = explode("/",$str_path);
            $fileName = $array_path[count($array_path)-1];

            if ($user->photo_id) {
                $photo = Photo::findOrFail($user->photo_id);
                Storage::delete($photo->file);
                $photo->file = $fileName;
                $photo->save();
            } else {
                $photo = Photo::create(['file' => $fileName]);
                $photo_id = $photo->id;
            }
        }
        return $photo_id;
    }

}
