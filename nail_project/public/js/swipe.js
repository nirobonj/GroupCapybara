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

// // สำรองแบบซ้ำข้อมูลแต่ไม่มีข้อมูลว่าง
// const swiper = new Swiper('.swiper-container', {
//     loop: false,  // ปิดการวนลูปเพื่อไม่ให้แสดงกล่องเปล่า
//     pagination: {
//         el: '.swiper-pagination',
//         clickable: true,
//     },
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
//     slidesPerView: 3, // แสดง 3 สไลด์ในเวลาเดียวกันบนหน้าจอขนาดใหญ่
//     spaceBetween: 10,
//     slidesPerGroup: 3, // เคลื่อนที่ทีละ 3 สไลด์
//     breakpoints: {
//         600: {
//             slidesPerView: 1,
//             slidesPerGroup: 1,
//             spaceBetween: 5,
//         },
//         700: {
//             slidesPerView: 2,
//             slidesPerGroup: 2,
//             spaceBetween: 5,
//         },
//         800: {
//             slidesPerView: 3,
//             slidesPerGroup: 3,
//             spaceBetween: 10,
//         }
//     },
//     on: {
//         init: function () {
//             this.update(); // อัปเดต Swiper ตอนเริ่มต้น
//         },
//         resize: function () {
//             this.update(); // อัปเดต Swiper เมื่อหน้าต่างเปลี่ยนขนาด
//         }
//     }
// });
