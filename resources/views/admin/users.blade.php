@extends('layouts.master')
@section('content')

<div class="container" style="background-color: MintCream;">
  <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
            <div class="col-sm-5">
            <h2 style="color: black"><b>Quản lý Users</b></h2>
          </div>
          <!-- Button Add User here -->
          <div class="col-sm-8" style="display: block;">
            <a href="{{route('dangky')}}" class="btn btn-primary"><img src="source/icon/icon_add_user.png" width="20px"> <span>Thêm User</span></a>
          </div>

         <!--  <form method="get" action="{{route('searchuser')}}">
           <div class="box-tools pull-right" style="margin-right: 100px">
                <div class="has-feedback">
                  <input type="text"  name="search" class="form-control" placeholder="Tìm kiếm User">
                  <button type="submit" class="btn btn-success pull-right">Tìm kiếm</button>
                </div>
            </div>
          </form>    -->

        <form method="get" action="{{route('searchuser')}}">
            <div class="input-group pull-right" style="margin-right: 100px; width: 300px">
      
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm User">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
            </div>   
         </form>

        </div>
      </div>

<div class="box-body">
<table id="myTable" class="table table-striped table-hover" style="margin-right: 20px">
  <!-- Tittle of Table data users -->
    <thead>
          <tr style="color: DarkSlateGray;">
              <th>Tên</th>           
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Chức vụ</th>
              <th>Trạng Thái</th>
              <th>Quyền</th>
              <th>Controller</th>
          </tr>
    </thead>
    <tbody>
          <!-- Show Messages form Server -->
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
              @if(session('thongbao'))
               <div class="alert alert-danger">
                  {{session('thongbao')}}<br>
                </div>
              @endif
           <!-- End Messages -->
      @foreach($users as $u)
        <tr class="text-blue">
            <td><img src="source/avatar/{{$u->userprofile->avatar}}" width="35px" height="35px" class="img-circle" alt="Avatar"><b style="color: DarkMagenta; margin-left: 10px;">{{$u->name}}</b></td>
            <td>{{$u->email}}</td>                        
            <td>{{$u->phone}}</td>
            <td>
                 
                  @switch($u->position)
                  @case ("nhanvien")
                     Nhân viên
                      @break

                  @case ("truongnhom")
                      Trưởng nhóm
                      @break

                   @case ("truongphong")
                      Trưởng phòng
                      @break

                   @case ("giamdoc")
                      Giám đốc
                      @break

                  @default
                      Default case...
                @endswitch
            </td>
            <td>
                @if($u->active==1)
                  Đang hoạt động
                  @else
                  Ngừng hoạt động
                @endif
            </td>
            <td>
               @if($u->is_admin==1)
                  <b style="color: red;">Admin</b>
                  @else
                  <i>Thường</i>
                @endif
            </td>
            <td>

              <!-- Click show Modal Update User -->
              <a href="#" class="aClick" uid="{{$u->id}}" email="{{$u->email}}" position="{{$u->position}}" active="{{$u->active}}" is_admin="{{$u->is_admin}}" data-toggle="modal" data-target="#myModal" data-backdrop="static"><img src="source/icon/icon_update_user.png" width="20px"></a>

              <!-- Click to Delete User -->
              <a href="{{route('deleteuser',$u->id)}}" onclick="return confirm('Bạn có muốn xóa tài khoản {{$u->email}} ?');" class="aDelete" ><img src="source/icon/icon_delete_user.png" width="20px"></a>    
            </td>  
        </tr>
       @endforeach
    </tbody>
</table>
</div>
<div class="row">{{$users->links()}}</div>

  </div>
</div>      

 <!-- Start Modal Update User -->
        <div class="modal modal-info fade" id="myModal" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <img src="source/icon/icon_update_user.png" width="60px" style="margin-bottom:10px;">
                <h3 class="modal-title" id="titleModal" style="display: inline;"></h3>
              </div>
              <!-- Start Form -->
              <form id="frmUpdateUser" action="" method="post" >

                <div class="modal-body">
                 <!-- Body Model -->
                   <label>Chức vụ</label>
                  <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                          <select id="slPosition" class="form-control select2" name="position" data-placeholder="Select a State">     
                               <option value="nhanvien">Nhân Viên</option>
                               <option value="truongnhom">Trưởng Nhóm</option>
                               <option value="truongphong">Trưởng Phòng</option>
                               <option value="giamdoc">Giám Đốc</option>
                        </select>
                  </div>
                  <br>
                  <fieldset>
                      <legend><label style="font-size: 15px">Quyền Admin</label></legend>
                      <div class="input-group">
                          <input type="radio" name="is_admin" value="0" > Tài khoản thường
                          <input type="radio" name="is_admin" value="1" style="margin-left: 20px" > Tài khoản Admin
                      </div>
                    </fieldset>

                  <fieldset>
                      <legend><label style="font-size: 15px">Trạng Thái</label></legend>
                      <div class="input-group">
                          <input type="radio" name="active" value="1"  > Kích Hoạt
                          <input type="radio" name="active" value="0" style="margin-left: 20px" > Không Kích Hoạt
                      </div>
                    </fieldset>

                    <!-- End Body Modal -->

                </div>
              </form>
            
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Hủy</button>
                <button type="button" id="btnSave" class="btn btn-outline btnSave">Thay Đổi</button>
               
              </div>
              <div id="thongbao"></div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- End Modal Update User -->

@endsection

@section('footer_scripts')   
<script type="text/javascript">

$(document).ready(function(){

var reload = false;

// Token here
$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Click link to get data to Modal
      $('.aClick').click(function(){
        var id = $(this).attr('uid');
        var email = $(this).attr('email');
        var position = $(this).attr('position');
        var is_admin = $(this).attr('is_admin');
        var active = $(this).attr('active');
        $('#frmUpdateUser').attr('value',id);
        $('#slPosition').val(position);
        $('input[name=is_admin][value='+is_admin+']').prop('checked',true);
        $('input[name=active][value='+active+']').prop('checked',true);
        $('#titleModal').html('Cập Nhật Tài Khoản : <i style="color: Chartreuse">' + email + '</i>');
      });

      // Ajax Update User
      $('#btnSave').click(function(e){
        e.preventDefault();
        $.ajax({
            url: 'admin/cap-nhat-user/' + $('#frmUpdateUser').attr('value'),
            type: 'POST',
            data: $('#frmUpdateUser').serialize(),
            success: function(data){
              console.log(data);
              $.each(data,function(key,value){
                    if(key=='thatbai'){
                      $('#thongbao').attr('class','alert alert-danger');
                      $('#thongbao').html(value);
                    }
                    if(key=='thanhcong'){
                      $('#thongbao').attr('class','alert alert-success');
                      $('#thongbao').html(value);
                      reload = true;
                    }
              });
            }
        });

      });
      // End Ajax

      // Process when hide Modal
      $('#myModal').on('hidden.bs.modal',function(e){
        $('#thongbao').attr('class','');
          $('#thongbao').html('');
          if(reload){
            window.location.href = "/admin/quan-ly-user";
          }
      });
  });
</script>
@endsection