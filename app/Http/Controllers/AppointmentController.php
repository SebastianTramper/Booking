<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Timeslot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\throwException;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
