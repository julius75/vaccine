@extends('admin.layout.master')
@section('styles')
    <link href="{{asset('assets/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .border-line{
            border: 1px solid #c3cad8;
        }
    </style>
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-custom card-transparent">
        <div class="card-body p-0">
            <!--begin::Wizard-->
            <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title align-center">COVID-19 Vaccine User Details</h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>First Name:</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" readonly/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Last Name:</label>
                                    <input type="text" class="form-control" value="{{$user->last_name}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Phone Number:</label>
                                    <input type="text" class="form-control" value="{{$user->phone}}" readonly/>
                                </div>

                                <div class="col-lg-6">
                                    <label>National ID/Passport:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="id_number" value="{{$user->id_number}}" readonly/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-bookmark-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" value="{{$user->phone}}" readonly/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Date of Birth :</label>
                                    <input type="text" class="date form-control" value="{{Carbon\Carbon::parse($user->date_of_birth)->isoFormat('MMM D YYYY')}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Vaccines Type:</label>
                                    <div class="radio-inline">
                                        <label class="radio radio-solid  mr-3">
                                            <input type="radio" name="dose_type" value="{{$user->dose_type}}" readonly/>
                                            <span></span>One</label>
                                        <label class="radio radio-solid">
                                            <input type="radio" name="dose_type" value="{{$user->dose_type}}" readonly/>
                                            <span></span>Two</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Next Dose Date :</label>
                                    <input type="text" class="date form-control"
                                          readonly value="{{Carbon\Carbon::parse($user->next_dose_date)->isoFormat('MMM D YYYY')}}" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12">
                                            <span class="text-dark-75 font-weight-bolder font-size-h4 text-success">Medical History</span>
                                        <table class="table">
                                            <thead>
                                            <tr style="border-color: #c3cad8;">
                                                <th scope="col"></th>
                                                <th scope="col" class="bg-light-primary font-weight-bolder" style="border: 1px solid #c3cad8;">Yes</th>
                                                <th scope="col" class="bg-light-primary font-weight-bolder" style="border: 1px solid #c3cad8;">No</th>
                                                <th scope="col" class="bg-light-primary font-weight-bolder" style="border: 1px solid #c3cad8;">Don't know</th>
                                            </tr>
                                            </thead>
                                            <tbody style="border: 1px solid #c3cad8;">
                                            <tr>
                                                <th scope="row" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">
                                                    Do you have allergies to latex, food, medications, or vaccine
                                                    components? (such as eggs, thimerosal, gelatin, neomycin,phenol, or
                                                    bovine protein)?
                                                </th>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="allergies" value="{{$user->allergies}}"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="allergies" value="{{$user->allergies}}"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio" name="allergies" value="{{$user->allergies}}"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Did you ever experience any serious reaction after
                                                    getting a vaccine?
                                                </th>
                                                <td class="border-line">
                                                    <label class="radio radio-lg">
                                                        <input type="radio"  name="reaction" value="Yes"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="border-line">
                                                    <label class="radio radio-lg">
                                                        <input type="radio"  name="reaction" value="No"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="border-line">
                                                    <label class="radio radio-lg">
                                                        <input type="radio"  name="reaction" value="Don't know"/>
                                                        <span></span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">In the past year, did you receive a transfusion of blood
                                                    or blood products, or get injected immune (gamma) globulin or any
                                                    antiviral drug?
                                                </th>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="transfusion" value="Yes"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="transfusion" value="No"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio" name="transfusion" value="Don't know"/>
                                                        <span></span>
                                                    </label>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Did you have any brain or other nervous system
                                                    problems?
                                                </th>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="problems" value="Yes"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="problems" value="No"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio" name="problems" value="Don't know"/>
                                                        <span></span>
                                                    </label>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Have you get vaccinated in the last 4 weeks?</th>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="vaccinated" value="Yes"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="vaccinated" value="No"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio" name="vaccinated" value="Don't know"/>
                                                        <span></span>
                                                    </label>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Are your pregnant or planning to get pregnant or your
                                                    partner is planning to get pregnant?
                                                </th>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="pregnant" value="Yes"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio"  name="pregnant" value="No"/>
                                                        <span></span>
                                                    </label></td>
                                                <td class="border-line"><label class="radio radio-lg">
                                                        <input type="radio" name="pregnant" value="Don't know"/>
                                                        <span></span>
                                                    </label>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card">
                                    <div class="col-lg-12">
                                        <div class="card-header border-0">
{{--                                            here1--}}
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">Do you have any of the followings? (select all that apply)</label>
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value=" Lung disease"/>
                                                    <span></span>
                                                    Lung disease
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value="  Heart disease"/>
                                                    <span></span>
                                                    Heart disease
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value=" Asthma"/>
                                                    <span></span>
                                                    Asthma
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value=" Kidney Disease"/>
                                                    <span></span>
                                                    Kidney Disease
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value="Diabetes"/>
                                                    <span></span>
                                                    Diabetes
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value="Anemia"/>
                                                    <span></span>
                                                    Anemia
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value=" Blood disorder"/>
                                                    <span></span>
                                                    Blood disorder
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="disease[]" value="None"/>
                                                    <span></span>
                                                    None
                                                </label>
                                            </div>
                                        </div>
                                            <div class="separator separator-solid my-7"></div>
                                            <div class="form-group">

                                            <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">Do you have immunocompromised condition? (select all that apply)</label>
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value="Cancer"/>
                                                    <span></span>
                                                    Cancer
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value="Leukemia"/>
                                                    <span></span>
                                                    Leukemia
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value="Lymphoma"/>
                                                    <span></span>
                                                    Lymphoma
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox"  name="immunocompromised[]" value="HIV/AIDS"/>
                                                    <span></span>
                                                    HIV/AIDS
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value=" Transplant"/>
                                                    <span></span>
                                                    Transplant
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value=" Asplenia"/>
                                                    <span></span>
                                                    Asplenia
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value=" CSF leak"/>
                                                    <span></span>
                                                    CSF leak
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised[]" value="Cochlear implant"/>
                                                    <span></span>
                                                    Cochlear implant
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="immunocompromised" value="None"/>
                                                    <span></span>
                                                    None
                                                </label>
                                            </div>
                                        </div>
                                            <div class="separator separator-solid my-7"></div>
                                            <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">Have you ever tested positive for COVID-19?</label>
                                                <div class="radio-inline">
                                                <label class="radio radio-lg">
                                                    <input type="radio"  name="tested" value=" Yes"/>
                                                    <span></span>
                                                   Yes
                                                </label>
                                                <label class="radio radio-lg">
                                                    <input type="radio" name="tested" value=" No"/>
                                                    <span></span>
                                                    No
                                                </label>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">Test Date:</label>
                                                <input type="text" class="date form-control" name="test_date"
                                                       placeholder="Enter tested date"/>
                                            </div>
                                        </div>
                                            <div class="separator separator-solid my-7"></div>
                                            <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">In the last 14 days, have you contacted with a person who was confirmed to have COVID-19?</label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-lg">
                                                        <input type="radio"  name="contacted " value="  Yes"/>
                                                        <span></span>
                                                        Yes
                                                    </label>
                                                    <label class="radio radio-lg">
                                                        <input type="radio" name="contacted " value="  No"/>
                                                        <span></span>
                                                        No
                                                    </label>
                                                    <label class="radio radio-lg">
                                                        <input type="radio" name="contacted " value="Not sure"/>
                                                        <span></span>
                                                        Not sure
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">In the last 14 days, have you travelled internationally?</label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-lg">
                                                        <input type="radio"  name="travelled" value="Yes"/>
                                                        <span></span>
                                                        Yes
                                                    </label>
                                                    <label class="radio radio-lg">
                                                        <input type="radio" name="travelled " value=" No"/>
                                                        <span></span>
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="separator separator-solid my-7"></div>
                                            <div class="form-group">
                                            <label class="font-weight-bold text-dark-75 text-hover-primary font-size-h6-lg mb-3">Do you have any of the followings?</label>
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value=" Cough"/>
                                                    <span></span>
                                                    Cough
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value="    Cold"/>
                                                    <span></span>
                                                    Cold
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value=" Fever"/>
                                                    <span></span>
                                                    Fever
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value="Shortness of breath"/>
                                                    <span></span>
                                                    Shortness of breath
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value=" Sore throat"/>
                                                    <span></span>
                                                    Sore throat
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value=" Loss of smell/taste"/>
                                                    <span></span>
                                                    Loss of smell/taste
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value="Abdominal pain/diarrhea"/>
                                                    <span></span>
                                                    Abdominal pain/diarrhea
                                                </label>
                                                <label class="checkbox checkbox-lg">
                                                    <input type="checkbox" name="symptoms[]" value=" Abnormal bruising or bleeding/eye redness"/>
                                                    <span></span>
                                                    Abnormal bruising or bleeding/eye redness
                                                </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
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

    {{--    <script>--}}
    {{--        $( ".random" ).click(function( event ) {--}}
    {{--            event.preventDefault();--}}
    {{--            var rnd = Math.floor(Math.random() * 100000);--}}
    {{--            document.getElementById('myText').value = "RUV".concat(rnd.toString());--}}

    {{--        });--}}
    {{--    </script>--}}
@endsection

