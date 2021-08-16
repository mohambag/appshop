@extends('back.index')

@section('title')
    پنل مدیریت-مدیریت دسته ها
@endsection

@section('content')

    <style>


        td {
            text-align: center;
        }

        th {
            text-align: center !important;
        }


        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }


    </style>

    <div class="content-wrapper" id="customers">
        <button id="deleteAll" class="btn btn-danger">حذف همه</button>
        @include('layouts.message')

        <a class="btn btn-success" style="float: right" href="{{route('admin.categories.create')}}">افزودن دسته جدید</a>

        <table class="table table-hover">

            <thead>
            <tr>
                <th>دسته بندی</th>
                <th>دسته والد</th>
                <th>شهر</th>
                <th>رنگ</th>
                <th>تصویر</th>
                <th>مدیریت</th>
                <th>حذف</th>
            </tr>
            </thead>

            <form id="deleteAllForm" method="post" enctype="multipart/form-data"
                  action="{{route('admin.categories.destroyAll')}}">
                @csrf
                <tbody>
                @foreach($categories as $category)


                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            @if($category->parent_id=='')
                                -
                            @else
                                {{$category->parent->name}}
                            @endif
                        </td>

                        <td>
                            {{$category->city}}
                        </td>

                        <td>
                            <span style="margin:auto;display: block;width: 20px;height: 20px;border-radius: 50%;background-color: {{ $category->color}}">

                            </span>
                        </td>

                        <td>
                            <img src="{{$category->thumbnail}}" style="height: 3rem">
                        </td>

                        <td>
                            <a class="badge alert-warning"
                               href="{{route('admin.categories.edit',$category->id)}}">ویرایش</a>
                            <a class="badge alert-danger"
                               href="{{route('admin.categories.destroy',$category->id)}}">حذف</a>
                        </td>

                        <td>
                            <input type="checkbox" name="ids[]" value="{{$category->id}}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </form>
        </table>

        {{$categories->links()}}
    </div>


    <script>
        $('#deleteAll').click(function () {
            var a = confirm('آیا آیتمهای انتخابی حذف شوند؟');
            if (a == true) {
                $('#deleteAllForm').submit();
            }
        })
    </script>
@endsection
