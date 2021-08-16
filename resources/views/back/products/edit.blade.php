@extends('back.index')
@section('content')



    <style>
        .form-group lable {
            display: block;
            margin-top: 10px;
        }

        form {
            width: 100%;
            padding: 10px 2px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input {
            width: 325px;
            height: 43px;
            border-radius: 5px;
        }

        .form-group {
            margin-right: 25px;
        }

        .form-group lable {
            font-size: 15pt;
        }

        .chosen-select {
            width: 300px;
        }


    </style>


    <div class="content-wrapper">

        <form method="post" enctype="multipart/form-data" action="{{route('admin.products.update',$product->slug)}}">
            @csrf

            <div class="row">
                <div class="form-group">
                    <lable for="title">نام مطلب</lable>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                           value="{{$product->name}}">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <lable for="title">قیمت</lable>
                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                           value="{{$product->price}}">
                    @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <lable for="title">درصد تخفیف</lable>
                    <input class="form-control @error('discount') is-invalid @enderror" type="text" name="discount"
                           value="{{$product->discount}}">
                    @error('discount')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <lable for="title">تعداد موجود</lable>
                    <input class="form-control @error('tedad_mojod') is-invalid @enderror" type="text"
                           name="tedad_mojod"
                           value="{{$product->tedad_mojod}}">
                    @error('tedad_mojod')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <lable for="title">خلاصه 250 کلمه ای خبر</lable>
                <textarea id="editor2" style="width: 100%"
                          class="form-control @error('abstract') is-invalid @enderror"
                          name="abstract">{{$product->abstract}}</textarea>
                @error('abstract')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <lable for="title">توضیحات</lable>
                <textarea id="editor1" class="form-controller" name="description">{{$product->description}}</textarea>
            </div>


            <div class="row">
                <div class="form-group">
                    <lable for="title">وضعیت</lable>
                    <select name="status" class="chosen-select">
                        <option value="0">منتشر نشده</option>
                        <option value="1" <?php if ($product->status == 1) {
                            echo 'selected';
                        }?>>منتشر شده
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <lable for="title">انتخاب دسته بندی</lable>
                <div id="output"></div>
                <select style="width: 400px" class="chosen-select" name="categories[]" multiple>
                    @foreach($categories as $category)
                        <optgroup label="{{$category->name}}">
                            @foreach($subcategories as $subcategory)
                                @if($subcategory->parent_id==$category->id)
                                    <option
                                        value="{{$subcategory->id}}" <?php if (in_array($subcategory->id, $product->categories->pluck('id')->toArray())) echo 'selected'?>>{{$subcategory->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <lable for="title">نویسنده:{{Auth::user()->name}}</lable>
                <input class="form-controller" type="hidden" name="user_id" value="{{Auth::user()->id}}">
            </div>

            <div class="row">
                <div class="form-group">
                    <lable for="title"> تصویر</lable>
                    <div class="input-group">
                <span class="input-group-btn" style="width: 100px">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                        <i class="fa fa-picture-o"></i> انتخاب تصویر
                    </a>
                </span>
                        <input id="thumbnail" class="form-control" type="text" name="img"
                               value="{{url($product->img)}}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        <img src="{{$product->thumbnail}}" style="height: 5rem">
                    </div>
                </div>
            </div>


            {{--*************** End of product Gallery **********************--}}


            <button class="btn btn-success" type="submit">ثبت مقاله</button>
            <a class="btn btn-warning" href="{{route('admin.products')}}">انصراف</a>
        </form>


        <script>

            $('.chosen-select').chosen();

        </script>

        <script src="{{url('js/stand-alone-button.js')}}"></script>
        <script>

            $('#lfm').filemanager('image', {prefix: "/filemanager"});
        </script>

    </div>


@endsection
