<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <link href="{{ asset('vendors/choices/choices.min.css') }}" rel="stylesheet" />
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

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row justify-content-center pt-6">
                <div class="col-sm-10 col-lg-7 col-xxl-7"><a class="d-flex flex-center mb-4"
                    href="{{ url('/') }}"><img class="me-2"
                            src="../../assets/img/icons/spot-illustrations/falcon.png" alt=""
                            width="45" /><span class="font-sans-serif fw-bolder fs-4 d-inline-block">SAU</span></a>
                    <div class="card theme-wizard mb-5" id="wizard">
                        @if (session('check') != null)
                            <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-tab4" id="bootstrap-wizard-tab4">
                                <div class="wizard-lottie-wrapper">
                                    <div class="lottie wizard-lottie mx-auto my-3"
                                        data-options='{"path":"../../assets/img/animated-icons/celebration.json"}'>
                                    </div>
                                </div>
                                <h4 class="mb-1 text-success">การประเมินผลการฝึกงานของนักศึกษาเสร็จสมบูรณ์แล้ว</h4>
                                <p>
                                    ขอขอบคุณในความร่วมมือในการตอบแบบการประเมินการฝึกงานของนักศึกษาในครั้งนี้
                                    และหวังเป็นอย่างยิ่งว่าจะได้รับความร่วมมือในการรับนักศึกษาฝึกงานต่อไป</p><a
                                    class="btn btn-primary px-5 my-3" href="{{ url('/') }}">ทางคณะฯและหลักสูตร ขอขอบคุณในความร่วมมือ</a>
                            </div>
                        @endif



                        <form id="formevalution" action="{{ route('evalution.insert') }}" method="POST"
                            class="needs-validation" novalidate="novalidate">
                            @csrf
                            <div class="card-body py-4" id="wizard-controller">
                                <div class="tab-content">
                                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                        aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                                        <label class="form-label fs-0 text-black">
                                            <h4>วิธีการประเมิน
                                                แบบประเมินผลประกอบด้วย 6 ด้าน ดังนี้</h4>
                                            1. คุณธรรม จริยธรรม<br>
                                            2. ความรู้<br>
                                            3. ทักษะทางปัญญา<br>
                                            4. ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ<br>
                                            5. ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ<br>
                                            6. ทักษะการปฏิบัติงาน<br>
                                            โดยมีลำดับคะแนนในการประเมิน ดังนี้<br>
                                            - คะแนนดีมาก (5) นักศึกษาปฏิบัติงานที่ได้รับมอบหมายอย่างเสมอต้นเสมอปลาย
                                            และดีเลิศเกินความคาดหมาย
                                            และใช้ทักษะเหล่านั้นทำงานที่ได้รับมอบหมายจนสำเร็จ<br>
                                            - คะแนนดี (4) นักศึกษาปฏิบัติงานที่ได้รับมอบหมายอย่างเสมอต้นเสมอปลาย
                                            และปฏิบัติงานจนสำเร็จในระดับที่น่าพอใจ<br>
                                            - คะแนนปานกลาง (3) นักศึกษาปฏิบัติงานได้ต่ำกว่าที่ควรเป็นเล็กน้อย
                                            แต่สามารถปฏิบัติงานที่ได้รับมอบหมายจนสำเร็จเป็นที่น่าพอใจ<br>
                                            - คะแนนพอใช้ (2) นักศึกษาปฏิบัติงานได้ต่ำกว่าความคาดหมาย
                                            แต่ก็ปฏิบัติงานจนสำเร็จเป็นที่น่าพอใจ<br>
                                            - คะแนนต้องปรับปรุง (1) นักศึกษาปฏิบัติไม่เป็นไปตามความคาดหมาย
                                            มีข้อบกพร่องในการทำงานเป็นอย่างมาก<br>
                                        </label>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">ชื่อสถานประกอบการ</label>
                                            <input class="form-control" type="text" name="companyName"
                                                placeholder="บริษัท เอสเอยูเรียนสุข จำกัด" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">ชื่อ-สกุล
                                                (ผู้ประเมิน)</label>
                                            <input class="form-control" type="text" name="fNameAssessor"
                                                placeholder="ชนินทร เฉลิมสุข" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">ตำแหน่งงาน
                                                (ผู้ประเมิน)</label>
                                            <input class="form-control" type="text" name="position"
                                                placeholder="ผจก & หัวหน้า" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">เบอร์โทรศัพท์ติดต่อ
                                                (ผู้ประเมิน)</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="098-xxx-xxxx" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">Email* (ผู้ประเมิน)</label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Email address"
                                                pattern="([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
                                                required="required" id="bootstrap-wizard-wizard-email"
                                                data-wizard-validate-email="true" />
                                            <div class="invalid-feedback">You must add email</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">รหัสนักศึกษาฝึกงาน</label>
                                            <select class="form-select js-choice" id="idStudent" size="1"
                                                required="required" name="idStudent"
                                                data-options='{"removeItemButton":true,"placeholder":true}'>
                                                <option value="">รหัสนักศึกษาฝึกงาน</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->idStudent }}">{{ $item->idStudent }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select one</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">ชื่อ-สกุล (นักศึกษาฝึกงาน)</label>
                                            <input class="form-control disabled" id="fNameStudent" type="text"
                                                name="fNameStudent" placeholder="เรียนดี ยอดเยี่ยม "
                                                required="required" readonly />
                                        </div>

                                        {{-- 1. คุณธรรม จริยธรรม --}}
                                        <h4>1. คุณธรรม จริยธรรม</h4>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">เข้าใจและซาบซึ้งในวัฒนธรรมไทย
                                                ตระหนักในคุณค่าของระบบคุณธรรม จริยธรรมเสียสละและซื่อสัตย์สุจริต</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A1"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A1"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A1"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A1"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A1"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีวินัย
                                                ตรงต่อเวลารับผิดชอบต่อตนเองและสังคม เคารพกฎระเบียบและข้อบังคับต่างๆ
                                                ขององค์กรและสังคม</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A2"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A2"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A2"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A2"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A2"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีภาวะความเป็นผู้นำและผู้ตาม
                                                สามารถทำงานเป็นหมู่คณะ สามารถแก้ไขข้อขัดแย้ง ตามลำดับความสำคัญ
                                                เคารพสิทธิและรับฟังความคิดเห็นของผู้อื่น
                                                รวมทั้งเคารพในคุณค่าและศักดิ์ศรีของความเป็นมนุษย์</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A3"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A3"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A3"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A3"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A3"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีจรรยาบรรณทางวิชาการและวิชาชีพและมีความรับผิดชอบในฐานะผู้ประกอบวิชาชีพรวมถึงเข้าใจถึงบริบททางสังคมของวิชาชีพเทคโนโลยีในแต่ละสาขา
                                                ตั้งแต่อดีตจนถึงปัจจุบัน</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A4"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A4"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A4"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A4"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="A4"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        {{-- 2.  ความรู้ --}}
                                        <h4>2. ความรู้</h4>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถวิเคราะห์และแก้ไขปัญหา
                                                ด้วยวิธีที่เหมาะสม รวมถึงการประยุกต์ใช้เครื่องมือเหมาะสม เช่น
                                                โปรแกรมคอมพิวเตอร์ เป็นต้น</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B1"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B1"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B1"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B1"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B1"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถใช้ความรู้และทักษะในสาขาวิชาของตน
                                                ในการประยุกต์แก้ไขปัญหาในงานจริงได้
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B2"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B2"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B2"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B2"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B2"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีความรู้และความเข้าใจเกี่ยวกับหลักการที่สำคัญ
                                                ทั้งด้านเชิงทฤษฎีและปฏิบัติ
                                                เนื้อหาของสาขาวิชาเฉพาะด้านทางเทคโนโลยี</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B3"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B3"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B3"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B3"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="B3"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        {{-- 3.  ทักษะทางปัญญา --}}
                                        <h4>3. ทักษะทางปัญญา</h4>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีจินตนาการและความยืดหยุ่น
                                                ในการปรับใช้องค์ความรู้ที่เกี่ยวข้องได้อย่างเหมาะสมในการพัฒนาด้านนวัตกรรมหรือต่อยอดองค์ความรู้จากเดิมได้อย่างสร้างสรรค์</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C1"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C1"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C1"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C1"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C1"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถคิด วิเคราะห์
                                                และแก้ไขปัญหาด้านเทคโนโลยีได้อย่างมีระบบ
                                                รวมถึงการใช้ข้อมูลประกอบการตัดสินใจในการทำงานได้อย่างมีประสิทธิภาพ
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C2"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C2"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C2"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C2"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C2"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถสืบค้นข้อมูลและแสวงหาความรู้เพิ่มเติมได้ด้วยตนเองเพื่อการเรียนรู้ตลอดชีวิตและทันต่อการเปลี่ยนแปลงทางองค์ความรู้และเทคโนโลยีใหม่ๆ</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C3"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C3"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C3"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C3"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="C3"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        {{-- 4. ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ --}}
                                        <h4>4. ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</h4>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถวางแผน
                                                และรับผิดชอบในการพัฒนาการเรียนรู้ทั้งของตนเอง
                                                และสอดคล้องกับทางวิชาชีพอย่างต่อเนื่อง</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D1"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D1"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D1"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D1"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D1"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">รู้จักบทบาทหน้าที่
                                                และความรับผิดชอบในการทำงานตามที่มอบหมาย ทั้งงานบุคคลและงานกลุ่ม
                                                สามารถปรับตัวและทำงานร่วมกับผู้อื่นทั้งในฐานะผู้นำและผู้
                                                ตามได้อย่างมีประสิทธิภาพสามารถวางตัวได้อย่างเหมาะสมกับความรับผิดชอบ
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D2"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D2"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D2"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D2"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D2"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีจิตสำนึกความรับผิดชอบด้านความปลอดภัยในการทำงาน
                                                และการรักษาสภาพแวดล้อมต่อสังคม</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D3"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D3"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D3"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D3"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="D3"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        {{-- 5. ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ --}}
                                        <h4>5. ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ</h4>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีทักษะการใช้คอมพิวเตอร์
                                                สำหรับการทำงานที่เกี่ยวข้องกับวิชาชีพได้เป็นอย่างดี
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E1"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E1"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E1"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E1"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E1"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถประยุกต์ใช้เทคโนโลยีสารสนเทศและการสื่อสารที่ทันสมัยได้
                                                อย่าง เหมาะสมและมีประสิทธิภาพ
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E2"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E2"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E2"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E2"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E2"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถใช้เครื่องมือการคำนวณและเครื่องมือทางเทคโนโลยี
                                                เพื่อประกอบวิชาชีพในสาขาเทคโนโลยีที่เกี่ยวข้องได้</label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E3"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E3"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E3"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E3"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="E3"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        {{-- 6. ทักษะการปฏิบัติงาน --}}
                                        <h4>6. ทักษะการปฏิบัติงาน</h4>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">มีทักษะปฏิบัติการใช้เครื่องมือและอุปกรณ์พื้นฐานรวมถึงเทคโนโลยีเพื่อประกอบวิชาชีพ
                                                ในสาขาที่เกี่ยวข้องได้อย่างถูกต้องและปลอดภัย
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F1"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F1"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F1"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F1"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F1"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถบูรณาการการเรียนรู้ร่วมกับการทำงาน
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F2"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F2"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F2"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F2"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F2"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-email">สามารถปฏิบัติงานจริงในสถานประกอบการ
                                            </label>
                                            <br> <label class="form-check-label me-2 text-black">ต้องปรับปรุง</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F3"
                                                    style="width: 1.2em; height: 1.2em;" value="1"
                                                    required="required" />
                                                <label class="form-check-label">1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F3"
                                                    style="width: 1.2em; height: 1.2em;" value="2" />
                                                <label class="form-check-label">2</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F3"
                                                    style="width: 1.2em; height: 1.2em;" value="3" />
                                                <label class="form-check-label">3</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F3"
                                                    style="width: 1.2em; height: 1.2em;" value="4" />
                                                <label class="form-check-label">4</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="F3"
                                                    style="width: 1.2em; height: 1.2em;" value="5" />
                                                <label class="form-check-label">5</label>
                                            </div>
                                            <label class="form-check-label ms-2 text-black">ดี</label>
                                        </div>
                                        {{-- จุดเด่นของนักศึกษาฝึกงาน --}}
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">จุดเด่นของนักศึกษาฝึกงาน</label>
                                            <input class="form-control" type="text" name="prominentPoint" />
                                        </div>
                                        {{-- ข้อควรปรับปรุงของนักศึกษาฝึกงาน --}}
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">ข้อควรปรับปรุงของนักศึกษาฝึกงาน</label>
                                            <input class="form-control" type="text" name="improve" />
                                        </div>
                                        {{-- ข้อคิดเห็นเพิ่มเติม หรือข้อเสนอแนะ --}}
                                        <div class="mb-3">
                                            <label class="form-label fs-0 text-black"
                                                for="bootstrap-wizard-wizard-name">ข้อควรปรับปรุงของนักศึกษาฝึกงาน</label>
                                            <input class="form-control" type="text" name="additionalComments" />
                                        </div>





                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" required="required"
                                                checked="checked" id="bootstrap-wizard-wizard-checkbox" />
                                            <label class="form-check-label" for="bootstrap-wizard-wizard-checkbox">I
                                                accept the <a href="#!">terms </a>and <a href="#!">privacy
                                                    policy</a></label>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary me-1 mb-1 mb-5" type="submit">ยืนยัน
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
        aria-labelledby="settings-offcanvas">
        <div class="offcanvas-header settings-panel-header bg-shape">
            <div class="z-index-1 py-1 light">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="text-white mb-0 me-2"><span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
                    <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset"
                        style="font-size:12px"> <span class="fas fa-redo-alt me-1"
                            data-fa-transform="shrink-3"></span>Reset</button>
                </div>
                <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
            </div>
            <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body scrollbar-overlay px-x1 h-100" id="themeController">
            <h5 class="fs-0">Color Scheme</h5>
            <p class="fs--1">Choose the perfect color mode for your app.</p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6">
                        <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio"
                            value="light" data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span
                                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                    src="../../assets/img/generic/falcon-mode-default.jpg"
                                    alt="" /></span><span class="label-text">Light</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio"
                            value="dark" data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span
                                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                    src="../../assets/img/generic/falcon-mode-dark.jpg"
                                    alt="" /></span><span class="label-text"> Dark</span></label>
                    </div>
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="me-2"
                        src="../../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0">RTL Mode</h5>
                        <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1"
                            href="../../documentation/customization/configuration.html">RTL Documentation</a>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input ms-0" id="mode-rtl" type="checkbox"
                        data-theme-control="isRTL" />
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="me-2"
                        src="../../assets/img/icons/arrows-h.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0">Fluid Layout</h5>
                        <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1"
                            href="../../documentation/customization/configuration.html">Fluid Documentation</a>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input ms-0" id="mode-fluid" type="checkbox"
                        data-theme-control="isFluid" />
                </div>
            </div>
            <hr />
            <div class="d-flex align-items-start"><img class="me-2" src="../../assets/img/icons/paragraph.svg"
                    width="20" alt="" />
                <div class="flex-1">
                    <h5 class="fs-0 d-flex align-items-center">Navigation Position</h5>
                    <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
                    <div>
                        <select class="form-select form-select-sm" aria-label="Navbar position"
                            data-theme-control="navbarPosition">
                            <option value="vertical"
                                data-page-url="../../modules/components/navs-and-tabs/vertical-navbar.html">Vertical
                            </option>
                            <option value="top"
                                data-page-url="../../modules/components/navs-and-tabs/top-navbar.html">Top</option>
                            <option value="combo"
                                data-page-url="../../modules/components/navs-and-tabs/combo-navbar.html">Combo
                            </option>
                            <option value="double-top"
                                data-page-url="../../modules/components/navs-and-tabs/double-top-navbar.html">Double
                                Top</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr />
            <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
            <p class="fs--1 mb-0">Switch between styles for your vertical navbar </p>
            <p> <a class="fs--1"
                    href="../../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See
                    Documentation</a></p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle"
                            value="transparent" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/default.png"
                                alt="" /><span class="label-text"> Transparent</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle"
                            value="inverted" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/inverted.png"
                                alt="" /><span class="label-text"> Inverted</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle"
                            value="card" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/card.png"
                                alt="" /><span class="label-text"> Card</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle"
                            value="vibrant" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/vibrant.png"
                                alt="" /><span class="label-text"> Vibrant</span></label>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5"><img class="mb-4"
                    src="../../assets/img/icons/spot-illustrations/47.png" alt="" width="120" />
                <h5>Like What You See?</h5>
                <p class="fs--1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a
                    class="mb-3 btn btn-primary"
                    href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/"
                    target="_blank">Purchase</a>
            </div>
        </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    {{-- <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/choices/choices.min.js') }}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="../..vendors/choices/choices.min.js"></script>
    <script src="../../vendors/popper/popper.min.js"></script>
    <script src="../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../vendors/is/is.min.js"></script>
    <script src="../../assets/js/flatpickr.js"></script>
    <script src="../../vendors/dropzone/dropzone.min.js"></script>
    <script src="../../vendors/lottie/lottie.min.js"></script>
    <script src="../../vendors/validator/validator.min.js"></script>
    <script src="../../vendors/fontawesome/all.min.js"></script>
    <script src="../../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../../vendors/list.js/list.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        // Start Method Provinec
        $(document).on('change', '#idStudent', function() {
            let idStudent = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/evalution/idstudent",
                data: {
                    idStudent: idStudent
                },
                success: function(reponse) {
                    console.log(reponse[0].fName + ' ' + reponse[0].lName)
                    $('#fNameStudent').val(reponse[0].fName + ' ' + reponse[0].lName);
                }
            });
        }); // End Method
    </script>

</body>

</html>
{{-- @extends('layouts.layoutsEvalution') --}}
{{-- @section('footer') --}}
<footer class="footer">
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
</footer>
{{-- @endsection --}}
