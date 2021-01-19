<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index()
    {
        $data = Kecamatan::get();
        return view('admin.kecamatan.index',compact('data'));
    }
    public function add()
    {
        
    }
    public function store()
    {
        
    }
    public function edit()
    {
        
    }
    public function update()
    {
        
    }
    public function delete()
    {
        
    }

    public function createuser($id)
    {
        return view('admin.kecamatan.createuser',compact('id'));
    }

    public function storeuser(request $req, $id)
    {
        DB::beginTransaction();
        try {
            $attr = $req->all();
            $attr['password'] = bcrypt($req->password);
            $attr['name'] = namaKecamatan($id);
            $data = User::create($attr);
            $user_id = $data->id;

            $role = Role::where('name', 'kecamatan')->first();
            
            //update user_id di kecamatan
            $k = Kecamatan::find($id);
            $k->user_id = $user_id;
            $k->save();

            $data->roles()->attach($role);
            DB::commit();

            return redirect('/admin/kecamatan');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }
}
