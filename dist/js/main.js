var lazyLoadInstance = new LazyLoad({
});

Fancybox.bind('[data-fancybox^="gallery-"]', {
  Toolbar: {
      display: {
          left: [
            "rotateCCW",
            "rotateCW",
          ],
          middle: [
            "infobar",
          ],
          right: [
            "download",
            "toggleZoom",
            "fullscreen",
            "thumbs",
            "close"
          ],
      },
  },
});    

document.documentElement.style.setProperty('--navbar-height', document.getElementById("navbar").offsetHeight + 'px');
document.documentElement.style.setProperty('--window-height', window.innerHeight + 'px');