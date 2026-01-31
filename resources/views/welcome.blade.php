<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevPev - Docker Containers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0ea5e9;
            --secondary: #06b6d4;
            --accent: #14b8a6;
            --dark: #0f172a;
            --darker: #020617;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'JetBrains Mono', monospace;
            background: var(--darker);
            color: #e2e8f0;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        /* Animated grid background */
        .grid-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(14, 165, 233, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(14, 165, 233, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
            z-index: 0;
        }
        
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        /* Glowing orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            z-index: 1;
            animation: float 15s infinite ease-in-out;
        }
        
        .orb-1 {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }
        
        .orb-2 {
            width: 500px;
            height: 500px;
            background: var(--accent);
            bottom: -150px;
            right: -150px;
            animation-delay: 5s;
        }
        
        .orb-3 {
            width: 300px;
            height: 300px;
            background: var(--secondary);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 10s;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        
        /* Main container */
        .container {
            position: relative;
            z-index: 10;
            max-width: 900px;
            width: 90%;
            padding: 3rem;
        }
        
        /* Title styling */
        h1 {
            font-family: 'Bebas Neue', cursive;
            font-size: clamp(3rem, 10vw, 7rem);
            letter-spacing: 0.05em;
            background: linear-gradient(135deg, var(--primary), var(--secondary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 1rem;
            animation: titleFade 1s ease-out;
            line-height: 1.1;
            text-shadow: 0 0 80px rgba(14, 165, 233, 0.5);
        }
        
        @keyframes titleFade {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Subtitle */
        .subtitle {
            font-size: clamp(1.2rem, 3vw, 1.8rem);
            text-align: center;
            color: #94a3b8;
            margin-bottom: 3rem;
            animation: subtitleFade 1s ease-out 0.2s both;
            font-weight: 400;
            letter-spacing: 0.1em;
        }
        
        @keyframes subtitleFade {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Card container */
        .card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(14, 165, 233, 0.2);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            animation: cardSlide 1s ease-out 0.4s both;
            position: relative;
            overflow: hidden;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(14, 165, 233, 0.1), transparent);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        @keyframes cardSlide {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Content text */
        .content {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #cbd5e1;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        
        .content strong {
            color: var(--primary);
            font-weight: 700;
        }
        
        /* Docker icon effect */
        .docker-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            animation: iconBounce 1s ease-out 0.6s both;
            box-shadow: 0 10px 40px rgba(14, 165, 233, 0.4);
            position: relative;
        }
        
        .docker-icon::before {
            content: '🐳';
            animation: iconFloat 3s infinite ease-in-out;
        }
        
        @keyframes iconBounce {
            0% {
                opacity: 0;
                transform: scale(0.5) rotate(-10deg);
            }
            60% {
                transform: scale(1.1) rotate(5deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0);
            }
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        /* Button effects */
        .cta-button {
            display: inline-block;
            margin-top: 2rem;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 700;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.3);
            border: 2px solid transparent;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-size: 0.9rem;
            animation: buttonFade 1s ease-out 0.8s both;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(14, 165, 233, 0.5);
            border-color: rgba(255, 255, 255, 0.3);
        }
        
        @keyframes buttonFade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Code snippet styling */
        .code-snippet {
            background: rgba(2, 6, 23, 0.8);
            border: 1px solid rgba(14, 165, 233, 0.3);
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            color: var(--accent);
            text-align: left;
            overflow-x: auto;
            position: relative;
            animation: codeFade 1s ease-out 1s both;
        }
        
        .code-snippet::before {
            content: '$ ';
            color: var(--primary);
        }
        
        @keyframes codeFade {
            from {
                opacity: 0;
                transform: scaleY(0.8);
            }
            to {
                opacity: 1;
                transform: scaleY(1);
            }
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }
            
            .card {
                padding: 2rem 1.5rem;
            }
            
            .content {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="grid-background"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    
    <div class="container">
        <h1>DEVPEV</h1>
        <div class="subtitle">Docker Containers</div>
        
        <div class="card">
            <div class="docker-icon"></div>
            
            <div class="content">
                <p>
                    <strong>DevPev (MeetUp)</strong> - Docker Containers. 
                    Docker texnologiyasi yordamida ilovalaringizni tez va xavfsiz ishga tushiring.
                </p>
                
                <div class="code-snippet">
                    docker run -d -p 8080:80 devpev/app:latest
                </div>
                
                <p>
                    Mikroservislar arxitekturasi, avtomatlashtirilgan deploy va 
                    professional development muhiti - barchasi bir joyda.
                </p>
                
                <div style="text-align: center;">
                    <a href="#" class="cta-button">Boshlash</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const orbs = document.querySelectorAll('.orb');
            const moveX = (e.clientX - window.innerWidth / 2) / 50;
            const moveY = (e.clientY - window.innerHeight / 2) / 50;
            
            orbs.forEach((orb, index) => {
                const speed = (index + 1) * 0.5;
                orb.style.transform = `translate(${moveX * speed}px, ${moveY * speed}px)`;
            });
        });
        
        // Click effect on card
        const card = document.querySelector('.card');
        card.addEventListener('click', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.width = '5px';
            ripple.style.height = '5px';
            ripple.style.background = 'rgba(14, 165, 233, 0.6)';
            ripple.style.borderRadius = '50%';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.transform = 'translate(-50%, -50%)';
            ripple.style.animation = 'ripple 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            ripple.style.zIndex = '100';
            
            card.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
        
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    width: 100px;
                    height: 100px;
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>