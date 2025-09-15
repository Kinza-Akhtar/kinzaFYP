@extends('voyager::master')

@section('page_title', 'Patient Information')

@section('content')
<div class="page-content container-fluid">
    <div class="panel panel-bordered">
        <div class="panel-heading">
            <h3 class="panel-title">Patient Information</h3>
        </div>
        <div class="panel-body">
            @if($patient)
                <p><strong>Name:</strong> {{ $patient->name }}</p>
                <p><strong>Blood Group:</strong> {{ $patient->blood_group }}</p>
                <p><strong>Location:</strong> {{ $patient->location }}</p>
                <p><strong>Phone:</strong> {{ $patient->phone }}</p>
            @else
                <p>No matching patient record found.</p>
            @endif
        </div>
        <div class="panel-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
