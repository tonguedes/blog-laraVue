<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\categoria;


class CategoriaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:categories',
        ]);

        $name = $request->input('name');
        $category = new categoria();
        $category->name = $name;

        return $category->save();
    }

    public function index(){
       return  categoria::latest()->get();
    }

    public function show(categoria $categoria)
    {
         return $categoria;
    }

    public function update(Request $request, categoria $categoria)
    {
        $request->validate([
            'name' => 'required | unique:categories',
        ]);

        $name = $request->input('name');
        $categoria->name = $name;

        return $categoria->save();
    }

    public function destroy(categoria $categoria)
    {
        return $categoria->delete();
    }
}
