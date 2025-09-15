@extends('voyager::master')

@section('content')
<div class="page-content container-fluid">
    <h1 class="page-title"><i class="voyager-heart"></i> Donor Information</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card" style="border:1px solid #e57373; border-radius:15px; background:#ffebee; padding:20px;">
        <h3 style="color:#e57373;">Donor Information</h3>
        <p><b>Patient ID:</b> {{ $donor->patient_id }}</p>
        <p><b>Patient Name:</b> {{ $donor->patient_name }}</p>
        <p><b>Patient Blood Group:</b> {{ $donor->patient_blood_group }}</p>
        <p><b>Patient Location:</b> {{ $donor->patient_location }}</p>
        <p><b>Patient Phone:</b> {{ $donor->patient_phone }}</p>
        <p><b>Patient Email:</b> {{ $donor->patient_email }}</p>
        <hr>
        <p><b>Donor Name:</b> {{ $donor->name }}</p>
        <p><b>Donor Blood Group:</b> {{ $donor->blood_group }}</p>
        <p><b>Donor Location:</b> {{ $donor->location }}</p>
        <p><b>Donor Phone:</b> {{ $donor->phone }}</p>
        <p><b>Donor Email:</b> {{ $donor->donor_email }}</p>
    </div>
</div>
@endsection
