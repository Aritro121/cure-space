<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public function bookingData(Request $req)
    {
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['phone'] = $req->phone;
        $data['gender'] = $req->gender;
        $data['date'] = $req->date;
        $data['department'] = $req->department;
        $data['comments'] = $req->comments;
        $data['user_id'] = $req->user_id;
        Booking::create($data);
        Alert::success('Success', 'Your booking is confirmed');
        return redirect()->back();
    }

    public function bookingList()
    {
        $data = Booking::with('user')->orderBy('created_at', 'desc')->get();

        return view('backend.pages.bookingList', ['Book' => $data]);
    }


    public function accept($id)
    {
        $post = Booking::findOrFail($id);
        $post->status = 'accepted';
        $post->save();

        Alert::success('Booking Accepted', 'The booking has been successfully accepted.');

        return redirect()->back();
    }


    public function reject($id)
    {
        $post = Booking::findOrFail($id);
        $post->status = 'rejected';
        $post->save();

        Alert::error('Booking Rejected', 'The booking has been rejected.');

        return redirect()->back();
    }

}
