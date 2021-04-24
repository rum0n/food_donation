<?php

namespace App\Http\Controllers;

use App\Donation;
use App\OurCampaign;
use App\Subscriber;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function index()
    {
        $approve_donations = Donation::where('status',1)->count();
        $donars = User::where('role_id',3)->count();
        $volunteers = User::where('role_id',2)->count();

        $donations = Donation::latest()->paginate(3);

        return view('frontEnd.home', compact('donations', 'approve_donations','donars', 'volunteers'));
    }

    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email' => 'required'
        ]);

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;
        $subscriber->save();

        Toastr::success('You have Successfully Subscribed !');
        return back();
    }

    public function single_details($id)
    {
        $donation = Donation::find($id);

        $approve_donations = Donation::where('status',1)->count();
        $donars = User::where('role_id',3)->count();
        $volunteers = User::where('role_id',2)->count();


        return view('frontEnd.single_view', compact('donation', 'approve_donations','donars', 'volunteers'));
    }

    public function ourCampaigns()
    {
        $approve_donations = Donation::where('status',1)->count();
        $donars = User::where('role_id',3)->count();
        $volunteers = User::where('role_id',2)->count();

        $campaigns = OurCampaign::latest()->where('id','!=',1)->paginate(3);

        return view('frontEnd.all_campaign', compact('campaigns', 'approve_donations','donars', 'volunteers'));
    }

    public function campaign_details($id)
    {
        $approve_donations = Donation::where('status',1)->count();
        $donars = User::where('role_id',3)->count();
        $volunteers = User::where('role_id',2)->count();

        $campaign = OurCampaign::findOrFail($id);
        return view('frontEnd.campaign_view', compact('campaign', 'approve_donations', 'donars', 'volunteers'));
    }


}
