@extends('layouts.admin')
@section('title')
  <title>
  MENU
  </title>
@endsection
@section('content')
 <div class="content-wrapper">
    @include('partials.content-header',['name'=>'MENU','key'=>'LIST'])

   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">

           <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2">ADD</a>

         </div>
         <div class="col-md-12">
           <table class="table table-striped table-dark">
             <thead>
               <tr>
                 <th scope="col">#</th>
                 <th scope="col">TÊN MENU</th>
                 <th scope="col">ACTION</th>
               </tr>
             </thead>
             <tbody>
              
              @foreach ($menus as $menu)
              <tr>
                <th scope="row">{{$menu->id}}</th>
                <td>{{$menu->name}}</td>
                <td>
                  <a href="{{route('menus.edit',['id'=>$menu->id])}}" class="btn btn-default">EDIT</a>
                  <a href=""data-url="{{route('menus.delete',['id'=>$menu->id])}}" class="btn btn-danger action_delete">DELETE</a>
                </td>
              </tr>
              @endforeach

             </tbody>
           </table>
         </div>
        
          <div class="col-md-12">
            {{$menus->links('pagination::bootstrap-4')}}
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


