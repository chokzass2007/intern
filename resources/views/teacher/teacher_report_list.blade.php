@php
    use Illuminate\Support\Carbon;

    function badgesStatus($status, $end_intern, $start_intern)
    {
        if ($status === 'รออาจารย์อนุมัติ') {
            $badges = '<small class="badge badge  badge-soft-secondary">' . $status . '</small>';
        } elseif ($status === 'รอดำเนินการยื่นเรื่องฝึกงาน') {
            $badges = '<small class="badge badge  badge-soft-warning">' . $status . '</small>';
        } elseif ($status === 'รอฝึกงาน') {
            if (strtotime(date('Y-m-d')) > strtotime($end_intern)) {
                $badges = '<small class="badge badge  badge-soft-success">ฝึกงานสำเร็จ</small>';
            } elseif (strtotime(date('Y-m-d')) >= strtotime($start_intern)) {
                $badges = '<small class="badge badge  badge-soft-info">กำลังฝึกงาน</small>';
            } else {
                $badges = '<small class="badge badge  badge-soft-primary">' . $status . '</small>';
            }
        } elseif ($status === 'ฝีกงานเรียบร้อย') {
            $badges = '<small class="badge badge  badge-soft-success">' . $status . '</small>';
        } else {
            $badges = '<small class="badge badge  badge-soft-danger">' . $status . '</small>';
        }
        return $badges;
    }
@endphp
{{-- @include('layouts.function') --}}
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
                    <a class="btn btn-primary  btn-sm px-3 m-2 " href="javascript:window.close()">ย้อนกลับ</a>

                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-hover table-striped overflow-hidden">
                        <thead>
                            <tr>
                                <th scope="col">บริษัท</th>
                                <th scope="col">รายงานการฝึกงานโดยย่อ</th>
                                <th scope="col">ระหว่างวันที่</th>
                                <th scope="col">ถึง</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="align-middle">
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle"
                                                    src="{{ asset('') }}upload/{{ isset($item->img) ? $item->img : 'no_image.jpg' }}"
                                                    alt="" />
                                            </div>
                                            <div class="ms-2">{{ $item->company }}</div>
                                        </div>
                                    </td>
                                    <td class="text-nowrap">{{ $item->report_comment }}</td>
                                    {{-- สร้าง div กำหนดขนาดของกล่องถ้าข้อความยาวให้ขึ้นบรรทัดใหม่ --}}
                                    <td  class="text-nowrap">
                                        {{ Carbon::parse($item->report_from_date)->thaidate('D j M y') }} เวลา
                                        {{ substr($item->report_from_date, 8, 20) }} นาที</td>
                                    <td class="text-nowrap">{{ Carbon::parse($item->report_to_date)->thaidate('D j M y') }}
                                        เวลา {{ substr($item->report_to_date, 8, 20) }} นาที</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- modal Detail Report --}}

            {{-- <div class="modal fade" id="report-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <form id="form_update_report" method="POST" class="row">
                                    @csrf
                                    <div class="col-3 text-lg-end">
                                        <label class="form-label" for="experience-form2">เวลาเข้างาน </label>
                                    </div>
                                    <div class="col-9 col-sm-7 mb-3">
                                        <input class="form-control datetimepicker" name="report_from_date"
                                            id="datetimepickerstart" type="text" placeholder="วัน/เดือน/ปี เวลา"
                                            data-options='{"enableTime":true,"dateFormat":"d-m-y H:i","disableMobile":true}' />
                                    </div>
                                    <div class="col-3 text-lg-end">
                                        <label class="form-label" for="experience-to">เวลาออกงาน </label>
                                    </div>
                                    <div class="col-9 col-sm-7 mb-3">
                                        <input class="form-control datetimepicker" name="report_to_date"
                                            id="datetimepickerend" type="text" placeholder="วัน/เดือน/ปี เวลา"
                                            data-options='{"enableTime":true,"dateFormat":"d-m-y H:i","disableMobile":true}' />
                                    </div>
                                    <div class="col-3 mb-3 text-lg-end">
                                        <label class="form-label" for="exp-description">รายงานการฝึกงาน </label>
                                    </div>
                                    <div class="col-9 col-sm-7 mb-3">
                                        <textarea class="form-control form-control-sm" name="report_comment" id="exp-descriptionview" rows="3"
                                            style="height: 291px;"> </textarea>
                                    </div>
                                    <div class="col-9 col-sm-7 offset-3 mb-3">
                                        <div class="form-check mb-0 lh-1">
                                            <input type="hidden" value="" name="idUpdate" id="idUpdate">
                                            <input class="form-check-input" type="checkbox" name="i_amOk"
                                                value="1" id="experience-current"@required(true) checked>
                                            <label class="form-check-label mb-0"
                                                for="experience-current">ปัจจุบันฉันทำงานที่นี่
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-9 col-sm-7 offset-3 mb-3">
                                        <a class="btn btn-primary" id="submit_form">Save</a>
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            End Modal --}}
            {{-- Start footer --}}
        </div>
    </div>
    @include('partials.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.view-report', function() {
                const id = $(this).data('id');
                $('#approve-modal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ URL::current() }}/" + id,
                    success: function(reponse) {
                        document.getElementById("form_update_report").reset();
                        $('#datetimepickerstart').val(reponse[0].report_from_date);
                        $('#datetimepickerend').val(reponse[0].report_to_date);
                        $('#exp-descriptionview').val(reponse[0].report_comment);
                        $('#idUpdate').val(id);
                    }
                });
            });
            // Submit Form Approve
            $(document).on('click', '#submit_form', function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "{{ URL::current() }}/report_update",
                    data: $('#form_update_report').serialize(),
                    success: function(reponse) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
