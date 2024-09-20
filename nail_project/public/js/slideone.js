document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const items = document.querySelectorAll('.items');
    const dots = document.querySelectorAll('.dot');
    const totalItems = items.length;

    if (totalItems === 0) return; // ตรวจสอบถ้ามี slides ให้ทำงาน

    function updateCarousel() {
        // ใช้ความกว้างจริงของ items เพื่อคำนวณ slideWidth
        const slideWidth = items[0].offsetWidth; // ขนาดของแต่ละ slide (อิงจากขนาดจริง)
        const margin = 40; // ถ้ามี margin หรือ padding เพิ่มเติม
        const newTranslateX = -currentIndex * (slideWidth + margin);

        // อัปเดตการแปลที่ใช้เลื่อน
        items.forEach(item => {
            item.style.transform = `translateX(${newTranslateX}px)`;
        });

        // อัปเดตจุดสถานะ (dots)
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    setInterval(function() {
        currentIndex = (currentIndex + 1) % totalItems; // วน loop
        updateCarousel();
    }, 2500);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            currentIndex = index;
            updateCarousel();
        });
    });

    window.addEventListener('resize', updateCarousel); // อัปเดตขนาดเมื่อหน้าต่างเปลี่ยนขนาด
});
