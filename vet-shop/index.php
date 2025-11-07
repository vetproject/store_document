<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | My Website</title>
    <style>
        /* ===== Reset & Base ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            transition: background 0.3s, color 0.3s;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            --bg: linear-gradient(135deg, #231e29ff, #141516ff);
            --text: #fff;
            --card-bg: rgba(255, 255, 255, 0.1);
            --btn-bg: #ffeaa7;
            --btn-text: #2d3436;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        body.light {
            --bg: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            --text: #2d3436;
            --card-bg: rgba(0, 0, 0, 0.05);
            --btn-bg: #2d3436;
            --btn-text: #fff;
        }

        section {
            padding: 80px 20px;
            text-align: center;
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease;
        }

        section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== Header ===== */
        header {
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            animation: slideDown 1s ease forwards;
        }

        header h1 {
            font-size: 1.7rem;
            font-weight: 600;
        }

        nav a {
            color: var(--text);
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
            position: relative;
            transition: color 0.3s;
        }

        nav a::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--btn-bg);
            transition: width 0.3s;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* ===== Toggle Button ===== */
        .toggle-theme {
            background: var(--btn-bg);
            color: var(--btn-text);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .toggle-theme:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px var(--btn-bg);
        }

        /* ===== Hero Section ===== */
        .hero {
            min-height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 100px 20px;
        }

        .hero h2 {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .typing {
            border-right: 3px solid var(--btn-bg);
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 4s steps(30, end) forwards, blink 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 650px;
            opacity: 0.9;
            margin: 20px 0 40px;
        }

        .btn {
            background: var(--btn-bg);
            color: var(--btn-text);
            padding: 14px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 0 15px rgba(255, 234, 167, 0.5);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px var(--btn-bg);
        }

        /* ===== Reused Sections ===== */
        .about,
        .projects,
        .contact {
            background: var(--card-bg);
            backdrop-filter: blur(5px);
        }

        .about h3,
        .projects h3,
        .contact h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ===== Projects ===== */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            padding: 0 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .card {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 25px;
            transition: 0.3s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        .card h4 {
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .card p {
            font-size: 1rem;
            opacity: 0.8;
        }

        /* ===== Contact ===== */
        form {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input,
        textarea {
            padding: 12px 15px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: var(--text);
            transition: box-shadow 0.3s;
        }

        input:focus,
        textarea:focus {
            box-shadow: 0 0 10px var(--btn-bg);
        }

        textarea {
            min-height: 100px;
            resize: none;
        }

        form button {
            background: var(--btn-bg);
            color: var(--btn-text);
            border: none;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.3s;
        }

        form button:hover {
            box-shadow: 0 0 20px var(--btn-bg);
        }

        /* ===== Footer ===== */
        footer {
            background: rgba(0, 0, 0, 0.25);
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
        }

        /* ===== Animations ===== */
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            nav {
                margin-top: 10px;
            }

            .hero h2 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>My Website</h1>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
        <button class="toggle-theme" title="Toggle Theme">🌙</button>
    </header>

    <section class="hero" id="home">
        <h2><span class="typing">Welcome to My Homepage</span></h2>
        <p>Explore my creative world — from design to development, ideas, and passion for building digital experiences.</p>
        <a href="#about" class="btn">Learn More</a>
    </section>

    <section class="about" id="about">
        <h3>About Me</h3>
        <p>
            I’m a passionate web developer who loves crafting beautiful and functional websites.
            My focus is on clean design, responsive layouts, and user-friendly interfaces.
        </p>
    </section>

    <section class="projects" id="projects">
        <h3>My Projects</h3>
        <div class="project-grid">
            <div class="card">
                <h4>Portfolio Website</h4>
                <p>A personal portfolio showcasing my work and skills using HTML, CSS, and JavaScript.</p>
            </div>
            <div class="card">
                <h4>Inventory Dashboard</h4>
                <p>Real-time PHP-based dashboard with filtering, chart analytics, and export features.</p>
            </div>
            <div class="card">
                <h4>Music Player App</h4>
                <p>Android app that streams songs from a server with full playback control and sleek UI.</p>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h3>Contact Me</h3>
        <form onsubmit="event.preventDefault(); alert('Message Sent!');">
            <input type="text" placeholder="Your Name" required />
            <input type="email" placeholder="Your Email" required />
            <textarea placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <footer>
        © 2025 My Website | Designed with ❤️ by Me
    </footer>

    <script>
        // Fade-in animation on scroll
        const sections = document.querySelectorAll("section");
        const revealOnScroll = () => {
            const triggerBottom = window.innerHeight * 0.85;
            sections.forEach((sec) => {
                const secTop = sec.getBoundingClientRect().top;
                if (secTop < triggerBottom) sec.classList.add("visible");
            });
        };
        window.addEventListener("scroll", revealOnScroll);
        revealOnScroll();

        // Dark/Light mode toggle
        const toggleBtn = document.querySelector(".toggle-theme");
        toggleBtn.addEventListener("click", () => {
            document.body.classList.toggle("light");
            toggleBtn.textContent = document.body.classList.contains("light") ? "🌞" : "🌙";
        });
    </script>
</body>

</html>