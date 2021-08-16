<?php


namespace App\Http\Controllers\back;

use App\Models\back\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::orderBy('id','DESC')->paginate(20);
        return view('back.categories.categories',compact('categories'));
    }


    public function create()
    {
        $categories = Category::with('parent')->whereNull('parent_id')->pluck('name', 'id');
        return view('back.categories.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required|max:250',
            'city'=>'required|max:250',
            'thumbnail'=>'required|max:250',
            'img'=>'required|max:250',
        ]);

        $category=new Category();


        //******************************image**************************
        //******************************************** img **********
        $img = $request->img;
        $img_thumb = explode('/', $img);
        $directory = dirname($img);
        $thumbnail = $directory . '/thumbs/' . end($img_thumb);
//        ******************************
        $category->img = $request->img;
        $category->thumbnail = $thumbnail;



        $category->name=$request->name;
        $category->city=$request->city;
        $category->color=$request->color;
        $category->parent_id=$request->parent_id;
        $category->user_id=auth()->user()->id;


        try{
            $category->save();
        }catch (Exception $exception){
            redirect(route('admin.categories.create'))->with('warning',$exception->getCode());
        }
        $msg="دسته بندی جدید به درست انجام شد";
        return redirect(route('admin.categories'))->with('success',$msg);
    }

    public function edit(Category $category)
    {
        $categories = Category::with('parent')->whereNull('parent_id')->get();
        return view('back.categories.edit',compact('category','categories'));
    }

    public function update(Request $request, Category $category)
    {
        $validateDate=$request->validate([
            'name'=>'required|max:250',
            'city'=>'required|max:250',
            'thumbnail'=>'required|max:250',
            'img'=>'required|max:250',
        ]);

        //******************************image**************************
        //******************************************** img **********
        $img = $request->img;
        $img_thumb = explode('/', $img);
        $directory = dirname($img);
        $thumbnail = $directory . '/thumbs/' . end($img_thumb);
//        ******************************
        $category->img = $request->img;
        $category->thumbnail = $thumbnail;


        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->city=$request->city;
        $category->color=$request->color;
        $category->user_id=auth()->user()->id;

        try{
            $category->save();
        }catch (Exception $exception){
            redirect(route('admin.categories.edit'))->with('warning',$exception->getCode());
        }
        $msg="ایتم مورد نظر به درستی ویرایش شد";
        return redirect(route('admin.categories'))->with('success',$msg);

    }

    public function destroy(Category $category)
    {
        $category->delete();
        $msg='حذف دسته بندی مورد نظر با موفقیت انجام شد';
        return redirect(route('admin.categories'))->with('success',$msg);
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        DB::table('categories')->whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', "آیتمهای مورد نظر بدرستی حذف گردید");
    }

}
