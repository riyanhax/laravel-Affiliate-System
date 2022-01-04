<?php

namespace App\Http\Controllers;

use App\Models\superAdmin;
use App\Http\Requests\StoresuperAdminRequest;
use App\Http\Requests\UpdatesuperAdminRequest;
use App\Models\order;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.includes.superadmin');
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

    
    public function pendingOrders()
    {
        $pendingOrders = order::where('status', 0)->get();
        return view('admin.orders.pendingOrder', compact('pendingOrders'));
    }

    public function allOrders()
    {
        $allOrders = order::orderBy('id', 'DESC')->get();
        return view('admin.orders.allOrders', compact('allOrders'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresuperAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresuperAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(superAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(superAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesuperAdminRequest  $request
     * @param  \App\Models\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesuperAdminRequest $request, superAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(superAdmin $superAdmin)
    {
        //
    }
}
