<?php

namespace App\Http\Controllers;

use App\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $data = Galery::get();
        return view('admin.galery.index',compact('data'));
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
}
