<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Gender;
use App\Models\MemberStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        $addressRegex = '/^(?!\d+\s*$)[\d\w\s-]+(?:\s+(?:Access|Access|Alley|Amble|Approach|Arcade|Avenue|Banan|Bank|Bay|Beach|Bend|Boardwalk|Boulevard|Boulevarde|Bowl|Brace|Brae|Break|Bridge|Broadwalk|Broadway|Brow|Busway|Bypass|Causeway|Centre|Centreway|Chase|Circle|Circlet|Circuit|Circus|Close|Cluster|Colonnade|Common|Commons|Concord|Concourse|Connection|Copse|Corner|Corso|Course|Court|Courtyard|Cove|Crescent|Crest|Crief|Cross|Crossing|Cruiseway|Cul-De-Sac|Cut|Cutting|Dale|Dash|Dell|Dene|Deviation|Dip|Distributor|Divide|Dock|Domain|Down|Downs|Drive|Driveway|Easement|East|Edge|Elbow|End|Entrance|Esplanade|Estate|Expressway|Extension|Fairway|Fire Track|Fireline|Firetrack|Firetrail|Flat|Follow|Ford|Foreshore|Fork|Freeway|Front|Frontage|Gap|Garden|Gardens|Gate|Gateway|Glade|Glen|Grange|Green|Grove|Gully|Harbour|Haven|Heath|Heights|Highway|Hill|Hollow|Hub|Island|Junction|Key|Keys|Landing|Lane|Laneway|Line|Link|Linkway|Lookout|Loop|Lynne|Mall|Manor|Mart|Mead|Meander|Mew|Mews|Motorway|Nook|North|Null|Outlet|Outlook|Parade|Park|Parkway|Part|Pass|Passage|Path|Pathway|Place|Plaza|Pocket|Point|Port|Precinct|Promenade|Pursuit|Quad|Quadrant|Quay|Quays|Ramble|Ramp|Range|Reach|Reef|Reserve|Rest|Retreat|Return|Ride|Ridge|Right Of Way|Ring|Rise|Rising|River|Road|Roads|Roadway|Round|Route|Row|Run|Service Way|Serviceway|Slope|Spur|Square|Steps|Straight|Strait|Strand|Street|Strip|Subway|Tarn|Terrace|Throughway|Top|Tor|Track|Trail|Tramway|Triangle|Trunkway|Turn|Twist|Vale|Valley|Verge|View|Views|Villa|Village|Villas|Vista|Wade|Walk|Walkway|Waters|Waterway|Way|West|Wharf|Woods|Wynd))$/';
        $firstNameRegex = "/^[a-z ,.'-]+$/i";
        $lastNameRegex = "/^[a-z ,.'-]+$/i";
        // https://stackoverflow.com/questions/39990179/regex-for-australian-phone-number-validation
        $phoneNumberRegex = "/^04\d{8}/";
        $communism = "/\.com$/";
        $rules = [
            'FirstName' => ['required', 'regex:' . $firstNameRegex],
            'LastName' => ['required', 'regex:' . $lastNameRegex],
          //is already prefilled as such no validation  'MemberStatusID' => ['required'],
            'DateOfBirth' => ['required'],
            'GenderID' => ['required'],
            'Address' => ['required', 'regex:' . $addressRegex],
            'Phone' => ['required', 'regex:' . $phoneNumberRegex],
            'Email' => ['required','email','max:320', 'regex:'.$communism]
        ];

        $messages = [
            'FirstName.regex' => "Please only enter a name consisting of alphabetical characters.",
            'LastName.regex' => "Please only enter a name consisting of alphabetical characters.",
            'Phone.regex' => "Please enter a valid Australian phone number in the format of 04xxxxxxxx.",
            'Address.regex' => "Address must consist of a number, street name, and street sufix starting with a capital letter ie: '9 Niner Street' ",
            'Email.email' => "Enter a vaild email you fool. It needs to end with '.com'.",
            'Email.regex' => "Your email needs to end in '.com'.",
         //   'DateOfBirth.required' => "Enter your date of birth."
        ];

        $validateData = $request->validate($rules, $messages);


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
        $addressRegex = '/^(?!\d+\s*$)[\d\w\s-]+(?:\s+(?:Access|Access|Alley|Amble|Approach|Arcade|Avenue|Banan|Bank|Bay|Beach|Bend|Boardwalk|Boulevard|Boulevarde|Bowl|Brace|Brae|Break|Bridge|Broadwalk|Broadway|Brow|Busway|Bypass|Causeway|Centre|Centreway|Chase|Circle|Circlet|Circuit|Circus|Close|Cluster|Colonnade|Common|Commons|Concord|Concourse|Connection|Copse|Corner|Corso|Course|Court|Courtyard|Cove|Crescent|Crest|Crief|Cross|Crossing|Cruiseway|Cul-De-Sac|Cut|Cutting|Dale|Dash|Dell|Dene|Deviation|Dip|Distributor|Divide|Dock|Domain|Down|Downs|Drive|Driveway|Easement|East|Edge|Elbow|End|Entrance|Esplanade|Estate|Expressway|Extension|Fairway|Fire Track|Fireline|Firetrack|Firetrail|Flat|Follow|Ford|Foreshore|Fork|Freeway|Front|Frontage|Gap|Garden|Gardens|Gate|Gateway|Glade|Glen|Grange|Green|Grove|Gully|Harbour|Haven|Heath|Heights|Highway|Hill|Hollow|Hub|Island|Junction|Key|Keys|Landing|Lane|Laneway|Line|Link|Linkway|Lookout|Loop|Lynne|Mall|Manor|Mart|Mead|Meander|Mew|Mews|Motorway|Nook|North|Null|Outlet|Outlook|Parade|Park|Parkway|Part|Pass|Passage|Path|Pathway|Place|Plaza|Pocket|Point|Port|Precinct|Promenade|Pursuit|Quad|Quadrant|Quay|Quays|Ramble|Ramp|Range|Reach|Reef|Reserve|Rest|Retreat|Return|Ride|Ridge|Right Of Way|Ring|Rise|Rising|River|Road|Roads|Roadway|Round|Route|Row|Run|Service Way|Serviceway|Slope|Spur|Square|Steps|Straight|Strait|Strand|Street|Strip|Subway|Tarn|Terrace|Throughway|Top|Tor|Track|Trail|Tramway|Triangle|Trunkway|Turn|Twist|Vale|Valley|Verge|View|Views|Villa|Village|Villas|Vista|Wade|Walk|Walkway|Waters|Waterway|Way|West|Wharf|Woods|Wynd))$/';
        $firstNameRegex = "/^[a-z ,.'-]+$/i";
        $lastNameRegex = "/^[a-z ,.'-]+$/i";
        // https://stackoverflow.com/questions/39990179/regex-for-australian-phone-number-validation
        $phoneNumberRegex = "/^04\d{8}/";
        $communism = "/\.com$/";
        $rules = [
            'FirstName' => ['required', 'regex:' . $firstNameRegex],
            'LastName' => ['required', 'regex:' . $lastNameRegex],
          //is already prefilled as such no validation  'MemberStatusID' => ['required'],
            'DateOfBirth' => ['required'],
            'GenderID' => ['required'],
            'Address' => ['required', 'regex:' . $addressRegex],
            'Phone' => ['required', 'regex:' . $phoneNumberRegex],
            'Email' => ['required','email','max:320', 'regex:'.$communism]
        ];

        $messages = [
            'FirstName.regex' => "Please only enter a name consisting of alphabetical characters.",
            'LastName.regex' => "Please only enter a name consisting of alphabetical characters.",
            'Phone.regex' => "Please enter a valid Australian phone number in the format of 04xxxxxxxx.",
            'Address.regex' => "Address must consist of a number, street name, and street sufix starting with a capital letter ie: '9 Niner Street' ",
            'Email.email' => "Enter a vaild email you fool. It needs to end with '.com'.",
            'Email.regex' => "Your email needs to end in '.com'.",
         //   'DateOfBirth.required' => "Enter your date of birth."
        ];

        $validateData = $request->validate($rules, $messages);
        $member->update($request->all());
        return redirect()->route('members.index');
        // return response()->json(['message'=> 'Member updated successfully']);
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

}