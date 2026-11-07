/* Fairways - simple scroll-snap carousel.
 * Markup: [data-carousel] > .carousel-track > .carousel-slide, plus .carousel-prev / .carousel-next buttons.
 */
(function () {
  'use strict';

  document.querySelectorAll('[data-carousel]').forEach(function (root) {
    var track = root.querySelector('.carousel-track');
    if (!track) return;

    var prev = root.querySelector('.carousel-prev');
    var next = root.querySelector('.carousel-next');

    function stepSize() {
      var slide = track.querySelector('.carousel-slide');
      if (!slide) return track.clientWidth * 0.8;
      var gap = parseFloat(window.getComputedStyle(track).columnGap) || 0;
      return slide.getBoundingClientRect().width + gap;
    }

    if (prev) {
      prev.addEventListener('click', function () {
        track.scrollBy({ left: -stepSize(), behavior: 'smooth' });
      });
    }
    if (next) {
      next.addEventListener('click', function () {
        track.scrollBy({ left: stepSize(), behavior: 'smooth' });
      });
    }

    // Keyboard support when the track has focus.
    track.addEventListener('keydown', function (event) {
      if (event.key === 'ArrowLeft') { track.scrollBy({ left: -stepSize(), behavior: 'smooth' }); }
      if (event.key === 'ArrowRight') { track.scrollBy({ left: stepSize(), behavior: 'smooth' }); }
    });
  });
})();
