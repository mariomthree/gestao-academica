<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Photo;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name','<>','institution')->get()->pluck('name','id');
        return view('admin.users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {  
        $data = $request->except('role_id');
        $data['password'] = bcrypt($request->password);   
        $data['photo_id'] = $this->uploadPhotoAndReturnPhotoId($request);

        $user = User::create($data);
        
        $role = Role::findOrFail($request->role_id);
        $user->attachRole($role); 
        
        return redirect('admin/users')->with('success','Utilizador adicionado.');
    }

    private function uploadPhotoAndReturnPhotoId(Request $request, User $user = null){
        $photo_id = null;
        if ($request->file('photo_id')) {
            $path = $request->file('photo_id')->store('uploads/avatars');
            if($user->photo_id){
                $photo = Photo::findOrFail($user->photo_id);
                $photo->file = $path;
                $photo->save();
                $user->photo_id;
            }else{
                $photo = Photo::create(['file' => $path]);
                $photo_id = $photo->id;
            }
        }
        return $photo_id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('name','<>','institution')->get()->pluck('name','id');
        return view('admin.users.edit',[
            'user'  => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        return $request->all();
        $user = User::findOrFail($id);

        $data = $request->except('role_id');
        $data['password'] = bcrypt($request->password);   
        $data['photo_id'] = $this->uploadPhotoAndReturnPhotoId($request, $user);
        $user->update($data);
       
        $role = Role::findOrFail($request->role_id);
        $user->detachRoles($user->roles);
        $user->attachRole($role);

        return redirect('admin/users')->with('success','Utilizador actualizado.');
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
        return redirect('admin/users')->with('success','Utilizador removido.');
    }
}
