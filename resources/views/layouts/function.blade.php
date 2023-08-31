@php
    use Illuminate\Support\Carbon;


        // $countDate = abs(strtotime(date('d-m-Y')) - strtotime($profileData->end_intern))/86400 ;
        // $countStartDate = abs(strtotime($profileData->start_intern) - strtotime(date('d-m-Y')))/86400 ;

    function statusCompany($status, $end_intern, $start_intern)
    {
        
        $countDate = abs(strtotime(date('d-m-Y')) - strtotime($end_intern))/86400 ;
        $countStartDate = abs(strtotime($start_intern) - strtotime(date('d-m-Y')))/86400 ;
        if ($status === 'รอการอนุมัติ') {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-Secondary">' . $status . '<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>';
        } elseif ($status === 'รอดำเนินการ') {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-warning">' . $status . '<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>';
        } elseif ($status === 'รอฝึกงาน') {
            if (date($end_intern) != date('Y-m-d') && date($start_intern) >= date('Y-m-d')) {
                $badges = '1/วันที่จบการฝึกงานมากกว่าวันที่ปัจจุบันจริง '.$end_intern.' ปัจจุบัน '.date('Y-m-d').'และวันที่เริ่มงานมากกว่าวันที่ปัจจุบันจริง ✓'.date($start_intern);
            } else {
                $badges = '0 /'.$end_intern.'/'.date('Y-m-d');;
            }
            //------------------------------------------------------------------------------------------------------------------------------------
            // if ($countStartDate >= 0) {// || $start_intern > date('Y-m-d')
            //     $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-success">ฝึกงานสำเร็จ end'.$end_intern.' start'.$start_intern.' Now '.date('Y-m-d').'<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>';
            // } 
            // elseif ($countDate === 0) {
            //     $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-primary">กำลังฝึกงาน'.$end_intern.' Now '.date('Y-m-d').'<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>';
            // } 
            // else {
            //     $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-primary">' . $status . ' end'.$end_intern.' start'.$start_intern.' Now '.date('Y-m-d').'<span class="ms-1 fas fa-redo" data-fa-transform="shrink-2"></span></span>';
            // }
            //------------------------------------------------------------------------------------------------------------------------------------
        } elseif ($status === 'ฝีกงานเรียบร้อย') {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-success">' . $status . '<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>';
        } else {
            $badges = '<span class="badge badge rounded-pill d-block p-2 badge-soft-danger">' . $status . '<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>';
        }
        return $badges;
    }
@endphp
