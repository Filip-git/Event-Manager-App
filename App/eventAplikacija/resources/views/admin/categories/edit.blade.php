@extends('layouts.master')

@section('content')
<x-guest-layout>
    <x-form-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 fill-current text-gray-500 d-none" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <p class="form-heading">Uređivanje podataka kategorije<p>
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @include('admin.categories.partials.form')
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
