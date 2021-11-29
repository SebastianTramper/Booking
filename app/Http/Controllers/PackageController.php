<?php

namespace App\Http\Controllers;

use App\Models\package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $packages = DB::table('packages')->get();
        return view('packages.index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("packages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param package $package
     * @return RedirectResponse
     */
    public function store(Request $request, Package $package): RedirectResponse
    {
        $this->validateFormInput($request);

        $package->name = $request->name;
        $package->excerpt = $request->excerpt;
        $package->description = $request->description;
        $package->image_url = $request->image_url;
        $package->price = $request->price;
        $package->save();

        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function show(Request $request)
    {
        $package = DB::table('packages')->where("id", "=", $request->id)->first();
        return view("packages.show", [
            "id" => $package->id,
            "name" => $package->name,
            "excerpt" => $package->excerpt,
            "description" => $package->description,
            "image_url" => $package->image_url,
            "price" => $package->price
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function edit(Request $request)
    {
        $package = DB::table('packages')->where("id", "=", $request->id)->first();
        return view("packages.edit", [
            "id" => $package->id,
            "name" => $package->name,
            "excerpt" => $package->excerpt,
            "description" => $package->description,
            "image_url" => $package->image_url,
            "price" => $package->price
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function update(Request $request)
    {
        $this->validateFormInput($request);
        $package = Package::find($request->id);

        $package->name = $request->name;
        $package->description = $request->description;
        $package->image_url = $request->image_url;
        $package->price = $request->price;
        $package->save();

        $packages = DB::table('packages')->get();

        return view('packages.index', ['packages' => $packages]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function destroy(Request $request)
    {
        DB::table('packages')->where('id', '=', $request->id)->delete();
        $packages = DB::table('packages')->get();
        return view('packages.index', ['packages' => $packages]);
    }

    /**
     * @param Request $request
     */
    public function validateFormInput(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'price' => 'required'
        ]);
    }
}
