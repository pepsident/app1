<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\MalasngodingEmail;
use App\Mail\RequestSalinanPutusan;
use App\Mail\TesKirimEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\MessageBag;

class RequestSalinanController extends Controller{
        public function index()
        {
            //$perkara = DB::table('perkara')->paginate(10);

            return view('formrequest',['perkara']);
        }

        public function attributes(){
            return[
                'cari' => 'nomor perkara',
            ];
        }

        public function cari(Request $request){
            $this->validate($request,[
                'cari' => 'required',
                'email' => 'required',
                'pihakygmengambil' => 'required',
                'jampengambilan' => 'required',
                'tanggalpengambilan' => 'required',
                ], [
                    'cari.required' => 'Nomor Perkara wajib diisi',
                    'email.required' => 'Email wajib diisi',
                    'pihakygmengambil.required' => 'Pihak yang Mengambil wajib diisi',
                    'jampengambilan.required' => 'Jam Pengambilan wajib diisi',
                    'tanggalpengambilan.required' => 'Tanggal Pengambilan wajib diisi',
                ]);



            //menangkap data pencarian
            $cari = $request->cari;
            $email = $request->email;
            $jam = $request->jampengambilan;
            $pengambil = "";
            $pihak = $request->pihakygmengambil;

            if ($pihak == '1') {
                $pengambil = $request->nama_pengambil1;
            }
            elseif ($pihak == 'other') {
                $pengambil = $request->nama_pengambil2;
            }

            //$validator = Validator::make(['name' => 'required']);
            //$this->validate($request, ['cari'=>'required']);


            //mengambil data dari table pegawai sesuai pencarian data
            $perkara = DB::table('perkara')
            //->where('nomor_perkara','like',"%".$cari."%")
            ->where('nomor_perkara','=',$cari)
            //->paginate();
            ->pluck('jenis_perkara_nama');

            //$hasil = [$perkara];


            $pihak1 = DB::table('perkara')
            ->where('nomor_perkara',$cari)
            ->pluck('pihak1_text');

            //Mail::to($email)->send(new MalasngodingEmail($email, $perkara, $pihak1, $jam, $pengambil));
            //Mail::to($email)->send(new TesKirimEmail($email, $perkara, $pihak1, $jam, $pengambil));
            Mail::to($email)->send(new RequestSalinanPutusan($email, $perkara, $pihak1, $jam, $pengambil));

            //mengirim data pegawai ke view index
            //return view('formrequest', ['perkara' => $perkara]);
            //return view('formrequest');
            return Redirect::action('App\Http\Controllers\RequestSalinanController@index')->withErrors('Berhasil dikirim, cek email anda');
        }

        public function validasi(Request $request)
        {
            $this->validate($request,['cari'=>'required']);

            return view('proses',['data'=>$request]);
        }

        public function proses(Request $request)
        {
            $messages = [
                'required' => ':attribute Wajib Diisi',
            ];

            $this->validate($request,[
            'cari' => 'required',
            'email' => 'required',
            'pihakygmengambil' => 'required',
            'jampengambilan' => 'required',
            'tanggalpengambilan' => 'required',
            ], [
                'cari.required' => 'Nomor Perkara wajib diisi',
                'email.required' => 'Email wajib diisi',
                'pihakygmengambil.required' => 'Pihak yang Mengambil wajib diisi',
                'jampengambilan.required' => 'Jam Pengambilan wajib diisi',
                'tanggalpengambilan.required' => 'Tanggal Pengambilan wajib diisi',
            ]);

            $this->cari($request);
            //return Redirect::action('App\Http\Controllers\RequestSalinanController@index');
            //return redirect()->action([RequestSalinanController::class, 'cari'],[$request]);
            //return redirect()->route('cari', $request);
            //return view('formrequest',['data' => $request]);
        }

        public function messages(){
            return[
                'cari.required' => 'nomor perkara wajib diisi',
            ];
        }


    }
