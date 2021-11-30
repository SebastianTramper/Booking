<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Timeslot;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Time;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Package $package)
    {
        $timeslots = DB::table('timeslots')->where('package_id', '=', $package->id)->get();
        return view('timeslots.index', [
            'timeslots' => $timeslots,
            'package' => $package
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Timeslot $timeslot
     * @return Application|Factory|View
     */
    public function show(Timeslot $timeslot){

        return view("timeslots.show",[
            "timeslot" => $timeslot
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Package $package)
    {
        return view("timeslots.create",[
            "package" => $package
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Timeslot $timeslot
     * @return RedirectResponse
     */
    public function store(Request $request,Timeslot $timeslot, Package $package): RedirectResponse
    {

        $this->validateFormInput($request);
        $timeslot->date_from = $request->date_from;
        $timeslot->date_to = $request->date_to;
        $timeslot->package_id = $package->id;
        $timeslot->save();

        return redirect()->route('timeslots.index',$timeslot->package->id);
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
            "package_id" => $timeslot->package->id,
            "package_name" => $timeslot->package->name,
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
    public function update(Request $request, Timeslot $timeslot): RedirectResponse
    {
        $this->validateFormInput($request);
        $timeslot->date_from = $request->date_from;
        $timeslot->date_to = $request->date_to;
        $timeslot->save();

        return redirect()->route('timeslots.index',$timeslot->package->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Timeslot $timeslot
     * @return RedirectResponse
     */
    public function destroy(Timeslot $timeslot): RedirectResponse
    {
        DB::table('timeslots')->where('id', '=', $timeslot->id)->delete();
        return redirect()->route('timeslots.index', $timeslot->package->id);
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
