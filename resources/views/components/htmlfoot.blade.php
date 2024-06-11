<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.navbar-menu-item');
        const logo = document.getElementById('logo');
        const sections = document.querySelectorAll('.content-section');
        const lastSection = sections[sections.length - 1];
        const footer = document.querySelector('footer');

        let isScrollingByClick = false;

        const activeClassConfig = {
            add: ['text-w-primer', 'font-bold'],
            remove: ['md:dark:hover:text-w-hover', 'md:hover:text-w-hover', 'dark:hover:text-w-putih',
                'dark:text-w-putih', 'text-gray-900'
            ],
            parentAdd: ['dark:bg-gray-800', 'bg-[#e2e8f0]'],
            parentRemove: []
        };

        function setActiveClass(element, config) {
            config.remove.forEach(cls => element.classList.remove(cls));
            config.add.forEach(cls => element.classList.add(cls));
            config.parentAdd.forEach(cls => {
                if (element.parentElement !== footer) {
                    element.parentElement.classList.add(cls);
                }
            });
            config.parentRemove.forEach(cls => {
                if (element.parentElement !== footer) {
                    element.parentElement.classList.remove(cls);
                }
            });
        }

        function removeActiveClass() {
            menuItems.forEach(item => {
                setActiveClass(item, {
                    add: ['dark:text-w-putih', 'text-gray-900'],
                    remove: ['text-w-primer', 'font-bold'],
                    parentAdd: [],
                    parentRemove: ['dark:bg-gray-800', 'bg-[#e2e8f0]']
                });
            });
        }

        function handleScrollClick(event) {
            event.preventDefault();
            isScrollingByClick = true;

            removeActiveClass();
            if (event.currentTarget.classList.contains('navbar-menu-item')) {
                setActiveClass(event.currentTarget, activeClassConfig);
            }

            const targetId = event.currentTarget.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    isScrollingByClick = false;
                }, 1000);
            }
        }

        menuItems.forEach(item => {
            item.addEventListener('click', handleScrollClick);
        });

        document.querySelectorAll('.scroll-button').forEach(button => {
            button.addEventListener('click', handleScrollClick);
        });

        logo.addEventListener('click', (e) => {
            e.preventDefault();
            isScrollingByClick = true;

            removeActiveClass();

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            setTimeout(() => {
                isScrollingByClick = false;
            }, 1000);
        });

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            if (!isScrollingByClick) {
                entries.forEach(entry => {
                    if (entry.isIntersecting && entry.target !== footer) {
                        const id = entry.target.getAttribute('id');
                        const activeLink = document.querySelector(`a[href="#${id}"]`);
                        if (activeLink) {
                            removeActiveClass();
                            setActiveClass(activeLink, activeClassConfig);
                        }
                    }
                });
            }
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });

        const lastSectionObserverOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0
        };

        const lastSectionObserver = new IntersectionObserver((entries) => {
            if (!isScrollingByClick) {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) {
                        removeActiveClass();
                    }
                });
            }
        }, lastSectionObserverOptions);

        lastSectionObserver.observe(lastSection);
    });
</script>



</body>

</html>
