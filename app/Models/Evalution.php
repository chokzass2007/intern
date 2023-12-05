<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalution extends Model
{
    use HasFactory;
//     public function __construct(Evalution $evalution)
//     {
//         $this->evaluations = $evalution;
//     }
//     public function insertData($request)
//     {
//         $data = '';
//         foreach ($request->all() as $key => $value) {
//             $data .= "'$key' => 'required',";
//         }
//         $data .= substr($data,24,-1);
//         $data .= ']';
// // return dd($data);

//         $request->validate([$data]);
//         $this->E1 = $request->E1;
//        $this->E2 = $request->E2;
//        $this->E3 = $request->E3;
//        $this->save();
//     return dd($data,$request);
//     }
}
