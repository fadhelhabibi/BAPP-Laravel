<?php

namespace App\Http\Controllers;

use App\Models\Pw;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PwExport;
use PDF;

class PwController extends Controller
{
    public function index(){
 
        $pw = Pw::get();

    return view('pw.index', ['pw' => $pw]); 
    
    }

    public function tambah(){

        return view('pw.form');

    }

    public function simpan(Request $request)
    {
        $request->validate([
            'filepdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('filepdf')) {
            $file = $request->file('filepdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['filepdf'] = $filename;
        }

        Pw::create($data);

        return redirect()->route('pw')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'filepdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $pw = Pw::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('filepdf')) {
            // Hapus file lama jika ada
            if ($pw->filepdf && file_exists(public_path('uploads/' . $pw->filepdf))) {
                unlink(public_path('uploads/' . $pw->filepdf));
            }

            $file = $request->file('filepdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['filepdf'] = $filename;
        }

        $pw->update($data);

        return redirect()->route('pw')->with('success', 'Data berhasil diperbarui!');
    }

    public function edit($id){

        $pw = Pw::find($id);
        return view('pw.form', ['pw' => $pw]);

    }

    public function hapus($id){

        Pw::find($id)->delete();
        return redirect()->route('pw');

    }

    public function exportExcel()
    {
        $pw = Pw::all();

        $pw->map(function ($item) {
            $item->total_harga = $item->qty * $item->hargasatuan + ($item->qty * $item->hargasatuan * ($item->fee / 100));
            $item->tanggalpelaksanaan = date('d-m-Y', strtotime($item->tanggalpelaksanaan));
            return $item;
        });

        return Excel::download(new PwExport, 'Data_pw.xlsx');
    }

    public function exportPDF()
    {
        // Ambil semua data dari tabel pw
        $pw = Pw::all();
    
        // Load view untuk PDF dengan data pw
        $pdf = PDF::loadView('pw.pdf', compact('pw'));
        return $pdf->download('pw.pdf');
    }
}
