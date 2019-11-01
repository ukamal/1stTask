@extends('layouts.admin')
@section('css_content')
    <link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
@endsection

@section('body_content')

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('admin/submitclientinfo') }}" method="post" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="clientName">Client Name</label>
            <input type="text"  class="form-control" name="clientName" id="clientName" placeholder="Client Name">
        </div>

        <div class="form-group">
            <label for="clientLogo">Client Logo</label>
            <input type="file" data-preview="#preview" name="clientLogo" id="clientLogo" accept=".jpg, .jpeg, .png" multiple>
        </div>

        <button type="submit" class="btn btn-default">Save</button>
    </form>

@endsection

@section('javascript_content')
@endsection