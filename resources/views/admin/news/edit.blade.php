@extends('layouts.admin')
 @section('title')
 <title>
    NEWS
 </title>
 @endsection
 @section('css')
 <style> .TT_Anh {
     width: 36%;
     height: 100%;
 }
 </style>
 @endsection
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'NEWS','key'=>'EDIT'])
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('news.update', ['id' => $tintuc->id]) }}" method="post">
                @csrf
              <div class="form-group">
                <label>TIÊU ĐỀ</label>
                <input type="text" class="form-control" name="TT_TieuDe"
                        value="{{ $tintuc->TT_TieuDe }}"
                        placeholder="Nhập tiêu đề">
                
                <label>TÁC GIẢ</label>
                <input type="text" class="form-control" name="TT_TacGia"
                        value="{{ $tintuc->TT_TacGia }}"
                        placeholder="Nhập tác giả">
                
                <label>NGÀY</label>
                <input type="datetime-local" class="form-control" name="TT_Ngay"
                        value="{{ $tintuc->TT_Ngay }}"
                        placeholder="Nhập ngày">

                <label>MÔ TẢ</label>
                <input type="text" class="form-control" name="TT_MoTa"
                        value="{{ $tintuc->TT_MoTa }}"
                        placeholder="Nhập mô tả">
                
                <label>NỘI DUNG</label>
                <input type="text" class="form-control" name="TT_NoiDung"
                        value="{{ $tintuc->TT_NoiDung }}"
                        placeholder="Nhập nội dung">

                {{-- <label>Ảnh</label>
                <input type="file" class="form-control" name="TT_Anh"
                        value="{{ $tintuc->TT_paths}}"
                        placeholder="Chọn ảnh">
                // --}}
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="File">FILE</label>
                  <input class="border py-2 px-3 text-grey-800" type="file" name="TT_Anh"  id="file">
              </div>

              <div class="col-md-12">
                <div class="row">
                  <img class="TT_Anh" src="{{$tintuc->TT_paths}}" alt="">
                </div>
                 
              </div>
{{-- 
                <label>HIỂN THỊ</label>
                <input type="number" class="form-control" name="TT_HienThi"
                        value="{{ $tintuc->TT_HienThi }}"
                        placeholder="Hiển thị"> --}}
                        <div class="form-group">
                          <label>HIỂN THỊ</label>
                          <textarea name="TT_HienThi" class="form-control my-editor" value="{{ $tintuc->TT_HienThi }}"></textarea>
                        </div>
                <label>NHÓM TIN</label>
                <select class="form-control" name="TT_NhomTin">
                  <option value="0">Chọn nhóm tin</option>
                  {!!$htmlOption!!}
                </select>
              </div>
              <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection
 
 
 
