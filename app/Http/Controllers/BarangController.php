<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;
use DB;
class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view ('Barang/index',['barang'=>$barang]);
    }
    public function tambah(){
        $q = DB::table('barangs')->select(DB::raw('MAX(RIGHT(id_barang,2)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s",$tmp);
            
            
        }
    }else{
        $kd = "001";
    }
        //return "Brg-".$kd;
        return view('Barang/tambah',['kd'=>$kd]);
    }
    public function create(Request $request){
        Barang::create([
            'id_barang'=>$request->id_barang,
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok
        ]);
        return redirect('/barang');
    }
    public function hapus($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang');
    }
    public function edit($id){
        $barang = Barang::findOrFail($id);
        return view ('Barang/edit',compact('barang'));
    }
    public function editData($id,Request $request){
        $barang = Barang::findOrFail($id);
        $barang->update([
            'id_barang'=>$request->id_barang,
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok
        ]);
        return redirect ('/barang');
    }
}
