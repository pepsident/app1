<?php

    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\DB;
    use App\Models\Order;
    
 
    use Illuminate\Http\Request;
    
    
    class PegawaiController extends Controller
    {
        public function index()
        {
            // mengambil data dari table pegawai
            $pegawai = DB::table('pegawai')->paginate(10);

            // mengirim data pegawai ke view index
            return view('index',['pegawai' => $pegawai]);
    
        }

        //method untuk menampilkan view form tambah pegawai
        public function tambah(){

            return view('tambah');
        }

        //method untuk insert data ke table pegawai
        public function store(Request $request){
            // insert data ke table pegawai
            DB::table('pegawai')->insert([
                'pegawai_nama' => $request->nama,
                'pegawai_jabatan' => $request->jabatan,
                'pegawai_umur' => $request->umur,
                'pegawai_alamat' => $request->alamat
            ]);
            // alihkan halaman ke halaman pegawai
            return redirect('/pegawai');
        }

        /*public function search(Request $request){
            /*$pegawai = DB::table('pegawai')
                        ->where('pegawai_nama', '=', $request->nama)
                        ->get();

            $pegawai = Order::search('pegawai')->where('pegawai_nama', $request)->get();

            return view('search', ['pegawai' => $pegawai]);
        }*/

        public function cari(Request $request){
            //menangkap data pencarian
            $cari = $request->cari;

            //mengambil data dari table pegawai sesuai pencarian data
            $pegawai = DB::table('pegawai')
            ->where('pegawai_nama','like',"%".$cari."%")
            ->paginate();

            //mengirim data pegawai ke view index
            return view('index', ['pegawai' => $pegawai]);
        }
    }