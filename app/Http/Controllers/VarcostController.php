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

    public function simpan(Request $request){

        $request->validate([
            // Validasi lainnya
            'tanggalpelaksanaan' => 'required|date',
        ]);    

        $data = [
            'kategori'=>$request->kategori,
            'periode'=>$request->periode,
            'tahun'=>$request->tahun,
            'siteid'=>$request->siteid,
            'sitename'=>$request->sitename,
            'nop'=>$request->nop,
            'cluster'=>$request->cluster,
            'tiketfiola'=>$request->tiketfiola,
            'tanggalpelaksanaan'=>$request->tanggalpelaksanaan,
            'aktivity'=>$request->aktivity,
            'kodesl'=>$request->kodesl,
            'qty'=>$request->qty,
            'hargasatuan'=>$request->hargasatuan,
            'fee'=>$request->fee,
            'statusticket'=>$request->statusticket,
            'po'=>$request->po,
            'statuspekerjaan'=>$request->statuspekerjaan,
            'statuspenagihan'=>$request->statuspenagihan,
        ];

        Varcost::create($data);

        return redirect()->route('varcost');
    }

    public function edit($id){

        $varcost = Varcost::find($id);
        return view('varcost.form', ['varcost' => $varcost]);

    }

    public function update($id, Request $request){

        $data = [
            'kategori'=>$request->kategori,
            'periode'=>$request->periode,
            'tahun'=>$request->tahun,
            'siteid'=>$request->siteid,
            'sitename'=>$request->sitename,
            'nop'=>$request->nop,
            'cluster'=>$request->cluster,
            'tiketfiola'=>$request->tiketfiola,
            'tanggalpelaksanaan'=>$request->tanggalpelaksanaan,
            'aktivity'=>$request->aktivity,
            'kodesl'=>$request->kodesl,
            'qty'=>$request->qty,
            'hargasatuan'=>$request->hargasatuan,
            'fee'=>$request->fee,
            'statusticket'=>$request->statusticket,
            'po'=>$request->po,
            'statuspekerjaan'=>$request->statuspekerjaan,
            'statuspenagihan'=>$request->statuspenagihan,
        ];

        Varcost::find($id)->update($data);

        return redirect()->route('varcost');

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
