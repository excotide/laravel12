<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About — Labiq</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:ital,wght@0,400;0,500;1,400&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            syne: ['Syne', 'sans-serif'],
            mono: ['"DM Mono"', 'monospace'],
            serif: ['"Instrument Serif"', 'serif'],
          },
          keyframes: {
            fadeUp: {
              'from': { opacity: '0', transform: 'translateY(24px)' },
              'to':   { opacity: '1', transform: 'translateY(0)' },
            },
            drift: {
              'from': { transform: 'translate(0,0) scale(1)' },
              'to':   { transform: 'translate(30px,40px) scale(1.08)' },
            },
            pulseRing: {
              '0%,100%': { boxShadow: '0 0 0 1px rgba(230,57,70,0.22), 0 0 20px rgba(230,57,70,0.3)' },
              '50%':     { boxShadow: '0 0 0 1px rgba(230,57,70,0.22), 0 0 40px rgba(230,57,70,0.55)' },
            },
            blink: {
              '0%,100%': { opacity: '1' },
              '50%':     { opacity: '0.3' },
            },
          },
          animation: {
            'fade-up':    'fadeUp 0.7s ease forwards',
            'fade-up-sm': 'fadeUp 0.6s ease forwards',
            'drift':      'drift 14s ease-in-out infinite alternate',
            'pulse-ring': 'pulseRing 3s ease-in-out infinite',
            'blink':      'blink 1.8s ease-in-out infinite',
          },
        }
      }
    }
  </script>

  <style>
    /* ── Only things Tailwind cannot express ── */

    /* Noise grain pseudo-element */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
      background-size: 180px;
      pointer-events: none;
      z-index: 0;
      opacity: .5;
    }

    /* Scanline repeating gradient */
    .scanline {
      background: repeating-linear-gradient(
        0deg, transparent, transparent 2px,
        rgba(0,0,0,0.04) 2px, rgba(0,0,0,0.04) 4px
      );
    }

    /* Gradient clip text on h1 */
    h1 {
      font-size: clamp(1.7rem, 4vw, 2.6rem);
      background: linear-gradient(120deg, #fff 30%, #e63946 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Card corner accent */
    .card::after {
      content: '';
      position: absolute;
      top: 0; right: 0;
      width: 60px; height: 60px;
      background: radial-gradient(circle at top right, rgba(230,57,70,0.15), transparent 70%);
      pointer-events: none;
    }

    /* Card-title decorative line */
    .card-title::before {
      content: '';
      width: 18px; height: 2px;
      background: #e63946;
      border-radius: 2px;
      display: inline-block;
    }

    /* Tagline left border */
    .tagline { border-left: 2px solid #9b1d26; }

    /* Card reveal animation */
    .card { opacity: 0; transform: translateY(24px); }
    .card.visible { animation: fadeUp 0.6s ease forwards; }
    .card:nth-child(1) { animation-delay: .1s; }
    .card:nth-child(2) { animation-delay: .2s; }
    .card:nth-child(3) { animation-delay: .3s; }
    .card:nth-child(4) { animation-delay: .4s; }
    .card:nth-child(5) { animation-delay: .5s; }
    .card:nth-child(6) { animation-delay: .6s; }

    /* Skill bar fill */
    .bar-fill {
      height: 100%;
      border-radius: 99px;
      background: linear-gradient(90deg, #9b1d26, #e63946);
      width: 0;
      transition: width 1.2s cubic-bezier(.22,1,.36,1);
    }

    /* Ringkas italic em */
    .ringkas-text em {
      font-family: 'Instrument Serif', serif;
      font-style: italic;
      color: #e8e0d8;
      font-size: 15px;
    }
  </style>
</head>

<body class="bg-[#080810] text-[#e8e0d8] font-syne min-h-screen overflow-x-hidden" style="font-family:'DM Mono',monospace">

  <!-- Ambient blobs -->
  <div class="fixed w-[480px] h-[480px] rounded-full pointer-events-none z-0 blur-[90px] animate-drift -top-20 -left-24"
       style="background:radial-gradient(circle,rgba(180,20,30,0.28),transparent 70%);animation-delay:0s"></div>
  <div class="fixed w-[380px] h-[380px] rounded-full pointer-events-none z-0 blur-[90px] animate-drift bottom-0 -right-16"
       style="background:radial-gradient(circle,rgba(230,57,70,0.18),transparent 70%);animation-delay:-5s"></div>
  <div class="fixed w-[260px] h-[260px] rounded-full pointer-events-none z-0 blur-[90px] animate-drift top-1/2 left-[40%]"
       style="background:radial-gradient(circle,rgba(100,10,20,0.35),transparent 70%);animation-delay:-9s"></div>

  <!-- Scanline -->
  <div class="scanline fixed inset-0 pointer-events-none z-[1]"></div>

  <!-- Cursor glow -->
  <div id="glow" class="fixed w-60 h-60 rounded-full pointer-events-none z-[1] -translate-x-1/2 -translate-y-1/2"
       style="background:radial-gradient(circle,rgba(230,57,70,0.07),transparent 70%);transition:left .08s,top .08s"></div>

  <!-- Wrapper -->
  <div class="relative z-[2] max-w-[1100px] mx-auto px-7 pb-20">

    <!-- Header -->
    <header class="pt-14 pb-10 flex flex-col gap-5 opacity-0 animate-fade-up">

      <!-- Back button -->
      <a href="{{ url('/') }}"
         class="inline-flex items-center gap-2 text-[12px] text-[#7a7070] hover:text-[#e8c8ca] transition-colors duration-200 w-fit group">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             class="transition-transform duration-200 group-hover:-translate-x-1">
          <path d="M19 12H5M5 12l7 7M5 12l7-7"/>
        </svg>
        Kembali ke Home
      </a>

      <!-- Status pill -->
      <div class="inline-flex items-center gap-2 bg-[rgba(230,57,70,0.10)] border border-[rgba(230,57,70,0.22)] rounded-full px-4 py-1.5 text-xs text-[#e8b4b8] w-fit backdrop-blur-md">
        <span class="w-[7px] h-[7px] rounded-full bg-green-400 animate-blink" style="box-shadow:0 0 6px #4ade80"></span>
        Tersedia untuk kolaborasi &amp; magang
      </div>

      <!-- Header top -->
      <div class="flex items-center gap-5">
        <div class="w-[58px] h-[58px] rounded-full flex items-center justify-center text-2xl font-extrabold text-white shrink-0 font-syne animate-pulse-ring"
             style="background:linear-gradient(135deg,#e63946,#9b1d26)">L</div>
        <div>
          <p class="text-[11px] tracking-[.2em] uppercase text-[#e63946] mb-1">// About</p>
          <h1 class="font-syne font-extrabold leading-[1.1]">Labiq — Builder in the making</h1>
        </div>
      </div>

      <!-- Tagline -->
      <p class="tagline text-sm text-[#7a7070] max-w-[640px] leading-[1.75] pl-3.5">
        Mahasiswa IT yang fokus menjadi fullstack developer dengan fondasi kuat di frontend (React, Tailwind, TypeScript)
        dan backend (Laravel, Golang, REST). Saya suka mengejar solusi yang rapi, terukur, dan mudah dipelihara.
      </p>
    </header>

    <!-- Divider -->
    <div class="w-full h-px my-1" style="background:linear-gradient(90deg,transparent,rgba(230,57,70,0.22),transparent)"></div>

    <!-- Main grid -->
    <main class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6">

      <!-- Ringkas -->
      <div class="card relative overflow-hidden rounded-2xl border border-[rgba(230,57,70,0.22)] bg-[rgba(255,255,255,0.032)] p-6 backdrop-blur-xl transition-[box-shadow,border-color,transform] duration-300 hover:border-[rgba(230,57,70,0.5)] hover:shadow-[0_8px_48px_rgba(230,57,70,0.12),inset_0_0_40px_rgba(230,57,70,0.04)]">
        <p class="card-title font-syne text-base font-bold text-[#e63946] uppercase tracking-[.12em] mb-3.5 flex items-center gap-2">Ringkas</p>
        <p class="ringkas-text text-[13.5px] text-[#b0a8a4] leading-[1.85]">
          Saat ini saya menyeimbangkan kuliah dan eksperimen membangun produk kecil:
          <em>dashboard analitik</em>, REST API dengan autentikasi JWT, dan komponen UI reusable.
          Saya percaya dokumentasi rapi, testing, dan iterasi cepat adalah kunci agar ide tidak berhenti di sketsa.
        </p>
      </div>

      <!-- Stats -->
      <div class="card relative overflow-hidden rounded-2xl border border-[rgba(230,57,70,0.22)] bg-[rgba(255,255,255,0.032)] p-6 backdrop-blur-xl transition-[box-shadow,border-color,transform] duration-300 hover:border-[rgba(230,57,70,0.5)] hover:shadow-[0_8px_48px_rgba(230,57,70,0.12),inset_0_0_40px_rgba(230,57,70,0.04)]">
        <p class="card-title font-syne text-base font-bold text-[#e63946] uppercase tracking-[.12em] mb-3.5 flex items-center gap-2">Numbers</p>
        <div class="grid grid-cols-2 gap-3">
          <div class="bg-[rgba(230,57,70,0.06)] border border-[rgba(230,57,70,0.22)] rounded-xl px-3 py-4 text-center transition-[background,transform] duration-300 hover:bg-[rgba(230,57,70,0.13)] hover:-translate-y-0.5">
            <span class="font-syne text-[2rem] font-extrabold text-white block" data-count="12">0</span>
            <p class="text-[11px] text-[#7a7070] mt-0.5">Mini projects &amp; comps</p>
          </div>
          <div class="bg-[rgba(230,57,70,0.06)] border border-[rgba(230,57,70,0.22)] rounded-xl px-3 py-4 text-center transition-[background,transform] duration-300 hover:bg-[rgba(230,57,70,0.13)] hover:-translate-y-0.5">
            <span class="font-syne text-[2rem] font-extrabold text-white block" data-count="5">0</span>
            <p class="text-[11px] text-[#7a7070] mt-0.5">API / Service shipped</p>
          </div>
          <div class="bg-[rgba(230,57,70,0.06)] border border-[rgba(230,57,70,0.22)] rounded-xl px-3 py-4 text-center transition-[background,transform] duration-300 hover:bg-[rgba(230,57,70,0.13)] hover:-translate-y-0.5">
            <span class="font-syne text-[2rem] font-extrabold text-white block" data-count="3">0</span>
            <p class="text-[11px] text-[#7a7070] mt-0.5">UI kits reused</p>
          </div>
          <div class="bg-[rgba(230,57,70,0.06)] border border-[rgba(230,57,70,0.22)] rounded-xl px-3 py-4 text-center transition-[background,transform] duration-300 hover:bg-[rgba(230,57,70,0.13)] hover:-translate-y-0.5">
            <span class="font-syne text-[2rem] font-extrabold text-white block">∞</span>
            <p class="text-[11px] text-[#7a7070] mt-0.5">Curiosity</p>
          </div>
        </div>
      </div>

      <!-- Timeline -->
      <div class="card relative overflow-hidden rounded-2xl border border-[rgba(230,57,70,0.22)] bg-[rgba(255,255,255,0.032)] p-6 backdrop-blur-xl transition-[box-shadow,border-color,transform] duration-300 hover:border-[rgba(230,57,70,0.5)] hover:shadow-[0_8px_48px_rgba(230,57,70,0.12),inset_0_0_40px_rgba(230,57,70,0.04)]">
        <p class="card-title font-syne text-base font-bold text-[#e63946] uppercase tracking-[.12em] mb-3.5 flex items-center gap-2">Perjalanan</p>
        <ul class="flex flex-col gap-[18px] list-none">
          <li class="flex gap-3.5 items-start">
            <div class="flex flex-col items-center pt-[5px]">
              <span class="w-2.5 h-2.5 rounded-full bg-[#e63946] shrink-0" style="box-shadow:0 0 10px rgba(230,57,70,0.6)"></span>
              <span class="w-px flex-1 min-h-[20px] mt-1" style="background:linear-gradient(to bottom,#9b1d26,transparent)"></span>
            </div>
            <div>
              <p class="text-[11px] text-[#e63946] font-medium tracking-[.1em] mb-0.5">2024 — sekarang</p>
              <p class="text-[13px] text-[#9a9090] leading-[1.65]">Membangun REST API dengan Golang + MySQL, JWT auth, dan automated tests.</p>
            </div>
          </li>
          <li class="flex gap-3.5 items-start">
            <div class="flex flex-col items-center pt-[5px]">
              <span class="w-2.5 h-2.5 rounded-full bg-[#e63946] shrink-0" style="box-shadow:0 0 10px rgba(230,57,70,0.6)"></span>
              <span class="w-px flex-1 min-h-[20px] mt-1" style="background:linear-gradient(to bottom,#9b1d26,transparent)"></span>
            </div>
            <div>
              <p class="text-[11px] text-[#e63946] font-medium tracking-[.1em] mb-0.5">2024</p>
              <p class="text-[13px] text-[#9a9090] leading-[1.65]">Menyelesaikan mini project React + Tailwind: dashboard, landing page, dan design system components.</p>
            </div>
          </li>
          <li class="flex gap-3.5 items-start">
            <div class="flex flex-col items-center pt-[5px]">
              <span class="w-2.5 h-2.5 rounded-full bg-[#e63946] shrink-0" style="box-shadow:0 0 10px rgba(230,57,70,0.6)"></span>
            </div>
            <div>
              <p class="text-[11px] text-[#e63946] font-medium tracking-[.1em] mb-0.5">2023</p>
              <p class="text-[13px] text-[#9a9090] leading-[1.65]">Mulai fokus Laravel: auth, queue, file upload, dan integrasi API eksternal.</p>
            </div>
          </li>
        </ul>
      </div>

      <!-- Skill bars -->
      <div class="card relative overflow-hidden rounded-2xl border border-[rgba(230,57,70,0.22)] bg-[rgba(255,255,255,0.032)] p-6 backdrop-blur-xl transition-[box-shadow,border-color,transform] duration-300 hover:border-[rgba(230,57,70,0.5)] hover:shadow-[0_8px_48px_rgba(230,57,70,0.12),inset_0_0_40px_rgba(230,57,70,0.04)]">
        <p class="card-title font-syne text-base font-bold text-[#e63946] uppercase tracking-[.12em] mb-3.5 flex items-center gap-2">Proficiency</p>
        <div class="flex flex-col gap-3">
          <div>
            <div class="flex justify-between text-[11px] mb-[5px]">
              <span class="text-[#ccc] font-medium">React / TypeScript</span><span class="text-[#e63946]">88%</span>
            </div>
            <div class="h-1 bg-white/[0.06] rounded-full overflow-hidden"><div class="bar-fill" data-w="88"></div></div>
          </div>
          <div>
            <div class="flex justify-between text-[11px] mb-[5px]">
              <span class="text-[#ccc] font-medium">Laravel</span><span class="text-[#e63946]">82%</span>
            </div>
            <div class="h-1 bg-white/[0.06] rounded-full overflow-hidden"><div class="bar-fill" data-w="82"></div></div>
          </div>
          <div>
            <div class="flex justify-between text-[11px] mb-[5px]">
              <span class="text-[#ccc] font-medium">Golang</span><span class="text-[#e63946]">70%</span>
            </div>
            <div class="h-1 bg-white/[0.06] rounded-full overflow-hidden"><div class="bar-fill" data-w="70"></div></div>
          </div>
          <div>
            <div class="flex justify-between text-[11px] mb-[5px]">
              <span class="text-[#ccc] font-medium">Tailwind CSS</span><span class="text-[#e63946]">92%</span>
            </div>
            <div class="h-1 bg-white/[0.06] rounded-full overflow-hidden"><div class="bar-fill" data-w="92"></div></div>
          </div>
          <div>
            <div class="flex justify-between text-[11px] mb-[5px]">
              <span class="text-[#ccc] font-medium">MySQL / PostgreSQL</span><span class="text-[#e63946]">75%</span>
            </div>
            <div class="h-1 bg-white/[0.06] rounded-full overflow-hidden"><div class="bar-fill" data-w="75"></div></div>
          </div>
        </div>
      </div>

      <!-- Stack chips (full width) -->
      <div class="card col-span-1 md:col-span-2 relative overflow-hidden rounded-2xl border border-[rgba(230,57,70,0.22)] bg-[rgba(255,255,255,0.032)] p-6 backdrop-blur-xl transition-[box-shadow,border-color,transform] duration-300 hover:border-[rgba(230,57,70,0.5)] hover:shadow-[0_8px_48px_rgba(230,57,70,0.12),inset_0_0_40px_rgba(230,57,70,0.04)]">
        <p class="card-title font-syne text-base font-bold text-[#e63946] uppercase tracking-[.12em] mb-3.5 flex items-center gap-2">Stack &amp; Fokus</p>
        <div class="flex flex-wrap gap-2">
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">Laravel</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">Golang</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">REST / JWT</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">React</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">TypeScript</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">Tailwind</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">MySQL</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">PostgreSQL</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">Testing</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">Vite</span>
          <span class="px-3.5 py-1.5 rounded-full text-xs font-medium border border-[rgba(230,57,70,0.3)] bg-[rgba(230,57,70,0.08)] text-[#e8c8ca] cursor-default transition-all duration-200 hover:bg-[rgba(230,57,70,0.22)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5 hover:shadow-[0_4px_16px_rgba(230,57,70,0.2)] hover:text-white">Git</span>
        </div>
      </div>

      <!-- Contact (full width) -->
      <div class="card col-span-1 md:col-span-2 relative overflow-hidden rounded-2xl border border-[rgba(230,57,70,0.22)] bg-[rgba(255,255,255,0.032)] p-6 backdrop-blur-xl transition-[box-shadow,border-color,transform] duration-300 hover:border-[rgba(230,57,70,0.5)] hover:shadow-[0_8px_48px_rgba(230,57,70,0.12),inset_0_0_40px_rgba(230,57,70,0.04)]">
        <p class="card-title font-syne text-base font-bold text-[#e63946] uppercase tracking-[.12em] mb-3.5 flex items-center gap-2">Kontak</p>
        <p class="text-[13px] text-[#7a7070] mb-4 leading-[1.7]">Terbuka untuk kolaborasi, magang, atau project freelance kecil. Jangan ragu untuk reach out!</p>
        <div class="flex gap-2.5 flex-wrap">
          <a href="mailto:email@email.com"
             class="inline-flex items-center gap-1.5 px-5 py-2 rounded-full text-[13px] font-medium text-white bg-[#e63946] border border-transparent transition-all duration-200 hover:bg-[#ff4855] hover:-translate-y-0.5"
             style="box-shadow:0 0 18px rgba(230,57,70,0.35)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            Email
          </a>
          <a href="https://www.linkedin.com" target="_blank"
             class="inline-flex items-center gap-1.5 px-5 py-2 rounded-full text-[13px] font-medium text-[#e8c8ca] bg-transparent border border-[rgba(230,57,70,0.4)] transition-all duration-200 hover:bg-[rgba(230,57,70,0.15)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            LinkedIn
          </a>
          <a href="https://github.com" target="_blank"
             class="inline-flex items-center gap-1.5 px-5 py-2 rounded-full text-[13px] font-medium text-[#e8c8ca] bg-transparent border border-[rgba(230,57,70,0.4)] transition-all duration-200 hover:bg-[rgba(230,57,70,0.15)] hover:border-[rgba(230,57,70,0.7)] hover:-translate-y-0.5">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
            GitHub
          </a>
        </div>
      </div>

    </main>
  </div>

  <script>
    /* Cursor glow */
    const glow = document.getElementById('glow');
    document.addEventListener('mousemove', e => {
      glow.style.left = e.clientX + 'px';
      glow.style.top  = e.clientY + 'px';
    });

    /* IntersectionObserver for cards */
    const cards = document.querySelectorAll('.card');
    const io = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) { entry.target.classList.add('visible'); io.unobserve(entry.target); }
      });
    }, { threshold: 0.1 });
    cards.forEach(c => io.observe(c));

    /* Count-up animation */
    function countUp(el) {
      const target = +el.dataset.count;
      let current = 0;
      const step = Math.ceil(target / 28);
      const timer = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = current + '+';
        if (current >= target) clearInterval(timer);
      }, 40);
    }
    const statNums = document.querySelectorAll('[data-count]');
    const statObs = new IntersectionObserver(entries => {
      entries.forEach(e => { if (e.isIntersecting) { countUp(e.target); statObs.unobserve(e.target); } });
    }, { threshold: 0.5 });
    statNums.forEach(n => statObs.observe(n));

    /* Skill bars */
    const fills = document.querySelectorAll('.bar-fill');
    const barObs = new IntersectionObserver(entries => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.style.width = e.target.dataset.w + '%'; barObs.unobserve(e.target); } });
    }, { threshold: 0.3 });
    fills.forEach(f => barObs.observe(f));
  </script>
</body>
</html>