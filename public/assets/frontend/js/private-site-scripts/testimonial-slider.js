tns({
    container: ".testimonial-slider",
    items: 3,
    autoplay: true,
    autoplayButtonOutput: false,
    mouseDrag: true,
    gutter: 0,
    nav: true,
    textDirection: 'rtl',
    rtl: true,
    controls: false,
    controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>',],
    responsive: {
        0: {
            items: 1,
        },
        1170: {
            items: 2,
        },
    },
});