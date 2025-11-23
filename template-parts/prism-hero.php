<?php
/**
 * Reusable Prismpath-style hero block.
 */

if (!isset($args['hero']) || !is_array($args['hero'])) {
    return;
}

$hero = $args['hero'];

$eyebrow = $hero['eyebrow'] ?? '';
$title   = $hero['title'] ?? get_the_title();
$lede    = $hero['lede'] ?? '';
$kicker  = $hero['kicker'] ?? '';
$primary = $hero['primary'] ?? [];
$secondary = $hero['secondary'] ?? [];
$media = $hero['media'] ?? [];
$gradient = $hero['background'] ?? 'from-[#fafafa] via-[#fdfaf3] to-[#f5f3ff]';

$primary_url = $primary['url'] ?? '#contact';
$primary_label = $primary['label'] ?? __('Schedule a Tour', 'chroma');
$primary_id = $primary['id'] ?? 'hero-primary';

$secondary_url = $secondary['url'] ?? '#programs';
$secondary_label = $secondary['label'] ?? __('View Programs', 'chroma');
$secondary_id = $secondary['id'] ?? 'hero-secondary';

$media_tagline = $media['tagline'] ?? '';
$media_caption = $media['caption'] ?? '';
$media_image = $media['image'] ?? '';

?>
<section class="relative overflow-hidden bg-gradient-to-br <?php echo esc_attr($gradient); ?> pt-16 pb-20 lg:pt-24">
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute -top-24 left-0 w-96 h-96 bg-chroma-teal/20 blur-3xl opacity-70"></div>
    <div class="absolute top-32 right-10 w-72 h-72 bg-chroma-pink/20 blur-[100px] opacity-60"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-chroma-purple/10 blur-[140px] opacity-40"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">
    <div class="grid lg:grid-cols-2 gap-14 items-center">
      <div class="reveal">
        <?php if ($eyebrow) : ?>
          <div class="inline-flex items-center gap-2 bg-white/90 border border-slate-300 px-3 py-1.5 rounded-full text-[11px] uppercase tracking-[0.22em] font-semibold text-slate-600 shadow-soft">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <?php echo esc_html($eyebrow); ?>
          </div>
        <?php endif; ?>

        <h1 class="mt-6 font-serif text-brand-navy text-[2.4rem] sm:text-[3.2rem] leading-tight tracking-tight">
          <?php echo wp_kses_post($title); ?>
        </h1>

        <?php if ($lede) : ?>
          <p class="mt-5 text-[15px] leading-relaxed text-slate-700 max-w-xl">
            <?php echo wp_kses_post($lede); ?>
          </p>
        <?php endif; ?>

        <?php if ($kicker) : ?>
          <p class="mt-3 text-[12px] font-semibold uppercase tracking-[0.22em] text-chroma-teal">
            <?php echo esc_html($kicker); ?>
          </p>
        <?php endif; ?>

        <div class="mt-7 flex flex-col sm:flex-row gap-4 sm:items-center">
          <a
            href="<?php echo esc_url($primary_url); ?>"
            class="magnetic inline-flex items-center justify-center px-8 py-4 rounded-full bg-brand-navy text-white text-xs font-semibold uppercase tracking-[0.22em] shadow-soft hover:bg-slate-900"
            data-cta-id="<?php echo esc_attr($primary_id); ?>"
            data-cta-context="hero"
            data-cta-page="<?php echo esc_attr(get_the_title()); ?>"
            data-cta-destination="<?php echo esc_url($primary_url); ?>"
            data-cta-variant="primary"
          >
            <?php echo esc_html($primary_label); ?>
          </a>

          <a
            href="<?php echo esc_url($secondary_url); ?>"
            class="inline-flex items-center justify-center px-7 py-3.5 rounded-full border border-slate-300 bg-white text-xs font-semibold uppercase tracking-[0.18em] text-brand-navy hover:border-brand-navy/70 hover:bg-slate-50"
            data-cta-id="<?php echo esc_attr($secondary_id); ?>"
            data-cta-context="hero"
            data-cta-page="<?php echo esc_attr(get_the_title()); ?>"
            data-cta-destination="<?php echo esc_url($secondary_url); ?>"
            data-cta-variant="secondary"
          >
            <?php echo esc_html($secondary_label); ?>
          </a>
        </div>

        <div class="mt-8 flex flex-wrap items-center gap-5 text-[12px] text-slate-500">
          <div class="flex items-center gap-2">
            <span class="text-yellow-400 text-lg">★★★★★</span>
            <span><?php esc_html_e('Parent-loved programs & directors', 'chroma'); ?></span>
          </div>
          <div class="hidden sm:block w-[1px] h-5 bg-slate-300"></div>
          <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
            <span><?php esc_html_e('Licensed • Quality Rated • GA Pre-K Partner', 'chroma'); ?></span>
          </div>
        </div>
      </div>

      <div class="relative w-full h-[420px] sm:h-[460px] lg:h-[480px] reveal">
        <div class="absolute -top-2 left-6 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-slow">
          <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center text-lg">👶</div>
          <div class="leading-tight">
            <p class="text-[12px] font-semibold text-slate-700"><?php esc_html_e('Infant Care', 'chroma'); ?></p>
            <p class="text-[10px] text-slate-400"><?php esc_html_e('Safe sleep • Low ratios', 'chroma'); ?></p>
          </div>
        </div>

        <div class="absolute bottom-4 left-2 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-medium">
          <div class="w-9 h-9 bg-sky-50 rounded-xl flex items-center justify-center text-lg">🎓</div>
          <div class="leading-tight">
            <p class="text-[12px] font-semibold text-slate-700"><?php esc_html_e('GA Pre-K', 'chroma'); ?></p>
            <p class="text-[10px] text-slate-400"><?php esc_html_e('School readiness', 'chroma'); ?></p>
          </div>
        </div>

        <div class="absolute -bottom-4 right-6 bg-white border border-slate-200 shadow-soft px-4 py-3 rounded-2xl flex items-center gap-3 animate-float-slow">
          <div class="w-9 h-9 bg-yellow-50 rounded-xl flex items-center justify-center text-lg">🌟</div>
          <div class="leading-tight">
            <p class="text-[12px] font-semibold text-slate-700"><?php esc_html_e('Enrichments', 'chroma'); ?></p>
            <p class="text-[10px] text-slate-400"><?php esc_html_e('STEAM • Art • Music', 'chroma'); ?></p>
          </div>
        </div>

        <div class="relative w-full h-full bg-white/60 rounded-[32px] shadow-soft border border-slate-200 overflow-hidden">
          <?php if ($media_image) : ?>
            <img src="<?php echo esc_url($media_image); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($media_caption ?: $title)); ?>" class="w-full h-full object-cover" />
          <?php else : ?>
            <div class="absolute inset-0 bg-gradient-to-br from-chroma-teal/80 via-chroma-purple/70 to-chroma-pink/80"></div>
            <div class="relative z-10 flex items-center justify-center h-full">
              <div class="bg-white/90 border border-white/50 shadow-soft rounded-3xl px-6 py-4 max-w-sm text-center">
                <p class="text-sm font-semibold text-brand-navy"><?php esc_html_e('Beautiful learning environments', 'chroma'); ?></p>
                <p class="text-xs text-slate-600 mt-1"><?php esc_html_e('Imagery coming soon', 'chroma'); ?></p>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($media_tagline || $media_caption) : ?>
            <div class="absolute left-6 bottom-6 bg-white/90 px-4 py-3 rounded-2xl shadow-soft border border-slate-200">
              <?php if ($media_tagline) : ?>
                <p class="text-[11px] font-semibold text-chroma-teal uppercase tracking-[0.2em]"><?php echo esc_html($media_tagline); ?></p>
              <?php endif; ?>
              <?php if ($media_caption) : ?>
                <p class="text-[13px] text-brand-navy mt-1"><?php echo esc_html($media_caption); ?></p>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
