<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil - C.Store</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> 
        :root {
            --primary-color: #ff6b35;
            --secondary-color: #2EC4B6;
            --accent-color: #FF9F1C;
            --dark-color: #2D3047;
            --light-color: #F8F9FA;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        .navbar {
            background-color: var(--dark-color);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--light-color) !important;
        }
        
        .profile-hero {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            text-align: center;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            background: linear-gradient(45deg, var(--secondary-color), var(--dark-color));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: white;
        }
        
        .profile-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .profile-card-header {
            background: var(--dark-color);
            color: white;
            padding: 20px;
            font-weight: 600;
        }
        
        .profile-info-item {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: between;
            align-items: center;
        }
        
        .profile-info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--dark-color);
            min-width: 120px;
        }
        
        .info-value {
            color: #666;
        }
        
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-top: 4px solid var(--primary-color);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 5px;
        }
        
        .stats-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        .btn-edit {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }
        
        .btn-edit:hover {
            background: #1ba89c;
            border-color: #1ba89c;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 25px;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .section-title:after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            margin-top: 10px;
        }
        
        .recent-activity {
            list-style: none;
            padding: 0;
        }
        
        .activity-item {
            padding: 15px;
            border-left: 3px solid var(--secondary-color);
            background: white;
            margin-bottom: 10px;
            border-radius: 0 8px 8px 0;
        }
        
        .activity-time {
            color: #888;
            font-size: 0.85rem;
        }

        .auth-status-banner {
        width: 100%;
        padding: 12px 0;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        position: relative;
        z-index: 1030; /* Above navbar */
        }

        .auth-success {
            background: linear-gradient(135deg, var(--secondary-color), #1ba89c);
            color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(46, 196, 182, 0.3);
        }

        .auth-warning {
            background: linear-gradient(135deg, var(--accent-color), #e68a00);
            color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(255, 159, 28, 0.3);
        }

        .auth-link {
            color: white;
            text-decoration: underline;
            font-weight: 700;
            margin-left: 5px;
            transition: color 0.3s;
        }

        .auth-link:hover {
            color: var(--dark-color);
        }

        /* Optional: Add animation */
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .auth-status-banner {
            animation: slideDown 0.5s ease-out;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-store me-2"></i>C Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pedidos') }}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/carrito') }}">Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/perfil') }}">Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Auth Status Banner -->
    <div class="auth-status-banner">
        @auth
            <div class="auth-success">
                <i class="fas fa-check-circle me-2"></i>
                ¡Bienvenido de vuelta, {{ auth()->user()->name }}!
            </div>

            <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-store me-2"></i>C Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pedidos') }}">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/perfil') }}">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="border: none; background: none;">
                                <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Hero Section -->
    <div class="profile-hero">
        <div class="container">
            <div class="profile-avatar">
                <i class="fas fa-user "></i>
            </div>
            <h1 class="display-5 fw-bold">Perfil de {{ auth()->user()->name}}</h1>
            <p class="lead">Miembro de C.Store desde {{ auth()->user()->created_at->format('F Y') }}</p>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="container">
        <div class="row">
            <!-- Left Column - User Info -->
            <div class="col-lg-8">
                <!-- Personal Information Card -->
                <div class="profile-card">
                    <div class="profile-card-header">
                        <i class="fas fa-user-circle me-2"></i>Información Personal
                    </div>
                    <div class="card-body p-0">
                        <div class="profile-info-item">
                            <span class="info-label">Nombre:</span>
                            <span class="info-value">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="profile-info-item">
                            <span class="info-label">Email:</span>
                            <span class="info-value">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="profile-info-item">
                            <span class="info-label">Miembro desde:</span>
                            <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="profile-info-item">
                            <span class="info-label">Última actualización:</span>
                            <span class="info-value">{{ auth()->user()->updated_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="profile-card mt-4">
                    <div class="profile-card-header">
                        <i class="fas fa-history me-2"></i>Actividad Reciente
                    </div>
                    <div class="card-body">
                        <ul class="recent-activity">
                            <li class="activity-item">
                                <div class="fw-semibold">Sesión iniciada</div>
                                <div class="activity-time">Hoy a las {{ now()->format('H:i') }}</div>
                            </li>
                            <li class="activity-item">
                                <div class="fw-semibold">Perfil visitado</div>
                                <div class="activity-time">Última vez: {{ now()->subDays(2)->format('d/m/Y') }}</div>
                            </li>
                            <li class="activity-item">
                                <div class="fw-semibold">Configuración actualizada</div>
                                <div class="activity-time">Hace 1 semana</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column - Stats & Actions -->
            <div class="col-lg-4">
                <!-- Quick Stats -->
                <div class="stats-card mb-4">
                    <div class="stats-number">0</div>
                    <div class="stats-label">Pedidos Realizados</div>
                </div>
                
                <div class="stats-card mb-4">
                    <div class="stats-number">0</div>
                    <div class="stats-label">Productos en carrito</div>
                </div>
                

                <!-- Quick Actions -->
                <div class="profile-card">
                    <div class="profile-card-header">
                        <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-edit">
                                <i class="fas fa-edit me-2"></i>Editar Perfil
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-shopping-bag me-2"></i>Mis Pedidos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @else
            <div class="auth-warning">
                <i class="fas fa-exclamation-circle me-2"></i>
                No has iniciado sesión. <a href="{{ url('/login') }}" class="auth-link">Inicia sesión aquí</a>
            </div>
        @endauth
    </div>

    <!-- Navigation -->
    

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>C. Store</h5>
                    <p>Tu tienda de conveniencia de barrio para todas tus necesidades diarias.</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <p class="text-center mb-0">© 2024 C. Store. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>