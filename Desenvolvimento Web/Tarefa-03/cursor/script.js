const cursor = document.querySelector('.cursor');

let mouseX = 0;
let mouseY = 0;
let targetX = 0;
let targetY = 0;

// Smoothing factor (lower value = smoother/slower)
const smoothness = 0.15;

document.addEventListener('mousemove', e => {
    targetX = e.pageX;
    targetY = e.pageY;
});

function updateCursor() {
    mouseX += (targetX - mouseX) * smoothness;
    mouseY += (targetY - mouseY) * smoothness;

    const cursorWidth = cursor.offsetWidth;
    const cursorHeight = cursor.offsetHeight;
    cursor.style.transform = `translate3d(${mouseX - cursorWidth / 2}px, ${mouseY - cursorHeight / 2}px, 0)`;

    requestAnimationFrame(updateCursor);
}

requestAnimationFrame(updateCursor);

cursor.style.opacity = '0';
document.addEventListener('mousemove', () => {
    cursor.style.opacity = '1';
}, { once: true });

const interactiveElements = document.querySelectorAll('a, button, input, textarea, select');

interactiveElements.forEach(el => {
    el.addEventListener('mouseenter', () => {
        cursor.classList.add('interacting');
    });
    el.addEventListener('mouseleave', () => {
        cursor.classList.remove('interacting');
    });
});
