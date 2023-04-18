<div class="page-section">
    <div class="container">
        @include('admin.layouts.success')

        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form
            class="main-form"
            method="POST"
            action="{{ route('appointments.store') }}"
        >
            @csrf

            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Full name"
                        name="name"
                        value="{{ (Auth::id() && (int) Auth::user()->usertype === 0) ? Auth::user()->name : '' }}"
                    >
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Email address.."
                        name="email"
                        value="{{ (Auth::id() && (int) Auth::user()->usertype === 0) ? Auth::user()->email : '' }}"
                    >
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input
                        type="date"
                        class="form-control"
                        name="date"
                    >
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    @if (!blank($doctors))
                        <select name="doctor_id" id="departement" class="custom-select">
                                <option>Bác sĩ</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name.' - '.array_search($doctor->speciality, config('constraint.speciality')) }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Phone number..."
                        name="phone"
                    >
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6"
                        placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="btn mt-3 wow zoomIn" style="background-color: #00D9A5;">Submit Request</button>
        </form>
    </div>
</div>
