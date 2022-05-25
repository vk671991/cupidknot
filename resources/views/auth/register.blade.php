@extends('layouts.app')
@section('css')
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <h4>Personal Details</h4>
                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>

                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name">

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                                    <div class="col-md-6">
                                        <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror datepicker" name="date_of_birth" value="{{ old('date_of_birth') }}"  autocomplete="date_of_birth">

                                        @error('date_of_birth')
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
                                    <label for="annual_income" class="col-md-4 col-form-label text-md-end">{{ __('Annual Income') }}</label>

                                    <div class="col-md-6">
                                        <input id="annual_income" type="number" min="1" class="form-control @error('annual_income') is-invalid @enderror" name="annual_income" value="{{ old('annual_income') }}"  autocomplete="annual_income">

                                        @error('annual_income')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                                    <div class="col-md-6">
                                        <select id="occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation">
                                            <option value="">Select</option>
                                            <option value="Private Job">Private Job</option>
                                            <option value="Government Job">Government Job</option>
                                            <option value="Business">Business</option>
                                        </select>
                                        @error('occupation')
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

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Partner Prefrece</h4>

                                <div class="row mb-3">
                                    <label for="prefered_annual_income" class="col-md-4 col-form-label text-md-end">{{ __('Annual Income (Rs)') }}</label>

                                    <div class="col-md-6">
                                        <div id="slider-range" style="margin-top: 13px"></div>
                                        <input id="prefered_annual_income" readonly class="form-control @error('prefered_annual_income') is-invalid @enderror" name="prefered_annual_income" value="{{ old('prefered_annual_income') }}" autocomplete="prefered_annual_income" >

                                        @error('prefered_annual_income')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="prefered_occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                                    <div class="col-md-6">
                                        <select id="prefered_occupation" class="form-control @error('prefered_occupation') is-invalid @enderror select2-multiple" multiple="multiple" name="prefered_occupation[]">
                                            <option value="">Select</option>
                                            <option value="Private Job">Private Job</option>
                                            <option value="Government Job">Government Job</option>
                                            <option value="Business">Business</option>
                                        </select>
                                        @error('prefered_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="prefered_famiy_type" class="col-md-4 col-form-label text-md-end">{{ __('Family Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="prefered_famiy_type" class="form-control @error('prefered_famiy_type') is-invalid @enderror select2-multiple" multiple="multiple" name="prefered_famiy_type[]" >
                                            <option value="">Select</option>
                                            <option value="Joint family">Joint family</option>
                                            <option value="Nuclear family">Nuclear family</option>
                                        </select>
                                        @error('prefered_famiy_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="prefered_manglik" class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>

                                    <div class="col-md-6">
                                        <select id="prefered_manglik" class="form-control @error('prefered_manglik') is-invalid @enderror" name="prefered_manglik" >
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="Both">Both</option>
                                        </select>
                                        @error('prefered_manglik')
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
        values: [100000, 500000],
        slide: function (event, ui) {
            $("#prefered_annual_income").val(ui.values[ 0 ] + "-" + ui.values[ 1 ]);
        }
    });
    $("#prefered_annual_income").val($("#slider-range").slider("values", 0) +
            "-" + $("#slider-range").slider("values", 1));
});
</script>
@endsection
