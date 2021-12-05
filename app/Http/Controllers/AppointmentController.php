<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Timeslot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\throwException;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $appointments = DB::table('appointments')
            ->join('timeslots','timeslots.id', '=', 'appointments.timeslot_id')
            ->join('packages','packages.id', '=', 'timeslots.package_id')
            ->join('users','users.id', '=', 'appointments.user_id')
            ->select('packages.name', 'users.email', 'timeslots.date_from', 'timeslots.date_to')
            ->get();

        return view("appointments.index", [
            'appointments' => $appointments
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Timeslot $timeslot
     * @param Appointment $appointment
     * @return RedirectResponse
     */
    public function store(Timeslot $timeslot, Appointment $appointment): RedirectResponse
    {

        $timeslotHasAppointment = DB::table('appointments')->where('timeslot_id', '=', $timeslot->id)->get();
        if($timeslotHasAppointment->first() == null){
            $appointment->timeslot_id = $timeslot->id;
            $appointment->user_id = Auth::user()->id;
            $appointment->save();
        }else{
            abort(403);
        }

        return redirect()->route('timeslots.index', $timeslot->package->id);
    }
}
