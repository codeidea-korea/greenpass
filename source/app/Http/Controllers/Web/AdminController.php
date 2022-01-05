<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function auth_comp_list(Request $request)
    {
        return view('admin.auth.comp.list');
    }
    public function auth_comp_detail(Request $request)
    {
        return view('admin.auth.comp.detail');
    }
    public function auth_comp_exceldownload(Request $request)
    {
        return view('admin.auth.comp.excel');
    }
    public function auth_visitor_list(Request $request)
    {
        return view('admin.auth.visitor.list');
    }
    public function auth_visitor_detail(Request $request)
    {
        return view('admin.auth.visitor.detail');
    }
    public function auth_visitor_exceldownload(Request $request)
    {
        return view('admin.auth.visitor.excel');
    }
    public function auth_auth_graph_index(Request $request)
    {
        return view('admin.auth_graph.index');
    }

    public function branch_list(Request $request)
    {
        return view('admin.branch.list');
    }
    public function branch_detail(Request $request)
    {
        return view('admin.branch.detail');
    }
    public function branch_modify(Request $request)
    {
        return view('admin.branch.modify');
    }
    public function branch_accept_list(Request $request)
    {
        return view('admin.branch.accept.list');
    }
    public function branch_accept_detail(Request $request)
    {
        return view('admin.branch.accept.detail');
    }
    
    public function buyer_list(Request $request)
    {
        return view('admin.buyer.list');
    }
    public function buyer_detail(Request $request)
    {
        return view('admin.buyer.detail');
    }
    public function buyer_add(Request $request)
    {
        return view('admin.buyer.add');
    }
    
    public function join_terms(Request $request)
    {
        return view('admin.join.terms');
    }
    public function join_regist(Request $request)
    {
        return view('admin.join.regist');
    }
    public function join_complete(Request $request)
    {
        return view('admin.join.complete');
    }
    
    public function login(Request $request)
    {
        return view('admin.login.index');
    }
    public function logout(Request $request)
    {
        return view('admin.login.logout');
    }
    public function find_password(Request $request)
    {
        return view('admin.login.find_password');
    }
    public function send_password(Request $request)
    {
        return view('admin.login.send_password');
    }
    
    public function terms_privacy(Request $request)
    {
        return view('admin.login.privacy');
    }
    public function terms_usage(Request $request)
    {
        return view('admin.login.usage');
    }
}
