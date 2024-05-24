<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

{{-- <script>
    const menuItems = document.querySelectorAll('.navbar-menu-item');
    const logo = document.getElementById('logo');

    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();

            // Hapus kelas 'active' dari semua parent item
            removeActiveClass();

            // Tambahkan kelas 'active' ke parent item yang diklik
            item.classList.remove('md:dark:hover:text-w-hover', 'md:hover:text-w-hover',
                'dark:hover:text-w-putih');
            item.parentElement.classList.add('dark:bg-gray-800', 'bg-[#e2e8f0]');
            item.classList.remove('dark:text-w-putih', 'text-gray-900');
            item.classList.add('text-w-primer', 'font-bold');

            // Scroll ke target section
            const targetId = item.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    logo.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    function removeActiveClass() {
        menuItems.forEach(item => {
            item.classList.add('md:dark:hover:text-w-hover', 'md:hover:text-w-hover',
                'dark:hover:text-w-putih');
            item.parentElement.classList.remove('dark:bg-gray-800', 'bg-[#e2e8f0]');
            item.classList.add('dark:text-w-putih', 'text-gray-900');
            item.classList.remove('text-w-primer', 'font-bold');
        });
    }
</script> --}}

{{-- <script>
    const menuItems = document.querySelectorAll('.navbar-menu-item');
    const logo = document.getElementById('logo');
    const buttons = document.querySelectorAll('.scroll-button'); // Tambahkan kelas ini pada tombol yang perlu fungsionalitas yang sama

    // Fungsi untuk menghapus kelas 'active' dari semua parent item
    function removeActiveClass() {
        menuItems.forEach(item => {
            item.classList.add('md:dark:hover:text-w-hover', 'md:hover:text-w-hover', 'dark:hover:text-w-putih');
            item.parentElement.classList.remove('dark:bg-gray-800', 'bg-[#e2e8f0]');
            item.classList.add('dark:text-w-putih', 'text-gray-900');
            item.classList.remove('text-w-primer', 'font-bold');
        });
    }

    // Fungsi untuk menangani klik pada elemen yang mengarahkan ke konten halaman
    function handleScrollClick(event) {
        event.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);

        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }

        if (this.classList.contains('navbar-menu-item')) {
            removeActiveClass();
            this.classList.remove('md:dark:hover:text-w-hover', 'md:hover:text-w-hover', 'dark:hover:text-w-putih');
            this.parentElement.classList.add('dark:bg-gray-800', 'bg-[#e2e8f0]');
            this.classList.remove('dark:text-w-putih', 'text-gray-900');
            this.classList.add('text-w-primer', 'font-bold');
        }
    }

    // Tambahkan event listener ke setiap item menu
    menuItems.forEach(item => {
        item.addEventListener('click', handleScrollClick);
    });

    // Tambahkan event listener ke tombol lainnya
    buttons.forEach(button => {
        button.addEventListener('click', handleScrollClick);
    });

    // Event listener untuk logo
    logo.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script> --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.navbar-menu-item');
        const logo = document.getElementById('logo');
        const sections = document.querySelectorAll('.content-section');

        function removeActiveClass() {
            menuItems.forEach(item => {
                item.classList.add('md:dark:hover:text-w-hover', 'md:hover:text-w-hover',
                    'dark:hover:text-w-putih');
                item.parentElement.classList.remove('dark:bg-gray-800', 'bg-[#e2e8f0]');
                item.classList.add('dark:text-w-putih', 'text-gray-900');
                item.classList.remove('text-w-primer', 'font-bold');
            });
        }

        function handleScrollClick(event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }

            if (this.classList.contains('navbar-menu-item')) {
                removeActiveClass();
                this.classList.remove('md:dark:hover:text-w-hover', 'md:hover:text-w-hover',
                    'dark:hover:text-w-putih');
                this.parentElement.classList.add('dark:bg-gray-800', 'bg-[#e2e8f0]');
                this.classList.remove('dark:text-w-putih', 'text-gray-900');
                this.classList.add('text-w-primer', 'font-bold');
            }
        }

        menuItems.forEach(item => {
            item.addEventListener('click', handleScrollClick);
        });

        const buttons = document.querySelectorAll('.scroll-button');
        buttons.forEach(button => {
            button.addEventListener('click', handleScrollClick);
        });

        logo.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    const activeLink = document.querySelector(`a[href="#${id}"]`);
                    if (activeLink) {
                        removeActiveClass();
                        activeLink.classList.remove('md:dark:hover:text-w-hover',
                            'md:hover:text-w-hover', 'dark:hover:text-w-putih');
                        activeLink.parentElement.classList.add('dark:bg-gray-800',
                            'bg-[#e2e8f0]');
                        activeLink.classList.remove('dark:text-w-putih', 'text-gray-900');
                        activeLink.classList.add('text-w-primer', 'font-bold');
                    }
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.navbar-menu-item');
        const logo = document.getElementById('logo');
        const sections = document.querySelectorAll('.content-section');
        const lastSection = sections[sections.length - 1]; // Asumsikan section terakhir adalah kontainer dengan menu navbar terakhir

        function removeActiveClass() {
            menuItems.forEach(item => {
                item.classList.add('md:dark:hover:text-w-hover', 'md:hover:text-w-hover', 'dark:hover:text-w-putih');
                item.parentElement.classList.remove('dark:bg-gray-800', 'bg-[#e2e8f0]');
                item.classList.add('dark:text-w-putih', 'text-gray-900');
                item.classList.remove('text-w-primer', 'font-bold');
            });
        }

        function handleScrollClick(event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }

            if (this.classList.contains('navbar-menu-item')) {
                removeActiveClass();
                this.classList.remove('md:dark:hover:text-w-hover', 'md:hover:text-w-hover', 'dark:hover:text-w-putih');
                this.parentElement.classList.add('dark:bg-gray-800', 'bg-[#e2e8f0]');
                this.classList.remove('dark:text-w-putih', 'text-gray-900');
                this.classList.add('text-w-primer', 'font-bold');
            }
        }

        menuItems.forEach(item => {
            item.addEventListener('click', handleScrollClick);
        });

        const buttons = document.querySelectorAll('.scroll-button');
        buttons.forEach(button => {
            button.addEventListener('click', handleScrollClick);
        });

        logo.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    const activeLink = document.querySelector(`a[href="#${id}"]`);
                    if (activeLink) {
                        removeActiveClass();
                        activeLink.classList.remove('md:dark:hover:text-w-hover', 'md:hover:text-w-hover', 'dark:hover:text-w-putih');
                        activeLink.parentElement.classList.add('dark:bg-gray-800', 'bg-[#e2e8f0]');
                        activeLink.classList.remove('dark:text-w-putih', 'text-gray-900');
                        activeLink.classList.add('text-w-primer', 'font-bold');
                    }
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });

        // Observer for the last section to remove active class when it is not in view
        const lastSectionObserverOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0
        };

        const lastSectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    removeActiveClass();
                }
            });
        }, lastSectionObserverOptions);

        lastSectionObserver.observe(lastSection);
    });
</script>

</body>

</html>
