@extends('layouts.admin')
@section('title')
    <title>
        Setting
    </title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/Setting/index/index.css')}}">
@endsection
@section('js')
    <script src="{{asset('vendors/SweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/delete/delete.js')}}"></script>
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=>'SETTING','key'=>'LIST'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="dropdown doimau">
                        <a class="btn  dropdown-toggle btn-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ADD SETTING
                        </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('settings.create').'?type=Text'}}">Text</a>
                        <a class="dropdown-item" href="{{route('settings.create').'?type=Textarea'}}">Textarea</a>
                       
                </div>
                </div>
                </div>
                
                <div class="col-md-12">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config Key</th>
                                <th scope="col">Config Value</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <th scope="row">{{$setting->id}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a href="{{route('settings.edit',['id'=>$setting->id]).'?type='.$setting->type}}" class="btn btn-default">EDIT</a>
                                        <a data-url="{{route('settings.delete',['id'=>$setting->id]).'?type='.$setting->type}}" class="btn btn-danger action_delete">DELETE</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $settings->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection