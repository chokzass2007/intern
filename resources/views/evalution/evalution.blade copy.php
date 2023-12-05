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
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../assets/js/config.js"></script>
    <script src="../../vendors/simplebar/simplebar.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../../vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="../../vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../../vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="../../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
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
                <div class="col-sm-10 col-lg-7 col-xxl-5"><a class="d-flex flex-center mb-4"
                        href="../../index.html"><img class="me-2"
                            src="../../assets/img/icons/spot-illustrations/falcon.png" alt=""
                            width="45" /><span
                            class="font-sans-serif fw-bolder fs-4 d-inline-block">falcon</span></a>
                    <div class="card theme-wizard mb-5" id="wizard">
                        <form id="formevalution" class="needs-validation" novalidate="novalidate">
                            <div class="card-header bg-light pt-3 pb-2">
                                <ul class="nav justify-content-between nav-wizard">
                                    <li class="nav-item"><a class="nav-link active fw-semi-bold"
                                            href="#bootstrap-wizard-tab1" data-bs-toggle="tab"
                                            data-wizard-step="data-wizard-step"><span
                                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                                        class="fas fa-lock"></span></span></span><span
                                                class="d-none d-md-block mt-1 fs--1">Account</span></a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab2"
                                            data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                                        class="fas fa-user"></span></span></span><span
                                                class="d-none d-md-block mt-1 fs--1">Personal</span></a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab3"
                                            data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                                        class="fas fa-dollar-sign"></span></span></span><span
                                                class="d-none d-md-block mt-1 fs--1">Billing</span></a></li>
                                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab4"
                                            data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                                class="nav-item-circle-parent"><span class="nav-item-circle"><span
                                                        class="fas fa-thumbs-up"></span></span></span><span
                                                class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
                                </ul>
                            </div>
                            <div class="card-body py-4" id="wizard-controller">
                                <div class="tab-content">
                                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                        aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                                        <p>
                                            วิธีการประเมิน
                                            แบบประเมินผลประกอบด้วย 6 ด้าน ดังนี้
                                            1. คุณธรรม จริยธรรม
                                            2. ความรู้
                                            3. ทักษะทางปัญญา
                                            4. ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ
                                            5. ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสาร และการใช้เทคโนโลยีสารสนเทศ
                                            6. ทักษะการปฏิบัติงาน
                                            โดยมีลำดับคะแนนในการประเมิน ดังนี้
                                            - คะแนนดีมาก (5) นักศึกษาปฏิบัติงานที่ได้รับมอบหมายอย่างเสมอต้นเสมอปลาย
                                            และดีเลิศเกินความคาดหมาย และใช้ทักษะเหล่านั้นทำงานที่ได้รับมอบหมายจนสำเร็จ
                                            - คะแนนดี (4) นักศึกษาปฏิบัติงานที่ได้รับมอบหมายอย่างเสมอต้นเสมอปลาย
                                            และปฏิบัติงานจนสำเร็จในระดับที่น่าพอใจ
                                            - คะแนนปานกลาง (3) นักศึกษาปฏิบัติงานได้ต่ำกว่าที่ควรเป็นเล็กน้อย
                                            แต่สามารถปฏิบัติงานที่ได้รับมอบหมายจนสำเร็จเป็นที่น่าพอใจ
                                            - คะแนนพอใช้ (2) นักศึกษาปฏิบัติงานได้ต่ำกว่าความคาดหมาย
                                            แต่ก็ปฏิบัติงานจนสำเร็จเป็นที่น่าพอใจ
                                            - คะแนนต้องปรับปรุง (1) นักศึกษาปฏิบัติไม่เป็นไปตามความคาดหมาย
                                            มีข้อบกพร่องในการทำงานเป็นอย่างมาก
                                        </p>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-wizard-name">ชื่อสถานประกอบการ</label>
                                            <input class="form-control" type="text" name="companyName"
                                                placeholder="บริษัท เอสเอยูเรียนสุข จำกัด" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="bootstrap-wizard-wizard-name">ชื่อ-สกุล
                                                (ผู้ประเมิน)</label>
                                            <input class="form-control" type="text" name="fNameAssessor"
                                                placeholder="ชนินทร เฉลิมสุข" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="bootstrap-wizard-wizard-name">ตำแหน่งงาน
                                                (ผู้ประเมิน)</label>
                                            <input class="form-control" type="text" name="position"
                                                placeholder="ผจก & หัวหน้า" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-wizard-name">เบอร์โทรศัพท์ติดต่อ
                                                (ผู้ประเมิน)</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="098-xxx-xxxx" required="required" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-wizard-email">Email*</label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Email address"
                                                pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
                                                required="required" id="bootstrap-wizard-wizard-email"
                                                data-wizard-validate-email="true" />
                                            <div class="invalid-feedback">You must add email</div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="terms"
                                                required="required" checked="checked"
                                                id="bootstrap-wizard-wizard-checkbox" />
                                            <label class="form-check-label" for="bootstrap-wizard-wizard-checkbox">I
                                                accept the <a href="#!">terms </a>and <a href="#!">privacy
                                                    policy</a></label>
                                        </div>

                                    </div>
                                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                        aria-labelledby="bootstrap-wizard-tab2" id="bootstrap-wizard-tab2">

                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio1" type="radio"
                                                    name="inlineRadioOptions" value="option1" required="required" />
                                                <label class="form-check-label" for="inlineRadio1">Item 1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineRadio2" type="radio"
                                                    name="inlineRadioOptions" value="option2" />
                                                <label class="form-check-label" for="inlineRadio2">item 2</label>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="bootstrap-wizard-gender">Gender</label>
                                            <select class="form-select" name="gender" id="bootstrap-wizard-gender">
                                                <option value="">Select your gender ...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-wizard-phone">Phone</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="Phone" id="bootstrap-wizard-wizard-phone" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="bootstrap-wizard-wizard-datepicker">Date of
                                                Birth</label>
                                            <input class="form-control datetimepicker" type="text"
                                                placeholder="d/m/y"
                                                data-options='{"dateFormat":"d/m/y","disableMobile":true}'
                                                id="bootstrap-wizard-wizard-datepicker" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-wizard-address">Address</label>
                                            <textarea class="form-control" rows="4" id="bootstrap-wizard-wizard-address"></textarea>
                                        </div>

                                    </div>
                                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                        aria-labelledby="bootstrap-wizard-tab3" id="bootstrap-wizard-tab3">
                                        <div class="row g-2">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="bootstrap-wizard-card-number">Card
                                                        Number</label>
                                                    <input class="form-control" placeholder="XXXX XXXX XXXX XXXX"
                                                        type="text" id="bootstrap-wizard-card-number" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="bootstrap-wizard-card-name">Name on
                                                        Card</label>
                                                    <input class="form-control" placeholder="John Doe"
                                                        name="cardName" type="text"
                                                        id="bootstrap-wizard-card-name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-card-holder-country">Country</label>
                                                    <select class="form-select" name="customSelectCountry"
                                                        id="bootstrap-wizard-card-holder-country">
                                                        <option value="">Select your country ...</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda
                                                        </option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-card-holder-zip-code">Zip
                                                        Code</label>
                                                    <input class="form-control" placeholder="1234" name="zipCode"
                                                        type="text" id="bootstrap-wizard-card-holder-zip-code" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group mb-0">
                                                    <label class="form-label" for="bootstrap-wizard-card-exp-date">Exp
                                                        Date</label>
                                                    <input class="form-control" placeholder="15/2024" name="expDate"
                                                        type="text" id="bootstrap-wizard-card-exp-date" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group mb-0">
                                                    <label class="form-label"
                                                        for="bootstrap-wizard-card-cvv">CVV</label><span
                                                        class="ms-1" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Card verification value"><span
                                                            class="fa fa-question-circle"></span></span>
                                                    <input class="form-control" placeholder="123" name="cvv"
                                                        maxlength="3" pattern="[0-9]{3}" type="text"
                                                        id="bootstrap-wizard-card-cvv" />
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="card-footer bg-light">
                                                <div class="px-sm-3 px-md-5">
                                                    <ul class="pager wizard list-inline mb-0">
                                                        <li class="previous">
                                                            <button class="btn btn-link ps-0" type="button"><span
                                                                    class="fas fa-chevron-left me-2"
                                                                    data-fa-transform="shrink-3"></span>Prev</button>
                                                        </li>
                                                        <li class="">
                                                            <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span
                                                                    class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3">
                                                                </span></button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                    </div>
                                    <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
                                        aria-labelledby="bootstrap-wizard-tab4" id="bootstrap-wizard-tab4">
                                        <div class="wizard-lottie-wrapper">
                                            <div class="lottie wizard-lottie mx-auto my-3"
                                                data-options='{"path":"../../assets/img/animated-icons/celebration.json"}'>
                                            </div>
                                        </div>
                                        <h4 class="mb-1">Your account is all set!</h4>
                                        <p>Now you can access to your account</p><a class="btn btn-primary px-5 my-3"
                                            href="../../pages/authentication/wizard.html">Start Over</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer bg-light">
                            <div class="px-sm-3 px-md-5">
                                <ul class="pager wizard list-inline mb-0">
                                    <li class="previous">
                                        <button class="btn btn-link ps-0" type="button"><span
                                                class="fas fa-chevron-left me-2"
                                                data-fa-transform="shrink-3"></span>Prev</button>
                                    </li>
                                    <li class="next">
                                        <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span
                                                class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3">
                                            </span></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px">
                        <div class="modal-content position-relative p-5">
                            <div class="d-flex align-items-center">
                                <div class="lottie me-3"
                                    data-options='{"path":"../../assets/img/animated-icons/warning-light.json"}'></div>
                                <div class="flex-1">
                                    <button class="btn btn-link text-danger position-absolute top-0 end-0 mt-2 me-2"
                                        data-bs-dismiss="modal"><span class="fas fa-times"></span></button>
                                    <p class="mb-0">You don't have access to the link. Please try again.</p>
                                </div>
                            </div>
                        </div>
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
                                    src="../../assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span
                                class="label-text"> Dark</span></label>
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
                <div class="d-flex align-items-start"><img class="me-2" src="../../assets/img/icons/arrows-h.svg"
                        width="20" alt="" />
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
                                data-page-url="../../modules/components/navs-and-tabs/combo-navbar.html">Combo</option>
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
            <p> <a class="fs--1" href="../../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See
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
            <div class="text-center mt-5"><img class="mb-4" src="../../assets/img/icons/spot-illustrations/47.png"
                    alt="" width="120" />
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
        // Submit Form Approve
        $(document).on('click', '#submit_form', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "{{ URL::current() }}/evalution/inserts",
                data: $('#formevalution').serialize(),
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
