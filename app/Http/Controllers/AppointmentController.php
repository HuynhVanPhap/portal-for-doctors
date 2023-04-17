<?php

namespace App\Http\Controllers;

use App\Repositories\Appoitment\AppoitmentInterface;
use App\Services\AppoitmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $repo;
    protected $service;

    public function __construct()
    {
        $this->repo = app(AppoitmentInterface::class);
        $this->service = app(AppoitmentService::class);
    }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $this->service->processingData($request);

        if (is_null($params)) {
            return back()->with('fail', 'Tạo mới cụôc hẹn thất bại !');
        }

        $this->repo->create($params);

        return back()->with('success', 'Tạo mới cụôc hẹn thành công !');
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
