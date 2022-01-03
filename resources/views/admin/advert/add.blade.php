@extends('layouts.admin')
@section('title')
  <title>
    TRANG CHỦ
  </title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Advert','key'=>'Add'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{route('advert.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">TÊN QUẢNG CÁO</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên " value="{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">MÔ TẢ</label>
                            
                            <textarea name="description" class="form-control  @error('description') is-invalid @enderror "
                                        rows="4">
                                {{old('description')}}
                            </textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">HÌNH ẢNH</label>
                            <input type="file" class="form-control-file @error('image_path') is-invalid @enderror  " name="image_path">
                            @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection