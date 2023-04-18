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
                case 0 :
                    $doctors = $this->doctorRepo->getListByTake(6);

                    return view('user.home.index', compact('doctors'));
                    break;
                case 1 : return view('admin.home'); break;
                default : return view('dashboard'); break;
            }
        } else {
            return redirect()->back();
        }
    }

    public function myAppointmentPage() {
        $appointments = $this->appointmentRepo->getListPaginates('*', 3);

        return view('user.appointment', compact('appointments'));
    }
}
