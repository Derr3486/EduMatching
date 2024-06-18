<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\program;
use App\Models\personality;
use App\Models\program_match;

class ProgramController extends Controller
{
    public function AddProgram()
    {
        return view ('Admin.AddProgram');
    }

    public function StoreProgram(Request $request)
    {
        $request->validate([
            'ProgramName'=>'required',
            'ProgramDesc'=>'required',
            'PersonalityID'=>'required',
        ]);

        $data['ProgramName'] = $request->ProgramName;
        $data['ProgramDesc'] = $request->ProgramDesc;
        $data['PersonalityID'] = $request->PersonalityID;

        $newProgram = program::create($data);//saving it to DB

        return redirect()->route('AddProgram')->with('success', 'Program added successfully!');;
    }

    public function deleteProgram($programId)
{
    $program = Program::find($programId);
    
    if ($program) {
        $program->delete();
        return redirect()->route('AdminManagePrograms')->with('success', 'Program deleted successfully!');
    } else {
        return redirect()->route('AdminManagePrograms')->with('error', 'Program not found!');
    }
}
}
