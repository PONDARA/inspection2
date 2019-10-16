<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\location;
use Illuminate\Http\Request;
use Image;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $count_admin = DB::table('users')->where('user_type_id',1)->count();
        $count_stuff = DB::table('users')->where('user_type_id',2)->count();
        $count_security = DB::table('users')->where('user_type_id',3)->count();
        $admins = User::where('user_type_id',1)->get();
        $stuffs =User::where('user_type_id',2)->get();
        $securitys =User::where('user_type_id',3)->get();
        $count_inspection = DB::table('user_inspects')->count();
        return view('users.index', ['users' => $model->paginate(15)],compact('count_admin','count_stuff','count_security','count_inspection','admins','stuffs','securitys'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }
    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function createStuff()
    {
        return view('users.createStuff');
    }
    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function createSecurity()
    {
        $locations=Location::all();
        return view('users.createSecurity',compact('locations'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeStuff(UserRequest $request)
    {
        $request->validate([
        'name'=>'required|min:3',
        'gender'=> 'required',
        'email'=>'required',
        'password'=>'required|confirmed'
      ]);
      $stuff = new User([
        'name'=>$request->get('name'),
        'gender'=> $request->get('gender'),
        'user_type_id' => 2,
        'email'=>$request->get('email'),
        'password'=>$request->get('password'),
        'created_at'=>now(),
        'updated_at'=>now(),
        'profile_img'=>'defaul.jpg',
      ]);
      $stuff->save();
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }
    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSecurity(Request $request)
    {
        $request->validate([
        'name'=>'required|min:3',
        'phone_number'=>'required',
        'dob'=>'required',
        'gender'=> 'required',
        'location'=>'required',
      ]);
        $filename='';
        if($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300, 300)->save( public_path('/storage/securityGuard/' . $filename ) );
        }
        else{
            $filename = 'defaul.jpg';
        }
      $security = new User([
            'name'=>$request->get('name'),
            'phone_number'=> $request->get('phone_number'),
            'dob'=>$request->get('dob'),
            'gender'=>$request->get('gender'),
            'location_id'=>$request->get('location'),
            'profile_img'=>$filename,
            'created_at'=>now(),
            'user_type_id' => 3,
          ]);
      $security->save();
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }
}
