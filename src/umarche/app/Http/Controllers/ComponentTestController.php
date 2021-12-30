<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentTestController extends Controller
{
    public function showCompornent1()
    {
        $message = 'メッセージ';
        return view('tests.compornent-test1',
        compact('message'));
    }
    public function showCompornent2()
    {
        return view('tests.compornent-test2');
    }
}
