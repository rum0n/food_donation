<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id',2)
                        ->orWhere('role_id',3)
                        ->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (file_exists($user->pro_pic)) {
            unlink($user->pro_pic);
        }

        $user->delete();
//        toast($user->name.' has been deleted successfully!','success');
//        Toastr::success('Successfully Deleted !' ,'User');
        return redirect()->route('admin.users.index');
    }

    public function blockUnblock($id)
    {
        $user = User::findOrFail($id);

        $status =(($user->is_approved == 1)? 0:1);

        $user->is_approved = $status;
        $user->save();

        if($status == 1){
            Toastr::success('Successfully Unblocked !' ,'User');
        }
        else{
            Toastr::success('Successfully Blocked !' ,'User');
        }

        return redirect()->back();
    }

    //==========Promote Demote User=============
    public function promoteDemote($id)
    {
        $user = User::findOrFail($id);

        $status =(($user->role_id == 2)? 3:2);

        $user->role_id = $status;
        $user->save();

//        Alert::success('User has been approved !', '')->autoClose(3000);
//        ($status == 1)? toast('User has been Approved','success')->autoClose(3000):toast('User has been Blocked','success')->autoClose(3000);
        if($status == 2){
            Toastr::success('Promoted as Volunteer !' ,$user->name);
        }
        else{
            Toastr::success('Demoted as User !' ,$user->name);
        }

        return redirect()->back();
    }


}
