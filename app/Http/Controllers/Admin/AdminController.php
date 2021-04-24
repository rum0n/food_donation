<?php

namespace App\Http\Controllers\Admin;

use App\Donation;
use App\OurCampaign;
use App\Subscriber;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $donations = Donation::all()->count();
        $donars = User::where('role_id',3)->count();
        $volunteers = User::where('role_id',2)->count();
        $campaigns = OurCampaign::all()->count();

        return view('admin.dashboard.dashboard', compact('campaigns','donations', 'donars', 'volunteers'));
    }

    public function subscriber()
    {
        $subscriber = Subscriber::orderBy('id','DESC')->get();

        return view('admin.subscriber', compact('subscriber'));
    }

    public function delete_subscriber($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();

        Toastr::success('Successfully Deleted !' ,'Subscriber');
        return redirect()->back();
    }

}
