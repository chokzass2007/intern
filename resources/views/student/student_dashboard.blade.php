@extends('layouts.layout')
@php
    
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    
    $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
    $profileData = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง
    
    function badgesStatus($status)
    {
        if ($status === 'รอการอนุมัติ') {
            $badges = '<small class="badge rounded badge-soft-warning false">' . $status . '</small>';
        } elseif ($status === 'รอดำเนินการ') {
            $badges = '<small class="badge rounded badge-soft-info false">' . $status . '</small>';
        } elseif ($status === 'อยู่ระหว่างฝึกงาน') {
            $badges = '<small class="badge rounded badge-soft-dark false">' . $status . '</small>';
        } elseif ($status === 'ฝีกงานเรียบร้อย') {
            $badges = '<small class="badge rounded badge-soft-success false">' . $status . '</small>';
        } else {
            $badges = '<small class="badge rounded badge-soft-danger false">' . $status . '</small>';
        }
        return $badges;
    }
@endphp


@section('main-content')
    @include('navbars.navbar-vertical')
    @include('navbars.navber-top-default')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["ระบบลงทะเบียนฝึกงานนักศึกษา มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>
        {{-- end H3 --}}

        <div class="card mb-3">
            <div class="card-header position-relative min-vh-25 mb-7">
                <div class="bg-holder rounded-3 rounded-bottom-0"
                    style="background-image:url(assets/img/generic/012.jpg);">
                </div>
                <!--/.bg-holder-->

                <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                        src="{{ url('upload/' . $profileData->photo . '') }}" width="200" alt=""></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-1"> {{ $profileData->fName }} {{ $profileData->lName }} <small
                                class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                            {!! badgesStatus($profileData->status) !!}
                        </h4>
                        <h5 class="fs-0 fw-normal">Southeast Asia University สาขา {{ $profileData->major }}</h5>
                        <p class="text-500">ถ. เพชรเกษม แขวงหนองค้างพลู เขตหนองแขม กรุงเทพมหานคร 10160</p>
                        <table class="table table-borderless fs--0 fw-medium mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1 text-start" style="width: 25%;">รหัสนักศึกษา:</td>
                                    <td class="p-1 text-600">{{ strtoupper($profileData->idStudent) }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1 text-start" style="width: 25%;">ชื่อ-นามสกุล :</td>
                                    <td class="p-1 text-600">{{ $profileData->fName }} {{ $profileData->lName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1 text-start" style="width: 25%;">Email :</td>
                                    <td class="p-1"><a class="text-600 text-decoration-none"
                                            href="mailto:goodguy@nicemail.com">{{ $profileData->email }}</a><small
                                            class="badge rounded badge-soft-success false">Verified</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1 text-start" style="width: 25%;">เบอร์โทร :</td>
                                    <td class="p-1"><a class="text-600 text-decoration-none"
                                            href="tel:+01234567890 ">{{ $profileData->phone }} </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-1 text-start" style="width: 25%;">ฝึกงานที่ :</td>
                                    <td class="p-1"><a class="text-600 text-decoration-none"
                                            href="tel:+01234567890 ">{!! badgesStatus($profileData->status) !!} </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-1">
                            <a class="btn btn-falcon-default btn-sm px-3 mt-2"
                                href="{{ route('student_company') }}">เพิ่มบริษัทฝึกงาน</a>
                            <a class="btn btn-falcon-default btn-sm px-3 mt-2 ms-2"
                                type="button"href="{{ route('student_company_detail') }}">ประวัติการฝึกงาน</a>
                            <a class="btn btn-falcon-default btn-sm px-3 mt-2 ms-2"
                                href="{{ route('' . $profileData->role . '.report') }}" type="button">รายงานการฝึกงาน</a>
                            <a class="btn btn-falcon-default btn-sm px-3 mt-2 ms-2"
                                href="{{ route('' . $profileData->role . '.change.profile') }}"
                                type="button">แก้ไขข้อมูลส่วนตัว</a>
                        </div>
                        <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                    </div>
                    <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2"
                            href="#"><!-- <span class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span> Font Awesome fontawesome.com -->
                            <div class="flex-1">
                                <h6 class="mb-0">ข้อมูลส่วนตัว</h6>
                            </div>
                        </a><a class="d-flex align-items-center mb-2"
                            href="{{ route('' . $profileData->role . '.change.profile') }}"><img
                                class="align-self-center me-2" src="{{ asset('assets/img/logos/editprofile.png') }}"
                                alt="Generic placeholder image" width="30">
                            <div class="flex-1">
                                <h6 class="mb-0">Edit Profile</h6>
                            </div>
                        </a><a class="d-flex align-items-center mb-2"
                            href="{{ route('' . $profileData->role . '.change.password') }}"><img
                                class="align-self-center me-2"
                                src="{{ asset('assets/img/logos/changePassword.png') }}"
                                alt="Generic placeholder image" width="30">
                            <div class="flex-1">
                                <h6 class="mb-0">ChangePassword</h6>
                            </div>
                        </a><button class="btn btn-success" type="button" data-bs-toggle="modal"
                            data-bs-target="#error-modal">ฟอร์มรายงานประจำวัน</button>
                    </div>
                </div>
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
                                        data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
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
                                            id="experience-current" checked="checked">
                                        <label class="form-check-label mb-0" for="experience-current">I currently work
                                            here
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
