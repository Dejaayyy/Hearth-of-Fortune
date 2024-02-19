<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="index.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Hearth of Fortune Lobby</title>
</head>

<body>
    <div id="lobby-container">
        <h1>Hearth Of Fortune</h1>
        <button onclick="toggleHowtoplay()">How to Play</button>
        <button onclick="rgphp()">Play</button>
        <button onclick="">Leaderboards</button>
        <button id="toggleMusic" onclick="toggleMusic()">🎵</button>
        <!-- Corrected audio element -->
        <audio id="backgroundMusic" loop>
            <source src="bgm music.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

    <div id="popup" class="modal">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="toggleHowtoplay()">&times;</div>
            <h1>How to Play?</h1>
            <p>You have Three (3) chances to guess letters,After all it is the matter of his life and he can be saved only by your correct answers.
            now there is IT version of hangaroo</p>
        </div>
    </div>

    

    <footer>
        <p> &copy; 2024. All Rights Reserved.</p>
        <p> Benito </p>
        <p> Briones </p>
        <p> Cruz </p>
        <p> Pinca </p>
        <p> Rivera </p>
    </footer>

    <script>
        function toggleHowtoplay() {
            document.getElementById("popup").classList.toggle("active");
        }
        
        function rgphp() {
            window.location.href = 'registration.php';
        }

        function toggleMusic() {
            var music = document.getElementById("backgroundMusic");
            var musicButton = document.getElementById("toggleMusic");
            
            if (music.paused) {
                music.play();
                musicButton.classList.remove("paused");
            } else {
                music.pause();
                musicButton.classList.add("paused");
            }
        }
    </script>

</body>
</html>