@extends('layouts.layout')

@section('main-content')
    @include('layouts.function')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["ระบบจัดการการฝึกงานนักศึกษา มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>
        {{-- end H3 --}}
        @if (isset($list))
            <div class="card table-responsive scrollbar px-1">
                <table class="table table-hover table-striped overflow-hidden">
                    <thead>
                        <tr>
                            <th scope="col" style=" text-align: center; ">ชื่อ</th>
                            <th scope="col" style=" text-align: center; ">บริษัท</th>
                            <th scope="col" style=" text-align: center; ">ชื่อผู้ติดต่อขออนุญาญฝึกงาน</th>
                            <th scope="col" style=" text-align: center; ">สถานะ</th>
                            {{-- <th scope="col" style=" text-align: center; ">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr class="align-middle">
                                <td class="text-nowrap">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img class="rounded-circle"
                                                src="{{ asset('') }}upload/{{ isset($item->photo) ? $item->photo : 'no_image.jpg' }}"
                                                alt="" />
                                        </div>
                                        <div class="ms-2">{{ $item->fName }} {{ $item->lName }}</div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img class="rounded-circle"
                                                src="{{ asset('') }}upload/{{ isset($item->img) ? $item->img : 'no_image.jpg' }}"
                                                alt="" />
                                        </div>
                                        <div class="ms-2">{{ substr($item->company, 0, 100) }}</div>
                                    </div>
                                </td>
                                <td class="text-nowrap">{{ $item->bossName }}</td>
                                <td>{!! statusCompany($item->status,$item->start_intern,$item->end_intern) !!}</td>

                            </tr>
                            <tr>
                                <td class="text-nowrap text-center" colspan="5">
                                    <button class="btn btn-success me-1 mb-1" data-com_id="{{ $item->com_id }}"
                                        value="{{ $item->user_id }}" type="button">อนุมัติ&แก้ไข
                                    </button>
                                    <a class="btn btn-secondary me-1 mb-1" href="{{ route('pdf.no1', $item->user_id) }}"
                                        target=”_blank”>ทดน.1
                                    </a>
                                    <a class="btn btn-warning me-1 mb-1" href="{{ route('pdf.no1', $item->user_id) }}"
                                        target=”_blank”>ทดน.2
                                    </a>
                                    <a class="btn btn-info  me-1 mb-1" href="{{ route('pdf.no3', $item->user_id) }}"
                                        target=”_blank”>ทดน.3
                                    </a>
                                    <a class="btn btn-secondary me-1 mb-1" href="{{ route('pdf.no1', $item->user_id) }}"
                                        target=”_blank”>ทดน.4
                                    </a>
                                    <button class="btn btn-danger me-1 mb-1 btn-danger-input" value="{{ $item->user_id }}"
                                        data-company="{{ $item->com_id }}" data-bs-toggle="modal"
                                        data-bs-target="#cancel">ยกเลิก
                                    </button>
                                    <span style="color: red" class="text-end">* {{ $item->cal_comment }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- ============================================= Form =============================================================================== --}}
            <div class="card ">
                <div class="card-header position-relative min-vh-25 ">
                    <div class="bg-holder rounded-3 rounded-bottom-0"
                        style="background-image:url({{ asset('assets/img/generic/01') }}2.jpg);">
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around  mb-2">
                        <div class="p-2 border border-400">
                            <div class="card">
                                <div class="card-header bg-circle-shape bg-shape text-center p-2">
                                    <p class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light">
                                        ประวัติฝึกงานแต่ละปี</p>
                                </div>
                                <div class="card-body p-4">
                                    <form action="{{ route('teacher.select') }}" method="POST" class="needs-validation"
                                        novalidate="">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label fs-0" for="split-login-password">ปีการศึกษา</label>
                                            </div>
                                            <select class="form-select form-select-sm" name="year"
                                                aria-label=".form-select-sm example" required="">
                                                <option value="">เลือกปีการศึกษา</option>
                                                <option value="2566">2566</option>
                                                <option value="2567">2567</option>
                                                <option value="2568">2568</option>
                                                <option value="2569">2569</option>
                                                <option value="2570">2570</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label fs-0"
                                                    for="split-login-password">ภาคการศึกษา</label>
                                            </div>
                                            <select class="form-select form-select-sm form-control" name="intern"
                                                aria-label=".form-select-sm example" required="">
                                                <option value="">เลือกปีการศึกษา</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">ฤดูร้อน</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                name="submit">Log in</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- modal Approve--}}

        <div class="modal fade" id="approve-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                <div class="modal-content position-relative">
                    <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                            <h4 class="mb-1 text-center" id="modalExampleDemoLabel">รายละเอียดการอนุมัติ </h4>
                        </div>
                        <div class="p-4 pb-0">
                            <form id="form_approve" method="POST" class="row needs-validation" novalidate="">
                                @csrf
                                @method('PUT')

                                <div class="col-3 text-lg-end">
                                    <label class="form-label" for="experience-form2">ฝึกงานบริษัท </label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                    <input class="form-control" id="com_id" name="com_id" type="hidden" />
                                    <input class="form-control" id="user_id" name="user_id" type="hidden" />
                                    <label class="form-control fs-0" id="com_company"></label>
                                </div>
                                <div class="col-3 text-lg-end">
                                    <label class="form-label" for="experience-form2">เริ่มฝึกงานตั้งแต่วันที่ </label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                    <input class="form-control datetimepicker" name="start_intern" id="user_start"
                                        type="text" placeholder="d/m/y" data-options='{"disableMobile":true}'
                                        required />
                                </div>
                                <div class="col-3 text-lg-end">
                                    <label class="form-label" for="experience-to">ถึงวันที่ </label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                    <input class="form-control datetimepicker" name="end_intern" id="user_end"
                                        type="text" placeholder="d/m/y" data-options='{"disableMobile":true}'
                                        required />
                                </div>

                                <div class="col-9 col-sm-7 offset-3 mb-3">
                                    <div class="form-check mb-0 lh-1">
                                        <input class="form-check-input" type="checkbox" name="status"
                                            value="รอฝึกงาน" id="experience-current" required>
                                        <label class="form-check-label mb-0"
                                            for="experience-current">อนุมัติการฝึกงานที่นี้
                                        </label>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-9 col-sm-7 offset-3 mb-3">
                                    <a class="btn btn-primary" id="submit_form" >ยืนยัน</a>
                                    <button class="btn btn-secondary" type="button"
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Cancel-->
        <div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-3" id="exampleModalLabel">สาเหตุที่ยกเลิก</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="cal_form" class="needs-validation" novalidate="">
                        <div class="modal-body">
                            <input type="hidden" id="com_id_cal" name="com_id">
                            <input type="hidden" id="user_id_cal" name="user_id">
                            <textarea class="form-control form-control-sm" name="report_cal" id="exp-description" rows="2"
                                style="height: 291px;"  required=""> </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ไม่ ยกเลิก</button>
                            <a class="btn btn-danger" id="submit_cal">ยกเลิก การฝึกงาน</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- Start footer --}}
    </div>
    </div>
    @include('partials.footer')
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Open Form
    $(document).on('click', '.btn-success', function() {
        const id = $(this).val();
        let com_id = $(this).data('com_id')
        // alert('userId'+id +'comId'+com_id);
        $('#approve-modal').modal('show');
        $.ajax({
            type: "GET",
            url: "{{ URL::current() }}/api/" + id + "/" + com_id,
            success: function(reponse) {
                document.getElementById("form_approve").reset();
                $('#user_start').val(reponse['users'][0].user_start);
                $('#user_end').val(reponse['users'][0].user_end);
                $('#com_company').text(reponse['company'][0].company);
                $('#com_old').text(reponse['users'][0].com_company);
                $('#com_id').val(com_id);
                $('#user_id').val(reponse['users'][0].userId);
            }
        });
    });
    // cancel Intern
    $(document).on('click', '.btn-danger-input', function() {
        let id = $(this).val();
        let com_id = $(this).data('company');
        $('#user_id_cal').val(id);
        $('#com_id_cal').val(com_id);
    });

    // Submit Form Approve
    $(document).on('click', '#submit_form', function() {
        let check = $('#experience-current').prop( "checked");
        if(check == false){
            alert('กรุณายืนยันการอนุมัติการฝึกงานที่นี้')
            return;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "{{ URL::current() }}/approve",
            data: $('#form_approve').serialize(),
            success: function(reponse) {
                Swal.fire(
                    'อนุมัติฝึกงานเรียบร้อยแล้ว!',
                    '',
                    'success'
                )
                setTimeout(function() {
                    window.location.reload(1);
                }, 900);
            }
        });
    });
    // Submit Cancel Form
    $(document).on('click', '#submit_cal', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "PUT",
            url: "{{ URL::current() }}/cancel",
            data: $('#cal_form').serialize(),
            success: function(reponse) {
                Swal.fire(
                    'ยกเลิกการฝึกงานเรียบร้อยแล้ว!',
                    '',
                    'error'
                )
                setTimeout(function() {
                    window.location.reload(1);
                }, 900);
            }
        });
    });
</script>
