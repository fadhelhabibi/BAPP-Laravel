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

    public function simpan(Request $request){
  
        $data = [
            'cluster'=>$request->cluster,
            'siteid'=>$request->siteid,
            'sitename'=>$request->sitename,
            'type'=>$request->type,
            'ticketnumber'=>$request->ticketnumber,
            'ac'=>$request->ac,
            'grounding'=>$request->grounding,
            'penerangan'=>$request->penerangan,
            'shelter'=>$request->shelter,
            'kebersihan'=>$request->kebersihan,
            'sparepart'=>$request->sparepart,
            'harga'=>$request->harga,
        ];

        Somsa::create($data);

        return redirect()->route('somsa');
    }

    public function edit($id){

        $somsa = Somsa::find($id);
        return view('somsa.form', ['somsa' => $somsa]);

    }

    public function update($id, Request $request){

        $data = [
            'cluster'=>$request->cluster,
            'siteid'=>$request->siteid,
            'sitename'=>$request->sitename,
            'type'=>$request->type,
            'ticketnumber'=>$request->ticketnumber,
            'ac'=>$request->ac,
            'grounding'=>$request->grounding,
            'penerangan'=>$request->penerangan,
            'shelter'=>$request->shelter,
            'kebersihan'=>$request->kebersihan,
            'sparepart'=>$request->sparepart,
            'harga'=>$request->harga,
        ];

        Somsa::find($id)->update($data);

        return redirect()->route('somsa');

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
