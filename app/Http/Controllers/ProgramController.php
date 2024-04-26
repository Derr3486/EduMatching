<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;
use App\Models\personality;
use App\Models\program_match;

class ProgramController extends Controller
{
    public function test2()
    {
        return view('Test2');
    }

    public function result1(Request $request)
    {
        $academic = $request->input('academic_achievement');

        // Redirect based on academic achievement
        switch ($academic) {
            case 'SPM':
                return view('Result2',['Academic' => $academic]);
            case 'STPM':
                return view('/#');
            case 'A-LEVELS':
                return view('/#');
            case 'MATRICULATION':
                return view('/#');
            case 'FOUNDATION LEAVERS':
                return view('/#');
        }
    }

    public function result2()
    {
        return view('Result2');
    }

    public function resultAnalyse(Request $request)
    {
        // Get the input values from the form
        $Academic = $request->input('Academic');
        $BM_result = $request->input('BM_result');
        $BI_result = $request->input('BI_result');
        $BC_result = $request->input('BC_result');

        dd($request->Academic);

        // Define the list of language subjects
        $languageSubjects = ['Bahasa Melayu', 'English', 'Bahasa Cina'];

        // Filter the results with values A-, A, and A+
        $filteredResults = [];
        foreach (compact('BM_result', 'BI_result', 'BC_result') as $subject => $result) 
        {
            if (in_array($result, ['A-', 'A', 'A+'])) 
            {
                $filteredResults[$subject] = $result;
            }
        }

        // Classify language subjects into a group
        $languageGroup = [];
        foreach ($languageSubjects as $subject) {
            if (isset($filteredResults[$subject])) {
                $languageGroup[$subject] = $filteredResults[$subject];
            }
        }

        // Return the filtered results and language group to the view
        return view('AcademicResult', compact('Academic','languageGroup'));
    }

    public function AcademicResult()
    {
        return view('AcademicResult');
    }
}
