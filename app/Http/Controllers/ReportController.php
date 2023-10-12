<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;


class ReportController extends Controller
{
    public function index()
    {
       $memberCount = Member::count();
        return view('reports.index', compact('memberCount'));
    }
}
