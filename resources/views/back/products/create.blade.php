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

        input:focus {
            box-shadow: 1px 1px 2px 1px rgb(39, 93, 255);
        }

        input {
            width: 325px;
            height: 43px;
            border-radius: 5px;
        }

        .form-row {
            width: 100%;

        }

        .form-group {
            margin-right: 25px;

        }

        .form-group lable {
            font-size: 15pt;
        }

        .chosen-select {
            width: 350px;
        }


    </style>


    <div class="content-wrapper">

        <form method="post" enctype="multipart/form-data" action="{{route('admin.products.store')}}">
            @csrf


            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <lable for="title">نام محصول</lable>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                               value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <lable for="title">قیمت</lable>
                        <input class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                               value="{{old('price')}}">
                        @error('price')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <lable for="title">درصد تخفیف</lable>
                        <input class="form-control @error('discount') is-invalid @enderror" type="text"
                               name="discount"
                               value="{{old('discount')}}">
                        @error('discount')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <lable for="title">تعداد موجود</lable>
                        <input class="form-control @error('tedad_mojod') is-invalid @enderror" type="text"
                               name="tedad_mojod"
                               value="{{old('tedad_mojod')}}">
                        @error('tedad_mojod')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror
                    </div>
                </div>


            </div>


            <div class="form-group">
                <lable for="title">خلاصه 250 کلمه ای محصول</lable>
                <textarea id="editor2" style="width: 100%" class="form-control @error('abstract') is-invalid @enderror"
                          name="abstract">{{old('abstract')}}</textarea>
                @error('abstract')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>


            <div class="form-group">
                <lable for="title">توضیحات</lable>
                <textarea id="editor1" class="form-control @error('description') is-invalid @enderror"
                          name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <lable for="title">انتخاب دسته بندی</lable>
                <div id="output"></div>
                <select data-placeholder="دسته بندی را انتخاب نمایید" style="width: 100%" class="chosen-select"
                        name="categories[]" multiple tabindex="3">
                    @foreach($categories as $category)
                        <optgroup label="{{$category->name}}">
                            @foreach($subcategories as $subcategory)
                                @if($subcategory->parent_id==$category->id)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>


{{--**********************************picture****************************--}}
            <div class="row">
                <div class="form-group">
                    <lable for="title">انتخاب تصویر</lable>
                    <div class="input-group">
                <span class="input-group-btn" style="width: 100px">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                        <i class="fa fa-picture-o"></i> انتخاب تصویر
                    </a>
                </span>
                        <input id="thumbnail" class="form-control" type="text" name="img">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>


            </div>
            {{--*************** End of product Gallery **********************--}}

            <hr>
            <div class="row">

                <div class="form-group">
                    <lable for="title">وضعیت</lable>
                    <select name="status" class="chosen-select">
                        <option value="0">منتشر نشده</option>
                        <option value="1">منتشر شده</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <lable for="title">نویسنده:{{Auth::user()->name}}</lable>
                <input class="form-controller" type="hidden" name="user_id" value="{{Auth::user()->id}}">
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">ثبت مقاله</button>
                <a class="btn btn-warning" href="{{route('admin.products')}}">انصراف</a>
            </div>

            <script>

                $(".chosen-select").chosen();
            </script>
            <script src="{{url('js/stand-alone-button.js')}}"></script>
            <script>
                $('#lfm').filemanager('image', {prefix: "/filemanager"});
                $('#lfm1').filemanager('image', {prefix: "/filemanager"});
                $('#lfm2').filemanager('image', {prefix: "/filemanager"});
            </script>



        </form>

    </div>



@endsection
