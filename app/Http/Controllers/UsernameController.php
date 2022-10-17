<?php

namespace App\Http\Controllers;
use App\Models\Username;
use Illuminate\Http\Request;
use DB;
class UsernameController extends Controller
{
    public function index(){
        $username = Username::all();
        return view ('Username/index',['username'=>$username]);
    }
    public function tambah(){
        $q = DB::table('usernames')->select(DB::raw('MAX(RIGHT(id_user,2)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%03s",$tmp);
            
            
        }
    }else{
        $kd = "001";
    }
        return view('Username/tambah',['kd'=>$kd]);
    }
    public function create(Request $request){
        Username::create([
            'id_user'=>$request->id_user,
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>$request->password,
            'akses'=>$request->akses
        ]);
        return redirect('/username');
    }
    public function hapus($id){
        $username = Username::findOrFail($id);
        $username->delete();
        return redirect('/username');
    }
    public function edit($id){
        $username = Username::findOrFail($id);
        return view ('Username/edit',compact('username'));
    }
    public function editData($id,Request $request){
        $username = Username::findOrFail($id);
        $username->update([
            'id_user'=>$request->id_user,
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>$request->password,
            'akses'=>$request->akses
        ]);
        return redirect ('/username');
    }
}
