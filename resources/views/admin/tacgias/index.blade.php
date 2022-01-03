@extends('layouts.admin')
 @section('title')
 <title>
    Tác giả
 </title>
 @endsection

 @section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Tác giả','key'=>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('tacgias.create')}}" class="btn btn-success float-left m-2">THÊM TÁC GIẢ</a>
          </div>
          
          <div class="col-md-12">
            <table class="table table-striped table-dark">
             <thead>
               <tr>
                 <th scope="col">#</th>
                 <th scope="col">TÊN TÁC GIẢ</th>
                 <th scope="col">MÔ TẢ</th>
                 <th scope="col">ACTION</th>
               </tr>
             </thead>
             <tbody>
               @foreach($tacgias as $tacgia)
                <tr>
                  <th scope="row">{{ $tacgia->id }}</th>
                  <td>{{ $tacgia->TG_HoTen }}</td>
                  <td>{{ $tacgia->TG_Mota }}</td>
                  <td>
                    <a href="{{ route('tacgias.edit', ['id' => $tacgia->id]) }}" class="btn btn-default">EDIT</a>
                    <a href=""data-url="{{ route('tacgias.delete', ['id' => $tacgia->id]) }}" class="btn btn-danger action_delete">DELETE</a>
                  </td>
                </tr>
               @endforeach
             </tbody>
            </table>
            <div class="col-md-12">
              {{$tacgias->links('pagination::bootstrap-4')}}
            </div>
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
 
 
