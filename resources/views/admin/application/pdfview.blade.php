<div style="width:100%; height:800px; padding:10px; text-align:center; border: 10px solid #787878">
    < style="width:92%; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
        <span style="font-size:50px; font-weight:bold">Vaccine Certificate</span>
        <br><br>
        <span style="font-size:25px"><i><img src="data:image/png;base64,{{ $image }}" style="height:100px;"></i></span>
        <br>
        <span style="font-size:25px"><i>This is to certify that</i></span>
        <br><br>
        <span style="font-size:22px">NAME :<b>{{$data->first_name}} {{$data->last_name}}</b></span><br/><br/>
        <span style="font-size:22px">ID / PASSPORT : <b>{{$data->id_number}}</b></span><br/><br/>
        <span style="font-size:22px">APPLICATION ID : <b>{{$data->code}}</b></span><br/><br/>

        <span style="font-size:25px"><i>has successfully received Covid-19 vaccine</i></span> <br/><br/>

        <span style="font-size:28px"><b>Next Dose Date</b></span><br/><br/>
        <span style="font-size:25px"><i>{{Carbon\Carbon::parse($data->next_dose_date)->isoFormat('MMM D YYYY')}}</i></span> <br/><br/>

</div>
