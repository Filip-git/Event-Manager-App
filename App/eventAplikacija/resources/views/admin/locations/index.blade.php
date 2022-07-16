@extends('layouts.master')

@section('content')
<div class="row m-0">
@include('components.admin-side-nav')
<div class="control-panel-container container col-lg-10">

    <div class="d-flex align-items-center pb-2 px-2">
        <h5 class="float-start control-panel-heading">Lokacije</h5>
        <a class="btn btn-sm btn-success flex-end" href="#" data-toggle="modal" data-target="#modalCreate" role="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        @include('admin.locations.modals.create')
    </div>

    <div>
        <table class="table" style="">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Naziv</th>
                <th scope="col" class="text-end">Operacije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                <tr>
                <th scope="row">{{ $location->id }}</th>
                <td>{{ $location->name }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#modalEdit-{{$location->id}}" role="button">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    @include('admin.locations.modals.edit')
                    <button type="button" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#modalDelete-{{$location->id}}" role="button">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <form id="delete-location-form-{{ $location->id }}" action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                    @include('admin.locations.modals.delete')
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        &nbsp;{{ $locations->links() }}
    </div>
</div>
</div>
@stop
