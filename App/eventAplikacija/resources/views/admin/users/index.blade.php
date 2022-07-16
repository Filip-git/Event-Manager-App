@extends('layouts.master')

@section('content')
<div class="row m-0">
@include('components.admin-side-nav')
<div class="control-panel-container container col-lg-10">

    <div class="d-flex align-items-center pb-2 px-2">
        <h5 class="float-start control-panel-heading">Korisnici</h5>
        <a class="btn btn-sm btn-success flex-end" href="#" data-toggle="modal" data-target="#modalCreate" role="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        @include('admin.users.modals.create')
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime</th>
                <th scope="col">Email</th>
                <th scope="col">Uloge</th>
                <th scope="col" class="text-end">Operacije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>@foreach ($user->roles as $role) {{$role->role_name}} @if ( !($loop->last) ),@endif @endforeach</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#modalEdit-{{$user->id}}" role="button">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    @include('admin.users.modals.edit')
                    <button type="button" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#modalDelete-{{$user->id}}" role="button">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                    @include('admin.users.modals.delete')
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        &nbsp;{{ $users->links() }}
    </div>
</div>
</div>
@stop
