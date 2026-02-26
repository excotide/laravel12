<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Me - Labiq</title>
  @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-[#0b0b0f] text-gray-200">
  <div class="absolute inset-0 bg-gradient-to-br from-red-900/40 via-black to-red-700/20 pointer-events-none"></div>
  <div class="absolute -left-32 top-24 w-96 h-96 bg-red-600/30 rounded-full blur-3xl"></div>
  <div class="absolute right-0 bottom-10 w-[28rem] h-[28rem] bg-red-800/25 rounded-full blur-3xl"></div>

  <header class="relative max-w-6xl mx-auto px-6 pt-12">
    <div class="flex items-center gap-4">
      <div class="w-14 h-14 rounded-full bg-red-600 flex items-center justify-center text-2xl font-bold shadow-lg shadow-red-700/40">L</div>
      <div>
        <p class="text-sm uppercase tracking-[0.2em] text-red-300">About</p>
        <h1 class="text-3xl md:text-4xl font-bold">Labiq — Builder in the making</h1>
      </div>
    </div>
    <p class="mt-4 text-gray-400 max-w-3xl">
      Mahasiswa IT yang fokus menjadi fullstack developer dengan fondasi kuat di frontend (React, Tailwind, TypeScript)
      dan backend (Laravel, Golang, REST). Saya suka mengejar solusi yang rapi, terukur, dan mudah dipelihara.
    </p>
  </header>

  <main class="relative max-w-6xl mx-auto px-6 pb-16 pt-10 grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
    <!-- Left: Story & Timeline -->
    <section class="space-y-6">
      <div class="bg-white/5 border border-red-600/30 rounded-2xl p-6 shadow-xl shadow-red-900/20 backdrop-blur">
        <h2 class="text-2xl font-semibold mb-3 text-red-300">Ringkas</h2>
        <p class="text-gray-300 leading-relaxed">
          Saat ini saya menyeimbangkan kuliah dan eksperimen membangun produk kecil: dashboard analitik sederhana,
          REST API dengan autentikasi JWT, dan komponen UI yang bisa dipakai ulang. Saya percaya dokumentasi yang rapi,
          testing, dan iterasi cepat adalah kunci agar ide tidak berhenti di sketsa.
        </p>
      </div>

      <div class="bg-white/5 border border-red-600/30 rounded-2xl p-6 shadow-xl shadow-red-900/20 backdrop-blur">
        <h2 class="text-2xl font-semibold mb-4 text-red-300">Perjalanan Singkat</h2>
        <div class="space-y-4">
          <div class="flex gap-4">
            <div class="w-2 h-2 mt-2 rounded-full bg-red-500"></div>
            <div>
              <p class="text-sm text-red-200 font-semibold">2024 — sekarang</p>
              <p class="text-gray-200">Membangun REST API dengan Golang + MySQL, JWT auth, dan automated tests.</p>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-2 h-2 mt-2 rounded-full bg-red-500"></div>
            <div>
              <p class="text-sm text-red-200 font-semibold">2024</p>
              <p class="text-gray-200">Menyelesaikan beberapa mini project React + Tailwind: dashboard, landing page, dan komponen design system.</p>
            </div>
          </div>
          <div class="flex gap-4">
            <div class="w-2 h-2 mt-2 rounded-full bg-red-500"></div>
            <div>
              <p class="text-sm text-red-200 font-semibold">2023</p>
              <p class="text-gray-200">Mulai fokus Laravel: auth, queue, file upload, dan integrasi API eksternal.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Right: Stats & Skills -->
    <section class="space-y-6">
      <div class="grid grid-cols-2 gap-4">
        <div class="bg-white/5 border border-red-600/30 rounded-xl p-4 text-center shadow-md shadow-red-900/20">
          <p class="text-3xl font-bold text-red-200">12+</p>
          <p class="text-sm text-gray-300">Mini projects & comps</p>
        </div>
        <div class="bg-white/5 border border-red-600/30 rounded-xl p-4 text-center shadow-md shadow-red-900/20">
          <p class="text-3xl font-bold text-red-200">5</p>
          <p class="text-sm text-gray-300">API/Service shipped</p>
        </div>
        <div class="bg-white/5 border border-red-600/30 rounded-xl p-4 text-center shadow-md shadow-red-900/20">
          <p class="text-3xl font-bold text-red-200">3</p>
          <p class="text-sm text-gray-300">UI kits reused</p>
        </div>
        <div class="bg-white/5 border border-red-600/30 rounded-xl p-4 text-center shadow-md shadow-red-900/20">
          <p class="text-3xl font-bold text-red-200">∞</p>
          <p class="text-sm text-gray-300">Curiosity</p>
        </div>
      </div>

      <div class="bg-white/5 border border-red-600/30 rounded-2xl p-6 shadow-xl shadow-red-900/20 backdrop-blur space-y-4">
        <h2 class="text-2xl font-semibold text-red-300">Stack & Fokus</h2>
        <div class="flex flex-wrap gap-2 text-sm">
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">Laravel</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">Golang</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">REST / JWT</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">React</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">TypeScript</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">Tailwind</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">MySQL</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">PostgreSQL</span>
          <span class="px-3 py-1 rounded-full bg-red-600/30 text-red-100 border border-red-500/40">Testing</span>
        </div>
      </div>

      <div class="bg-white/5 border border-red-600/30 rounded-2xl p-6 shadow-xl shadow-red-900/20 backdrop-blur space-y-4">
        <h2 class="text-2xl font-semibold text-red-300">Kontak</h2>
        <p class="text-gray-300">Terbuka untuk kolaborasi, magang, atau project freelance kecil.</p>
        <div class="flex gap-3 flex-wrap">
          <a href="mailto:email@email.com" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-full text-white transition">Email</a>
          <a href="https://www.linkedin.com" class="px-4 py-2 border border-red-500/60 text-red-100 rounded-full hover:bg-red-600/40 transition">LinkedIn</a>
          <a href="https://github.com" class="px-4 py-2 border border-red-500/60 text-red-100 rounded-full hover:bg-red-600/40 transition">GitHub</a>
        </div>
      </div>
    </section>
  </main>
</body>
</html>