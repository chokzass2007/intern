@php

    function statusCompany($status, $end_intern, $start_intern)
    {
        if ($status === 'รออาจารย์อนุมัติ') {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-secondary">' . $status . '<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>';
        } elseif ($status === 'รอดำเนินการยื่นเรื่องฝึกงาน') {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-warning">' . $status . '<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>';
        } elseif ($status === 'รอฝึกงาน') {
            if (strtotime(date('Y-m-d')) > strtotime($start_intern)) {
                $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-success">ฝึกงานสำเร็จ<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>';
            } elseif (strtotime(date('Y-m-d')) >= strtotime($end_intern)) {
                $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-warning">กำลังฝึกงาน<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>';
            } else {
                $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-primary">' . $status . '<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>';
            }
        } elseif ($status === 'ฝีกงานเรียบร้อย') {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-success">' . $status . '<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>';
        } else {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-danger">' . $status . '<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>';
        }
        return $badges;
    }

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
            $badges = '<small class="badge badge  badge-soft-success">' .$status. '</small>';
        } else {
            $badges = '<small class="badge badge  badge-soft-danger">' .$status. '</small>';
        }
        return $badges;
    }
@endphp
