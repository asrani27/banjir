<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    public function index()
    {
        $data = Kelurahan::get();
        return view('admin.kelurahan.index',compact('data'));
    }
    public function add()
    {
        return view('admin.kelurahan.add');   
    }

    public function store(Request $req)
    {
        if(kelurahan::where('nama', $req->nama)->where('kecamatan_id', $req->kecamatan_id)->first() == null)
        {
            $attr = $req->all();
            $attr['nama'] = strtoupper($req->nama);
            Kelurahan::create($attr);
            toastr()->success('Data Kelurahan Berhasil Disimpan');
            return redirect('/admin/kelurahan');
        }else{
            toastr()->error('Data Kelurahan Sudah Ada');
            return back();
        }
    }
    public function edit()
    {
        
    }
    public function update()
    {
        
    }
    public function delete($id)
    {
        try{
            Kelurahan::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        }catch(\Exception $e)
        {
            toastr()->error('gagal Di Hapus');
            return back();
        }
    }
    
    public function createuser($id)
    {
        return view('admin.kelurahan.createuser',compact('id'));
    }

    public function storeuser(request $req, $id)
    {
        DB::beginTransaction();
        try {
            $attr = $req->all();
            $attr['password'] = bcrypt($req->password);
            $attr['name'] = namaKelurahan($id);
            $data = User::create($attr);
            $user_id = $data->id;

            $role = Role::where('name', 'kelurahan')->first();
            
            //update user_id di kecamatan
            $k = Kelurahan::find($id);
            $k->user_id = $user_id;
            $k->save();

            $data->roles()->attach($role);
            DB::commit();

            toastr()->success('berhasil');
            return redirect('/admin/kelurahan');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('gagal');
            return back();
        }
    }
}
