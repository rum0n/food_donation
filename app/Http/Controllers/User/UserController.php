<?php

namespace App\Http\Controllers\User;

use App\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $id =  Auth::id();
        $donations = Donation::where('user_id',$id)->latest()->get();
//        dd($donations);
        return view('user.user_dashboard', compact('donations'));
    }

    public function edit(){
        return view('user.user.edit');

}
    public function update(Request $request, $id) {

        $user = User::find($id);
        $user->name = $request->name;
        $user->about = $request->about;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if($request->hasFile('pro_pic')){

            $this->validate($request,[
                'pro_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $pic = $request->file('pro_pic');
            $file_name = time().'.'.$pic->getClientOriginalExtension();

            if($user->pro_pic=='default.png'){
                $user->pro_pic = $file_name;
            }
            else{
                $path=public_path('user/proPic/'.$user->pro_pic);
                unlink($path);

                $user->pro_pic = $file_name;
            }

            Image::make($pic)->resize(300,300)->save(public_path('user/proPic/'.$file_name));
        }

        $user->save();
//        Toastr::success('Successfully Updated !' ,'Profile');
        return redirect()->route('user.dashboard');

    }



}
