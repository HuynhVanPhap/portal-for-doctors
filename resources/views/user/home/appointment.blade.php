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
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="Full name"
                        name="name"
                        value="{{ old('name', (Auth::id() && (int) Auth::user()->usertype === 0) ? Auth::user()->name : '') }}"
                    >

                    @if ($errors->has('name'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input
                        type="text"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="Email address.."
                        name="email"
                        value="{{ old('email', (Auth::id() && (int) Auth::user()->usertype === 0) ? Auth::user()->email : '') }}"
                    >

                    @if ($errors->has('email'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input
                        type="date"
                        class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"
                        name="date"
                        value="{{ old('date') }}"
                    >

                    @if ($errors->has('date'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('date') }}</span>
                    @endif
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor_id" id="departement" class="custom-select {{ $errors->has('doctor_id') ? 'is-invalid' : '' }}">
                        @if (!blank($doctors))
                                <option value="">Bác sĩ</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ ((int) old('doctor_id') === $doctor->id) ? 'selected' : '' }}>
                                    {{ $doctor->name.' - '.$doctor->speciality }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                    @if ($errors->has('doctor_id'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('doctor_id') }}</span>
                    @endif
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input
                        type="text"
                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                        placeholder="Phone number..."
                        name="phone"
                        value="{{ old('phone') }}"
                    >

                    @if ($errors->has('phone'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea
                        name="message"
                        id="message"
                        class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                        rows="6"
                        placeholder="Enter message.."
                        value="{{ old('message') }}"
                    >
                    </textarea>

                    @if ($errors->has('message'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('message') }}</span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn mt-3 wow zoomIn" style="background-color: #00D9A5;">Submit Request</button>
        </form>
    </div>
</div>
