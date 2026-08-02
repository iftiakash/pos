<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>POS — Point of Sale</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Sora:wght@300;400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

  <style>
    :root {
      --teal:    #00d4a0;
      --teal-dim:#00a07a;
      --blue:    #00aaff;
      --bg:      #0b0f19;
      --card-bg: #111827;
      --card-border: rgba(0,212,160,.18);
      --text:    #e2e8f0;
      --muted:   #94a3b8;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      height: 100%;
      background: var(--bg);
      color: var(--text);
      font-family: 'Sora', sans-serif;
      overflow-x: hidden;
    }

    /* ── BACKGROUND ORBS ── */
    .bg-orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(120px);
      pointer-events: none;
      z-index: 0;
    }
    .orb1 { width: 600px; height: 600px; background: rgba(0,212,160,.12); top: -150px; left: -150px; }
    .orb2 { width: 500px; height: 500px; background: rgba(0,170,255,.09); bottom: -100px; right: -100px; }
    .orb3 { width: 300px; height: 300px; background: rgba(0,212,160,.07); top: 40%; left: 55%; }

    /* ── LAYOUT ── */
    .page-wrapper {
      position: relative;
      z-index: 1;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ── NAV ── */
    .top-nav {
      padding: 1.1rem 2.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid rgba(255,255,255,.06);
      backdrop-filter: blur(8px);
    }
    .nav-badge {
      display: inline-flex;
      align-items: center;
      gap: .4rem;
      font-size: .7rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--teal);
      border: 1px solid var(--teal-dim);
      padding: .3rem .8rem;
      border-radius: 999px;
    }
    .trust-badge {
      display: flex;
      align-items: center;
      gap: .6rem;
      font-size: .82rem;
      color: var(--muted);
      border: 1px solid rgba(255,255,255,.1);
      padding: .45rem 1rem;
      border-radius: 10px;
      backdrop-filter: blur(6px);
    }
    .trust-badge i { color: var(--teal); font-size: 1rem; }
    .trust-badge strong { color: var(--text); }

    /* ── HERO ── */
    .hero {
      flex: 1;
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      gap: 3rem;
      padding: 2.5rem 5vw 2rem;
    }

    /* LEFT */
    .hero-left { position: relative; }

    .pos-logo {
      width: 130px;
      height: 130px;
      margin-bottom: 1.8rem;
      position: relative;
      flex-shrink: 0;
    }
    .pos-logo svg { width: 100%; height: 100%; }

    .hero-title {
      font-family: 'Orbitron', sans-serif;
      font-size: clamp(2.6rem, 5vw, 4rem);
      font-weight: 900;
      color: var(--teal);
      line-height: 1.1;
      margin-bottom: .9rem;
      text-shadow: 0 0 40px rgba(0,212,160,.35);
    }
    .hero-subtitle {
      font-size: clamp(.9rem, 1.4vw, 1.05rem);
      color: var(--muted);
      line-height: 1.7;
      max-width: 400px;
      margin-bottom: 2.2rem;
    }

    .btn-login {
      display: inline-flex;
      align-items: center;
      gap: .55rem;
      background: var(--teal);
      color: #0b0f19;
      font-weight: 700;
      font-size: .95rem;
      padding: .8rem 2rem;
      border-radius: 10px;
      border: none;
      text-decoration: none;
      transition: background .2s, transform .2s, box-shadow .2s;
      box-shadow: 0 0 30px rgba(0,212,160,.35);
    }
    .btn-login:hover {
      background: #00f5b8;
      transform: translateY(-2px);
      box-shadow: 0 0 50px rgba(0,212,160,.55);
      color: #0b0f19;
    }

    .btn-register {
      display: inline-flex;
      align-items: center;
      gap: .55rem;
      background: transparent;
      color: var(--text);
      font-weight: 600;
      font-size: .95rem;
      padding: .8rem 2rem;
      border-radius: 10px;
      border: 1px solid rgba(255,255,255,.18);
      text-decoration: none;
      transition: border-color .2s, background .2s, transform .2s;
    }
    .btn-register:hover {
      border-color: var(--teal);
      background: rgba(0,212,160,.07);
      color: var(--teal);
      transform: translateY(-2px);
    }

    /* RIGHT — monitor scene */
    .hero-right {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem 0;
    }

    /* glow platform */
    .platform-glow {
      position: absolute;
      bottom: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 480px;
      height: 60px;
      background: radial-gradient(ellipse, rgba(0,212,160,.35) 0%, transparent 70%);
      filter: blur(10px);
      border-radius: 50%;
    }

    .monitor-wrap {
      position: relative;
      width: 100%;
      max-width: 540px;
    }

    /* Monitor */
    .monitor {
      background: linear-gradient(145deg, #1a2235, #0f1624);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 30px 80px rgba(0,0,0,.7), 0 0 0 1px rgba(0,212,160,.12);
      animation: float 5s ease-in-out infinite;
    }
    @keyframes float {
      0%,100%{ transform:translateY(0) }
      50%{ transform:translateY(-10px) }
    }

    .monitor-bar {
      background: #0d1422;
      padding: .55rem 1rem;
      display: flex;
      align-items: center;
      gap: .5rem;
      border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .monitor-bar span {
      font-size: .7rem;
      color: var(--muted);
      margin-left: .4rem;
    }
    .dot { width:9px; height:9px; border-radius:50%; }
    .dot-r{background:#ff5f57;} .dot-y{background:#febc2e;} .dot-g{background:#28c840;}

    .dashboard-grid {
      padding: 1rem 1rem .8rem;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: .6rem;
    }
    .stat-card {
      background: rgba(255,255,255,.04);
      border: 1px solid rgba(255,255,255,.07);
      border-radius: 10px;
      padding: .7rem .8rem;
    }
    .stat-label { font-size: .62rem; color: var(--muted); margin-bottom: .25rem; }
    .stat-val { font-family:'Orbitron',sans-serif; font-size: 1.1rem; font-weight:700; color:var(--text); }
    .stat-badge {
      display:inline-block;
      font-size:.6rem;
      padding:.1rem .4rem;
      border-radius:4px;
      background:rgba(0,212,160,.15);
      color:var(--teal);
      margin-top:.15rem;
    }

    /* mini chart */
    .chart-area {
      padding: 0 1rem 1rem;
    }
    .chart-label { font-size:.65rem; color:var(--muted); margin-bottom:.4rem; }
    .chart-svg { width:100%; height:70px; }

    /* floating feature cards */
    .feat-card {
      position: absolute;
      background: rgba(17,24,39,.92);
      border: 1px solid var(--card-border);
      border-radius: 14px;
      padding: .75rem 1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: .35rem;
      font-size: .72rem;
      color: var(--text);
      font-weight: 600;
      text-align: center;
      backdrop-filter: blur(12px);
      box-shadow: 0 8px 32px rgba(0,0,0,.5);
      width: 110px;
      animation: float 5s ease-in-out infinite;
    }
    .feat-card i { font-size: 1.4rem; color: var(--teal); }
    .feat-card.inv { top:-20px; left:-30px; animation-delay:-1s; }
    .feat-card.analytics { left:-55px; top:45%; animation-delay:-2.5s; }
    .feat-card.cust { top:10px; right:-30px; animation-delay:-.8s; }

    /* receipt */
    .receipt-wrap {
      position: absolute;
      bottom: 20px;
      right: -10px;
      width: 105px;
      background: #f8f5f0;
      border-radius: 4px 4px 8px 8px;
      box-shadow: 0 8px 30px rgba(0,0,0,.5);
      padding: .6rem .5rem .4rem;
      animation: float 5s ease-in-out infinite;
      animation-delay:-3s;
    }
    .receipt-wrap .rline { font-size:.5rem; color:#333; display:flex; justify-content:space-between; margin-bottom:.2rem; font-family:monospace; }
    .receipt-wrap .rline.bold { font-weight:700; border-top:1px dashed #bbb; padding-top:.2rem; }
    .receipt-wrap .rthanks { font-size:.45rem; color:#666; text-align:center; margin-top:.3rem; }

    /* pos terminal */
    .terminal-wrap {
      position: absolute;
      bottom: -10px;
      left: -20px;
      width: 90px;
      animation: float 5s ease-in-out infinite;
      animation-delay:-4s;
    }
    .terminal-body {
      background: linear-gradient(160deg,#1c2a3a,#111);
      border-radius:8px;
      padding:.5rem;
      box-shadow:0 8px 24px rgba(0,0,0,.6);
    }
    .terminal-screen { background:#2d4a3e; border-radius:4px; height:32px; display:flex;align-items:center;justify-content:center; margin-bottom:.4rem; }
    .terminal-screen span { font-size:.5rem; color:#7fff6d; font-family:monospace; }
    .keypad { display:grid; grid-template-columns:repeat(3,1fr); gap:2px; }
    .key { background:rgba(255,255,255,.1); border-radius:3px; height:10px; }
    .key.r{background:#e74c3c;} .key.g{background:#2ecc71;} .key.y{background:#f39c12;}
    .terminal-label { text-align:center; font-size:.5rem; color:var(--muted); margin-top:.35rem; letter-spacing:.05em; }

    /* ── FEATURE STRIP ── */
    .feature-strip {
      padding: 1.5rem 5vw 2rem;
      display: grid;
      grid-template-columns: repeat(4,1fr);
      gap: 1.2rem;
      border-top: 1px solid rgba(255,255,255,.06);
    }
    .fstrip-item {
      display: flex;
      align-items: flex-start;
      gap: .8rem;
    }
    .fstrip-icon {
      width: 44px;
      height: 44px;
      border-radius: 10px;
      border: 1px solid var(--card-border);
      background: rgba(0,212,160,.08);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .fstrip-icon i { font-size: 1.15rem; color: var(--teal); }
    .fstrip-title { font-size:.88rem; font-weight:600; color:var(--text); margin-bottom:.2rem; }
    .fstrip-desc { font-size:.75rem; color:var(--muted); line-height:1.5; }

    /* ── RESPONSIVE ── */
    @media(max-width:900px){
      .hero{ grid-template-columns:1fr; text-align:center; padding:2rem 5vw 1rem; }
      .hero-subtitle{ max-width:100%; margin-inline:auto; }
      .hero-left{ display:flex; flex-direction:column; align-items:center; }
      .hero-right{ display:none; }
      .feature-strip{ grid-template-columns:1fr 1fr; }
    }
    @media(max-width:500px){
      .feature-strip{ grid-template-columns:1fr; }
      .top-nav{ padding:1rem 1.2rem; }
    }
  </style>
</head>
<body>

<!-- background orbs -->
<div class="bg-orb orb1"></div>
<div class="bg-orb orb2"></div>
<div class="bg-orb orb3"></div>

<div class="page-wrapper">

  <!-- ── NAV ── -->
  <nav class="top-nav">
    <div class="nav-badge">
      <i class="bi bi-stars"></i> Smart Business Solution
    </div>
    <div class="trust-badge">
      <i class="bi bi-shield-check-fill"></i>
      Trusted by <strong>&nbsp;1000+ Businesses</strong>
    </div>
  </nav>

  <!-- ── HERO ── -->
  <section class="hero">

    <!-- LEFT -->
    <div class="hero-left">

      <!-- POS logo circle -->
      <div class="pos-logo">
        <svg viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="ring" x1="0" y1="0" x2="130" y2="130" gradientUnits="userSpaceOnUse">
              <stop stop-color="#00d4a0"/>
              <stop offset="1" stop-color="#0077ff"/>
            </linearGradient>
          </defs>
          <circle cx="65" cy="65" r="60" stroke="url(#ring)" stroke-width="5" stroke-linecap="round"
            stroke-dasharray="200 180" stroke-dashoffset="-30"/>
          <circle cx="65" cy="65" r="60" stroke="rgba(0,170,255,.2)" stroke-width="1.5"/>
          <text x="50%" y="57%" dominant-baseline="middle" text-anchor="middle"
            font-family="'Orbitron',sans-serif" font-weight="900" font-size="32"
            fill="white" filter="url(#glow)">POS</text>
          <defs>
            <filter id="glow" x="-30%" y="-30%" width="160%" height="160%">
              <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur"/>
              <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
            </filter>
          </defs>
        </svg>
      </div>

      <h1 class="hero-title">Point of Sale</h1>
      <p class="hero-subtitle">Powerful, simple, and reliable POS software<br>to grow your business effortlessly.</p>
    
      @if (Route::has('login'))
        <div class="d-flex flex-wrap gap-3">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register"><i class="bi bi-person-plus"></i> Register</a>
                @endif
            @endauth
        </div>
      @endif
    </div>

    <!-- RIGHT -->
    <div class="hero-right">
      <div class="monitor-wrap">

        <!-- floating cards -->
        <div class="feat-card inv">
          <i class="bi bi-box-seam"></i>
          Inventory<br>Management
        </div>
        <div class="feat-card analytics">
          <i class="bi bi-bar-chart-line"></i>
          Sales<br>Analytics
        </div>
        <div class="feat-card cust">
          <i class="bi bi-people-fill"></i>
          Customer<br>Management
        </div>

        <!-- monitor -->
        <div class="monitor">
          <div class="monitor-bar">
            <div class="dot dot-r"></div>
            <div class="dot dot-y"></div>
            <div class="dot dot-g"></div>
            <span>Dashboard</span>
          </div>
          <div class="dashboard-grid">
            <div class="stat-card">
              <div class="stat-label">Total Sales</div>
              <div class="stat-val">৳24,850</div>
              <div class="stat-badge">+12.5%</div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Transactions</div>
              <div class="stat-val">320</div>
              <div class="stat-badge">+8.3%</div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Customers</div>
              <div class="stat-val">150</div>
              <div class="stat-badge">+5.7%</div>
            </div>
          </div>
          <div class="chart-area">
            <div class="chart-label">Sales Overview — This Month</div>
            <svg class="chart-svg" viewBox="0 0 400 70" preserveAspectRatio="none">
              <defs>
                <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#00d4a0" stop-opacity=".35"/>
                  <stop offset="100%" stop-color="#00d4a0" stop-opacity="0"/>
                </linearGradient>
              </defs>
              <path d="M0 60 C40 50,80 40,120 35 S200 20,240 25 S320 10,400 5 L400 70 L0 70 Z"
                fill="url(#chartGrad)"/>
              <path d="M0 60 C40 50,80 40,120 35 S200 20,240 25 S320 10,400 5"
                fill="none" stroke="#00d4a0" stroke-width="2"/>
              <!-- axis labels -->
              <text x="0"   y="69" font-size="6" fill="#64748b">Jan</text>
              <text x="58"  y="69" font-size="6" fill="#64748b">Feb</text>
              <text x="115" y="69" font-size="6" fill="#64748b">Mar</text>
              <text x="172" y="69" font-size="6" fill="#64748b">Apr</text>
              <text x="229" y="69" font-size="6" fill="#64748b">May</text>
              <text x="286" y="69" font-size="6" fill="#64748b">Jun</text>
              <text x="343" y="69" font-size="6" fill="#64748b">Jul</text>
            </svg>
          </div>
        </div>

        <!-- receipt -->
        <div class="receipt-wrap">
          <div class="rline bold"><span>THANK YOU!</span></div>
          <div class="rline"><span>Subtotal</span><span>৳23,500</span></div>
          <div class="rline"><span>Tax (7%)</span><span>৳2,750</span></div>
          <div class="rline"><span>Discount</span><span>-৳500</span></div>
          <div class="rline bold"><span>Total</span><span>৳24,850</span></div>
          <div class="rthanks">Please Visit Again!</div>
        </div>

        <!-- POS terminal -->
        <div class="terminal-wrap">
          <div class="terminal-body">
            <div class="terminal-screen"><span>POS READY</span></div>
            <div class="keypad">
              <div class="key"></div><div class="key"></div><div class="key"></div>
              <div class="key"></div><div class="key"></div><div class="key"></div>
              <div class="key r"></div><div class="key g"></div><div class="key y"></div>
            </div>
          </div>
          <div class="terminal-label">POS</div>
        </div>

        <!-- glow -->
        <div class="platform-glow"></div>
      </div>
    </div>
  </section>

  <!-- ── FEATURE STRIP ── -->
  <section class="feature-strip">
    <div class="fstrip-item">
      <div class="fstrip-icon"><i class="bi bi-shield-lock-fill"></i></div>
      <div>
        <div class="fstrip-title">Secure &amp; Safe</div>
        <div class="fstrip-desc">Your data is always protected</div>
      </div>
    </div>
    <div class="fstrip-item">
      <div class="fstrip-icon"><i class="bi bi-cloud-arrow-up-fill"></i></div>
      <div>
        <div class="fstrip-title">Cloud Sync</div>
        <div class="fstrip-desc">Access your business anytime, anywhere</div>
      </div>
    </div>
    <div class="fstrip-item">
      <div class="fstrip-icon"><i class="bi bi-lightning-charge-fill"></i></div>
      <div>
        <div class="fstrip-title">Lightning Fast</div>
        <div class="fstrip-desc">Get things done faster than ever</div>
      </div>
    </div>
    <div class="fstrip-item">
      <div class="fstrip-icon"><i class="bi bi-headset"></i></div>
      <div>
        <div class="fstrip-title">24/7 Support</div>
        <div class="fstrip-desc">We're here whenever you need us</div>
      </div>
    </div>
  </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>