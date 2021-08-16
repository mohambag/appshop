@extends('back.index')

{{--@section('title')--}}
{{--پنل مدیریت-مدیریت مطالب--}}
{{--@endsection--}}

@section('content')

    <style>

        td {
            text-align: center;
        }

        th {
            text-align: center;
        }


    </style>

    <div class="content-wrapper">

        @include('layouts.message')

        <a class="btn btn-success" style="float: right" href="{{route('admin.products.create')}}">افزودن دسته جدید</a>

        <table class="table table-hover">

            <thead>
            <tr>
                <th>نام </th>
                <th>نام مستعار</th>
                <th>نویسنده</th>
                <th>شرح</th>
                <th>دسته بندی</th>
                <th>بازدید</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
            </tr>
            </thead>

            <tbody>


                <tr>
                    <td>{{$article->name}}</td>
                    <td>{{$article->slug}}</td>
                    <td>{{$article->user->name}}</td>
                    <td><?php echo mb_substr(strip_tags($article->description),0,100,'UTF8').'...';?></td>

                    <td >
                        @foreach($article->categories()->pluck('name') as $category)
                            <span class="badge alert-success">
                                {{$category}}-
                                </span>
                        @endforeach
                    </td>

                    <td>{{$article->hit}}</td>

                    <td>
                        {!! $status !!}
                    </td>

                    <td>
                        <a class="badge alert-warning"
                           href="{{route('admin.articles.edit',$article->slug)}}">ویرایش</a>
                        <a class="badge alert-danger" href="{{route('admin.articles.destroy',$article->slug)}}">حذف</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$articles->links()}}
    </div>

@endsection
