<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StandardProductParameters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test()
    {
        Storage::delete('logo/Lerua.webp');
    }
}
