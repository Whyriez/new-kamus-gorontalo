<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kata;
use App\Models\User;

class UserController extends Controller
{
   //   Visitor View Routing
    public function viewWelc(){
       return view('welcome');
    }

    public function viewRegister(){
      return view('auth.register');
    
    }
    public function adminSidebar(){
      return view('layout.adminSidebar');
    
    }

    public function proses_register(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'fullName' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'phone_number' => 'required|string|min:6|max:15',
                // dd($request->all())
            ]);
            // dd($request->all());
            User::create([
                'fullname' => $request->fullName,
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'role' => 'Pending',
                'phone_number' => $request->phone_number,
            ]);

            return redirect('register_pending')->with('success', 'Pendaftaran sukses, Terimakasih telah mendaftar! 🫡😁 Silahkan menunggu admin untuk aktivasi akun.');
        } catch (\Throwable $e) {
            // dd($e->getMessage());
            Log::error('Error in registration: ' . $e->getMessage()); 
            $errors = ['error' => $e->getMessage()];
            // dd($errors->all());
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function afterRegister(){
      return view('auth.afterRegister');
    }

    public function appVisitor(){
      return view('layout.appVisitor');
    }

    public function search(Request $request) {
      $query = $request->input('q');
      
      $results = Kata::where('gorontalo', 'LIKE', "%$query%")
                      ->orWhere('indonesia', 'LIKE', "%$query%")
                      ->get();
      
      return view('search_result', compact('results'));
    }
    
    public function getById($primaryKey) {
      $kata = Kata::find($primaryKey);
  
      if (!$kata) {
          return redirect()->back()->with('error', 'Kata tidak ditemukan.');
      }
  
      return view('detail_kata', compact('kata'));
    }

    //##########======== Admin View Routing =========############

    public function formCreateKata(){
      return view('admin.createKata')->with(['user' => Auth::user()]);
    }

    public function viewAturEditor(){
      $dataEditor = User::whereIn('role', ['editor', 'pending'])->get();

      return view('admin.aturEditor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
    }

    public function viewDaftarKata(){
      $dataKata = Kata::all();
      return view('admin.daftarKata')->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }
    public function editKata($id_kata){
      $dataKata = Kata::where('id_kata', $id_kata)->get();
        
      return view('admin.editKata')->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }

    public function updateKata(Request $request){
      // dd($request->all());  
      $id = $request->input('id_kata');
      // dd($id);
      $gorontalo = $request->gorontalo;
      $indonesia = $request->indonesia;
      $kategori = $request->kategori;
      $kalimat = $request->kalimat;
      $pengucapan = $request->pengucapan;
      $suara = $request->suara;
      $gambar = $request->gambar;

      // dd($id, $gorontalo, $indonesia, $kategori, $kalimat, $pengucapan, $suara, $gambar);
      $kata = Kata::find($id);
      $kata->gorontalo = $gorontalo; 
      $kata->indonesia = $indonesia;
      $kata->kategori = $kategori;
      $kata->kalimat = $kalimat;
      $kata->pengucapan = $pengucapan;
      $kata->gambar = $gambar;
      $kata->suara = $suara;
      $kata->save();

      $dataKata = Kata::all();
      return redirect()->route('daftarKata')
        ->with('success', 'Data berhasil diubah.')
        ->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }

    public function viewEditEditor($id){
      
      $dataEditor = User::where('id', $id)->get();

      return view('admin.edit_editor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
    }

    public function validasiEditor(Request $request){
      // $dataEditor = User::where('id', $id)->get();
      // $dataEditor = User::where('id', $id)->get();
      // $id = $request->input('id');
      // $role = $request->role;
      $editor = User::find($request->id);

      if ($editor) {
        // Update role pengguna
        $editor->role = $request->role;
        $editor->save();
      }
      // $editor = User::find($id);
      // $editor->role = $role;
      // $role->save();

    //   User::insert([
        
    //     'role' => $request->role,
    //     // 'role' => 'Pending',
    // ]);
      

      return view('admin.edit_editor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
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
        // $data = Kata::where('id_kata', $id)->get();
        Kata::where('id_kata', $id)->delete();
        
        return redirect()->route('daftarKata')->with('success', 'Data berhasil dihapus.');
        
        // Ref. Delete File
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

        }
    }

    
    
}
