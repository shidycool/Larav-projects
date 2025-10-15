<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

class CrudController extends Controller
{
    public function index(){
      $products = Crud::all();
      return view('cruds.index', ['products' =>$products]);
    }

    public function create(){
      return view('cruds.create');
    }

    public function store(Request $request){
      $data = $request->validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|decimal:1,2',
        'description' => 'nullable'
      ]);
      
      $newProduct = Crud::create($data);

      return redirect(route('cruds.index'));
    }

    public function edit(Crud $product){
     return view('cruds.edit',['product' => $product]);
    }

    public function update(Crud $product, Request $request){
      $data = $request->validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|decimal:1,2',
        'description' => 'nullable'
      ]);

      $product->update($data);

      return redirect(route('cruds.index'))->with('success', 'Product Updated Successfully');
    }
}

