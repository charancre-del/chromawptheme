<?php
/**
 * Home template built from provided static HTML markup.
 *
 * @package chroma
 */

get_header();
$home_defaults = [
    'hero' => [
        'badge_text'     => __('19+ Metro Atlanta Locations', 'chroma'),
        'heading'        => __('A modern, beautiful early learning experience built for parents who expect more.', 'chroma'),
        'highlight'      => __('early learning experience', 'chroma'),
        'body'           => __('Chroma combines a research-based Chroma Spectrum™ curriculum, warm experienced teachers, and beautifully prepared environments for children 6 weeks to 12 years. Designed for safety. Engineered for growth. Loved by families.', 'chroma'),
        'primary_cta'    => ['url' => '#tour', 'title' => __('Schedule a Tour', 'chroma')],
        'secondary_cta'  => ['url' => '#programs', 'title' => __('View Programs', 'chroma')],
    ],
    'stats_strip' => [
        'items' => [
            ['value' => '19+', 'label' => __('Metro campuses', 'chroma')],
            ['value' => '2,000+', 'label' => __('Children enrolled', 'chroma')],
            ['value' => '4.8', 'label' => __('Avg parent rating', 'chroma')],
            ['value' => __('6w–12y', 'chroma'), 'label' => __('Age range', 'chroma')],
        ],
    ],
    'programs' => [
        'heading' => __('Find the right program in 10 seconds', 'chroma'),
        'intro'   => __('Choose your child’s age and we’ll suggest the Chroma program designed for their development stage and your family’s needs.', 'chroma'),
    ],
    'curriculum' => [
        'kicker'  => __('The Chroma Spectrum™ Curriculum', 'chroma'),
        'heading' => __('A curriculum that shifts as your child grows', 'chroma'),
        'body'    => __('Our program is built around five pillars – physical, emotional, social, academic, and creative development. The balance changes at each age so your child gets exactly what they need, when they need it.', 'chroma'),
    ],
    'schedule' => [
        'heading' => __('A day in the life at Chroma', 'chroma'),
        'intro'   => __('See how we structure each day to balance routines, play, and learning for your child’s age group.', 'chroma'),
    ],
    'reviews' => [
        'heading'    => __('Parents love Chroma', 'chroma'),
        'subheading' => __('Hundreds of reviews across Metro Atlanta', 'chroma'),
    ],
    'locations' => [
        'heading' => __('19+ neighborhood locations across Metro Atlanta', 'chroma'),
        'intro'   => __('Find a Chroma campus near your home or work. All locations share the same safety standards, curriculum framework, and warm Chroma culture.', 'chroma'),
    ],
    'tour' => [
        'heading' => __('Schedule a private tour', 'chroma'),
        'intro'   => __('Share a few details and your preferred campus. A Chroma Director will reach out to confirm tour times and answer questions about tuition, openings, and enrollment.', 'chroma'),
    ],
    'faq' => [
        'heading' => __('Common questions from parents', 'chroma'),
        'intro'   => __('We’ve answered a few of the questions parents ask most when choosing childcare and early learning in Metro Atlanta.', 'chroma'),
        'items'   => [
            ['question' => __('Do you offer GA Lottery Pre-K?', 'chroma'), 'answer' => __('Yes. Many Chroma locations offer free GA Lottery Pre-K for 4-year-olds. Spots are limited and fill quickly each school year, so we recommend joining our interest list early.', 'chroma')],
            ['question' => __('What ages do you serve?', 'chroma'), 'answer' => __('Most campuses serve children from 6 weeks through 12 years old, including infants, toddlers, preschool, GA Pre-K, and after-school programs. Specific offerings can vary by campus; your Director will confirm details for your location.', 'chroma')],
            ['question' => __('Are meals and snacks included?', 'chroma'), 'answer' => __('Yes. Through participation in the Child and Adult Care Food Program (CACFP), we serve developmentally appropriate, nutritious meals and snacks at most locations. Directors can share sample menus and allergy information.', 'chroma')],
            ['question' => __('How do you communicate with parents?', 'chroma'), 'answer' => __('We use a modern parent app and in-person conversations to keep you informed about your child’s day: photos, notes, incident reports, curriculum highlights, and reminders. You’ll never have to wonder how the day went.', 'chroma')],
            ['question' => __('Can I tour before enrolling?', 'chroma'), 'answer' => __('Absolutely. We encourage tours so you can meet the Director, see classrooms in action, review safety procedures, and ask any questions about tuition and schedules.', 'chroma')],
        ],
    ],
];

$home_sections = $home_defaults;

if (function_exists('have_rows') && have_rows('home_flexible_content')) {
    while (have_rows('home_flexible_content')) {
        the_row();
        switch (get_row_layout()) {
            case 'hero':
                $home_sections['hero'] = array_merge($home_sections['hero'], array_filter([
                    'badge_text'    => get_sub_field('badge_text'),
                    'heading'       => get_sub_field('heading'),
                    'highlight'     => get_sub_field('highlight'),
                    'body'          => get_sub_field('body'),
                    'primary_cta'   => get_sub_field('primary_cta'),
                    'secondary_cta' => get_sub_field('secondary_cta'),
                ]));
                break;
            case 'stats_strip':
                $items = get_sub_field('items');
                if (!empty($items) && is_array($items)) {
                    $home_sections['stats_strip']['items'] = $items;
                }
                break;
            case 'programs':
                $home_sections['programs'] = array_merge($home_sections['programs'], array_filter([
                    'heading' => get_sub_field('heading'),
                    'intro'   => get_sub_field('intro'),
                ]));
                break;
            case 'curriculum':
                $home_sections['curriculum'] = array_merge($home_sections['curriculum'], array_filter([
                    'kicker'  => get_sub_field('kicker'),
                    'heading' => get_sub_field('heading'),
                    'body'    => get_sub_field('body'),
                ]));
                break;
            case 'schedule':
                $home_sections['schedule'] = array_merge($home_sections['schedule'], array_filter([
                    'heading' => get_sub_field('heading'),
                    'intro'   => get_sub_field('intro'),
                ]));
                break;
            case 'reviews':
                $home_sections['reviews'] = array_merge($home_sections['reviews'], array_filter([
                    'heading'    => get_sub_field('heading'),
                    'subheading' => get_sub_field('subheading'),
                ]));
                break;
            case 'locations':
                $home_sections['locations'] = array_merge($home_sections['locations'], array_filter([
                    'heading' => get_sub_field('heading'),
                    'intro'   => get_sub_field('intro'),
                ]));
                break;
            case 'tour':
                $home_sections['tour'] = array_merge($home_sections['tour'], array_filter([
                    'heading' => get_sub_field('heading'),
                    'intro'   => get_sub_field('intro'),
                ]));
                break;
            case 'faq':
                $home_sections['faq'] = array_merge($home_sections['faq'], array_filter([
                    'heading' => get_sub_field('heading'),
                    'intro'   => get_sub_field('intro'),
                ]));
                $faq_items = get_sub_field('items');
                if (!empty($faq_items) && is_array($faq_items)) {
                    $home_sections['faq']['items'] = $faq_items;
                }
                break;
        }
    }
}
?>
<!-- =============================== -->
<!-- 🔵 STATUS BAR (Open / Closed) -->
<!-- =============================== -->
<div class="w-full bg-emerald-500 text-white text-xs font-semibold tracking-wide py-2 text-center hidden" id="status-indicator">
  We’re Open & Enrolling Today — Schedule a Tour
</div>
<div id="status-divider" class="hidden h-[1px] w-full bg-emerald-500/40"></div>
<!-- =============================== -->
<!-- 🔵 NAVIGATION -->
<!-- =============================== -->
<header id="navbar" class="sticky top-0 z-50 nav-glass shadow-soft border-b border-slate-200/50">
  <div class="max-w-7xl mx-auto px-4 lg:px-6 h-[82px] flex items-center justify-between">
    <a href="#" class="group flex items-center gap-3">
      <div class="w-12 h-12 rounded-2xl bg-white shadow-soft flex items-center justify-center overflow-hidden">
        <img src="148359.png" alt="Chroma Logo" class="w-10 h-10 group-hover:scale-110 transition-transform duration-500" />
      </div>
      <div class="leading-tight">
        <div class="font-serif text-[22px] font-bold tracking-tight text-brand-navy">Chroma</div>
        <div class="text-[11px] uppercase tracking-[0.2em] text-chroma-teal font-semibold">Early Learning Academy</div>
      </div>
    </a>
    <?php
    $fallback_links = [
        __('Programs', 'chroma')      => get_post_type_archive_link('program'),
        __('Parents', 'chroma')       => get_permalink(get_page_by_path('parents')),
        __('About Us', 'chroma')      => get_permalink(get_page_by_path('about')),
        __('Locations', 'chroma')     => get_post_type_archive_link('location'),
        __('Stories', 'chroma')       => get_post_type_archive_link('stories') ?: get_permalink(get_option('page_for_posts')),
        __('Contact', 'chroma')       => get_permalink(get_page_by_path('contact')),
      ];
    ?>
    <nav class="hidden md:flex items-center gap-8 text-[14px] font-semibold text-slate-700">
      <?php
      if (has_nav_menu('primary')) {
          wp_nav_menu([
              'theme_location' => 'primary',
              'container'      => false,
              'items_wrap'     => '<ul class="flex items-center gap-8">%3$s</ul>',
              'link_before'    => '<span class="hover:text-brand-navy transition-colors">',
              'link_after'     => '</span>',
            ]);
      } else {
          echo '<ul class="flex items-center gap-8">';
          foreach ($fallback_links as $label => $url) {
              if (!$url) {
                  continue;
              }
              printf('<li><a class="hover:text-brand-navy transition-colors" href="%s">%s</a></li>', esc_url($url), esc_html($label));
          }
          echo '</ul>';
      }
      ?>
      <a href="<?php echo esc_url(home_url('#tour')); ?>" class="magnetic inline-flex items-center gap-2 bg-brand-navy text-white text-xs font-semibold tracking-[0.2em] px-6 py-3 rounded-full shadow-soft hover:bg-slate-900 transition-all" data-event="chroma_cta_click">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
        Book A Tour
      </a>
    </nav>
    <button id="menu-btn" class="md:hidden text-3xl text-brand-navy">☰</button>
  </div>
  <div id="mobile-menu" class="fixed inset-0 bg-white z-50 translate-x-full transition-transform duration-300 md:hidden flex flex-col">
    <div class="flex items-center justify-between px-5 py-5 border-b border-slate-200">
      <div class="flex items-center gap-2">
        <img src="148359.png" class="w-9 h-9 rounded-xl" />
        <span class="font-serif text-lg font-bold text-brand-navy">Chroma Menu</span>
      </div>
      <button id="close-menu" class="text-3xl text-brand-navy">×</button>
    </div>
    <nav class="flex-1 px-6 py-6 text-lg font-semibold text-brand-navy space-y-6">
      <?php
      if (has_nav_menu('primary')) {
          wp_nav_menu([
              'theme_location' => 'primary',
              'container'      => false,
              'items_wrap'     => '<ul class="space-y-6">%3$s</ul>',
              'link_before'    => '<span class="block hover:text-chroma-teal">',
              'link_after'     => '</span>',
          ]);
      } else {
          foreach ($fallback_links as $label => $url) {
              if (!$url) {
                  continue;
              }
              printf('<a class="block hover:text-chroma-teal" href="%s">%s</a>', esc_url($url), esc_html($label));
          }
      }
      ?>
      <a href="<?php echo esc_url(home_url('#tour')); ?>" class="block bg-brand-navy text-white text-center py-3 rounded-2xl shadow-soft hover:bg-slate-900 transition mt-4" data-event="chroma_cta_click">Book A Tour</a>
    </nav>
  </div>
</header>
<!-- =============================== -->
<!-- 🔵 PREMIUM HERO -->
<!-- =============================== -->
<section class="relative overflow-hidden bg-gradient-to-br from-[#fafafa] via-[#fdfaf3] to-[#f5f3ff] pt-20 pb-24 lg:pt-24">
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute -top-20 left-0 w-96 h-96 bg-chroma-teal/20 blur-3xl opacity-70"></div>
    <div class="absolute top-32 right-10 w-72 h-72 bg-chroma-pink/20 blur-[100px] opacity-60"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-chroma-purple/10 blur-[140px] opacity-40"></div>
  </div>
  <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">
    <div class="grid lg:grid-cols-2 gap-14 items-center">
      <div class="reveal">
        <div class="inline-flex items-center gap-2 bg-white/90 border border-slate-300 px-3 py-1.5 rounded-full text-[11px] uppercase tracking-[0.22em] font-semibold text-slate-600 shadow-soft">
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          <?php echo esc_html($home_sections['hero']['badge_text']); ?>
        </div>
        <?php
          $hero_heading      = $home_sections['hero']['heading'];
          $hero_highlight    = $home_sections['hero']['highlight'];
          $hero_heading_safe = esc_html($hero_heading);
          $contains_highlight = $hero_highlight && (function_exists('str_contains')
              ? str_contains($hero_heading, $hero_highlight)
              : (strpos($hero_heading, $hero_highlight) !== false));
          if ($contains_highlight) {
              $hero_heading_safe = str_replace(
                  esc_html($hero_highlight),
                  '<span class="bg-gradient-to-r from-chroma-teal via-chroma-purple to-chroma-pink bg-clip-text text-transparent">' . esc_html($hero_highlight) . '</span>',
                  $hero_heading_safe
              );
          }
        ?>
        <h1 class="mt-6 font-serif text-brand-navy text-[2.7rem] sm:text-[3.4rem] leading-tight tracking-tight">
          <?php echo wp_kses($hero_heading_safe, ['span' => ['class' => []]]); ?>
        </h1>
        <p class="mt-5 text-[15px] leading-relaxed text-slate-700 max-w-xl">
          <?php echo wp_kses_post($home_sections['hero']['body']); ?>
        </p>
        <div class="mt-7 flex flex-col sm:flex-row gap-4 sm:items-center">
          <?php if (!empty($home_sections['hero']['primary_cta']['url'])) : ?>
            <a href="<?php echo esc_url($home_sections['hero']['primary_cta']['url']); ?>" class="magnetic inline-flex items-center justify-center px-8 py-4 rounded-full bg-brand-navy text-white text-xs font-semibold uppercase tracking-[0.22em] shadow-soft hover:bg-slate-900" data-event="chroma_cta_click">
              <?php echo esc_html($home_sections['hero']['primary_cta']['title'] ?? __('Schedule a Tour', 'chroma')); ?>
            </a>
          <?php endif; ?>
          <?php if (!empty($home_sections['hero']['secondary_cta']['url'])) : ?>
            <a href="<?php echo esc_url($home_sections['hero']['secondary_cta']['url']); ?>" class="inline-flex items-center justify-center px-7 py-3.5 rounded-full border border-slate-300 bg-white text-xs font-semibold uppercase tracking-[0.18em] text-brand-navy hover:border-brand-navy/70 hover:bg-slate-50" data-event="chroma_cta_click">
              <?php echo esc_html($home_sections['hero']['secondary_cta']['title'] ?? __('View Programs', 'chroma')); ?>
            </a>
          <?php endif; ?>
        </div>
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
      <div class="relative w-full h-[420px] sm:h-[460px] lg:h-[480px] reveal">
        <div class="absolute -top-2 left-6 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-slow">
          <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center text-lg">👶</div>
          <div class="leading-tight">
            <p class="text-[12px] font-semibold text-slate-700">Infant Care</p>
            <p class="text-[10px] text-slate-400">Safe sleep • Low ratios</p>
          </div>
        </div>
        <div class="absolute bottom-4 left-2 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-medium">
          <div class="w-9 h-9 bg-sky-50 rounded-xl flex items-center justify-center text-lg">🎓</div>
          <div class="leading-tight">
            <p class="text-[12px] font-semibold text-slate-700">GA Pre-K</p>
            <p class="text-[10px] text-slate-400">School readiness</p>
          </div>
        </div>
        <div class="absolute inset-y-0 left-16 right-0 rounded-[3rem] overflow-hidden border border-white/10 shadow-soft prism-mask">
          <video autoplay muted playsinline loop class="w-full h-full object-cover">
            <source src="hero-classroom.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="absolute inset-y-4 left-20 right-4 rounded-[3rem] border border-white/50 border-dashed opacity-40 pointer-events-none"></div>
      </div>
    </div>
  </div>
</section>
<!-- =============================== -->
<!-- 🔵 STATS STRIP -->
<!-- =============================== -->
<section class="bg-brand-navy text-white py-10 border-y border-slate-800/70">
  <div class="max-w-7xl mx-auto px-4 lg:px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center reveal">
    <?php foreach ($home_sections['stats_strip']['items'] as $index => $item) :
      $colors = ['text-chroma-teal', 'text-chroma-pink', 'text-chroma-yellow', 'text-chroma-purple'];
      $color_class = $colors[$index % count($colors)];
    ?>
      <div class="group">
        <div class="font-serif text-3xl font-bold <?php echo esc_attr($color_class); ?> group-hover:scale-110 transition-transform duration-300"><?php echo esc_html($item['value'] ?? ''); ?></div>
        <div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-white/70"><?php echo esc_html($item['label'] ?? ''); ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<!-- =============================== -->
<!-- 🔵 PROGRAMS WIZARD (#programs) -->
<!-- =============================== -->
<section id="programs" class="py-20 bg-white border-b border-slate-100">
  <div class="max-w-5xl mx-auto px-4 lg:px-6">
    <div class="text-center mb-10 reveal">
      <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">
        <?php echo esc_html($home_sections['programs']['heading']); ?>
      </h2>
      <p class="text-slate-600 text-sm md:text-base max-w-2xl mx-auto">
        <?php echo esc_html($home_sections['programs']['intro']); ?>
      </p>
    </div>
    <div class="bg-brand-cream rounded-3xl p-6 md:p-8 border border-slate-100 shadow-soft reveal">
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
      <div id="wizard-result" class="hidden text-center pt-6">
        <h3 id="wizard-title" class="text-2xl font-serif font-bold text-brand-navy mb-2">Program Name</h3>
        <p id="wizard-desc" class="text-slate-600 mb-5 max-w-xl mx-auto text-sm md:text-base">
          Description goes here.
        </p>
        <div class="flex justify-center gap-5 text-xs">
          <button type="button" onclick="resetWizard()" class="text-slate-400 hover:text-brand-navy underline decoration-dotted">
            Start Over
          </button>
          <a href="#tour" class="inline-flex items-center justify-center px-5 py-2 rounded-full bg-brand-navy text-white font-semibold hover:bg-slate-900 transition" data-event="chroma_cta_click">
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
    <div class="reveal">
      <span class="text-chroma-teal font-bold tracking-[0.22em] uppercase text-[11px] mb-2 block">
        <?php echo esc_html($home_sections['curriculum']['kicker']); ?>
      </span>
      <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-4">
        <?php echo esc_html($home_sections['curriculum']['heading']); ?>
      </h2>
      <p class="text-slate-600 text-sm md:text-base mb-6 max-w-xl">
        <?php echo esc_html($home_sections['curriculum']['body']); ?>
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
        <?php echo esc_html($home_sections['schedule']['heading']); ?>
      </h2>
      <p class="text-slate-200 text-sm md:text-base max-w-2xl mx-auto">
        <?php echo esc_html($home_sections['schedule']['intro']); ?>
      </p>
    </div>
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
    <div class="relative mb-10 reveal">
      <div class="hidden md:block absolute top-1/2 left-0 right-0 h-px bg-slate-700 -translate-y-1/2"></div>
      <div id="time-selector-container" class="relative z-10 flex items-center gap-4 overflow-x-auto no-scrollbar pb-4 md:pb-0">
      </div>
    </div>
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
          <?php echo esc_html($home_sections['reviews']['heading']); ?>
        </h2>
        <div class="flex items-center gap-3 text-sm text-slate-600">
          <div class="flex items-center gap-1">
            <span class="text-yellow-400 text-lg">★★★★★</span>
            <span class="font-semibold">4.8</span>
          </div>
          <span class="w-[1px] h-4 bg-slate-300 hidden sm:inline-block"></span>
          <span><?php echo esc_html($home_sections['reviews']['subheading']); ?></span>
        </div>
      </div>
      <div class="flex gap-2 justify-start md:justify-end">
        <button type="button" onclick="document.getElementById('reviews-container').scrollBy({left: -320, behavior: 'smooth'})" class="w-9 h-9 rounded-full border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50">←</button>
        <button type="button" onclick="document.getElementById('reviews-container').scrollBy({left: 320, behavior: 'smooth'})" class="w-9 h-9 rounded-full border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50">→</button>
      </div>
    </div>
    <div id="reviews-container" class="flex gap-5 overflow-x-auto no-scrollbar pb-3 reveal">
      <article class="min-w-[260px] max-w-sm bg-white border border-slate-200 rounded-3xl p-6 shadow-soft">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold">S</div>
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
      <article class="min-w-[260px] max-w-sm bg-white border border-slate-200 rounded-3xl p-6 shadow-soft">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-semibold">Y</div>
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
      <article class="min-w-[260px] max-w-sm bg-white border border-slate-200 rounded-3xl p-6 shadow-soft">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-semibold">B</div>
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
        <?php echo esc_html($home_sections['locations']['heading']); ?>
      </h2>
      <p class="text-slate-600 text-sm md:text-base max-w-2xl mx-auto">
        <?php echo esc_html($home_sections['locations']['intro']); ?>
      </p>
    </div>
    <div class="reveal">
      <?php
      $location_query = new WP_Query([
          'post_type'      => 'location',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'orderby'        => 'title',
          'order'          => 'ASC',
      ]);
      ?>
      <?php if ($location_query->have_posts()) : ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-sm">
          <?php
          while ($location_query->have_posts()) :
              $location_query->the_post();
              $address_data = get_field('address', get_the_ID());
              $address_line = '';
              if (is_array($address_data)) {
                  $address_line = trim(($address_data['street'] ?? '') . ' ' . ($address_data['city'] ?? ''));
              }
              if (!$address_line) {
                  $address_line = get_post_meta(get_the_ID(), 'address', true);
              }
              $status = get_post_meta(get_the_ID(), 'enrollment_status', true);
          ?>
          <article class="p-4 rounded-xl border border-slate-100 hover:border-chroma-teal/50 hover:bg-slate-50 transition shadow-soft/10">
            <a href="<?php the_permalink(); ?>" class="block" data-event="chroma_cta_click">
              <?php if (has_post_thumbnail()) : ?>
                <div class="mb-3 overflow-hidden rounded-lg aspect-[4/3]">
                  <?php the_post_thumbnail('chroma-card', ['class' => 'w-full h-full object-cover']); ?>
                </div>
              <?php endif; ?>
              <p class="font-semibold text-brand-navy"><?php the_title(); ?></p>
              <?php if (!empty($address_line)) : ?>
                <p class="text-[11px] text-slate-500"><?php echo esc_html($address_line); ?></p>
              <?php endif; ?>
              <?php if (!empty($status)) : ?>
                <p class="text-[10px] font-semibold text-emerald-600 mt-1"><?php echo esc_html($status); ?></p>
              <?php endif; ?>
            </a>
          </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php else : ?>
        <p class="text-center text-slate-600">No locations published yet. Add a new Location to populate this grid automatically.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- =============================== -->
<!-- 🔵 TOUR CTA (#tour) -->
<!-- =============================== -->
<section id="tour" class="py-20 bg-brand-cream border-t border-slate-100">
  <div class="max-w-5xl mx-auto px-4 lg:px-6 reveal">
    <div class="bg-white rounded-[2.5rem] shadow-soft border border-slate-100 overflow-hidden grid md:grid-cols-[1.1fr,1fr]">
      <div class="p-8 md:p-10">
        <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3">
          <?php echo esc_html($home_sections['tour']['heading']); ?>
        </h2>
        <p class="text-slate-600 text-sm md:text-base mb-6">
          <?php echo esc_html($home_sections['tour']['intro']); ?>
        </p>
        <?php echo do_shortcode('[chroma_tour_form class="space-y-4"]'); ?>
      </div>
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
        <?php echo esc_html($home_sections['faq']['heading']); ?>
      </h2>
      <p class="text-slate-600 text-sm md:text-base max-w-2xl mx-auto">
        <?php echo esc_html($home_sections['faq']['intro']); ?>
      </p>
    </div>
    <div class="space-y-4 reveal">
      <?php foreach ($home_sections['faq']['items'] as $faq_item) : ?>
        <details class="group bg-brand-cream rounded-2xl px-5 py-4 border border-slate-100">
          <summary class="flex items-center justify-between gap-3 cursor-pointer list-none">
            <span class="font-semibold text-sm text-brand-navy"><?php echo esc_html($faq_item['question'] ?? ''); ?></span>
            <span class="text-slate-500 group-open:rotate-180 transition-transform">⌄</span>
          </summary>
          <p class="mt-3 text-sm text-slate-600">
            <?php echo esc_html($faq_item['answer'] ?? ''); ?>
          </p>
        </details>
      <?php endforeach; ?>
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
          Premium childcare &amp; early education across Metro Atlanta.
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
