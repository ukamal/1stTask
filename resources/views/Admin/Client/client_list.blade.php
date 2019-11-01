@extends('layouts.admin')
@section('css_content')
    <link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/Admin_css/dataTables.bootstrap.css') }}">
@endsection

@section('body_content')

    @if (\Session::has('client_list_msg'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('client_list_msg') !!}</li>
            </ul>
        </div>
    @endif

    <div class="col-xs-12 col-sm-12">
        <div class="panel">
            <div class="panel-body">
                <div class="box box-info">
                    <div class="box-body">
                        <h2>Client List</h2>

                        <table id="client-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Client Image</th>
                                    <th>Client Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>
                                            <img
                                                style="width: 100px;height: 100px;"
                                                src="{{ URL::asset('images/clients/'. $client->client_image) }}" />
                                        </td>

                                        <td>{{ $client->client_name }}</td>

                                        <td>
                                            <a data-client_id="{{ $client->id }}" class="deletecleint" href="#" data-toggle="modal" data-target="#deleteModal">
                                                <i class="fa fa-times"></i>
                                            </a>

                                            <a href="#" title="Edit Client" class="edit_client" data-toggle="modal" data-backdrop="static" data-target="#viewCleintEditModal"
                                               data-client_id="{{ $client->id }}"
                                               data-client_name="{{ $client->client_name }}"
                                            >
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--EDIT MODAL--}}
    <div class="modal fade" id="viewCleintEditModal" tabindex="-1" role="alert" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="editclient" id="editCleintForm" enctype="multipart/form-data" role="form">
                        {{ csrf_field() }}

                        <input type="hidden" name="client_id" id="client_id" />

                        <div class="form-group">
                            <label for="clientName">Client Name</label>
                            <input type="text"  class="form-control" name="clientName" id="clientName" placeholder="Client Name">
                        </div>

                        <div class="form-group">
                            <label for="clientLogo">Client Logo</label>
                            <input type="file" name="clientLogo" id="clientLogo" accept=".jpg, .jpeg, .png" multiple>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="saveButton" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{--DELETE MODAL--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="alert" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Delete this client?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    <a id="deleteButton" href="" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript_content')
    <script src="{{ URL::asset('js/Admin_js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/Admin_js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#client-table').DataTable({
                "paging" : true,
                "lengthChange" : false,
                "searching" : false,
                "ordering" : true,
                "info" : true,
                "autoWidth" : false
            });

            $(".deletecleint").click(function () {
                id = $(this).data("client_id");

                $("#deleteButton").attr('href', 'deleteClient/' + id);
            });

            $(".edit_client").click(function () {
                $("#client_id").val($(this).data("client_id"));
                $("#clientName").val($(this).data("client_name"));
            });

            $("#saveButton").click(function () {
                $("#editCleintForm").submit();
            });
        })
    </script>
@endsection