<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AuthByApproveBranchExport;
use App\Models\AuthByVisitorDataExport;
use App\Models\AuthGraphExport;

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
    
    public function branch_modify_2(Request $request)
    {
        return view('admin.branch.store.modify');
    }
    public function branch_visitor_list(Request $request)
    {
        return view('admin.branch.store.visitor.list');
    }
    public function branch_visitor_detail(Request $request)
    {
        return view('admin.branch.store.visitor.detail');
    }
    
    public function comp_excel_download(Request $request){
        AuthByApproveBranchExport::$startDt = $request->get('startDt');
        AuthByApproveBranchExport::$endDt = $request->get('endDt', '9999-12-31 23:59:59');
        AuthByApproveBranchExport::$branchName = $request->get('branchName');

        return Excel::download(new AuthByApproveBranchExport, 'auth_data_by_branch_name.xlsx');
    }
    public function visitor_excel_download(Request $request){
        AuthByVisitorDataExport::$startDt = $request->get('startDt');
        AuthByVisitorDataExport::$endDt = $request->get('endDt', '9999-12-31 23:59:59');
        AuthByVisitorDataExport::$visitorNo = $request->get('visitorNos');

        return Excel::download(new AuthByVisitorDataExport, 'auth_data_by_visitor_phone_number.xlsx');
    }
    public function user_history_excel_download(Request $request){
        AuthByVisitorDataExport::$startDt = $request->get('startDt');
        AuthByVisitorDataExport::$endDt = $request->get('endDt', '9999-12-31 23:59:59');
        AuthByVisitorDataExport::$visitorNo = $request->get('visitorNos');

        return Excel::download(new AuthByVisitorDataExport, 'auth_data_by_visitor_phone_number.xlsx');
    }
    public function graph_excel_download(Request $request){
        AuthGraphExport::$startDay = $request->get('startDay_');
        AuthGraphExport::$endDay = $request->get('endDay_', '9999-12-31 23:59:59');
        AuthGraphExport::$type = $request->get('type_');
        AuthGraphExport::$depth1 = $request->get('depth1_');
        AuthGraphExport::$depth2 = $request->get('depth2_');
        AuthGraphExport::$depth3 = $request->get('depth3_');
        AuthGraphExport::$each = $request->get('each_');

        return Excel::download(new AuthGraphExport, 'auth_graph_data.xlsx');
    }
}
