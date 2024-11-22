<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(){
 

        // Ambil id_user dari pengguna yang sedang login
        $id_user = Auth::id();

        // Ambil data expense berdasarkan id_user yang sedang login
        $expense = Expense::where('id_user', $id_user)
                      ->where('status', 1)  // Menambahkan kondisi status = 1
                      ->get();

        $expense->map(function ($item) {
            $item->date = date('d-m-Y', strtotime($item->date));
            return $item;
        });
    
        return view('expense.index', ['expense' => $expense]); 
        
        }
    
    public function manager(){

        $expense = Expense::get();

        return view('expense.manager', ['expense' => $expense]); 
    }

    public function tambah(){

        return view('expense.form');

    }

    public function simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'area' => 'required',
            'title' => 'required',
            'date' => 'required|date',
            'site' => 'required',
            'ticket' => 'required',
            'keterangan' => 'required',
            'pengeluaran' => 'required|numeric',
        ]);

        // Simpan data ke database
        Expense::create([
            'id_user' => Auth::id(), // Ambil ID pengguna yang sedang login
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'area' => $request->area,
            'title' => $request->title,
            'date' => $request->date,
            'site' => $request->site,
            'ticket' => $request->ticket,
            'keterangan' => $request->keterangan,
            'pengeluaran' => $request->pengeluaran,
            'status' => $request->status, // Status default, bisa disesuaikan
        ]);

        return redirect()->route('expense')->with('success', 'Expense berhasil disimpan!');
    }

    public function update($id, Request $request)
    {

        $expense = Expense::findOrFail($id);
        $data = $request->all();

        $expense->update($data);

        return redirect()->route('expense.manager')->with('success', 'Data berhasil diperbarui!');
    }

    public function edit($id){

        $expense = Expense::find($id);
        return view('expense.form', ['expense' => $expense]);

    }

    public function hapus($id){

        Expense::find($id)->delete();
        return redirect()->route('expense.manager');

    }
}
