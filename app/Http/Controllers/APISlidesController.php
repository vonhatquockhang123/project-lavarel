<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slides;
use Illuminate\Http\Request;

class APISlidesController extends Controller
{
    public function danhSach(){
        $dsSides= Slides::all();

        return response()->json([
            'success'=>true,
            'data'=>$dsSides
        ]);
    } 
}
