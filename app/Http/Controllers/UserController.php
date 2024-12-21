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
      $query = $request->input('q');
      
      $results = Kata::where('gorontalo', 'LIKE', "%$query%")
                      ->orWhere('indonesia', 'LIKE', "%$query%")
                      ->get();
      
      return view('search_result', compact('results'));
    }

    public function searchKataAdmin(Request $request) {
      $query = $request->input('q');
      
      $dataKata = Kata::where('gorontalo', 'LIKE', "%$query%")
                      ->orWhere('indonesia', 'LIKE', "%$query%")
                      ->get();
      
      return view('admin.daftarKata', compact('dataKata'));
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

    public function viewProfile(){

      return view('admin.detailProfil')->with(['user' => Auth::user()]);
    }
   
    public function viewEditProfile(){
      
      // $datauser = User::where('id', $id)->get();

      return view('admin.EditProfil')->with([ 'user' => Auth::user()]);
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

    public function updateKata(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'id_kata' => 'required|exists:katas,id_kata', // Ensure the kata ID exists in the database
        'gorontalo' => 'required|string|max:255',
        'indonesia' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'kalimat' => 'required|string|max:255',
        'pengucapan' => 'required|string|max:255',
        'suara' => 'nullable|file|mimes:mp3,wav|max:10240', // Max size 10MB for audio
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max size 2MB for image
    ]);

    // Retrieve the kata record using the id from the request
    $kata = Kata::find($request->input('id_kata'));

    // Update the kata fields
    $kata->gorontalo = $request->input('gorontalo');
    $kata->indonesia = $request->input('indonesia');
    $kata->kategori = $request->input('kategori');
    $kata->kalimat = $request->input('kalimat');
    $kata->pengucapan = $request->input('pengucapan');

    // Handle the image upload if a new image is provided
    if ($request->hasFile('gambar')) {
        // Store the image in 'images' directory within the 'public' disk
        $gambarPath = $request->file('gambar')->store('images', 'public');

        // If there's an existing image, delete it
        if ($kata->gambar && file_exists(public_path('storage/' . $kata->gambar))) {
            unlink(public_path('storage/' . $kata->gambar));  // Remove old image
        }

        // Update the image path in the database
        $kata->gambar = $gambarPath;
    }

    // Handle the audio file upload if a new audio file is provided
    if ($request->hasFile('suara')) {
        // Store the audio file in 'suara' directory within the 'public' disk
        $suaraPath = $request->file('suara')->store('suara', 'public');
        $kata->suara = $suaraPath;
    }

    // Save the updated kata record
    $kata->save();

    // Log the edit history
    EditHistory::create([
        'id_kata' => $kata->id_kata,
        'id_editor' => auth()->user()->id, // ID pengguna yang mengedit kata
        'action' => 'edit',
        'activity' => $request->input('activity'),
    ]);

    // Retrieve all kata records
    $dataKata = Kata::all();

    // Return to the listing page with success message
    return redirect()->route('daftarKata')
        ->with('success', 'Data berhasil diubah.')
        ->with(['dataKata' => $dataKata, 'user' => Auth::user()]);
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
      // $dataEditor->role = $request->role;
      // $dataEditor->save();
      // dd($dataEditor); 

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
      $totalKata = Kata::count();
      $editor = User::where('role', 'editor')->count();
      $pending = User::where('role', 'pending')->count();

      return view('admin.dashboard')->with([
        'user' => Auth::user(),
        'editor' => $editor,
        'pending' => $pending,
        'totalKata' => $totalKata,
      ]);
    }

    public function simpanKata(Request $request)
    {

        // Validasi input
        $request->validate([
            'gorontalo' => 'required|string|max:255',
            'indonesia' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'kalimat' => 'nullable|string',
            'pengucapan' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi gambar
            'audio' => 'nullable|file|mimes:mp3,wav|max:10240', // Validasi audio
        ]);
        // dd($request->all());
        // Menyimpan gambar (jika ada)
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        // Menyimpan file audio (jika ada)
      //   $audioPath = null;

        
      // if ($request->hasFile('audio')) {
      //   // Tentukan folder tempat penyimpanan file audio
      //   $audioFolder = 'audio-files/subfolder_name'; // Ubah 'subfolder_name' dengan nama folder yang Anda inginkan
        
      //   // Membuat folder jika belum ada
      //   Storage::makeDirectory('public/' . $audioFolder);

      //   // Menyimpan file audio
      //   $audioPath = $request->file('audio')->store($audioFolder, 'public');
      // }

        // Menyimpan data kata ke dalam database
        $kata = Kata::create([
            'gorontalo' => $request->gorontalo,
            'indonesia' => $request->indonesia,
            'kategori' => $request->kategori,
            'kalimat' => $request->kalimat,
            'pengucapan' => $request->pengucapan,
            'gambar' => $gambarPath,
            // 'suara' => $audioPath,  // Menyimpan path audio yang disimpan di server
        ]);

        // dd($kata);

        EditHistory::create([
          'id_kata' => $kata->id_kata,
          'id_editor' => auth()->user()->id, // ID pengguna yang mengedit kata
          'action' => 'create',
          'activity' => 'Menambahkan kata ' . $kata->gorontalo,
        ]);

        return redirect()->route('daftarKata')->with('success', 'Data berhasil ditambahkan.');
        // Redirect atau return response
        // return response()->json(['success' => true, 'message' => 'Data berhasil disimpan.']);
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

    public function daftarHistory()
    {
        // Mengambil semua data log history dengan relasi kata dan editor
        $editHistories = EditHistory::with('kata', 'user')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(20);

        // Mengirim data ke view
        return view('admin.detailHistory', compact('editHistories'));
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
        return view('admin.detailHistory', compact('editHistories'));
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
          dd('yasalh');
            // Menampilkan data pengguna dengan role 'pending'
            $dataEditor = User::where('role', 'pending')->get();
        }
        // Jika tidak ada filter (default) maka tampilkan semua pengguna
        else {
            $dataEditor = User::whereIn('role', ['editor', 'pending'])->get();
        }

        // Mengirim data editor ke view
        return view('admin.aturEditor', compact('dataEditor'));
    }
    
}
