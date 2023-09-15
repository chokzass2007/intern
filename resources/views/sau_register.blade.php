<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>ระบบฝึกงานนักศึกษา | มหาวิทยาลัยเอเชียอาคเนย์ &amp; Web Application</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">


    <link href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.css') }}" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>

</head>

<body>

    @php

    @endphp
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid">
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                        src="assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img
                        class="bg-auth-circle-shape-2" src="assets/img/icons/spot-illustrations/shape-1.png"
                        alt="" width="150">
                    <div class="card overflow-hidden z-index-1">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center bg-card-gradient">
                                    <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                        <div class="bg-holder bg-auth-card-shape"
                                            style="background-image:url(assets/img/icons/spot-illustrations/half-circle.png);">
                                        </div>
                                        <!--/.bg-holder-->

                                        <div class="z-index-1 position-relative "><a
                                                class="link-light mb-4 font-sans-serif fs-1 d-inline-block fw-bolder"
                                                href="{{ url('/') }}">มหาวิทยาลัยเอเชียอาคเนย์<br><span
                                                    class="fs-0">Southeast Asia University</span><br>(SAU)</a>
                                            <p class="opacity-75 text-white ">
                                                ระบบสารสนเทศนักศึกษาฝึกงาน<br></p>
                                            <ul class="text-start">
                                                <li>ลงทะเบียนนักศึกษาฝึกงาน</li>
                                                <li>ลงทะเบียนสถานประกอบการเพื่อการฝึกงาน</li>
                                                <li>บันทึกการฝึกงานประจำวันนักศึกษาฝึกงาน</li>
                                                <li>ตรวจสอบ อนุมัติ ออกหนังสือการฝึกงาน</li>
                                                <li>นิเทศนักศึกษาฝึกงาน</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                        <p class="pt-3 text-white">Have an account?<br><a
                                                class="btn btn-outline-light mt-2 px-4" href="{{ url('login') }}">Log
                                                In</a></p>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <h3>Register</h3>
                                        {{-- <span class="text-danger" style="font-size:75%">กรอกข้อมูลให้ครบ</span> --}}
                                        <form action="{{ route('sau_register') }}" method="POST"
                                            class=" needs-validation" novalidate="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gx-2">
                                                <div class="mb-3">
                                                    <label class="form-label" for="idStudent">รหัสนักศึกษา<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" type="text" autocomplete="on"
                                                        name="idStudent" id="idStudent" required="" />
                                                    @error('idStudent')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="invalid-feedback">กรุณา กรอกรหัสนักศึกษา</div>
                                                </div>

                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label" for="name">ชื่อ<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" type="text" autocomplete="on"
                                                        name="fName" id="name" required="" />
                                                    <div class="invalid-feedback">กรุณา กรอกชื่อ</div>
                                                </div>
                                                <div class="mb-3 col-sm-6">
                                                    <label class="form-label" for="last-name">นามสกุล<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" type="text" autocomplete="on"
                                                        name="lName" id="last-name" required="" />
                                                    <div class="invalid-feedback">กรุณา กรอกนามสกุล</div>
                                                </div>
                                                <div class="d-flex mb-3 flex-row">
                                                    <span>คำนำหน้า : </span>
                                                    <input class="form-check-input ms-2" id="flexRadioDefault1"
                                                        type="radio" name="sex" value="นาย"
                                                         required/>
                                                    <label class="form-check-label ms-1"
                                                        for="flexRadioDefault1">นาย</label>

                                                    <input class="form-check-input ms-2" id="flexRadioDefault2"
                                                        type="radio" name="sex" value="นางสาว" />
                                                    <label class="form-check-label ms-1"
                                                        for="flexRadioDefault2">นางสาว</label>
                                                    <input class="form-check-input ms-2" id="flexRadioDefault3"
                                                        type="radio" name="sex" value="นาง" />
                                                    <label class="form-check-label ms-1"
                                                        for="flexRadioDefault3">นาง</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="card-email">อีเมล์<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" type="email" autocomplete="on"
                                                        name="email" id="card-email" required="" />
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="invalid-feedback">กรุณา กรอกอีเมล์</div>
                                                </div>
                                                <div class="row gx-2">
                                                    <div class="mb-3 col-sm-6">
                                                        <label class="form-label" for="card-password">Password<span class="text-danger ms-1">*</span></label>
                                                        <input class="form-control" type="password" autocomplete="on"
                                                            name="password" id="card-password" min="8" required="" />
                                                        <div class="invalid-feedback">กรุณา Password</div>
                                                        <span class="text-danger" style="font-size:75%">รหัสผ่านต้องมากกว่า 8 ตัวขึ้นไป</span>
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-sm-6">
                                                        <label class="form-label" for="card-confirm-password">Confirm
                                                            Password<span class="text-danger ms-1">*</span></label>
                                                        <input class="form-control" type="password" autocomplete="on"
                                                            name="password_confirmation" id="card-confirm-password"
                                                            min="8" required="" />
                                                            <span class="text-danger" style="font-size:75%">รหัสผ่านต้องมากกว่า 8 ตัวขึ้นไป</span>
                                                        <div class="invalid-feedback">กรุณา Confirm Password</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="major">สาขา<span class="text-danger ms-1">*</span></label>
                                                    <select class="form-select" name="major" id="major" aria-label="Default select example" required>
                                                        <option value="">กรุณา เลือกสาขา</option>
                                                        <option value="เทคโนโลยีดิจิทัลและนวัตกรรม">เทคโนโลยีดิจิทัลและนวัตกรรม</option>
                                                      </select>
                                                    {{-- <input class="form-control" type="text" autocomplete="on"
                                                        name="major" id="major" required="" /> --}}
                                                    <div class="invalid-feedback">กรุณา เลือกสาขา</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">เบอร์โทร<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" type="text" autocomplete="on"
                                                        name="phone" id="phone" required="" />
                                                    <div class="invalid-feedback">กรุณา กรอกเบอร์โทร</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">รูป<span class="text-danger ms-1">*</span></label>
                                                    <input class="form-control" name="photo" type="file"
                                                        id="image" accept="image/png, image/gif, image/jpeg"
                                                        required="" />
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <img id="showImage" class="rounded-3"
                                                        src="{{ !empty($profileData->photo) ? url('upload/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                        alt="profile" width="150" />
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="card-register-checkbox" required />
                                                    <label class="form-label"
                                                        for="card-register-checkbox">ฉันยอมรับเงื่อนไข และ <a
                                                            href="#!">นโยบายความเป็นส่วนตัว</a></label>
                                                </div>
                                                <div class="mb-3">
                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                        name="submit" id="status_button">Register</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer"></footer>
        <div class="row g-0 justify-content-center fs--1 mt-1 mb-3">
            <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600"> Copyright<span class="d-none d-sm-inline-block">| </span>
                    <br class="d-sm-none" /> 2023 &copy; All Rights Reserved Create By.
                    <a href="https://www.facebook.com/CJdc2011" target="_blank"> Numchok Jantadung</a> AND
                    <a href="https://www.facebook.com/poppi.xixi" target="_blank"> Wasinee Khaemwong</a>
                </p>
            </div>
            <div class="col-12 col-sm-auto text-center">
            </div>
        </div>

    </main>

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('vendors/typed.js/typed.js') }}"></script>
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

</body>

</html>
