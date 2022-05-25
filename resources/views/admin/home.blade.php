@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ session('error') }}
            </div>
            @endif
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">{{ __('Filter User') }}</div>

                <div class="card-body">
                    <form method="GET" action="#" id="filterUsers">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="annual_income" class="col-md-4 col-form-label text-md-end">{{ __('Annual Income (Rs)') }}</label>

                                    <div class="col-md-6">
                                        <div id="slider-range" style="margin-top: 13px"></div>
                                        <input id="annual_income" readonly class="form-control @error('annual_income') is-invalid @enderror" name="annual_income" value="{{ old('annual_income') }}" autocomplete="annual_income" >

                                        @error('annual_income')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" >
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="manglik" class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>

                                    <div class="col-md-6">
                                        <select id="manglik" class="form-control @error('gender') is-invalid @enderror" name="manglik" >
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        @error('manglik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="row mb-3">
                                    <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age in Yrs') }}</label>

                                    <div class="col-md-6">
                                        <div id="age-slider-range" style="margin-top: 13px"></div>
                                        <input id="age" readonly class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age" >

                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="famiy_type" class="col-md-4 col-form-label text-md-end">{{ __('Family Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="famiy_type" class="form-control @error('famiy_type') is-invalid @enderror" name="famiy_type" >
                                            <option value="">Select</option>
                                            <option value="Joint family">Joint family</option>
                                            <option value="Nuclear family">Nuclear family</option>
                                        </select>
                                        @error('famiy_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="filterData">
                                    {{ __('Filter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Annual Income</th>
                                <th>Family Type</th>
                                <th>Manglik</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Annual Income</th>
                                <th>Family Type</th>
                                <th>Manglik</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
jQuery(document).ready(function ($) {
    $('.select2-multiple').select2();
    var maxBirthdayDate = new Date();
    $(".datepicker").datepicker({
        maxDate: maxBirthdayDate,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [0, 1000000],
        slide: function (event, ui) {
            $("#annual_income").val(ui.values[ 0 ] + "-" + ui.values[ 1 ]);
        }
    });
    $("#annual_income").val($("#slider-range").slider("values", 0) +
            "-" + $("#slider-range").slider("values", 1));

    $("#age-slider-range").slider({
        range: true,
        min: 18,
        max: 60,
        values: [0, 1000000],
        slide: function (event, ui) {
            $("#age").val(ui.values[ 0 ] + "-" + ui.values[ 1 ]);
        }
    });
    $("#age").val($("#age-slider-range").slider("values", 0) +
            "-" + $("#age-slider-range").slider("values", 1));

    $("#filterData").on('click', function () {
        table.ajax.reload();
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ route('admin.home') }}",
            "data": {
                "annual_income": $("input[name=annual_income]").val(),
                "gender": $('#gender option:selected').val(),
                "manglik": $('#manglik option:selected').val(),
                "famiy_type": $('#famiy_type option:selected').val(),
                "age": $("input[name=age]").val(),
            }
        },
        columns: [
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'date_of_birth', name: 'date_of_birth'},
            {data: 'gender', name: 'gender'},
            {data: 'annual_income', name: 'annual_income'},
            {data: 'famiy_type', name: 'famiy_type'},
            {data: 'manglik', name: 'manglik'},
        ]
    });


});
</script>
@endsection
