<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takder (تقدير) - Effortless Project Management for Agile Teams</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>

    @include('layouts.partials.header')

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

    @include('layouts.partials.footer')

    <script src="{{ asset('js/landing.js') }}"></script>

</body>
</html>
