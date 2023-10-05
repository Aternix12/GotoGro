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
        // Fetching all related transactions
        $transactions = $member->transactions;

        // Existing logic
        $genders = Gender::all();
        $memberStatuses = MemberStatus::all();
        $member->DateOfBirth = \Carbon\Carbon::parse($member->DateOfBirth);

        return view('members.show', compact('member', 'genders', 'memberStatuses', 'transactions'));
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

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        info('Search term is: ' . $searchTerm);
        $members = Member::where('FirstName', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('LastName', 'LIKE', '%' . $searchTerm . '%')
            ->get();
        info('Members found are: ' . $members);

        return response()->json($members);
    }
    
    // data validation rules work in progress
    public function rules(){
        
    
      return([              //allow for fancy anmes
            'FirstName' => ['required', 'regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 'max:32'],
            'LastName' => ['required', 'regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 'max:32'],
            // I belive this should ensure somthing has been entered for gender
            'Gender' => ['required'],
            // WIP more to come
            'Address' => 'required|string|max:32',
            'Phone' => 'required|string|max:32',
            'Email' => 'required|string|max:32',
        ]);
    }
}
