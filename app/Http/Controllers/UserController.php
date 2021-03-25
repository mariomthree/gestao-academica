<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Models\Photo;

use function PHPUnit\Framework\isNull;

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
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        return $request->all();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);   
        $data['photo_id'] = $this->uploadPhotoAndReturnPhotoId($request);

        User::create($data);
        return redirect('admin/users')->with('success','Utilizador adicionado.');
    }

    private function uploadPhotoAndReturnPhotoId(Request $request, User $user = null){
        $photo_id = $user->photo_id;
        if ($file = $request->file('photo_id')) {
            $name = time().$file->getClientOriginalName();
            $uploaded = $file->move('uploads/images',$name);
            if ($uploaded) 
                if (isNull()) {
                    $photo = Photo::findOrFail($user->photo_id);
                    $this->deleteOldPhotoFromLibrary($photo->file);
                    $photo->file = $name;
                    $photo->save();
                }else{
                    $photo = Photo::create(['file'=>$name]);       
                }
                $photo_id = $photo->id;
        }
        return $photo_id;
    }

    private function deleteOldPhotoFromLibrary($file){
        if(file_exists(substr($file,1)))
          unlink(substr($file,1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.users.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
