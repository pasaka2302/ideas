<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $info = [
            [
                'email'=>'demo@gmail.com',
                'pwd'=>'demo'
            ],
            [
                'email'=>'test@gmail.com',
                'pwd'=>'test'
            ]
        ];
        return view('profile',
    [
        'info'=>$info
    ]
    );
    }
}
