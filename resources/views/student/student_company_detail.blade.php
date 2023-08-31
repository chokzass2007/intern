
@include('layouts.function')
@extends('layouts.layout')
@section('main-content')
    @include('navbars.navbar-vertical')
    @include('navbars.navber-top-default')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["ระบบบริษัทงานฝึกงาน มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>
        {{-- end H3 --}}
        <div class="card overflow-hidden">
            <div class="row flex-between-center">
                        <div class="col-auto">
                            <a class="btn btn-primary  btn-sm px-3 m-2 " href="{{url('/')}}">ย้อนกลับ</a>
                        </div>
            <div class="card-header d-flex flex-between-center bg-light py-2">
                    
                    </div>
                    <div class="table-responsive scrollbar">
                        <table class="table table-hover table-striped overflow-hidden">
                          <thead>
                            <tr>
                              <th scope="col">บริษัท</th>
                              <th scope="col">ชื่อผู้ติดต่อขอฝึกงาน</th>
                              <th scope="col">ปีการศึกษา/ภาค</th>
                              <th scope="col">เริ่มฝึกงานวันที่</th>
                              <th scope="col">สิ้นสุดการฝึกงานวันที่</th>
                              <th scope="col">สถานะ</th>
                              <th scope="col">หมายเหตุ</th>
                              <th scope="col">แก้ไข</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($company as $item)
                            <tr class="align-middle">
                              <td class="text-nowrap">
                                <div class="d-flex align-items-center">
                                  <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="{{asset('')}}upload/{{(isset($item->img)) ? $item->img :'no_image.jpg'}}" alt="" />
                                  </div>
                                  <div class="ms-2">{{$item->company}}</div>
                                </div>
                              </td>
                              <td class="text-nowrap">{{$item->bossName}}</td>
                              <td class="text-nowrap">ปีการศึกษา {{$item->year}}/{{$item->semester}}</td>
                              <td class="text-nowrap">{{$item->start_intern}}</td>
                              <td class="text-nowrap">{{$item->end_intern}}</td>
                              <td>{!! statusCompany($item->status) !!}</td>
                              <td class=""style="color:red;"> {{(isset($item->cal_comment)) ?'* '.$item->cal_comment :''}}</td>
                              <td class="text-center"><a class="btn btn-link p-0" href="{{ route('student.company.update',$item->id)}}" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></a></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
        </div>

        {{-- Start footer --}}
    </div>
    </div>
    @include('partials.footer')
    </div>
@endsection
