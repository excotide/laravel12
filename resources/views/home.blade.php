<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Labiq | Web Developer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,400&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['"Bebas Neue"', 'sans-serif'],
            mono:    ['"DM Mono"', 'monospace'],
            serif:   ['"Instrument Serif"', 'serif'],
          },
          keyframes: {
            fadeUp:    { from: { opacity:'0', transform:'translateY(32px)' }, to: { opacity:'1', transform:'translateY(0)' } },
            fadeIn:    { from: { opacity:'0' }, to: { opacity:'1' } },
            slideLeft: { from: { opacity:'0', transform:'translateX(40px)' }, to: { opacity:'1', transform:'translateX(0)' } },
            drift:     { from: { transform:'translate(0,0) scale(1)' }, to: { transform:'translate(40px,50px) scale(1.1)' } },
            marquee:   { from: { transform:'translateX(0)' }, to: { transform:'translateX(-50%)' } },
            scanDown:  { from: { top:'-10%' }, to: { top:'110%' } },
            blink:     { '0%,100%': { opacity:'1' }, '50%': { opacity:'0' } },
            pulseGlow: { '0%,100%': { boxShadow:'0 0 20px rgba(220,38,38,0.3)' }, '50%': { boxShadow:'0 0 60px rgba(220,38,38,0.7), 0 0 100px rgba(220,38,38,0.3)' } },
            rotateSlow:{ from:{ transform:'rotate(0deg)' }, to:{ transform:'rotate(360deg)' } },
            countUp:   { from:{ opacity:'0', transform:'translateY(10px)' }, to:{ opacity:'1', transform:'translateY(0)' } },
            typewriter:{ from:{ width:'0' }, to:{ width:'100%' } },
            glitch1:   { '0%,100%':{ clipPath:'inset(0 0 90% 0)' }, '20%':{ clipPath:'inset(30% 0 50% 0)' }, '40%':{ clipPath:'inset(70% 0 10% 0)' }, '60%':{ clipPath:'inset(10% 0 80% 0)' }, '80%':{ clipPath:'inset(50% 0 30% 0)' } },
          },
          animation: {
            'fade-up':     'fadeUp 0.8s cubic-bezier(.22,1,.36,1) forwards',
            'fade-in':     'fadeIn 1s ease forwards',
            'slide-left':  'slideLeft 0.8s cubic-bezier(.22,1,.36,1) forwards',
            'drift':       'drift 16s ease-in-out infinite alternate',
            'drift-rev':   'drift 20s ease-in-out infinite alternate-reverse',
            'marquee':     'marquee 22s linear infinite',
            'scan':        'scanDown 4s linear infinite',
            'blink':       'blink 1s step-end infinite',
            'pulse-glow':  'pulseGlow 2.5s ease-in-out infinite',
            'rotate-slow': 'rotateSlow 20s linear infinite',
            'glitch':      'glitch1 0.4s steps(1) infinite',
          }
        }
      }
    }
  </script>

  <style>
    :root {
      --red:     #e63946;
      --red-dim: #9b1d26;
      --bg:      #080810;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    /* ── Noise grain ── */
    body::before {
      content: '';
      position: fixed; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
      background-size: 160px;
      pointer-events: none;
      z-index: 9999;
      opacity: .6;
    }

    /* ── Scanline overlay ── */
    body::after {
      content: '';
      position: fixed; inset: 0;
      background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.03) 2px, rgba(0,0,0,0.03) 4px);
      pointer-events: none;
      z-index: 9998;
    }

    /* Snap container */
    .snap-wrap {
      height: 100vh;
      overflow-y: scroll;
      scroll-snap-type: y mandatory;
      scroll-behavior: smooth;
    }
    .snap-sec {
      scroll-snap-align: start;
      height: 100vh;
      position: relative;
      overflow: hidden;
    }

    /* ── Nav dot indicator ── */
    .nav-dot { transition: all .3s; }
    .nav-dot.active { background: var(--red); box-shadow: 0 0 8px var(--red); }

    /* ── Gradient text ── */
    .grad-text {
      background: linear-gradient(135deg, #fff 20%, var(--red) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ── Glitch effect on hover ── */
    .glitch-wrap { position: relative; }
    .glitch-wrap::before,
    .glitch-wrap::after {
      content: attr(data-text);
      position: absolute; inset: 0;
      font-family: 'Bebas Neue', sans-serif;
      font-size: inherit;
      line-height: inherit;
      pointer-events: none;
      opacity: 0;
      transition: opacity .1s;
    }
    .glitch-wrap:hover::before {
      opacity: .8;
      color: #e63946;
      transform: translateX(-3px);
      clip-path: inset(20% 0 60% 0);
      animation: glitch1 0.3s steps(1) infinite;
    }
    .glitch-wrap:hover::after {
      opacity: .6;
      color: #00f0ff;
      transform: translateX(3px);
      clip-path: inset(60% 0 20% 0);
      animation: glitch1 0.3s steps(1) reverse infinite;
    }

    /* ── Section reveal ── */
    .reveal { opacity: 0; transform: translateY(30px); transition: opacity .7s ease, transform .7s ease; }
    .reveal.visible { opacity: 1; transform: none; }
    .reveal-delay-1 { transition-delay: .1s; }
    .reveal-delay-2 { transition-delay: .2s; }
    .reveal-delay-3 { transition-delay: .3s; }
    .reveal-delay-4 { transition-delay: .4s; }
    .reveal-delay-5 { transition-delay: .5s; }

    /* ── Card hover ── */
    .proj-card {
      transition: transform .3s, box-shadow .3s, border-color .3s;
      border: 1px solid rgba(220,38,38,0.2);
    }
    .proj-card:hover {
      transform: translateY(-6px) scale(1.01);
      box-shadow: 0 20px 60px rgba(220,38,38,0.2), 0 0 0 1px rgba(220,38,38,0.4);
      border-color: rgba(220,38,38,0.5);
    }

    /* ── Form inputs ── */
    .form-input {
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(220,38,38,0.25);
      color: #e8e0d8;
      border-radius: 10px;
      padding: 12px 16px;
      width: 100%;
      font-family: 'DM Mono', monospace;
      font-size: 13px;
      outline: none;
      transition: border-color .25s, box-shadow .25s;
    }
    .form-input::placeholder { color: rgba(255,255,255,0.2); }
    .form-input:focus {
      border-color: var(--red);
      box-shadow: 0 0 0 3px rgba(220,38,38,0.12);
    }

    /* ── Ticker ── */
    .ticker-text { white-space: nowrap; }

    /* ── Decorative corner ── */
    .corner-tl::before, .corner-br::after {
      content: '';
      position: absolute;
      width: 20px; height: 20px;
      border-color: var(--red);
      border-style: solid;
    }
    .corner-tl::before { top: 16px; left: 16px; border-width: 2px 0 0 2px; }
    .corner-br::after  { bottom: 16px; right: 16px; border-width: 0 2px 2px 0; }

    /* ── Cursor ── */
    #cursor-glow {
      position: fixed;
      width: 280px; height: 280px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(220,38,38,0.06), transparent 70%);
      pointer-events: none;
      z-index: 9997;
      transform: translate(-50%,-50%);
      transition: left .1s, top .1s;
    }

    /* ── Tag chip ── */
    .tag {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 100px;
      font-size: 11px;
      font-family: 'DM Mono', monospace;
      background: rgba(220,38,38,0.1);
      border: 1px solid rgba(220,38,38,0.3);
      color: #e8b4b8;
    }

    /* Active section nav */
    .snap-sec.active-sec .nav-indicator { opacity: 1; }
  </style>
</head>

<body class="bg-[#080810] text-[#e8e0d8] font-mono overflow-hidden" style="font-family:'DM Mono',monospace">

<!-- Cursor -->
<div id="cursor-glow"></div>

<!-- ── Ambient blobs (fixed, behind everything) ── -->
<div class="fixed w-[600px] h-[600px] rounded-full pointer-events-none blur-[120px] animate-drift"
     style="background:radial-gradient(circle,rgba(160,20,30,0.22),transparent 70%);top:-150px;left:-150px;z-index:0"></div>
<div class="fixed w-[500px] h-[500px] rounded-full pointer-events-none blur-[120px] animate-drift-rev"
     style="background:radial-gradient(circle,rgba(220,38,38,0.15),transparent 70%);bottom:-100px;right:-100px;z-index:0"></div>
<div class="fixed w-[300px] h-[300px] rounded-full pointer-events-none blur-[80px] animate-drift"
     style="background:radial-gradient(circle,rgba(80,10,20,0.3),transparent 70%);top:40%;left:50%;z-index:0;animation-delay:-8s"></div>

<!-- ── Side nav dots ── -->
<nav class="fixed right-6 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-3">
  <a href="#home"    class="nav-dot w-2 h-2 rounded-full bg-white/20 hover:bg-[#e63946] transition-all" data-section="home"></a>
  <a href="#about"   class="nav-dot w-2 h-2 rounded-full bg-white/20 hover:bg-[#e63946] transition-all" data-section="about"></a>
  <a href="#project" class="nav-dot w-2 h-2 rounded-full bg-white/20 hover:bg-[#e63946] transition-all" data-section="project"></a>
  <a href="#contact" class="nav-dot w-2 h-2 rounded-full bg-white/20 hover:bg-[#e63946] transition-all" data-section="contact"></a>
</nav>

<!-- ── Section counter ── -->
<div class="fixed left-6 bottom-8 z-50 flex items-center gap-3">
  <span id="sec-num" class="font-display text-5xl text-white/10 leading-none select-none">01</span>
  <div class="w-px h-8 bg-white/10"></div>
  <span id="sec-name" class="text-[11px] tracking-[.2em] uppercase text-[#7a7070]">Home</span>
</div>

<!-- ── Scroll hint ── -->
<div class="fixed right-6 bottom-8 z-50 flex flex-col items-center gap-1 opacity-40">
  <div class="w-px h-10 bg-white/30"></div>
  <span class="text-[10px] tracking-[.15em] uppercase text-white/40" style="writing-mode:vertical-rl">scroll</span>
</div>

<!-- ════════════════════════════════════════════════ -->
<div class="snap-wrap" id="snap">

  <!-- ═══════════ SECTION 1 — HOME ═══════════ -->
  <section id="home" class="snap-sec flex flex-col justify-center px-8 md:px-20">

    <!-- Decorative grid lines -->
    <div class="absolute inset-0 pointer-events-none" style="background-image:linear-gradient(rgba(220,38,38,0.04) 1px,transparent 1px),linear-gradient(90deg,rgba(220,38,38,0.04) 1px,transparent 1px);background-size:80px 80px"></div>

    <!-- Scan line animation -->
    <div class="absolute left-0 right-0 h-[2px] animate-scan pointer-events-none"
         style="background:linear-gradient(90deg,transparent,rgba(220,38,38,0.4),transparent);z-index:1"></div>

    <div class="relative z-10 max-w-6xl mx-auto w-full grid md:grid-cols-2 gap-12 items-center">

      <!-- Left -->
      <div>
        <div class="reveal mb-4 flex items-center gap-3">
          <div class="w-8 h-px bg-[#e63946]"></div>
          <span class="text-[11px] tracking-[.3em] uppercase text-[#e63946]">Portfolio 2024</span>
        </div>

        <div class="reveal reveal-delay-1 mb-2">
          <span class="font-mono text-sm text-[#7a7070]">Muhammad Labiq Jazli</span>
        </div>

        <h1 class="reveal reveal-delay-2 font-display leading-none mb-6"
            style="font-size:clamp(4rem,10vw,8rem)">
          <span class="glitch-wrap grad-text" data-text="WEB">WEB</span><br>
          <span class="text-white/90">DEVELOPER</span>
        </h1>

        <p class="reveal reveal-delay-3 text-[13px] text-[#7a7070] max-w-md leading-relaxed mb-8">
          Front-end developer passionate about building beautiful
          and functional web apps using React, Laravel &amp; modern technologies.
        </p>

        <div class="reveal reveal-delay-4 flex items-center gap-4">
          <a href="#project"
             class="inline-flex items-center gap-2 bg-[#e63946] hover:bg-[#ff4855] text-white px-6 py-3 rounded-full text-sm font-medium transition-all duration-200 hover:-translate-y-0.5 animate-pulse-glow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            My Resume
          </a>
          <a href="#about"
             class="inline-flex items-center gap-2 text-sm text-[#e8c8ca] border border-[rgba(220,38,38,0.3)] px-6 py-3 rounded-full hover:bg-[rgba(220,38,38,0.1)] hover:border-[rgba(220,38,38,0.6)] transition-all duration-200 hover:-translate-y-0.5">
            About Me
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>

        <!-- Stats row -->
        <div class="reveal reveal-delay-5 flex gap-8 mt-10 pt-8 border-t border-white/5">
          <div>
            <p class="font-display text-3xl text-white" data-count="12">0</p>
            <p class="text-[11px] text-[#7a7070] mt-1">Projects</p>
          </div>
          <div>
            <p class="font-display text-3xl text-white" data-count="5">0</p>
            <p class="text-[11px] text-[#7a7070] mt-1">APIs shipped</p>
          </div>
          <div>
            <p class="font-display text-3xl text-[#e63946]">∞</p>
            <p class="text-[11px] text-[#7a7070] mt-1">Curiosity</p>
          </div>
        </div>
      </div>

      <!-- Right — avatar card -->
      <div class="reveal reveal-delay-2 flex justify-center md:justify-end">
        <div class="relative">
          <!-- Rotating ring -->
          <div class="absolute inset-[-20px] rounded-full border border-dashed border-[rgba(220,38,38,0.2)] animate-rotate-slow pointer-events-none"></div>
          <div class="absolute inset-[-40px] rounded-full border border-dashed border-[rgba(220,38,38,0.1)] animate-rotate-slow pointer-events-none" style="animation-direction:reverse;animation-duration:30s"></div>

          <!-- Card -->
          <div class="relative w-64 h-80 rounded-2xl overflow-hidden corner-tl corner-br"
               style="border:1px solid rgba(220,38,38,0.3);box-shadow:0 0 60px rgba(220,38,38,0.2)">
            <img src="https://picsum.photos/seed/labiq/400/500" class="w-full h-full object-cover" alt="profile">
            <div class="absolute inset-0" style="background:linear-gradient(to top,rgba(8,8,16,0.9) 0%,transparent 50%)"></div>
            <div class="absolute bottom-4 left-4">
              <p class="font-display text-xl text-white leading-none">LABIQ</p>
              <p class="text-[10px] text-[#e63946] tracking-[.2em] mt-1">FULLSTACK DEV</p>
            </div>
            <!-- Online indicator -->
            <div class="absolute top-4 right-4 flex items-center gap-1.5 bg-black/40 backdrop-blur-sm px-2 py-1 rounded-full">
              <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-blink" style="box-shadow:0 0 4px #4ade80"></span>
              <span class="text-[9px] text-green-400">available</span>
            </div>
          </div>

          <!-- Floating tags -->
          <div class="absolute -left-14 top-10 tag animate-fade-in" style="animation-delay:.8s;opacity:0">React</div>
          <div class="absolute -right-16 top-24 tag animate-fade-in" style="animation-delay:1s;opacity:0">Laravel</div>
          <div class="absolute -left-12 bottom-16 tag animate-fade-in" style="animation-delay:1.2s;opacity:0">Golang</div>
        </div>
      </div>
    </div>

    <!-- Ticker -->
    <div class="absolute bottom-0 left-0 right-0 h-10 flex items-center overflow-hidden border-t border-white/5" style="background:rgba(0,0,0,0.4);backdrop-filter:blur(8px)">
      <div class="ticker-text animate-marquee flex gap-16 text-[11px] tracking-[.15em] uppercase text-[#7a7070]">
        <span>React</span><span class="text-[#e63946]">✦</span>
        <span>Laravel</span><span class="text-[#e63946]">✦</span>
        <span>Golang</span><span class="text-[#e63946]">✦</span>
        <span>TypeScript</span><span class="text-[#e63946]">✦</span>
        <span>Tailwind CSS</span><span class="text-[#e63946]">✦</span>
        <span>MySQL</span><span class="text-[#e63946]">✦</span>
        <span>PostgreSQL</span><span class="text-[#e63946]">✦</span>
        <span>REST API</span><span class="text-[#e63946]">✦</span>
        <span>JWT Auth</span><span class="text-[#e63946]">✦</span>
        <!-- duplicate for seamless loop -->
        <span>React</span><span class="text-[#e63946]">✦</span>
        <span>Laravel</span><span class="text-[#e63946]">✦</span>
        <span>Golang</span><span class="text-[#e63946]">✦</span>
        <span>TypeScript</span><span class="text-[#e63946]">✦</span>
        <span>Tailwind CSS</span><span class="text-[#e63946]">✦</span>
        <span>MySQL</span><span class="text-[#e63946]">✦</span>
        <span>PostgreSQL</span><span class="text-[#e63946]">✦</span>
        <span>REST API</span><span class="text-[#e63946]">✦</span>
        <span>JWT Auth</span><span class="text-[#e63946]">✦</span>
      </div>
    </div>
  </section>

  <!-- ═══════════ SECTION 2 — ABOUT ═══════════ -->
  <section id="about" class="snap-sec flex items-center px-8 md:px-20">
    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle at 70% 50%,rgba(220,38,38,0.07),transparent 60%)"></div>

    <div class="relative z-10 max-w-6xl mx-auto w-full grid md:grid-cols-2 gap-16 items-center">

      <!-- Left — visual -->
      <div class="reveal flex justify-center">
        <div class="relative">
          <div class="w-72 h-72 rounded-2xl overflow-hidden" style="border:1px solid rgba(220,38,38,0.3);box-shadow:0 0 60px rgba(220,38,38,0.15)">
            <img src="https://picsum.photos/seed/about/400/400" class="w-full h-full object-cover" alt="about">
            <div class="absolute inset-0" style="background:linear-gradient(135deg,rgba(220,38,38,0.2),transparent 60%)"></div>
          </div>

          <!-- Decorative stats box -->
          <div class="absolute -bottom-6 -right-6 bg-[#080810] border border-[rgba(220,38,38,0.3)] rounded-xl p-4 min-w-[140px]"
               style="box-shadow:0 8px 32px rgba(220,38,38,0.15)">
            <p class="font-display text-3xl text-[#e63946]">3rd</p>
            <p class="text-[11px] text-[#7a7070] mt-1">Semester</p>
            <p class="text-[10px] text-[#5a5050] mt-0.5">Informatics Eng.</p>
          </div>

          <!-- School badge -->
          <div class="absolute -top-4 -left-4 bg-[rgba(220,38,38,0.1)] border border-[rgba(220,38,38,0.3)] backdrop-blur-md rounded-xl px-3 py-2">
            <p class="text-[10px] text-[#e63946] tracking-[.1em] uppercase font-medium">PENS</p>
            <p class="text-[9px] text-[#7a7070]">Surabaya</p>
          </div>
        </div>
      </div>

      <!-- Right — text -->
      <div>
        <div class="reveal flex items-center gap-3 mb-4">
          <div class="w-8 h-px bg-[#e63946]"></div>
          <span class="text-[11px] tracking-[.3em] uppercase text-[#e63946]">Who I Am</span>
        </div>

        <h2 class="reveal reveal-delay-1 font-display leading-none mb-6"
            style="font-size:clamp(3rem,7vw,5.5rem)">
          <span class="text-white/90">ABOUT</span><br>
          <span class="grad-text">ME.</span>
        </h2>

        <p class="reveal reveal-delay-2 text-[13px] text-[#9a9090] leading-relaxed mb-4">
          I'm a third-semester Informatics Engineering student at
          <span class="text-[#e8c8ca]">Politeknik Elektronika Negeri Surabaya</span>,
          learning Algorithms, Data Structures, and Web Development.
        </p>

        <p class="reveal reveal-delay-3 text-[13px] text-[#9a9090] leading-relaxed mb-8">
          I build projects using React, Tailwind, and Laravel API — always chasing
          clean architecture, readable code, and fast iteration.
        </p>

        <!-- Skills -->
        <div class="reveal reveal-delay-4 flex flex-wrap gap-2 mb-8">
          <span class="tag">React</span>
          <span class="tag">TypeScript</span>
          <span class="tag">Laravel</span>
          <span class="tag">Golang</span>
          <span class="tag">Tailwind</span>
          <span class="tag">MySQL</span>
          <span class="tag">REST / JWT</span>
          <span class="tag">Testing</span>
        </div>

        <div class="reveal reveal-delay-5">
          <a href="/about"
             class="inline-flex items-center gap-2 bg-[#e63946] hover:bg-[#ff4855] text-white px-6 py-3 rounded-full text-sm font-medium transition-all duration-200 hover:-translate-y-0.5"
             style="box-shadow:0 0 24px rgba(220,38,38,0.35)">
            Selengkapnya
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════ SECTION 3 — PROJECTS ═══════════ -->
  <section id="project" class="snap-sec flex flex-col justify-center px-8 md:px-20 py-16">
    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle at 30% 50%,rgba(220,38,38,0.06),transparent 60%)"></div>

    <div class="relative z-10 max-w-6xl mx-auto w-full">

      <div class="reveal flex items-end justify-between mb-12">
        <div>
          <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-px bg-[#e63946]"></div>
            <span class="text-[11px] tracking-[.3em] uppercase text-[#e63946]">Portfolio</span>
          </div>
          <h2 class="font-display leading-none" style="font-size:clamp(3rem,7vw,5.5rem)">
            <span class="text-white/90">MY</span> <span class="grad-text">PROJECTS</span>
          </h2>
        </div>
        <a href="#" class="hidden md:flex items-center gap-2 text-[12px] text-[#7a7070] hover:text-[#e8c8ca] transition-colors">
          View all <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>

      <!-- Project cards grid -->
      <div class="grid md:grid-cols-2 gap-6">

        <!-- Card 1 -->
        <div class="reveal proj-card rounded-2xl overflow-hidden bg-[rgba(255,255,255,0.02)] backdrop-blur-sm relative group">
          <div class="h-48 overflow-hidden">
            <img src="https://picsum.photos/seed/proj1/600/300" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="project">
            <div class="absolute inset-0 h-48" style="background:linear-gradient(to bottom,transparent 40%,rgba(8,8,16,0.9))"></div>
          </div>
          <div class="p-6">
            <div class="flex items-start justify-between mb-3">
              <div>
                <div class="flex gap-2 mb-2">
                  <span class="tag">React</span>
                  <span class="tag">Laravel</span>
                </div>
                <h3 class="font-display text-xl text-white">Coursework Manager</h3>
              </div>
              <span class="text-[10px] text-[#7a7070] mt-1">2024</span>
            </div>
            <p class="text-[12px] text-[#7a7070] leading-relaxed mb-5">
              Full-featured coursework manager built using React + Laravel API with JWT authentication.
            </p>
            <a href="#"
               class="inline-flex items-center gap-2 text-[12px] text-[#e8c8ca] border border-[rgba(220,38,38,0.3)] px-4 py-2 rounded-full hover:bg-[rgba(220,38,38,0.1)] hover:border-[rgba(220,38,38,0.6)] transition-all duration-200">
              View Project
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            </a>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="reveal reveal-delay-2 proj-card rounded-2xl overflow-hidden bg-[rgba(255,255,255,0.02)] backdrop-blur-sm relative group">
          <div class="h-48 overflow-hidden">
            <img src="https://picsum.photos/seed/proj2/600/300" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="project">
            <div class="absolute inset-0 h-48" style="background:linear-gradient(to bottom,transparent 40%,rgba(8,8,16,0.9))"></div>
          </div>
          <div class="p-6">
            <div class="flex items-start justify-between mb-3">
              <div>
                <div class="flex gap-2 mb-2">
                  <span class="tag">Golang</span>
                  <span class="tag">MySQL</span>
                  <span class="tag">JWT</span>
                </div>
                <h3 class="font-display text-xl text-white">REST API Service</h3>
              </div>
              <span class="text-[10px] text-[#7a7070] mt-1">2024</span>
            </div>
            <p class="text-[12px] text-[#7a7070] leading-relaxed mb-5">
              REST API with JWT Authentication using Golang — includes automated tests and clean architecture.
            </p>
            <a href="#"
               class="inline-flex items-center gap-2 text-[12px] text-[#e8c8ca] border border-[rgba(220,38,38,0.3)] px-4 py-2 rounded-full hover:bg-[rgba(220,38,38,0.1)] hover:border-[rgba(220,38,38,0.6)] transition-all duration-200">
              View Project
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════ SECTION 4 — CONTACT ═══════════ -->
  <section id="contact" class="snap-sec flex items-center px-8 md:px-20">
    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle at 50% 60%,rgba(220,38,38,0.08),transparent 60%)"></div>

    <div class="relative z-10 max-w-6xl mx-auto w-full grid md:grid-cols-2 gap-16 items-center">

      <!-- Left — copy -->
      <div>
        <div class="reveal flex items-center gap-3 mb-4">
          <div class="w-8 h-px bg-[#e63946]"></div>
          <span class="text-[11px] tracking-[.3em] uppercase text-[#e63946]">Get in Touch</span>
        </div>

        <h2 class="reveal reveal-delay-1 font-display leading-none mb-6"
            style="font-size:clamp(3rem,7vw,5.5rem)">
          <span class="text-white/90">LET'S</span><br>
          <span class="grad-text">WORK.</span>
        </h2>

        <p class="reveal reveal-delay-2 text-[13px] text-[#7a7070] leading-relaxed mb-8 max-w-sm">
          Terbuka untuk kolaborasi, magang, atau project freelance kecil. Jangan ragu untuk reach out!
        </p>

        <div class="reveal reveal-delay-3 flex flex-col gap-4">
          <a href="mailto:email@email.com" class="flex items-center gap-3 group">
            <div class="w-9 h-9 rounded-full bg-[rgba(220,38,38,0.1)] border border-[rgba(220,38,38,0.3)] flex items-center justify-center group-hover:bg-[rgba(220,38,38,0.2)] transition-colors">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#e63946" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </div>
            <span class="text-[13px] text-[#9a9090] group-hover:text-[#e8c8ca] transition-colors">email@email.com</span>
          </a>
          <a href="https://github.com" target="_blank" class="flex items-center gap-3 group">
            <div class="w-9 h-9 rounded-full bg-[rgba(220,38,38,0.1)] border border-[rgba(220,38,38,0.3)] flex items-center justify-center group-hover:bg-[rgba(220,38,38,0.2)] transition-colors">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="#e63946"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
            </div>
            <span class="text-[13px] text-[#9a9090] group-hover:text-[#e8c8ca] transition-colors">github.com/labiq</span>
          </a>
          <a href="https://linkedin.com" target="_blank" class="flex items-center gap-3 group">
            <div class="w-9 h-9 rounded-full bg-[rgba(220,38,38,0.1)] border border-[rgba(220,38,38,0.3)] flex items-center justify-center group-hover:bg-[rgba(220,38,38,0.2)] transition-colors">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="#e63946"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            </div>
            <span class="text-[13px] text-[#9a9090] group-hover:text-[#e8c8ca] transition-colors">linkedin.com/in/labiq</span>
          </a>
        </div>
      </div>

      <!-- Right — form -->
      <div class="reveal reveal-delay-2">
        <div class="relative rounded-2xl p-8 corner-tl corner-br"
             style="background:rgba(255,255,255,0.02);border:1px solid rgba(220,38,38,0.2);backdrop-filter:blur(12px)">
          <form action="#" method="POST" class="flex flex-col gap-4">

            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="text-[11px] tracking-[.1em] uppercase text-[#7a7070] mb-1.5 block">Name</label>
                <input type="text" name="name" placeholder="Your name" class="form-input">
              </div>
              <div>
                <label class="text-[11px] tracking-[.1em] uppercase text-[#7a7070] mb-1.5 block">Email</label>
                <input type="email" name="email" placeholder="your@email.com" class="form-input">
              </div>
            </div>

            <div>
              <label class="text-[11px] tracking-[.1em] uppercase text-[#7a7070] mb-1.5 block">Message</label>
              <textarea name="message" rows="4" placeholder="Hi Labiq, let's work together..." class="form-input resize-none"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-[#e63946] hover:bg-[#ff4855] text-white py-3 rounded-full text-sm font-medium transition-all duration-200 hover:-translate-y-0.5 mt-2"
                    style="box-shadow:0 0 24px rgba(220,38,38,0.3)">
              Send Message ✦
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

</div><!-- /snap-wrap -->

<script>
  /* ── Cursor glow ── */
  const cursor = document.getElementById('cursor-glow');
  document.addEventListener('mousemove', e => {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top  = e.clientY + 'px';
  });

  /* ── Reveal on scroll ── */
  const revealEls = document.querySelectorAll('.reveal');
  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
  }, { threshold: 0.1 });
  revealEls.forEach(el => revealObs.observe(el));

  /* ── Count-up ── */
  function countUp(el) {
    const target = +el.dataset.count;
    let cur = 0;
    const step = Math.ceil(target / 30);
    const t = setInterval(() => {
      cur = Math.min(cur + step, target);
      el.textContent = cur + '+';
      if (cur >= target) clearInterval(t);
    }, 40);
  }
  const counters = document.querySelectorAll('[data-count]');
  const cntObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { countUp(e.target); cntObs.unobserve(e.target); }});
  }, { threshold: 0.5 });
  counters.forEach(c => cntObs.observe(c));

  /* ── Active section nav dots & counter ── */
  const sections = document.querySelectorAll('.snap-sec');
  const dots = document.querySelectorAll('.nav-dot');
  const secNum  = document.getElementById('sec-num');
  const secName = document.getElementById('sec-name');
  const secNames = ['Home','About','Projects','Contact'];

  const secObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting && e.intersectionRatio > 0.5) {
        const idx = [...sections].indexOf(e.target);
        dots.forEach((d,i) => d.classList.toggle('active', i === idx));
        secNum.textContent  = String(idx+1).padStart(2,'0');
        secName.textContent = secNames[idx] || '';
      }
    });
  }, { threshold: 0.5 });
  sections.forEach(s => secObs.observe(s));

  /* ── Nav dot smooth scroll ── */
  dots.forEach(dot => {
    dot.addEventListener('click', e => {
      e.preventDefault();
      const id = dot.dataset.section;
      document.getElementById(id)?.scrollIntoView({ behavior: 'smooth' });
    });
  });
</script>
</body>
</html>