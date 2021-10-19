<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class NotifController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('notifikasi');
    }

    public function sukses()
    {
        # code...
        return redirect('pesan');
    }

    public function peringatan()
    {
        # code...
    }

    public function gagal()
    {
        # code...
    }
}
