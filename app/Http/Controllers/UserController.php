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

    public function viewRegister(){
      return view('auth.register');
    
    }
    public function afterRegister(){
      return view('auth.afterRegister');
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

    public function deleteKata($id)
    {
        $data = Kata::where('id_kata', $id)->get();
        Kata::where('id_kata', $id)->delete();
        
        return redirect()->route('daftarKata')->with('success', 'Data berhasil dihapus.');
        $dataDetail = Share::where('idFilePenelitian', $id)->get();
        if ($data) {
            $pathFile = $data->file;
            // dd($pathFile);
            if ($pathFile != null || $pathFile != '') {
                Storage::delete($pathFile);
            }

            foreach ($dataDetail as $share) {
                $share->delete();
            }

            Penelitian::where('id_file', $id)->delete();
        }
    }

    public function search(Request $request) {
      $query = $request->input('q');
      
      $results = Kata::where('gorontalo', 'LIKE', "%$query%")
                      ->orWhere('indonesia', 'LIKE', "%$query%")
                      ->get();
  
      return view('search_result', compact('results'));
    }
    
    public function getById($id) {
      $kata = Kata::find($id);
  
      if (!$kata) {
          return redirect()->back()->with('error', 'Kata tidak ditemukan.');
      }
  
      return view('detail_kata', compact('kata'));
    }
    
}
