@extends('layouts.admin')
 @section('title')
 <title>
    TÁC GIẢ
 </title>
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'TÁC GIẢ','key'=>'EDIT'])
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('tacgias.update', ['id' => $tacgia->id]) }}" method="post">
                @csrf
              <div class="form-group">
                <label>TÊN TÁC GIẢ</label>
                <input type="text" class="form-control" name="TG_HoTen"
                        value="{{ $tacgia->TG_HoTen }}"
                        placeholder="Nhập tên tác giả">
                
                <label>MÔ TẢ</label>
                <input type="text" class="form-control" name="TG_Mota"
                        value="{{ $tacgia->TG_Mota }}"
                        placeholder="Nhập mô tả">
              </div>
              <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection
 
 
 
