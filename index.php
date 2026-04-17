<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="QuickPOS – The modern, lightning-fast point-of-sale system for retail businesses of every size.">
    <title>QuickPOS – Modern Point-of-Sale System</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ===== CSS Reset & Variables ===== */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Brand palette */
            --clr-primary: #6c5ce7;
            --clr-primary-dark: #5a4bd1;
            --clr-primary-light: #a29bfe;
            --clr-accent: #00cec9;
            --clr-accent-dark: #00b5b0;

            /* Neutrals */
            --clr-bg: #0b0e1a;
            --clr-surface: #111427;
            --clr-surface-hover: #191d33;
            --clr-text: #edf0f7;
            --clr-text-muted: #8892b0;
            --clr-border: rgba(255, 255, 255, 0.06);

            /* Shadows & Effects */
            --shadow-nav: 0 1px 32px rgba(0, 0, 0, 0.45);
            --shadow-btn: 0 4px 20px rgba(108, 92, 231, 0.35);
            --glow-primary: 0 0 20px rgba(108, 92, 231, 0.25);

            /* Sizing */
            --nav-height: 72px;
            --max-width: 1200px;
            --radius: 12px;
            --radius-sm: 8px;

            /* Transitions */
            --ease: cubic-bezier(0.4, 0, 0.2, 1);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: var(--clr-bg);
            color: var(--clr-text);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        /* ===== Navigation ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: var(--nav-height);
            z-index: 1000;
            background: rgba(11, 14, 26, 0.75);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--clr-border);
            transition: box-shadow 0.3s var(--ease), background 0.3s var(--ease);
        }

        .navbar.scrolled {
            background: rgba(11, 14, 26, 0.92);
            box-shadow: var(--shadow-nav);
        }

        .navbar__inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: var(--max-width);
            height: 100%;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ===== Logo ===== */
        .logo {
            display: flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--clr-text);
            letter-spacing: -0.5px;
            transition: opacity 0.2s var(--ease);
            flex-shrink: 0;
        }

        .logo:hover {
            opacity: 0.85;
        }

        .logo__icon {
            font-size: 1.55rem;
            margin-right: 2px;
            filter: drop-shadow(0 0 6px rgba(108, 92, 231, 0.5));
        }

        .logo__text-highlight {
            background: linear-gradient(135deg, var(--clr-primary-light), var(--clr-accent));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ===== Desktop Navigation ===== */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
        }

        .nav-links__item a {
            position: relative;
            display: inline-block;
            padding: 8px 18px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--clr-text-muted);
            text-decoration: none;
            border-radius: var(--radius-sm);
            transition: color 0.25s var(--ease), background 0.25s var(--ease);
        }

        .nav-links__item a::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 18px;
            right: 18px;
            height: 2px;
            background: linear-gradient(90deg, var(--clr-primary), var(--clr-accent));
            border-radius: 1px;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s var(--ease);
        }

        .nav-links__item a:hover {
            color: var(--clr-text);
            background: var(--clr-surface-hover);
        }

        .nav-links__item a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* ===== CTA Button ===== */
        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 26px;
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-primary-dark));
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: var(--shadow-btn);
            transition: transform 0.25s var(--ease), box-shadow 0.25s var(--ease), background 0.3s var(--ease);
            white-space: nowrap;
        }

        .btn-cta:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 6px 28px rgba(108, 92, 231, 0.5);
        }

        .btn-cta:active {
            transform: translateY(0) scale(0.98);
        }

        .btn-cta__arrow {
            font-size: 1.05rem;
            transition: transform 0.25s var(--ease);
        }

        .btn-cta:hover .btn-cta__arrow {
            transform: translateX(3px);
        }

        /* ===== Hamburger Toggle ===== */
        .hamburger {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 44px;
            height: 44px;
            background: transparent;
            border: 1px solid var(--clr-border);
            border-radius: var(--radius-sm);
            cursor: pointer;
            padding: 0;
            gap: 5px;
            transition: border-color 0.2s var(--ease);
            z-index: 1010;
        }

        .hamburger:hover {
            border-color: var(--clr-primary-light);
        }

        .hamburger__bar {
            display: block;
            width: 20px;
            height: 2px;
            background: var(--clr-text);
            border-radius: 2px;
            transition: transform 0.35s var(--ease), opacity 0.25s var(--ease);
        }

        /* Active hamburger → X icon */
        .hamburger.active .hamburger__bar:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .hamburger.active .hamburger__bar:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger.active .hamburger__bar:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ===== Mobile Overlay ===== */
        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.35s var(--ease), visibility 0.35s var(--ease);
            z-index: 998;
        }

        .mobile-overlay.visible {
            opacity: 1;
            visibility: visible;
        }

        /* ===== Mobile Menu Panel ===== */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: min(320px, 85vw);
            height: 100vh;
            height: 100dvh;
            background: var(--clr-surface);
            border-left: 1px solid var(--clr-border);
            z-index: 999;
            display: flex;
            flex-direction: column;
            padding: calc(var(--nav-height) + 24px) 28px 32px;
            transform: translateX(100%);
            transition: transform 0.4s var(--ease);
            overflow-y: auto;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .mobile-menu__links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .mobile-menu__links li a {
            display: block;
            padding: 14px 16px;
            font-size: 1.05rem;
            font-weight: 500;
            color: var(--clr-text-muted);
            text-decoration: none;
            border-radius: var(--radius-sm);
            transition: background 0.2s var(--ease), color 0.2s var(--ease), padding-left 0.25s var(--ease);
        }

        .mobile-menu__links li a:hover {
            background: var(--clr-surface-hover);
            color: var(--clr-text);
            padding-left: 22px;
        }

        .mobile-menu__cta {
            margin-top: 28px;
            text-align: center;
        }

        .mobile-menu__cta .btn-cta {
            width: 100%;
            justify-content: center;
            padding: 14px 26px;
            font-size: 0.95rem;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hamburger {
                display: flex;
            }
        }

        /* ===== Hero Section (placeholder below nav) ===== */
        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: calc(var(--nav-height) + 48px) 24px 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        /* Gradient orbs background */
        .hero::before,
        .hero::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.35;
            pointer-events: none;
        }

        .hero::before {
            width: 480px;
            height: 480px;
            background: var(--clr-primary);
            top: -120px;
            right: -60px;
        }

        .hero::after {
            width: 400px;
            height: 400px;
            background: var(--clr-accent);
            bottom: -80px;
            left: -80px;
            opacity: 0.2;
        }

        .hero__badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px 6px 8px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--clr-primary-light);
            background: rgba(108, 92, 231, 0.12);
            border: 1px solid rgba(108, 92, 231, 0.2);
            border-radius: 50px;
            margin-bottom: 28px;
            letter-spacing: 0.3px;
            animation: fadeInUp 0.6s var(--ease) both;
        }

        .hero__badge-dot {
            width: 8px;
            height: 8px;
            background: var(--clr-accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .hero__title {
            font-size: clamp(2.4rem, 6vw, 4.2rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.5px;
            max-width: 720px;
            margin-bottom: 20px;
            animation: fadeInUp 0.6s 0.1s var(--ease) both;
        }

        .hero__title-gradient {
            background: linear-gradient(135deg, var(--clr-primary-light) 0%, var(--clr-accent) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero__subtitle {
            font-size: clamp(1rem, 2.2vw, 1.2rem);
            font-weight: 400;
            color: var(--clr-text-muted);
            max-width: 540px;
            line-height: 1.7;
            margin-bottom: 40px;
            animation: fadeInUp 0.6s 0.2s var(--ease) both;
        }

        .hero__actions {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 0.6s 0.3s var(--ease) both;
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--clr-text);
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            transition: border-color 0.25s var(--ease), background 0.25s var(--ease);
        }

        .btn-secondary:hover {
            border-color: var(--clr-primary-light);
            background: rgba(108, 92, 231, 0.08);
        }

        /* ===== Keyframes ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        /* ===== Utility: prevent scroll when menu open ===== */
        body.menu-open {
            overflow: hidden;
        }
    </style>
</head>
<body>

    <!-- ===== Navigation ===== -->
    <header class="navbar" id="navbar">
        <nav class="navbar__inner" aria-label="Primary navigation">

            <!-- Logo -->
            <a href="#" class="logo" id="logo" aria-label="QuickPOS Home">
                <span class="logo__icon">🛒</span>
                <span class="logo__text-highlight">QuickPOS</span>
            </a>

            <!-- Desktop Links -->
            <ul class="nav-links" id="nav-links">
                <li class="nav-links__item"><a href="#features">Features</a></li>
                <li class="nav-links__item"><a href="#pricing">Pricing</a></li>
                <li class="nav-links__item"><a href="#contact">Contact</a></li>
                <li class="nav-links__item">
                    <a href="#signup" class="btn-cta" id="cta-signup">
                        Sign Up <span class="btn-cta__arrow">→</span>
                    </a>
                </li>
            </ul>

            <!-- Hamburger (mobile) -->
            <button
                class="hamburger"
                id="hamburger"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
            >
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
                <span class="hamburger__bar"></span>
            </button>
        </nav>
    </header>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobile-overlay"></div>

    <!-- Mobile Menu Panel -->
    <aside class="mobile-menu" id="mobile-menu" aria-hidden="true">
        <ul class="mobile-menu__links">
            <li><a href="#features">Features</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="mobile-menu__cta">
            <a href="#signup" class="btn-cta" id="cta-signup-mobile">
                Sign Up <span class="btn-cta__arrow">→</span>
            </a>
        </div>
    </aside>

    <!-- ===== Hero Section ===== -->
    <main>
        <section class="hero" id="hero">
            <span class="hero__badge">
                <span class="hero__badge-dot"></span>
                Now in Beta
            </span>
            <h1 class="hero__title">
                Sell Smarter with<br>
                <span class="hero__title-gradient">QuickPOS</span>
            </h1>
            <p class="hero__subtitle">
                The lightning-fast, modern point-of-sale system designed for retail businesses of every size.
                Manage inventory, track sales, and delight customers — all in one place.
            </p>
            <div class="hero__actions">
                <a href="#signup" class="btn-cta" style="padding: 14px 32px; font-size: 0.95rem;">
                    Get Started Free <span class="btn-cta__arrow">→</span>
                </a>
                <a href="#features" class="btn-secondary">
                    <span>▶</span> See How It Works
                </a>
            </div>
        </section>
    </main>

    <script>
        /**
         * QuickPOS Landing Page — Vanilla JS
         * Handles: hamburger toggle, scroll effects, mobile menu interactions
         */
        (function () {
            'use strict';

            // DOM references
            const hamburger   = document.getElementById('hamburger');
            const mobileMenu  = document.getElementById('mobile-menu');
            const overlay     = document.getElementById('mobile-overlay');
            const navbar      = document.getElementById('navbar');
            const mobileLinks = mobileMenu.querySelectorAll('a');

            /**
             * Toggle the mobile navigation menu open/closed.
             * Controls ARIA attributes, body scroll lock, and CSS classes.
             */
            function toggleMobileMenu() {
                const isOpen = mobileMenu.classList.contains('open');

                if (isOpen) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            }

            /** Open the mobile menu */
            function openMobileMenu() {
                mobileMenu.classList.add('open');
                overlay.classList.add('visible');
                hamburger.classList.add('active');
                hamburger.setAttribute('aria-expanded', 'true');
                mobileMenu.setAttribute('aria-hidden', 'false');
                document.body.classList.add('menu-open');
            }

            /** Close the mobile menu */
            function closeMobileMenu() {
                mobileMenu.classList.remove('open');
                overlay.classList.remove('visible');
                hamburger.classList.remove('active');
                hamburger.setAttribute('aria-expanded', 'false');
                mobileMenu.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('menu-open');
            }

            // Event: Hamburger click
            hamburger.addEventListener('click', toggleMobileMenu);

            // Event: Overlay click closes menu
            overlay.addEventListener('click', closeMobileMenu);

            // Event: Clicking any link inside the mobile menu closes it
            mobileLinks.forEach(function (link) {
                link.addEventListener('click', closeMobileMenu);
            });

            // Event: Escape key closes menu
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
                    closeMobileMenu();
                    hamburger.focus();
                }
            });

            /**
             * Add a `.scrolled` class to the navbar once the user
             * scrolls past a small threshold, enhancing the glass effect.
             */
            let lastScrollY = 0;
            let ticking = false;

            function onScroll() {
                lastScrollY = window.scrollY;
                if (!ticking) {
                    window.requestAnimationFrame(function () {
                        navbar.classList.toggle('scrolled', lastScrollY > 24);
                        ticking = false;
                    });
                    ticking = true;
                }
            }

            window.addEventListener('scroll', onScroll, { passive: true });

            // Initial check in case the page loads already scrolled
            onScroll();
        })();
    </script>
</body>
</html>
