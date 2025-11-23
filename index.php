<?php
/**
 * Main template file
 */
get_header();
?>

<!-- =============================== -->

<!-- 🔵 STATUS BAR (Open / Closed) -->

<!-- =============================== -->

<div class="w-full bg-emerald-500 text-white text-xs font-semibold tracking-wide py-2 text-center hidden" id="status-indicator">

  We’re Open & Enrolling Today — Schedule a Tour

</div>

<!-- Divider shown during open hours -->

<div id="status-divider" class="hidden h-[1px] w-full bg-emerald-500/40"></div>

<!-- =============================== -->

<!-- 🔵 NAVIGATION -->

<!-- =============================== -->

<header id="navbar" class="sticky top-0 z-50 nav-glass shadow-soft border-b border-slate-200/50">

  <div class="max-w-7xl mx-auto px-4 lg:px-6 h-[82px] flex items-center justify-between">

    <!-- BRAND -->

    <a href="#" class="group flex items-center gap-3">

      <div class="w-12 h-12 rounded-2xl bg-white shadow-soft flex items-center justify-center overflow-hidden">

        <img src="148359.png" alt="Chroma Logo" class="w-10 h-10 group-hover:scale-110 transition-transform duration-500" />

      </div>

      <div class="leading-tight">

        <div class="font-serif text-[22px] font-bold tracking-tight text-brand-navy">Chroma</div>

        <div class="text-[11px] uppercase tracking-[0.2em] text-chroma-teal font-semibold">Early Learning Academy</div>

      </div>

    </a>

    <!-- DESKTOP NAV -->

    <nav class="hidden md:flex items-center gap-8 text-[14px] font-semibold text-slate-700">

      <a href="#programs" class="hover:text-brand-navy transition-colors">Programs</a>

      <a href="#curriculum" class="hover:text-brand-navy transition-colors">Curriculum</a>

      <a href="#schedule" class="hover:text-brand-navy transition-colors">A Day in the Life</a>

      <a href="#locations" class="hover:text-brand-navy transition-colors">Locations</a>

      <a href="#faq" class="hover:text-brand-navy transition-colors">FAQ</a>

      <a href="#tour" class="magnetic inline-flex items-center gap-2 bg-brand-navy text-white text-xs font-semibold tracking-[0.2em] px-6 py-3 rounded-full shadow-soft hover:bg-slate-900 transition-all">

        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>

        Book A Tour

      </a>

    </nav>

    <!-- MOBILE MENU BUTTON -->

    <button id="menu-btn" class="md:hidden text-3xl text-brand-navy">☰</button>

  </div>

  <!-- =============================== -->

  <!-- 🔵 MOBILE SLIDE-IN MENU -->

  <!-- =============================== -->

  <div id="mobile-menu" class="fixed inset-0 bg-white z-50 translate-x-full transition-transform duration-300 md:hidden flex flex-col">

    <div class="flex items-center justify-between px-5 py-5 border-b border-slate-200">

      <div class="flex items-center gap-2">

        <img src="148359.png" class="w-9 h-9 rounded-xl" />

        <span class="font-serif text-lg font-bold text-brand-navy">Chroma Menu</span>

      </div>

      <button id="close-menu" class="text-3xl text-brand-navy">×</button>

    </div>

    <nav class="flex-1 px-6 py-6 text-lg font-semibold text-brand-navy space-y-6">

      <a href="#programs" class="block hover:text-chroma-teal">Programs</a>

      <a href="#curriculum" class="block hover:text-chroma-teal">Curriculum</a>

      <a href="#schedule" class="block hover:text-chroma-teal">A Day in the Life</a>

      <a href="#locations" class="block hover:text-chroma-teal">Locations</a>

      <a href="#faq" class="block hover:text-chroma-teal">FAQ</a>

      <a href="#tour" class="block bg-brand-navy text-white text-center py-3 rounded-2xl shadow-soft hover:bg-slate-900 transition mt-4">Book A Tour</a>

    </nav>

  </div>

</header>

<!-- =============================== -->

<!-- 🔵 PREMIUM HERO (100k Studio + High Conversion Hybrid) -->

<!-- =============================== -->

<section class="relative overflow-hidden bg-gradient-to-br from-[#fafafa] via-[#fdfaf3] to-[#f5f3ff] pt-20 pb-24 lg:pt-24">

  <!-- ORBS + GRADIENT AESTHETICS -->

  <div class="absolute inset-0 pointer-events-none">

    <div class="absolute -top-20 left-0 w-96 h-96 bg-chroma-teal/20 blur-3xl opacity-70"></div>

    <div class="absolute top-32 right-10 w-72 h-72 bg-chroma-pink/20 blur-[100px] opacity-60"></div>

    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-chroma-purple/10 blur-[140px] opacity-40"></div>

  </div>

  <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">

    <div class="grid lg:grid-cols-2 gap-14 items-center">

      <!-- LEFT COPY -->

      <div class="reveal">

        <!-- Trust badge -->

        <div class="inline-flex items-center gap-2 bg-white/90 border border-slate-300 px-3 py-1.5 rounded-full text-[11px] uppercase tracking-[0.22em] font-semibold text-slate-600 shadow-soft">

          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>

          19+ Metro Atlanta Locations

        </div>

        <h1 class="mt-6 font-serif text-brand-navy text-[2.7rem] sm:text-[3.4rem] leading-tight tracking-tight">

          A modern, beautiful  

          <span class="bg-gradient-to-r from-chroma-teal via-chroma-purple to-chroma-pink bg-clip-text text-transparent">

            early learning experience  

          </span>  

          built for parents who expect more.

        </h1>

        <p class="mt-5 text-[15px] leading-relaxed text-slate-700 max-w-xl">

          Chroma combines a research-based <strong>Chroma Spectrum™ curriculum</strong>, warm experienced teachers,  

          and beautifully prepared environments for children <strong>6 weeks to 12 years</strong>.

          <br><br>

          Designed for safety. Engineered for growth. Loved by families.

        </p>

        <!-- CTA Row -->

        <div class="mt-7 flex flex-col sm:flex-row gap-4 sm:items-center">

          <a href="#tour" class="magnetic inline-flex items-center justify-center px-8 py-4 rounded-full bg-brand-navy text-white text-xs font-semibold uppercase tracking-[0.22em] shadow-soft hover:bg-slate-900">

            Schedule a Tour

          </a>

          <a href="#programs" class="inline-flex items-center justify-center px-7 py-3.5 rounded-full border border-slate-300 bg-white text-xs font-semibold uppercase tracking-[0.18em] text-brand-navy hover:border-brand-navy/70 hover:bg-slate-50">

            View Programs

          </a>

        </div>

        <!-- Social Proof -->

        <div class="mt-8 flex flex-wrap items-center gap-5 text-[12px] text-slate-500">

          <div class="flex items-center gap-2">

            <span class="text-yellow-400 text-lg">★★★★★</span>

            <span>4.8 Average Parent Rating</span>

          </div>

          <div class="hidden sm:block w-[1px] h-5 bg-slate-300"></div>

          <div class="flex items-center gap-2">

            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>

            <span>Licensed • Quality Rated • GA Pre-K Partner</span>

          </div>

        </div>

      </div>

      <!-- RIGHT: PRISM VIDEO & FLOATING ELEMENTS -->

      <div class="relative w-full h-[420px] sm:h-[460px] lg:h-[480px] reveal">

        <!-- Floating Card 1 -->

        <div class="absolute -top-2 left-6 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-slow">

          <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center text-lg">👶</div>

          <div class="leading-tight">

            <p class="text-[12px] font-semibold text-slate-700">Infant Care</p>

            <p class="text-[10px] text-slate-400">Safe sleep • Low ratios</p>

          </div>

        </div>

        <!-- Floating Card 2 -->

        <div class="absolute bottom-4 left-2 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-medium">

          <div class="w-9 h-9 bg-sky-50 rounded-xl flex items-center justify-center text-lg">🎓</div>

          <div class="leading-tight">

            <p class="text-[12px] font-semibold text-slate-700">GA Pre-K</p>

            <p class="text-[10px] text-slate-400">School readiness</p>

          </div>

        </div>

        <!-- Main Prism Video -->

        <div class="absolute inset-y-0 left-16 right-0 rounded-[3rem] overflow-hidden border border-white/10 shadow-soft prism-mask">

          <video autoplay muted playsinline loop class="w-full h-full object-cover">

            <source src="hero-classroom.mp4" type="video/mp4" />

          </video>

        </div>

        <!-- Behind Outline -->

        <div class="absolute inset-y-4 left-20 right-4 rounded-[3rem] border border-white/50 border-dashed opacity-40 pointer-events-none"></div>

      </div>

    </div>

  </div>

</section>
    <!-- =============================== -->

<!-- 🔵 STATS STRIP (Authority + Trust) -->

<!-- =============================== -->

<section class="bg-brand-navy text-white py-10 border-y border-slate-800/70">

  <div class="max-w-7xl mx-auto px-4 lg:px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center reveal">

    <div class="group">

      <div class="font-serif text-3xl font-bold text-chroma-teal group-hover:scale-110 transition-transform duration-300">19+</div>

      <div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-white/70">Metro campuses</div>

    </div>

    <div class="group">

      <div class="font-serif text-3xl font-bold text-chroma-pink group-hover:scale-110 transition-transform duration-300">2,000+</div>

      <div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-white/70">Children enrolled</div>

    </div>

    <div class="group">

      <div class="font-serif text-3xl font-bold text-chroma-yellow group-hover:scale-110 transition-transform duration-300">4.8</div>

      <div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-white/70">Avg parent rating</div>

    </div>

    <div class="group">

      <div class="font-serif text-3xl font-bold text-chroma-purple group-hover:scale-110 transition-transform duration-300">6w–12y</div>

      <div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-white/70">Age range</div>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 PROGRAMS WIZARD (#programs) -->

<!-- =============================== -->

<section id="programs" class="py-20 bg-white border-b border-slate-100">

  <div class="max-w-5xl mx-auto px-4 lg:px-6">

    <div class="text-center mb-10 reveal">

      <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">

        Find the right program in 10 seconds

      </h2>

      <p class="text-slate-600 text-sm md:text-base max-w-2xl mx-auto">

        Choose your child’s age and we’ll suggest the Chroma program designed for their development stage and your family’s needs.

      </p>

    </div>

    <div class="bg-brand-cream rounded-3xl p-6 md:p-8 border border-slate-100 shadow-soft reveal">

      <!-- Age buttons -->

      <div id="wizard-step-1" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">

        <button onclick="showWizardResult('infant')" class="p-4 bg-white rounded-2xl border border-slate-200 hover:border-chroma-pink hover:shadow-soft transition group text-center">

          <span class="text-2xl block mb-2 group-hover:scale-110 transition-transform">👶</span>

          <span class="font-semibold text-brand-navy text-xs leading-tight">Infant<br>(6 weeks–12m)</span>

        </button>

        <button onclick="showWizardResult('toddler')" class="p-4 bg-white rounded-2xl border border-slate-200 hover:border-chroma-teal hover:shadow-soft transition group text-center">

          <span class="text-2xl block mb-2 group-hover:scale-110 transition-transform">🚀</span>

          <span class="font-semibold text-brand-navy text-xs leading-tight">Toddler<br>(1 year)</span>

        </button>

        <button onclick="showWizardResult('preschool')" class="p-4 bg-white rounded-2xl border border-slate-200 hover:border-chroma-yellow hover:shadow-soft transition group text-center">

          <span class="text-2xl block mb-2 group-hover:scale-110 transition-transform">🎨</span>

          <span class="font-semibold text-brand-navy text-xs leading-tight">Preschool<br>(2 years)</span>

        </button>

        <button onclick="showWizardResult('prep')" class="p-4 bg-white rounded-2xl border border-slate-200 hover:border-chroma-purple hover:shadow-soft transition group text-center">

          <span class="text-2xl block mb-2 group-hover:scale-110 transition-transform">✏️</span>

          <span class="font-semibold text-brand-navy text-xs leading-tight">Pre-K Prep<br>(3 years)</span>

        </button>

        <button onclick="showWizardResult('prek')" class="p-4 bg-white rounded-2xl border border-slate-200 hover:border-chroma-teal hover:shadow-soft transition group text-center">

          <span class="text-2xl block mb-2 group-hover:scale-110 transition-transform">🎓</span>

          <span class="font-semibold text-brand-navy text-xs leading-tight">GA Pre-K<br>(4 years)</span>

        </button>

        <button onclick="showWizardResult('afterschool')" class="p-4 bg-white rounded-2xl border border-slate-200 hover:border-chroma-orange hover:shadow-soft transition group text-center">

          <span class="text-2xl block mb-2 group-hover:scale-110 transition-transform">🚌</span>

          <span class="font-semibold text-brand-navy text-xs leading-tight">After School<br>(5–12 years)</span>

        </button>

      </div>

      <!-- Result panel -->

      <div id="wizard-result" class="hidden text-center pt-6">

        <h3 id="wizard-title" class="text-2xl font-serif font-bold text-brand-navy mb-2">

          Program Name

        </h3>

        <p id="wizard-desc" class="text-slate-600 mb-5 max-w-xl mx-auto text-sm md:text-base">

          Description goes here.

        </p>

        <div class="flex justify-center gap-5 text-xs">

          <button type="button" onclick="resetWizard()" class="text-slate-400 hover:text-brand-navy underline decoration-dotted">

            Start Over

          </button>

          <a href="#tour" class="inline-flex items-center justify-center px-5 py-2 rounded-full bg-brand-navy text-white font-semibold hover:bg-slate-900 transition">

            Talk to a Director

          </a>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 CURRICULUM RADAR (#curriculum) -->

<!-- =============================== -->

<section id="curriculum" class="py-20 bg-brand-cream">

  <div class="max-w-7xl mx-auto px-4 lg:px-6 grid lg:grid-cols-2 gap-16 items-center">

    <!-- Copy -->

    <div class="reveal">

      <span class="text-chroma-teal font-bold tracking-[0.22em] uppercase text-[11px] mb-2 block">

        The Chroma Spectrum™ Curriculum

      </span>

      <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-4">

        A curriculum that shifts as your child grows

      </h2>

      <p class="text-slate-600 text-sm md:text-base mb-6 max-w-xl">

        Our program is built around five pillars – physical, emotional, social, academic, and creative

        development. The balance changes at each age so your child gets exactly what they need, when they

        need it.

      </p>

      <div class="flex flex-wrap gap-2 mb-6 text-xs">

        <button id="btn-infant" onclick="updateChart('infant')" class="chart-btn px-4 py-2 rounded-full font-semibold bg-brand-navy text-white shadow-soft">

          Infant

        </button>

        <button id="btn-toddler" onclick="updateChart('toddler')" class="chart-btn px-4 py-2 rounded-full font-semibold bg-white text-slate-600 border border-slate-200 hover:border-slate-400">

          Toddler

        </button>

        <button id="btn-preschool" onclick="updateChart('preschool')" class="chart-btn px-4 py-2 rounded-full font-semibold bg-white text-slate-600 border border-slate-200 hover:border-slate-400">

          Preschool

        </button>

        <button id="btn-prep" onclick="updateChart('prep')" class="chart-btn px-4 py-2 rounded-full font-semibold bg-white text-slate-600 border border-slate-200 hover:border-slate-400">

          Pre-K Prep

        </button>

        <button id="btn-prek" onclick="updateChart('prek')" class="chart-btn px-4 py-2 rounded-full font-semibold bg-white text-slate-600 border border-slate-200 hover:border-slate-400">

          GA Pre-K

        </button>

        <button id="btn-afterschool" onclick="updateChart('afterschool')" class="chart-btn px-4 py-2 rounded-full font-semibold bg-white text-slate-600 border border-slate-200 hover:border-slate-400">

          After School

        </button>

      </div>

      <div id="chart-text" class="bg-white rounded-3xl border-l-4 border-chroma-pink shadow-soft p-6 md:p-7">

        <h3 id="chart-title" class="font-serif text-xl md:text-2xl font-bold text-brand-navy mb-2">

          Foundation Phase

        </h3>

        <p id="chart-desc" class="text-slate-600 text-sm md:text-base">

          For infants, academic rigor takes a backseat to emotional security, healthy attachment, and

          sensory exploration in a calm, predictable environment.

        </p>

      </div>

    </div>

    <!-- Radar Chart -->

    <div class="reveal">

      <div class="bg-white rounded-[2.5rem] shadow-soft border border-slate-100 p-6">

        <div class="relative h-[340px] md:h-[380px]">

          <canvas id="curriculumChart"></canvas>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 A DAY IN THE LIFE (#schedule) -->

<!-- =============================== -->

<section id="schedule" class="py-20 bg-brand-navy text-white relative overflow-hidden">

  <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_0_0,#22c55e,transparent_55%),radial-gradient(circle_at_100%_100%,#38bdf8,transparent_55%)]"></div>

  <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">

    <div class="text-center mb-10 reveal">

      <h2 class="font-serif text-3xl md:text-4xl font-bold mb-3">

        A day in the life at Chroma

      </h2>

      <p class="text-slate-200 text-sm md:text-base max-w-2xl mx-auto">

        See how we structure each day to balance routines, play, and learning for your child’s age group.

      </p>

    </div>

    <!-- Age Switchers -->

    <div class="flex flex-wrap justify-center gap-3 mb-10 reveal">

      <button id="sched-age-infant" onclick="setScheduleAge('infant')" class="age-btn age-btn-active px-5 py-2 rounded-full text-xs font-semibold border border-slate-600 bg-white/10">

        Infant

      </button>

      <button id="sched-age-toddler" onclick="setScheduleAge('toddler')" class="age-btn px-5 py-2 rounded-full text-xs font-semibold border border-slate-600 text-slate-300">

        Toddler

      </button>

      <button id="sched-age-preschool" onclick="setScheduleAge('preschool')" class="age-btn px-5 py-2 rounded-full text-xs font-semibold border border-slate-600 text-slate-300">

        Preschool

      </button>

      <button id="sched-age-prep" onclick="setScheduleAge('prep')" class="age-btn px-5 py-2 rounded-full text-xs font-semibold border border-slate-600 text-slate-300">

        Pre-K Prep

      </button>

      <button id="sched-age-prek" onclick="setScheduleAge('prek')" class="age-btn px-5 py-2 rounded-full text-xs font-semibold border border-slate-600 text-slate-300">

        GA Pre-K

      </button>

      <button id="sched-age-afterschool" onclick="setScheduleAge('afterschool')" class="age-btn px-5 py-2 rounded-full text-xs font-semibold border border-slate-600 text-slate-300">

        After School

      </button>

    </div>

    <!-- Timeline Nodes -->

    <div class="relative mb-10 reveal">

      <div class="hidden md:block absolute top-1/2 left-0 right-0 h-px bg-slate-700 -translate-y-1/2"></div>

      <div id="time-selector-container" class="relative z-10 flex items-center gap-4 overflow-x-auto no-scrollbar pb-4 md:pb-0">

        <!-- Populated via JS -->

      </div>

    </div>

    <!-- Schedule Card -->

    <div id="schedule-card" class="max-w-3xl mx-auto bg-white text-brand-navy rounded-[2rem] shadow-soft p-8 md:p-10 relative reveal">

      <div id="schedule-time-badge" class="absolute -top-5 left-1/2 -translate-x-1/2 bg-chroma-teal text-white text-xs font-semibold px-5 py-1.5 rounded-full shadow-soft">

        8:00 AM

      </div>

      <div class="text-center">

        <div id="schedule-icon" class="text-5xl mb-5">👋</div>

        <h3 id="schedule-title" class="font-serif text-2xl font-bold mb-3">

          Morning Arrival &amp; Hellos

        </h3>

        <p id="schedule-desc" class="text-slate-600 text-sm md:text-base max-w-xl mx-auto">

          Children are greeted warmly by teachers, choose a quiet activity, and ease into their day feeling safe and connected.

        </p>

      </div>

    </div>

  </div>

</section>
    
    <!-- =============================== -->

<!-- 🔵 PARENT REVIEWS CAROUSEL -->

<!-- =============================== -->

<section class="py-20 bg-white border-b border-slate-100">

  <div class="max-w-7xl mx-auto px-4 lg:px-6">

    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10 reveal">

      <div>

        <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">

          Parents love Chroma

        </h2>

        <div class="flex items-center gap-3 text-sm text-slate-600">

          <div class="flex items-center gap-1">

            <span class="text-yellow-400 text-lg">★★★★★</span>

            <span class="font-semibold">4.8</span>

          </div>

          <span class="w-[1px] h-4 bg-slate-300 hidden sm:inline-block"></span>

          <span>Hundreds of reviews across Metro Atlanta</span>

        </div>

      </div>

      <div class="flex gap-2 justify-start md:justify-end">

        <button type="button"

                onclick="document.getElementById('reviews-container').scrollBy({left: -320, behavior: 'smooth'})"

                class="w-9 h-9 rounded-full border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50">

          ←

        </button>

        <button type="button"

                onclick="document.getElementById('reviews-container').scrollBy({left: 320, behavior: 'smooth'})"

                class="w-9 h-9 rounded-full border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50">

          →

        </button>

      </div>

    </div>

    <div id="reviews-container" class="flex gap-5 overflow-x-auto no-scrollbar pb-3 reveal">

      <!-- Card 1 -->

      <article class="min-w-[260px] max-w-sm bg-white border border-slate-200 rounded-3xl p-6 shadow-soft">

        <div class="flex items-center gap-3 mb-3">

          <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold">

            S

          </div>

          <div class="flex-1">

            <p class="font-semibold text-sm text-brand-navy">Salimah B.</p>

            <p class="text-[11px] text-slate-400">Parent • Marietta</p>

          </div>

          <div class="text-yellow-400 text-sm">★★★★★</div>

        </div>

        <p class="text-sm text-slate-600 leading-relaxed">

          “My son looks forward to going every single day. The teachers truly know him, communicate

          with me, and I can see how much he’s learning.”

        </p>

      </article>

      <!-- Card 2 -->

      <article class="min-w-[260px] max-w-sm bg-white border border-slate-200 rounded-3xl p-6 shadow-soft">

        <div class="flex items-center gap-3 mb-3">

          <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-semibold">

            Y

          </div>

          <div class="flex-1">

            <p class="font-semibold text-sm text-brand-navy">Yemmy H.</p>

            <p class="text-[11px] text-slate-400">Parent • Gwinnett</p>

          </div>

          <div class="text-yellow-400 text-sm">★★★★★</div>

        </div>

        <p class="text-sm text-slate-600 leading-relaxed">

          “It feels like family. They celebrate milestones with us and keep us updated all day with

          photos, messages and notes.”

        </p>

      </article>

      <!-- Card 3 -->

      <article class="min-w-[260px] max-w-sm bg-white border border-slate-200 rounded-3xl p-6 shadow-soft">

        <div class="flex items-center gap-3 mb-3">

          <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold">

            B

          </div>

          <div class="flex-1">

            <p class="font-semibold text-sm text-brand-navy">Britney M.</p>

            <p class="text-[11px] text-slate-400">Parent • North Metro</p>

          </div>

          <div class="text-yellow-400 text-sm">★★★★★</div>

        </div>

        <p class="text-sm text-slate-600 leading-relaxed">

          “We’ve watched our shy child become confident and excited about school. The curriculum is

          strong but still so fun.”

        </p>

      </article>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 LOCATIONS GRID (#locations) -->

<!-- =============================== -->

<section id="locations" class="py-20 bg-white">

  <div class="max-w-7xl mx-auto px-4 lg:px-6">

    <div class="text-center mb-12 reveal">

      <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">

        19+ neighborhood locations across Metro Atlanta

      </h2>

      <p class="text-slate-600 text-sm md:text-base max-w-2xl mx-auto">

        Find a Chroma campus near your home or work. All locations share the same safety standards,

        curriculum framework, and warm Chroma culture.

      </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-sm reveal">

      <!-- Cobb -->

      <div>

        <div class="flex items-center gap-2 mb-3">

          <span class="text-xl">🍑</span>

          <h3 class="font-semibold text-xs uppercase tracking-[0.18em] text-slate-500">

            Cobb County

          </h3>

        </div>

        <ul class="space-y-2">

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Marietta – East</p>

              <p class="text-[11px] text-slate-500">2499 Shallowford Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Marietta – West</p>

              <p class="text-[11px] text-slate-500">2424 Powder Springs Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Austell – Premier</p>

              <p class="text-[11px] text-slate-500">7225 Premier Ln</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-chroma-teal/70 bg-teal-50/40 transition">

              <p class="font-semibold text-brand-navy">Austell – Tramore</p>

              <p class="text-[11px] text-slate-500">2081 Mesa Valley Rd</p>

              <p class="text-[10px] font-semibold text-emerald-600 mt-1">Now Enrolling</p>

            </div>

          </li>

        </ul>

      </div>

      <!-- Gwinnett -->

      <div>

        <div class="flex items-center gap-2 mb-3">

          <span class="text-xl">🌳</span>

          <h3 class="font-semibold text-xs uppercase tracking-[0.18em] text-slate-500">

            Gwinnett County

          </h3>

        </div>

        <ul class="space-y-2">

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Lawrenceville</p>

              <p class="text-[11px] text-slate-500">3650 Club Dr NW</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Lilburn</p>

              <p class="text-[11px] text-slate-500">917 Killian Hill Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Duluth – Pleasant Hill</p>

              <p class="text-[11px] text-slate-500">3152 Creek Dr NW</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Duluth – Satellite</p>

              <p class="text-[11px] text-slate-500">3730 Satellite Blvd</p>

            </div>

          </li>

        </ul>

      </div>

      <!-- North Metro -->

      <div>

        <div class="flex items-center gap-2 mb-3">

          <span class="text-xl">🏙️</span>

          <h3 class="font-semibold text-xs uppercase tracking-[0.18em] text-slate-500">

            North Metro

          </h3>

        </div>

        <ul class="space-y-2">

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Roswell</p>

              <p class="text-[11px] text-slate-500">1255 Upper Hembree Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Alpharetta – Midway</p>

              <p class="text-[11px] text-slate-500">4015 Discovery Dr</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Johns Creek</p>

              <p class="text-[11px] text-slate-500">3580 Old Alabama Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-chroma-teal/70 bg-teal-50/40 transition">

              <p class="font-semibold text-brand-navy">North Hall – Murrayville</p>

              <p class="text-[11px] text-slate-500">5768 Wade Whelchel Rd</p>

              <p class="text-[10px] font-semibold text-emerald-600 mt-1">Now Enrolling</p>

            </div>

          </li>

        </ul>

      </div>

      <!-- South Metro -->

      <div>

        <div class="flex items-center gap-2 mb-3">

          <span class="text-xl">⛰️</span>

          <h3 class="font-semibold text-xs uppercase tracking-[0.18em] text-slate-500">

            South Metro

          </h3>

        </div>

        <ul class="space-y-2">

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Ellenwood – Henry</p>

              <p class="text-[11px] text-slate-500">2765 E Atlanta Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">McDonough – Henry</p>

              <p class="text-[11px] text-slate-500">90 Hunters Chase</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition">

              <p class="font-semibold text-brand-navy">Jonesboro – Clayton</p>

              <p class="text-[11px] text-slate-500">1832 Noah Ark Rd</p>

            </div>

          </li>

          <li>

            <div class="p-3 rounded-xl border border-chroma-teal/70 bg-teal-50/40 transition">

              <p class="font-semibold text-brand-navy">Newnan – Coweta</p>

              <p class="text-[11px] text-slate-500">40 Bledsoe Rd</p>

              <p class="text-[10px] font-semibold text-emerald-600 mt-1">New Campus</p>

            </div>

          </li>

        </ul>

      </div>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 TOUR CTA (#tour) -->

<!-- =============================== -->

<section id="tour" class="py-20 bg-brand-cream border-t border-slate-100">

  <div class="max-w-5xl mx-auto px-4 lg:px-6 reveal">

    <div class="bg-white rounded-[2.5rem] shadow-soft border border-slate-100 overflow-hidden grid md:grid-cols-[1.1fr,1fr]">

      <!-- Copy + Form -->

      <div class="p-8 md:p-10">

        <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">

          Schedule a private tour

        </h2>

        <p class="text-slate-600 text-sm md:text-base mb-6">

          Share a few details and your preferred campus. A Chroma Director will reach out to confirm tour

          times and answer questions about tuition, openings, and enrollment.

        </p>

        <form class="space-y-4" onsubmit="event.preventDefault(); alert('Thank you! A Chroma Director will contact you with tour times.');">

          <div class="grid md:grid-cols-2 gap-4">

            <div>

              <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5">Parent Name</label>

              <input type="text" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="Jane Doe" />

            </div>

            <div>

              <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5">Phone</label>

              <input type="tel" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="(555) 123-4567" />

            </div>

          </div>

          <div class="grid md:grid-cols-2 gap-4">

            <div>

              <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5">Email</label>

              <input type="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="you@email.com" />

            </div>

            <div>

              <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5">Preferred Campus</label>

              <select class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-brand-navy outline-none text-sm">

                <option value="">Select a location…</option>

                <option>Newnan</option>

                <option>North Hall (Murrayville)</option>

                <option>Austell – Tramore</option>

                <option>Marietta – East</option>

                <option>Lawrenceville</option>

                <option>Duluth – Pleasant Hill</option>

                <option>Johns Creek</option>

                <option>Canton</option>

              </select>

            </div>

          </div>

          <div>

            <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5">Child(ren) Age(s)</label>

            <input type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="e.g., 10 months, 3 years" />

          </div>

          <button type="submit" class="w-full mt-2 inline-flex items-center justify-center bg-brand-navy text-white text-xs font-semibold tracking-[0.24em] uppercase py-3.5 rounded-full shadow-soft hover:bg-slate-900">

            Request Tour Times

          </button>

          <p class="text-[11px] text-slate-400 mt-2">

            No obligation. We’ll never share your information.

          </p>

        </form>

      </div>

      <!-- Side panel -->

      <div class="bg-gradient-to-br from-chroma-teal via-chroma-purple to-chroma-pink text-white p-7 md:p-8 flex flex-col justify-between">

        <div>

          <p class="text-[11px] font-semibold tracking-[0.2em] uppercase mb-2">

            Why families choose Chroma

          </p>

          <ul class="space-y-3 text-sm">

            <li class="flex gap-2">

              <span class="mt-0.5 text-emerald-300">✓</span>

              <span>Warm, consistent teachers who know your child well</span>

            </li>

            <li class="flex gap-2">

              <span class="mt-0.5 text-emerald-300">✓</span>

              <span>Daily parent communication with photos and updates</span>

            </li>

            <li class="flex gap-2">

              <span class="mt-0.5 text-emerald-300">✓</span>

              <span>Healthy meals included through CACFP participation</span>

            </li>

            <li class="flex gap-2">

              <span class="mt-0.5 text-emerald-300">✓</span>

              <span>Age-appropriate security and safety protocols</span>

            </li>

            <li class="flex gap-2">

              <span class="mt-0.5 text-emerald-300">✓</span>

              <span>GA Lottery Pre-K at many locations (limited spots)</span>

            </li>

          </ul>

        </div>

        <div class="mt-6 text-xs text-white/80">

          <p class="font-semibold mb-1">Typical tour length: 20–30 minutes</p>

          <p>Meet the Director, walk classrooms, and get tuition details for your child’s age group.</p>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 FAQ (#faq) -->

<!-- =============================== -->

<section id="faq" class="py-20 bg-white">

  <div class="max-w-4xl mx-auto px-4 lg:px-6">

    <div class="text-center mb-10 reveal">

      <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">

        Common questions from parents

      </h2>

      <p class="text-slate-600 text-sm md:text-base max-w-2xl mx-auto">

        We’ve answered a few of the questions parents ask most when choosing childcare and early

        learning in Metro Atlanta.

      </p>

    </div>

    <div class="space-y-4 reveal">

      <details class="group bg-brand-cream rounded-2xl px-5 py-4 border border-slate-100">

        <summary class="flex items-center justify-between gap-3 cursor-pointer list-none">

          <span class="font-semibold text-sm text-brand-navy">Do you offer GA Lottery Pre-K?</span>

          <span class="text-slate-500 group-open:rotate-180 transition-transform">⌄</span>

        </summary>

        <p class="mt-3 text-sm text-slate-600">

          Yes. Many Chroma locations offer free GA Lottery Pre-K for 4-year-olds. Spots are limited

          and fill quickly each school year, so we recommend joining our interest list early.

        </p>

      </details>

      <details class="group bg-brand-cream rounded-2xl px-5 py-4 border border-slate-100">

        <summary class="flex items-center justify-between gap-3 cursor-pointer list-none">

          <span class="font-semibold text-sm text-brand-navy">What ages do you serve?</span>

          <span class="text-slate-500 group-open:rotate-180 transition-transform">⌄</span>

        </summary>

        <p class="mt-3 text-sm text-slate-600">

          Most campuses serve children from 6 weeks through 12 years old, including infants,

          toddlers, preschool, GA Pre-K, and after-school programs. Specific offerings can vary by

          campus; your Director will confirm details for your location.

        </p>

      </details>

      <details class="group bg-brand-cream rounded-2xl px-5 py-4 border border-slate-100">

        <summary class="flex items-center justify-between gap-3 cursor-pointer list-none">

          <span class="font-semibold text-sm text-brand-navy">Are meals and snacks included?</span>

          <span class="text-slate-500 group-open:rotate-180 transition-transform">⌄</span>

        </summary>

        <p class="mt-3 text-sm text-slate-600">

          Yes. Through participation in the Child and Adult Care Food Program (CACFP), we serve

          developmentally appropriate, nutritious meals and snacks at most locations. Directors can

          share sample menus and allergy information.

        </p>

      </details>

      <details class="group bg-brand-cream rounded-2xl px-5 py-4 border border-slate-100">

        <summary class="flex items-center justify-between gap-3 cursor-pointer list-none">

          <span class="font-semibold text-sm text-brand-navy">How do you communicate with parents?</span>

          <span class="text-slate-500 group-open:rotate-180 transition-transform">⌄</span>

        </summary>

        <p class="mt-3 text-sm text-slate-600">

          We use a modern parent app and in-person conversations to keep you informed about your

          child’s day: photos, notes, incident reports, curriculum highlights, and reminders. You’ll

          never have to wonder how the day went.

        </p>

      </details>

      <details class="group bg-brand-cream rounded-2xl px-5 py-4 border border-slate-100">

        <summary class="flex items-center justify-between gap-3 cursor-pointer list-none">

          <span class="font-semibold text-sm text-brand-navy">Can I tour before enrolling?</span>

          <span class="text-slate-500 group-open:rotate-180 transition-transform">⌄</span>

        </summary>

        <p class="mt-3 text-sm text-slate-600">

          Absolutely. We encourage tours so you can meet the Director, see classrooms in action,

          review safety procedures, and ask any questions about tuition and schedules.

        </p>

      </details>

    </div>

  </div>

</section>

<!-- =============================== -->

<!-- 🔵 FOOTER -->

<!-- =============================== -->

<footer class="bg-brand-navy text-slate-300 text-sm py-10 border-t border-slate-800">

  <div class="max-w-7xl mx-auto px-4 lg:px-6 flex flex-col md:flex-row md:items-center md:justify-between gap-5">

    <div class="flex items-center gap-3">

      <div class="w-9 h-9 rounded-2xl bg-white/10 flex items-center justify-center overflow-hidden">

        <img src="148359.png" class="w-7 h-7" alt="Chroma Early Learning Academy Logo" />

      </div>

      <div>

        <p class="font-semibold text-white text-sm">Chroma Early Learning Academy</p>

        <p class="text-[11px] text-slate-400">

          Premium childcare & early education across Metro Atlanta.

        </p>

      </div>

    </div>

    <div class="flex flex-wrap items-center gap-4 text-[11px] text-slate-400">

      <span>© <span id="year-span"></span> Chroma Early Learning Academy</span>

      <span class="hidden md:inline-block w-[1px] h-4 bg-slate-600"></span>

      <span>All rights reserved</span>

    </div>

  </div>

</footer>
<?php
get_footer();
