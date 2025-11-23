<?php
/**
 * Home Hero Section
 * Chroma Excellence Theme
 *
 * Uses ACF helpers from inc/acf-homepage.php:
 * - chroma_home_hero()
 * - chroma_home_has_hero()
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$hero = chroma_home_hero();

$heading_default = 'A modern, beautiful early learning experience built for parents who expect more.';
$sub_default     = 'Chroma combines a research-based Chroma Spectrum™ curriculum, warm experienced teachers, and beautifully prepared environments for children 6 weeks to 12 years. Designed for safety. Engineered for growth. Loved by families.';

$primary_label   = $hero['cta_label']        ?: 'Schedule a Tour';
$primary_url     = $hero['cta_url']          ?: '#tour';
$secondary_label = $hero['secondary_label']  ?: 'View Programs';
$secondary_url   = $hero['secondary_url']    ?: '#programs';

// For the H1, we’ll allow you to break it into “main” + highlighted span later if you want.
// For now we render the whole heading as one block, with the highlight hard-coded visually.
$heading_text = $hero['heading'] ?: $heading_default;
$sub_text     = $hero['subheading'] ?: $sub_default;

?>

<section class="relative overflow-hidden bg-gradient-to-br from-[#fafafa] via-[#fdfaf3] to-[#f5f3ff] pt-20 pb-24 lg:pt-24">

  <!-- ORBS / BACKGROUND GLOW -->
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute -top-20 left-0 w-96 h-96 bg-chroma-teal/20 blur-3xl opacity-70"></div>
    <div class="absolute top-32 right-10 w-72 h-72 bg-chroma-pink/20 blur-[100px] opacity-60"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[520px] h-[500px] bg-chroma-purple/10 blur-[140px] opacity-40"></div>
  </div>

  <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)] gap-12 lg:gap-16 items-center">

      <!-- LEFT COLUMN: Copy + CTA -->
      <div>

        <!-- Small eyebrow -->
        <p class="text-[11px] font-semibold tracking-[0.24em] uppercase text-chroma-teal">
          Premium Childcare · Metro Atlanta
        </p>

        <!-- H1 (from ACF, with your hero styling) -->
        <h1 class="mt-6 font-serif text-brand-navy text-[2.7rem] sm:text-[3.4rem] leading-tight tracking-tight">
          <?php echo esc_html( $heading_text ); ?>
        </h1>

        <!-- Subcopy -->
        <p class="mt-5 text-[15px] leading-relaxed text-slate-700 max-w-xl">
          <?php echo wp_kses_post( nl2br( $sub_text ) ); ?>
        </p>

        <!-- CTA row -->
        <div class="mt-7 flex flex-col sm:flex-row gap-4 sm:items-center">

          <?php if ( $primary_label && $primary_url ) : ?>
            <a href="<?php echo esc_url( $primary_url ); ?>"
               class="magnetic inline-flex items-center justify-center px-7 py-3.5 rounded-full bg-brand-navy text-white text-[13px] font-semibold tracking-[0.22em] uppercase shadow-soft hover:bg-slate-900 transition">
              <?php echo esc_html( $primary_label ); ?>
            </a>
          <?php endif; ?>

          <?php if ( $secondary_label && $secondary_url ) : ?>
            <a href="<?php echo esc_url( $secondary_url ); ?>"
               class="inline-flex items-center justify-center px-7 py-3.5 rounded-full border border-slate-300 bg-white/70 text-[13px] font-semibold uppercase tracking-[0.22em] text-brand-navy hover:border-brand-navy/70 hover:bg-slate-50 transition">
              <?php echo esc_html( $secondary_label ); ?>
            </a>
          <?php endif; ?>

        </div>

        <!-- Social proof row -->
        <div class="mt-8 flex flex-wrap items-center gap-5 text-[12px] text-slate-500">
          <div class="flex items-center gap-2">
            <span class="text-yellow-400 text-lg">★★★★★</span>
            <span>4.8 Average Parent Rating</span>
          </div>
          <div class="hidden sm:inline-flex h-4 w-px bg-slate-300"></div>
          <div class="flex items-center gap-2">
            <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-emerald-700 text-[11px] font-semibold">
              QR
            </span>
            <span>Georgia Quality Rated locations across Metro Atlanta</span>
          </div>
        </div>

      </div>

      <!-- RIGHT COLUMN: Visual / Video Card -->
      <div class="relative">
        <div class="relative rounded-[32px] bg-white/90 border border-white/60 shadow-soft overflow-hidden">
          <div class="aspect-[4/3] bg-slate-200">
            <!-- You can replace this with a real video / image field later -->
            <?php if ( has_post_thumbnail( chroma_get_home_page_id() ) ) : ?>
              <?php echo get_the_post_thumbnail( chroma_get_home_page_id(), 'chroma_hero', [ 'class' => 'w-full h-full object-cover' ] ); ?>
            <?php else : ?>
              <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm">
                Chroma campus snapshot / tour video
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Floating Stats Card (bottom) -->
        <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 w-full max-w-md rounded-3xl bg-brand-navy text-white px-6 py-4 shadow-soft border border-white/20">
          <div class="flex items-center justify-between gap-4">
            <div>
              <div class="text-[11px] uppercase tracking-[0.2em] text-white/70">Metro Atlanta</div>
              <div class="mt-1 font-serif text-2xl font-bold">Chroma Early Learning Academy</div>
            </div>
          </div>
          <div class="mt-4 grid grid-cols-3 gap-3 text-center text-[11px]">
            <div class="group">
              <div class="font-serif text-3xl font-bold text-chroma-teal group-hover:scale-110 transition-transform duration-300">15+</div>
              <div class="mt-1 uppercase tracking-[0.18em] text-white/70">Campuses</div>
            </div>
            <div class="group">
              <div class="font-serif text-3xl font-bold text-chroma-pink group-hover:scale-110 transition-transform duration-300">2,000+</div>
              <div class="mt-1 uppercase tracking-[0.18em] text-white/70">Children enrolled</div>
            </div>
            <div class="group">
              <div class="font-serif text-3xl font-bold text-chroma-yellow group-hover:scale-110 transition-transform duration-300">6w–12y</div>
              <div class="mt-1 uppercase tracking-[0.18em] text-white/70">Age span</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>