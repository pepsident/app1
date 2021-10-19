<?php

    namespace App\Http\Controllers;
        use Illuminate\Support\Facades\DB;
        use App\Models\Order;
        //use App\Mail;
        use App\Mail\MalasngodingEmail;
        use Illuminate\Support\Facades\Mail;
        use Illuminate\Http\Request;
        use Illuminate\Mail\Mailable;

class PerkaraController extends Controller {
        Public function index()
        {
            // mengambil data dari table pegawai
            $perkara = DB::table('perkara')->paginate(10);

            // mengirim data pegawai ke view index
            return view('index2',['perkara' => $perkara]);
    
        }

        public function cari(Request $request){
            //menangkap data pencarian
            $cari = $request->cari;
            $email = $request->email;

            //mengambil data dari table pegawai sesuai pencarian data
            $perkara = DB::table('perkara')
            //->where('nomor_perkara','like',"%".$cari."%")
            ->where('nomor_perkara','=',$cari)
            ->paginate();


            //Mail::to($email)->send(new MalasngodingEmail($email, $cari));

            //mengirim data pegawai ke view index
            return view('index2', ['perkara' => $perkara]);
        }

        
    }
