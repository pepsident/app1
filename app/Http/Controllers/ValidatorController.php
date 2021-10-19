<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ValidatorController extends Controller
    {
        public function input()
        {
            return view('input');
        }

        public function proses(Request $request)
        {
            $messages = [
                'required' => ':attribute Wajib Diisi',
            ];

            $this->validate($request,[
            'cari' => 'required',
            'email' => 'required',
            'nama_pengambil1' => 'required'
            ], $messages);

            return view('formrequest',['data' => $request]);
        }
    }