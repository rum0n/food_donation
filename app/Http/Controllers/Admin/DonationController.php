<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert;
use App\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::orderBy('id','DESC')->get();
//        dd($donations);
        return view('admin.donations.index', compact('donations'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return redirect()->route('admin.donations.index');
    }

    public function status($id)
    {
        $donation = Donation::find($id);

        $status = $donation->status;

        if($status == 0){
            $status = 1;
        }

        $donation->status = $status;
        $donation->save();

        Toastr::success('Successfully Approved !' ,'Donation');
        return redirect()->back();
    }

}
