
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body> 
    <nav class="navbar">
        <div class="logo">
            <a href="http://localhost/Portfolio/index.php">Mythryee</a>
        </div>
        <button class="nav-toggle" id="navToggle">&#9776;</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home">Home</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact Me</a></li>
        </ul>
    </nav>
    <script>
        document.getElementById('navToggle').addEventListener('click', function () {
            document.getElementById('navLinks').classList.toggle('active');
        });
    </script>
</body>
