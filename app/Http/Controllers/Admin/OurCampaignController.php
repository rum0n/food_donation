<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\notification\SubscriberPost;
use App\Notifications\notification\userPost;
use App\OurCampaign;
use App\Subscriber;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;


class OurCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = OurCampaign::latest()->get();
        return view('admin.campaign.index', compact('campaigns'));
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
//        dd($request->all());

        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $campaign = new OurCampaign();
        $campaign->name = $request->name;
        $campaign->description = $request->description;

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');

            $pic = $image->getClientOriginalExtension();
            $input = time().'.'.$pic;

            $destinationPath = public_path('/campaign_pics/');
            $image->move($destinationPath, $input);

            $campaign->picture =$input;
        }
        $campaign->save();

        // Message send to Subscriber
        $subscriber = Subscriber::all();
        $total_sub = count($subscriber);

        // dd($subscriber_email);
        if($total_sub > 0){
            foreach ($subscriber as $sub) {
                $subscriber_email = $sub->email;
                Notification::route('mail',$subscriber_email)
                    ->notify(new SubscriberPost($campaign));

            }
        }
        $all_user = User::where('role_id',3)->get();
        $total_user = count($all_user);
        if($total_user > 0){
            foreach ($all_user as $user) {
                $user_email = $user->email;
                Notification::route('mail',$user_email)
                    ->notify(new userPost($campaign));

            }
        }

        Toastr::success('Successfully Created !' ,'Campaign');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurCampaign  $ourCampaign
     * @return \Illuminate\Http\Response
     */
    public function show(OurCampaign $ourCampaign)
    {
//        $campaigns = OurCampaign::latest()->get();
        return view('admin.campaign.show', compact('ourCampaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurCampaign  $ourCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(OurCampaign $ourCampaign)
    {
        return view('admin.campaign.edit', compact('ourCampaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurCampaign  $ourCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurCampaign $ourCampaign)
    {
//        dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'picture'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $ourCampaign->name = $request->name;
        $ourCampaign->description = $request->description;

        if ($request->hasFile('picture')) {

            $pic = $ourCampaign->picture;

            if(!empty($pic)) {
                $path_1 = public_path() . '/campaign_pics/' . $pic;
                if (file_exists($path_1)) {
                    unlink($path_1);
                }
            }

            $image = $request->file('picture');

            $pic = $image->getClientOriginalExtension();
            $input = time().'.'.$pic;

            $destinationPath = public_path('/campaign_pics');
            $image->move($destinationPath, $input);

            $ourCampaign->picture =$input;
        }
        $ourCampaign->save();

        Toastr::success('Successfully Updated !' ,'Campaign');
        return redirect()->route('admin.our_campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurCampaign  $ourCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurCampaign $ourCampaign)
    {
        $pic = $ourCampaign->picture;
        if(!empty($pic)) {
            $path_1 = public_path() . '/campaign_pics/' . $pic;
            if (file_exists($path_1)) {
                unlink($path_1);
            }
        }
        $ourCampaign->delete();

        Toastr::success('Successfully Deleted !' ,'Campaign');
        return redirect()->back();
    }
}
