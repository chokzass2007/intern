@php
use Illuminate\Support\Carbon;

$countDate = abs(strtotime(date('d-m-Y')) - strtotime($profileData->end_intern))/86400 ;
$countStartDate = abs(strtotime($profileData->start_intern) - strtotime(date('d-m-Y')))/86400 ;
@endphp


@extends('layouts.layout')

@section('main-content')
    @include('navbars.navbar-vertical')
    @include('navbars.navber-top-default')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["แก้ไขโปรไฟล์นักศึกษา มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>

        {{-- end H3 --}}
        <div class="row g-3 mb-3">
            <div class="col-xxl-5">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card font-sans-serif">
                            <div class="card-body d-flex gap-3 flex-column flex-sm-row align-items-center">

                                <img class="rounded-3"
                                    src="{{ !empty($profileData->photo) ? url('upload/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                    alt="profile" width="130" />
                                <table class="table table-borderless fs--0 fw-medium mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="p-1" style="width: 35%;">รหัสนักศึกษา:</td>
                                            <td class="p-1 text-600">{{ strtoupper($profileData->idStudent) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-1" style="width: 35%;">ชื่อ-นามสกุล :</td>
                                            <td class="p-1 text-600">{{ $profileData->fName }} {{ $profileData->lName }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-1" style="width: 35%;">Email :</td>
                                            <td class="p-1"><a class="text-600 text-decoration-none"
                                                    href="mailto:goodguy@nicemail.com">{{ $profileData->email }}</a><small
                                                    class="badge rounded badge-soft-success false">Verified</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-1" style="width: 35%;">เบอร์โทร :</td>
                                            <td class="p-1"><a class="text-600 text-decoration-none"
                                                    href="tel:+01234567890 ">{{ $profileData->phone }} </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card font-sans-serif">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 fs-0">เริ่มฝึกงานตั้งแต่</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-6">
                                        <span class=" lh-1 mb-1">
                                            {{ Carbon::parse($profileData->start_intern)->thaidate('D j M y')}}</span><small class="badge rounded badge-soft-danger false">
                                                ฝึกงานมาแล้ว {{$countStartDate}} วันจบฝึกงาน</small>
                                    </div>
                                    <div class="col-6 mt-n4 d-flex justify-content-end">
                                        <div class="echart-default" data-echart-responsive="true"
                                            data-echarts="{&quot;xAxis&quot;:{&quot;data&quot;:[&quot;Day 1&quot;,&quot;Day 2&quot;,&quot;Day 3&quot;,&quot;Day 4&quot;,&quot;Day 5&quot;,&quot;Day 6&quot;,&quot;Day 7&quot;,&quot;Day 8&quot;,&quot;Day 9&quot;,&quot;Day 10&quot;]},&quot;series&quot;:[{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:[85,60,120,70,100,15,65,80,60,75,45],&quot;smooth&quot;:true,&quot;lineStyle&quot;:{&quot;width&quot;:2}}],&quot;grid&quot;:{&quot;bottom&quot;:&quot;2%&quot;,&quot;top&quot;:&quot;2%&quot;,&quot;right&quot;:&quot;0px&quot;,&quot;left&quot;:&quot;0px&quot;}}"
                                            _echarts_instance_="ec_1691133452104"
                                            style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;">
                                            <div
                                                style="position: relative; width: 124px; height: 80px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;">
                                                <canvas data-zr-dom-id="zr_0" width="124" height="80"
                                                    style="position: absolute; left: 0px; top: 0px; width: 124px; height: 80px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card font-sans-serif">
                            <div class="card-header pb-0">
                                <h6 class="mb-0 fs-0">สิ้นสุดการฝึกงาน</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-6">
                                        <span class="lh-1 mb-1">
                                            {{ Carbon::parse($profileData->end_intern)->thaidate('D j M y')}}</span><small class="badge rounded badge-soft-success false">
                                                เหลืออีก {{$countDate}} วันจบฝึกงาน
                                           </small>
                                    </div>
                                    <div class="col-6 mt-n4 d-flex justify-content-end">
                                        <div class="echart-default" data-echart-responsive="true"
                                            data-echarts="{&quot;xAxis&quot;:{&quot;data&quot;:[&quot;Day 1&quot;,&quot;Day 2&quot;,&quot;Day 3&quot;,&quot;Day 4&quot;,&quot;Day 5&quot;,&quot;Day 6&quot;,&quot;Day 7&quot;,&quot;Day 8&quot;]},&quot;series&quot;:[{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:[55,60,40,120,70,80,35,80,85],&quot;smooth&quot;:true,&quot;lineStyle&quot;:{&quot;width&quot;:2}}],&quot;grid&quot;:{&quot;bottom&quot;:&quot;2%&quot;,&quot;top&quot;:&quot;2%&quot;,&quot;right&quot;:&quot;0px&quot;,&quot;left&quot;:&quot;10px&quot;}}"
                                            _echarts_instance_="ec_1691133452105"
                                            style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;">
                                            <div
                                                style="position: relative; width: 124px; height: 80px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;">
                                                <canvas data-zr-dom-id="zr_0" width="124" height="80"
                                                    style="position: absolute; left: 0px; top: 0px; width: 124px; height: 80px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7">
                <div class="card h-100 font-sans-serif">
                    <div class="card-body">
                        <form action="{{ route('teacher.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-start" for="staticEmail">รหัสนักศึกษา :</label>
                                <div class="col-sm-9">
                                    <input class="form-control-plaintext mt-2" id="staticEmail" type="text" name="idStudent"
                                        readonly value="{{ $profileData->idStudent }}" />
                                </div>
                                {{--  --}}
                                <label class="col-sm-3 col-form-label text-start" for="staticEmail">ชื่อ :</label>
                                <div class="col-sm-3">
                                    <input class="form-control mt-2" id="staticEmail" type="text" name="fName"
                                        value="{{ $profileData->fName }}" />
                                </div>
                                <label class="col-sm-2 col-form-label text-start" for="staticEmail">นามสกุล :</label>
                                <div class="col-sm-4 mb-3">
                                    <input class="form-control mt-2" id="staticEmail" type="text" name="lName"
                                        value="{{ $profileData->lName }}" />
                                </div>
                                {{--  --}}
                                <label class="col-sm-3 col-form-label text-start" for="staticEmail">สาขา :</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" autocomplete="on" name="major"
                                        id="major" value="{{ $profileData->major }}" required="" />
                                </div>

                                <label class="col-sm-3 col-form-label text-start" for="staticEmail">Email :</label>
                                <div class="col-sm-9">
                                    <input name="email" class="form-control mt-2" id="staticEmail" type="text"
                                        name="email" value="{{ $profileData->email }}" />
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <label class="col-sm-3 col-form-label text-start" for="staticEmail">เบอร์โทร :</label>
                                <div class="col-sm-9">
                                    <input class="form-control mt-2" name="phone" type="text"
                                        value="{{ $profileData->phone }}">
                                </div>
                                <label class="col-sm-3 mt-3 col-form-label text-start" for="staticEmail">Photo :</label>
                                <div class="col-sm-9 mt-2">
                                    <input class="form-control" name="photo" type="file" id="image"
                                        accept="image/png, image/gif, image/jpeg" />
                                </div>
                                <label class="col-sm-3 col-form-label text-start" for="staticEmail"> :</label>
                                <div class="col-sm-9 pt-3">
                                    <div class="avatar avatar-4xl">
                                        <img id="showImage" class="rounded-3"
                                            src="{{ !empty($profileData->photo) ? url('upload/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                            alt="profile" />
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn btn-primary me-1 mb-1" type="submit">
                                        <span class="fas fa-save ms-1" data-fa-transform="shrink-3"></span> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end --}}

    </div>
    @include('partials.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection
