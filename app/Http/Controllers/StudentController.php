<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use App\Models\Report;
use App\Models\Province;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use function Laravel\Prompts\select;

class StudentController extends Controller
{
    // public function StudentReportUpdate(Request $request, $id)
    // {
    //     $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
    //     $company = Report::where('auth_id', $id)->join('companies', 'reports.com_id', '=', 'companies.id')->get();
    //     return view('student.student_report_list', compact('company'));
    // }
    public function StudentReportUpdate(Request $request)
    {
       $data = Report::find($request->idUpdate);
       $data->report_comment = $request->report_comment;
       $data->report_from_date = $request->report_from_date;
       $data->report_to_date = $request->report_to_date;

       $data->update();
    return 'ff';
    } // End Method

    public function StudentViewReport($id)
    {
       $data = Report::where('id',$id)->get();
    return response()->json($data);
    } // End Method

    public function StudentReport()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $profileData = User::find($id);
        $company = Report::where('auth_id', $id)->join('companies', 'reports.com_id', '=', 'companies.id')
                                ->select('companies.*','reports.id AS idReport','reports.*')->get();
        return view('student.student_report_list', compact('company', 'profileData'));
    }
    public function StudentReportStore(Request $request)
    { //join table
        $user = Auth::user(); // ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $request->validate([
            'report_comment' => 'required',
            'report_from_date' => 'required',
            'report_to_date' => 'required',
            'i_amOk' => 'required',
        ]);

        $data = new Report;
        $data->auth_id = $user->id;
        $data->com_id = $user->company_intern;
        $data->report_comment = $request->report_comment;
        $data->report_from_date = $request->report_from_date;
        $data->report_to_date = $request->report_to_date;
        $data->i_amOk = $request->i_amOk;

        $data->save();

        $notification = array(
            'message' => 'ทำรายงานการฝึกงาน สำเร็จ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function StudentCancelCompany(Request $request)
    {
        // dd($request);
        $data = Company::find($request->id);
        $data->status = 'ยกเลิก (โดยนักศึกษา)';
        $data->cal_comment = 'ยกเลิก (โดยนักศึกษา)';
        $data->update();

        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $company = Company::where('stuIdCreate', $id)->get();
        return view('student.student_company_detail', compact('company'));
    } // End Method
    public function StudentCompanyUpadate(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'year' => 'required',
            'semester' => 'required',
            'company' => 'required', 'max:255',
            'bossName' => 'required', 'max:255',
            'positionName' => 'required', 'max:255',
            'telCompany' => 'required', 'max:255',
            'address' => 'required', 'max:255',
            'provinceCompany' => 'required', 'max:255',
            'amphoeCompany' => 'required', 'max:255',
            'tambonCompany' => 'required', 'max:255',
            'zipcodeCompany' => 'required', 'max:255',
        ]);
        $data = Company::find($id);
        $data->year = $request->year;
        $data->semester = $request->semester;
        $data->company = $request->company;
        $data->bossName = $request->bossName;
        $data->positionName = $request->positionName;
        $data->telCompany = $request->telCompany;
        $data->address = $request->address;
        $data->provinceCompany = $request->provinceCompany;
        $data->amphoeCompany = $request->amphoeCompany;
        $data->tambonCompany = $request->tambonCompany;
        $data->zipcodeCompany = $request->zipcodeCompany;

        if ($request->file('photo')) { // เช็คตัวแปร file('photo') ถ้ามีให้ทำเงือนไข ยังไม่ได้ลบรูปเดิม
            $file = $request->file('photo'); // file('photo') เก็บไว้ในตัวแปร
            @unlink(public_path('upload/' . $request->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName(); //เปลี่ยนชื่อ โดยใช้ วัน/เวลา เชื่อมชื่อไฟล์ป้องกันการใช้ชื่อซ้ำ
            $file->move(public_path('upload/'), $filename); // ย้ายไฟล์ไปไว้ที่โฟล๋เดอร์ที่กำหนด
            $request['photo'] = $filename;
            $data->img = $filename;
            $data->save();
        }

        $data->save();

        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $company = Company::where('stuIdCreate', $id)->get();
        return view('student.student_company_detail', compact('company'));
    } //End Method
    public function StudentCompanyDetailId($id)
    {
        $data = Company::find($id);
        $provinces = Province::select('province')->distinct()->get();
        return view('student.student_company_update', compact('data', 'provinces'));
    } //End Method
    public function StudentCompany()
    {
        $provinces = Province::select('province')->distinct()->get();
        // dd($provinces);
        return view('student.student_company', compact('provinces'));
    } //End Method
    public function StudentCompanyDetail()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $company = Company::where('stuIdCreate', $id)->get();
        return view('student.student_company_detail', compact('company'));
    } //End Method

    public function StudentCompanyStore(Request $request)
    {
        // dd($request);
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $request->validate([
            'year' => 'required',
            'semester' => 'required',
            'company' => 'required', 'max:255',
            'bossName' => 'required', 'max:255',
            'positionName' => 'required', 'max:255',
            'telCompany' => 'required', 'max:255',
            'address' => 'required', 'max:255',
            'provinceCompany' => 'required', 'max:255',
            'amphoeCompany' => 'required', 'max:255',
            'tambonCompany' => 'required', 'max:255',
            'zipcodeCompany' => 'required', 'max:255',
        ]);
        $user = User::find($id);
        $user->status = 'รออาจารย์อนุมัติ';
        $user->save();
        $company = new Company();
        $company->stuIdCreate = $id;
        $company->year = $request->year;
        $company->semester = $request->semester;
        $company->company = $request->company;
        $company->bossName = $request->bossName;
        $company->positionName = $request->positionName;
        $company->telCompany = $request->telCompany;
        $company->address = $request->address;
        $company->provinceCompany = $request->provinceCompany;
        $company->amphoeCompany = $request->amphoeCompany;
        $company->tambonCompany = $request->tambonCompany;
        $company->zipcodeCompany = $request->zipcodeCompany;

        if ($request->file('photo')) { // เช็คตัวแปร file('photo') ถ้ามีให้ทำเงือนไข ยังไม่ได้ลบรูปเดิม
            $file = $request->file('photo'); // file('photo') เก็บไว้ในตัวแปร
            @unlink(public_path('upload/' . $request->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName(); //เปลี่ยนชื่อ โดยใช้ วัน/เวลา เชื่อมชื่อไฟล์ป้องกันการใช้ชื่อซ้ำ
            $file->move(public_path('upload/'), $filename); // ย้ายไฟล์ไปไว้ที่โฟล๋เดอร์ที่กำหนด
            $request['photo'] = $filename;
            $company->img = $filename;
            $company->save();
        }

        $company->save();

        $notification = array(
            'message' => 'เพิ่มบริษัทเรียบร้อย',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    } //End Method

    public function StudentChangePassword()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $profileData = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง
        return view('student.student_change_password', compact('profileData'));
    } //End Method

    public function StudentUpdatePassword(Request $request)
    {
        //Request $request รับค่าที่ส่งมาจาก Method POST

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'รหัสผ่านเก่าไม่ถูกต้อง ล้มเหลว',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        // Update The New Password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'เปลี่ยนรหัสผ่าน สำเร็จ',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } //End Method

    public function StudentChangeProfile()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $profileData = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง
        return view('student.student_update_profile', compact('profileData')); //ส่งตัวแปร  $profileData ไปที่ compact ไปหน้า
    } //End Method

    public function StudentUpdateProfile(Request $request)
    {
        // return request()->post();
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $data = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง

        $request->validate([
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required',
            'major' => 'required',
            'phone' => 'required',
        ]);

        $data->fName = $request->fName;
        $data->lName = $request->lName;
        $data->email = $request->email;
        $data->major = $request->major;
        $data->phone = $request->phone;

        if ($request->file('photo')) { // เช็คตัวแปร file('photo') ถ้ามีให้ทำเงือนไข ยังไม่ได้ลบรูปเดิม
            $file = $request->file('photo'); // file('photo') เก็บไว้ในตัวแปร
            @unlink(public_path('upload/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName(); //เปลี่ยนชื่อ โดยใช้ วัน/เวลา เชื่อมชื่อไฟล์ป้องกันการใช้ชื่อซ้ำ
            $file->move(public_path('upload/'), $filename); // ย้ายไฟล์ไปไว้ที่โฟล๋เดอร์ที่กำหนด
            $data['photo'] = $filename;
        }
        $data->save(); // เมธอด Save = Excete
        $notification = array(
            'message' => 'อัพเดทโปรไฟล์ สำเร็จ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //End Method

    public function StudentLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } //End Method
}
