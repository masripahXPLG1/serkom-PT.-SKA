document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('galeriSlider');
    if (!slider) return;

    const track = slider.querySelector('.galeri-track');
    const items = track.querySelectorAll('.galeri-item');
    const prev = document.getElementById('galeriPrev');
    const next = document.getElementById('galeriNext');
    const indikator = document.getElementById('galeriIndikator');
    const kontrol = document.querySelector('.galeri-kontrol');

    let index = 0;
    let timer = null;
    let maxIndex = 0;

    function visibleCount() {
        if (window.innerWidth >= 992) return 4;
        if (window.innerWidth >= 576) return 2;
        return 1;
    }

    function buildIndikator() {
        indikator.innerHTML = '';
        for (let i = 0; i <= maxIndex; i++) {
            const bar = document.createElement('button');
            bar.type = 'button';
            bar.className = 'bar';
            bar.addEventListener('click', function () { goTo(i); restart(); });
            indikator.appendChild(bar);
        }
    }

    function render() {
        const step = items[0].offsetWidth;
        track.style.transform = 'translateX(' + (-index * step) + 'px)';
        indikator.querySelectorAll('.bar').forEach(function (b, i) {
            b.classList.toggle('active', i === index);
        });
    }

    function goTo(i) { index = i; render(); }
    function nextSlide() { goTo(index >= maxIndex ? 0 : index + 1); } // geser 1 foto
    function prevSlide() { goTo(index <= 0 ? maxIndex : index - 1); }

    function start() { if (maxIndex > 0) timer = setInterval(nextSlide, 3000); }
    function stop() { clearInterval(timer); }
    function restart() { stop(); start(); }

    function setup() {
        maxIndex = Math.max(0, items.length - visibleCount());
        if (index > maxIndex) index = maxIndex;
        kontrol.style.display = maxIndex === 0 ? 'none' : '';
        buildIndikator();
        render();
        restart();
    }

    next.addEventListener('click', function () { nextSlide(); restart(); });
    prev.addEventListener('click', function () { prevSlide(); restart(); });
    slider.addEventListener('mouseenter', stop);
    slider.addEventListener('mouseleave', start);
    window.addEventListener('resize', setup);

    setup();
});