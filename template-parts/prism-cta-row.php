<?php
/**
 * Reusable CTA row with analytics attributes and contact fallbacks.
 */

if (!isset($args['cta']) || !is_array($args['cta'])) {
    return;
}

$cta = $args['cta'];

$title = $cta['title'] ?? __('Ready to connect?', 'chroma');
$subtitle = $cta['subtitle'] ?? __('Schedule a tour or reach out to our team—whichever is easier for you.', 'chroma');
$primary = $cta['primary'] ?? [];
$secondary = $cta['secondary'] ?? [];
$contacts = $cta['contacts'] ?? [];

$primary_url = $primary['url'] ?? '#contact';
$primary_label = $primary['label'] ?? __('Schedule a Tour', 'chroma');
$primary_id = $primary['id'] ?? 'cta-primary';

$secondary_url = $secondary['url'] ?? (isset($contacts['phone']) ? 'tel:' . preg_replace('/\D+/', '', $contacts['phone']) : '#');
$secondary_label = $secondary['label'] ?? ($contacts['phone'] ?? __('Call a Director', 'chroma'));
$secondary_id = $secondary['id'] ?? 'cta-secondary';

$phone = $contacts['phone'] ?? '';
$email = $contacts['email'] ?? '';
$address = $contacts['address'] ?? '';
?>
<section class="py-16 bg-brand-cream border-t border-slate-100">
  <div class="max-w-5xl mx-auto px-4 lg:px-6 reveal">
    <div class="bg-white rounded-[2rem] shadow-soft border border-slate-100 overflow-hidden grid md:grid-cols-[1.1fr,1fr]">
      <div class="p-8 md:p-10">
        <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-navy mb-3"><?php echo esc_html($title); ?></h2>
        <p class="text-slate-600 text-sm md:text-base mb-6"><?php echo wp_kses_post($subtitle); ?></p>
        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
          <a
            href="<?php echo esc_url($primary_url); ?>"
            class="inline-flex items-center justify-center px-7 py-3.5 rounded-full bg-brand-navy text-white text-xs font-semibold uppercase tracking-[0.18em] shadow-soft hover:bg-slate-900"
            data-cta-id="<?php echo esc_attr($primary_id); ?>"
            data-cta-context="cta-row"
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
            data-cta-context="cta-row"
            data-cta-page="<?php echo esc_attr(get_the_title()); ?>"
            data-cta-destination="<?php echo esc_url($secondary_url); ?>"
            data-cta-variant="secondary"
          >
            <?php echo esc_html($secondary_label); ?>
          </a>
        </div>

        <div class="mt-6 grid sm:grid-cols-3 gap-4 text-[13px] text-brand-navy">
          <?php if ($phone) : ?>
            <div class="flex items-center gap-2">
              <span class="text-chroma-teal">📞</span>
              <a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>" class="hover:text-chroma-teal font-semibold" data-cta-id="<?php echo esc_attr($primary_id); ?>-phone" data-cta-context="cta-row-contact" data-cta-page="<?php echo esc_attr(get_the_title()); ?>" data-cta-variant="contact" data-cta-destination="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>">
                <?php echo esc_html($phone); ?>
              </a>
            </div>
          <?php endif; ?>
          <?php if ($email) : ?>
            <div class="flex items-center gap-2">
              <span class="text-chroma-purple">✉️</span>
              <a href="mailto:<?php echo antispambot($email); ?>" class="hover:text-chroma-purple font-semibold" data-cta-id="<?php echo esc_attr($primary_id); ?>-email" data-cta-context="cta-row-contact" data-cta-page="<?php echo esc_attr(get_the_title()); ?>" data-cta-variant="contact" data-cta-destination="mailto:<?php echo antispambot($email); ?>">
                <?php echo antispambot($email); ?>
              </a>
            </div>
          <?php endif; ?>
          <?php if ($address) : ?>
            <div class="flex items-center gap-2">
              <span class="text-chroma-orange">📍</span>
              <span class="font-semibold"><?php echo esc_html($address); ?></span>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="bg-gradient-to-br from-chroma-teal/15 via-chroma-purple/15 to-chroma-pink/15 p-8 md:p-10 flex flex-col justify-center">
        <div class="bg-white/80 border border-white/40 rounded-2xl p-6 shadow-soft">
          <p class="text-sm text-brand-navy font-semibold mb-2"><?php esc_html_e('What happens next?', 'chroma'); ?></p>
          <ul class="space-y-3 text-[13px] text-slate-700">
            <li class="flex gap-2"><span class="text-chroma-teal">➊</span> <?php esc_html_e('Share your preferred campus and timeline.', 'chroma'); ?></li>
            <li class="flex gap-2"><span class="text-chroma-purple">➋</span> <?php esc_html_e('A director will confirm tour times and availability.', 'chroma'); ?></li>
            <li class="flex gap-2"><span class="text-chroma-orange">➌</span> <?php esc_html_e('We help with paperwork, tuition info, and next steps.', 'chroma'); ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
