@extends('layouts.admin')
 @section('title')
 <title>
    NEWS
 </title>
 @endsection
 @section('css')
 <style> .TT_Anh {
     width: 150px;
     height: 100px;
 }
 </style>
 @endsection
 @section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'News','key'=>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
           <a href="{{route('news.create')}}" class="btn btn-success float-right m-2">Add News</a>
         </div>
          <!-- Tin tức -->
          <div class="col-md-12">
           <table class="table table-striped table-dark">
             <thead>
               <tr>
                 <th scope="col">#</th>
                 <th scope="col">TIÊU ĐỀ</th>
                 <th scope="col">TÁC GIẢ</th>
                 <th scope="col">ẢNH</th>
                 <th scope="col">NHÓM TIN</th>
                 <th scope="col">ACTION</th>
               </tr>
             </thead>
             <tbody>
               @foreach($tintucs as $tintuc)
                <tr>
                  <th scope="row">{{ $tintuc->id }}</th>
                  <td>{{ $tintuc->TT_TieuDe }}</td>
                  <td>{{ $tintuc->TT_TacGia }}</td>
                  <td><img class="TT_Anh"src="{{ $tintuc->TT_paths}}"></td>
                  <td>{{ $tintuc->TT_NhomTin }}</td>
                  <td>
                    <a href="{{ route('news.edit', ['id' => $tintuc->id]) }}" class="btn btn-default">EDIT</a>
                    <a href=""data-url="{{ route('news.delete', ['id' => $tintuc->id]) }}" class="btn btn-danger action_delete">DELETE</a>
                  </td>
                </tr>
               @endforeach
             </tbody>
            </table>
            <div class="col-md-12">
              {{$tintucs->links('pagination::bootstrap-4')}}
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
 
 
