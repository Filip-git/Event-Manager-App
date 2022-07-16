@extends('layouts.master')

@section('content')
<div class="row m-0">
@include('components.admin-side-nav')
<div class="control-panel-container container col-lg-10">

    <div class="d-flex align-items-center pb-2 px-2">
        <h5 class="float-start control-panel-heading">Događaji</h5>
        <a class="btn btn-sm btn-success flex-end" href="#" data-toggle="modal" data-target="#modalCreate" role="button">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </a>
        @include('admin.events.modals.create')
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Naziv</th>
                <th scope="col">Opis</th>
                <th scope="col">Datum</th>
                <th scope="col">Kategorije</th>
                <th scope="col">Organizator</th>
                <th scope="col">Lokacija</th>
                <th scope="col" class="text-end">Operacije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                <th scope="row">{{ $event->id }}</th>
                <td>{{ $event->name }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->date }}</td>
                <td>@foreach($event->categories as $category){{ $category->name}}@if ( !($loop->last) ),@endif
                    @endforeach</td>
                <td>{{ $event->organizer->name }}</td>
                <td>{{ $event->location->name }}</td>
                <td class="text-end">
                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#modalEdit-{{$event->id}}" role="button">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    @include('admin.events.modals.edit')
                    <button type="button" class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#modalDelete-{{$event->id}}" role="button">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                    <form id="delete-event-form-{{ $event->id }}" action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                    @include('admin.events.modals.delete')
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
</div>
</div>
@stop
