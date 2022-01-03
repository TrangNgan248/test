@extends('layouts.admin')
@section('title')
  <title>
    ADVERTISEMENT
  </title>
@endsection
@section('css')
  <style>
    .img_advert {
      width: 150px;
      height: 100px;
    }
  </style>
@endsection
@section('content')
 <div class="content-wrapper">
    @include('partials.content-header',['name'=>'ADVERT','key'=>'LIST'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('advert.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ADVERTISEMENT</th>
                  <th scope="col">MÔ TẢ</th>
                  <th scope="col">HÌNH ẢNH</th>
                  <th scope="col">OPTION</th>
                </tr>
              </thead>
              <tbody>
              
              @foreach($adverts as $a)
                <tr>
                  <th scope="row">{{$a->id}}</th>
                  <td>{{$a->name}}</td>
                  <td>{{$a->description}}</td>
                  <td>
                    <img class="img_advert "src="{{$a->image_path}}">
                  </td>

                  <td>
                    <a href="{{route('advert.edit',['id'=>$a->id])}}" class="btn btn-default">EDIT</a>
                    <a href=""data-url="{{ route('advert.delete',['id'=>$a->id])}}" class="btn btn-danger action_delete">DELETE</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            {{ $adverts->links('pagination::bootstrap-4') }}
          </div>
          <div class="col-md-12">
          </div>
        </div>
      </div>
    </div>
 </div>

@endsection
@section('js')
  <script src="{{asset('vendors/SweetAlert2/sweetalert2@11.js')}}"></script>
  <script src="{{asset('admins/sach/add/delete.js')}}"></script>
@endsection



