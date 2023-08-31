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
        <label for="">ทดน.1</label>
    </header>

    {{-- <footer>
        Copyright &copy; 
    </footer> --}}

    <!-- Wrap the content of your PDF inside a main tag -->
        <div class="content">
            <p >ที่ คศ.พิเศษ (ทดน) 001/{{thaidate(' Y', date('Y'));}} <br> </p>
                
                                                         <p style="text-indent: 27em;">{{thaidate(' j F Y', date('d-m-Y'));}}</p> 
                <table >
                    <tr>
                        <td>เรื่อง  ขอความอนุเคราะห์ให้นักศึกษาเข้ารับการฝึกงาน</td>
                    </tr>
                    <tr>
                        <td>เรียน  <span >บริษัท {{$data[0]->comName}}</span></td>
                    </tr>
                    <tr>
                        <td>สิ่งที่ส่งมาด้วย    แบบตอบรับนักศึกษาฝึกงาน  จำนวน 1 ชุด</td>
                    </tr>
                </table>
                
                
                    <p style="line-height: 15px;text-indent: 5em;">ด้วยคณะศิลปศาสตร์และวิทยาศาสตร์ มหาวิทยาลัยเอเชียอาคเนย์ ได้จัดให้มีรายวิชาการฝึกงาน ระดับปริญญาตรี&nbsp;ในหลักสูตรเทคโนโลยีบัณฑิต&nbsp;เพื่อให้นักศึกษาได้มีประสบการณ์ตรงใน&nbsp;การปฏิบัติงาน&nbsp;ณ&nbsp;สถานประกอบการจริง&nbsp;คณะศิลปศาสตร์และวิทยาศาสตร์&nbsp;ได้พิจารณาแล้วเห็น&nbsp;ว่าสถานประกอบการของท่าน&nbsp; ดำเนินกิจการด้วยความสำเร็จและเป็นที่รู้จักต่อสาธารณชน&nbsp;เห็นควรให้นักศึกษาได้เข้ารับการฝึกงานเกี่ยวกับการศึกษาขั้นตอนและลักษณะการดำเนินงาน&nbsp;เป็น&nbsp;แนวทางเสริมสร้างทักษะมนุษยสัมพันธ์&nbsp;และประสบการณ์ในการ ปฏิบัติงานร่วมกับผู้อื่นต่อไปใน อนาคต<br></p> 
                    <p><span style="padding-left: 1rem">ดังนั้น จึงขอความอนุเคราะห์ให้</span>  <span >{{$data[0]->fName}} {{$data[0]->lName}} </span>ระหว่างวันที่ <span >{{Carbon::parse($data[0]->start_intern)->thaidate('j F Y') }}</span>  ถึง   <span >{{Carbon::parse($data[0]->end_intern)->thaidate('j F Y') }}</span>  
                    (จำนวน 7 สัปดาห์)
                    ณ <span >บริษัท {{$data[0]->comName}}</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                    จึงเรียนมาเพื่อโปรดพิจารณา</p>
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
                            <td>(ผศ.ดร.ยอร์ช  เสมอมิตร)</td>
                        </tr>
                        <tr>
                            <td>คณบดีคณะศิลปศาสตร์และวิทยาศาสตร์</td>
                        </tr>
                    </table>
                </div>
                <br>
                <br>
                <div>
                    <table>
                        <tr>
                            <td>สำนักงานคณะศิลปศาสตร์และวิทยาศาสตร์<br>โทร. 0-2807-4500 - 27  ต่อ 337</td>
                        </tr>
                    </table>
                </div>
        </div>
</body>

</html>
