@extends('admin.layout.master')
@section('sub-header')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <!--end::Actions-->
                <!--begin::Daterange-->
                <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
                    <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
                    <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                </a>
                <!--end::Daterange-->
                <!--begin::Dropdowns-->
                <!--end::Dropdowns-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="card-body p-0 position-relative overflow-hidden">
                <!--begin::Chart-->
                <div class="card-rounded-bottom bg-primary" style="height: 200px"></div>
                <!--end::Chart-->
                <!--begin::Stats-->
                <div class="card-spacer mt-n35">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                            <span class="text-primary font-weight-bold font-size-h3 mt-2">
                                {{$applications}}
                            </span>
                            <a href="#" class="text-warning font-weight-bold font-size-h6">Applications</a>
                        </div>
                        <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                            <a href="#" class="text-danger font-weight-bold font-size-h6">Approved</a>
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <div class="card-body p-0 position-relative overflow-hidden">
                <!--begin::Chart-->
                <div class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                <!--end::Chart-->
                <!--begin::Stats-->
                <div class="card-spacer mt-n35">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                            <a href="#" class="text-warning font-weight-bold font-size-h6">Weekly Vaccinated</a>
                        </div>
                        <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                            <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">New Users</a>
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>

{{--            <div class="col-lg-6 col-xxl-6">--}}
{{--                <!--begin::Mixed Widget 1-->--}}
{{--                <div class="card card-custom card-stretch card-stretch-half gutter-b">--}}
{{--                    <!--begin::Body-->--}}
{{--                    <div class="card-body p-0">--}}
{{--                        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--end::Body-->--}}
{{--                </div>--}}
{{--                <!--end::Mixed Widget 1-->--}}
{{--            </div>--}}
            <div class="col-lg-6 col-xxl-6">
                <div class="card card-custom card-stretch card-stretch-half gutter-b">
                    <!--begin::Body-->
                    <div class="card-body p-0">

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 12-->
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/chart.js')}}"></script>

    <script src="{{asset('assets/js/pages/create-bars.js')}}"></script>
    <script src="{{asset('assets/js/pages/create-chart-js-area-test-users.js')}}"></script>
    <script src="{{asset('assets/js/pages/create-chart-js-area-test-transaction.js')}}"></script>

    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <script>
        Chart.defaults.global.defaultFontFamily = 'Poppins';
        /**
         * Transactions Graph and users weekly
         **/
        const spinners =
            `<div class="d-flex justify-content-around loading-spinner">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>`;

      //  let weekly = $(".weekly").val();
        $('.card-rounded-bottom').prepend(spinners);
        $.get('charts/analytics-area/', function(data) {
            $('#week-total').html(data.total_weekly_amount);
            $('#week-total_users').html(data.total_new_users);
            $('.card-rounded-bottom .loading-spinner').remove();
            drawEngagementGraphAreaUsers(data);
            drawEngagementGraphAreaTransactions(data);
        });
//filter
        $("#weekly-graphs").on("click", function() {
            $('.card-rounded-bottom .chart-bar').hide();
            $('.card-rounded-bottom').prepend(spinner);
            $.get('charts/analytics-area/', function(data) {
                $('.card-rounded-bottom .chart-bar').show(500);
                $('.card-rounded-bottom .loading-spinner').remove();
                $('#week-total').html(data.total_weekly_amount);
                $('#week-total_users').html(data.total_new_users);
                drawEngagementGraphAreaUsers(data);
                drawEngagementGraphAreaTransactions(data);

            });
        });
        $("#monthly-graphs").on("click", function() {
            $('.card-rounded-bottom .chart-bar').hide();
            $('.card-rounded-bottom').prepend(spinner);
            let monthly = 2;
            $.get('charts/analytics-area/' + monthly, function(data) {
                $('.card-rounded-bottom .chart-bar').show(500);
                $('.card-rounded-bottom .loading-spinner').remove();
                $('#week-total').html(data.total_weekly_amount);
                $('#week-total_users').html(data.total_new_users);
                drawEngagementGraphAreaUsers(data);
                drawEngagementGraphAreaTransactions(data);

            });
        });
        $("#yearly-graphs").on("click", function() {
            $('.card-rounded-bottom .chart-bar').hide();
            $('.card-rounded-bottom').prepend(spinner);
            let yr = 2021;
            $.get('charts/analytics-area/' + yr, function(data) {
                $('.card-rounded-bottom .chart-bar').show(500);
                $('.card-rounded-bottom .loading-spinner').remove();
                $('#week-total').html(data.total_weekly_amount);
                $('#week-total_users').html(data.total_new_users);
                drawEngagementGraphAreaUsers(data);
                drawEngagementGraphAreaTransactions(data);

            });
        });
    </script>

    <script>
        Chart.defaults.global.defaultFontFamily = 'Poppins';
        /**
         * Transactions Graph
         **/
        const spinner =
            `<div class="d-flex justify-content-around loading-spinner">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>`;

        // draw graph Discussion Engagement on page load
        let yearTransaction = $(".transaction-year").val();
        let monthTransaction = $(".transaction-month").val();
        $('.transaction-graph-card').prepend(spinner);
        $.get('charts/transaction-chart-analytics/' + monthTransaction + '/' + yearTransaction, function(data) {
            $('.transaction-graph-card .loading-spinner').remove();
            transactionsDrawGraph(data);
        });
        // on clicking filter
        $("#filter-transaction").on("click", function() {
            $('.transaction-graph-card .chart-bar').hide();
            $('.transaction-graph-card').prepend(spinner);

            let year = $(".transaction-year").val();
            let month = $(".transaction-month").val();

            $.get('charts/transaction-chart-analytics/' + month + '/' + year, function(data) {
                $('.transaction-graph-card .chart-bar').show(500);
                $('.transaction-graph-card .loading-spinner').remove();
                transactionsDrawGraph(data);
            });

        });

        function transactionsDrawGraph(data){
            var elementId="transactionsChart"
            var chartType="bar"
            var labels = data.labels
            var datasets = [
                {
                    label: "Number of Transactions",
                    type: 'line',
                    yAxisID: 'B',
                    lineTension: 0.3,
                    backgroundColor: "rgb(250,45,51, 0.6)",
                    borderColor: "#f9141b",
                    pointBorderColor: "#fff",
                    pointBackgroundColor: "#f9141b",
                    pointRadius: 5,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#f9141b",
                    pointHitRadius: 20,
                    pointBorderWidth: 2,
                    data: data.daily_count,
                },
                {
                    label: 'Amount (CFA Franc.)',
                    type: 'bar',
                    yAxisID: 'A',
                    backgroundColor: "#214594",
                    borderColor: "#2B5DCB",
                    pointRadius: 5,
                    pointBackgroundColor: "#214594",
                    pointBorderColor: "#214594",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#214594",
                    pointHitRadius: 20,
                    pointBorderWidth: 2,
                    data: data.comments,
                },
               ]
            var unit ="month"
            var maxTicksLimitX = 7
            var maxTicksLimitY = 10
            // var maxY = 3500
            var maxY = data.max_Y_axis
            var maxYCount = data.max_daily

            drawEngagementGraph(elementId, chartType, labels, datasets, unit, maxTicksLimitX, maxTicksLimitY, maxY,maxYCount);
        }
    </script>
@endsection
