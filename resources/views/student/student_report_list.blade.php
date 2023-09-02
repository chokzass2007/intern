@php
    use Illuminate\Support\Carbon;
@endphp
@extends('layouts.layout')
@section('main-content')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["ระบบรายงานการงานฝึกงานนักศึกษา มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>
        {{-- end H3 --}}
        <div class="card overflow-hidden">
            <div class="row flex-between-center">
                <div class="col-auto">
                    <a class="btn btn-primary  btn-sm px-3 m-2 " href="{{ url('/') }}">ย้อนกลับ</a>
                    @if ($profileData->company_intern != '')
                        <button class="btn btn-success" type="button" data-bs-toggle="modal"
                            data-bs-target="#error-modal">ฟอร์มรายงานประจำวัน</button>
                    @else
                        <span style="color: red">ยังไม่มีบริษัทฝึกงาน</span>
                    @endif
                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-hover table-striped overflow-hidden">
                        <thead>
                            <tr>
                                <th scope="col">บริษัท</th>
                                <th scope="col">รายงานการฝึกงานโดยย่อ</th>
                                <th scope="col">ระหว่างวันที่</th>
                                <th scope="col">ถึง</th>
                                <th scope="col">ดูรายงานย่อฉบับเต็ม</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)
                                <tr class="align-middle">
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle"
                                                    src="{{ asset('') }}upload/{{ isset($item->photo) ? $item->photo : 'no_image.jpg' }}"
                                                    alt="" />
                                            </div>
                                            <div class="ms-2">{{ $item->company }}</div>
                                        </div>
                                    </td>
                                    <td class="text-nowrap">{{ substr($item->report_comment, 0, 40) }}</td>
                                    <td class="text-nowrap">
                                        {{ Carbon::parse($item->report_from_date)->thaidate('D j M y') }} เวลา
                                        {{ substr($item->report_from_date, 8, 20) }} นาที</td>
                                    <td class="text-nowrap">{{ Carbon::parse($item->report_to_date)->thaidate('D j M y') }}
                                        เวลา {{ substr($item->report_to_date, 8, 20) }} นาที</td>
                                    <td class="text-center" style="color:red;">
                                        <p class="text-red">ยังไม่เปิดให้ใช้</p>
                                        {{-- <a class="btn btn-link p-0"
                                            href="{{  $item->id }}" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span
                                                class="text-500 fas fa-edit"></span></a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- modal --}}

            <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                    <div class="modal-content position-relative">
                        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                            <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0">
                            <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                <h4 class="mb-1" id="modalExampleDemoLabel">ฟอร์มรายงานประจำวัน </h4>
                            </div>
                            <div class="p-4 pb-0">
                                <form action="{{ route('student.report.store') }}" method="POST" class="row">
                                    @csrf
                                    <div class="col-3 text-lg-end">
                                        <label class="form-label" for="experience-form2">เวลาเข้างาน </label>
                                    </div>
                                    <div class="col-9 col-sm-7 mb-3">
                                        <input class="form-control datetimepicker" name="report_from_date"
                                            id="datetimepicker" type="text" placeholder="วัน/เดือน/ปี เวลา"
                                            data-options='{"enableTime":true,"dateFormat":"d-m-y H:i","disableMobile":true}' />
                                    </div>
                                    <div class="col-3 text-lg-end">
                                        <label class="form-label" for="experience-to">เวลาออกงาน </label>
                                    </div>
                                    <div class="col-9 col-sm-7 mb-3">
                                        <input class="form-control datetimepicker" name="report_to_date" id="datetimepicker"
                                            type="text" placeholder="วัน/เดือน/ปี เวลา"
                                            data-options='{"enableTime":true,"dateFormat":"d-m-y H:i","disableMobile":true}' />
                                    </div>
                                    <div class="col-3 mb-3 text-lg-end">
                                        <label class="form-label" for="exp-description">รายงานการฝึกงานโดยย่อ </label>
                                    </div>
                                    <div class="col-9 col-sm-7 mb-3">
                                        <textarea class="form-control form-control-sm" name="report_comment" id="exp-description" rows="3"
                                            style="height: 291px;"> </textarea>
                                    </div>
                                    <div class="col-9 col-sm-7 offset-3 mb-3">
                                        <div class="form-check mb-0 lh-1">
                                            <input class="form-check-input" type="checkbox" name="i_amOk" value="1"
                                                id="experience-current"@required(true)>
                                            <label class="form-check-label mb-0" for="experience-current">ปัจจุบันฉันทำงานที่นี่
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-9 col-sm-7 offset-3 mb-3">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- Start footer --}}
        </div>
    </div>
    @include('partials.footer')
    </div>
@endsection
