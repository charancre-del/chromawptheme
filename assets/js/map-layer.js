(function ($) {
  window.chromaMapLayer = {
    init(mapData) {
      this.mapData = mapData || {};
    },
    filterByProgram(programSlug) {
      return (this.mapData.locations || []).filter(function (location) {
        return !programSlug || (location.programs || []).includes(programSlug);
      });
    }
  };
})(jQuery);
