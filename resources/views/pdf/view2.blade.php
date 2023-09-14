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

        .header {
            position: fixed;
            top: -100px;
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
            margin-top: -8%;
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

        .approve {
            margin-left: 17rem
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    {{-- <header>

    </header> --}}


    {{-- <footer>
        Copyright &copy;
    </footer> --}}

    <!-- Wrap the content of your PDF inside a main tag -->

    <div class="content">

       <label class="header" for="">ทดน.2</label>
        <div style="text-align: center">

        <img src="{{asset('assets/img/SAU.png')}}" alt="" width="200px">

        </div>
    <div style="text-align: center;">

            <div style="line-height:70%;padding-top:15px;"><strong >แบบตอบรับนักศึกษาฝึกงาน
<br style="line-height:70%;">สาขาวิชาเทคโนโลยีดิจิทัลและนวัตกรรม คณะศิลปศาสตร์และวิทยาศาสตร์
    <br style="line-height:70%;">มหาวิทยาลัยเอเชียอาคเนย์</strong>
            </div>


    </div>
    เรียน คณบดีคณะศิลปะศาสตร์และวิทยาศาสตร์

    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้าพเจ้า นาย/นาง/นางสาว ...................................................... ตำแหน่ง ............................
    <br>แผนก/ฝ่าย
    ..........................................................................................................................................
    <br>บริษัท/สถานประกอบการ
    <br>มีความยินดีในการตอบรับนักศึกษาเข้าฝึกงาน ดังนี้
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  □ &nbsp; ไม่พร้อมที่จะรับนักศึกษาสาขาวิชาเทคโนโลยีดิจิทัลและนวัตกรรมเข้าฝึกงาน
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  □ &nbsp; ยินดีรับนักศึกษาสาขาวิชาเทคโนโลยีดิจิทัลและนวัตกรรมเข้าฝึกงาน

    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; รหัสนักศึกษา  &nbsp;&nbsp;{{$data[0]->idStudent}}
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ชื่อ-สกุล     &nbsp;&nbsp;{{$data[0]->fName}} {{$data[0]->lName}}

    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; วันที่เริ่มฝึกงาน &nbsp;&nbsp; {{Carbon::parse($data[0]->start_intern)->thaidate('j F Y') }}
    <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; วันสิ้นสุดการฝึกงาน &nbsp;&nbsp; {{Carbon::parse($data[0]->end_intern)->thaidate('j F Y') }}


    <br>หน่วยงานของท่านมีโอกาสให้นักศึกษาฝึกงานด้านใด
    …………………………………………………………………………………....…………………….…………………………………………………………………………………....…………………….…………………………………………………………………………………...………………….……………………………………………………………………………………………………………………………………....…………………

    <div class="approve" >
        <table style="text-align: center">
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp; ลงชื่อ ................................................ </td>
            </tr>

                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (................................................)</td>
            </tr>
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp; ตำแหน่ง ................................................ </td>
            </tr>

                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ประทับตราสถานประกอบการ)</td>
            </tr>
      </table>
    </div>
    <div>

                    <div>
                        <p style="font-size: 13px;">
                    <u>กรุณาส่งเอกสารฝึกงานกลับมาที่</u>
                    <br>สำนักงานคณะศิลปศาสตร์และวิทยาศาสตร์ มหาวิทยาลัยเอเขียอาคเนย์ 19/1 ถ.เพชรเกษม หนองค้างพลู หนองแขม กทม. 10160
                    <br>หรือสแกนส่งมาที่อีเมล์ dti@sau.ac.th</p></td>

    </div>
    </div>
</body>

</html>
