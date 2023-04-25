<?php

namespace App\Http\Controllers;

use App\Repositories\Appointment\AppointmentInterface;
use App\Repositories\Doctor\DoctorInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $doctorRepo;
    protected $appointmentRepo;

    public function __construct()
    {
        $this->doctorRepo = app(DoctorInterface::class);
        $this->appointmentRepo = app(AppointmentInterface::class);
    }

    public function index() {
        $doctors = $this->doctorRepo->getListByTake(6);

        return view('user.home.index')->with(
            [
                'doctors' => $doctors
            ]
        );
    }

    public function redirect() {
        if (Auth::id()) {
            switch ((int) Auth::user()->usertype) {
                case config('constraint.auth.user') :
                    $doctors = $this->doctorRepo->getListByTake(6);

                    return view('user.home.index', compact('doctors'));
                    break;
                case config('constraint.auth.admin') : return view('admin.home'); break;
                default : return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function myAppointmentPage() {
        $appointments = $this->appointmentRepo->getUserAppointments(Auth::user()->id, 5);

        return view('user.appointment', compact('appointments'));
    }
}
