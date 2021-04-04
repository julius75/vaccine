<html>
<head>
    <style type='text/css'>
        body, html {
            margin: 0;
            padding: 0;
        }
        body {
            color: black;
            display: table;
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
        }
        .container {
            border: 20px solid tan;
            width: 750px;
            height: 563px;
            display: block;
            vertical-align: middle;
        }
        .logo {
            color: tan;
            margin-top: 40px;
        }

        .marks {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }
        .mark {
            color: tan;
            font-size: 28px;
            margin: 20px;
        }
        .assignment {
            margin: 20px;
        }
        .person {
            font-size: 22px;
            margin: 20px auto;
            width: 400px;
        }
        .reason {
            margin: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo" >
        <img src="data:image/png;base64,{{ $image }}" style="height:100px;">
    </div>

    <div class="marks">
        Covid-19 Vaccine Certificate
    </div>

    <div class="assignment">
        This certificate is presented to
    </div>

    <div class="person">
        <b>NAME: </b><i>{{$data->first_name}} {{$data->last_name}}</i>
        <br>
        <b>ID / PASSPORT: </b><i>{{$data->id_number}}</i>

    </div>

    <div class="reason">
        Has successfully received Covid-19 vaccine on <span style="font-size:25px"><b>{{Carbon\Carbon::parse($data->created_at)->isoFormat('MMM D YYYY')}}</b></span>
    </div>
    <div class="mark">
        Next Dose Date
        <p><b>{{Carbon\Carbon::parse($data->next_dose_date)->isoFormat('MMM D YYYY')}}</b></p>
    </div>
</div>
</body>
</html>
