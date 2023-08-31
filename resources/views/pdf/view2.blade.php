@php
use Illuminate\Support\Carbon;
@endphp
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bolder;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
            font-size: 20px;
        }

        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
            size: auto; 
            size: A4 portrait;
        }

        header {
            position: fixed;
            top: -90px;
            left: 0px;
            right: 30px;
            height: 50px;

            /** Extra personal styles **/
            color: rgb(0, 0, 0);
            text-align: right;
            line-height: 35px;
        }
        .content {
            /* border: 2px solid red; */
            margin-left: 90px;
            margin-right: 80px;
            width: 580px;
            word-wrap: break-word;

        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        .approve{
            margin-left: 17rem
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <label for="">ทดน.3</label>
    </header>

    {{-- <footer>
        Copyright &copy; 
    </footer> --}}

    <!-- Wrap the content of your PDF inside a main tag -->
        <div class="content">
            <p >ที่ ทดน.พิเศษ(ส) 101/{{thaidate(' Y', date('Y'));}} <br> </p>
                
                                                         <p style="text-indent: 27em;">{{thaidate(' j F Y', date('d-m-Y'));}}</p> 
                <table >
                    <tr>
                        <td>เรื่อง  ขอส่งตัวนักศึกษาฝึกประสบการณ์วิชาชีพ</td>
                    </tr>
                    <tr>
                        <td>เรียน  <span >บริษัท {{$data[0]->comName}}</span></td>
                    </tr>
                </table>
                    <p style="line-height: 15px;text-indent: 5em;">ตามที่ท่านได้ตอบรับนักศึกษาคณะศิลปศาสตร์และวิทยาศาสตร์ มหาวิทยาลัยเอเชีย
                        อาคเนย์ เข้ารับการฝึกประสบการณ์วิชาชีพในสถานประกอบการของท่าน โดยเข้ารับการฝึกงานระหว่าง
                        <br>วันที่ {{Carbon::parse($data[0]->start_intern)->thaidate('j F Y') }}</span>  ถึง   <span >{{Carbon::parse($data[0]->end_intern)->thaidate('j F Y') }} ความทราบแล้ว นั้น </p>
                            <p style="line-height: 15px;text-indent: 5em;">    สาขาวิชาเทคโนโลยีดิจิทัลและนวัตกรรม คณะศิลปศาสตร์และวิทยาศาสตร์ ขอส่งตัว
                                {{$data[0]->sex}}  {{$data[0]->fName}} {{$data[0]->lName}} นักศึกษาสาขาวิชาเทคโนโลยีดิจิทัลและนวัตกรรม เข้ารับการฝึกงาน ณ บริษัท
                        {{$data[0]->comName}} จำกัด</p>
                       <p style="text-indent: 8em;">จึงเรียนมาเพื่อโปรดทราบและขอขอบคุณเป็นอย่างยิ่ง</p> 
                    
                <div class="approve">
                    <table style="text-align: center">
                        <tr>
                            <td>ขอแสดงความนับถือ</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="height: 40px;"></td>
                        </tr>
                        <tr>
                            <td>................................................</td>
                        </tr>
                        <tr>
                            <td style="line-height: 15px;">(ผศ.ดร.ยอร์ช  เสมอมิตร)<br>คณบดีคณะศิลปศาสตร์และวิทยาศาสตร์</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div>
                    <p style="line-height: 15px;">ผู้ประสานงานการฝึกงาน อาจารย์ชนินทร เฉลิมสุข<br>
                        สำนักงานคณะศิลปศาสตร์และวิทยาศาสตร์<br>
                        โทร. 02-807-4500 ต่อ 337 หรือ 064-170-0888<br>
                        โทรสาร 02-807-4528</p>
                </div>
        </div>
</body>

</html>
