<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreaResource;
use App\Area;
use App\Events\SendAreaList;
use Illuminate\Http\Request;
use DB;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AreaResource(Area::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $area = new Area();
        Area::create($request->all());
        $last_ten_areas = Area::latest()->take(5)->get();
        $last_ten_areas = $last_ten_areas->toArray();
        event(new SendAreaList($last_ten_areas));

    }
    public function get_last_ten_rows(Request $request)
    {
        $last_ten_areas = Area::latest()->take(5)->get();
        $last_ten_areas = $last_ten_areas->toArray();
        event(new SendAreaList($last_ten_areas));

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }
}
