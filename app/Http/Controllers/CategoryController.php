<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Category;

use Response;

class CategoryController extends Controller
{
    public function index(){
        return response()->json(Category::all(),200);
    }

    public function store(Request $request){

        if(!$request->input('name')){
            return response()->json(['errors'=>array(['code'=>422,'message'=>'Missing data -- Name.'])],422);
        }

        $category = Category::create($request->all());
        return response()->json($category,201);
    }

    public function show(Category $category){
        return $category;
    }


    public function update(Request $request, Category $category){
        $category->update($request->all());
        return response()->json($category,200);
    }

    public function delete(Category $category){
        $category->delete();
        return response()->json(['success'=>true,'message'=>'Category Deleted.'],200);
    }
}
