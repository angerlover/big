<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 测试blade用法
 */
class TestBladeController extends Controller
{
    function testBlade()
    {
        return view('son');
    }

    function testAssign()
    {
        return view('test',['name'=>'nicky']);
    }
}
