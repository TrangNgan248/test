@extends('layouts.admin')
 @section('title')
 <title>
    NEWSGROUP
 </title>
 @endsection

 @section('content')
  <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Newsgroup','key'=>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
           <a href="{{route('newsgroup.create')}}" class="btn btn-success float-right m-2">Add Newsgroup</a>
        </div>
         <!-- Nhóm tin -->
          <div class="col-md-12">
           <table class="table table-striped table-dark">
             <thead>
               <tr>
                 <th scope="col">#</th>
                 <th scope="col">TÊN NHÓM TIN</th>
                 <th scope="col">MÔ TẢ</th>
                 <th scope="col">ACTION</th>
               </tr>
             </thead>
             <tbody>
               @foreach($nhomtins as $nhomtin)
                <tr>
                  <th scope="row">{{ $nhomtin->id }}</th>
                  <td>{{ $nhomtin->NT_Ten }}</td>
                  <td>{{ $nhomtin->NT_MoTa }}</td>
                  <td>
                    <a href="{{ route('newsgroup.edit', ['id' => $nhomtin->id]) }}" class="btn btn-default">EDIT</a>
                    <a href="{{ route('newsgroup.delete', ['id' => $nhomtin->id]) }}" class="btn btn-danger">DELETE</a>
                  </td>
                </tr>
               @endforeach
             </tbody>
            </table>
            <div class="col-md-12">
              {{$nhomtins->links('pagination::bootstrap-4')}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection
 
 
 
