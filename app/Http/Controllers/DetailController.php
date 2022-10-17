<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Transaksi;
use App\Models\Barang;
use DB;
class DetailController extends Controller
{
    public function index(){
        $detail = Detail::query()
        ->join('transaksis', 'details.id_transaksi' ,'=', 'transaksis.id_transaksi')
        ->join('barangs','details.id_barang','=','barangs.id_barang')
        ->select('transaksis.tgl_trx','barangs.nama_barang', 'details.*')
        ->get();
        //return $detail;
        return view('Detail/index',['detail'=>$detail]);
    }
    public function tambah(){
        $transaksi = Transaksi::all();
        $barang = Barang::all();
        $q = DB::table('details')->select(DB::raw('MAX(RIGHT(id_data,2)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s",$tmp);
            
            
        }
    }else{
        $kd = "001";
    }
    
        return view('Detail/tambah',compact('transaksi','barang','kd'));
    }
    public function create(Request $request){
        Detail::create([
            'id_data'=>$request->id_data,
            'id_transaksi'=>$request->id_transaksi,
            'id_barang'=>$request->id_barang,
            'jml'=>$request->jml,
            'total'=>$request->total

        ]);
        return redirect('/detail');
    }
    public function hapus($id){
        $detail = Detail::findOrFail($id);
        $detail->delete();
        return redirect('/detail');
    }
    public function edit($id){
        $detail = Detail::find($id);
        $test = Detail::query()
        ->join('transaksis','details.id_transaksi','=','transaksis.id_transaksi')
        ->select('transaksis.tgl_trx', 'details.*')
        ->get();
        $coba = Detail::query()
        ->join('barangs','details.id_barang','=','barangs.id_barang')
        ->select('barangs.nama_barang', 'details.*')
        ->get();
        $transaksi = Transaksi::all();
        $barang = Barang::all();
        return view ('Detail/edit',compact('detail','transaksi','barang','test','coba'));
    }
    public function editData($id,Request $request){
        $detail = Detail::find($id);
        
        $detail->update([
            'id_data'=>$request->id_data,
            'id_transaksi'=>$request->id_transaksi,
            'id_barang'=>$request->id_barang,
            'jml'=>$request->jml,
            'total'=>$request->total
        ]);
        return redirect('/detail');
    }
}
