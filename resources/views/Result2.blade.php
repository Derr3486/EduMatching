<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personality Test Result</title>
</head>

<body>
    <h2>You have selected: {{$Academic}}</h2>
    <h4>Kindly share your {{$Academic}} result with us!</h4>

    <form action= "{{route('resultAnalyse')}}" methos="post">
        @csrf
        <input type="hidden" name="Academic" value="{{$Academic}}">

        <label>Bahasa Melayu</label>
        @include('DropDown',['name'=>'BM_result'])<br>

        <label>English</label>
        @include('DropDown',['name'=>'BI_result'])<br>

        <label>History</label>
        @include('DropDown',['name'=>'History_result'])<br>

        <label>Mathematics</label>
        @include('DropDown',['name'=>'Math_result'])<br> 

        <label>Moral</label>
        @include('DropDown',['name'=>'Moral_result'])<br> 

        <label>Additional Mathematics</label>
        @include('DropDown',['name'=>'AddMath_result'])<br> 

        <label>Physics</label>
        @include('DropDown',['name'=>'Phy_result'])<br> 

        <label>Biology</label>
        @include('DropDown',['name'=>'Bio_result'])<br> 

        <label>Chemistry</label>
        @include('DropDown',['name'=>'Chem_result'])<br> 

        <label>Bahasa Cina</label>
        @include('DropDown',['name'=>'BC_result'])<br> 

        <br><button type="submit">Submit</button>
    </form>

</body>