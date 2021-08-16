<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Category;
use App\Models\back\product;
use App\Models\back\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;


class ProductController extends Controller
{


    public function index()
    {
        $categories = Category::all()->pluck('name', 'id');
        $products = product::orderBy('id', 'DESC')->paginate(20);
        return view('back.products.products', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::with('parent')->whereNull('parent_id')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent_id')->get();
        return view('back.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'abstract' => 'required|max:250',
        ]);

        $product = new product();

        //        ********* Thumbnail **********
        $img = $request->img;
        $img_thumb = explode('/', $img);
        $directory = dirname($img);
        $thumbnail = $directory . '/thumbs/' . end($img_thumb);

        $product->img = $request->img;
        $product->thumbnail = $thumbnail;


        //*************************************************************


        $product->name = $request->name;
        $product->abstract = $request->abstract;
        $product->description = $request->description;
        $product->article_author = Auth::user()->name;
        $product->user_id = $request->user_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->tedad_mojod = $request->tedad_mojod;


        try {
            $product->save();
            $product->categories()->attach($request->categories);
        } catch (Exception $exception) {
            return redirect()->back()->with('warning', $exception->getCode());
        }
        $msg = "محصول جدید با موفقیت ثبت شد";
        return redirect(route('admin.products'))->with('success', $msg);
    }


    public function edit(product $product)
    {
        $categories = Category::with('parent')->whereNull('parent_id')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent_id')->get();
        return view('back.products.edit', compact('product', 'categories','subcategories'));
    }


    public function update(Request $request, Product $product)
    {
            $validationData = $request->validate([
                'name' => 'required',
                'price' => 'required',
                'discount' => 'required',
                'description' => 'required',
                'abstract' => 'required|max:250',
            ]);

        //******************************image**************************
        //******************************************** img **********
        $img = $request->img;
        $img_thumb = explode('/', $img);
        $directory = dirname($img);
        $thumbnail = $directory . '/thumbs/' . end($img_thumb);
//        ******************************
        $product->img = $request->img;
        $product->thumbnail = $thumbnail;



        //*************************************************************

        $product->name = $request->name;
        $product->abstract = $request->abstract;
        $product->description = $request->description;
        $product->article_author = Auth::user()->name;
        $product->user_id = $request->user_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->tedad_mojod = $request->tedad_mojod;


        try {
            $product->save();
            $product->categories()->sync($request->categories);
        } catch (Exception $exception) {
            return redirect()->back()->with('warning', $exception->getCode());
        }
        $msg = "محصول مورد نظر با موفقیت بروز رسانی شد";
        return redirect(route('admin.products'))->with('success', $msg);
    }


    public function destroy($id)
    {
        Product::find($id)->delete();
        $msg = "آیتم مورد نظر به درستی حذف شد";
        return redirect(route('admin.products'))->with('success', $msg);
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        DB::table('products')->whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', "آیتمهای مورد نظر بدرستی حذف گردید");
    }


    public function updatestatus(Product $product)
    {

        if ($product->status == 0) {
            $product->status = 1;
        } else {
            $product->status = 0;
        }


        if ($product->status == 0) {
            $msg = "آیتم مورد نظر غیر فعال شد";
        } else {
            $msg = "آیتم مورد نظر فعال شد";
        }
        $product->save();
        return redirect(route('admin.products'))->with('success', $msg);
    }

    public function updatespecial(Product $product)
    {

        if ($product->special == 0) {
            $product->special = 1;
        } else {
            $product->special = 0;
        }


        if ($product->special == 0) {
            $msg = "آیتم مورد نظر غیر فعال شد";
        } else {
            $msg = "آیتم مورد نظر فعال شد";
        }
        $product->save();
        return redirect(route('admin.products'))->with('success', $msg);
    }
}
