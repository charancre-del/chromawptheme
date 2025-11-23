(function ($) {
  function track(eventName, payload) {
    if (typeof window.gtag === 'function') {
      window.gtag('event', eventName, payload);
    }
  }

  $(document).on('submit', 'form', function () {
    track(chromaTheme.tracking.formEvent, { form_id: this.id || 'unknown_form' });
  });

  $(document).on('click', '[data-event="chroma_cta_click"]', function () {
    track(chromaTheme.tracking.ctaEvent, { label: $(this).text(), href: $(this).attr('href') });
  });

  $(document).on('click', '[data-event="chroma_hook_trigger"]', function () {
    track(chromaTheme.tracking.hookEvent, { label: $(this).text() });
  });
})(jQuery);
