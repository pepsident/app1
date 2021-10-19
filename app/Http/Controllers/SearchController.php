<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\MalasngodingEmail;
    
    class SearchController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('autosearch',[]);
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function autocomplete(Request $request)
        {
            $data = DB::table('perkara')
                    ->select('nomor_perkara')
                    ->where("nomor_perkara","LIKE","%{$request->query}%")
                    ->get();
    
            return response()->json($data);
        }
    }