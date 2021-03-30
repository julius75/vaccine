@extends('admin.layout.master')
@section('content')
    <!--begin::Card-->
    <div class="card card-custom card-transparent">
        <div class="card-body p-0">
            <!--begin::Wizard-->
            <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title align-center">COVID-19 Vaccine Registration Form</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form"  method="POST" action="{{route('application.store')}}">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter full name" required/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter full name" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Phone Number:</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter contact number" required/>
                                </div>

                                <div class="col-lg-6">
                                    <label>National ID/Passport:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="id_number" placeholder="National ID/Passport" required/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-bookmark-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required/>
                                </div>

                                <div class="col-lg-6">
                                    <label>Date of Birth :</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="dob" placeholder="Enter date of birth" required/>
                                        <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Vaccines Type:</label>
                                    <div class="radio-inline">
                                        <label class="radio radio-solid  mr-3">
                                            <input type="radio" name="dose_type" checked="checked" value="1" required/>
                                            <span></span>One</label>
                                        <label class="radio radio-solid">
                                            <input type="radio" name="dose_type" value="2" required/>
                                            <span></span>Two</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Next Dose Date :</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="next_dose_date" placeholder="Date of next dose" required/>
                                        <div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-bookmark-o"></i>
																	</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>
            <!--end::Wizard-->
        </div>
    </div>
    <!--end::Card-->
@endsection
@section('scripts')
{{--    <script src="{{asset('assets/js/pages/custom/user/add-user.js')}}"></script>--}}
{{--    <script>--}}
{{--        $( ".random" ).click(function( event ) {--}}
{{--            event.preventDefault();--}}
{{--            var rnd = Math.floor(Math.random() * 100000);--}}
{{--            document.getElementById('myText').value = "RUV".concat(rnd.toString());--}}

{{--        });--}}
{{--    </script>--}}
@endsection

