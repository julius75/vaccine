<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Request as RequestModel;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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

        // remove non digits including spaces, - and +
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
