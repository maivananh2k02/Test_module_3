@extends('layout.master')
@section('content')
    <div class="container">
        <div class="card" style="width: 50rem;margin-left: 50px">
            <div class="card-header" style="text-align: center">
                Sửa thông tin
            </div>
            <div class="container">
                <form method="post" action="{{route('agency.update',$agency->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã số đại lý</label>
                        <input value="{{$agency->code}}" type="number" name="code" class="form-control"
                               id="exampleInputEmail1" placeholder="Mã số đại lý">
                        @error('code')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đại lý</label>
                        <input value="{{$agency->name}}" type="text" name="name" class="form-control"
                               id="exampleInputEmail1" placeholder="Tên đại lý">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input value="{{$agency->phone}}" name='phone' type="number" class="form-control"
                               id="exampleInputEmail1" placeholder="Số điện thoại">
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input value="{{$agency->email}}" type="email" name="email" class="form-control"
                               id="exampleInputEmail1" placeholder="Email">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        Địa chỉ
                        <input value="{{$agency->address}}" type="text" name='address'
                               class="form-control"
                               id="exampleInputEmail1" placeholder="Địa chỉ">
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên người quản lý</label>
                        <input value="{{$agency->manager_name}}" name="manager_name" type="text" class="form-control"
                               id="exampleInputEmail1" placeholder="Tên người quản lý">
                        @error('manager.name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trạng thái hoạt động</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option @if($agency->status == 1) selected @endif value="1">Hoạt động</option>
                            <option @if($agency->status == 0) selected @endif value="0">Không hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    &emsp;
                    <button class="btn btn-danger" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>

            </div>
        </div>
    </div>
@endsection
