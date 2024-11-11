<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Varcost;

class UserController extends Controller
{
    public function index(){

        $totalVarcost = Varcost::count();
        $totalUser = User::count();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Data jumlah user setiap bulan (contoh, sesuaikan dengan query database)
        $userCounts = [10, 25, 15, 30, 40, 35, 50, 45, 60, 70, 55, 65]; // Sesuaikan datanya
    
        // Data jumlah varcost setiap bulan (contoh, sesuaikan dengan query database)
        $varcostCounts = [5, 15, 10, 20, 30, 25, 35, 30, 45, 50, 40, 55]; // Sesuaikan datanya
    

        // Kirim totalVarcost ke view dashboard
        return view('dashboard', [
            'totalVarcost' => $totalVarcost,
            'totalUser' => $totalUser,
            'months' => $months,
            'userCounts' => $userCounts,
            'varcostCounts' => $varcostCounts
        ]);
    
    }

    public function edit($id){

        $user = User::find($id);
        
        // Path gambar default
         $defaultImage = 'uploads/img/default.jpg'; // Ganti dengan path gambar default yang sesuai

        return view('user.form', [
        'user' => $user,
        'defaultImage' => $defaultImage
    ]);

    }

    // public function update($id, Request $request){

    //     $data = [
    //         'nama'=>$request->nama,
    //         'email'=>$request->email,
    //         'level'=>$request->level,
    //         'fotoprofil'=>$request->fotoprofil,
    //         'nohp'=>$request->nohp 
    //     ];

    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
    
    //     if ($request->hasFile('image')) {
    //         if ($request->image_path && file_exists(public_path($request->image_path))) {
    //             unlink(public_path($product->image_path));
    //         }
    
    //         $imageName = time().'.'.$request->image->extension();
    //         $request->image->move(public_path('uploads/images'), $imageName);
    //         $product->image_path = 'uploads/images/' . $imageName;
    //     }
    
    //     $user->save();

    //     User::find($id)->update($data);

    //     return redirect()->route('user')->with('success', 'Product updated successfully');

    // }

    public function update($id, Request $request)
{
    // Validasi data gambar
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Ambil data user yang akan di-update
    $user = User::find($id);

    // Cek apakah ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($user->fotoprofil && file_exists(public_path($user->fotoprofil))) {
            unlink(public_path($user->fotoprofil));
        }

        // Simpan gambar baru
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/img'), $imageName);
        $user->fotoprofil = 'uploads/img/' . $imageName;
    }

    // Update data user selain gambar
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->level = $request->level;
    $user->nohp = $request->nohp;

    $user->save();

    return redirect()->route('user')->with('success', 'User updated successfully');
}


}
