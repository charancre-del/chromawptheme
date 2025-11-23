<?php
/**
 * Template for the Acquisitions page with Prismpath-style hero and CTA rows.
 */

require_once get_template_directory() . '/inc/prismpath-helpers.php';

get_header();

$hero = chroma_build_hero_from_page('acquisitions_hero');
$hero['eyebrow'] = $hero['eyebrow'] ?: __('For Owners', 'chroma');
$hero['title'] = $hero['title'] ?: __('Thoughtful acquisitions with a focus on families and staff', 'chroma');
$hero['lede'] = $hero['lede'] ?: __('We partner with mission-aligned schools to invest in people, facilities, and community impact.', 'chroma');
$hero['kicker'] = $hero['kicker'] ?: __('Respectful transitions • Capital improvements • Strong leadership bench', 'chroma');

$cta = chroma_build_cta('#contact', __('Start a Conversation', 'chroma'));
$cta['title'] = $cta['title'] ?: __('Let’s talk about succession and growth', 'chroma');
$cta['subtitle'] = $cta['subtitle'] ?: __('Share your goals for your school community and we will design a caring transition.', 'chroma');
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
        <p class="text-slate-600 text-sm"><?php esc_html_e('We are preparing acquisition resources. Let’s connect for details.', 'chroma'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/prism-cta-row', null, ['cta' => $cta]); ?>

<?php get_footer(); ?>
