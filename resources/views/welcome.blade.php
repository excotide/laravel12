<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Labiq | Web Developer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

  <style>
    body {
      margin: 0;
      background: #0f0f0f;
    }

    /* ===== GLOBAL ANIMATED BACKGROUND ===== */
    .snap-container {
      height: 100vh;
      overflow-y: scroll;
      scroll-snap-type: y mandatory;

      background:
        radial-gradient(circle at 20% 30%, rgba(239, 68, 68, 0.25), transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(220, 38, 38, 0.25), transparent 40%),
        linear-gradient(135deg, #0f0a0f, #2b0f17, #0f0a0f);

      background-size: 200% 200%;
      animation: gradientShift 18s ease-in-out infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .snap-section {
      scroll-snap-align: start;
      height: 100vh;
    }

    .red-glow {
      box-shadow: 0 0 40px rgba(220, 38, 38, 0.4);
    }
  </style>
</head>

<body class="text-gray-200 font-sans">

  <div class="snap-container">

    <!-- ================= HOME ================= -->
    <section id="home" class="snap-section flex items-center justify-center px-6">
      <div class="grid md:grid-cols-3 items-center w-full max-w-6xl">

        <div class="order-2 md:col-span-2 text-center md:text-left">
          <span class="text-red-500/60 text-lg md:text-2xl">
            Muhammad Labiq Jazli
          </span>

          <h1 class="text-3xl md:text-6xl font-bold mt-4 text-red-500">
            WEB DEVELOPER
          </h1>

          <p class="mt-6 text-gray-400 max-w-xl">
            I am a front-end developer passionate about building beautiful
            and functional web applications using React, Laravel and modern technologies.
          </p>

          <div class="mt-8">
            <a href="#project"
              class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-full transition red-glow">
              My Resume
            </a>
          </div>
        </div>

        <div class="order-1 md:order-2 flex justify-center mb-8 md:mb-0">
          <img src="https://picsum.photos/300"
            class="rounded-3xl w-40 md:w-64 border border-red-600/40 red-glow"
            alt="profile">
        </div>

      </div>
    </section>

    <!-- ================= ABOUT ================= -->
    <section id="about" class="snap-section flex items-center justify-center px-6">
      <div class="grid md:grid-cols-3 w-full max-w-6xl items-center">

        <div class="md:col-span-2 text-center md:text-right">
          <h2 class="text-3xl md:text-5xl font-bold text-red-500">
            About Me
          </h2>

          <span class="text-red-400/60 block mt-4 text-lg md:text-2xl">
            Politeknik Elektronika Negeri Surabaya
          </span>

          <p class="mt-6 text-gray-300">
            I'm a third-semester Informatics Engineering student learning
            Algorithms, Data Structures and Web Development.
            I build projects using React, Tailwind and Laravel API.
          </p>

          <div class="mt-6">
            <a href="{{ url('/about') }}"
              class="inline-block bg-red-600 hover:bg-red-700 px-5 py-2 rounded-full transition red-glow">
              Selengkapnya
            </a>
          </div>
        </div>

        <div class="flex justify-center mt-8 md:mt-0">
          <img src="https://picsum.photos/400"
            class="rounded-3xl w-44 md:w-64 border border-red-600/40 red-glow"
            alt="about">
        </div>

      </div>
    </section>

    <!-- ================= PROJECT ================= -->
    <section id="project" class="snap-section flex flex-col justify-center px-6">

      <h2 class="text-3xl md:text-5xl font-bold text-center text-red-500 mb-10">
        Projects
      </h2>

      <div class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-6">

        <div class="min-w-[260px] snap-center bg-black/50 p-6 rounded-xl border border-red-600/30">
          <img src="https://picsum.photos/300"
            class="rounded-lg mb-4"
            alt="project">
          <p class="text-gray-400 text-sm">
            Coursework Manager built using React + Laravel API.
          </p>
          <a href="#"
            class="inline-block mt-4 bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition">
            View Website
          </a>
        </div>

        <div class="min-w-[260px] snap-center bg-black/50 p-6 rounded-xl border border-red-600/30">
          <img src="https://picsum.photos/301"
            class="rounded-lg mb-4"
            alt="project">
          <p class="text-gray-400 text-sm">
            REST API with JWT Authentication using Golang.
          </p>
          <a href="#"
            class="inline-block mt-4 bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition">
            View Website
          </a>
        </div>

      </div>
    </section>

    <!-- ================= CONTACT ================= -->
    <section id="contact" class="snap-section flex items-center justify-center px-6">

      <div class="w-full max-w-4xl border border-red-600/40 rounded-3xl p-8 bg-black/60">

        <h2 class="text-center text-3xl md:text-5xl font-bold text-red-500 mb-8">
          Contact
        </h2>

        <form action="#" method="POST" class="grid md:grid-cols-2 gap-6">
          @csrf

          <div>
            <input type="text"
              name="name"
              placeholder="Your Name"
              class="w-full p-3 rounded-lg bg-zinc-900 border border-red-600/30 focus:outline-none focus:border-red-500">
          </div>

          <div>
            <input type="email"
              name="email"
              placeholder="Your Email"
              class="w-full p-3 rounded-lg bg-zinc-900 border border-red-600/30 focus:outline-none focus:border-red-500">
          </div>

          <div class="md:col-span-2">
            <textarea name="message"
              rows="4"
              placeholder="Your Message"
              class="w-full p-3 rounded-lg bg-zinc-900 border border-red-600/30 focus:outline-none focus:border-red-500"></textarea>
          </div>

          <div class="md:col-span-2 text-center">
            <button type="submit"
              class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-full red-glow transition">
              Send Message
            </button>
          </div>
        </form>

      </div>
    </section>

  </div>

</body>
</html>