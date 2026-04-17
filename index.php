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

        /* ===== Hero Section — Two-Column Layout ===== */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: calc(var(--nav-height) + 60px) 24px 80px;
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
            width: 520px;
            height: 520px;
            background: var(--clr-primary);
            top: -140px;
            right: 10%;
        }

        .hero::after {
            width: 420px;
            height: 420px;
            background: var(--clr-accent);
            bottom: -100px;
            left: -60px;
            opacity: 0.18;
        }

        .hero__inner {
            display: flex;
            align-items: center;
            gap: 60px;
            max-width: var(--max-width);
            width: 100%;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* ---- Left column (text) ---- */
        .hero__content {
            flex: 1 1 50%;
            min-width: 0;
        }

        .hero__badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px 6px 10px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--clr-primary-light);
            background: rgba(108, 92, 231, 0.12);
            border: 1px solid rgba(108, 92, 231, 0.2);
            border-radius: 50px;
            margin-bottom: 24px;
            letter-spacing: 0.3px;
        }

        .hero__badge-dot {
            width: 8px;
            height: 8px;
            background: var(--clr-accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .hero__title {
            font-size: clamp(2.2rem, 4.5vw, 3.6rem);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -1.5px;
            margin-bottom: 22px;
        }

        .hero__title-gradient {
            background: linear-gradient(135deg, var(--clr-primary-light) 0%, var(--clr-accent) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero__subtitle {
            font-size: clamp(0.95rem, 1.8vw, 1.15rem);
            font-weight: 400;
            color: var(--clr-text-muted);
            line-height: 1.75;
            max-width: 500px;
            margin-bottom: 36px;
        }

        .hero__actions {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 15px 34px;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-primary-dark));
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: var(--shadow-btn);
            transition: transform 0.25s var(--ease), box-shadow 0.25s var(--ease);
            white-space: nowrap;
        }

        .btn-hero:hover {
            transform: translateY(-3px) scale(1.04);
            box-shadow: 0 8px 32px rgba(108, 92, 231, 0.55);
        }

        .btn-hero:active {
            transform: translateY(0) scale(0.97);
        }

        .btn-hero__arrow {
            font-size: 1.1rem;
            transition: transform 0.25s var(--ease);
        }

        .btn-hero:hover .btn-hero__arrow {
            transform: translateX(4px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
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

        .hero__trust {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
            padding-top: 28px;
            border-top: 1px solid var(--clr-border);
            flex-wrap: wrap;
        }

        .hero__trust-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--clr-text-muted);
            white-space: nowrap;
        }

        .hero__trust-icon {
            font-size: 1rem;
        }

        /* ---- Right column (image) ---- */
        .hero__visual {
            flex: 1 1 50%;
            min-width: 0;
            position: relative;
        }

        .hero__image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            background: linear-gradient(145deg, rgba(108, 92, 231, 0.08), rgba(0, 206, 201, 0.06));
            border: 1px solid rgba(255, 255, 255, 0.07);
            box-shadow:
                0 24px 80px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.04) inset,
                0 0 60px rgba(108, 92, 231, 0.12);
            transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease);
        }

        .hero__image-wrapper:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow:
                0 32px 100px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.06) inset,
                0 0 80px rgba(108, 92, 231, 0.2);
        }

        /* Glow accent behind image */
        .hero__image-wrapper::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 22px;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-accent));
            opacity: 0.15;
            z-index: -1;
            filter: blur(2px);
        }

        .hero__image {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 20px;
        }

        /* Floating stats badge */
        .hero__float-badge {
            position: absolute;
            bottom: -18px;
            left: -20px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 20px;
            background: var(--clr-surface);
            border: 1px solid var(--clr-border);
            border-radius: 14px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
            animation: floatBadge 3s ease-in-out infinite;
        }

        .hero__float-badge-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--clr-primary), var(--clr-accent));
            border-radius: 10px;
            font-size: 1.15rem;
        }

        .hero__float-badge-text {
            display: flex;
            flex-direction: column;
        }

        .hero__float-badge-value {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--clr-text);
            line-height: 1.2;
        }

        .hero__float-badge-label {
            font-size: 0.72rem;
            font-weight: 500;
            color: var(--clr-text-muted);
        }

        /* Entrance animation helpers */
        .hero__content,
        .hero__visual {
            opacity: 0;
            transform: translateY(36px);
            transition: opacity 0.7s var(--ease), transform 0.7s var(--ease);
        }

        .hero__visual {
            transition-delay: 0.15s;
        }

        .hero__content.visible,
        .hero__visual.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== Hero Responsive ===== */
        @media (max-width: 900px) {
            .hero__inner {
                flex-direction: column;
                gap: 48px;
                text-align: center;
            }

            .hero__content {
                flex: 1 1 100%;
            }

            .hero__subtitle {
                max-width: 100%;
            }

            .hero__actions {
                justify-content: center;
            }

            .hero__trust {
                justify-content: center;
            }

            .hero__visual {
                flex: 1 1 100%;
                max-width: 520px;
            }

            .hero__float-badge {
                bottom: -14px;
                left: 12px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: calc(var(--nav-height) + 36px) 16px 60px;
            }

            .hero__actions {
                flex-direction: column;
                width: 100%;
            }

            .btn-hero,
            .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .hero__float-badge {
                left: 8px;
                bottom: -12px;
                padding: 10px 14px;
            }
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

        @keyframes floatBadge {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
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
            <div class="hero__inner">

                <!-- Left Column — Text -->
                <div class="hero__content" id="hero-content">
                    <span class="hero__badge">
                        <span class="hero__badge-dot"></span>
                        Now in Beta
                    </span>

                    <h1 class="hero__title">
                        The Last POS System<br>
                        <span class="hero__title-gradient">You'll Ever Need</span>
                    </h1>

                    <p class="hero__subtitle">
                        Streamline checkout, manage inventory in real time, and unlock
                        powerful sales analytics — all from one beautifully simple dashboard.
                        Built for speed. Designed for growth.
                    </p>

                    <div class="hero__actions">
                        <a href="#signup" class="btn-hero" id="hero-cta">
                            Get Started for Free <span class="btn-hero__arrow">→</span>
                        </a>
                        <a href="#features" class="btn-secondary">
                            <span>▶</span> See How It Works
                        </a>
                    </div>

                    <div class="hero__trust">
                        <span class="hero__trust-item">
                            <span class="hero__trust-icon">✓</span> No credit card required
                        </span>
                        <span class="hero__trust-item">
                            <span class="hero__trust-icon">⚡</span> Setup in 2 minutes
                        </span>
                        <span class="hero__trust-item">
                            <span class="hero__trust-icon">🔒</span> Bank-grade security
                        </span>
                    </div>
                </div>

                <!-- Right Column — Image -->
                <div class="hero__visual" id="hero-visual">
                    <div class="hero__image-wrapper">
                        <img
                            src="assets/hero-dashboard.png"
                            alt="QuickPOS dashboard showing sales analytics, inventory management, and checkout interface"
                            class="hero__image"
                            width="600"
                            height="400"
                            loading="eager"
                        >
                    </div>
                    <!-- Floating stats badge -->
                    <div class="hero__float-badge">
                        <span class="hero__float-badge-icon">📈</span>
                        <span class="hero__float-badge-text">
                            <span class="hero__float-badge-value">+34%</span>
                            <span class="hero__float-badge-label">Revenue Growth</span>
                        </span>
                    </div>
                </div>

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

            /**
             * Scroll-triggered entrance animation for hero columns.
             * Uses IntersectionObserver to add '.visible' class when elements
             * enter the viewport, triggering the CSS opacity/transform transition.
             */
            var heroContent = document.getElementById('hero-content');
            var heroVisual  = document.getElementById('hero-visual');

            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15 });

                observer.observe(heroContent);
                observer.observe(heroVisual);
            } else {
                // Fallback: show immediately for older browsers
                if (heroContent) heroContent.classList.add('visible');
                if (heroVisual) heroVisual.classList.add('visible');
            }
        })();
    </script>
</body>
</html>
