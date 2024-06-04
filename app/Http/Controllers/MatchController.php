<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ResultMail;

use Illuminate\Http\Request;
use App\Models\program_match;
use App\Models\program;
use App\Models\feedback;
use App\Models\recommendation;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function p2()
    {
        return view ('next');
    }

    public function catch(Request $request)
    {
        // Retrieve the stored personality from the session
        $personality = $request->session()->get('personality');
        $subject = $request->input('Subject');

        // Retrieve the first 3 recommendations based on personality and subject
        $recommendations = program_match::where('Personality', $personality)
            ->where('Subject', $subject)
            ->take(3) // 3 recommendations
            ->get();

        // If recommendations found, proceed to fetch more details from the 'program' model
        if ($recommendations->isNotEmpty()) 
        {
            // array to store program details for each recommendation
            $programDetails = [];

            // Loop through each recommendation to fetch additional details from the 'program' model
            foreach ($recommendations as $recommendation) 
            {
                // Fetch program details based on the recommendation
                $programDetail = Program::where('ProgramName', $recommendation->Program)->first();

                if ($programDetail) // If program details are found
                {
                    // Add program details to the array
                    $programDetails[] = $programDetail;

                    if(Auth::check())
                    {
                        //Getting userID and programID
                        $UserID = auth()->user()->userID;
                        $programID = $programDetail->ProgramID;

                        //Add program detail into recommendations database
                        $data['userID'] = $UserID;
                        $data['ProgramID'] = $programID;

                        $newRecommendation = recommendation::create($data);//saving it to DB
                    }
                }
            }

            // Check if any program details are found
            if (!empty($programDetails)) 
            {
                // Store the selected personality and program details in the session
                // $request->session()->put('programDetails', $programDetails);
                // Pass the recommendations and program details to the view
                return view('recommendation', compact('programDetails'));
            }
        }else{
            $recommendations = program_match::where('Personality', $personality)
            ->get();

            $programDetails = [];

            foreach ($recommendations as $recommendation) 
            {
                // Fetch program details based on the recommendation
                $programDetail = Program::where('ProgramName', $recommendation->Program)->first();

                if ($programDetail) // If program details are found
                {
                    // Check if this ProgramID is already in the array
                    $programID = $programDetail->ProgramID;
                    $programIDs = array_column($programDetails, 'ProgramID');

                    if (!in_array($programID, $programIDs)) 
                    {
                        // Add program details to the array if not already present
                        $programDetails[] = $programDetail;

                        if(Auth::check())
                        {
                            // Getting userID and programID
                            $UserID = auth()->user()->userID;

                            // Add program detail into recommendations database
                            $data['userID'] = $UserID;
                            $data['ProgramID'] = $programID;

                            $newRecommendation = recommendation::create($data); // Saving it to DB
                        }
                    }

                    // if(Auth::check())
                    // {
                    //     //Getting userID and programID
                    //     $UserID = auth()->user()->userID;
                    //     $programID = $programDetail->ProgramID;

                    //     //Add program detail into recommendations database
                    //     $data['userID'] = $UserID;
                    //     $data['ProgramID'] = $programID;

                    //     $newRecommendation = recommendation::create($data);//saving it to DB
                    // }
                }
                if (count($programDetails) >= 3) {
                    break;
                }
            }
            return view('recommendation', compact('programDetails'));
        }

        //return redirect()->route('recommendation')->with('error', 'Recommendations not found or program details not available.');
    }

    public function recommendation()
    {
        return view ('recommendation');
    }

    public function AllProgram()
    {
        $Program = program::all(); // Retrieve all users from the database
        return view('AllProgram', ['Program' => $Program]); // Pass the retrieved data to the view
    }

    public function Feedback()
    {
        return view ('Feedback');
    }

    public function SaveFeedback(Request $request)
    {
        $request->validate([
            'Rating'=>'required',
            'FeedbackDetail'=>'required',
        ]);

        //retrieve userID
        $userID = Auth::id();

        $data['rating'] = $request->Rating;
        $data['Description'] = $request->FeedbackDetail;
        $data['userID'] = $userID;

        $newFeedback = feedback::create($data);//saving it to DB

        if(!$newFeedback)
        {
            //redirect back to index page showing the error
            return redirect(route('AllProgram'))->with("error","Unable to save Feedback");
        }
        //redirect to register sucess page
        return redirect(route('AllProgram'))->with("success", "Feedback saved. Thank you"); 
    }

    public function compare(Request $request)
    {
        $selectedProgramID = $request->input('selectedPrograms');

        // Retrieve the selected programs based on the IDs
        $selectedPrograms = Program::whereIn('ProgramID', $selectedProgramID)->get();

        // Pass the selected programs to the view
        return view('CompareProgram', compact('selectedPrograms'));
    }

    public function CompareProgram()
    {
        return view('CompareProgram');
    }

    public function sendMail(Request $request)
    {
        // Get the logged-in user's detail
        $userEmail = auth()->user()->email;
        $userName = auth()->user()->name;
        $userID = auth()->user()->userID;

        $recommendations = recommendation::where('userID', $userID)->get();

        // Send the email to the user
        Mail::to($userEmail)->send(new ResultMail($recommendations, $userName));

        //can add in to check if email sent or not
        return redirect(route('AllProgram'))->with("success", "Email Sent!"); 
    }

    ///////////////////////////////////////////////////////////////////////////////////

    public function create()
    {
        return view ('createMatch');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Personality'=>'required',
            'Subject'=>'required',
            'Program'=>'required',
        ]);

        $newMatch = program_match::create($data);
        return redirect(route('home'))->with('success', 'Created');
    }
}
