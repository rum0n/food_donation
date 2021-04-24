<?php

namespace App\Http\Controllers\Volunteer;

use App\Donation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class VolunteerController extends Controller
{
    public function index()
    {
        $donations = Donation::where('status',1)
                    ->orWhere('status',2)
                    ->latest()->get();
        return view('volunteer.volunteer', compact('donations'));
    }

    public function edit(){
        return view('volunteer.profile');

    }

    public function update(Request $request, $id) {

//        $user = User::find($id);
        $user =Auth::user();
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
        Toastr::success('Successfully Updated !' ,'Profile');
        return redirect()->route('volunteer.dashboard');

    }

    public function single_view($id)
    {
        $donation = Donation::find($id);

        return view('volunteer.donation_view', compact('donation'));
    }
    public function collect_donation($id)
    {
//        dd($id);
        $donation = Donation::find($id);
        $donation->status = 2;
        $donation->save();

        Toastr::success('Successfully Collected !' ,'Donation');
        return back();
        }


}
