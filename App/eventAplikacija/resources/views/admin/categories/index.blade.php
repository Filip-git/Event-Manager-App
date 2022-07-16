@extends('layouts.master')

@section('content')
<div class="row m-0">
@include('components.admin-side-nav')
<div class="control-panel-container container col-lg-10">

    <div class="d-flex align-items-center pb-2 px-2">
        <h5 class="float-start control-panel-heading">Kategorije</h5>
        <a class="btn btn-sm btn-success flex-end" href="#" data-toggle="modal" data-target="#modalCreate" role="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        @include('admin.categories.modals.create')
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Ikona</th>
                <th scope="col">Naziv</th>
                <th scope="col">Opis</th>
                <th scope="col" class="text-end">Operacije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                <th scope="row">{{ $category->id }}</th>
                <td><img style="max-width: 16px;" src="{{$category->icon}}"/></td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#modalEdit-{{$category->id}}" role="button">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    @include('admin.categories.modals.edit')
                    <button type="button" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#modalDelete-{{$category->id}}" role="button">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <form id="delete-category-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                    @include('admin.categories.modals.delete')
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        &nbsp;{{ $categories->links() }}
    </div>
</div>
</div>
@stop
