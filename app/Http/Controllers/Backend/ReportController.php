<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $reports = Report::latest('id')->get();
        return view('backend.reports.index',compact('reports'));
    }
    public function create(){

        return view('backend.reports.create');
    }
}
