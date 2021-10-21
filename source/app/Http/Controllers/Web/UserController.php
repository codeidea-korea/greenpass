<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function intro(Request $request)
    {
        return view('user.intro');
    }
    public function index(Request $request)
    {
        return view('user.index');
    }
    public function login(Request $request)
    {
        return view('user.login');
    }
    public function register_certify(Request $request)
    {
        return view('user.register_certify');
    }
    public function register_certify2(Request $request)
    {
        return view('user.register_certify2');
    }
    public function link(Request $request)
    {
        return view('user.link');
    }
}
