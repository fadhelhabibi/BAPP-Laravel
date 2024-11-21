<?php

namespace App\Http\Controllers;

use App\Models\Somsa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SomsaExport;
use PDF;

class SomsaController extends Controller
{
    public function index(){
 
        $somsa = Somsa::get();

    return view('somsa.index', ['somsa' => $somsa]); 
    
    }

    public function tambah(){

        return view('somsa.form');

    }

    public function edit($id){

        $somsa = Somsa::find($id);
        return view('somsa.form', ['somsa' => $somsa]);

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

    Somsa::create($data);

    return redirect()->route('somsa')->with('success', 'Data berhasil ditambahkan!');
}

public function update($id, Request $request)
{
    $request->validate([
        'filepdf' => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $somsa = Somsa::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('filepdf')) {
        // Hapus file lama jika ada
        if ($somsa->filepdf && file_exists(public_path('uploads/' . $somsa->filepdf))) {
            unlink(public_path('uploads/' . $somsa->filepdf));
        }

        $file = $request->file('filepdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $data['filepdf'] = $filename;
    }

    $somsa->update($data);

    return redirect()->route('somsa')->with('success', 'Data berhasil diperbarui!');
}


    public function hapus($id){

        Somsa::find($id)->delete();
        return redirect()->route('somsa');

    }

    public function exportExcel()
    {
        $somsa = Somsa::all();

        $somsa->map(function ($item) {
            $item->total_harga = $item->qty * $item->hargasatuan + ($item->qty * $item->hargasatuan * ($item->fee / 100));
            $item->tanggalpelaksanaan = date('d-m-Y', strtotime($item->tanggalpelaksanaan));
            return $item;
        });

        return Excel::download(new SomsaExport, 'Data_somsa.xlsx');
    }

    public function exportPDF()
    {
        // Ambil semua data dari tabel Somsa
        $somsa = Somsa::all();
    
        // Load view untuk PDF dengan data Somsa
        $pdf = PDF::loadView('somsa.pdf', compact('somsa'));
        return $pdf->download('somsa.pdf');
    }
}
