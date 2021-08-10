@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-8">
            <a href="{{route('agency.create')}}" class="btn btn-success " role="button"
               aria-pressed="true">Thêm
                mới</a>
        </div>
        <div class="col-4">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" method="get" action="{{route('agency.search')}}">
                    @csrf
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Nhập nội dung tìm kiếm"
                           aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
    </div>
    <h2>Danh sách đại lý phân phối</h2>
    <hr>
    @if(Session::has('delete_success'))
        <p class="alert-success">{{ Session::get('delete_success') }}</p>
    @endif
    @if(Session::has('update_success'))
        <p class="alert-success">{{ Session::get('update_success') }}</p>
    @endif
    @if(Session::has('store_success'))
        <p class="alert-success">{{ Session::get('store_success') }}</p>
    @endif
    <table class="table">
        <thead style="background-color: pink">
        <tr style="text-align: center">
            <th scope="col">STT</th>
            <th scope="col">Mã đại lý</th>
            <th scope="col">Tên dại lý</th>
            <th scope="col">Điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Tên người quản lý</th>
            <th scope="col">Trạng thái</th>
            <th scope="col" colspan="2">Chức năng</th>
        </tr>
        </thead>
        <tbody style="text-align: center">
        @if(count($agencies)>0)
            @foreach($agencies as $agency=>$value)
                <tr>
                    <th>{{$agency+=1}}</th>
                    <th scope="row">{{$value->code}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->manager_name}}</td>
                    <td>
                        @if($value->status == 1)
                            Hoạt động
                        @else
                            Ngừng hoạt động
                        @endif
                    </td>

                    <td>
                        <a class="btn btn-success" href="{{route('agency.edit',$value->id)}}">Sửa</a>
                    </td>
                    <td><a onclick="return confirm('Are you Sure?')" class="btn btn-danger"
                           href="{{route('agency.delete',$value->id)}}">Xoá</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9" style="text-align: center">
                    <h1>Dữ liệu trống (0)</h1>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
