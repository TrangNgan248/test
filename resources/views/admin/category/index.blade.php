@extends('layouts.admin')
@section('title')
<title>
  Danh mục sản phẩm
</title>
@endsection
@section('content')
 <div class="content-wrapper">
    @include('partials.content-header',['name'=>'DANH MỤC SẢN PHẨM','key'=>'LIST'])

   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">ADD</a>
         </div>
         <div class="col-md-12">
           <table class="table table-striped table-dark">
             <thead>
               <tr>
                 <th scope="col">#</th>
                 <th scope="col">TÊN DANH MỤC</th>
                 <th scope="col">ACTION</th>
               </tr>
             </thead>
             <tbody>
              @foreach ($categories as $danhmucsach)
               <tr>
                 <th scope="row">{{$danhmucsach->id}}</th>
                 <td>{{$danhmucsach->DMS_Tieude}}</td>
                 <td>
                   <a href="{{route('categories.edit',['id'=>$danhmucsach->id])}}" class="btn btn-default">EDIT</a>
                   <a href=""data-url="{{route('categories.delete',['id'=>$danhmucsach->id])}}" class="btn btn-danger action_delete">DELETE</a>
                 </td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div>
        
          <div class="col-md-12">
            {{$categories->links('pagination::bootstrap-4')}}
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


