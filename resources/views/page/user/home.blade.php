@extends('layouts.index')
@push('css')
<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2ecc71;
        --accent-color: #e74c3c;
        --text-color: #2c3e50;
        --light-text: #7f8c8d;
        --background-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        --hover-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .user-home {
        min-height: 100vh;
        background: var(--background-gradient);
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .user-home::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: url('/images/pattern.png') repeat;
        opacity: 0.1;
        z-index: 0;
    }

    .welcome-section {
        position: relative;
        z-index: 1;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 0;
    }

    .welcome-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: var(--card-shadow);
        padding: 50px;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transform: translateY(0);
        transition: all 0.5s ease;
    }

    .welcome-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--hover-shadow);
    }

    .welcome-title {
        font-size: 3.5rem;
        color: var(--text-color);
        margin-bottom: 20px;
        font-weight: 700;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInDown 1s ease;
    }

    .welcome-subtitle {
        font-size: 1.4rem;
        color: var(--light-text);
        margin-bottom: 40px;
        line-height: 1.6;
        animation: fadeInUp 1s ease;
    }

    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 40px;
        animation: fadeIn 1.5s ease;
    }

    .action-button {
        padding: 15px 30px;
        border-radius: 12px;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        position: relative;
        overflow: hidden;
        border: none;
        cursor: pointer;
    }

    .action-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }

    .action-button:hover::before {
        left: 100%;
    }

    .action-button:hover {
        transform: translateY(-3px);
    }

    .btn-login {
        background: var(--primary-color);
        color: white;
    }

    .btn-register {
        background: var(--secondary-color);
        color: white;
    }

    .features-section {
        position: relative;
        z-index: 1;
        max-width: 1200px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        color: var(--text-color);
        margin-bottom: 40px;
        font-weight: 600;
    }

    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--hover-shadow);
    }

    .feature-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.1);
        color: var(--secondary-color);
    }

    .feature-title {
        font-size: 1.4rem;
        color: var(--text-color);
        margin-bottom: 15px;
        font-weight: 600;
    }

    .feature-description {
        color: var(--light-text);
        font-size: 1rem;
        line-height: 1.6;
    }

    .stats-section {
        position: relative;
        z-index: 1;
        max-width: 1200px;
        margin: 60px auto;
        padding: 40px 20px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: var(--card-shadow);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        text-align: center;
    }

    .stat-item {
        padding: 20px;
    }

    .stat-number {
        font-size: 2.5rem;
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 10px;
    }

    .stat-label {
        color: var(--light-text);
        font-size: 1.1rem;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .welcome-title {
            font-size: 2.5rem;
        }

        .welcome-subtitle {
            font-size: 1.2rem;
        }

        .feature-card {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="user-home">
    <div class="welcome-section">
        <div class="welcome-card">
            <h1 class="welcome-title">Welcome to STN</h1>
            <p class="welcome-subtitle">Your one-stop solution for product management and tracking. Experience seamless
                control over your inventory and operations.</p>

            @guest
            <div class="action-buttons">
                <a href="{{ route('login') }}" class="action-button btn-login">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="{{ route('register') }}" class="action-button btn-register">
                    <i class="fas fa-user-plus"></i> Register
                </a>
            </div>
            @else
            <div class="action-buttons">
                <a href="{{ route('user_dashboard') }}" class="action-button btn-login">
                    <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                </a>
            </div>
            @endguest
        </div>
    </div>

    <div class="features-section">
        <h2 class="section-title">Why Choose STN?</h2>
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-box"></i>
                </div>
                <h3 class="feature-title">Product Management</h3>
                <p class="feature-description">Efficiently track and manage your products with our intuitive interface.
                    Get real-time updates and detailed insights.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-history"></i>
                </div>
                <h3 class="feature-title">Activity Tracking</h3>
                <p class="feature-description">Monitor all your activities and product movements with comprehensive
                    tracking and reporting features.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Real-time Analytics</h3>
                <p class="feature-description">Make informed decisions with our advanced analytics and reporting tools.
                    Get instant insights into your operations.</p>
            </div>
        </div>
    </div>

    <div class="stats-section">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">1000+</div>
                <div class="stat-label">Active Users</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">5000+</div>
                <div class="stat-label">Products Managed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99.9%</div>
                <div class="stat-label">Uptime</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        });

        // Add animation on scroll
        $(window).scroll(function() {
            $('.feature-card').each(function() {
                var position = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                
                if (scroll > position - windowHeight + 100) {
                    $(this).addClass('animated');
                }
            });
        });
    });
</script>
@endpush