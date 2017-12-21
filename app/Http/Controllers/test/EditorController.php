<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 测试 在线编辑器
 */
class EditorController extends Controller
{
    public function index()
    {
        return view('test.editor');
    }
}
