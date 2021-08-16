@extends('back.index')

@section('title')
    پنل مدیریت-ایجاد دسته
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

        .form-group lable {
            font-size: 15pt;
        }

    </style>

    <div class="content-wrapper">

        <form method="post" class="col-lg" action="{{route('admin.categories.store')}}">
            @csrf

            <div class="form-group">

                <lable for="title">نام دسته</lable>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                       value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror

            </div>


            <div class="form-group">
                <lable for="title">نام شهر</lable>
                <input class="form-control @error('city') is-invalid @enderror" type="text" name="city"
                       value="{{old('city')}}">
                @error('city')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <lable for="title">رنگ دسته بندي</lable>
                <input class=" form-control @error('color') is-invalid @enderror" type="color" name="color"
                       value="{{old('color')}}">
                @error('color')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <lable for="title">دسته والد</lable>
                <select style="width: 100%" class="chosen-select" name="parent_id">
                    <option value="">دسته والد را انتخاب نمایید</option>
                    @foreach($categories as $catId =>$catName)
                        <option value="{{$catId}}">{{$catName}}</option>
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


            <hr>
            <button class="btn btn-success" type="submit">ثبت دسته بندی</button>
            <a class="btn btn-warning" href="{{route('admin.categories')}}">انصراف</a>
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
