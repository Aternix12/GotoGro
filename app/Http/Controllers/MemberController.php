<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Gender;
use App\Models\MemberStatus;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $genders = Gender::all();
        $memberStatuses = MemberStatus::all();
        return view('members.create', compact('genders', 'memberStatuses'));
    }

    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.index');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $genders = Gender::all();
        $memberStatuses = MemberStatus::all();
        return view('members.edit', compact('member', 'genders', 'memberStatuses'));
    }

    public function update(Request $request, Member $member)
    {
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }
}
