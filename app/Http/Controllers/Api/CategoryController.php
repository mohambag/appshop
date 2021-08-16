<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\back\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->paginate(2);

        return response()->json($category, 200);
    }


    public function show($id)
    {
//        $category = Category::find($id);   //category valed
        $subcategory = Category::where('parent_id',$id)->orderBy('id','DESC')->get(); //list categories


        if (!$subcategory) {
            return response()->json(['message' => 'not found'], 404);
        }
//            $data = [
//                'name' => $subcategory->name,
//                'color' => $subcategory->color,
//                'thumbnail' => $subcategory->thumbnail,
//                'img' => $subcategory->img
//            ];

            return response()->json($subcategory, 200);  // list categories
//            return response()->json($category, 200);  //daste valed

    }


}
