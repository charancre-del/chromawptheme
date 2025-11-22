<?php
/**
 * Footer template containing the closing sections and scripts from the provided static HTML.
 *
 * @package chroma
 */
?>
<?php wp_footer(); ?>
<!-- Chart.js for curriculum radar -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    /* ------------------------------------
       YEAR IN FOOTER
    ------------------------------------ */
    const yearSpan = document.getElementById('year-span');
    if (yearSpan) {
      yearSpan.textContent = new Date().getFullYear();
    }
    /* ------------------------------------
       OPEN / CLOSED STATUS BAR
       (Mon–Fri, 6:30 AM – 6:30 PM)
    ------------------------------------ */
    (function handleOpenStatus() {
      const now = new Date();
      const day = now.getDay(); // 0 = Sun, 1 = Mon...
      const hour = now.getHours();
      const minute = now.getMinutes();
      const isWeekday = day >= 1 && day <= 5;
      const isOpen =
        isWeekday &&
        (hour > 6 && hour < 18 ||
          (hour === 6 && minute >= 30) ||
          (hour === 18 && minute <= 30));
      const statusIndicator = document.getElementById('status-indicator');
      const statusDivider = document.getElementById('status-divider');
      if (isOpen && statusIndicator && statusDivider) {
        statusIndicator.classList.remove('hidden');
        statusDivider.classList.remove('hidden');
      }
    })();
    /* ------------------------------------
       MOBILE NAVIGATION
    ------------------------------------ */
    (function mobileNav() {
      const menuBtn = document.getElementById('menu-btn');
      const closeBtn = document.getElementById('close-menu');
      const mobileMenu = document.getElementById('mobile-menu');
      if (!menuBtn || !closeBtn || !mobileMenu) return;
      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
        mobileMenu.classList.add('translate-x-0');
      });
      closeBtn.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
        mobileMenu.classList.remove('translate-x-0');
      });
      mobileMenu.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', () => {
          mobileMenu.classList.add('translate-x-full');
          mobileMenu.classList.remove('translate-x-0');
        });
      });
    })();
    /* ------------------------------------
       SCROLL REVEAL ANIMATIONS
    ------------------------------------ */
    (function revealOnScroll() {
      const reveals = document.querySelectorAll('.reveal');
      if (!('IntersectionObserver' in window) || !reveals.length) {
        reveals.forEach((el) => el.classList.add('active'));
        return;
      }
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('active');
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.18 }
      );
      reveals.forEach((el) => observer.observe(el));
    })();
    /* ------------------------------------
       PROGRAMS WIZARD (AGE → PROGRAM)
    ------------------------------------ */
    (function programsWizard() {
      const wizardStep = document.getElementById('wizard-step-1');
      const wizardResult = document.getElementById('wizard-result');
      const wizardTitle = document.getElementById('wizard-title');
      const wizardDesc = document.getElementById('wizard-desc');
      if (!wizardStep || !wizardResult || !wizardTitle || !wizardDesc) return;
      const programs = {
        infant: {
          title: 'Infant Care (6 weeks–12 months)',
          desc: 'Low ratios, safe sleep practices, responsive caregiving, and sensory play in a peaceful, predictable environment. We partner closely with you on feeding and sleep routines.'
        },
        toddler: {
          title: 'Toddler Program (1 year)',
          desc: 'Curated environments for walkers and explorers: language bursts, social skills, early problem-solving, and lots of gross-motor play.'
        },
        preschool: {
          title: 'Preschool (2 years)',
          desc: 'Early concepts in math, literacy, and science are introduced through hands-on centers, circle time, and guided play. Potty training support is built into the day.'
        },
        prep: {
          title: 'Pre-K Prep (3 years)',
          desc: 'Structured centers, small-group instruction, and routines that build independence, self-regulation, and confidence before GA Pre-K.'
        },
        prek: {
          title: 'GA Pre-K (4 years)',
          desc: 'GA Lottery Pre-K aligned with state standards, taught by qualified teachers who balance academic readiness, social-emotional learning, and joyful experiences.'
        },
        afterschool: {
          title: 'After-School Program (5–12 years)',
          desc: 'Transportation from local elementary schools, homework support, STEM and art clubs, outdoor play, and a safe place to unwind after the school day.'
        }
      };
      window.showWizardResult = function (ageKey) {
        const program = programs[ageKey];
        if (!program) return;
        wizardStep.classList.add('hidden');
        wizardResult.classList.remove('hidden');
        wizardTitle.textContent = program.title;
        wizardDesc.textContent = program.desc;
      };
      window.resetWizard = function () {
        wizardStep.classList.remove('hidden');
        wizardResult.classList.add('hidden');
      };
    })();
    /* ------------------------------------
       CURRICULUM RADAR CHART (Chart.js)
    ------------------------------------ */
    (function curriculumChartInit() {
      const canvas = document.getElementById('curriculumChart');
      if (!canvas || !window.Chart) return;
      const ctx = canvas.getContext('2d');
      const dataConfig = {
        infant: {
          data: [90, 90, 40, 15, 40],
          title: 'Foundation Phase',
          desc: 'Infant classrooms emphasize emotional security, attachment, physical health, and sensory experiences. Academics are embedded through language-rich interactions.',
          color: '#be185d'
        },
        toddler: {
          data: [85, 75, 65, 30, 70],
          title: 'Discovery Phase',
          desc: 'Toddlers explore movement, language, early problem-solving, and social skills through guided play and routines.',
          color: '#0d9488'
        },
        preschool: {
          data: [75, 65, 70, 55, 80],
          title: 'Exploration Phase',
          desc: 'Preschoolers work on early literacy, math concepts, dramatic play, and collaborative projects, supported by strong routines.',
          color: '#ca8a04'
        },
        prep: {
          data: [65, 60, 75, 75, 70],
          title: 'Pre-K Prep Phase',
          desc: 'Children build stamina for small-group work, early writing, and multi-step directions while strengthening self-regulation.',
          color: '#7c3aed'
        },
        prek: {
          data: [60, 60, 80, 90, 70],
          title: 'GA Pre-K Readiness',
          desc: 'Aligned with GA standards, GA Pre-K balances phonemic awareness, pre-writing, and math with social-emotional learning and play.',
          color: '#0d9488'
        },
        afterschool: {
          data: [50, 70, 85, 75, 80],
          title: 'Enrichment Phase',
          desc: 'School-age programming offers homework help, social clubs, athletic play, and creative enrichment for older children.',
          color: '#ea580c'
        }
      };
      const labels = ['Physical', 'Emotional', 'Social', 'Academic', 'Creative'];
      const base = dataConfig.infant;
      const chart = new Chart(ctx, {
        type: 'radar',
        data: {
          labels,
          datasets: [
            {
              label: 'Focus',
              data: base.data,
              borderColor: base.color,
              backgroundColor: base.color + '33',
              borderWidth: 2,
              pointBackgroundColor: '#ffffff',
              pointBorderColor: base.color,
              pointRadius: 4
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { display: false }
          },
          scales: {
            r: {
              angleLines: { color: '#e5e7eb' },
              grid: { color: '#e5e7eb' },
              suggestedMin: 0,
              suggestedMax: 100,
              ticks: { display: false },
              pointLabels: {
                font: { family: 'Inter', size: 12 },
                color: '#0f172a'
              }
            }
          }
        }
      });
      const titleEl = document.getElementById('chart-title');
      const descEl = document.getElementById('chart-desc');
      const btnKeys = ['infant', 'toddler', 'preschool', 'prep', 'prek', 'afterschool'];
      window.updateChart = function (key) {
        const cfg = dataConfig[key];
        if (!cfg) return;
        chart.data.datasets[0].data = cfg.data;
        chart.data.datasets[0].borderColor = cfg.color;
        chart.data.datasets[0].backgroundColor = cfg.color + '33';
        chart.update();
        if (titleEl) titleEl.textContent = cfg.title;
        if (descEl) descEl.textContent = cfg.desc;
        btnKeys.forEach((k) => {
          const btn = document.getElementById('btn-' + k);
          if (!btn) return;
          if (k === key) {
            btn.classList.add('bg-brand-navy', 'text-white', 'shadow-soft');
            btn.classList.remove('bg-white', 'text-slate-600', 'border-slate-200');
          } else {
            btn.classList.remove('bg-brand-navy', 'text-white', 'shadow-soft');
            btn.classList.add('bg-white', 'text-slate-600', 'border-slate-200');
          }
        });
      };
      updateChart('infant');
    })();
    /* ------------------------------------
       DAILY SCHEDULE TIMELINE
    ------------------------------------ */
    (function scheduleInit() {
      const container = document.getElementById('time-selector-container');
      const badge = document.getElementById('schedule-time-badge');
      const iconEl = document.getElementById('schedule-icon');
      const titleEl = document.getElementById('schedule-title');
      const descEl = document.getElementById('schedule-desc');
      if (!container || !badge || !iconEl || !titleEl || !descEl) return;
      const scheduleData = {
        infant: [
          { t: '6:30 AM', icon: '👋', ti: 'Arrival & Good Morning', d: 'Teachers greet each family, review routines, and help infants transition into a calm, cozy classroom.' },
          { t: '9:00 AM', icon: '🍼', ti: 'Feeding & Snuggles', d: 'Individualized feeding based on your schedule at home, with lots of eye contact, songs, and language.' },
          { t: '10:00 AM', icon: '🎵', ti: 'Floor Time & Sensory Play', d: 'Tummy time, soft toys, and sensory materials to build strength and curiosity.' },
          { t: '12:30 PM', icon: '😴', ti: 'Nap & Rest', d: 'Safe sleep practices in cribs with constant supervision and a quiet environment.' },
          { t: '3:00 PM', icon: '🌤️', ti: 'Stroller Walk or Outdoor Air', d: 'Fresh air (weather permitting) and gentle movement to reset and engage the senses.' }
        ],
        toddler: [
          { t: '7:00 AM', icon: '🧩', ti: 'Arrival & Centers', d: 'Toddlers explore manipulatives, blocks, and dramatic play to ease into the day.' },
          { t: '9:00 AM', icon: '🚀', ti: 'Circle Time', d: 'Songs, movement, simple stories, and name recognition games.' },
          { t: '10:00 AM', icon: '🎨', ti: 'Messy Play & Art', d: 'Safe, supervised sensory and art experiences that build fine motor skills.' },
          { t: '12:00 PM', icon: '🥗', ti: 'Lunch & Social Skills', d: 'Family-style meals encourage independence, manners, and conversation.' },
          { t: '1:00 PM', icon: '🛏️', ti: 'Nap & Rest', d: 'Toddlers rest on cots with soothing music and individual comfort items from home.' }
        ],
        preschool: [
          { t: '7:30 AM', icon: '🧱', ti: 'Table Toys & Fine Motor', d: 'Puzzles, peg boards, and other activities warm up little hands for the day.' },
          { t: '9:00 AM', icon: '📚', ti: 'Literacy & Language', d: 'Storytime, vocabulary games, and early phonemic awareness in small groups.' },
          { t: '10:30 AM', icon: '🏃', ti: 'Outdoor Play', d: 'Gross-motor play, climbing, running, and cooperative games outside.' },
          { t: '1:00 PM', icon: '😌', ti: 'Rest & Quiet Time', d: 'Children rest on cots; non-nappers enjoy quiet activities after a short rest.' },
          { t: '3:00 PM', icon: '🖌️', ti: 'Art & STEM Centers', d: 'Process art, building challenges, and exploratory science activities.' }
        ],
        prep: [
          { t: '8:00 AM', icon: '🔤', ti: 'Morning Meeting', d: 'Greeting, calendar, weather, and social-emotional check-ins to start the day.' },
          { t: '9:00 AM', icon: '✏️', ti: 'Pre-Writing & Fine Motor', d: 'Tracing, name writing, and activities that prepare children for pencil control.' },
          { t: '10:30 AM', icon: '🔢', ti: 'Math & Problem-Solving', d: 'Hands-on math games with counting, patterns, and simple measurement.' },
          { t: '1:00 PM', icon: '🎭', ti: 'Centers & Dramatic Play', d: 'Extended time for thematic centers and collaborative pretend play.' },
          { t: '3:30 PM', icon: '📦', ti: 'Closing Circle', d: 'Reflection on the day, songs, and preparing for pick-up.' }
        ],
        prek: [
          { t: '8:00 AM', icon: '📖', ti: 'Literacy Block', d: 'Small-group guided reading, phonics, and comprehension work aligned with GA Pre-K standards.' },
          { t: '10:00 AM', icon: '🧮', ti: 'Math & STEM', d: 'Hands-on math and science experiments that link to real-world concepts.' },
          { t: '11:30 AM', icon: '⚽', ti: 'Recess', d: 'Large-motor play, cooperative games, and social skill building outdoors.' },
          { t: '1:00 PM', icon: '🧠', ti: 'Centers & Choice Time', d: 'Children rotate through centers designed for literacy, math, art, and dramatic play.' },
          { t: '2:30 PM', icon: '🎒', ti: 'Wrap-Up & Dismissal', d: 'Packing, reviewing the day’s learning, and preparing for dismissal or after-care.' }
        ],
        afterschool: [
          { t: '2:30 PM', icon: '🚌', ti: 'Arrival from School', d: 'Children arrive via bus or drop-off, check in with staff, and have a quick snack.' },
          { t: '3:00 PM', icon: '📚', ti: 'Homework Lab', d: 'Quiet, supported homework time with help available from staff.' },
          { t: '4:00 PM', icon: '🏀', ti: 'Recreation & Clubs', d: 'Outside play, sports, and rotating clubs (STEM, art, games, and more).' },
          { t: '5:00 PM', icon: '💬', ti: 'Social Time & Choice Centers', d: 'Children unwind with board games, building, and creative play with friends.' },
          { t: '5:45 PM', icon: '👨‍👩‍👧', ti: 'Pick-Up & Check-Ins', d: 'Staff connect with families at pick-up to share highlights from the afternoon.' }
        ]
      };
      const ageKeys = ['infant', 'toddler', 'preschool', 'prep', 'prek', 'afterschool'];
      window.setScheduleAge = function (age) {
        const entries = scheduleData[age] || scheduleData.infant;
        ageKeys.forEach((key) => {
          const btn = document.getElementById('sched-age-' + key);
          if (!btn) return;
          if (key === age) {
            btn.classList.add('age-btn-active');
            btn.classList.remove('text-slate-300');
          } else {
            btn.classList.remove('age-btn-active');
            btn.classList.add('text-slate-300');
          }
        });
        container.innerHTML = '';
        entries.forEach((slot, index) => {
          const btn = document.createElement('button');
          btn.type = 'button';
          btn.className =
            'timeline-node flex-shrink-0 px-4 py-2 rounded-full border border-slate-600 text-[11px] font-semibold text-slate-300 bg-brand-navy/30 hover:bg-brand-navy/70 transition-all';
          btn.textContent = slot.t;
          btn.addEventListener('click', () => {
            badge.textContent = slot.t;
            iconEl.textContent = slot.icon;
            titleEl.textContent = slot.ti;
            descEl.textContent = slot.d;
            container.querySelectorAll('.timeline-node').forEach((node) => {
              node.classList.remove('active');
            });
            btn.classList.add('active');
          });
          container.appendChild(btn);
          if (index === 0) {
            setTimeout(() => btn.click(), 0);
          }
        });
      };
      setScheduleAge('infant');
    })();
  });
</script>
</body>
</html>
