@extends('back.index')

@section('title')
پنل مدیریت-مدیریت کاربران
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

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

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

        <table class="table table-hover">

            <thead>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>وضعیت</th>
                <th>مدیریت</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)


                @switch($user->status)
                    @case(1)
                    @php
                        $url=route('admin.users.updatestatus',$user->id);
                        $status='<a href="'.$url.'" class="badge alert-success">فعال</a>';
                    @endphp
                    @break
                    @case(0)
                    @php
                        $url=route('admin.users.updatestatus',$user->id);
                        $status='<a href="'.$url.'" class="badge alert-warning">غیر فعال</a>';
                    @endphp
                    @break
                    @default
                @endswitch



                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {!! $status !!}
                    </td>

                    <td>
                        <a class="badge alert-success"
                           href="{{route('admin.users.profile',$user->id)}}">ویرایش</a>
                        <a class="badge alert-warning" href="{{route('admin.users.destroy',$user->id)}}"
                           onclick="return confirm('آیا کاربر مورد نظر حذف شود')">حذف</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$users->links()}}
    </div>

@endsection
