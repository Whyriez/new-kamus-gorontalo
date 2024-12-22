<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kata;
use App\Models\User;
use App\Models\EditHistory;

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
      $query = trim($request->input('q'));
      if (empty($query)) {
          return redirect()->back()->with('error', 'Masukkan kata kunci pencarian yang valid.');
      }
      $results = Kata::where('gorontalo', 'LIKE', "%$query%")
                      ->orWhere('indonesia', 'LIKE', "%$query%")
                      ->get();
      
      return view('search_result', compact('results'));
    }

    public function searchKataAdmin(Request $request) {
      $query = $request->input('q');
      
      $dataKata = Kata::where('gorontalo', 'LIKE', "%$query%")
                      ->orWhere('indonesia', 'LIKE', "%$query%")
                      ->paginate(10);
      $user = Auth::user();
  
      return view('admin.daftarKata', compact('dataKata','user'));
    }
    
    public function getById($primaryKey) {
      $kata = Kata::find($primaryKey);
  
      if (!$kata) {
          return redirect()->back()->with('error', 'Kata tidak ditemukan.');
      }
  
      return view('detail_kata', compact('kata','user'));
    }

    //##########======== Admin View Routing =========############

    public function formCreateKata(){
      return view('admin.createKata')->with(['user' => Auth::user()]);
    }

    public function viewProfile(){
      $user = Auth::user();
      // dd($user->profile_photo_path);
      return view('admin.detailProfil')->with(['user' => Auth::user()]);
    }
   
    public function viewEditProfile(){
      
      // $datauser = User::where('id', $id)->get();

      return view('admin.EditProfil')->with([ 'user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
{
    // Validasi inputan
    $request->validate([
        'name' => 'required|string|max:255',
        'fullname' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
        'phone_number' => 'nullable|string|min:6|max:15',
        'bio' => 'nullable|string',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $user = auth()->user(); // Ambil user yang sedang login

    // Update atribut model User secara manual
    $user->name = $request->name;
    $user->fullname = $request->fullname;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;
    $user->bio = $request->bio;

    // Simpan perubahan tanpa foto
    $user->save();
    
    // Jika ada foto profil, proses upload
    if ($request->hasFile('profile_photo')) {
        // Hapus foto lama jika ada
        if ($user->profile_photo_path && file_exists(public_path('storage/' . $user->profile_photo_path))) {
            unlink(public_path('storage/' . $user->profile_photo_path));
        }

        // Simpan foto baru
        $profilePicturePath = $request->file('profile_photo')->store('profile-pictures', 'public');
        $user->profile_photo_path = $profilePicturePath; // Update path gambar baru

        // Simpan perubahan gambar
        $user->save(); // Simpan perubahan gambar ke dalam database
    }

    return redirect()->route('viewProfile')->with('success', 'Profil berhasil diperbarui.');
}

    
    public function viewAturEditor(){
      $dataEditor = User::whereIn('role', ['editor', 'pending'])->get();

      return view('admin.aturEditor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
    }

    public function viewDaftarKata(){
      // $dataKata = Kata::paginate(500);
      $dataKata = Kata::all();
      return view('admin.daftarKata')->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }
    public function viewKata($id_kata){
      $dataKata = Kata::where('id_kata', $id_kata)->get();
        
        return view('admin.viewKata')->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }
    public function editKata($id_kata){
      $dataKata = Kata::where('id_kata', $id_kata)->get();
        
      return view('admin.editKata')->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
    }

    public function updateKata(Request $request)
{
    try {
        // Validasi request
        $request->validate([
            'id_kata' => 'required|exists:katas,id_kata',
            'gorontalo' => 'required|string|max:255',
            'indonesia' => 'required|string',
            'kategori' => 'required|string|max:255',
            'kalimat' => 'required|string|max:255',
            'pengucapan' => 'required|string|max:255',
            'suara' => 'nullable|file|max:10240',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data kata berdasarkan ID
        $kata = Kata::find($request->input('id_kata'));

        // Update field kata
        $kata->gorontalo = $request->input('gorontalo');
        $kata->indonesia = $request->input('indonesia');
        $kata->kategori = $request->input('kategori');
        $kata->kalimat = $request->input('kalimat');
        $kata->pengucapan = $request->input('pengucapan');

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');

            // Hapus gambar lama jika ada
            if ($kata->gambar && file_exists(public_path('storage/' . $kata->gambar))) {
                unlink(public_path('storage/' . $kata->gambar));
            }

            $kata->gambar = $gambarPath;
        }

        // Proses upload suara
        if ($request->hasFile('suara')) {
            $suaraPath = $request->file('suara')->store('suara', 'public');
            $kata->suara = $suaraPath;
        }

        // Simpan data kata yang telah diupdate
        $kata->save();

        // Log history edit
        EditHistory::create([
            'id_kata' => $kata->id_kata,
            'id_editor' => auth()->user()->id,
            'action' => 'edit',
            'activity' => $request->input('activity'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('daftarKata')
            ->with('success', 'Data berhasil diubah.');

    } catch (\Exception $e) {
        // Log error jika terjadi pengecualian
        Log::error('Error saat menyimpan kata: ' . $e->getMessage());

        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
}


    public function viewEditEditor($id){
      
      $dataEditor = User::where('id', $id)->get();

      return view('admin.edit_editor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
    }

    public function validasiEditor(Request $request){
      
      // $dataEditor = User::find($request->id);
      $id = $request->id;
      $dataEditor = User::where('id', $id)->get();
      // $dataEditor = User::find($id);

      foreach ($dataEditor as $editor) {
        // Update role pengguna
        $editor->role = $request->role;
        // Simpan perubahan
        $editor->save();
      }

      return view('admin.edit_editor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
    }
    public function tolakEditor(Request $request){

      // $dataEditor = User::find($request->id);
      $id = $request->id;
      $dataEditor = User::where('id', $id)->get();
      // $dataEditor = User::find($id);


      foreach ($dataEditor as $editor) {
        // Update role pengguna
        $editor->role = $request->role;
        // Simpan perubahan
        $editor->save();
      }

      return view('admin.edit_editor')->with(['dataEditor' => $dataEditor, 'user' => Auth::user()]);
    }
    
    public function viewDashboard(){
      $user = Auth::user();
      $userId = $user->id;
      $totalKata = Kata::count();
      $editor = User::where('role', 'editor')->count();
      $pending = User::where('role', 'pending')->count();
      $kontribusi = EditHistory::where('id_editor', $userId)->count();

      return view('admin.dashboard')->with([
        'user' => Auth::user(),
        'editor' => $editor,
        'pending' => $pending,
        'totalKata' => $totalKata,
        'kontribusi' => $kontribusi,
      ]);
    }

    public function simpanKata(Request $request)
    {
      try {
        $request->validate([
            'gorontalo' => 'required|string|max:255',
            'indonesia' => 'required|string',
            'kategori' => 'required|string|max:255',
            'kalimat' => 'nullable|string',
            'pengucapan' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'audio' => 'nullable|file|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        $audioPath = null;
        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('audio-files', 'public');
        }

        $kata = Kata::create([
            'gorontalo' => $request->gorontalo,
            'indonesia' => $request->indonesia,
            'kategori' => $request->kategori,
            'kalimat' => $request->kalimat,
            'pengucapan' => $request->pengucapan,
            'gambar' => $gambarPath,
            'suara' => $audioPath,
        ]);

        EditHistory::create([
            'id_kata' => $kata->id_kata,
            'id_editor' => auth()->user()->id,
            'action' => 'create',
            'activity' => 'Menambahkan kata ' . $kata->gorontalo,
        ]);

        return redirect()->route('daftarKata')->with('success', 'Data berhasil ditambahkan.');
    } catch (\Exception $e) {

        Log::error('Error saat menyimpan kata: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    }
    }

    public function deleteKata($id)
    {
        // $data = Kata::where('id_kata', $id)->get();
        Kata::where('id_kata', $id)->delete();
        
        return redirect()->route('daftarKata')->with('success', 'Data berhasil dihapus.');
    }

    public function userHistory(Request $request, $user_id = null)
{
    // Jika $user_id null, gunakan ID pengguna yang sedang login
    $user_id = $user_id ?? Auth::user()->id;

    // Ambil riwayat kontribusi berdasarkan user_id
    $editHistories = EditHistory::where('id_editor', $user_id)->get();

    // Mengambil data user untuk ditampilkan di halaman
    $user = Auth::user();

    // Mengirim data ke view
    return view('admin.detailHistory', [
        'editHistories' => $editHistories,
        'user' => $user
    ]);
}

    public function daftarHistory()
    {
        // Mengambil semua data log history dengan relasi kata dan editor
        $editHistories = EditHistory::with('kata', 'user')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(20);

        // Mengirim data ke view
        return view('admin.detailHistory')->with(['editHistories' => $editHistories, 'user' => Auth::user()]);
    }

    public function searchHistory(Request $request)
{
    // Retrieve the search term from the AJAX request
    $searchTerm = $request->get('search');

    // Filter the history records based on search term
    $editHistories = EditHistory::with(['kata', 'user'])
        ->whereHas('kata', function ($query) use ($searchTerm) {
            $query->where('gorontalo', 'like', '%' . $searchTerm . '%')
                  ->orWhere('indonesia', 'like', '%' . $searchTerm . '%')
                  ->orWhere('kategori', 'like', '%' . $searchTerm . '%');
        })
        ->orWhereHas('user', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })
        ->orWhere('action', 'like', '%' . $searchTerm . '%')
        ->orWhere('activity', 'like', '%' . $searchTerm . '%')
        ->get();

    // Return the filtered results as JSON
    return view('admin.detailHistory')->with(['editHistories' => $editHistories, 'user' => Auth::user()]);
    }

        public function filterEditor(Request $request)
    {
        // Mengambil nilai 'role' yang dikirim dari form filter
        $role = $request->input('role');

        // Jika role 'editor' dipilih
        if ($role == 'editor') {
            // Menampilkan data pengguna dengan role 'editor'
            $dataEditor = User::where('role', 'editor')->get();
            dd('anjay');
        }
        // Jika role 'pending' dipilih
        else if ($role == 'pending') {
          // dd('yasalh');
            // Menampilkan data pengguna dengan role 'pending'
            $dataEditor = User::where('role', 'pending')->get();
        }
        // Jika tidak ada filter (default) maka tampilkan semua pengguna
        else {
            $dataEditor = User::whereIn('role', ['editor', 'pending'])->get();
        }

        // Mengirim data editor ke view
        return view('admin.detailHistory')->with(['editHistories' => $editHistories, 'user' => Auth::user()]);
    }
    
}
