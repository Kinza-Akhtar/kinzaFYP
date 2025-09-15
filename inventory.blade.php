@extends('voyager::master')

@section('content')

<style>
    body {
        padding-top: 70px;
    }

    .page-content {
        background-color: #ffebee;
        padding: 20px;
    }

    table.dataTable th,
    table.dataTable td {
        border: 1px solid white;
        background-color: #ffebee;
        white-space: nowrap;
    }

    /* Set small width for columns with short values */
    table.dataTable th.short-col,
    table.dataTable td.short-col {
        width: 50px;
        max-width: 50px;
        text-align: center;
    }

    .panel.panel-bordered {
        background-color: white;
        border: 1px solid #e57373;
    }

    .page-title i {
        color: #e57373;
    }

    .table-responsive {
        overflow-x: auto;
        background-color: #ffebee;
    }

    table.dataTable {
        background-color: #ffebee;
        border: 1px solid #e57373;
        width: 100%;
    }

    table.dataTable>thead>tr>th {
        background-color: #e57373 !important;
        color: black !important;
    }

    table.dataTable tbody tr {
        background-color: #ffebee;
    }

    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 1px solid #e57373;
        background-color: white;
        color: #e57373;
        border-radius: 4px;
        padding: 5px;
        margin: 2px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: white !important;
        color: #e57373 !important;
        font-weight: bold;
        border: 2px solid #e57373;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #f28b82;
        color: white;
    }

    .btn {
        background-color: #ffebee;
        color: #f28b82;
    }

    .btn:hover {
        background-color: #e57373 !important;
        color: white !important;
    }
</style>

<div class="page-content container-fluid">
    <h1 class="page-title"><i class="voyager-archive"></i> Blood Inventory</h1>

    <!-- Flash message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Back button -->
    <div class="mb-3">
        <a href="{{  url('admin/donors')}}" class="btn">
            <i class="voyager-angle-left"></i> Back
        </a>
    </div>

    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="table-responsive">
                <table id="medicalHistoryTable" class="table table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>View</th>
                            @foreach($columns as $column)
                                <th class="{{ in_array($column, ['is_active', 'is_urgent', 'status']) ? 'short-col' : '' }}">
                                    {{ ucwords(str_replace('_', ' ', $column)) }}
                                </th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($medicalHistories as $history)
                            <tr>
                                <td>
                                    <a href="{{ url('medical-history/view/' . $history->id) }}" class="btn btn-sm btn-primary">
                                        <i class="voyager-eye"></i> View
                                    </a>
                                </td>

                                @foreach($columns as $column)
                                    <td class="{{ in_array($column, ['is_active', 'is_urgent', 'status']) ? 'short-col' : '' }}">
                                        {{ $history->$column }}
                                    </td>
                                @endforeach

                                <td>
                                    <form action="{{ route('medical-history.destroy', $history->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm">
                                            <i class="voyager-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#medicalHistoryTable').DataTable({
            scrollX: true,
            autoWidth: false
        });
    });
</script>
@stop
