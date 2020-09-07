@extends('layouts.app')

@section('content')

    <div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Persons list</h1>
        </div>

        <livewire:admin.persons.person-list />

    </div>

@endsection
