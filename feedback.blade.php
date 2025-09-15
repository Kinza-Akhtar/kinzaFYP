@extends('voyager::master')

@section('content')
    <style>
        /* Remove default DataTables background */
        table.dataTable {
            background-color: #ffebee !important;
        }

        table.dataTable thead th,
        table.dataTable tbody td {
            background-color: #ffebee !important;
        }

        .dataTables_wrapper {
            background-color: #ffebee !important;
            padding: 15px;
            border-radius: 5px;
        }

        table.dataTable tbody tr:hover {
            background-color: #ffe5e9 !important;
        }

        .voyager .pagination .active>a {
            background-color: #ffffff !important;
            color: #e57373 !important;
            border: 1px solid #e57373 !important;
            box-shadow: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background: transparent !important;
            color: #e57373 !important;
            border-radius: 5px !important;
            padding: 6px 12px !important;
            margin: 0 4px !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #ffffff !important;
            color: #e57373 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:focus {
            background-color: #ffe5e9 !important;
            color: #c62828 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #ffe5e9 !important;
            color: #c62828 !important;
            border-color: #e57373 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        body,
        .page-content {
            background-color: #ffebee !important;
        }

        .btn {
            color: #e57373 !important;
            background-color: transparent !important;
            padding: 10px 20px !important;
            font-size: 16px !important;
        }

        .page-header .btn {
            margin: 5px 20px 5px 20px;
            color: #e57373 !important;
            font-size: 16px !important;
        }

        .btn i,
        .voyager-chat,
        .voyager-list,
        .voyager-home {
            color: #e57373 !important;
        }

        .btn:hover {
            background-color: #e57373 !important;
            color: white !important;
        }

        .btn:hover i {
            color: white !important;
        }

        #feedbackTable {
            background-color: #ffebee !important;
            border: 1px solid #e57373 !important;
        }

        #feedbackTable thead th {
            background-color: #e57373;
            border: 1px solid white !important;
            color: #000 !important;
            font-weight: 600;
        }

        #feedbackTable tbody td {
            border: 1px solid white !important;
        }

        .panel-bordered {
            border: 1px solid #e57373 !important;
        }

        .table-hover tbody tr:hover {
            background-color: #ffe5e9 !important;
        }
    </style>

    @if(session('success'))
        <div class="alert alert-success" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
            {{ session('error') }}
        </div>
    @endif

    <div class="page-content container mt-5">
        <div class="page-header d-flex justify-content-between align-items-center flex-wrap mb-4">
            <h1 class="page-title mb-2 mb-md-0 text-dark">
                <i class="voyager-chat"></i> Donor Feedback
            </h1>
            <div class="d-flex flex-wrap">
                <a href="{{ route('voyager.dashboard') }}" class="btn">
                    <i class="voyager-home"></i> Home
                </a>
            </div>
        </div>

        <h2 class="text-center mb-4 text-dark">All Feedback</h2>

        <div class="table-container">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="feedbackTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Satisfaction Level</th>
                                    <th>Donation Process</th>
                                    <th>Match Finding Experience</th>
                                    <th>Recommend</th>
                                    <th>Opinion</th>
                                    <th>Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $index => $feedback)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $feedback->satisfaction_level }}</td>
                                        <td>{{ $feedback->donation_process }}</td>
                                        <td>{{ $feedback->match_finding_experience }}</td>
                                        <td>{{ $feedback->recommend }}</td>
                                        <td>{{ $feedback->opinion }}</td>
                                        <td>{{ $feedback->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#feedbackTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
            });
        });

        setTimeout(() => document.querySelector('.alert')?.remove(), 3000);
    </script>
@endsection