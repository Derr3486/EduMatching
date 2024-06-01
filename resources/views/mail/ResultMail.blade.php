Hello {{ $userName }} from EduMatching,<br>
<br>
<h3>Below are you result. Thank you!</h3>

<h4>{{ $recommendations[0]->program->personality->Personality }}</h4>
<h5>{{ $recommendations[0]->program->personality->PersonalityDesc }}</h5>

<h4>Recommended Programs</h4>
<ul>
    @foreach($recommendations as $recommendation)
        <li>
            <h5>{{ $recommendation->program->ProgramName }}</h5>
            <h5>{{ $recommendation->program->ProgramDesc }}</h5>
        </li>
    @endforeach
</ul>

<br><br>
Best Regards,<br>
EduMatching

