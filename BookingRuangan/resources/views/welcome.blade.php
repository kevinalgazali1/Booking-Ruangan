<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomHub - Book Your Perfect Space</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #fff;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 60px;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-login {
            color: #fff;
            border-color: rgba(255, 255, 255, 0.3);
            background: transparent;
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .btn-register {
            background: #fff;
            color: #667eea;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            margin-bottom: 80px;
        }

        .hero h1 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hero p {
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-box {
            background: #fff;
            border-radius: 50px;
            padding: 8px;
            display: flex;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .search-box input {
            flex: 1;
            border: none;
            padding: 15px 25px;
            font-size: 16px;
            outline: none;
            background: transparent;
            color: #333;
        }

        .search-box input::placeholder {
            color: #999;
        }

        .search-box button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border: none;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-box button:hover {
            transform: scale(1.05);
        }

        /* Features Grid */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .feature-card p {
            opacity: 0.9;
            line-height: 1.6;
            font-size: 15px;
        }

        /* Room Types */
        .room-types {
            margin-bottom: 60px;
        }

        .section-title {
            text-align: center;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .room-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .room-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .room-image {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            position: relative;
            overflow: hidden;
        }

        .room-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .room-info {
            padding: 25px;
            color: #333;
        }

        .room-info h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #667eea;
        }

        .room-info p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .room-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .capacity {
            color: #999;
            font-size: 14px;
        }

        .price {
            font-size: 20px;
            font-weight: 700;
            color: #667eea;
        }

        /* Footer CTA */
        .cta {
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            margin-top: 60px;
        }

        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .btn-cta {
            background: #fff;
            color: #667eea;
            padding: 18px 50px;
            font-size: 18px;
            display: inline-block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 16px;
            }

            .section-title {
                font-size: 32px;
            }

            .search-box {
                flex-direction: column;
                gap: 10px;
            }

            .search-box button {
                width: 100%;
            }

            .nav-buttons {
                flex-direction: column;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero, .features, .room-types {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <div class="logo">
                <div class="logo-icon">🏢</div>
                <span>RoomHub</span>
            </div>
            <nav class="nav-buttons">
                <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <h1>Find Your Perfect Space</h1>
            <p>Book meeting rooms, event spaces, and collaborative workspaces with ease. Thousands of spaces available nationwide.</p>
        </section>

        <!-- Features -->
        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Instant Booking</h3>
                <p>Book your room in seconds with our streamlined process. No waiting, no hassle.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Flexible Options</h3>
                <p>Choose from hourly, daily, or monthly bookings to fit your schedule perfectly.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Best Prices</h3>
                <p>Competitive rates with transparent pricing. No hidden fees, ever.</p>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta">
            <h2>Ready to Book Your Space?</h2>
            <p>Join thousands of professionals who trust RoomHub for their workspace needs</p>
            <a href="{{ route('login') }}" class="btn btn-cta btn-register">Get Started Now</a>
        </section>
    </div>
</body>
</html>