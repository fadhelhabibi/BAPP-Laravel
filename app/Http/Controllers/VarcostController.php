<?php

namespace App\Http\Controllers;

use App\Models\Varcost;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VarcostExport;
use PDF;

class VarcostController extends Controller
{
    public function index(Request $request){

        // Mengambil semua periode yang unik
    $periods = Varcost::select('periode')->distinct()->pluck('periode');

    $search = $request->input('search');

    // Mengambil data varcost dengan filter berdasarkan periode jika ada
    $varcost = Varcost::when($search, function($query) use ($search) {
        return $query->where('periode', 'LIKE', "%{$search}%");
    })->get();

    $varcost->map(function ($item) {
        $item->total_harga = $item->qty * $item->hargasatuan + ($item->qty * $item->hargasatuan * ($item->fee / 100));
        $item->tanggalpelaksanaan = date('d-m-Y', strtotime($item->tanggalpelaksanaan));
        return $item;
    });

    return view('varcost.index', ['varcost' => $varcost, 'periods' => $periods]); 
    
    }

    public function tambah(){

        return view('varcost.form');

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
    
        Varcost::create($data);
    
        return redirect()->route('varcost')->with('success', 'Data berhasil ditambahkan!');
    }
    
    public function update($id, Request $request)
    {
        $request->validate([
            'filepdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);
    
        $varcost = Varcost::findOrFail($id);
        $data = $request->all();
    
        if ($request->hasFile('filepdf')) {
            // Hapus file lama jika ada
            if ($varcost->filepdf && file_exists(public_path('uploads/' . $varcost->filepdf))) {
                unlink(public_path('uploads/' . $varcost->filepdf));
            }
    
            $file = $request->file('filepdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['filepdf'] = $filename;
        }
    
        $varcost->update($data);
    
        return redirect()->route('varcost')->with('success', 'Data berhasil diperbarui!');
    }

    public function edit($id){

        $varcost = Varcost::find($id);
        return view('varcost.form', ['varcost' => $varcost]);

    }

    public function hapus($id){

        Varcost::find($id)->delete();
        return redirect()->route('varcost');

    }

    public function exportExcel()
    {
        $varcost = Varcost::all();

        $varcost->map(function ($item) {
            $item->total_harga = $item->qty * $item->hargasatuan + ($item->qty * $item->hargasatuan * ($item->fee / 100));
            $item->tanggalpelaksanaan = date('d-m-Y', strtotime($item->tanggalpelaksanaan));
            return $item;
        });

        return Excel::download(new VarcostExport, 'Data_Varcost.xlsx');
    }

    public function exportPDF(Request $request)
{
    // Mengambil periode dari request
    $periode = $request->input('periode');

    // Mengambil data varcost berdasarkan periode jika ada
    $varcost = Varcost::when($periode, function ($query) use ($periode) {
        return $query->where('periode', $periode);
    })->get();

    // Lakukan perhitungan total_harga
    $varcost->map(function ($item) {
        $item->total_harga = $item->qty * $item->hargasatuan + ($item->qty * $item->hargasatuan * ($item->fee / 100));
        $item->tanggalpelaksanaan = date('d-m-Y', strtotime($item->tanggalpelaksanaan));
        return $item;
    });

    $pdf = PDF::loadView('varcost.pdf', compact('varcost'));
    return $pdf->download('varcost.pdf');
}

}
