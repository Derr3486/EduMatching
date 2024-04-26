Hello {{ $userName }} from EduMatching,<br>
<br>
This is a test mail.<br><br>

<h3>{{ $program[0]->personality->Personality }}</h3>
<h4>{{ $program[0]->personality->PersonalityDesc }}</h4>

<h4>Recommended Programs</h4>
<ul>
    @foreach($program as $recommendation)
        <li>
            <h5>{{ $recommendation->ProgramName }}</h5>
            <h5>{{ $recommendation->ProgramDesc }}</h5>
        </li>
    @endforeach
</ul>

<br><br>
Best Regards,<br>
EduMatching

