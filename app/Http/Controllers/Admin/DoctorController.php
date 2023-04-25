<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Repositories\Doctor\DoctorInterface;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $repo;
    protected $service;

    public function __construct()
    {
        $this->repo = app(DoctorInterface::class);
        $this->service = app(DoctorService::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = $this->repo->getListPaginates('*', 3);

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $params = $this->service->processingData($request);

        if (is_null($params)) {
            return back()->with('fail', 'Tạo mới bác sĩ thất bại !');
        }

        $this->repo->create($params);

        return back()->with('success', 'Tạo mới Bác sĩ thành công !');
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
    public function edit(Doctor $doctor)
    {
        if (blank($doctor)) {
            abort(404);
        }

        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, $id)
    {
        $params = $this->service->processingData($request);

        if (is_null($params)) {
            return back()->with('fail', 'Cập nhật thông tin bác sĩ thất bại !');
        }

        $this->repo->update($id, $params);

        return back()->with('success', 'Cập nhật thông tin Bác sĩ thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->repo->delete($id)) {
            return back()->with('fail', 'Xóa dữ liệu bác sĩ thất bại !');
        }

        return back()->with('success', 'Xóa dữ liệu bác sĩ thành công !');
    }
}
