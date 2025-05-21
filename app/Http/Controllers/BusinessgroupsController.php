<?php

namespace App\Http\Controllers;

use App\Models\businessgroups;
use App\Http\Requests\StorebusinessgroupsRequest;
use App\Http\Requests\UpdatebusinessgroupsRequest;

class BusinessgroupsController extends Controller
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
     * @param  \App\Http\Requests\StorebusinessgroupsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebusinessgroupsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\businessgroups  $businessgroups
     * @return \Illuminate\Http\Response
     */
    public function show(businessgroups $businessgroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\businessgroups  $businessgroups
     * @return \Illuminate\Http\Response
     */
    public function edit(businessgroups $businessgroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebusinessgroupsRequest  $request
     * @param  \App\Models\businessgroups  $businessgroups
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebusinessgroupsRequest $request, businessgroups $businessgroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\businessgroups  $businessgroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(businessgroups $businessgroups)
    {
        //
    }
}
