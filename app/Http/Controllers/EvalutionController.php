<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Evalution;

class EvalutionController extends Controller
{
    public function insertData(Request $request)
    {
        $data = '';
        foreach ($request->all() as $key => $value) {
            $data .= "'$key' => 'required',";
        }
        $data =  str_replace("'_token' => 'required',", "", $data);
        $data .= substr($data,24,-1);
        $data .= ']';

        $request->validate([$data]);
        $evalution = new Evalution();
        $evalution->companyName = $request->companyName;
        $evalution->fNameAssessor = $request->fNameAssessor;
        $evalution->position = $request->position;
        $evalution->phone = $request->phone;
        $evalution->fNameStudent = $request->fNameStudent;
        $evalution->idStudent = $request->idStudent;
        $evalution->A1 = $request->A1;
        $evalution->A2 = $request->A2;
        $evalution->A3 = $request->A3;
        $evalution->A4 = $request->A4;
        $evalution->B1 = $request->B1;
        $evalution->B2 = $request->B2;
        $evalution->B3 = $request->B3;
        $evalution->C1 = $request->C1;
        $evalution->C2 = $request->C2;
        $evalution->C3 = $request->C3;
        $evalution->D1 = $request->D1;
        $evalution->D2 = $request->D2;
        $evalution->D3 = $request->D3;
        $evalution->E1 = $request->E1;
        $evalution->E2 = $request->E2;
        $evalution->E3 = $request->E3;
        $evalution->F1 = $request->F1;
        $evalution->F2 = $request->F2;
        $evalution->F3 = $request->F3;
        $evalution->prominentPoint = $request->prominentPoint;
        $evalution->improve = $request->improve;
        $evalution->additionalComments = $request->additionalComments;
        $evalution->save();
        // Update
        User::where('idStudent', $request->idStudent)->update([
            'statusEv' => '1',
        ]);
        // ส่งข้อมูลกลับ select
        $data = User::select('idStudent')->distinct()->get();

        return redirect()->back()->with('check', 'Good');
    }
    public function index(){
        $data = User::select('idStudent')->WhereNull('statusEv')->get();
        // dd($data);
        return view('evalution.evalution', compact('data', 'data'));
    }
    public function idstudent(Request $request){
        $data = User::where('idStudent', $request->idStudent)->select('fName','lName')->distinct()->get();
        // dd($data);
        return  response()->json($data);
    }
}
