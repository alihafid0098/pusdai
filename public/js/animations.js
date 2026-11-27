/**
 * ===================================================================
 * PUSDAI JAWA BARAT - MODERN INTERACTION ENGINE
 * - Lenis (Smooth Momentum Scroll)
 * - GSAP & ScrollTrigger (Word-by-word Title Reveal on Scroll)
 * - Motion (Card Entrance & Dynamic Hover Physics)
 * ===================================================================
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initLenisWithGSAP();
        initWordByWordTitleReveal();
        initCardEntranceAndMotion();
    });

    /**
     * 1. LENIS SMOOTH SCROLL INTEGRATION WITH GSAP SCROLLTRIGGER
     */
    function initLenisWithGSAP() {
        if (typeof Lenis === 'undefined') {
            console.warn('Lenis not loaded');
            return;
        }

        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            orientation: 'vertical',
            gestureOrientation: 'vertical',
            smoothWheel: true,
            wheelMultiplier: 1,
            touchMultiplier: 2,
            infinite: false,
        });

        window.lenisInstance = lenis;

        // Sync Lenis with GSAP ScrollTrigger
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            lenis.on('scroll', ScrollTrigger.update);

            gsap.ticker.add((time) => {
                lenis.raf(time * 1000);
            });

            gsap.ticker.lagSmoothing(0);
        } else {
            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }
            requestAnimationFrame(raf);
        }
    }

    /**
     * 2. GSAP + SCROLLTRIGGER: WORD-BY-WORD TITLE REVEAL ON SCROLL
     * Memecah judul menjadi kata-kata dan menganimasikannya satu per satu
     * saat elemen discroll ke layar pengguna.
     */
    function initWordByWordTitleReveal() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            return;
        }

        // Target: judul utama section h1 dan h2 di semua halaman
        const headings = document.querySelectorAll(
            'h1, .home-section-heading h2, .section-heading h2, .home-about-content h2, .home-donation-content h2, .history-content h2, .profile-intro h2'
        );

        headings.forEach((heading) => {
            // Hindari heading logo header atau widget kecil
            if (heading.closest('.header-logo') || heading.closest('.chat-window') || heading.closest('.site-footer')) {
                return;
            }

            // Split teks menjadi kata-kata dengan wrapper overflow: hidden
            splitIntoWords(heading);

            const words = heading.querySelectorAll('.split-word');
            if (words.length === 0) return;

            gsap.fromTo(
                words,
                {
                    y: '120%',
                    opacity: 0,
                    rotateZ: 4,
                },
                {
                    y: '0%',
                    opacity: 1,
                    rotateZ: 0,
                    duration: 0.85,
                    ease: 'power3.out',
                    stagger: 0.045,
                    scrollTrigger: {
                        trigger: heading,
                        start: 'top 88%',
                        toggleActions: 'play none none none',
                        once: true,
                    },
                }
            );
        });
    }

    /**
     * Helper: Memecah text node dalam element menjadi span kata
     */
    function splitIntoWords(element) {
        const nodes = Array.from(element.childNodes);
        element.innerHTML = '';

        nodes.forEach((node) => {
            if (node.nodeType === Node.TEXT_NODE) {
                const text = node.textContent;
                const words = text.split(/(\s+)/);

                words.forEach((chunk) => {
                    if (chunk.trim().length === 0) {
                        element.appendChild(document.createTextNode(chunk));
                    } else {
                        const container = document.createElement('span');
                        container.className = 'split-word-container';

                        const wordSpan = document.createElement('span');
                        wordSpan.className = 'split-word';
                        wordSpan.textContent = chunk;

                        container.appendChild(wordSpan);
                        element.appendChild(container);
                    }
                });
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                // Rekursif untuk tag child (seperti <span>, <strong>)
                const clone = node.cloneNode(false);
                splitIntoWordsRecursive(node, clone);
                element.appendChild(clone);
            }
        });
    }

    function splitIntoWordsRecursive(sourceNode, targetNode) {
        Array.from(sourceNode.childNodes).forEach((child) => {
            if (child.nodeType === Node.TEXT_NODE) {
                const text = child.textContent;
                const words = text.split(/(\s+)/);

                words.forEach((chunk) => {
                    if (chunk.trim().length === 0) {
                        targetNode.appendChild(document.createTextNode(chunk));
                    } else {
                        const container = document.createElement('span');
                        container.className = 'split-word-container';

                        const wordSpan = document.createElement('span');
                        wordSpan.className = 'split-word';
                        wordSpan.textContent = chunk;

                        container.appendChild(wordSpan);
                        targetNode.appendChild(container);
                    }
                });
            } else if (child.nodeType === Node.ELEMENT_NODE) {
                const clone = child.cloneNode(false);
                splitIntoWordsRecursive(child, clone);
                targetNode.appendChild(clone);
            }
        });
    }

    /**
     * 3. MOTION: CARD ENTRANCE & HOVER MICRO-INTERACTIONS
     * Animasi masuk saat terlihat (staggered cascade) dan interaksi hover fisika
     */
    function initCardEntranceAndMotion() {
        const hasMotion = typeof Motion !== 'undefined' || typeof window.Motion !== 'undefined';
        const motionLib = window.Motion || (typeof Motion !== 'undefined' ? Motion : null);

        // Kategori container grid kartu
        const cardContainers = document.querySelectorAll(
            '.home-event-grid, .home-news-grid, .home-services-grid, .gallery-grid, .services-page-grid, .agenda-grid, .donation-page-grid, .contact-page-grid'
        );

        cardContainers.forEach((grid) => {
            const cards = grid.querySelectorAll(
                '.home-event-card, .home-news-card, .home-service-card, .gallery-item, .service-page-card, .agenda-card, .donation-card, .contact-page-card'
            );

            if (cards.length === 0) return;

            // Jika Motion library tersedia, gunakan Motion animate
            if (motionLib && typeof motionLib.animate === 'function' && typeof motionLib.inView === 'function') {
                // Set initial
                cards.forEach((card) => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(40px) scale(0.96)';
                });

                motionLib.inView(grid, () => {
                    cards.forEach((card, i) => {
                        motionLib.animate(
                            card,
                            {
                                opacity: [0, 1],
                                transform: ['translateY(40px) scale(0.96)', 'translateY(0px) scale(1)'],
                            },
                            {
                                duration: 0.7,
                                delay: i * 0.1,
                                easing: [0.16, 1, 0.3, 1],
                            }
                        );
                    });
                }, { amount: 0.15 });

            } else if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                // Fallback GSAP Motion jika Motion library belum sepenuhnya mounted
                gsap.fromTo(
                    cards,
                    {
                        opacity: 0,
                        y: 45,
                        scale: 0.96,
                    },
                    {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        duration: 0.75,
                        stagger: 0.1,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: grid,
                            start: 'top 85%',
                            once: true,
                        },
                    }
                );
            }

            // Magnetic / Dynamic Hover physics untuk kartu
            cards.forEach((card) => {
                card.addEventListener('mouseenter', function () {
                    if (motionLib && typeof motionLib.animate === 'function') {
                        motionLib.animate(
                            card,
                            { transform: 'translateY(-8px) scale(1.02)' },
                            { duration: 0.35, easing: [0.2, 0.8, 0.2, 1] }
                        );
                    }
                });

                card.addEventListener('mouseleave', function () {
                    if (motionLib && typeof motionLib.animate === 'function') {
                        motionLib.animate(
                            card,
                            { transform: 'translateY(0px) scale(1)' },
                            { duration: 0.45, easing: [0.2, 0.8, 0.2, 1] }
                        );
                    }
                });
            });
        });
    }
})();
