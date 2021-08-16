@extends('back.index')

@section('title')
    پنل مدیریت-ویرایش دسته
@endsection

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

        .btn_red {
            width: 135px;
            height: 45px;
            border: 1px solid #ccc;
            text-align: center;
            line-height: 30px;
            font-size: 14pt;
            background: red;
            margin: 10px 30px;
            border-radius: 7px;
        }

    </style>


    <div class="content-wrapper">

        <form method="post" action="{{route('admin.categories.update',$category->id)}}">
            @csrf
            <div class="form-group">
                <lable for="title">نام مطلب</lable>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                       value="{{$category->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <lable for="title">دسته والد</lable>
                <select style="width: 100%" class="chosen-select" name="parent_id">
                    <option value="">دسته والد را انتخاب نمایید</option>
                    @foreach($categories as $cat)
                        <option <?php if ($cat->id == $category->parent_id) {
                            echo 'selected';
                        }?> value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <lable for="title">شهر</lable>
                <input class="form-control @error('city') is-invalid @enderror" type="text" name="city"
                       value="{{$category->city}}">
                @error('city')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <lable for="title">رنگ</lable>
                <input class="form-control @error('color') is-invalid @enderror" type="color" name="color"
                       value="{{$category->color}}">
                @error('color')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
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
                               value="{{url($category->img)}}">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;">
                        <img src="{{$category->thumbnail}}" style="height: 5rem">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-success" type="submit">بروزرسانی دسته بندی</button>
                <a class="btn btn-warning" href="{{route('admin.categories')}}">انصراف</a>
            </div>
        </form>

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


@endsection
