@extends('back.index')

@section('title')
    پنل مدیریت-مدیریت محصولات
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

        @include('layouts.message')
        <button id="deleteAll" class="btn btn-danger">حذف همه</button>
        <a class="btn btn-success" style="float: right" href="{{route('admin.products.create')}}">افزودن دسته جدید</a>

        <table class="table table-hover">

            <thead>
            <tr>
                <th>نام</th>
                <th>نام مستعار</th>
                <th>نویسنده</th>
                {{--                <th>شرح</th>--}}
                <th>دسته بندی</th>
                <th>قیمت</th>
                <th>درصد تخفیف</th>
                <th>تعداد موجود</th>
                <th>بازدید</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
                <th>حذف</th>
            </tr>
            </thead>
            <form id="deleteAllForm" method="post" enctype="multipart/form-data"
                  action="{{route('admin.products.destroyAll')}}">
                @csrf
                <tbody>
                @foreach($products as $product)


                    @switch($product->status)
                        @case(1)
                        @php
                            $url=route('admin.products.updatestatus',$product->slug);
                            $status='<a href="'.$url.'" class="badge alert-success">فعال</a>';
                        @endphp
                        @break
                        @case(0)
                        @php
                            $url=route('admin.products.updatestatus',$product->slug);
                            $status='<a href="'.$url.'" class="badge alert-warning">غیر فعال</a>';
                        @endphp
                        @break
                        @default
                    @endswitch



                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->user->name}}</td>
                        {{--                    <td><?php echo mb_substr(strip_tags($product->description),0,100,'UTF8').'...';?></td>--}}

                        <td>
                            @foreach($product->categories()->pluck('name') as $category)
                                <span class="badge alert-success">
                                {{$category}}-
                                </span>
                            @endforeach
                        </td>

                        <td>{{$product->price}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->tedad_mojod}}</td>


                        <td>{{$product->hit}}</td>


                        <td>
                            {!! $status !!}
                        </td>

                        <td>
                            <a class="badge alert-warning"
                               href="{{route('admin.products.edit',$product->slug)}}">ویرایش</a>
                            <a onclick="return confirm('آیا آیتم مورد نظر حذف شود؟')" class="badge alert-danger"
                               href="{{route('admin.products.destroy',$product->id)}}">حذف</a>
                        </td>

                        <td>
                            <input type="checkbox" name="ids[]" value="{{$product->id}}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </form>
        </table>

        {{$products->links()}}
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
