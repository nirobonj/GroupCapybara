document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const items = document.querySelectorAll('.items');
    const dots = document.querySelectorAll('.dot');
    const totalItems = items.length;

    if (totalItems === 0) return; // ตรวจสอบถ้ามี slides ให้ทำงาน

    function updateCarousel() {
        const slideWidth = 720; // ขนาดของแต่ละ slide
        const margin = 20; // ถ้ามี margin หรือ padding เพิ่มเติม
        const newTranslateX = -currentIndex * (slideWidth + margin);

        items.forEach(item => {
            item.style.transform = `translateX(${newTranslateX}px)`;
        });

        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    setInterval(function() {
        currentIndex = (currentIndex + 1) % totalItems; // วน loop
        updateCarousel();
    }, 3000);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            currentIndex = index;
            updateCarousel();
        });
    });
});
