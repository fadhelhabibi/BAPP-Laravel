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

    public function simpan(Request $request){
  
        $data = [
            'ticketnumber'=>$request->ticketnumber,
            'cluster'=>$request->cluster,
            'siteid'=>$request->siteid,
            'sitename'=>$request->sitename,
            'pic'=>$request->pic,
            'notlppic'=>$request->notlppic,
            'tipepenjagasite'=>$request->tipepenjagasite,
            'hargapemberdayaan'=>$request->hargapemberdayaan,
            'keterangan'=>$request->keterangan,
        ];

        Pw::create($data);

        return redirect()->route('pw');
    }

    public function edit($id){

        $pw = Pw::find($id);
        return view('pw.form', ['pw' => $pw]);

    }

    public function update($id, Request $request){

        $data = [
            'ticketnumber'=>$request->ticketnumber,
            'cluster'=>$request->cluster,
            'siteid'=>$request->siteid,
            'sitename'=>$request->sitename,
            'pic'=>$request->pic,
            'notlppic'=>$request->notlppic,
            'tipepenjagasite'=>$request->tipepenjagasite,
            'hargapemberdayaan'=>$request->hargapemberdayaan,
            'keterangan'=>$request->keterangan,
        ];

        Pw::find($id)->update($data);

        return redirect()->route('pw');

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
