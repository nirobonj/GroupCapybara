document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const items = document.querySelectorAll('.items');
    const dots = document.querySelectorAll('.dot');
    const totalItems = items.length;

    // ฟังก์ชันสำหรับอัปเดตการเลื่อนและ pagination
    function updateCarousel() {
        const newTranslateX = -currentIndex * 720; // คำนวณตำแหน่งเลื่อน (ความกว้างของ .items คือ 700px + 20px margin)
        items.forEach(item => {
            item.style.transform = `translateX(${newTranslateX}px)`;
        });

        // อัปเดตสถานะจุด pagination
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    // ฟังก์ชันเลื่อนทุก 3 วินาที
    setInterval(function() {
        currentIndex = (currentIndex + 1) % totalItems; // วน loop
        updateCarousel();
    }, 3000);

    // เพิ่ม event listener ให้สามารถคลิกที่จุด pagination
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            currentIndex = index;
            updateCarousel();
        });
    });
});
