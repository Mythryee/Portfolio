<?php
    include('Components/navbar.php');
?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<section class="home" id="home">
    <div class="home-content">
        <h1>Hi, I'm <span>Lakshmi Mythryee Kuruguntla</span></h1>
        <h2>Full Stack Developer & Data Analyst</h2>
        <p>
            I build robust web solutions using HTML, CSS, JavaScript, PHP, MySQL & MongoDB, and extract insights from data using Excel, Python (NumPy, Matplotlib, Seaborn) & Power BI. I blend design, SEO, version control, and prompt engineering to deliver smart, user-driven experiences.
        </p>
        <div class="contact-info">
            <p>Email: <a href="mailto:kuruguntlalakshmimythryee@gmail.com">kuruguntlalakshmimythryee@gmail.com</a></p>
            <p>Phone: <a href="tel:+919177735342">+91 9177735342</a></p>
        </div>
    </div>
</section>


<section class="skills-section" id="skills">
    <h2 class="skills-title">Skills</h2>
    <div class="skills-grid">
        <div class="skill-card">
            <h3>HTML & CSS</h3>
            <p>Expert in crafting responsive, semantic layouts and visually rich user interfaces using modern HTML5 and advanced CSS3 techniques.</p>
        </div>
        <div class="skill-card">
            <h3>JavaScript</h3>
            <p>Building dynamic, interactive web features with clean, modular JavaScript and working knowledge of the DOM and event handling.</p>
        </div>
        <div class="skill-card">
            <h3>PHP & MySQL</h3>
            <p>Developing secure backend systems with PHP and managing structured data through efficient MySQL queries and relationships.</p>
        </div>
        <div class="skill-card">
            <h3>MongoDB</h3>
            <p>Leveraging NoSQL flexibility for scalable data modeling and working with JSON-like documents in modern web applications.</p>
        </div>
        <div class="skill-card">
            <h3>Python & Data Libraries</h3>
            <p>Performing data analysis and visualization using Python with libraries like NumPy, Matplotlib, and Seaborn for rich insight generation.</p>
        </div>
        <div class="skill-card">
            <h3>Excel & Power BI</h3>
            <p>Transforming complex data into interactive dashboards and analytics reports using Excel tools and Power BI visualizations.</p>
        </div>
        <div class="skill-card">
            <h3>Git & GitHub</h3>
            <p>Managing version control, collaborating on codebases, and maintaining clean commit histories for reliable project tracking.</p>
        </div>
        <div class="skill-card">
            <h3>SEO & Prompt Engineering</h3>
            <p>Improving search engine performance and crafting AI prompts for meaningful, optimized interactions in modern AI tools.</p>
        </div>
        <div class="skill-card">
            <h3>Figma</h3>
            <p>Designing user interfaces and interactive prototypes with attention to usability, accessibility, and user-centered principles.</p>
        </div>
    </div>
</section>

<section class="projects-section" id="projects">
    <h2 class="section-title">Projects</h2>
    <p class="project-description">
        Throughout my career, I have developed a wide array of full stack web applications and data-centric solutions that merge the best of frontend aesthetics and backend functionality with insightful data analysis. My projects include everything from sleek, responsive websites optimized for performance and accessibility to powerful REST APIs designed for scalability and security.
        <br><br>
        Leveraging technologies such as HTML5, CSS3, JavaScript, PHP, MySQL, and MongoDB, I create seamless user experiences that are both intuitive and engaging. On the data side, I harness Python libraries like NumPy, Matplotlib, and Seaborn, along with tools like Excel and Power BI, to transform raw data into actionable insights through interactive dashboards and visualizations.
        <br><br>
        Each project reflects a strong focus on best practices in software development including clean code architecture, version control with Git, and comprehensive testing. I strive to build solutions that not only meet client requirements but also anticipate future scalability and maintenance needs.
        <br><br>
        Visit my GitHub to explore the breadth of my work, complete with detailed documentation, meaningful commit histories, and collaborative coding efforts that highlight my commitment to professional growth and quality.
    </p>

    <div class="github-button">
        <a href="https://github.com/Mythryee" target="_blank" class="view-github">Visit My GitHub</a>
    </div>
</section>

<section class="contact-section" id="contact">
    <h2 class="contact-title">Contact Me</h2>
    <form class="contact-form" action="index.php" method="POST">
        <div class="form-group">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
        </div>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <textarea name="message" placeholder="Why are you contacting me?" required></textarea>
        <button type="submit" name="submit">Submit</button>
    </form>
</section>

<footer class="site-footer">
  <p>&copy; 2025 Lakshmi Mythryee. All Rights Reserved.</p>
</footer>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'portfolio';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('Cannot connect to the database');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (!preg_match("/^[a-zA-Z ]{2,}$/", $first) || !preg_match("/^[a-zA-Z ]{2,}$/", $last)) {
        echo '<script>alert("Please enter a valid name.");</script>';
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.");</script>';
        exit();
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo '<script>alert("Invalid phone number. Must be 10 digits.");</script>';
        exit();
    }

    if (strlen(trim($message)) < 10) {
        echo '<script>alert("Message must be at least 10 characters long.");</script>';
        exit();
    }

    $sql = "INSERT INTO clients (first_name, last_name, email, phone, message)
            VALUES ('$first', '$last', '$email', '$phone', '$message')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '22b01a4256@svecw.edu.in'; 
            $mail->Password   = 'jglcsnwlyfqccngm';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('22b01a4256@svecw.edu.in', 'Mythryee');
            $mail->addAddress($email, $first);

            $mail->Subject = 'Thanks for contacting me!';
            $mail->Body    = "Hi $first,\n\nThank you for reaching out. I will get back to you shortly.\n\nBest regards,\nMythryee";

            $mail->send();
            echo '<script>alert("Message sent! Thank you for contacting me."); window.location.href = "index.php";</script>';
        } catch (Exception $e) {
            echo "<script>alert('Message saved but email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo '<script>alert("Your message could not be submitted.");</script>';
    }
}
?>
