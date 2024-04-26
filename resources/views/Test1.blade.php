<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/Logo.jpeg">
    <title>EduMatching</title>
    <link href="{{ asset('css/test1.css') }}" rel="stylesheet">
</head>

<body>
    <header>
      <h2 class="Logo">
        <img class="Logo-1" src="images/Logo.jpeg" width="60" height="60" alt="Logo">
        EduMatching</h2>
        <p>Hi, {{auth()->user()->name}}</p>
      <nav class="navigation">
        <a href="{{route('user.loggedin')}}">Home</a>
        <a href="{{route('test1')}}">Start Test</a>
        <a href="{{route('AllProgram')}}">Compare Courses</a>
        <a href="#">Contact</a>
        <form action="{{route('user.logout')}}" method="get">
            <button type="submit" class="btnLogin-popup">
                Logout
            </button>
        </form>
      </nav>
    </header>

    <main>
        <form id="sectionForm" action="{{ route('analyse') }}" method="POST">
            @csrf
            <!-- Section 1 questions -->
            <div class="section current-section" id="section1">
                <div class= "LeftSide"><h2>Section 1</h2></div>
                    <div class = "RightSide">
                        <div>I enjoy working with my hands to build or fix things.</div>
                        @include('Radio',['name' => 'section1-q1'])

                        <div>I like working outdoors and being physically active.</div>
                        @include('Radio',['name' => 'section1-q2'])

                        <div>I prefer practical, hands-on tasks over theoretical or abstract concepts.</div>
                        @include('Radio',['name' => 'section1-q3'])

                        <div>I like working with tools, machinery, or equipment.</div>
                        @include('Radio',['name' => 'section1-q4'])

                        <div> I enjoy outdoor activities such as gardening, hiking, or camping.</div>
                        @include('Radio',['name' => 'section1-q5'])

                    <button type="button" onclick="nextSection('section2')">Next</button>
                </div><!--End Right Side-->
            </div>

            <!-- Section 2 questions -->
            <div class="section" id="section2">
                <div class= "LeftSide"><h2>Section 2</h2></div>
                    <div class = "RightSide">
                        <div>I am curious and enjoy solving puzzles or problems.</div>
                        @include('Radio',['name' => 'section2-q1'])

                        <div>I am naturally curious and enjoy exploring new ideas.</div>
                        @include('Radio',['name' => 'section2-q2'])

                        <div>I enjoy conducting experiments and discovering new information.</div>
                        @include('Radio',['name' => 'section2-q3'])

                        <div>I am naturally curious about how things work and enjoy learning new concepts.</div>
                        @include('Radio',['name' => 'section2-q4'])

                        <div>I am fascinated by scientific discoveries and enjoy learning about new developments.</div>
                        @include('Radio',['name' => 'section2-q5'])

                    <button type="button" onclick="prevSection('section1')">Previous</button>
                    <button type="button" onclick="nextSection('section3')">Next</button>
                </div>
            </div>

            <!-- Section 3 questions -->
            <div class="section" id="section3">
                <div class= "LeftSide"><h2>Section 3</h2></div>
                    <div class = "RightSide">
                        <div>I love expressing myself through art, music, or writing.</div>
                        @include('Radio',['name' => 'section3-q1'])

                        <div>I have a talent for creating or designing things.</div>
                        @include('Radio',['name' => 'section3-q2'])

                        <div>I have a passion for expressing myself creatively.</div>
                        @include('Radio',['name' => 'section3-q3'])

                        <div>I am drawn to activities that allow me to express my artistic abilities.</div>
                        @include('Radio',['name' => 'section3-q4'])

                        <div>I enjoy expressing myself through writing, storytelling, or other forms of communication.</div>
                        @include('Radio',['name' => 'section3-q5'])

                        <button type="button" onclick="prevSection('section2')">Previous</button>
                        <button type="button" onclick="nextSection('section4')">Next</button>
                    </div>
            </div>

            <!-- Section 4 questions -->
            <div class="section" id="section4">
                <div class= "LeftSide"><h2>Section 4</h2></div>
                    <div class = "RightSide">
                        <div>I find satisfaction in helping others and making a difference.</div>
                        @include('Radio',['name' => 'section4-q1'])

                        <div>I am good at understanding and empathizing with others.</div>
                        @include('Radio',['name' => 'section4-q2'])

                        <div>I feel fulfilled when I can help others in need.</div>
                        @include('Radio',['name' => 'section4-q3'])

                        <div>I value relationships and enjoy spending time with friends and family.</div>
                        @include('Radio',['name' => 'section4-q4'])

                        <div>I feel fulfilled when I can contribute to the well-being of my community.</div>
                        @include('Radio',['name' => 'section4-q5'])

                        <button type="button" onclick="prevSection('section3')">Previous</button>
                        <button type="button" onclick="nextSection('section5')">Next</button>
                    </div>
            </div>

            <!-- Section 5 questions -->
            <div class="section" id="section5">
                <div class= "LeftSide"><h2>Section 5</h2></div>
                    <div class = "RightSide">
                        <div>I enjoy taking on leadership roles and pursuing new opportunities.</div>
                        @include('Radio',['name' => 'section5-q1'])

                        <div>I am ambitious and enjoy setting and achieving goals.</div>
                        @include('Radio',['name' => 'section5-q2'])

                        <div>I enjoy leading teams and projects to success.</div>
                        @include('Radio',['name' => 'section5-q3'])

                        <div>I am driven by the desire to achieve success and recognition.</div>
                        @include('Radio',['name' => 'section5-q4'])

                        <div>I am comfortable taking risks and making decisions in uncertain situations.</div>
                        @include('Radio',['name' => 'section5-q5'])

                        <button type="button" onclick="prevSection('section4')">Previous</button>
                        <button type="button" onclick="nextSection('section6')">Next</button>
                    </div>
            </div>

            <!-- Section 6 questions -->
            <div class="section" id="section6">
                <div class= "LeftSide"><h2>Section 6</h2></div>
                    <div class = "RightSide">
                        <div>I prefer working with numbers or data in a structured environment.</div>
                        @include('Radio',['name' => 'section6-q1'])

                        <div>I am organized and detail-oriented.</div>
                        @include('Radio',['name' => 'section6-q2'])

                        <div>I feel comfortable working with numbers and analyzing data.</div>
                        @include('Radio',['name' => 'section6-q3'])

                        <div>I prefer structured environments with clear rules and procedures.</div>
                        @include('Radio',['name' => 'section6-q4'])

                        <div>I am skilled at using technology and working with computers.</div>
                        @include('Radio',['name' => 'section6-q5'])

                        <button type="button" onclick="prevSection('section5')">Previous</button>
                        <button type="button" onclick="submitForm()">Submit</button>
                    </div>
            </div>
        </form>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', () => 
        {
            const headerHeight = document.querySelector('header').offsetHeight;
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => 
            {
                section.style.marginTop = `${headerHeight}px`;
            });
        });

        function nextSection(nextSectionId) 
        {
            // Check if all groups of radio buttons in the current section have one option checked
            const currentSection = document.querySelector('.current-section');
            const groups = currentSection.querySelectorAll('.RightSide [type="radio"]');
            let allGroupsChecked = true;

            groups.forEach(group => {
                const groupName = group.getAttribute('name');
                const radioButtonsInGroup = currentSection.querySelectorAll(`[name="${groupName}"]`);
                let checkedCount = 0;

                radioButtonsInGroup.forEach(radioButton => {
                    if (radioButton.checked) {
                        checkedCount++;
                    }
                });

                if (checkedCount !== 1) {
                    allGroupsChecked = false;
                }
            });

            // If all groups have one option checked, proceed to the next section
            if (allGroupsChecked) {
                // Hide current section
                currentSection.classList.remove('current-section');
                // Show next section
                document.getElementById(nextSectionId).classList.add('current-section');
                // Adjust top margin of the next section
                const headerHeight = document.querySelector('header').offsetHeight;
                document.getElementById(nextSectionId).style.marginTop = `${headerHeight}px`;
            } else {
                alert("Please select exactly one answer for each question before proceeding.");
            }
        }

        function prevSection(prevSectionId) 
        {
            // Hide current section
            document.querySelector('.current-section').classList.remove('current-section');
            // Show previous section
            document.getElementById(prevSectionId).classList.add('current-section');
            // Adjust top margin of the previous section
            const headerHeight = document.querySelector('header').offsetHeight;
            document.getElementById(prevSectionId).style.marginTop = `${headerHeight}px`;
        }

        function submitForm() 
        {
            // Submit the form
            document.getElementById('sectionForm').submit();
        }
    </script>
</body>
</html>