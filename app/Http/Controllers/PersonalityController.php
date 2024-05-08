<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personality;
use App\Models\program;

class PersonalityController extends Controller
{
    public function test1()
    {
        return view('Test1');
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
