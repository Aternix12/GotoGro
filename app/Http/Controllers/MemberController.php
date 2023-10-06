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
            'memberStatuses' => ['required'],
            'DateOfBirth' => ['required'],
            'Gender' => ['required'],
            // https://addressfinder.com.au/faq/can-you-provide-a-list-of-street-types-au/
            // adress is a bit more complex lol
            'Address' => 'required', 'regex:^\d{1,4} [\w-]{1,50}|Access|Alley|Amble|Approach|Arcade|Avenue|Banan|Bank|Bay|Beach|Bend|Boardwalk|Boulevard|Boulevarde|Bowl|Brace|Brae|Break|Bridge|Broadwalk|Broadway|Brow|Busway|Bypass|Causeway|Centre|Centreway|Chase|Circle|Circlet|Circuit|Circus|Close|Cluster|Colonnade|Common|Commons|Concord|Concourse|Connection|Copse|Corner|Corso|Course|Court|Courtyard|Cove|Crescent|Crest|Crief|Cross|Crossing|Cruiseway|Cul-De-Sac|Cut|Cutting|Dale|Dash|Dell|Dene|Deviation|Dip|Distributor|Divide|Dock|Domain|Down|Downs|Drive|Driveway|Easement|East|Edge|Elbow|End|Entrance|Esplanade|Estate|Expressway|Extension|Fairway|Fire Track|Fireline|Firetrack|Firetrail|Flat|Follow|Ford|Foreshore|Fork|Freeway|Front|Frontage|Gap|Garden|Gardens|Gate|Gateway|Glade|Glen|Grange|Green|Grove|Gully|Harbour|Haven|Heath|Heights|Highway|Hill|Hollow|Hub|Island|Junction|Key|Keys|Landing|Lane|Laneway|Line|Link|Linkway|Lookout|Loop|Lynne|Mall|Manor|Mart|Mead|Meander|Mew|Mews|Motorway|Nook|North|Null|Outlet|Outlook|Parade|Park|Parkway|Part|Pass|Passage|Path|Pathway|Place|Plaza|Pocket|Point|Port|Precinct|Promenade|Pursuit|Quad|Quadrant|Quay|Quays|Ramble|Ramp|Range|Reach|Reef|Reserve|Rest|Retreat|Return|Ride|Ridge|Right Of Way|Ring|Rise|Rising|River|Road|Roads|Roadway|Round|Route|Row|Run|Service Way|Serviceway|Slope|Spur|Square|Steps|Straight|Strait|Strand|Street|Strip|Subway|Tarn|Terrace|Throughway|Top|Tor|Track|Trail|Tramway|Triangle|Trunkway|Turn|Twist|Vale|Valley|Verge|View|Views|Villa|Village|Villas|Vista|Wade|Walk|Walkway|Waters|Waterway|Way|West|Wharf|Woods|Wynd'
            ,'max:64',
            // https://www.regexlib.com/Search.aspx?k=australian+phone&c=-1&m=-1&ps=20
            'Phone' => 'required','regex: (^1300\d{6}$)|(^1800|1900|1902\d{6}$)|(^0[2|3|7|8]{1}[0-9]{8}$)|(^13\d{4}$)|(^04\d{2,3}\d{6}$)',
            'Email' => 'required|string|max:32'
        ]);
    }
}
