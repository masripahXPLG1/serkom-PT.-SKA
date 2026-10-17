document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('#menu-utama .nav-link');
    const items = [];
    let berandaLink = null;
    let locked = false;
    let ticking = false;

    links.forEach(function (link) {
        const id = link.getAttribute('href').split('#')[1];
        if (id === 'beranda') {
            berandaLink = link; // Beranda ditangani khusus
            return;
        }
        const el = id ? document.getElementById(id) : null;
        if (el) items.push({ link: link, el: el });
    });

    // Halaman tanpa section (misal "Lihat Semua"): berhenti
    if (!berandaLink && items.length === 0) return;

    function setActive(active) {
        links.forEach(function (l) {
            l.classList.toggle('active', l === active);
        });
    }

    function update() {
        if (locked) return;

        const line = 150;
        let current = berandaLink; // default: Beranda

        items.slice()
            .sort(function (a, b) {
                return a.el.getBoundingClientRect().top - b.el.getBoundingClientRect().top;
            })
            .forEach(function (item) {
                if (item.el.getBoundingClientRect().top <= line) current = item.link;
            });

        // Dasar halaman -> Kontak
        const bottom = window.innerHeight + window.scrollY;
        if (bottom >= document.documentElement.scrollHeight - 5) {
            const kontak = items.find(function (i) { return i.el.id === 'kontak'; });
            if (kontak) current = kontak.link;
        }

        setActive(current);
    }

    window.addEventListener('scroll', function () {
        if (!ticking) {
            window.requestAnimationFrame(function () {
                update();
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });

    links.forEach(function (link) {
        link.addEventListener('click', function (e) {
            // Klik Beranda di landing page: gulung ke paling atas
            if (link === berandaLink && document.getElementById('menu-utama') &&
                !link.getAttribute('href').startsWith('http')) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
            setActive(link);
            locked = true;
            setTimeout(function () {
                locked = false;
                update();
            }, 900);
        });
    });

    update();
});