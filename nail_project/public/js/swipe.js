   // Initialize Swiper
   const swiper = new Swiper('.swiper-container', {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 'auto', // Show 3 slides at a time
spaceBetween: 10,
slidesPerGroup: 'auto', // Move in groups of 3
breakpoints: {
    600: {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 5,
    },
    700: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 5,
    },
    800: {
        slidesPerView: 3,
        slidesPerGroup: 3,
        spaceBetween: 10,
    }
},
on: {
    init: function () {
        this.update(); // Ensure swiper is updated on initialization
    },
    resize: function () {
        this.update(); // Ensure swiper is updated on window resize
    }
}
});