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
    
    public function sns_google(Request $request)
    {
        return view('user.google');
    }
    public function sns_apple(Request $request)
    {
        return view('user.apple');
    }
    public function sns_kakao(Request $request)
    {
        return view('user.kakao');
    }
    public function sns_naver(Request $request)
    {
        return view('user.naver');
    }
    public function sns_zalo(Request $request)
    {
        return view('user.zalo');
    }
    public function sns_facebook(Request $request)
    {
        return view('user.facebook');
    }
    
    
    public function sns_cookie_check(Request $request)
    {
        return view('user.cookie-check');
    }

    public function privacy(Request $request)
    {
        return view('user.privacy');
    }
    public function usage(Request $request)
    {
        return view('user.usage');
    }
    
    public function mypage(Request $request)
    {
        return view('user.mypage');
    }
}
