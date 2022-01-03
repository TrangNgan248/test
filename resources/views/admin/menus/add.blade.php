@extends('layouts.admin')
@section('title')
  <title>
    MENU
  </title>
@endsection
@section('content')
 <div class="content-wrapper">
  @include('partials.content-header',['name'=>'MENU','key'=>'ADD'])
   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-6">
             <form action="{{route('menus.store')}}" method="POST" class="ml-5">
               @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">MENU</label>
              <input type="text" class="form-control" name="name"
              placeholder="Nhap tên menu">
              </div>
              
              <div class="form-group">
                <label for="exampleFormControlSelect1">CHỌN DANH MỤC CHA</label>
                <select class="form-control" name="parent_id">
                  <option value="0">Chọn đi chờ chi</option>
                    {!!$optionSelect!!}
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



