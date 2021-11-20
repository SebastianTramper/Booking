<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $timeslots = DB::table('timeslots')->get();

        return view('timeslots.index', [
            'timeslots' => $timeslots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("timeslots.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Timeslot $timeslot
     * @return RedirectResponse
     */
    public function store(Request $request, Timeslot $timeslot): RedirectResponse
    {
        $this->validateFormInput($request);

        $timeslot->date_from = $request->date_from;
        $timeslot->date_to = $request->date_to;
        $timeslot->package_id = 3;
        $timeslot->save();

        return redirect()->route('timeslots.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(Timeslot $timeslot)
    {
        return view("timeslots.edit", [
            "id" => $timeslot->id,
            "date_from" => $timeslot->date_from,
            "date_to" => $timeslot->date_to,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Timeslot $timeslot
     * @return RedirectResponse
     */
    public function update(Request $request, Timeslot $timeslot)
    {
        $this->validateFormInput($request);

        $timeslot->date_from = $request->date_from;
        $timeslot->date_to = $request->date_to;
        $timeslot->save();

        return redirect()->route('timeslots.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Timeslot $timeslot
     * @return RedirectResponse
     */
    public function destroy(Timeslot $timeslot): RedirectResponse
    {
        $timeslot->delete();
        return redirect()->route('timeslots.index');
    }

    /**
     * @param Request $request
     */
    public function validateFormInput(Request $request): void
    {
        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required'
        ]);
    }
}
