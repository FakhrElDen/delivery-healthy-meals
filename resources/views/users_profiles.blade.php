@extends('voyager::master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as  $key => $value)
            <tr>
                <td>{{$value['email']}}</td>
                <td>
                    <a href="{{env('APP_URL')}}public/api/admin/normalUserProfile/{{$value['id']}}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-eye-open"></span> View 
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop