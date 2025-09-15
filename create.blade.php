@extends('voyager::master')

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="voyager-heart"></i> Create Donor</h3>
                </div>
                <div class="panel-body">

                    <form method="POST" action="{{ route('donors.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" required placeholder="Enter your username">
                        </div>

                        <div class="form-group">
                            <label for="cnic">CNIC:</label>
                            <input type="text" class="form-control" name="cnic" id="cnic" required placeholder="Enter your CNIC">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required placeholder="Enter your email">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" required placeholder="Enter your phone number">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" name="address" id="address" rows="3" required placeholder="Enter your address"></textarea>
                        </div>

                        <!-- ✅ Password Field -->
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" required placeholder="Choose a password">
                        </div>

                        <!-- ✅ OTP Field -->
                        <div class="form-group">
                            <label for="otp">OTP (Optional):</label>
                            <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP if applicable">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="voyager-plus"></i> Create Donor
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    body, .page-content {
        background-color: #ffebee !important;
    }

    .panel-bordered {
        border: 1px solid #e57373 !important;
        border-radius: 8px;
    }

    .panel-heading {
        background-color: #e57373 !important;
        color: white;
        font-weight: bold;
    }

    .form-group label {
        color: #e57373;
        font-weight: 600;
    }

    .form-control {
        border: 1px solid #e57373 !important;
        border-radius: 5px;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #e57373 !important;
    }

    .btn-success {
        background-color: #e57373 !important;
        border-color: #e57373 !important;
    }

    .btn-success:hover {
        background-color: #e57373 !important;
        border-color: #e57373 !important;
    }
</style>
@stop
