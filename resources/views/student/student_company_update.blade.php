@extends('layouts.layout')
@section('main-content')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["ระบบเพิ่มบริษัทงาน มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>
        {{-- end H3 --}}
        <div class="row justify-content-md-center">
            <div class="col-lg-7 ps-lg-2 mb-3">
                <div class="row g-0 h-100 align-items-stretch">
                    <div class="col-lg-12 mb-3 ">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">บริษัทฝึกงาน</h5>
                                <a class="btn btn-primary  btn-sm px-3 mt-2 "
                                    href="{{ route('student_company_detail') }}">ย้อนกลับ</a>
                            </div>
                            <div class="card-body bg-light pb-0">
                                <div class="collapse show" id="experience-form" style="">
                                    <form action="{{ route('student.company.update.update', $data->id) }}" method="POST"
                                        class="row needs-validation" novalidate="" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="company">ปีการศึกษา</label>
                                        </div>
                                        <div class="col-3 col-sm-3 mb-3">
                                            <select class="form-select" aria-label="Default select example" name="year"
                                                required="">
                                                <option value="">เลือกปี</option>
                                                <option {{ $data->year == '2566' ? 'selected' : '' }} value="2566">2566
                                                </option>
                                                <option {{ $data->year == '2567' ? 'selected' : '' }} value="2567">2567
                                                </option>
                                                <option {{ $data->year == '2568' ? 'selected' : '' }} value="2568">2568
                                                </option>
                                                <option {{ $data->year == '2569' ? 'selected' : '' }} value="2569">2569
                                                </option>
                                                <option {{ $data->year == '2570' ? 'selected' : '' }} value="2570">2570
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-2 col-sm-2 mb-3 text-lg-end">
                                            <label class="form-label" for="company">ภาคเรียนที่</label>
                                        </div>
                                        <div class="col-3 col-sm-3 mb-3">
                                            <select class="form-select" aria-label="Default select example" name="semester"
                                                required="">
                                                <option value="">ภาค</option>
                                                <option {{ $data->semester == '1' ? 'selected' : '' }} value="1">1
                                                </option>
                                                <option {{ $data->semester == '2' ? 'selected' : '' }} value="2">2
                                                </option>
                                                <option {{ $data->semester == '3' ? 'selected' : '' }} value="3">3
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="position">ชื่อบริษัท</label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input required="" class="form-control form-control-sm" id="position"
                                                type="text" value="{{ $data->company }}" name="company" required="">
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="city">ชื่อหัวหน้า/หน่วยงาน/เจ้าของ</label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input required="" value="{{ $data->bossName }}"
                                                class="form-control form-control-sm" id="city" type="text"
                                                name="bossName">
                                            <p class="text-danger">* ชื่อสำหรับขออนุญาตการฝึกงาน </p>
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">ตำแหน่ง </label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input required=""value="{{ $data->positionName }}"
                                                class="form-control form-control-sm" id="city" type="text"
                                                name="positionName">
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">เบอร์โทรศัพท์บริษัท </label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input required="" class="form-control form-control-sm" type="text"
                                                name="telCompany" value="{{ $data->telCompany }}">
                                            <p class="text-danger">* เบอร์โทรศัพท์บริษัท หรือผู้ประสานงานที่ติดต่อได้ </p>
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">ที่อยู่บริษัท เลขที่ หมู่ ถนน
                                            </label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input required="" class="form-control form-control-sm" type="text"
                                                name="address" value="{{ $data->address }}">
                                        </div>

                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">จังหวัด </label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <select class="form-select " id="provinceCompany" size="1"
                                                name="provinceCompany" required>
                                                <option value="{{ $data->provinceCompany }}">{{ $data->provinceCompany }}</option>
                                                @foreach ($provinces as $item)
                                                    <option value="{{ $item->province }}">{{ $item->province }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">อำเภอ/เขต </label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <select class="form-select " id="amphoeCompany" size="1"
                                                name="amphoeCompany" required>
                                                <option value="{{ $data->amphoeCompany }}">{{ $data->amphoeCompany }}</option>
                                            </select>
                                        </div>

                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">ตำบล/แขวง </label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <select class="form-select " id="tambonCompany" size="1"
                                                name="tambonCompany" required>
                                                <option value="{{ $data->tambonCompany }}">{{ $data->tambonCompany }}</option>
                                            </select>
                                        </div>

                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="exp-description">รหัสไปรษณีย์ </label>
                                        </div>

                                        <div class="col-9 col-sm-7 mb-3">
                                            <input required="" class="form-control form-control-sm" id="zipcodeCompany" type="text"
                                                name="zipcodeCompany"value="{{ $data->zipcodeCompany }}" required>
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="phone">รูป</label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input class="form-control" name="photo" type="file" id="image"
                                               value="{{ $data->img}}" accept="image/png, image/gif, image/jpeg" />
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="phone">รูป</label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <img id="showImage" class="rounded-3"
                                                src="{{ ($data->img != ' ') ? url('upload/' . $data->img) : url('upload/no_image.jpg') }}"
                                                alt="profile" width="150" />
                                        </div>
                                        <div class="col-9 col-sm-7 offset-3">
                                            <button class="btn btn-primary" type="submit">ยืนยัน</button>

                                        </div>
                                    </form>
                                    @if ($data->status !== 'ยกเลิก (โดยนักศึกษา)' && $data->status !== 'รออาจารย์อนุมัติ' && $data->status !== 'รอฝึกงาน')
                                        <div class="col-9 col-sm-7 offset-3">
                                            <form action="{{ route('student.cancel.company') }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-danger" type="submit" name="id"
                                                    onclick="return confirm('ยกเลิกการฝึกงานบริษัทนี้?')"
                                                    value="{{ $data->id }}">ยกเลิกการฝึกงานบริษัทนี้</button>
                                            </form>
                                        </div>
                                    @endif


                                    <div class="border-dashed-bottom my-4"></div>
                                </div>
                            </div>
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
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

         // Start Method Provinec
         $(document).on('change', '#provinceCompany', function() {
            let province = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ URL::previous() }}/amphoe",
                data: {
                    province: province
                },
                success: function(reponse) {
                    $('#amphoeCompany').empty();
                    $('#tambonCompany').empty();
                    $('#zipcodeCompany').val('');
                    let option = document.createElement("option");
                        option.text =' ';
                        option.value =' ';
                        let select = document.getElementById("amphoeCompany");
                        select.appendChild(option);
                    for (let i in reponse) {
                        let option = document.createElement("option");
                        option.text = reponse[i].amphoe;
                        option.value = reponse[i].amphoe;
                        let select = document.getElementById("amphoeCompany");
                        select.appendChild(option);
                    }
                }
            });
        }); // End Method

        // Start Method Tambons
        $(document).on('change', '#amphoeCompany', function() {
            let amphoe = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ URL::previous() }}/tambon",
                data: {
                    amphoe: amphoe
                },
                success: function(reponse) {
                    $('#tambonCompany').empty();
                    $('#zipcodeCompany').val('');
                    let option = document.createElement("option");
                        option.text = ' ';
                        option.value = ' ';
                        let select = document.getElementById("tambonCompany");
                        select.appendChild(option);
                    for (let i in reponse) {
                        let option = document.createElement("option");
                        option.text = reponse[i].tambon;
                        option.value = reponse[i].tambon;
                        let select = document.getElementById("tambonCompany");
                        select.appendChild(option);
                    }
                }
            });
        }); // End Method

        // Start Method Zipcode
        $(document).on('change', '#tambonCompany', function() {
            let tambon = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ URL::previous() }}/zipcode",
                data: {
                    tambon: tambon
                },
                success: function(reponse) {
                    $('#zipcodeCompany').val('');
                    $('#zipcodeCompany').val( reponse[0].zipcode);
                }
            });
        }); // End Method

    });
</script>
