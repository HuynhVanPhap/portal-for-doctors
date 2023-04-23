@extends('user.layouts.master')

@section('title')
    Appointment
@endsection

@section('content')
<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">My Appointments</h1>

        @include('admin.layouts.success')
        @include('admin.layouts.fail')

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Date</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Cancel</th>
                </tr>
            </thead>
            <tbody>
                @if (!blank($appointments))
                    @foreach ($appointments as $key => $appointment)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->doctor->speciality }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->message }}</td>
                            <td><span class="text-info">{{ $appointment->status }}</span></td>
                            <td>
                                <form
                                    action="{{ route('appointments.destroy', $appointment->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
