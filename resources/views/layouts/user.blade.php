<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STN Multimedia | Jasa Live Streaming & Production Profesional di Indonesia</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="STN Multimedia adalah penyedia jasa live streaming dan production profesional di Indonesia. Kami menawarkan layanan live streaming, video production, dan fotografi untuk event, wedding, webinar, dan corporate meeting.">
    <meta name="keywords"
        content="live streaming, video production, fotografi, event, wedding, webinar, corporate meeting, Indonesia, STN Multimedia">
    <meta name="author" content="STN Multimedia">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="STN Multimedia | Jasa Live Streaming & Production Profesional">
    <meta property="og:description"
        content="Solusi profesional untuk live streaming, video production, dan fotografi event Anda. Kami menyediakan layanan berkualitas tinggi untuk berbagai kebutuhan multimedia.">
    <meta property="og:image" content="{{ asset('assets/img/stn.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="STN Multimedia | Jasa Live Streaming & Production Profesional">
    <meta name="twitter:description"
        content="Solusi profesional untuk live streaming, video production, dan fotografi event Anda. Kami menyediakan layanan berkualitas tinggi untuk berbagai kebutuhan multimedia.">
    <meta name="twitter:image" content="{{ asset('assets/img/stn.png') }}">

    <link rel="shortcut icon" href="{{ URL::To('assets/img/stn.png') }}" type="image/x-icon">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Khand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Additional CSS Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #0693e3;
            --secondary-color: #9b51e0;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
            --gradient-primary: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            --gradient-dark: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Khand', sans-serif;
            font-weight: 700;
        }

        /* Modern Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
        }

        .brand-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .brand-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover .brand-text {
            transform: translateX(5px);
        }

        .navbar-brand img {
            transition: all 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            font-weight: 500;
            color: #2c3e50;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link i {
            font-size: 1.1rem;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .nav-link:hover i {
            opacity: 1;
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .nav-link.btn-primary {
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(6, 147, 227, 0.2);
        }

        .nav-link.btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 147, 227, 0.3);
        }

        .nav-link.btn-primary::after {
            display: none;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            position: relative;
            width: 24px;
            height: 2px;
            background: #0693e3;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: #0693e3;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before {
            transform: translateY(-8px);
        }

        .navbar-toggler-icon::after {
            transform: translateY(8px);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
            background: transparent;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::before {
            transform: rotate(45deg);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::after {
            transform: rotate(-45deg);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                padding: 1rem;
                border-radius: 15px;
                margin-top: 1rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            .nav-link {
                padding: 0.8rem 1rem;
                border-radius: 10px;
            }

            .nav-link:hover {
                background: rgba(6, 147, 227, 0.1);
            }

            .nav-link.btn-primary {
                margin: 0.5rem 0;
                text-align: center;
                justify-content: center;
            }

            .brand-text {
                font-size: 1.2rem;
            }
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            color: white;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            font-size: 0.9rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-gradient {
            background: linear-gradient(to right, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .highlight-text {
            color: #ffffff;
            -webkit-text-fill-color: #ffffff;
            position: relative;
            display: inline-block;
        }

        .highlight-text::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #ffffff;
            border-radius: 2px;
        }

        .hero-description {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 90%;
        }

        .hero-cta .btn {
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .hero-cta .btn-light {
            background: white;
            color: var(--primary-color);
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .hero-cta .btn-light:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .hero-cta .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.5);
            background: transparent;
        }

        .hero-cta .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .hero-stats {
            position: relative;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(to right, #ffffff, #e0e0e0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
            margin: 0;
        }

        .hero-image-wrapper {
            position: relative;
            padding: 2rem;
        }

        .hero-image {
            position: relative;
            z-index: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.5s ease;
        }

        .hero-image:hover {
            transform: perspective(1000px) rotateY(0deg);
        }

        .hero-image img {
            width: 100%;
            height: auto;
            transition: all 0.5s ease;
        }

        .floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            z-index: 2;
            animation: float 3s ease-in-out infinite;
        }

        .floating-card i {
            font-size: 1.2rem;
            color: var(--primary-color);
        }

        .floating-card span {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .card-1 {
            top: 10%;
            right: 0;
            animation-delay: 0s;
        }

        .card-2 {
            bottom: 20%;
            left: 0;
            animation-delay: 1s;
        }

        .card-3 {
            bottom: 10%;
            right: 20%;
            animation-delay: 2s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 991.98px) {
            .hero-section {
                padding: 100px 0 50px;
            }

            .hero-content {
                text-align: center;
                margin-bottom: 3rem;
            }

            .hero-description {
                max-width: 100%;
            }

            .hero-cta {
                justify-content: center;
            }

            .floating-card {
                display: none;
            }

            .hero-image {
                transform: none;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0 30px;
            }

            .display-3 {
                font-size: 2.5rem;
            }

            .hero-stats .stat-number {
                font-size: 1.5rem;
            }
        }

        /* Kenapa Harus STN Multimedia Section */
        .why-stn {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }

        .why-stn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(6, 147, 227, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(155, 81, 224, 0.05) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%230693e3' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 1;
        }

        .section-intro {
            margin-bottom: 3rem;
        }

        .modern-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            height: 100%;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                linear-gradient(45deg, rgba(6, 147, 227, 0.05) 25%, transparent 25%),
                linear-gradient(-45deg, rgba(155, 81, 224, 0.05) 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, rgba(6, 147, 227, 0.05) 75%),
                linear-gradient(-45deg, transparent 75%, rgba(155, 81, 224, 0.05) 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
            opacity: 0.5;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper i {
            font-size: 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .modern-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .modern-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            color: #444;
            line-height: 1.6;
        }

        .modern-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.5rem;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--primary-color);
        }

        .modern-text {
            font-size: 0.95rem;
            color: #444;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #444;
        }

        .feature-item i {
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .modern-card {
                margin-bottom: 1.5rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        /* About Section Styles */
        .about-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(6, 147, 227, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(155, 81, 224, 0.05) 0%, transparent 50%);
            z-index: 0;
        }

        .about-content {
            position: relative;
            z-index: 1;
        }

        .about-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: rgba(6, 147, 227, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-icon i {
            font-size: 1.5rem;
        }

        .about-features {
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
            color: #444;
        }

        .feature-item i {
            font-size: 1.1rem;
        }

        .about-image-wrapper {
            position: relative;
            padding: 2rem;
        }

        .about-image {
            position: relative;
            z-index: 1;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transform: perspective(1000px) rotateY(-5deg);
            transition: all 0.5s ease;
        }

        .about-image:hover {
            transform: perspective(1000px) rotateY(0deg);
        }

        .about-image img {
            width: 100%;
            height: auto;
            transition: all 0.5s ease;
        }

        .experience-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            box-shadow: 0 10px 20px rgba(6, 147, 227, 0.2);
            z-index: 2;
        }

        .experience-badge .number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
            line-height: 1;
        }

        .experience-badge .text {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .stats-card {
            position: absolute;
            bottom: 0;
            left: 0;
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 2;
            width: 80%;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0693e3;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
        }

        @media (max-width: 991.98px) {
            .about-image-wrapper {
                margin-top: 3rem;
            }

            .about-image {
                transform: none;
            }

            .experience-badge {
                top: -20px;
                right: 20px;
            }

            .stats-card {
                bottom: -20px;
                left: 50%;
                transform: translateX(-50%);
                width: 90%;
            }
        }

        /* Auth Modal Styles */
        .modal-content {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .auth-image {
            position: relative;
            height: 100%;
            min-height: 400px;
        }

        .auth-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(6, 147, 227, 0.9) 0%, rgba(155, 81, 224, 0.9) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
        }

        .form-floating>.form-control {
            padding: 1rem 0.75rem;
        }

        .form-floating>label {
            padding: 1rem 0.75rem;
        }

        .form-control:focus {
            border-color: #0693e3;
            box-shadow: 0 0 0 0.25rem rgba(6, 147, 227, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(6, 147, 227, 0.3);
        }

        .form-check-input:checked {
            background-color: #0693e3;
            border-color: #0693e3;
        }

        .modal-backdrop.show {
            opacity: 0.7;
        }

        @media (max-width: 991.98px) {
            .auth-image {
                min-height: 200px;
            }
        }

        /* Topology Section Styles */
        .topology-container {
            padding: 2rem 0;
        }

        .topology-group {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            border: 1px solid rgba(6, 147, 227, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .topology-group:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .group-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(6, 147, 227, 0.1);
        }

        .group-header i {
            font-size: 1.5rem;
            background: linear-gradient(135deg, #0693e3 0%, #9b51e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .group-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .topology-cards {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .topology-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            display: flex;
            gap: 1.5rem;
            align-items: flex-start;
            transition: all 0.3s ease;
            border: 1px solid rgba(6, 147, 227, 0.1);
        }

        .topology-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(6, 147, 227, 0.1) 0%, rgba(155, 81, 224, 0.1) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .card-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .card-content {
            flex: 1;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .card-text {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .card-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .feature-tag {
            background: linear-gradient(135deg, rgba(6, 147, 227, 0.1) 0%, rgba(155, 81, 224, 0.1) 100%);
            color: var(--primary-color);
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .connection-lines {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            z-index: -1;
            pointer-events: none;
        }

        .connection-line {
            stroke-dasharray: 5;
            animation: dash 30s linear infinite;
        }

        @keyframes dash {
            to {
                stroke-dashoffset: 1000;
            }
        }

        @media (max-width: 991.98px) {
            .topology-group {
                margin-bottom: 2rem;
            }

            .connection-lines {
                display: none;
            }

            .topology-card {
                padding: 1rem;
            }

            .card-icon {
                width: 50px;
                height: 50px;
            }
        }

        /* Profile Styles */
        .profile-avatar {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        .avatar-edit {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .avatar-edit:hover {
            transform: scale(1.1);
        }

        .profile-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .profile-menu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-radius: 10px;
            color: var(--dark-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .profile-menu-item:hover {
            background: rgba(6, 147, 227, 0.1);
            color: var(--primary-color);
        }

        .profile-menu-item i {
            width: 20px;
            text-align: center;
        }

        .user-menu .nav-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-name {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="brand-wrapper">
                    {{-- <img src="{{ asset('assets/img/stn.png') }}" alt="STN Multimedia Logo" height="40"> --}}
                    <span class="brand-text">STN Multimedia</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">
                            <i class="fas fa-home"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">
                            <i class="fas fa-cogs"></i>
                            <span>Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            <i class="fas fa-info-circle"></i>
                            <span>Tentang Kami</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
                            <i class="fas fa-envelope"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                    <!-- Guest Menu -->
                    <li class="nav-item ms-lg-3 guest-menu">
                        <a class="nav-link btn btn-outline-primary btn-sm me-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                        </a>
                    </li>
                    <li class="nav-item guest-menu">
                        <a class="nav-link btn btn-primary btn-sm" href="#" data-bs-toggle="modal"
                            data-bs-target="#registerModal">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </a>
                    </li>
                    <!-- User Menu -->
                    <li class="nav-item ms-lg-3 user-menu" style="display: none;">
                        <a class="nav-link btn btn-primary btn-sm" href="#" data-bs-toggle="modal"
                            data-bs-target="#profileModal">
                            <i class="fas fa-user-circle me-2"></i>
                            <span class="user-name">User Name</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="auth-image">
                                <img src="{{ asset('assets/img/auth-bg.jpg') }}" alt="Profile" class="img-fluid">
                                <div class="auth-overlay">
                                    <h4 class="text-white mb-3">Selamat Datang!</h4>
                                    <p class="text-white-50">Kelola profil dan pengaturan akun Anda</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-4 p-lg-5">
                                <div class="text-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="text-center mb-4">
                                    <div class="profile-avatar mb-3">
                                        <img src="{{ asset('assets/img/default-avatar.png') }}" alt="Profile Avatar"
                                            class="rounded-circle">
                                        <button class="btn btn-sm btn-light avatar-edit">
                                            <i class="fas fa-camera"></i>
                                        </button>
                                    </div>
                                    <h4 class="profile-name mb-1">User Name</h4>
                                    <p class="text-muted mb-3">user@email.com</p>
                                </div>
                                <div class="profile-menu">
                                    <a href="#" class="profile-menu-item">
                                        <i class="fas fa-user"></i>
                                        <span>Edit Profil</span>
                                    </a>
                                    <a href="#" class="profile-menu-item">
                                        <i class="fas fa-history"></i>
                                        <span>Riwayat Order</span>
                                    </a>
                                    <a href="#" class="profile-menu-item">
                                        <i class="fas fa-cog"></i>
                                        <span>Pengaturan</span>
                                    </a>
                                    <a href="#" class="profile-menu-item text-danger" id="logoutBtn">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Keluar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="hero-content">
                        <span class="hero-badge mb-3">Welcome to STN Multimedia</span>
                        <h1 class="display-3 fw-bold mb-4 text-gradient">
                            THE REAL EVENT<br>
                            <span class="highlight-text">IS YOURS</span>
                        </h1>
                        <p class="lead mb-4 hero-description">
                            Kami adalah penyedia jasa live streaming dan production profesional yang
                            berdedikasi untuk menciptakan pengalaman multimedia yang tak terlupakan. Dengan peralatan
                            broadcast berkualitas tinggi dan tim yang berpengalaman, kami siap membantu Anda
                            menyelenggarakan event online yang sukses.
                        </p>
                        <div class="hero-cta">
                            <a href="#contact" class="btn btn-light btn-lg me-3">
                                <i class="fas fa-play-circle me-2"></i>Mulai Sekarang
                            </a>
                            <a href="#services" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                            </a>
                        </div>
                        <div class="hero-stats mt-5">
                            <div class="row g-4">
                                <div class="col-4">
                                    <div class="stat-item">
                                        <h3 class="stat-number">500+</h3>
                                        <p class="stat-label">Event Sukses</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-item">
                                        <h3 class="stat-number">50+</h3>
                                        <p class="stat-label">Klien Puas</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stat-item">
                                        <h3 class="stat-number">100%</h3>
                                        <p class="stat-label">Kualitas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="hero-image-wrapper">
                        <div class="hero-image">
                            <img src="{{ asset('assets/img/hero-img.jpg') }}" alt="STN Multimedia Live Streaming Setup"
                                class="img-fluid rounded-4 shadow-lg">
                        </div>
                        <div class="floating-card card-1">
                            <i class="fas fa-video"></i>
                            <span>Live Streaming</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-camera"></i>
                            <span>Production</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-broadcast-tower"></i>
                            <span>Broadcast</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kenapa Harus STN Multimedia Section -->
    <section class="py-5 position-relative" id="why-stn">
        <div class="container position-relative" style="min-height: 420px;">
            <h3 class="mb-5 fw-bold" style="color:#0693e3">Kenapa Harus STN Multimedia</h3>
            <!-- SVG ARROWS -->
            <svg class="position-absolute top-0 start-0 w-100 h-100" style="pointer-events:none; z-index:1;"
                width="100%" height="100%" viewBox="0 0 900 350">
                <!-- Manpower -> Price -->
                <line x1="110" y1="180" x2="220" y2="100" stroke="#0693e3" stroke-width="3"
                    marker-end="url(#arrowheadwhy)" />
                <!-- Price -> Hardware -->
                <line x1="250" y1="100" x2="370" y2="180" stroke="#0693e3" stroke-width="3"
                    marker-end="url(#arrowheadwhy)" />
                <!-- Hardware -> Solution -->
                <line x1="400" y1="180" x2="520" y2="100" stroke="#0693e3" stroke-width="3"
                    marker-end="url(#arrowheadwhy)" />
                <!-- Solution -> Software -->
                <line x1="550" y1="100" x2="670" y2="180" stroke="#0693e3" stroke-width="3"
                    marker-end="url(#arrowheadwhy)" />
                <!-- Software -> Consultation -->
                <line x1="700" y1="180" x2="820" y2="100" stroke="#0693e3" stroke-width="3"
                    marker-end="url(#arrowheadwhy)" />
                <defs>
                    <marker id="arrowheadwhy" markerWidth="10" markerHeight="7" refX="10" refY="3.5" orient="auto">
                        <polygon points="0 0, 10 3.5, 0 7" fill="#0693e3" />
                    </marker>
                </defs>
            </svg>
            <!-- END SVG ARROWS -->
            <div class="row justify-content-center align-items-center" style="position:relative; z-index:2;">
                <!-- Manpower -->
                <div class="col-6 col-md-2 text-center mb-4" style="margin-top:120px;">
                    <img src="{{ asset('assets/icon/why-manpower.svg') }}" alt="Manpower" width="64">
                    <div class="fw-semibold mt-2" style="color:#0693e3">Manpower Berpengalaman</div>
                    <small class="text-muted">Dengan jam terbang tinggi dan terbiasa menangani event kecil, medium
                        sampai skala besar</small>
                </div>
                <!-- Price -->
                <div class="col-6 col-md-2 text-center mb-4" style="margin-top:40px;">
                    <img src="{{ asset('assets/icon/why-price.svg') }}" alt="Harga Terjangkau" width="64">
                    <div class="fw-semibold mt-2" style="color:#0693e3">Harga Terjangkau</div>
                    <small class="text-muted">Harga kompetitif, mengerti kebutuhan dan budget Anda</small>
                </div>
                <!-- Hardware -->
                <div class="col-6 col-md-2 text-center mb-4" style="margin-top:120px;">
                    <img src="{{ asset('assets/icon/why-hardware.svg') }}" alt="Hardware Broadcast Pro" width="64">
                    <div class="fw-semibold mt-2" style="color:#0693e3">Hardware Broadcast Pro</div>
                    <small class="text-muted">Alat berkualitas tinggi, standar pertelevisian Indonesia</small>
                </div>
                <!-- Solution -->
                <div class="col-6 col-md-2 text-center mb-4" style="margin-top:40px;">
                    <img src="{{ asset('assets/icon/why-solution.svg') }}" alt="One Stop Solution" width="64">
                    <div class="fw-semibold mt-2" style="color:#0693e3">One Stop Solution</div>
                    <small class="text-muted">Semua kebutuhan multimedia Anda kami support</small>
                </div>
                <!-- Software -->
                <div class="col-6 col-md-2 text-center mb-4" style="margin-top:120px;">
                    <img src="{{ asset('assets/icon/why-software.svg') }}" alt="Software Broadcast Pro" width="64">
                    <div class="fw-semibold mt-2" style="color:#0693e3">Software Broadcast Pro</div>
                    <small class="text-muted">Vmix Pro berlisensi, minim error saat live</small>
                </div>
                <!-- Consultation -->
                <div class="col-6 col-md-2 text-center mb-4" style="margin-top:40px;">
                    <img src="{{ asset('assets/icon/why-consultation.svg') }}" alt="Free Konsultasi" width="64">
                    <div class="fw-semibold mt-2" style="color:#0693e3">Free Konsultasi</div>
                    <small class="text-muted">Konsultasi & kelengkapan tambahan gratis</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Kenapa Harus Live Streaming di Era Pandemi Section -->
    <section class="py-5" id="why-livestreaming">
        <div class="container position-relative" style="z-index:2;">
            <div class="section-intro text-center mb-5">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">Transformasi Digital</span>
                <h3 class="display-5 fw-bold mb-3" style="color:#0693e3; text-shadow:1px 1px 4px rgba(0,0,0,0.1);">
                    Evolusi Event di Era Digital
                </h3>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Dalam era transformasi digital, live streaming telah menjadi solusi revolusioner untuk menghubungkan
                    audiens tanpa batas.
                    Kami menghadirkan pengalaman event yang tak terlupakan dengan teknologi broadcast profesional.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Permasalahan -->
                <div class="col-md-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="icon-wrapper mb-3">
                                <i class="fas fa-exclamation-circle text-info"></i>
                            </div>
                            <h4 class="fw-bold text-info mb-3">Tantangan Digital</h4>
                        </div>
                        <div class="card-body">
                            <ul class="modern-list">
                                <li>Pembatasan pertemuan fisik yang mempengaruhi kelangsungan event dan meeting</li>
                                <li>Biaya operasional tinggi untuk event offline, termasuk akomodasi dan perjalanan</li>
                                <li>Keterbatasan akses teknologi dan infrastruktur untuk event digital</li>
                                <li>Kebutuhan adaptasi cepat terhadap platform digital</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Akibat -->
                <div class="col-md-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="icon-wrapper mb-3">
                                <i class="fas fa-chart-line text-danger"></i>
                            </div>
                            <h4 class="fw-bold text-danger mb-3">Dampak Bisnis</h4>
                        </div>
                        <div class="card-body">
                            <ul class="modern-list">
                                <li>Hambatan dalam koordinasi dan penyelarasan visi perusahaan secara global</li>
                                <li>Penurunan engagement dan awareness brand di era digital</li>
                                <li>Ketertinggalan dalam persaingan digital transformation</li>
                                <li>Keterbatasan dalam membangun koneksi dan networking</li>
                                <li>Citra profesional yang terpengaruh oleh platform meeting standar</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Solusi -->
                <div class="col-md-4">
                    <div class="modern-card">
                        <div class="card-header">
                            <div class="icon-wrapper mb-3">
                                <i class="fas fa-lightbulb text-success"></i>
                            </div>
                            <h4 class="fw-bold text-success mb-3">Solusi Profesional</h4>
                        </div>
                        <div class="card-body">
                            <p class="modern-text">
                                <span class="fw-bold text-primary">STN Multimedia</span> menghadirkan solusi broadcast
                                profesional yang mengubah cara Anda menyelenggarakan event digital.
                                Kami menggabungkan teknologi canggih dengan kreativitas untuk menciptakan pengalaman
                                yang memukau.
                            </p>
                            <div class="features-grid mt-4">
                                <div class="feature-item">
                                    <i class="fas fa-video text-primary"></i>
                                    <span>Multi-Camera Setup</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-broadcast-tower text-primary"></i>
                                    <span>Multi-Platform Streaming</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-users text-primary"></i>
                                    <span>Audience Engagement</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-chart-bar text-primary"></i>
                                    <span>Analytics & Insights</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>Layanan Profesional Kami</h2>
                <p class="lead text-muted">Solusi multimedia terbaik untuk setiap kebutuhan Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-video"></i>
                            <h3 class="card-title">Video Production</h3>
                            <p class="card-text">Layanan produksi video profesional untuk berbagai kebutuhan Anda. Kami
                                menangani pembuatan video company profile, video marketing, dokumentasi event, dan
                                berbagai jenis video lainnya dengan kualitas broadcast.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-camera"></i>
                            <h3 class="card-title">Fotografi</h3>
                            <p class="card-text">Jasa fotografi profesional untuk event, portrait, dan kebutuhan
                                komersial. Tim fotografer kami berpengalaman dalam menangkap momen-momen berharga dengan
                                hasil yang memukau.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-film"></i>
                            <h3 class="card-title">Live Streaming</h3>
                            <p class="card-text">Layanan live streaming profesional untuk event, webinar, dan
                                konferensi. Kami menyediakan solusi streaming multi-platform dengan kualitas HD dan
                                dukungan teknis 24/7.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    {{-- <section id="portfolio" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Portfolio</h2>
            <div class="row g-4"> --}}
    <!-- Portfolio items will be dynamically loaded here -->
    {{-- </div>
        </div>
    </section> --}}

    <!-- Our Client Section: YouTube Video Slider -->
    <section id="portfolio" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Portfolio</h2>
            <div id="clientVideoCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/-5tttUQKM8E"
                                        title="Client Video 1" allowfullscreen></iframe></div>
                            </div>
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/ZnvEsiN-ljo"
                                        title="Client Video 2" allowfullscreen></iframe></div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/yowozNpNzx8"
                                        title="Client Video 3" allowfullscreen></iframe></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/0DL9yCzW7EY"
                                        title="Client Video 4" allowfullscreen></iframe></div>
                            </div>
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/jy02r3N9kGo"
                                        title="Client Video 5" allowfullscreen></iframe></div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="ratio ratio-16x9"><iframe src="https://www.youtube.com/embed/iP5KMkmrm6w"
                                        title="Client Video 6" allowfullscreen></iframe></div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#clientVideoCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clientVideoCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 position-relative">
        <div class="about-overlay"></div>
        <div class="container position-relative">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">Tentang Kami</span>
                <h2 class="display-5 fw-bold mb-3">Tentang STN Multimedia</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Menciptakan pengalaman multimedia yang luar biasa dengan teknologi terkini dan kreativitas tanpa
                    batas
                </p>
            </div>

            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content">
                        <div class="about-card mb-4">
                            <div class="card-icon mb-3">
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <h3 class="h4 mb-3">Visi Kami</h3>
                            <p class="text-muted">Menjadi penyedia layanan multimedia terdepan yang menginspirasi dan
                                mengubah cara dunia berkomunikasi melalui teknologi digital.</p>
                        </div>

                        <div class="about-card mb-4">
                            <div class="card-icon mb-3">
                                <i class="fas fa-bullseye text-primary"></i>
                            </div>
                            <h3 class="h4 mb-3">Misi Kami</h3>
                            <p class="text-muted">Memberikan solusi multimedia inovatif dengan kualitas terbaik,
                                didukung oleh tim profesional dan teknologi terkini.</p>
                        </div>

                        <div class="about-features">
                            <div class="row g-4">
                                <div class="col-6">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Tim Profesional</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Teknologi Terkini</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Kualitas Premium</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="feature-item">
                                        <i class="fas fa-check-circle text-success"></i>
                                        <span>Layanan 24/7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-image-wrapper">
                        <div class="about-image">
                            <img src="{{ asset('assets/img/stn.png') }}" style="background-color: #000;"
                                alt="STN Multimedia" class="img-fluid rounded-4 shadow-lg">
                        </div>
                        <div class="experience-badge">
                            <span class="number">5+</span>
                            <span class="text">Tahun Pengalaman</span>
                        </div>
                        <div class="stats-card">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="stat-item">
                                        <h4 class="stat-number">500+</h4>
                                        <p class="stat-label">Project Sukses</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-item">
                                        <h4 class="stat-number">100%</h4>
                                        <p class="stat-label">Klien Puas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Streaming Topology Section -->
    <section class="py-5" id="topology">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">Infrastructure</span>
                <h2 class="display-5 fw-bold mb-3">Live Streaming Topology</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Infrastruktur profesional yang dirancang untuk memberikan kualitas streaming terbaik
                </p>
            </div>

            <div class="topology-container position-relative">
                <!-- Main Flow Diagram -->
                <div class="topology-flow" data-aos="fade-up">
                    <div class="row g-4 justify-content-center">
                        <!-- Input Devices -->
                        <div class="col-lg-4">
                            <div class="topology-group">
                                <div class="group-header">
                                    <i class="fas fa-signal text-primary"></i>
                                    <h5 class="group-title">Input Devices</h5>
                                </div>
                                <div class="topology-cards">
                                    <!-- Camera -->
                                    <div class="topology-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="card-icon">
                                            <img src="{{ asset('assets/icon/camera.svg') }}" alt="Camera"
                                                class="img-fluid">
                                        </div>
                                        <div class="card-content">
                                            <h6 class="card-title">Broadcast Cameras</h6>
                                            <p class="card-text">Kamera profesional dengan resolusi 4K</p>
                                            <div class="card-features">
                                                <span class="feature-tag">4K Resolution</span>
                                                <span class="feature-tag">Auto Focus</span>
                                                <span class="feature-tag">Low Light</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sound System -->
                                    <div class="topology-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="card-icon">
                                            <img src="{{ asset('assets/icon/sound-system.svg') }}" alt="Sound System"
                                                class="img-fluid">
                                        </div>
                                        <div class="card-content">
                                            <h6 class="card-title">Sound System</h6>
                                            <p class="card-text">Sistem audio profesional dengan noise reduction</p>
                                            <div class="card-features">
                                                <span class="feature-tag">Noise Reduction</span>
                                                <span class="feature-tag">Multi-Channel</span>
                                                <span class="feature-tag">HD Audio</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Processing Unit -->
                        <div class="col-lg-4">
                            <div class="topology-group">
                                <div class="group-header">
                                    <i class="fas fa-microchip text-primary"></i>
                                    <h5 class="group-title">Processing Unit</h5>
                                </div>
                                <div class="topology-cards">
                                    <!-- Camera Switcher -->
                                    <div class="topology-card" data-aos="fade-up" data-aos-delay="300">
                                        <div class="card-icon">
                                            <img src="{{ asset('assets/icon/camera-switcher.svg') }}"
                                                alt="Camera Switcher" class="img-fluid">
                                        </div>
                                        <div class="card-content">
                                            <h6 class="card-title">Camera Switcher</h6>
                                            <p class="card-text">Pengatur perpindahan kamera profesional</p>
                                            <div class="card-features">
                                                <span class="feature-tag">Multi-Input</span>
                                                <span class="feature-tag">Real-time</span>
                                                <span class="feature-tag">HDMI 2.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- PC Streaming -->
                                    <div class="topology-card" data-aos="fade-up" data-aos-delay="400">
                                        <div class="card-icon">
                                            <img src="{{ asset('assets/icon/pc-streaming.svg') }}" alt="PC Streaming"
                                                class="img-fluid">
                                        </div>
                                        <div class="card-content">
                                            <h6 class="card-title">Streaming PC</h6>
                                            <p class="card-text">Komputer performa tinggi dengan encoder profesional</p>
                                            <div class="card-features">
                                                <span class="feature-tag">NVENC</span>
                                                <span class="feature-tag">4K Ready</span>
                                                <span class="feature-tag">Low Latency</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Output Platforms -->
                        <div class="col-lg-4">
                            <div class="topology-group">
                                <div class="group-header">
                                    <i class="fas fa-broadcast-tower text-primary"></i>
                                    <h5 class="group-title">Output Platforms</h5>
                                </div>
                                <div class="topology-cards">
                                    <!-- Live Platforms -->
                                    <div class="topology-card" data-aos="fade-up" data-aos-delay="500">
                                        <div class="card-icon">
                                            <img src="{{ asset('assets/icon/live-platforms.svg') }}"
                                                alt="Live Platforms" class="img-fluid">
                                        </div>
                                        <div class="card-content">
                                            <h6 class="card-title">Streaming Platforms</h6>
                                            <p class="card-text">Multi-platform streaming dengan kualitas HD</p>
                                            <div class="card-features">
                                                <span class="feature-tag">YouTube</span>
                                                <span class="feature-tag">Facebook</span>
                                                <span class="feature-tag">Instagram</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Connection Lines -->
                    <div class="connection-lines">
                        <svg class="w-100" viewBox="0 0 1200 400" preserveAspectRatio="none">
                            <!-- Input to Processing -->
                            <path d="M300,100 C400,100 500,100 600,100" stroke="#0693e3" stroke-width="2" fill="none"
                                class="connection-line" />
                            <!-- Processing to Output -->
                            <path d="M600,100 C700,100 800,100 900,100" stroke="#0693e3" stroke-width="2" fill="none"
                                class="connection-line" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Hubungi Kami</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="text-center mb-4">Konsultasikan kebutuhan multimedia Anda dengan tim profesional kami.
                        Kami siap membantu Anda mewujudkan visi dan misi perusahaan melalui solusi multimedia yang
                        tepat.</p>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">Subjek</label>
                                <input type="text" class="form-control" id="subject" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary btn-lg" type="submit">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Products Section -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Products</h2>
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-top position-relative" style="height: 200px; overflow: hidden;">
                            @if($product->image && file_exists(public_path('upload/product/'.$product->image)))
                            <img src="{{ asset('upload/product/'.$product->image) }}" alt="{{ $product->product_name }}"
                                class="w-100 h-100 object-fit-cover">
                            @else
                            <img src="{{ asset('assets/icon/default-product.svg') }}" alt="Default Product Image"
                                class="w-100 h-100 object-fit-contain p-3">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $product->product_name }}</h5>
                            <p class="card-text small text-muted mb-2">
                                <span class="badge bg-primary">{{ $product->category }}</span>
                                <span class="badge bg-info">{{ $product->brand }}</span>
                            </p>
                            <p class="card-text small">
                                <strong>Type:</strong> {{ $product->type }}<br>
                                {{-- <strong>Code:</strong> {{ $product->product_code }} --}}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                                {{-- <span class="badge {{ $product->status == 'Good' ? 'bg-success' : 'bg-warning' }}">
                                {{ $product->status }}
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4" data-aos="fade-up">
                    <h5>STN Multimedia</h5>
                    <p>Solusi profesional untuk kebutuhan multimedia Anda. Kami menyediakan layanan live streaming,
                        video production, dan fotografi dengan kualitas terbaik.</p>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-black">Beranda</a></li>
                        <li><a href="#services" class="text-black">Layanan</a></li>
                        <li><a href="#portfolio" class="text-black">Portfolio</a></li>
                        <li><a href="#about" class="text-black">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-black">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <h5>Hubungi Kami</h5>
                    <div class="social-links">
                        <a href="#" title="Facebook STN Multimedia"><i class="fab fa-facebook"></i></a>
                        <a href="#" title="Instagram STN Multimedia"><i class="fab fa-instagram"></i></a>
                        <a href="#" title="Twitter STN Multimedia"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="LinkedIn STN Multimedia"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 STN Multimedia. Hak Cipta Dilindungi.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white me-3">Kebijakan Privasi</a>
                    <a href="#" class="text-white">Syarat dan Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Form validation
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault()
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                })
            })
        })
    </script>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="auth-image">
                                <img src="{{ asset('assets/img/auth-bg.jpg') }}" alt="Login" class="img-fluid">
                                <div class="auth-overlay">
                                    <h4 class="text-white mb-3">Selamat Datang Kembali!</h4>
                                    <p class="text-white-50">Masuk untuk mengakses layanan STN Multimedia</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-4 p-lg-5">
                                <div class="text-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <h4 class="text-center mb-4">Masuk ke Akun Anda</h4>
                                <form id="loginForm" class="needs-validation" novalidate>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="loginEmail"
                                            placeholder="name@example.com" required>
                                        <label for="loginEmail">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="loginPassword"
                                            placeholder="Password" required>
                                        <label for="loginPassword">Password</label>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                                        </div>
                                        <a href="#" class="text-primary">Lupa Password?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Masuk</button>
                                    <p class="text-center mb-0">Belum punya akun? <a href="#" class="text-primary"
                                            data-bs-toggle="modal" data-bs-target="#registerModal"
                                            data-bs-dismiss="modal">Daftar</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="auth-image">
                                <img src="{{ asset('assets/img/auth-bg.jpg') }}" alt="Register" class="img-fluid">
                                <div class="auth-overlay">
                                    <h4 class="text-white mb-3">Bergabung Bersama Kami!</h4>
                                    <p class="text-white-50">Daftar untuk mendapatkan akses ke layanan premium</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-4 p-lg-5">
                                <div class="text-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <h4 class="text-center mb-4">Buat Akun Baru</h4>
                                <form id="registerForm" class="needs-validation" novalidate>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="registerName"
                                            placeholder="Nama Lengkap" required>
                                        <label for="registerName">Nama Lengkap</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="registerEmail"
                                            placeholder="name@example.com" required>
                                        <label for="registerEmail">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="registerPhone"
                                            placeholder="Nomor Telepon" required>
                                        <label for="registerPhone">Nomor Telepon</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="registerPassword"
                                            placeholder="Password" required>
                                        <label for="registerPassword">Password</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" id="registerConfirmPassword"
                                            placeholder="Konfirmasi Password" required>
                                        <label for="registerConfirmPassword">Konfirmasi Password</label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                        <label class="form-check-label" for="termsCheck">
                                            Saya setuju dengan <a href="#" class="text-primary">Syarat dan Ketentuan</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Daftar</button>
                                    <p class="text-center mb-0">Sudah punya akun? <a href="#" class="text-primary"
                                            data-bs-toggle="modal" data-bs-target="#loginModal"
                                            data-bs-dismiss="modal">Masuk</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add this to your existing script section
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            // Password confirmation validation
            const registerForm = document.getElementById('registerForm');
            if (registerForm) {
                registerForm.addEventListener('submit', function(event) {
                    const password = document.getElementById('registerPassword');
                    const confirmPassword = document.getElementById('registerConfirmPassword');
                    
                    if (password.value !== confirmPassword.value) {
                        event.preventDefault();
                        confirmPassword.setCustomValidity('Password tidak cocok');
                    } else {
                        confirmPassword.setCustomValidity('');
                    }
                });
            }
        });
    </script>

    <script>
        // Add this to your existing script section
        document.addEventListener('DOMContentLoaded', function() {
            // Check login state
            const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
            const guestMenu = document.querySelectorAll('.guest-menu');
            const userMenu = document.querySelector('.user-menu');
            const userName = document.querySelector('.user-name');
            const profileName = document.querySelector('.profile-name');

            function updateUI() {
                if (isLoggedIn) {
                    guestMenu.forEach(menu => menu.style.display = 'none');
                    userMenu.style.display = 'block';
                    const storedName = localStorage.getItem('userName') || 'User Name';
                    userName.textContent = storedName;
                    profileName.textContent = storedName;
                } else {
                    guestMenu.forEach(menu => menu.style.display = 'block');
                    userMenu.style.display = 'none';
                }
            }

            // Initial UI update
            updateUI();

            // Login form submission
            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                loginForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    // Simulate successful login
                    localStorage.setItem('isLoggedIn', 'true');
                    localStorage.setItem('userName', 'John Doe'); // Replace with actual user name
                    updateUI();
                    
                    // Close login modal
                    const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                    loginModal.hide();
                });
            }

            // Logout functionality
            const logoutBtn = document.getElementById('logoutBtn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(event) {
                    event.preventDefault();
                    localStorage.removeItem('isLoggedIn');
                    localStorage.removeItem('userName');
                    updateUI();
                    
                    // Close profile modal
                    const profileModal = bootstrap.Modal.getInstance(document.getElementById('profileModal'));
                    profileModal.hide();
                });
            }

            // Register form submission
            const registerForm = document.getElementById('registerForm');
            if (registerForm) {
                registerForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    // Simulate successful registration
                    localStorage.setItem('isLoggedIn', 'true');
                    localStorage.setItem('userName', 'New User'); // Replace with actual user name
                    updateUI();
                    
                    // Close register modal
                    const registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
                    registerModal.hide();
                });
            }
        });
    </script>
</body>

</html>