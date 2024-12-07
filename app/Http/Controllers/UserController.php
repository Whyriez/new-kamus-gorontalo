<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kata;

class UserController extends Controller
{
   //   VIEW ROUTING
    public function viewWelc(){
       return view('welcome');
    }

    public function formCreateKata(){
      return view('admin.createKata')->with(['user' => Auth::user()]);
    }

    public function viewDaftarKata(){
      $dataKata = Kata::all();
      return view('admin.daftarKata')->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }
    
    public function viewDashboard(){
      return view('admin.dashboard')->with(['user' => Auth::user()]);
    }

    public function simpanKata(Request $request){
      
      $gorontalo = $request->gorontalo;
      $indonesia = $request->indonesia;
      $kategori = $request->kategori;
      $kalimat = $request->kalimat;
      $pengucapan = $request->pengucapan;
      $suara = $request->suara;
      $gambar = $request->gambar;

      Kata::insert([
         'gorontalo' => $request->gorontalo,
         'indonesia' => $request->indonesia,
         'kategori' => $request->kategori,
         'kalimat' => $request->kalimat,
         'pengucapan' => $request->pengucapan,
         'gambar' => $request->gambar,
         'suara' => $request->suara,
     ]);

      return redirect('create_kata')->with('success', 'Data berhasil ditambahkan.');
    }
    
    
}
