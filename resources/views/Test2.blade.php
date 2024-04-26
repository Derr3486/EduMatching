<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMatching</title>
    <!-- <link href="{{ asset('css/test.css') }}" rel="stylesheet"> -->
</head>

<body>
    <main>
        <h2>Academic result page</h2>
        <form method="post" action="{{route('result1')}}">
            @csrf
            <h3>Select your latest academic achievement to share: </h3>
                <input type="radio" name="academic_achievement" value="SPM">
                <label for="SPM">SPM</label><br>

                <input type="radio" id="high_school" name="academic_achievement" value="STPM">
                <label for="STPM">STPM</label><br>

                <input type="radio" id="high_school" name="academic_achievement" value="A-LEVLES">
                <label for="A-LEVELS">A-LEVELS</label><br>

                <input type="radio" id="high_school" name="academic_achievement" value="MATRICULATION">
                <label for="MATRICULATION">MATRICULATION</label><br>

                <input type="radio" id="high_school" name="academic_achievement" value="FOUNDATION-LEAVERS">
                <label for="FOUNDATION-LEAVERS">FOUNDATION LEAVERS</label><br>

                <button type="submit">Submit</button>
        </form>
        <button style="margin: 10px;"><a href= "{{ route('test1') }}">Back to personality test</a></button>
    </main><!--end main-->
</body>
</html>
