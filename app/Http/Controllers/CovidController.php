<?php

namespace App\Http\Controllers;

use App\Mail\VaccineCertificate;
use PDF;
use Carbon\Carbon;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Mail;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\isEmpty;

class CovidController extends Controller
{
    use SerializesModels;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.application.index');
    }
    public function getDashboard(){
       $applications =  \App\Models\Request::count();
        return view('admin.dashboard',compact('applications'));
    }
    public function getVendors()
    {
        $users = \App\Models\Request::orderBy('created_at', 'desc')->get();
        return Datatables::of($users)
            ->addColumn('date_dose', function ($users){
                return  Carbon::parse($users->next_dose_date)->isoFormat('MMM D YYYY');
            })
            ->addColumn('action', function ($users) {
                return '<div class="dropdown dropdown-inline">
								<a href="" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
	                                <i class="la la-cog"></i>
	                            </a>
							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
									<ul class="nav nav-hoverable flex-column">
							    		<li class="nav-item"><a class="nav-link" href="'.route('application.show',Crypt::encrypt($users->id)).'"><i class="nav-icon la la-stop-circle"></i><span class="nav-text">View  Application</span></a></li>
							    		<li class="nav-item"><a class="nav-link" href="'.route('application.edit',Crypt::encrypt($users->id)).'"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Application</span></a></li>
							    		<li class="nav-item"><a class="nav-link" href="'.route('getcertificate',Crypt::encrypt($users->id)).'"><i class="nav-icon la la-print"></i><span class="nav-text">Print Certificate</span></a></li>

							    	</ul>
							  	</div>
							</div>

						';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' =>  'required',
            'last_name' =>  'required',
            'email' => 'required|email',
            'id_number' => 'required',
            'dob' => 'required',
            'next_dose_date' => 'required',
            'dose_type' => 'required',
            'phone'=> 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->get('immunocompromised') == null ){
            $immunocompromised= null;
        }
        elseif (!$request->get('immunocompromised') == null) {
            $immunocompromised = implode(",", $request->get('immunocompromised'));
        }
        if ($request->get('symptoms') == null ){
            $symptoms= null;
        }
        elseif (!$request->get('symptoms') == null) {
            $symptoms = implode(",", $request->get('symptoms'));
        }
        if ($request->get('disease') == null ){
            $vehicleString= null;
        }
        elseif (!$request->get('disease') == null) {
            $vehicleString = implode(",", $request->get('disease'));
        }
        //$input['user_has_disease'] = $request->input('disease');

        $code = rand(pow(10, 7-1), pow(10, 7)-1);
        try {
            $req = \App\Models\Request::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'id_number' => $request->id_number,
                'date_of_birth' => Carbon::parse($request->dob)->format('Y-m-d'),
                'next_dose_date' => Carbon::parse($request->next_dose_date)->format('Y-m-d'),
                'dose_type' => $request->dose_type,
                'code' => $code,
                'allergies' => $request->allergies,
                'reaction' => $request->reaction,
                'transfusion' => $request->transfusion,
                'problems' => $request->problems,
                'vaccinated' => $request->vaccinated,
                'pregnant' => $request->pregnant,
                'tested' => $request->tested,
                'contacted_' => $request->contacted_,
                'travelled' => $request->travelled,
                'test_date' => $request->test_date,
                'user_has_disease' => $vehicleString,
                'immunocompromised' => $immunocompromised,
                'symptoms' => $symptoms,

            ]);

            return redirect()->route('application.index')->with('flash_success', 'User Application submitted successfully');
        } catch (\Exception $exception) {
            return redirect()->route('application.create')->with('error', $exception);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $user = \App\Models\Request::findOrFail($id);
            return view('admin.application.show',compact('user'));
        }
        catch (ModelNotFoundException $e) {
            return $e;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
// Generate PDF
    public function createPDF($id) {
        try {
            $id = Crypt::decrypt($id);
            $data = \App\Models\Request::findOrFail($id);
            $qr = QrCode::generate("yuyiuiu");
            $qr = base64_encode($qr);
            $image = base64_encode(file_get_contents(public_path('/images/logo-bliz.jpeg')));
            $qr_code = QrCode::size(250)
                ->backgroundColor(255, 255, 204)
                ->generate('MyNotePaper');
            $datas["email"] = "aatmaninfotech@gmail.com";
            $datas["title"] = "From ItSolutionStuff.com";
            $datas["body"] = "This is Demo";
            $details = [
                'name' => $data->first_name. ' '.$data->last_name,
                'email' => $data->email,
                'title' => "Bliss HEALTHCARE",
                'body' => "This is to notify you have received the COVID-19 Vaccine certificate",
            ];
            $pdf = PDF::loadView('admin.application.pdfview',compact('data','image','qr','qr_code'));
            $fileName = $data->first_name.' '. $data->last_name;

            Mail::send('admin.application.send-email', $details, function($message)use($details, $pdf) {
                $message->to($details["email"], $details["email"])
                    ->subject($details["title"])
                    ->attachData($pdf->output(), "vaccine certificate.pdf");
            });
          //  Mail::to($email)->send(new DemoMail());
           // Mail::to($request->user())->send(new OrderShipped($order));
//            $details = [
//                'name' => $data->first_name. ' '.$data->last_name,
//                'to' => $data->email,
//            ];
            //Mail::send(new VaccineCertificate($details,$pdf));
            return $pdf->stream($fileName.'.pdf');

        }
        catch (ModelNotFoundException $e) {
            return $e;
        }
        // retreive all records from db


        //return PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        // view()->share('application',$data);

    }
    // Generate PDF
    public function pdfview($id) {
        {
            try {
                $id = Crypt::decrypt($id);
               $data = \App\Models\Request::findOrFail($id);
                //$data = \App\Models\Request::get()->first();
                $image = base64_encode(file_get_contents(public_path('/images/health.png')));
                $qr = QrCode::generate("$data->code");

             //  view()->share('application',$data);
                $pdf = PDF::loadView('admin.application.pdfview',['application'=> $data]);

                // download PDF file with download method
                $filename = $data->first_name;

                return $pdf->stream($filename. 'pdf');
            }
            catch (ModelNotFoundException $e) {
                return $e;
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
