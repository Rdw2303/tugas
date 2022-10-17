<?php

namespace App\Http\Controllers;
use App\Models\Username;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use DB; 
class TransaksiController extends Controller
{
    public function index(){
        // $transaksi = Transaksi::with('username')->paginate(5);
        // $user = Username::paginate(1);
        $transaksi = Transaksi::query()
        ->join('usernames', 'transaksis.id_user' ,'=', 'usernames.id_user')
        ->select('usernames.nama', 'transaksis.*')
        ->get();
         //return $transaksi;
        return view('Transaksi/index',['transaksi'=>$transaksi]);
    }
    public function tambah(){
        $transaksi = Transaksi::all();
        $user = Username::all();
        $q = DB::table('transaksis')->select(DB::raw('MAX(RIGHT(id_transaksi,2)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s",$tmp);
            
            
        }
    }else{
        $kd = "001";
    }    
        $tanggal = date('Y-m-d');
        //return $tanggal;
        return view('Transaksi/tambah',compact('user','kd','transaksi','tanggal'));
    }
    public function create(Request $request){
        Transaksi::create([
            'id_transaksi'=>$request->id_transaksi,
            'tgl_trx'=>$request->tgl_trx,
            'id_user'=>$request->id_user,
            'total_bayar'=>$request->total_bayar,
            'bayar'=>$request->bayar
        ]);
        return redirect('/');
    }
    public function hapus($id){
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect('/');
    }
    public function edit($id){
        $transaksi = Transaksi::find($id);
        $user = Username::all();
        $test = Transaksi::query()
        ->join('usernames','transaksis.id_user','=','usernames.id_user')
        ->select('usernames.nama', 'transaksis.*')
        ->get();
        return view ('Transaksi/edit',['transaksi'=>$transaksi,'user'=>$user,'test'=>$test]);
    }
    public function editData($id,Request $request){
        $transaksi = Transaksi::find($id);
        $user = Username::all();
        $transaksi->update([
            'id_transaksi'=>$request->id_transaksi,
            'tgl_trx'=>$request->tgl_trx,
            'id_user'=>$request->id_user,
            'total_bayar'=>$request->total_bayar,
            'bayar'=>$request->bayar
        ]);
        return redirect('/');
    }
}