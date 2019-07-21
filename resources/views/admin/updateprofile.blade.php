@extends('layouts.master')
@section('content')
<div class="box box-primary" style="background-color: MintCream;">
            <div class="box-header with-border">
              <h2 class="box-title" style="font-weight: bold; color: black;font-size: 25px">Chỉnh sửa Profile của bạn</h2>
            
            </div>
          <!-- Show messages from Server -->
            @if(count($errors)>0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                  {{$err}}<br>
              @endforeach
            </div>
            @endif
          
          @if(session('thanhcong'))
          <div class="alert alert-success">
                {{session('thanhcong')}}
              </div>
          @endif
          <!-- End Show messages -->

          <!-- Start Form -->

            <form role="form" action="{{route('updateprofile',$user->id)}}" method="post" enctype="multipart/form-data" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="box-body">
                <div align="center">
                <label style="display: block;">Ảnh Đại Diện Của Bạn</label>
                <img id="imgClick" class="img-circle" src="source/avatar/{{$user->userprofile->avatar}}" width="200px" height="200px">
                <input type="file" name="avatar" style="display: none;" id="ipFile" accept="image/*" >
              </div>

                 <label>Họ Tên</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-user"></i></span>
                  <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nhập họ tên">
                </div>

                </br>
                <label>Email</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input disabled="true" value="{{$user->email}}" type="email" class="form-control" placeholder="Email">
                </div>
              
                  </br>
                  <label>Số điện thoại</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Nhập số điện thoại">
                </div>

                <br>
                <label>Ngày Sinh</label>
                <i class="fa fa-calendar" ></i>
                <div class="input-group" >
                <div class="col-10">
                  <input class="form-control" name="birthday" type="date" value="{{$user->userprofile->birthday}}" min="1945-01-01" max="2020-01-01">
                </div>
               </div>

                <br>
                <label>Địa chỉ</label>
                 <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-home"></i></span>
                  <input type="text" value="{{$user->userprofile->address}}" name="address" class="form-control" placeholder="Nhập địa chỉ">
                </div>

                <br>
                
                  <label style="font-size: 15px">Giới tính</label>
                 <div class="input-group">
                  @if($user->userprofile->sex == 0)
                  <input type="radio" name="sex" value="1"> Nam &nbsp;&nbsp;
                   <input type="radio" checked="" name="sex" value="0"> Nữ
                   @else
                   <input type="radio" checked name="sex" value="1"> Nam &nbsp;&nbsp;
                   <input type="radio" name="sex" value="0"> Nữ
                  @endif
                </div>
             

              <br>
              <div class="form-group">
                  <label>Thêm về bạn</label>
                  <textarea class="form-control" name="description" rows="3" placeholder="Enter ...">{{$user->userprofile->description}}</textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thay Đổi</button>
              </div>
            </form>

<!-- End Form Here -->

          </div>

@endsection

@section('footer_scripts')

<script type="text/javascript">
  
  $(document).ready(function(){
        $('#imgClick').click(function(){
            $('#ipFile').click();
        });

        // Script Change avatar when click chose file
          function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#imgClick').attr('src', e.target.result);
              }            
              reader.readAsDataURL(input.files[0]);                       
            }
          }

          $("#ipFile").change(function(){
              readURL(this);
          });
          // End Script change avatar
  });

</script>

@endsection