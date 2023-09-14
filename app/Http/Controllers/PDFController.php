<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Report;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    //
    public function generatePDF($id)
    {

        $name = User::find($id);

        $data = User::where('users.id', $id)->join('companies', 'companies.id', '=', 'users.company_intern')
            ->select('*')
            ->selectRaw("REPLACE(company, 'บริษัท', ' ') AS comName")
            ->get();

        $pdf = PDF::loadView('pdf.view', ['data' => $data,]);
        $pdf->add_info('Title', $name->fName . ' ' . $name->lName . ' ' . $name->idStudent);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream($name->fName . ' ' . $name->lName . ' ' . $name->idStudent . '.pdf');
    }// End Method

    public function generatePDFNo2($id)
    {
        $path = base_path('public/assets/img/logo.png');
        $type = pathinfo($path,PATHINFO_EXTENSION);
        $dataimg = file_get_contents($path);
        $pic = 'data:assets/'. $type .' ;base64,' . base64_decode($dataimg);

        $name = User::find($id);

        $data = User::where('users.id', $id)->join('companies', 'companies.id', '=', 'users.company_intern')
            ->select('*')
            ->selectRaw("REPLACE(company, 'บริษัท', ' ') AS comName")
            ->get();


        $pdf = PDF::loadView('pdf.view2', ['data' => $data,'pic' => $pic,]);
        $pdf->add_info('Title', $name->fName . ' ' . $name->lName . ' ' . $name->idStudent);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream($name->fName . ' ' . $name->lName . ' ' . $name->idStudent . '.pdf');
    }// End Method

    public function generatePDFNo3($id)
    {

        $name = User::find($id);

        $data = User::where('users.id', $id)->join('companies', 'companies.id', '=', 'users.company_intern')
            ->select('*')
            ->selectRaw("REPLACE(company, 'บริษัท', ' ') AS comName")
            ->get();

        $pdf = PDF::loadView('pdf.view3', ['data' => $data,]);
        $pdf->add_info('Title', $name->fName . ' ' . $name->lName . ' ' . $name->idStudent);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream($name->fName . ' ' . $name->lName . ' ' . $name->idStudent . '.pdf');
    }// End Method
}
