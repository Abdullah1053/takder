<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takder (تقدير) - Effortless Project Management for Agile Teams</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- DESIGN SYSTEM FROM JSON --- */
        :root {
            /* Typography */
            --font-family: 'Inter', sans-serif;
            --fw-heading: 600;
            --fw-normal: 400;
            --fw-bold: 700;
            --fs-h1: 48px;
            --fs-h2: 36px;
            --fs-h3: 28px;
            --fs-body: 16px;
            --fs-small: 14px;
            --lh-h1: 56px;
            --lh-body: 24px;

            /* Colors */
            --color-primary: #b1d6fa;
            --color-secondary: #ed9670;
            --color-accent: #f0be78;
            --color-dark-background: #0a0a0a;
            --color-text-primary: #ffffff;
            --color-text-secondary: #cccccc;

            /* Spacing */
            --container-padding: 24px;
            --gutter: 16px;
            --section-vertical: 80px;
            --section-nested: 40px;

            /* Layout */
            --max-width: 1280px;
            --grid-gap: 24px;

            /* Buttons */
            --btn-border-radius: 6px;
            --btn-padding-vertical: 12px;
            --btn-padding-horizontal: 24px;
            --btn-primary-bg: var(--color-accent);
            --btn-primary-text: var(--color-text-primary);
            --btn-hover-bg: #e0a558;

            /* Backgrounds */
            --hero-gradient: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
        }

        /* --- GLOBAL STYLES --- */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-family);
            font-weight: var(--fw-normal);
            font-size: var(--fs-body);
            line-height: var(--lh-body);
            background-color: var(--color-dark-background);
            color: var(--color-text-secondary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3 {
            font-weight: var(--fw-heading);
            color: var(--color-text-primary);
        }

        h1 { font-size: var(--fs-h1); line-height: var(--lh-h1); }
        h2 { font-size: var(--fs-h2); }
        h3 { font-size: var(--fs-h3); }

        p {
            max-width: 65ch;
        }

        a {
            color: var(--color-accent);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--btn-hover-bg);
        }

        /* --- LAYOUT & UTILITIES --- */
        .container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 var(--container-padding);
        }

        .section {
            padding: var(--section-vertical) 0;
        }

        .text-center {
            text-align: center;
        }

        .heading-gradient {
            background-image: var(--hero-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- BUTTONS --- */
        .btn {
            display: inline-block;
            padding: var(--btn-padding-vertical) var(--btn-padding-horizontal);
            border-radius: var(--btn-border-radius);
            font-weight: var(--fw-bold);
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary {
            background-color: var(--btn-primary-bg);
            color: var(--color-dark-background);
        }

        .btn-primary:hover {
            background-color: var(--btn-hover-bg);
            transform: translateY(-2px);
            color: var(--color-dark-background);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--color-text-primary);
            border: 1px solid var(--color-text-secondary);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: var(--color-text-primary);
            transform: translateY(-2px);
        }

        /* --- ANIMATIONS --- */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .hero h1 .word {
            display: inline-block;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }


        /* --- COMPONENTS --- */

        /* Header / Navigation Bar */
        .header {
            padding: 20px 0;
            background-color: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            font-size: 24px;
            font-weight: var(--fw-bold);
            color: var(--color-text-primary);
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: var(--color-text-secondary);
            font-weight: var(--fw-heading);
            font-size: var(--fs-small);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .nav-actions a {
            font-size: var(--fs-small);
        }

        /* Hero Section */
        .hero {
            padding: var(--section-vertical) 0;
            text-align: center;
        }

        .hero h1 {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: var(--grid-gap) auto;
        }

        .hero-cta {
            margin-top: 32px;
            display: flex;
            justify-content: center;
            gap: 16px;
        }

        /* Showcase Section */
        .showcase-wrapper {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            border: 1px solid #2a2a2a;
        }

        .showcase {
            position: relative;
            transition: transform 1s ease-out;
        }

        .showcase img {
            width: 100%;
            display: block;
        }

        .showcase-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10,10,10,0.8) 0%, rgba(10,10,10,0) 50%);
        }

        /* Feature Grid */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--grid-gap);
        }

        .feature-card {
            background-color: #1a1a1a;
            padding: var(--grid-gap);
            border-radius: 8px;
            border: 1px solid #2a2a2a;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .feature-card svg {
            width: 40px;
            height: 40px;
            margin-bottom: var(--gutter);
            color: var(--color-accent);
        }

        .feature-card h3 {
            margin-bottom: var(--gutter);
        }

        /* Pricing Section */
        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--grid-gap);
            margin-top: var(--section-nested);
        }

        .pricing-card {
            background: #111;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 32px;
            text-align: center;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }

        .pricing-card.highlight {
            border-color: var(--color-accent);
            transform: scale(1.05);
        }

        .pricing-card-plan {
            font-size: 1.25rem;
            font-weight: var(--fw-bold);
            color: var(--color-text-primary);
        }

        .pricing-card-price {
            font-size: var(--fs-h1);
            font-weight: var(--fw-bold);
            color: var(--color-text-primary);
            margin: var(--gutter) 0;
        }

        .pricing-card-price span {
            font-size: var(--fs-body);
            font-weight: var(--fw-normal);
            color: var(--color-text-secondary);
        }

        .pricing-card-features {
            list-style: none;
            margin: 32px 0;
            flex-grow: 1;
        }

        .pricing-card-features li {
            margin-bottom: 12px;
        }

        /* CTA Section */
        .cta-section {
            background-image: var(--hero-gradient);
            padding: var(--section-nested);
            border-radius: 12px;
        }

        .cta-section h2 {
            color: var(--color-dark-background);
        }

        .cta-section p {
            color: #222;
            margin: 16px auto;
        }

        .cta-section .btn {
            background-color: var(--color-text-primary);
            color: var(--color-dark-background);
        }

        /* Footer */
        .footer {
            padding: 60px 0 40px;
            border-top: 1px solid #2a2a2a;
            margin-top: var(--section-vertical);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 32px;
            margin-bottom: 40px;
        }

        .footer-column h4 {
            color: var(--color-text-primary);
            margin-bottom: 16px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li a {
            color: var(--color-text-secondary);
            display: block;
            padding: 8px 0;
        }

        .footer-bottom {
            border-top: 1px solid #2a2a2a;
            padding-top: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            font-size: var(--fs-small);
        }

        @media (max-width: 768px) {
            h1 { font-size: 36px; line-height: 44px; }
            h2 { font-size: 28px; }
            .nav-links, .nav-actions .login-link { display: none; } /* Hide for mobile */
            .pricing-card.highlight { transform: scale(1); }
        }

    </style>
</head>
<body>

    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="#" class="nav-logo">Takder</a>
                <div class="nav-links">
                    <a href="#features">Features</a>
                    <a href="#pricing">Pricing</a>
                    <a href="#">About</a>
                </div>
                <div class="nav-actions">
                    <a href="#" class="login-link">Log In</a>
                    <a href="#" class="btn btn-primary">Get Started Free</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1 class="hero-heading">
                    Project Management that Gets Out of Your Way
                </h1>
                <p class="fade-in-up">
                    Tired of bloated enterprise tools and simplistic to-do lists? Takder is the sweet spot: a clean, fast, and intuitive platform designed for small teams, freelancers, and startups who value focus and efficiency.
                </p>
                <div class="hero-cta fade-in-up">
                    <a href="#" class="btn btn-primary">Start Your Free Plan</a>
                    <a href="#features" class="btn btn-secondary">Explore Features</a>
                </div>
            </div>
        </section>

        <section class="container fade-in-up">
            <div class="showcase-wrapper">
                <div class="showcase">
                    <img src="https://i.imgur.com/eBfR5Wz.png" alt="Takder Kanban Board UI">
                    <div class="showcase-overlay"></div>
                </div>
            </div>
        </section>

        <section id="features" class="section">
            <div class="container">
                <div class="text-center fade-in-up">
                    <h2>Everything You Need. Nothing You Don't.</h2>
                    <p style="margin-left: auto; margin-right: auto;">
                        We built Takder with the core features your team needs to deliver great work, without the clutter that slows you down.
                    </p>
                </div>
                <div class="feature-grid" style="margin-top: var(--section-nested);">
                    <div class="feature-card fade-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                        <h3>Visual Kanban Boards</h3>
                        <p>Manage your workflow with a beautiful and responsive drag-and-drop board. See project status at a glance and keep things moving.</p>
                    </div>
                    <div class="feature-card fade-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962A3.75 3.75 0 0112 15v-2.25A3.75 3.75 0 0115.75 9h-1.5a3.75 3.75 0 01-3.75-3.75V3.75A3.75 3.75 0 0112 0v2.25a3.75 3.75 0 01-3.75 3.75h-1.5A3.75 3.75 0 013 9.75v1.5a3.75 3.75 0 013.75 3.75m6.75-4.5a3.75 3.75 0 013.75 3.75v1.5a3.75 3.75 0 01-3.75 3.75m-3.75-3.75a3.75 3.75 0 013.75 3.75v1.5a3.75 3.75 0 01-3.75 3.75m-3.75-3.75a3.75 3.75 0 013.75 3.75v1.5a3.75 3.75 0 01-3.75 3.75M12 12.75a3 3 0 00-3 3v1.5a3 3 0 003 3m0-6a3 3 0 013 3v1.5a3 3 0 01-3 3" /></svg>
                        <h3>Effortless Team Collaboration</h3>
                        <p>Invite team members with secure, expiring links. Assign tasks, set due dates, and keep everyone in sync without the noise.</p>
                    </div>
                    <div class="feature-card fade-in-up">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 21z" /></svg>
                        <h3>Integrated Subscription & Billing</h3>
                        <p>Manage your plan with our simple and secure Stripe-powered billing portal. Upgrade, downgrade, or update payment info anytime.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="pricing" class="section">
            <div class="container">
                <div class="text-center fade-in-up">
                    <h2 class="heading-gradient">Simple, Fair Pricing</h2>
                    <p style="margin-left: auto; margin-right: auto;">
                        Choose a plan that scales with your team. No hidden fees, no enterprise sales calls. Start free forever.
                    </p>
                </div>

                <div class="pricing-grid">
                    <div class="pricing-card fade-in-up">
                        <h3 class="pricing-card-plan">Free</h3>
                        <p class="pricing-card-price">$0 <span>/ month</span></p>
                        <ul class="pricing-card-features">
                            <li>Up to 3 Projects</li>
                            <li>Up to 5 Users</li>
                            <li>Kanban Boards</li>
                            <li>Core Task Management</li>
                        </ul>
                        <a href="#" class="btn btn-secondary">Get Started</a>
                    </div>
                    <div class="pricing-card highlight fade-in-up">
                        <h3 class="pricing-card-plan">Pro</h3>
                        <p class="pricing-card-price">$10 <span>/ month</span></p>
                        <ul class="pricing-card-features">
                            <li>Up to 20 Projects</li>
                            <li>Up to 20 Users</li>
                            <li>Everything in Free, plus:</li>
                            <li>Priority Support</li>
                        </ul>
                        <a href="#" class="btn btn-primary">Choose Pro</a>
                    </div>
                    <div class="pricing-card fade-in-up">
                        <h3 class="pricing-card-plan">Business</h3>
                        <p class="pricing-card-price">$25 <span>/ month</span></p>
                        <ul class="pricing-card-features">
                            <li>Unlimited Projects</li>
                            <li>Unlimited Users</li>
                            <li>Everything in Pro, plus:</li>
                            <li>Advanced Reporting (Coming Soon)</li>
                        </ul>
                        <a href="#" class="btn btn-secondary">Contact Us</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="cta-section text-center fade-in-up">
                <h2>Ready to Simplify Your Workflow?</h2>
                <p>Sign up for Takder today and experience project management that finally feels right.</p>
                <div style="margin-top: 24px;">
                    <a href="#" class="btn">Start for Free</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#">Updates</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">License</a></li>
                    </ul>
                </div>
                 <div class="footer-column">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                 <div class="footer-column">
                    <h4>Social</h4>
                    <ul>
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Takder (تقدير)</p>
                <p>&copy; 2024 Takder. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // --- Staggered hero text animation ---
            const heroHeading = document.querySelector('.hero-heading');
            if (heroHeading) {
                const text = heroHeading.textContent.trim();
                const words = text.split(' ');

                // Add a span with gradient for the last few words
                const gradientWords = words.slice(-4).join(' ');
                const normalWords = words.slice(0, -4).join(' ');

                heroHeading.innerHTML = `${normalWords} <span class="heading-gradient">${gradientWords}</span>`;

                // Animate the whole block
                setTimeout(() => {
                    heroHeading.style.opacity = '1';
                    heroHeading.style.transform = 'translateY(0)';
                }, 100);
            }

            // --- General fade-in-up animation on scroll ---
            const animatedElements = document.querySelectorAll('.fade-in-up');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });
            animatedElements.forEach(el => observer.observe(el));

            // --- Parallax zoom effect for showcase image ---
            const showcase = document.querySelector('.showcase');
            if (showcase) {
                window.addEventListener('scroll', () => {
                    const rect = showcase.parentElement.getBoundingClientRect();
                    const windowHeight = window.innerHeight;
                    // Check if the element is in the viewport
                    if (rect.top < windowHeight && rect.bottom > 0) {
                        const scrollPercent = (windowHeight - rect.top) / (windowHeight + rect.height);
                        const scale = 1 + (scrollPercent - 0.5) * 0.1; // Subtle zoom
                        showcase.style.transform = `scale(${Math.min(1.05, Math.max(1, scale))})`;
                    }
                });
            }
        });
    </script>

</body>
</html>
