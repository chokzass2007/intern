@php

$id = Auth::user()->id;
$profileData = App\Models\User::find($id);

@endphp
<!-- ---- navbar-vertical starts------------ -->
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="{{ url('/') }}">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('assets/img/icons/spot-illustrations/falcon.png')}}" alt="" width="40" /><span class="font-sans-serif">SAU</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
               <!-- label-->
               <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">ระบบจัดการการฝึกงานนักศึกษา
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>

                   <!-- more inner pages-->
                   <a class="nav-link" href="{{ route('student_company') }}" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <img
                        class="align-self-center me-2" src="{{ asset('assets\img\icons\1company.png') }}"
                        alt="Generic placeholder image" width="25"><span class="nav-link-text fs-1  ps-2">เพิ่มบริษัทฝึกงาน</span>
                    </div>
                  </a>
                  <a class="nav-link active" href="{{ route('student_company_detail') }}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                          <img
                        class="align-self-center me-2" src="{{ asset('assets\img\icons\1list.png') }}"
                        alt="Generic placeholder image" width="25"><span class="nav-link-text fs-1 ps-2">ประวัติการฝึกงาน</span>
                        </div>
                      </a>
                      <!-- more inner pages-->

                   <a class="nav-link" href="{{ route('' . $profileData->role . '.report') }}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                          <img
                        class="align-self-center me-2" src="{{ asset('assets\img\icons\1report.png') }}"
                        alt="Generic placeholder image" width="25"><span class="nav-link-text fs-1  ps-2">รายงานการฝึกงาน</span>
                        </div>
                      </a>
                      <!-- more inner pages-->

                   <a class="nav-link" href="{{ route('' . $profileData->role . '.change.profile') }}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <img
                            class="align-self-center me-2" src="{{ asset('assets/img/logos/editprofile.png') }}"
                            alt="Generic placeholder image" width="25"><span class="nav-link-text fs-1  ps-2">แก้ไขข้อมูลส่วนตัว</span>
                        </div>
                      </a>




                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>

              </ul>
              <div class="settings mb-3">
                <div class="card alert p-0 shadow-none" role="alert">
                  <div class="card-body text-center">
                    <img src="{{ asset('assets/img/icons/spot-illustrations/01.jpg')}}" alt="" width="100" />
                    {{-- <img src="{{ Storage::url('upload/202308260325202308130414IMG20230808113955.jpg')}}" alt="" width="100" /> --}}
                    {{-- <p class="fs-0 mt-2">อ.ชนินทร เฉลิมสุข</p> --}}
                    <div class="d-grid">
                        <a class=" mt-2 btn btn-sm btn-purchase" href="https://www.facebook.com/chanintorn.comsci" target="_blank">อ.ชนินทร เฉลิมสุข</a>
                    <label for="" class="mt-2">อาจารย์ผู้ดูแลนักศึกษาฝึกงาน
                        <br>เบอร์โทรติดต่อ
                        <br><a href="tel:064-170-0888">064-170-0888</a>
                    </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- ----- navbar-vertical end -------------- -->
