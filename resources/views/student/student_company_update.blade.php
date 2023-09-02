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
                                            <label class="form-label" for="exp-description">ที่อยู่บริษัท </label>
                                        </div>

                                        <div class="col-9 col-sm-7 mb-3">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" id="city" type="text" name="address"
                                                rows="5" required="">{{ $data->address }}</textarea>
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="phone">รูป</label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <input class="form-control" name="photo" type="file" id="image"
                                                accept="image/png, image/gif, image/jpeg" />
                                        </div>
                                        <div class="col-3 mb-3 text-lg-end">
                                            <label class="form-label" for="phone">รูป</label>
                                        </div>
                                        <div class="col-9 col-sm-7 mb-3">
                                            <img id="showImage" class="rounded-3"
                                                src="{{ !empty($data->photo) ? url('upload/' . $data->photo) : url('upload/no_image.jpg') }}"
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

    });
</script>
