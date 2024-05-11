<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personality;
use App\Models\program;
use App\Models\recommendation;

use Illuminate\Support\Facades\Auth;

class PersonalityController extends Controller
{
    public function test1()
    {
        if(Auth::user())
        {
            // Get the logged-in user's ID
            $userID = auth()->user()->userID;

            // Get all recommendations for the logged-in user
            $recommendations = recommendation::where('userID', $userID)->get();

            // Initialize an array to store program details for each recommendation
            $programDetails = [];

            foreach ($recommendations as $recommendation) 
                {
                    // Fetch program details based on the recommendation
                    $programDetail = Program::where('ProgramID', $recommendation->ProgramID)->first();

                    if ($programDetail) // If program details are found
                    {
                        // Add program details to the array
                        $programDetails[] = $programDetail;
                    }
                }

            // Check if any program details are found
            if (!empty($programDetails)) 
            {
                // Pass the recommendations and program details to the view
                return view('recommendation', compact('programDetails'));
            } else {
            // direct to personality test page if no recommendations found
                return view('test1');
            }
        } else{
            return view('test1');
        }
    }


    public function analyse(Request $request)
    {
        $sectionScores = [];

        // Calculate scores for each section
        for ($i = 1; $i <= 6; $i++) {
            $sectionScore = 0;

            // Calculate total score for the section
            for ($j = 1; $j <= 5; $j++) {
                $answer = $request->input("section$i-q$j");

                // Validate input data
                if (!isset($answer) || !is_numeric($answer)) {
                    // Handle invalid input
                    return redirect()->back()->with('error', 'Invalid input data.');
                }

                // Sum up the answers for the section
                $sectionScore += intval($answer);
            }

            // Store section score
            $sectionScores["$i"] = $sectionScore;
        }

        // Find the section with the highest score
        $maxScoreSection = array_keys($sectionScores, max($sectionScores))[0];

        //$personality = personality::find($maxScoreSection);
        $personality = personality::where('PersonalityID', $maxScoreSection)->value('Personality');

        // Store the selected personality in the session
        $request->session()->put('personality', $personality);

        // Display result
        return view('result', ['personality' => $personality]);
    }
    
    public function result()
    {
        return view('Result');
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    public function home()
    {
        return view('home');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'Personality'=>'required',
        //     'PersonalityDesc'=>'required',
        // ]);
        // $newPersonality = personality::create($data);
        // return redirect(route('home'))->with('success', 'Created');
        
        $data = $request->validate([
            'ProgramName'=>'required',
            'ProgramDesc'=>'required',
            'PersonalityID'=>'required',
        ]);

        $newProgram = program::create($data);
        return redirect(route('home'))->with('success', 'Created');
    }
}
