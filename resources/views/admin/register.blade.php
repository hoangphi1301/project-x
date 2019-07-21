@extends('layouts.master')
@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="box-title" style="font-weight: bold; color: black;font-size: 25px">Thêm User</h2>
            </div>
          
          <!-- Show messages from Server -->

            @if(count($errors)>0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                  {{$err}}<br>
              @endforeach
            </div>
            @endif
          
           @if(session('error'))
              <div class="alert alert-danger">
                  {{session('error')}}<br>
                </div>
              @endif
               @if(session('thanhcong'))
               <div class="alert alert-success">
                  {{session('thanhcong')}}<br>
                </div>
              @endif
          <!-- End show messages -->


          <!-- Start Form Here -->

            <form role="form" action="{{route('dangky')}}" method="post" style="background-color: MintCream;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="box-body">
                 <label>Họ Tên</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-user"></i></span>
                  <input type="text" name="name" class="form-control" placeholder="Nhập họ tên">
                </div>

                </br>
                <label>Email</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="Nhập Email">
                </div>
              
                  </br>
                  <label>Số điện thoại</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                </div>

                <br>

                <label>Chức vụ</label>
                <div class="input-group">
                       <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <select class="form-control select2" name="position" data-placeholder="Select a State">     
                             <option value="nhanvien">Nhân Viên</option>
                             <option value="truongnhom">Trưởng Nhóm</option>
                             <option value="truongphong">Trưởng Phòng</option>
                             <option value="giamdoc">Giám Đốc</option>
                      </select>
                </div>

                </br>
                 <label >Mật khẩu</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>

                </br>
                 <label>Xác nhận mật khẩu</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                  <input type="password" name="re_password" class="form-control" placeholder="Xác nhận mật khẩu">
                </div>

                <br>
                <fieldset>
                    <legend><label style="font-size: 15px">Quyền Admin</label></legend>
                    <div class="input-group">
                        <input type="radio" name="is_admin" value="0" checked="checked" > Tài khoản thường
                        <input type="radio" name="is_admin" value="1" style="margin-left: 20px" > Tài khoản Admin
                    </div>
                  </fieldset>

                <br>
                <fieldset>
                    <legend><label style="font-size: 15px">Trạng Thái</label></legend>
                    <div class="input-group">
                        <input type="radio" name="active" value="1" checked="" > Kích Hoạt
                        <input type="radio" name="active" value="0" style="margin-left: 20px" > Không Kích Hoạt
                    </div>
                  </fieldset>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Xác Nhận</button>
              </div>
            </form>

            <!-- End Form Here -->

          </div>
  @endsection