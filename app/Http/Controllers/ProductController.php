<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $produk = Product::all();
        return view('admin.produk.index',
        ['title' => 'Produk'],
        compact('produk'));
    }
    
    public function show(){
        return view('admin.produk.tambah',
        ['title' => "Tambah Produk"]);
        
    }
    
    public function create(Request $request){
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            
            
        ],[
            'id_produk.required' => 'ID Produk Wajib Diisi',
            'nama_produk.required' => 'Nama Produk Wajib Diisi',
            'harga_produk.required' => 'Harga Wajib Diisi',
            'harga_produk.numeric' => 'Harga Hanya Angka',
            
        ]);
        
        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        }else{
            $data = [
                'id_product' => $request->input('id_produk'),
                'nama_product' => $request->input('nama_produk'),
                'harga_product' => $request->input('harga_produk'),
            ];
            
            $id_produk = $data['id_product']; // Gantilah 'primary_key' dengan nama kolom primary key yang sesuai
            $checkIdProduk = Product::where('id_product', $id_produk)->first();
            
            if ($checkIdProduk) {
                // Primary key sudah ada dalam database, kembalikan pesan kesalahan
                return back()->with('errors', "Produk dengan ID $id_produk  sudah ada dalam database", 400);
            }
            
            $produk =  Product::create($data);
            return redirect()->route('produk')->with('success', "Berhasil menambah data!!!");
        }
        
    }

    public function edit($id){
        
        $produk = Product::findOrFail($id);
        return view('admin.produk.edit', [
            'title' => "Edit Produk"
        ],compact('produk'));
    }

    public function update(Request $request,$id){
        $validasi = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            
            
        ],[

            'nama_produk.required' => 'Nama Produk Wajib Diisi',
            'harga_produk.required' => 'Harga Wajib Diisi',
            'harga_produk.numeric' => 'Harga Hanya Angka',
            
        ]);
        
        if ($validasi->fails()) {
            return back()->with(['errors' => $validasi->errors()]);
        }else{
            $data = [
                'id_product' => $request->input('id_produk'),
                'nama_product' => $request->input('nama_produk'),
                'harga_product' => $request->input('harga_produk'),
            ];
            
            $produk =  Product::where('id_product', $id)->update($data);
            return redirect()->route('produk')->with('success', "Berhasil perbarui data!!!");
            
        }
    }

    public function delete($id){
        $produk = Product::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk')->with('success', "Berhasil hapus data!!!");
    }
}
