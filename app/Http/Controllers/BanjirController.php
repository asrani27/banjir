<?php

namespace App\Http\Controllers;

use App\Banjir;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BanjirController extends Controller
{
    public function index()
    { 
        if(Auth::user()->hasRole('kecamatan')){
            $kelurahan_id = Kelurahan::where('kecamatan_id', Auth::user()->kecamatan->id)->pluck('id');
            $data = Banjir::whereIn('kelurahan_id', $kelurahan_id)->get();
        }
        elseif(Auth::user()->hasRole('kelurahan')){
            $data = Banjir::where('kelurahan_id', Auth::user()->kelurahan->id)->get();
        }else{
            $data = Banjir::get();
        }
        return view('admin.banjir.index',compact('data'));
    }
    public function add()
    {
        return view('admin.banjir.add');
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
                Banjir::create($attr);
                toastr()->success('Berhasil Di Simpan');
                return redirect('/admin/banjir');
            }
        }else{
            Banjir::create($attr);
            toastr()->success('Berhasil Di Simpan');
            return redirect('/admin/banjir');
        }
    }
    public function edit($id)
    {
        $data = Banjir::find($id);
        return view('admin.banjir.edit',compact('data'));
    }
    public function update(Request $req, $id)
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
                Banjir::find($id)->update($attr);
                toastr()->success('Berhasil Di update');
                return redirect('/admin/banjir');
            }
        }else{
            Banjir::find($id)->update($attr);
            toastr()->success('Berhasil Di update');
            return redirect('/admin/banjir');
        }
    }
    public function delete($id)
    {
        try{
            Banjir::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        }catch(\Exception $e)
        {
            toastr()->error('gagal Di Hapus');
            return back();
        }
    }
}
