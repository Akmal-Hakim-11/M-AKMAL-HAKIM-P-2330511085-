import './bootstrap';

// ==========================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for all anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // ==========================================
    // ENHANCED SCROLL REVEAL ANIMATION
    // ==========================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const fadeObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Tidak unobserve agar bisa re-trigger jika scroll kembali
            }
        });
    }, observerOptions);

    // Observe all fade-in elements
    const fadeElements = [
        ...document.querySelectorAll('.fade-in-up'),
        ...document.querySelectorAll('.fade-in-left'),
        ...document.querySelectorAll('.fade-in-right'),
        ...document.querySelectorAll('.fade-in'),
        ...document.querySelectorAll('.scale-up'),
        ...document.querySelectorAll('.section-reveal')
    ];

    fadeElements.forEach(element => {
        fadeObserver.observe(element);
    });

    // ==========================================
    // NAVBAR SCROLL EFFECT
    // ==========================================
    const navbar = document.querySelector('nav');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        // Add shadow on scroll
        if (currentScroll > 10) {
            navbar.classList.add('shadow-xl');
        } else {
            navbar.classList.remove('shadow-xl');
        }

        lastScroll = currentScroll;
    });

    // ==========================================
    // PROGRESS BAR ANIMATION ON SCROLL
    // ==========================================
    const progressBars = document.querySelectorAll('.progress-bar');
    
    const progressObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBar = entry.target;
                const width = progressBar.style.width;
                progressBar.style.width = '0%';
                
                setTimeout(() => {
                    progressBar.style.width = width;
                }, 100);
                
                progressObserver.unobserve(progressBar);
            }
        });
    }, { threshold: 0.5 });

    progressBars.forEach(bar => {
        progressObserver.observe(bar);
    });

    // ==========================================
    // MOBILE MENU TOGGLE
    // ==========================================
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            
            // Animate menu items
            const menuItems = mobileMenu.querySelectorAll('a');
            menuItems.forEach((item, index) => {
                setTimeout(() => {
                    item.style.animation = 'fadeIn 0.3s ease-out forwards';
                }, index * 50);
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Close mobile menu when clicking on a link
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // ==========================================
    // SCROLL TO TOP BUTTON
    // ==========================================
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.innerHTML = `
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    `;
    scrollToTopBtn.className = 'fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-all duration-300 z-50 opacity-0 pointer-events-none';
    scrollToTopBtn.id = 'scroll-to-top';
    document.body.appendChild(scrollToTopBtn);

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            scrollToTopBtn.classList.add('opacity-100');
        } else {
            scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            scrollToTopBtn.classList.remove('opacity-100');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // ==========================================
    // CARD HOVER PARALLAX EFFECT
    // ==========================================
    const cards = document.querySelectorAll('.card-hover');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

    // ==========================================
    // TYPING EFFECT (Optional)
    // ==========================================
    const typedElements = document.querySelectorAll('.typed-text');
    
    typedElements.forEach(element => {
        const text = element.textContent;
        element.textContent = '';
        let i = 0;
        
        const typing = setInterval(() => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
            } else {
                clearInterval(typing);
            }
        }, 100);
    });

    // ==========================================
    // FORM VALIDATION ENHANCEMENT
    // ==========================================
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', () => {
                if (!input.value) {
                    input.parentElement.classList.remove('focused');
                }
            });
        });
    });

    // ==========================================
    // LAZY LOADING IMAGES
    // ==========================================
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));

    // ==========================================
    // COPY TO CLIPBOARD
    // ==========================================
    const copyButtons = document.querySelectorAll('[data-copy]');
    
    copyButtons.forEach(button => {
        button.addEventListener('click', () => {
            const text = button.getAttribute('data-copy');
            navigator.clipboard.writeText(text).then(() => {
                // Show success message
                const originalText = button.textContent;
                button.textContent = 'Copied!';
                button.classList.add('bg-green-500');
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('bg-green-500');
                }, 2000);
            });
        });
    });

    // ==========================================
    // PERFORMANCE OPTIMIZATION
    // ==========================================
    // Debounce function for scroll events
    function debounce(func, wait = 10, immediate = true) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // ==========================================
    // PRINT FUNCTIONALITY
    // ==========================================
    const printButtons = document.querySelectorAll('[data-print]');
    
    printButtons.forEach(button => {
        button.addEventListener('click', () => {
            window.print();
        });
    });

    // ==========================================
    // ACCESSIBILITY IMPROVEMENTS
    // ==========================================
    // Skip to main content
    const skipLink = document.querySelector('.skip-link');
    if (skipLink) {
        skipLink.addEventListener('click', (e) => {
            e.preventDefault();
            const main = document.querySelector('main');
            if (main) {
                main.setAttribute('tabindex', '-1');
                main.focus();
            }
        });
    }

    // ==========================================
    // CARD FLIP ON MOBILE TAP
    // ==========================================
    if ('ontouchstart' in window) {
        const flipCards = document.querySelectorAll('.flip-card');
        flipCards.forEach(card => {
            card.addEventListener('click', function(e) {
                if (e.target.closest('.flip-card-front') || e.target.closest('.flip-card')) {
                    this.classList.toggle('flipped');
                }
            });
        });
    }

    // ==========================================
    // ENHANCED BUTTON HOVER EFFECTS
    // ==========================================
    const buttons = document.querySelectorAll('a[href], button');
    buttons.forEach(btn => {
        // Add hover classes if not already present
        if (!btn.classList.contains('no-hover')) {
            btn.classList.add('btn-hover');
        }
    });

    // Add link hover effects to navigation links
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        if (!link.classList.contains('link-hover')) {
            link.classList.add('link-hover');
        }
    });

    // ==========================================
    // SKILL PROGRESS BARS ANIMATION
    // ==========================================
    const skillBars = document.querySelectorAll('[data-progress]');
    
    const skillObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const progress = bar.getAttribute('data-progress');
                bar.style.setProperty('--progress-width', progress);
                bar.classList.add('active');
                skillObserver.unobserve(bar);
            }
        });
    }, { threshold: 0.5 });

    skillBars.forEach(bar => {
        bar.classList.add('skill-progress');
        skillObserver.observe(bar);
    });

    // ==========================================
    // STAGGER ANIMATION FOR LISTS
    // ==========================================
    const staggerLists = document.querySelectorAll('[data-stagger]');
    
    staggerLists.forEach(list => {
        const items = list.children;
        Array.from(items).forEach((item, index) => {
            item.classList.add('fade-in-up');
            item.classList.add(`stagger-${Math.min(index + 1, 6)}`);
            fadeObserver.observe(item);
        });
    });

    // Loading spinner dihapus karena data kecil dan tidak diperlukan

    // ==========================================
    // SMOOTH SCROLL WITH OFFSET FOR FIXED NAVBAR
    // ==========================================
    document.querySelectorAll('a[href^="#"]:not([href="#"])').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            const target = document.querySelector(href);
            
            if (target) {
                e.preventDefault();
                const navbarHeight = document.querySelector('nav').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ==========================================
    // TOOLTIP INITIALIZATION
    // ==========================================
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    tooltipElements.forEach(element => {
        element.classList.add('tooltip');
    });

    // ==========================================
    // GLOW EFFECT ON CARDS
    // ==========================================
    const glowCards = document.querySelectorAll('.card-hover');
    glowCards.forEach(card => {
        card.classList.add('glow');
    });

    // ==========================================
    // CONSOLE EASTER EGG
    // ==========================================
    console.log('%c🎓 CV Pribadi - Built with Laravel & Tailwind CSS', 'color: #4F46E5; font-size: 16px; font-weight: bold;');
    console.log('%c💼 Interested in hiring? Contact me!', 'color: #10B981; font-size: 14px;');
    console.log('%c✨ Features: Smooth Scroll, Fade Animations, Card Flip, Loading Spinner', 'color: #8B5CF6; font-size: 12px;');
});
