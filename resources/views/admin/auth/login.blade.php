<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name') }}</title>
    
    <!-- Tailwind CSS -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group input:focus + .floating-label,
        .input-group input:not(:placeholder-shown) + .floating-label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #3b82f6;
        }
        
        .floating-label {
            position: absolute;
            left: 1rem;
            top: 1rem;
            color: #6b7280;
            pointer-events: none;
            transition: all 0.3s ease;
            background: white;
            padding: 0 0.25rem;
        }
        
        .login-card {
            transform: translateY(0);
            transition: all 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
        }
          .demo-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .demo-card h3, .demo-card h4 {
            color: #1f2937 !important;
        }
        
        .demo-card p {
            color: #374151 !important;
        }
        
        .demo-stats {
            color: #1f2937 !important;
        }
        
        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .slide-in {
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .floating-elements::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 10%;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-elements::after {
            content: '';
            position: absolute;
            bottom: 20%;
            right: 15%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-gradient:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden floating-elements">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>
    
    <div class="max-w-6xl w-full mx-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
        <!-- Kiri: Form Login -->
        <div class="glass-effect login-card rounded-3xl shadow-2xl p-8 lg:p-12 slide-in">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="relative mx-auto mb-6">
                    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto shadow-lg pulse-animation">
                        <i class="fas fa-shield-alt text-white text-3xl"></i>
                    </div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl blur opacity-30"></div>
                </div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-2">
                    Admin Portal
                </h1>
                <p class="text-gray-600 text-lg">Selamat datang di panel administrasi</p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-8">
                @csrf

                <!-- Email Field -->
                <div class="input-group">
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        autocomplete="email" 
                        required 
                        value="{{ old('email') }}"
                        placeholder=" "
                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm @error('email') border-red-400 @enderror"
                    >
                    <label for="email" class="floating-label">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                    </label>
                    @error('email')
                        <p class="mt-3 text-sm text-red-500 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <div class="relative">
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            autocomplete="current-password" 
                            required 
                            placeholder=" "
                            class="w-full px-4 py-4 pr-12 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm @error('password') border-red-400 @enderror"
                        >
                        <label for="password" class="floating-label">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                        </label>
                        <button 
                            type="button" 
                            onclick="togglePassword()" 
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500 transition-colors duration-200"
                        >
                            <i id="password-icon" class="fas fa-eye text-lg"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-3 text-sm text-red-500 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer">
                        <input 
                            id="remember" 
                            name="remember" 
                            type="checkbox" 
                            class="sr-only"
                        >
                        <div class="relative">
                            <div class="w-6 h-6 bg-gray-200 rounded border-2 border-gray-300 transition-all duration-200"></div>
                            <div class="absolute inset-0 w-6 h-6 bg-blue-500 rounded border-2 border-blue-500 opacity-0 transform scale-95 transition-all duration-200"></div>
                            <i class="fas fa-check absolute inset-0 w-6 h-6 text-white text-xs flex items-center justify-center opacity-0 transition-all duration-200"></i>
                        </div>
                        <span class="ml-3 text-gray-700 font-medium">Ingat saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button 
                        type="submit" 
                        class="w-full btn-gradient text-white py-4 px-6 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500/50"
                    >
                        <i class="fas fa-sign-in-alt mr-3"></i>Masuk ke Dashboard
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500 flex items-center justify-center">
                    <i class="fas fa-shield-check mr-2 text-green-500"></i>
                    Akses aman & terenkripsi
                </p>
            </div>
        </div>

        <!-- Kanan: Info & Demo -->
        <div class="space-y-8">            <!-- Welcome Card -->
            <div class="demo-card rounded-3xl shadow-xl p-8 text-center">
                <div class="mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-rocket text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang!</h3>
                    <p class="text-gray-700 leading-relaxed font-medium">
                        Panel administrasi untuk mengelola konten website, pengaturan, dan data bisnis Anda dengan mudah dan efisien.
                    </p>
                </div>
                
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="p-3">
                        <div class="text-2xl font-bold text-blue-600 demo-stats">100+</div>
                        <div class="text-xs text-gray-700 font-semibold">Fitur</div>
                    </div>
                    <div class="p-3">
                        <div class="text-2xl font-bold text-purple-600 demo-stats">24/7</div>
                        <div class="text-xs text-gray-700 font-semibold">Support</div>
                    </div>
                    <div class="p-3">
                        <div class="text-2xl font-bold text-pink-600 demo-stats">99%</div>
                        <div class="text-xs text-gray-700 font-semibold">Uptime</div>
                    </div>
                </div>
            </div>

            <!-- Demo Account Card -->
            <div class="demo-card rounded-3xl shadow-xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-user-cog text-white text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-gray-900">Akun Demo</h4>
                        <p class="text-gray-700 text-sm font-medium">Coba fitur admin tanpa registrasi</p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-white/70 rounded-xl p-4 border border-gray-300">
                        <div class="text-sm text-gray-700 mb-1 font-semibold">Email:</div>
                        <div class="font-mono text-blue-700 font-bold select-all" id="demo-email">{{ $demoEmail }}</div>
                    </div>
                    
                    <div class="bg-white/70 rounded-xl p-4 border border-gray-300">
                        <div class="text-sm text-gray-700 mb-1 font-semibold">Password:</div>
                        <div class="font-mono text-blue-700 font-bold select-all" id="demo-password">password123</div>
                    </div>
                    
                    <button 
                        type="button" 
                        onclick="fillDemoAccount()" 
                        class="w-full bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white py-3 px-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300"
                    >
                        <i class="fas fa-magic mr-2"></i>Gunakan Akun Demo
                    </button>
                </div>
                
                <div class="mt-6 p-4 bg-yellow-100 border border-yellow-300 rounded-xl">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-yellow-700 mt-1 mr-3"></i>
                        <div class="text-sm text-yellow-900">
                            <strong>Tip:</strong> Klik tombol di atas untuk mengisi form login secara otomatis dengan akun demo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    <script>
        // Demo account functionality
        function fillDemoAccount() {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const demoEmail = document.getElementById('demo-email').innerText;
            
            emailInput.value = demoEmail;
            passwordInput.value = 'password123';
            
            // Trigger floating label animation
            emailInput.dispatchEvent(new Event('input'));
            passwordInput.dispatchEvent(new Event('input'));
            
            // Focus on submit button
            document.querySelector('button[type="submit"]').focus();
            
            // Show success feedback
            showNotification('Akun demo berhasil diisi!', 'success');
        }
        
        // Password visibility toggle
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('password-icon');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Custom checkbox styling
        function initCustomCheckbox() {
            const checkbox = document.getElementById('remember');
            const checkboxContainer = checkbox.parentElement;
            
            checkbox.addEventListener('change', function() {
                const bgDiv = checkboxContainer.querySelector('div > div:nth-child(2)');
                const checkIcon = checkboxContainer.querySelector('i');
                
                if (this.checked) {
                    bgDiv.style.opacity = '1';
                    bgDiv.style.transform = 'scale(1)';
                    checkIcon.style.opacity = '1';
                } else {
                    bgDiv.style.opacity = '0';
                    bgDiv.style.transform = 'scale(0.95)';
                    checkIcon.style.opacity = '0';
                }
            });
        }
        
        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white font-medium z-50 transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500' : 
                type === 'error' ? 'bg-red-500' : 'bg-blue-500'
            }`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'}-circle mr-2"></i>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Slide in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Slide out and remove
            setTimeout(() => {
                notification.style.transform = 'translateX(full)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        // Form validation enhancements
        function initFormValidation() {
            const form = document.querySelector('form');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            // Real-time email validation
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const isValid = emailRegex.test(this.value);
                
                if (this.value && !isValid) {
                    this.classList.add('border-red-400');
                    this.classList.remove('border-gray-200');
                } else {
                    this.classList.remove('border-red-400');
                    this.classList.add('border-gray-200');
                }
            });
            
            // Enhanced form submission
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Sedang masuk...';
                submitBtn.disabled = true;
            });
        }
        
        // Keyboard shortcuts
        function initKeyboardShortcuts() {
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + D to fill demo account
                if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
                    e.preventDefault();
                    fillDemoAccount();
                }
                
                // Enter on demo card to fill account
                if (e.target.closest('.demo-card') && e.key === 'Enter') {
                    fillDemoAccount();
                }
            });
        }
        
        // Smooth animations
        function initAnimations() {
            // Stagger animation for cards
            const cards = document.querySelectorAll('.demo-card, .login-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.2}s`;
            });
            
            // Pulse animation for icons
            const icons = document.querySelectorAll('.pulse-animation');
            icons.forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.animationDuration = '0.5s';
                });
                
                icon.addEventListener('mouseleave', function() {
                    this.style.animationDuration = '2s';
                });
            });
        }
        
        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-focus email field
            document.getElementById('email').focus();
            
            // Initialize all features
            initCustomCheckbox();
            initFormValidation();
            initKeyboardShortcuts();
            initAnimations();
            
            // Show welcome message
            setTimeout(() => {
                showNotification('Selamat datang di Admin Portal! Tekan Ctrl+D untuk akun demo.', 'info');
            }, 1000);
        });
    </script>
</body>
</html>
