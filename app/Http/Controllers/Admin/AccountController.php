<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index()
    {
        // dd(session());
        $data = User::findOrFail(session('user')->id);
        // dd($data->order);
        $orders = $data->order;
        $nameparts = explode(' ', $data->name);
        if (count($nameparts) > 2) {
            $data->first_name = $nameparts[0] . ' ' . $nameparts[1];
            $data->last_name = implode(' ', array_slice($nameparts, 2));
        } else {
            $data->first_name = $nameparts[0];
            $data->last_name = $nameparts[1];
        }
        // dd($data);
        return view('account', compact('data','orders'));
    }
}
