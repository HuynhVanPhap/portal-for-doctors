@extends('admin.master')

@section('title')
    Danh sách
@endsection

@section('content')
{{ Breadcrumbs::render('appointments.index') }}

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th>Bệnh nhân</th>
                            <th>Bác sĩ / Chuyên ngành</th>
                            <th>Ngày hẹn</th>
                            <th>Người tạo</th>
                            <th>Trạng thái</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!blank($appointments))
                            @foreach ($appointments as $key => $appointment)
                                <tr>
                                    <td> {{ ++$key }} </td>
                                    <td> {{ $appointment->name }}</td>
                                    <td> {{ $appointment->doctor->name.' / '.$appointment->doctor->speciality }}
                                    <td> {{ $appointment->date }}</td>
                                    <td> {{ $appointment->user->name ?? '' }}</td>
                                    <td><span class="text-info">{{ $appointment->status }}</span></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a
                                                href="{{ route('appointments.edit', $appointment->id) }}"
                                                class="btn btn-warning"
                                            >
                                                Sửa đổi
                                            </a>
                                            <form
                                                action="{{ route('appointments.destroy', $appointment->id) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                >
                                                    Hủy bỏ
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 mt-2">
                {!! $appointments->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
