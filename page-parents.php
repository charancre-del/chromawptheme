<?php
/**
 * Template for the Parents page with Prismpath-style hero and CTA rows.
 */

require_once get_template_directory() . '/inc/prismpath-helpers.php';

get_header();

$hero = chroma_build_hero_from_page('parents_hero');
$hero['eyebrow'] = $hero['eyebrow'] ?: __('For Families', 'chroma');
$hero['title'] = $hero['title'] ?: __('Childcare designed for busy, high-expectation parents', 'chroma');
$hero['lede'] = $hero['lede'] ?: __('From live updates to proven curriculum, every detail is built for trust, safety, and joyful growth.', 'chroma');
$hero['kicker'] = $hero['kicker'] ?: __('Transparent communication • Warm teachers • GA Pre-K partner', 'chroma');

$cta = chroma_build_cta('#contact', __('Schedule a Tour', 'chroma'));
?>

<?php get_template_part('template-parts/prism-hero', null, ['hero' => $hero]); ?>

<section class="bg-white py-14 lg:py-16 border-t border-slate-100">
  <div class="max-w-6xl mx-auto px-4 lg:px-6">
    <div class="bg-white border border-slate-200 shadow-soft rounded-[1.75rem] p-6 md:p-10 space-y-6">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="prose max-w-none prose-slate prose-headings:font-serif prose-headings:text-brand-navy prose-a:text-chroma-teal">
          <?php the_content(); ?>
        </div>
      <?php endwhile; else : ?>
        <p class="text-slate-600 text-sm"><?php esc_html_e('We are gathering parent resources—check back soon.', 'chroma'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/prism-cta-row', null, ['cta' => $cta]); ?>

<?php get_footer(); ?>
