<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Report;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function TeacherDashboard()
    {
        return view('teacher.teacher_dashboard');
    }
    //Detail Company
    public function TeacherDetailCompany($id){
        // dd($id);
        $data = Company::find($id);
        return view('teacher.teacher_company', compact('data')) ;
    }
    // ยกเลิกการฝึกงานกลางคัน (โดยอาจารย์)
    public function TeacherApiCancel(Request $request){
        $request->validate([
            'user_id' => 'required',
            'com_id' => 'required',
            'report_cal' => 'required',
        ]);

        $company = Company::find($request->com_id);
        $company->status = 'ยกเลิกการฝึกงานกลางคัน (โดยอาจารย์)';
        $company->cal_comment = $request->report_cal;
        $company->save();

        $user = User::find($request->user_id);
        $user->status = 'รอดำเนินการยื่นเรื่องฝึกงาน';
        $user->save();
        return  ;
    } // End Method
    // อนุมัติโดยอาจารย์
    public function TeacherApprove(Request $request)
    {

        $request->validate([
            'com_id' => 'required',
            'user_id' => 'required',
            'start_intern' => 'required',
            'end_intern' => 'required',
            'status' => 'required',
        ]);

        $idd = $request->com_id;
        $company = Company::find($idd);
        $company->status= $request->status;
        $company->start_intern= $request->start_intern;
        $company->end_intern= $request->end_intern;
        $company->save();

        $id = $request->user_id;
        $data = User::find($id);
        $data->company_intern = $request->com_id;
        $data->start_intern = $request->start_intern;
        $data->end_intern = $request->end_intern;
        $data->status = $request->status;
        $data->save();
        return ;


    } // End Method
    
    //  รับเอกสารสำเร็จ
    public function TeacherApisuccess($com_id,$user_id)
    {
        $company = Company::find($com_id);
        $company->status= 'รอฝึกงาน';
        $company->save();

        $User = User::find($user_id);
        $User->status= 'รอฝึกงาน';
        $User->save();
    } // End Method

    //  เรียกข้อมูลไปแสดงหน้า modal
    public function TeacherApiApprove($id,$ic)
    {
        $idUser = User::find($id);
        $data['users'] = User::where('users.id', $id)->leftJoin('companies', 'companies.id', '=', 'users.company_intern')
            ->select(
                'companies.id AS com_.id',//id company
                'companies.company AS com_company',//name company
                'users.id AS userId',// id user
                'users.start_intern AS user_start',// start intern
                'users.end_intern AS user_end'// end intern
            )
            ->get();
            // dd($data['user']);
        //     $idU = $data['users']->com_id;
        $data['company'] = Company::where('id',$ic)->select('id','company')->get();
        return response()->json($data);
    } // End Method

    // เรียกข้อมูลไปแสดง/teacher/data
    public function TeacherSelect(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'intern' => 'required'
        ]);
        $list = Company::join('users', 'users.id', '=', 'companies.stuIdCreate')
            ->Where('year', $request->year)
            ->where('semester', $request->intern)
            ->select(
                'users.fName',
                'users.id AS user_id',
                'users.lName',
                'users.photo',
                'users.company_intern',
                'companies.start_intern',
                'companies.end_intern',
                'companies.img',
                'companies.status',
                'companies.bossName',
                'companies.company',
                'companies.cal_comment',
                'companies.id AS com_id'
            )
            ->get();
        return view('teacher.teacher_dashboard', compact('list'));
    } //End Method


    public function TeacherReport()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $company = Report::where('auth_id', $id)->join('companies', 'reports.com_id', '=', 'companies.id')->get();
        return view('teacher.teacher_report_list', compact('company'));
    } //End Method

    public function TeacherChangePassword()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $profileData = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง
        return view('teacher.teacher_change_password', compact('profileData'));
    } //End Method

    public function TeacherUpdatePassword(Request $request)
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

    public function TeacherChangeProfile()
    {
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $profileData = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง
        return view('teacher.teacher_update_profile', compact('profileData')); //ส่งตัวแปร  $profileData ไปที่ compact ไปหน้า
    } //End Method

    public function TeacherUpdateProfile(Request $request)
    {
        // return request()->post();
        $id = Auth::user()->id; // user()-> เข้าถึงตาราง id ที่ถูกเก็บไว้เข้ามาตอนล็อกอิน
        $data = User::find($id); //ค้าหาข้อมูล user id ที่ได้เก็บไว้ในตัวแปรแล้วไปเรียกใช้ข้อมูลที่ต้องการแสดง

        $request->validate([
            // 'idStudent' => 'required|unique:users',
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

    public function TeacherLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } //End Method

    public function store(Request $request)
    {
        $request->validate([
            'idStudent' => 'required|unique:users|min:10',
            'fName' => 'required',
            'sex' => 'required',
            'lName' => 'required',
            'email' => 'required|unique:users',
            'major' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);
        $users = new User();
        $users->idStudent = $request->idStudent;
        $users->fName = $request->fName;
        $users->lName = $request->lName;
        $users->sex = $request->sex;
        $users->email = $request->email;
        $users->major = $request->major;
        $users->phone = $request->phone;
        $users->password = Hash::make($request->password);

        $users->save();

        if ($request->file('photo')) { // เช็คตัวแปร file('photo') ถ้ามีให้ทำเงือนไข ยังไม่ได้ลบรูปเดิม
            $file = $request->file('photo'); // file('photo') เก็บไว้ในตัวแปร
            @unlink(public_path('upload/' . $request->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName(); //เปลี่ยนชื่อ โดยใช้ วัน/เวลา เชื่อมชื่อไฟล์ป้องกันการใช้ชื่อซ้ำ
            // Storage::disk('public')->put('upload/'. $filename, $file);
            $file->move(public_path('upload/'), $filename); // ย้ายไฟล์ไปไว้ที่โฟล๋เดอร์ที่กำหนด
            $request['photo'] = $filename;
            $users->photo = $filename;
            $users->save();
        }

        $notification = array(
            'message' => 'สมัครเรียบร้อย',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    } //End Method

}
