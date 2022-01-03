@extends('layouts.admin')
 @section('title')
 <title>
    NEWS
 </title>
 @endsection
 
 @section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'NEWS','key'=>'LIST'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label>TIÊU ĐỀ</label>
                <input type="text" class="form-control" name="TT_TieuDe"
                        placeholder="Nhập tiêu đề">

                <label>TÁC GIẢ</label>
                <input type="text" class="form-control" name="TT_TacGia"
                        placeholder="Nhập tên tác giả">

                <label>NGÀY</label>
                <input type="datetime-local" class="form-control" name="TT_Ngay"
                        placeholder="Nhập ngày">
                
                <label>MÔ TẢ</label>
                <input type="text" class="form-control" name="TT_MoTa"
                        placeholder="Nhập mô tả">

                <label>NỘI DUNG</label>
                <input type="text" class="form-control" name="TT_NoiDung"
                        placeholder="Nhập nội dung">
                
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="File">FILE</label>
                  <input class="border py-2 px-3 text-grey-800" type="file" name="TT_Anh"  id="file">
              </div>
                
                {{-- <label>Hiển thị</label>
                <input type="number" class="form-control" name="TT_HienThi"
                        placeholder="Nhập hiển thị"> --}}
                
                        <div class="form-group">
                          <label>HIỂN THỊ</label>
                          <textarea name="TT_HienThi" class="form-control my-editor"></textarea>
                        </div>

                <label>NHÓM TIN</label>
                <select class="form-control" name="TT_NhomTin">
                  <option value="0">Chọn nhóm tin</option>
                  {!!$htmOption!!}
                </select>

              </div>
              <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection
 
 
 
