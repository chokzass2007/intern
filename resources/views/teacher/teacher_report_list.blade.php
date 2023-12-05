@php
    use Illuminate\Support\Carbon;

    function badgesStatus($status, $end_intern, $start_intern)
    {
        if ($status === 'รออาจารย์อนุมัติ') {
            $badges = '<small class="badge badge  badge-soft-secondary">' . $status . '</small>';
        } elseif ($status === 'รอดำเนินการยื่นเรื่องฝึกงาน') {
            $badges = '<small class="badge badge  badge-soft-warning">' . $status . '</small>';
        } elseif ($status === 'รอฝึกงาน') {
            if (strtotime(date('Y-m-d')) > strtotime($end_intern)) {
                $badges = '<small class="badge badge  badge-soft-success">ฝึกงานสำเร็จ</small>';
            } elseif (strtotime(date('Y-m-d')) >= strtotime($start_intern)) {
                $badges = '<small class="badge badge  badge-soft-info">กำลังฝึกงาน</small>';
            } else {
                $badges = '<small class="badge badge  badge-soft-primary">' . $status . '</small>';
            }
        } elseif ($status === 'ฝีกงานเรียบร้อย') {
            $badges = '<small class="badge badge  badge-soft-success">' . $status . '</small>';
        } else {
            $badges = '<small class="badge badge  badge-soft-danger">' . $status . '</small>';
        }
        return $badges;
    }
@endphp
{{-- @include('layouts.function') --}}
@extends('layouts.layout')
@section('main-content')
    <div class="card-body position-relative">
        {{-- start center --}}
        <h3 class="fw-light overflow-hidden font-sans-serif"> <span style="color: #2c7be5" class="typed-text fw-bold ms-1 "
                data-typed-text='["ระบบรายงานการงานฝึกงานนักศึกษา มหาวิทยาลัยเอเชียอาคเนย์"]'></span></h3>
        {{-- end H3 --}}
        <div class="card overflow-hidden">
            <div class="row flex-between-center">
                <div class="col-auto">
                    <a class="btn btn-primary  btn-sm px-3 m-2 " href="javascript:window.close()">ย้อนกลับ</a>

                </div>
                <div class="table-responsive scrollbar">
                    <table class="table table-hover table-striped overflow-hidden">
                        <thead>
                            <tr>
                                <th scope="col">บริษัท</th>
                                <th scope="col">รายงานการฝึกงานโดยย่อ</th>
                                <th scope="col">ระหว่างวันที่</th>
                                <th scope="col">ถึง</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="align-middle">
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle"
                                                    src="{{ asset('') }}upload/{{ isset($item->img) ? $item->img : 'no_image.jpg' }}"
                                                    alt="" />
                                            </div>
                                            <div class="ms-2">{{ mb_substr( $item->company, 8, 30,'utf8')}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            {{ $item->report_comment }}
                                        </div>
                                    </td>
                                    {{-- สร้าง div กำหนดขนาดของกล่องถ้าข้อความยาวให้ขึ้นบรรทัดใหม่ --}}
                                    <td  class="text-nowrap">
                                        {{ Carbon::parse($item->report_from_date)->thaidate('D j M y') }} เวลา
                                        {{ mb_substr($item->report_from_date, 10, 20,'utf8') }} นาที</td>
                                    <td class="text-nowrap">{{ Carbon::parse($item->report_to_date)->thaidate('D j M y') }}
                                        เวลา {{ mb_substr($item->report_to_date, 10, 20,'utf8') }} นาที</td>
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
