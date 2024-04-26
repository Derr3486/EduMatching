<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Program</title>
</head>

<body>
    <h3>Compare Programs</h3>

    <table border="1">
                <thead>
                    <tr>
                        <th>Program Name</th>
                        <th>Program Description</th>
                        <th>Personality</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($selectedPrograms as $program)
                        <tr>
                            <td>{{ $program->ProgramName }}</td>
                            <td>{{ $program->ProgramDesc }}</td>
                            <td>{{ $program->personality->Personality }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button onclick = "back()">Back to All Programs</button>

            <script>
                function back()
                {
                    window.location.href = "{{route('AllProgram')}}";
                }
            </script>
</body>