<?php

namespace App\Http\Controllers\User;

use App\Donation;
use App\FoodType;
use App\OurCampaign;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $types = FoodType::all();

            return view('user.donation.create',compact('types'));

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

        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'food_type'=>'required',
            'quantity'=>'required|numeric',
            'pickuptime'=>'required',
            'pickupdate'=>'required|after_or_equal:'.$todayDate,
            'description'=>'required',
            'mobile_no'=>'required|numeric',
            'pickup_address'=>'required',
            'food_pic'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $id = Auth::user()->id;

        $donate = new Donation();

        $donate->user_id = $id;
        $donate->food_type_id = $request->food_type;
        $donate->quantity = $request->quantity;
        $donate->pickuptime = $request->pickuptime;
        $donate->pickupdate = $request->pickupdate;
        $donate->description = $request->description;
        $donate->mobile_no = $request->mobile_no;
        $donate->pickup_address = $request->pickup_address;
        $donate->campaign_id = $request->campaign_id;
        $donate->lat = $request->lat;
        $donate->lon = $request->lon;

        // if($donate->campaign_id != 1)
        // {
        //     $donate->campaign_id = $request->campaign_id;
        // }
        

        if ($request->hasFile('food_pic')) {
            $image = $request->file('food_pic');

            $pic = $image->getClientOriginalName();
            $input = time().$pic;

            $destinationPath = public_path('/donation/thumbnail');

            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input);

            $destinationPath = public_path('/donation/donationPic');
            $image->move($destinationPath, $input);
            // $fileName = 'images/'.$fileName;

            $donate->food_pic =$input;
        }
        $donate->save();

        Toastr::success('Successfully Completed !' ,'Donation');
        return redirect()->route('user.dashboard');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = Donation::find($id);
//        dd($donation);
        return view('user.donation.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation = Donation::find($id);
        $types = FoodType::all();
        return view('user.donation.edit',compact('types', 'donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'food_type'=>'required',
            'quantity'=>'required|numeric',
            'pickuptime'=>'required',
            'pickupdate'=>'required|after_or_equal:'.$todayDate,
            'description'=>'required',
            'mobile_no'=>'required|numeric',
            'pickup_address'=>'required',
            'food_pic'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $donation = Donation::find($id);
//        dd($donation);
        $donation->food_type_id = $request->food_type;
        $donation->quantity = $request->quantity;
        $donation->pickuptime = $request->pickuptime;
        $donation->pickupdate = $request->pickupdate;
        $donation->description = $request->description;
        $donation->mobile_no = $request->mobile_no;
        $donation->pickup_address = $request->pickup_address;
        $donation->lat = $request->lat;
        $donation->lon = $request->lon;

        if ($request->hasFile('food_pic')) {

            $pic = $donation->food_pic;

            if(!empty($pic)) {
                $path_1 = public_path() . '/donation/thumbnail/' . $pic;
                $path_2 = public_path() . '/donation/donationPic/' . $pic;

                if (file_exists($path_1)) {
                    unlink($path_1);
                }
                if (file_exists($path_2)) {
                    unlink($path_2);
                }
            }

            $image = $request->file('food_pic');

            $pic = $image->getClientOriginalName();
            $input = time().$pic;

            $destinationPath = public_path('/donation/thumbnail');

            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input);

            $destinationPath = public_path('/donation/donationPic');
            $image->move($destinationPath, $input);
            // $fileName = 'images/'.$fileName;

            $donation->food_pic =$input;
        }
        $donation->save();

        Toastr::success('Successfully Updated !' ,'Donation');
        return redirect()->route('user.dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */

//    public function destroy($id)
//    {
//        dd($id);
//        $donation = Donation::find($id);
//
//        $pic = $donation->food_pic;
//        $path_1 = public_path().'/donation/thumbnail/'.$pic;
//        $path_2 = public_path().'/donation/donationPic/'.$pic;
//
//        if (file_exists($path_1)) {
//            unlink($path_1);
//
//        }
//        if (file_exists($path_2)) {
//            unlink($path_2);
//        }

//        $donation->delete();
//
//        Toastr::success('Successfully Deleted !' ,'Donation');
//        return redirect()->back();
//    }

    public function delete_donation($id){

        $donation = Donation::find($id);

        $pic = $donation->food_pic;
        $path_1 = public_path().'/donation/thumbnail/'.$pic;
        $path_2 = public_path().'/donation/donationPic/'.$pic;

        if (file_exists($path_1)) {
            unlink($path_1);

        }
        if (file_exists($path_2)) {
            unlink($path_2);
        }

        $donation->delete();

        Toastr::success('Successfully Deleted !' ,'Donation');
        return back();
    }


    public function donate_now($campaign_id)
    {
        $types = FoodType::all();

        return view('user.donation.donate',compact('types','campaign_id'));
    }


}
