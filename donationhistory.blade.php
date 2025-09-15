@extends('voyager::master')

@section('content')
<div class="container">
    <h2 class="mb-4">My Donation History</h2>

    @if($donations->isEmpty())
        <div class="alert alert-info">You have not made any donations yet.</div>
    @else
        <table id="donationsTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Blood Group</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Donation Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                <tr>
                    <td>{{ $donation->donor_name }}</td>
                    <td>{{ $donation->donor_email }}</td>
                    <td>{{ $donation->blood_group }}</td>
                    <td>{{ $donation->location }}</td>
                    <td>{{ $donation->phone }}</td>
                    <td>{{ $donation->donated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#donationsTable').DataTable({
            "order": [[5, "desc"]], // order by donation date
            "pageLength": 10
        });
    });
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
