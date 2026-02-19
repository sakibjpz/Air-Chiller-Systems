@extends('layouts.frontend')

@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&family=Barlow+Condensed:wght@400;600;700&display=swap');

  :root {
    --ink:     #0a0c10;
    --steel:   #111520;
    --mid:     #1c2030;
    --surface: #232840;
    --border:  rgba(255,255,255,0.07);
    --gold:    #f0a500;
    --gold-dim:#b87a00;
    --ice:     #5db8f5;
    --white:   #f4f6fb;
    --muted:   #8a93ad;
    --radius:  4px;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  .ab-page {
    background: var(--ink);
    color: var(--white);
    font-family: 'Barlow', sans-serif;
    overflow-x: hidden;
  }

  /* ─── UTILITY ─── */
  .ab-container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
  .ab-tag {
    display: inline-flex; align-items: center; gap: 0.5rem;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.75rem; letter-spacing: 0.18em; text-transform: uppercase;
    color: var(--gold); font-weight: 600;
  }
  .ab-tag::before {
    content: ''; display: block; width: 24px; height: 2px; background: var(--gold);
  }

  /* ─── HERO ─── */
  .ab-hero {
    position: relative; min-height: 92vh;
    display: flex; align-items: flex-end;
    overflow: hidden;
    background: var(--ink);
  }
  .ab-hero__bg {
    position: absolute; inset: 0; z-index: 0;
    /* 👇 Add your hero image here: background: url('{{ asset("images/your-hero.jpg") }}') center/cover no-repeat; */
    background: var(--steel);
  }
  .ab-hero__bg::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(
      135deg,
      rgba(10,12,16,0.97) 0%,
      rgba(10,12,16,0.85) 40%,
      rgba(10,12,16,0.55) 100%
    );
  }
  /* industrial grid overlay */
  .ab-hero__grid {
    position: absolute; inset: 0; z-index: 1;
    background-image:
      linear-gradient(rgba(93,184,245,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(93,184,245,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
  }
  /* diagonal accent stripe */
  .ab-hero__stripe {
    position: absolute; right: -80px; top: 0; bottom: 0;
    width: 420px; z-index: 1;
    background: linear-gradient(180deg, var(--gold) 0%, var(--gold-dim) 100%);
    clip-path: polygon(18% 0, 100% 0, 100% 100%, 0% 100%);
    opacity: 0.06;
  }
  .ab-hero__content {
    position: relative; z-index: 2;
    padding: 0 0 7rem 0; width: 100%;
  }
  .ab-hero__year {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(120px, 18vw, 260px);
    line-height: 0.85;
    color: transparent;
    -webkit-text-stroke: 1px rgba(240,165,0,0.18);
    position: absolute; right: -1rem; bottom: 3rem;
    pointer-events: none; user-select: none;
    z-index: 1;
  }
  .ab-hero__inner { position: relative; z-index: 2; }
  .ab-hero__title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(52px, 8vw, 110px);
    line-height: 0.92;
    letter-spacing: 0.01em;
    color: var(--white);
    margin: 1.2rem 0 1.8rem;
  }
  .ab-hero__title em {
    font-style: normal;
    color: var(--gold);
    display: block;
  }
  .ab-hero__sub {
    font-size: 1.05rem; color: var(--muted);
    font-weight: 300; line-height: 1.7;
    max-width: 520px;
    letter-spacing: 0.02em;
  }
  .ab-hero__pills {
    display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 2.5rem;
  }
  .ab-hero__pill {
    padding: 0.45rem 1.1rem;
    border: 1px solid rgba(240,165,0,0.35);
    border-radius: 2px;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.8rem; letter-spacing: 0.12em; text-transform: uppercase;
    color: var(--gold); font-weight: 600;
    background: rgba(240,165,0,0.06);
  }
  /* scroll hint */
  .ab-hero__scroll {
    position: absolute; bottom: 2.5rem; left: 50%; transform: translateX(-50%);
    z-index: 3; display: flex; flex-direction: column; align-items: center; gap: 0.5rem;
    color: var(--muted); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase;
  }
  .ab-hero__scroll-line {
    width: 1px; height: 48px;
    background: linear-gradient(to bottom, var(--gold), transparent);
    animation: scrollPulse 2s ease-in-out infinite;
  }
  @keyframes scrollPulse {
    0%,100% { opacity: 0.3; transform: scaleY(1); }
    50%      { opacity: 1;   transform: scaleY(1.15); }
  }

  /* ─── STATS BAR ─── */
  .ab-stats {
    background: var(--gold);
    padding: 0;
  }
  .ab-stats__inner {
    display: grid; grid-template-columns: repeat(4, 1fr);
  }
  .ab-stats__item {
    padding: 2rem 1.5rem;
    border-right: 1px solid rgba(0,0,0,0.12);
    text-align: center;
  }
  .ab-stats__item:last-child { border-right: none; }
  .ab-stats__num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 3rem; line-height: 1;
    color: var(--ink);
  }
  .ab-stats__label {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.72rem; letter-spacing: 0.15em; text-transform: uppercase;
    color: rgba(10,12,16,0.65); font-weight: 600; margin-top: 0.3rem;
  }

  /* ─── STORY ─── */
  .ab-story { padding: 8rem 0; background: var(--ink); }
  .ab-story__grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 6rem; align-items: center;
  }
  .ab-story__visual {
    position: relative;
  }
  .ab-story__img {
    width: 100%; border-radius: var(--radius);
    display: block; aspect-ratio: 4/5; object-fit: cover;
    filter: grayscale(20%);
  }
  .ab-story__img-placeholder {
    width: 100%; aspect-ratio: 4/5;
    background: var(--mid);
    border-radius: var(--radius);
    border: 1px dashed rgba(255,255,255,0.1);
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 0.75rem;
  }
  .ab-story__img-placeholder span {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.75rem; letter-spacing: 0.12em; text-transform: uppercase;
    color: rgba(255,255,255,0.2);
  }
  .ab-story__img-inset {
    position: absolute;
    bottom: 60px; right: -32px;
    width: 52%; aspect-ratio: 16/10;
    object-fit: cover;
    border-radius: var(--radius);
    border: 3px solid var(--ink);
    box-shadow: 0 16px 48px rgba(0,0,0,0.6);
    filter: grayscale(10%);
  }
  .ab-story__img-frame {
    position: absolute; inset: -16px;
    border: 1px solid rgba(240,165,0,0.2);
    border-radius: var(--radius);
    pointer-events: none;
  }
  .ab-story__badge {
    position: absolute; bottom: -20px; right: -20px;
    width: 130px; height: 130px;
    background: var(--gold);
    border-radius: 50%;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    box-shadow: 0 20px 60px rgba(240,165,0,0.35);
  }
  .ab-story__badge-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 2.8rem; line-height: 1; color: var(--ink);
  }
  .ab-story__badge-txt {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase;
    color: rgba(10,12,16,0.7); text-align: center; line-height: 1.3;
  }
  .ab-story__body { }
  .ab-story__heading {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(40px, 5vw, 64px);
    line-height: 0.95; color: var(--white);
    margin: 1rem 0 1.8rem;
  }
  .ab-story__heading span { color: var(--gold); }
  .ab-story__text {
    font-size: 1rem; line-height: 1.8; color: var(--muted);
    font-weight: 300; margin-bottom: 1.2rem;
  }
  .ab-story__divider {
    width: 48px; height: 2px;
    background: var(--gold);
    margin: 2rem 0;
  }

  /* ─── VISION / MISSION ─── */
  .ab-vm { padding: 5rem 0; background: var(--steel); }
  .ab-vm__grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; }
  .ab-vm__card {
    padding: 4rem 3.5rem;
    background: var(--mid);
    position: relative; overflow: hidden;
  }
  .ab-vm__card::before {
    content: '';
    position: absolute; top: 0; left: 0;
    width: 4px; height: 100%;
    background: var(--gold);
  }
  .ab-vm__card:last-child::before { background: var(--ice); }
  .ab-vm__icon {
    width: 52px; height: 52px;
    display: flex; align-items: center; justify-content: center;
    border: 1px solid rgba(240,165,0,0.25);
    border-radius: 2px;
    margin-bottom: 2rem;
    color: var(--gold);
  }
  .ab-vm__card:last-child .ab-vm__icon {
    border-color: rgba(93,184,245,0.25);
    color: var(--ice);
  }
  .ab-vm__title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 2rem; letter-spacing: 0.05em;
    color: var(--white); margin-bottom: 1rem;
  }
  .ab-vm__text {
    font-size: 0.97rem; line-height: 1.8;
    color: var(--muted); font-weight: 300;
  }
  /* big BG letter */
  .ab-vm__bg-letter {
    position: absolute; right: -0.5rem; bottom: -1rem;
    font-family: 'Bebas Neue', sans-serif;
    font-size: 9rem; line-height: 1;
    color: rgba(255,255,255,0.025);
    pointer-events: none; user-select: none;
  }

  /* ─── EXPERTISE ─── */
  .ab-expertise { padding: 8rem 0; background: var(--ink); }
  .ab-section-head { text-align: center; margin-bottom: 4rem; }
  .ab-section-head .ab-tag { justify-content: center; }
  .ab-section-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(36px, 5vw, 60px);
    color: var(--white); margin-top: 1rem; line-height: 1;
  }
  .ab-section-title span { color: var(--gold); }
  .ab-expertise__grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 1px;
    background: var(--border);
    border: 1px solid var(--border);
  }
  .ab-expertise__item {
    background: var(--mid);
    padding: 1.8rem 1.5rem;
    position: relative;
    transition: background 0.25s;
    cursor: default;
  }
  .ab-expertise__item:hover { background: var(--surface); }
  .ab-expertise__item:hover .ab-expertise__num { color: var(--gold); }
  .ab-expertise__num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 2rem; color: rgba(255,255,255,0.07);
    display: block; line-height: 1;
    transition: color 0.25s;
  }
  .ab-expertise__name {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.85rem; letter-spacing: 0.08em; text-transform: uppercase;
    color: var(--muted); font-weight: 600; margin-top: 0.5rem;
    display: block;
    transition: color 0.25s;
  }
  .ab-expertise__item:hover .ab-expertise__name { color: var(--white); }

  /* ─── PROJECT IMAGE STRIP ─── */
  .ab-imgstrip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 3px;
    background: var(--ink);
  }
  .ab-imgstrip__item {
    position: relative;
    overflow: hidden;
    aspect-ratio: 3/2;
    cursor: default;
  }
  .ab-imgstrip__item img {
    width: 100%; height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease, filter 0.5s ease;
    filter: grayscale(40%) brightness(0.7);
  }
  .ab-imgstrip__item:hover img {
    transform: scale(1.06);
    filter: grayscale(0%) brightness(0.9);
  }
  .ab-imgstrip__placeholder {
    width: 100%; height: 100%;
    background: var(--mid);
    border: 1px dashed rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
  }
  .ab-imgstrip__placeholder span {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase;
    color: rgba(255,255,255,0.18);
  }
  .ab-imgstrip__label {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 1.2rem 1rem 1rem;
    background: linear-gradient(to top, rgba(10,12,16,0.85), transparent);
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase;
    color: var(--gold); font-weight: 600;
    transform: translateY(6px);
    transition: transform 0.3s;
  }
  .ab-imgstrip__item:hover .ab-imgstrip__label { transform: none; }
  @media (max-width: 700px) {
    .ab-imgstrip { grid-template-columns: repeat(2, 1fr); }
    .ab-story__img-inset { display: none; }
  }

  /* ─── SCOPE ─── */
  .ab-scope { padding: 8rem 0; background: var(--steel); }
  .ab-scope__cols { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; }
  .ab-scope__heading {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 1.8rem; letter-spacing: 0.04em;
    margin-bottom: 2rem; display: flex; align-items: center; gap: 1rem;
  }
  .ab-scope__heading::after {
    content: ''; flex: 1; height: 1px;
    background: var(--border);
  }
  .ab-scope__heading.--supply { color: var(--gold); }
  .ab-scope__heading.--mfg    { color: var(--ice); }
  .ab-scope__list {
    display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;
  }
  .ab-scope__chip {
    padding: 0.75rem 1rem;
    background: var(--mid);
    border-left: 2px solid transparent;
    font-size: 0.87rem; color: var(--muted);
    transition: all 0.2s;
    font-weight: 400;
  }
  .ab-scope__chip:hover {
    border-left-color: var(--gold);
    color: var(--white);
    background: var(--surface);
    padding-left: 1.3rem;
  }
  .ab-scope__cols > div:last-child .ab-scope__chip:hover {
    border-left-color: var(--ice);
  }

  /* ─── PARTNERS ─── */
  .ab-partners { padding: 6rem 0; background: var(--mid); }
  .ab-partners__track {
    display: flex; gap: 0;
    overflow: hidden;
    position: relative;
    margin-top: 3rem;
  }
  .ab-partners__track::before,
  .ab-partners__track::after {
    content: ''; position: absolute; top: 0; bottom: 0; width: 120px; z-index: 2;
  }
  .ab-partners__track::before { left: 0; background: linear-gradient(to right, var(--mid), transparent); }
  .ab-partners__track::after  { right: 0; background: linear-gradient(to left, var(--mid), transparent); }
  .ab-partners__slide {
    display: flex; gap: 0;
    animation: marquee 22s linear infinite;
    flex-shrink: 0;
  }
  .ab-partners__item {
    padding: 1.5rem 3.5rem;
    border-right: 1px solid var(--border);
    font-family: 'Bebas Neue', sans-serif;
    font-size: 1.5rem; letter-spacing: 0.12em;
    color: rgba(255,255,255,0.15);
    white-space: nowrap;
    transition: color 0.25s;
  }
  .ab-partners__item:hover { color: var(--gold); }
  @keyframes marquee {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-100%); }
  }

  /* ─── CTA ─── */
  .ab-cta {
    padding: 8rem 0;
    background: var(--ink);
    position: relative; overflow: hidden;
  }
  .ab-cta::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 80% 60% at 50% 0%, rgba(240,165,0,0.07), transparent 70%);
  }
  .ab-cta__inner {
    position: relative; z-index: 1;
    text-align: center;
  }
  .ab-cta__title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 7vw, 96px);
    line-height: 0.92;
    color: var(--white);
    margin: 1rem 0 2rem;
  }
  .ab-cta__title em {
    font-style: normal; color: var(--gold);
    display: block;
  }
  .ab-cta__text {
    font-size: 1rem; color: var(--muted);
    font-weight: 300; max-width: 480px; margin: 0 auto 3rem;
    line-height: 1.8;
  }
  .ab-cta__btn {
    display: inline-flex; align-items: center; gap: 0.75rem;
    background: var(--gold);
    color: var(--ink);
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 0.9rem; letter-spacing: 0.12em; text-transform: uppercase;
    font-weight: 700;
    padding: 1rem 2.5rem;
    text-decoration: none;
    border-radius: var(--radius);
    transition: all 0.2s;
  }
  .ab-cta__btn:hover {
    background: #fdb500;
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(240,165,0,0.3);
  }
  .ab-cta__btn svg { transition: transform 0.2s; }
  .ab-cta__btn:hover svg { transform: translateX(4px); }

  /* ─── REVEAL ANIMATIONS ─── */
  .ab-reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.7s ease, transform 0.7s ease;
  }
  .ab-reveal.--visible {
    opacity: 1;
    transform: none;
  }
  .ab-reveal.--delay-1 { transition-delay: 0.1s; }
  .ab-reveal.--delay-2 { transition-delay: 0.2s; }
  .ab-reveal.--delay-3 { transition-delay: 0.3s; }
  .ab-reveal.--delay-4 { transition-delay: 0.4s; }

  /* ─── RESPONSIVE ─── */
  @media (max-width: 900px) {
    .ab-story__grid  { grid-template-columns: 1fr; gap: 4rem; }
    .ab-story__img   { aspect-ratio: 16/9; }
    .ab-vm__grid     { grid-template-columns: 1fr; gap: 2px; }
    .ab-scope__cols  { grid-template-columns: 1fr; gap: 4rem; }
    .ab-stats__inner { grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 560px) {
    .ab-stats__inner { grid-template-columns: repeat(2, 1fr); }
    .ab-scope__list  { grid-template-columns: 1fr; }
    .ab-vm__card     { padding: 3rem 2rem; }
  }
</style>

<div class="ab-page">

  {{-- ════ HERO ════ --}}
  <section class="ab-hero">
    <div class="ab-hero__bg"></div>
    <div class="ab-hero__grid"></div>
    <div class="ab-hero__stripe"></div>
    <div class="ab-hero__year">1992</div>

    <div class="ab-hero__content ab-container">
      <div class="ab-hero__inner">
        <span class="ab-tag">About Us</span>
        <h1 class="ab-hero__title">
          Engineering<br>
          <em>Excellence.</em>
        </h1>
        <p class="ab-hero__sub">
          Bangladesh's leading industrial HVAC authority since 1992 — delivering
          precision-engineered cooling, mechanical, and electrical systems to the industries that power the nation.
        </p>
        <div class="ab-hero__pills">
          <span class="ab-hero__pill">Industrial HVAC</span>
          <span class="ab-hero__pill">Chillers & Cooling</span>
          <span class="ab-hero__pill">PLC / HMI Systems</span>
          <span class="ab-hero__pill">24 × 7 Service</span>
        </div>
      </div>
    </div>

    <div class="ab-hero__scroll">
      <div class="ab-hero__scroll-line"></div>
      <span>Scroll</span>
    </div>
  </section>

  {{-- ════ STATS BAR ════ --}}
  <div class="ab-stats">
    <div class="ab-stats__inner">
      <div class="ab-stats__item">
        <div class="ab-stats__num">1992</div>
        <div class="ab-stats__label">Founded</div>
      </div>
      <div class="ab-stats__item">
        <div class="ab-stats__num">150+</div>
        <div class="ab-stats__label">Skilled Team</div>
      </div>
      <div class="ab-stats__item">
        <div class="ab-stats__num">24 / 7</div>
        <div class="ab-stats__label">Service Support</div>
      </div>
      <div class="ab-stats__item">
        <div class="ab-stats__num">10+</div>
        <div class="ab-stats__label">Countries Sourced</div>
      </div>
    </div>
  </div>

  {{-- ════ STORY ════ --}}
  <section class="ab-story">
    <div class="ab-container">
      <div class="ab-story__grid">

        <div class="ab-story__visual ab-reveal">
          {{-- 👇 Replace src with your own image path e.g. {{ asset('images/about-photo.jpg') }} --}}
          <div class="ab-story__img-placeholder">
            <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24" style="color:rgba(255,255,255,0.15)">
              <rect x="3" y="3" width="18" height="18" rx="2"/>
              <circle cx="8.5" cy="8.5" r="1.5"/>
              <path d="M21 15l-5-5L5 21"/>
            </svg>
            <span>Your Photo Here</span>
            {{-- Once ready: <img src="{{ asset('images/your-photo.jpg') }}" alt="About us" class="ab-story__img"> --}}
          </div>
          <div class="ab-story__img-frame"></div>
          <div class="ab-story__badge">
            <span class="ab-story__badge-num">25+</span>
            <span class="ab-story__badge-txt">Years of<br>Excellence</span>
          </div>
        </div>

        <div class="ab-story__body">
          <span class="ab-tag ab-reveal">Our Story</span>
          <h2 class="ab-story__heading ab-reveal --delay-1">
            Who <span>We</span><br>Are
          </h2>
          <p class="ab-story__text ab-reveal --delay-2">
            Mohiuddin Engineers &amp; Traders is a premier business organization specializing in industrial HVAC systems. Since 1992, we have stood at the forefront of providing comprehensive mechanical and electrical solutions to diverse industries across Bangladesh.
          </p>
          <p class="ab-story__text ab-reveal --delay-2">
            We specialize in advanced chiller systems with VFD, WY-Delta Starters, Solid State Soft Starters, Autotransformer Starters, and cutting-edge control technologies including PLC, CPU, HMI, and precision sensors.
          </p>
          <div class="ab-story__divider ab-reveal --delay-3"></div>
          <p class="ab-story__text ab-reveal --delay-3">
            With a seasoned team of 150+ engineers and technicians backed by partnerships spanning 10+ countries, we deliver solutions that keep industry running — around the clock, every day of the year.
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- ════ VISION / MISSION ════ --}}
  <section class="ab-vm">
    <div class="ab-container">
      <div class="ab-section-head ab-reveal">
        <span class="ab-tag">Purpose</span>
        <h2 class="ab-section-title">Vision &amp; <span>Mission</span></h2>
      </div>
      <div class="ab-vm__grid">
        <div class="ab-vm__card ab-reveal">
          <div class="ab-vm__icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="3"/>
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/>
            </svg>
          </div>
          <div class="ab-vm__title">Our Vision</div>
          <p class="ab-vm__text">
            To build a trusted national brand through uncompromising quality and round-the-clock service — reducing the import dependency of our investors and partners by delivering world-class industrial solutions from home.
          </p>
          <div class="ab-vm__bg-letter">V</div>
        </div>
        <div class="ab-vm__card ab-reveal --delay-2">
          <div class="ab-vm__icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"/>
            </svg>
          </div>
          <div class="ab-vm__title">Our Mission</div>
          <p class="ab-vm__text">
            To manufacture all kinds of air conditioning and cooling systems using the world's best-performing machinery, backed by instant, responsive service — so our clients can focus on what they do best.
          </p>
          <div class="ab-vm__bg-letter">M</div>
        </div>
      </div>
    </div>
  </section>

  {{-- ════ EXPERTISE ════ --}}
  <section class="ab-expertise">
    <div class="ab-container">
      <div class="ab-section-head ab-reveal">
        <span class="ab-tag">Technical Depth</span>
        <h2 class="ab-section-title">Our <span>Specializations</span></h2>
      </div>
      <div class="ab-expertise__grid ab-reveal --delay-1">
        @php
          $specializations = [
            'Chiller with VFD',
            'WY-Delta Starter',
            'Solid State Soft Starter',
            'Autotransformer Starter',
            'Part Winding Starter',
            'PLC & CPU Controllers',
            'HMI & Sensors',
            'PT-100 & Solenoid Valves',
            'Expansion Valves',
            'Cooling Towers',
            'AHU Systems',
            'Cold Storage Units',
          ];
        @endphp
        @foreach($specializations as $i => $item)
          <div class="ab-expertise__item">
            <span class="ab-expertise__num">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</span>
            <span class="ab-expertise__name">{{ $item }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ════ PROJECT IMAGE STRIP ════ --}}
  {{-- 👇 Add your 4 project images below. Replace the placeholder divs with <img> tags --}}
  <div class="ab-imgstrip">
    <div class="ab-imgstrip__item">
      <div class="ab-imgstrip__placeholder">
        <span>Project Photo 1</span>
      </div>
      {{-- <img src="{{ asset('images/project-1.jpg') }}" alt="Chiller Systems"> --}}
      <div class="ab-imgstrip__label">Chiller Systems</div>
    </div>
    <div class="ab-imgstrip__item">
      <div class="ab-imgstrip__placeholder">
        <span>Project Photo 2</span>
      </div>
      {{-- <img src="{{ asset('images/project-2.jpg') }}" alt="Cooling Towers"> --}}
      <div class="ab-imgstrip__label">Cooling Towers</div>
    </div>
    <div class="ab-imgstrip__item">
      <div class="ab-imgstrip__placeholder">
        <span>Project Photo 3</span>
      </div>
      {{-- <img src="{{ asset('images/project-3.jpg') }}" alt="Pipeline & Mechanical"> --}}
      <div class="ab-imgstrip__label">Pipeline & Mechanical</div>
    </div>
    <div class="ab-imgstrip__item">
      <div class="ab-imgstrip__placeholder">
        <span>Project Photo 4</span>
      </div>
      {{-- <img src="{{ asset('images/project-4.jpg') }}" alt="Control Systems"> --}}
      <div class="ab-imgstrip__label">Control Systems</div>
    </div>
  </div>

  {{-- ════ SCOPE ════ --}}
  <section class="ab-scope">
    <div class="ab-container">
      <div class="ab-section-head ab-reveal">
        <span class="ab-tag">What We Do</span>
        <h2 class="ab-section-title">Scope of <span>Work</span></h2>
      </div>
      <div class="ab-scope__cols">
        <div class="ab-reveal">
          <div class="ab-scope__heading --supply">Supply</div>
          <div class="ab-scope__list">
            @foreach(['Chiller','Air Conditioner','Water Cooled Chiller','Air Cooled Chiller','AHU','Cold Storage','Blast Freezing','Cooling Tower','Refrigerated Covered Van','Air Dryer','Dehumidifier','Sandwich Panel'] as $s)
              <div class="ab-scope__chip">{{ $s }}</div>
            @endforeach
          </div>
        </div>
        <div class="ab-reveal --delay-2">
          <div class="ab-scope__heading --mfg">Application &amp; Manufacturing</div>
          <div class="ab-scope__list">
            @foreach(['Food & Beverage','Pharmaceuticals','Chemical Industries','Garments & Fashions','Plastic & Polymer','Poultry & Hatchery','Tobacco Industries','Agro Industries','Salt Industries','Feed Mills','Health Care','Cosmetics'] as $s)
              <div class="ab-scope__chip">{{ $s }}</div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ════ PARTNERS MARQUEE ════ --}}
  <section class="ab-partners">
    <div class="ab-container">
      <div class="ab-section-head ab-reveal">
        <span class="ab-tag">Global Sourcing</span>
        <h2 class="ab-section-title">Our <span>Partners</span></h2>
      </div>
    </div>
    <div class="ab-partners__track">
      <div class="ab-partners__slide" id="partnerSlide">
        @foreach(['Germany','Japan','Italy','Belgium','Denmark','France','South Korea','Singapore','India','China'] as $p)
          <div class="ab-partners__item">{{ $p }}</div>
        @endforeach
      </div>
      {{-- JS duplicates slide for seamless loop --}}
    </div>
  </section>

  {{-- ════ CTA ════ --}}
  <section class="ab-cta">
    <div class="ab-container">
      <div class="ab-cta__inner">
        <span class="ab-tag" style="justify-content:center; display:inline-flex;">Get In Touch</span>
        <h2 class="ab-cta__title">
          Ready to<br>
          <em>Engineer More?</em>
        </h2>
        <p class="ab-cta__text">
          Our team is available 24 hours a day, 7 days a week. Let's discuss your next industrial project.
        </p>
        <a href="/contact" class="ab-cta__btn">
          Contact Us Now
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
  </section>

</div>{{-- /ab-page --}}

<script>
  // ── Scroll-reveal
  const reveals = document.querySelectorAll('.ab-reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('--visible'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => io.observe(el));

  // ── Duplicate marquee for seamless loop
  const slide = document.getElementById('partnerSlide');
  if (slide) {
    const track = slide.parentElement;
    const clone = slide.cloneNode(true);
    clone.setAttribute('aria-hidden', 'true');
    track.appendChild(clone);
  }

  // ── Animated counters on stats bar
  function animateCounter(el, target, duration = 1500) {
    const isYear = target > 1000;
    let start = null;
    const startVal = isYear ? target - 32 : 0;
    const step = (ts) => {
      if (!start) start = ts;
      const progress = Math.min((ts - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const current = Math.floor(startVal + (target - startVal) * eased);
      el.textContent = isYear ? current : (current + (el.dataset.suffix || ''));
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }

  const statNums = document.querySelectorAll('.ab-stats__num');
  const statMap = { '1992': 1992, '150+': 150, '24 / 7': null, '10+': 10 };
  const statIO = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el = e.target;
      const raw = el.textContent.trim();
      if (raw === '24 / 7') return; // keep as-is
      const num = parseInt(raw.replace(/\D/g, ''));
      const suffix = raw.replace(/[\d\s]/g, '');
      el.dataset.suffix = suffix;
      animateCounter(el, num);
      statIO.unobserve(el);
    });
  }, { threshold: 0.5 });
  statNums.forEach(el => statIO.observe(el));
</script>

@endsection