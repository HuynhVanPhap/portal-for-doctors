@extends('admin.master')

@section('title')
    Cập nhật Cuộc hẹn
@endsection

@section('content')
{{ Breadcrumbs::render('appointments.edit', $appointment) }}

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        @include('admin.layouts.success')
        @include('admin.layouts.fail')

        <div class="card-body">
            <form
                class="forms-sample"
                action="{{ route('appointments.update', $appointment->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="exampleInputName1">Bệnh nhân</label>
                    <p
                        class="form-control"
                        id="exampleInputName1"
                    >
                        {{ $appointment->name }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Bác sĩ / Chuyên ngành</label>
                    <p
                        class="form-control"
                        id="exampleInputName1"
                    >
                        {{ $appointment->doctor->name.' / '.$appointment->doctor->speciality }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Ngày hẹn</label>
                    <p
                        class="form-control"
                        id="exampleInputName1"
                    >
                        {{ $appointment->date }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Người tạo</label>
                    <p
                        class="form-control"
                        id="exampleInputName1"
                    >
                        {{ $appointment->user->name ?? 'Không có' }}
                    </p>
                </div>

                <div class="form-group">
                    <label for="exampleSelectGender">Trạng thái</label>
                    @include('admin.layouts.selected', [
                        'name' => 'status',
                        'id' => 'exampleSelectGender',
                        'data' => config('constraint.appointment_status'),
                        'defaultValue' => config('constraint.appointment_status.'.$appointment->status)
                    ])
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Lời nhắn</label>
                    <p
                        class="form-control"
                        id="exampleInputName1"
                    >
                        {{ $appointment->message }}
                    </p>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
