window.addEventListener("load", () => {
  if (typeof Splide !== "undefined") {
    // Select the Splide carousel element
    const splideInstance = document.querySelector(".splide");

    const splide = new Splide(splideInstance, {
      perPage: 3,
      dir: "ltr",
      wheel: false,
    }).mount();

    // Add custom wheel event listener for horizontal scrolling
    splideInstance.addEventListener(
      "wheel",
      (e) => {
        // Check if the gesture is more horizontal than vertical
        if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
          // If scrolling right
          if (e.deltaX > 0) {
            splide.go(">"); // Go to next slide
          }
          // If scrolling left
          else {
            splide.go("<"); // Go to previous slide
          }

          // Prevent page itself from scrolling
          e.preventDefault();
        }
      },
      { passive: false }
    ); // passive:false allows preventDefault() to work
  }
});
