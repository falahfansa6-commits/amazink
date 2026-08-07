 <div class="floating-menu" id="floatingMenu">
    <a href="https://wa.me/6282133339489"
    class="floating-item whatsapp" target="_blank">
    <i class="fab fa-whatsapp"></i>
    </a>

    <a href="https://instagram.com/printex.salatiga"
    class="floating-item instagram" target="_blank">
    <i class="fab fa-instagram"></i>
    </a>

    <button class="floating-button" id="floatingButton">
        <i class="fas fa-comment-dots"></i>
    </button>
  </div>

  <script>

const floatingMenu = document.getElementById('floatingMenu');
const floatingButton = document.getElementById('floatingButton');

let isDragging = false;
let startX;
let startY;
let startLeft;
let startTop;


/* ==========================
   KLIK TOMBOL
========================== */

floatingButton.addEventListener('click', function () {

    if (!isDragging) {
        floatingMenu.classList.toggle('active');
    }

});


/* ==========================
   MULAI DRAG
========================== */

floatingButton.addEventListener('pointerdown', function(e) {

    isDragging = false;

    startX = e.clientX;
    startY = e.clientY;

    const rect = floatingMenu.getBoundingClientRect();

    startLeft = rect.left;
    startTop = rect.top;

    floatingButton.setPointerCapture(e.pointerId);

});


/* ==========================
   GERAKKAN TOMBOL
========================== */

floatingButton.addEventListener('pointermove', function(e) {

    if (!floatingButton.hasPointerCapture(e.pointerId)) {
        return;
    }

    const dx = e.clientX - startX;
    const dy = e.clientY - startY;

    if (Math.abs(dx) > 5 || Math.abs(dy) > 5) {
        isDragging = true;
    }

    if (isDragging) {

        let newLeft = startLeft + dx;
        let newTop = startTop + dy;

        const maxLeft =
            window.innerWidth - floatingMenu.offsetWidth;

        const maxTop =
            window.innerHeight - floatingMenu.offsetHeight;

        newLeft = Math.max(
            0,
            Math.min(newLeft, maxLeft)
        );

        newTop = Math.max(
            0,
            Math.min(newTop, maxTop)
        );

        floatingMenu.style.left = newLeft + 'px';
        floatingMenu.style.top = newTop + 'px';

        floatingMenu.style.right = 'auto';
        floatingMenu.style.bottom = 'auto';
    }

});


/* ==========================
   SELESAI DRAG
========================== */

floatingButton.addEventListener('pointerup', function(e) {

    floatingButton.releasePointerCapture(e.pointerId);

    setTimeout(() => {
        isDragging = false;
    }, 50);

});
  </script>