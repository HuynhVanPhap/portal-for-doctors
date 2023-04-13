@extends('admin.master')

@section('title')
Danh sách
@endsection

@section('content')
@include('admin.layouts.header')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Bác sĩ </th>
                            <th> Họ và tên </th>
                            <th> Số điện thoại </th>
                            <th> Chuyên môn </th>
                            <th> Phòng khám </th>
                            <th> Tác vụ </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!blank($doctors))
                            @foreach ($doctors as $key => $doctor)
                                <tr>
                                    <td> {{ ++$key }} </td>
                                    <td class="py-1">
                                        <img src="{{ asset('admin/assets/images/faces-clipart/pic-1.png') }}" alt="image">
                                    </td>
                                    <td> {{ $doctor->name }} </td>
                                    <td> {{ $doctor->phone }} </td>
                                    <td> {{ $doctor->speciality }} </td>
                                    <td> {{ $doctor->room_id }} </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a
                                                href="{{ route('doctors.edit', $doctor->id) }}"
                                                class="btn btn-warning"
                                            >
                                                Sửa đổi
                                            </a>
                                            <form
                                                action="{{ route('doctors.destroy', $doctor->id) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                >
                                                    Xóa
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
        </div>

        {!! $doctors->appends(Request::all())->links('admin.layouts.pagination') !!}
    </div>
</div>
@endsection
