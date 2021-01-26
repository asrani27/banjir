<?php

namespace App\Http\Controllers;

use App\Infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InfografisController extends Controller
{  public function index()
    {
        $data = Infografis::get();
        return view('admin.infografis.index',compact('data'));
    }
    
    public function add()
    {
        return view('admin.infografis.add');
    }
    
    public function store(Request $req)
    {
        $attr = $req->all();
    
        if ($req->hasFile('file')) {
            $validator = Validator::make($req->all(), [
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if ($validator->fails()) {
            toastr()->error('File Harus Berupa Gambar dan Maksimal 2MB');
            return back();
        } else {
            $filename = $req->file->getClientOriginalName();
            $filename = date('d-m-Y-') . rand(1, 9999) . $filename;
            $req->file->storeAs('/public', $filename);
            $attr['file'] = $filename;
            Infografis::create($attr);
            toastr()->success('Berhasil Di Simpan');
            return redirect('/admin/infografis');
            }   
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
        
        $path = '/public/' . Infografis::find($id)->file;
        Storage::delete($path);
        Infografis::find($id)->delete();
        toastr()->success('Berhasil Di Hapus');
        return back();
    }
}
