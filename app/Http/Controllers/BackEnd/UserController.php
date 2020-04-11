<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $array = [
            'id-desc' , 'id-asc' , 'created_at-desc' , 'created_at-asc'
        ];


        if($status != null) {

            $explode = explode('-' , $status );
            if(in_array($status , $array) ){
                $users = User::orderBy($explode[0] , $explode[1])->paginate(10);

            } else {
                $users = User::where('admin' , $status)->paginate(5);
            }

        } else {
            $users = User::paginate(10);

        }
        if(Gate::allows('isAdmin') ) {
            return view('BackEnd.users.index' , compact('users'))->with('title' , trans('lang.Users Management'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        if(Gate::allows('isAdmin') ) {
        return view('BackEnd.users.create' , compact('roles'))->with('title' , trans('lang.Create User'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        if($data['password'] == $data['password_confirmation']) {
            $user->password = bcrypt($request->password);
        }
        //upload image
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Users') , $fileName);
            $data['image'] = $fileName;
        }

        $user->admin = $data['admin'];


        $user->save();
        Alert::success(trans('lang.record_update'));
        return redirect()->route('users.index');
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
        $this->authorize('isAdmin');

        $user = Carbon::now();
        $user = User::findOrfail($id);
        $roles = Role::all();


        if(Gate::allows('isAdmin') ) {
        return view('BackEnd.users.edit' , compact('user' , 'roles'))->with('title' , trans('lang.Edit User'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $data = $request->all();

        $user = User::findOrfail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(isset($data['password']) && $data['password'] != '' && $data['password'] == $data['password_confirmation']) {
            $user->password = bcrypt(request()->get('password'));
        } else {
            unset($user->password);
        }

        //upload Image
        if($request->hasFile('image')) {
            if($user->image)
            {
                @unlink('uploads/Users/'.$user->image);
            }
            $file = $request->file('image');
            $fileName = time()  . '.' .$file->getClientOriginalExtension();
            $file->move(public_path('uploads/Users') , $fileName);
            $data['image'] = $fileName;
            $user->image = $data['image'];
        }

        $user->admin = $data['admin'];
        $user->save();
        Alert::success(trans('lang.record_update'));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');
        $admin = User::findOrfail($id);
        //upload Logo
        if(!empty($admin->image)) {
            if($admin->image)
            {
                @unlink('uploads/Users/'.$admin->image);
            }
        }
        $admin->delete();
        return redirect()->route('users.index');
    }

    public function search(Request $request) {
        $search = strip_tags($request->search);
        $users = User::where('name' , 'like' , '%' .$search . '%')->orWhere('id' , 'like' , '%' . $search . '%')->orderBy('id' , 'desc')->paginate(10);
        return view('BackEnd.users.index' , compact('users'));
    }

}
