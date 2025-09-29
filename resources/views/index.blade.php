<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C. Store - Pasillos de Tienda de Conveniencia</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
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
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1607083206968-13611e3d76db?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
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
        
        .aisle-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .aisle-card:hover {
            transform: translateY(-5px);
        }
        
        .aisle-card .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .aisle-card .card-body {
            background: white;
        }
        
        .badge {
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 20px;
        }
        
        .mission-vision {
            background-color: var(--light-color);
            padding: 60px 0;
        }
        
        .team-member {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .team-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 5px solid var(--light-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 40px 0;
        }
        
        .social-icons a {
            color: white;
            font-size: 24px;
            margin-right: 15px;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .store-hours {
            background: var(--secondary-color);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .promo-banner {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
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
  
   <!-- Authentication Status Banner -->
<div class="auth-status-banner">
    @auth
        <div class="auth-success">
            <i class="fas fa-check-circle me-2"></i>
            ¡Bienvenido de vuelta, {{ auth()->user()->name }}!
        </div>
    @else
        <div class="auth-warning">
            <i class="fas fa-exclamation-circle me-2"></i>
            No has iniciado sesión. <a href="{{ url('/login') }}" class="auth-link">Inicia sesión aquí</a>
        </div>
    @endauth
</div>

<!-- Your existing navbar -->
    <!-- Navegación -->
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

    <!-- Sección Hero -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">C. Store</h1>
            <p class="lead">Tu tienda de conveniencia de barrio con todo lo que necesitas</p>
            <a href="#pasillos" class="btn btn-primary btn-lg mt-3">Explora Nuestros Pasillos</a>
        </div>
    </div>

    <!-- Información de la Tienda -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="promo-banner">
                    <h4><i class="fas fa-tag me-2"></i>Oferta de la Semana: Compra 2 y Lleva 1 Gratis en Snacks</h4>
                    <p class="mb-0">Oferta válida hasta el domingo</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="store-hours">
                    <h4><i class="fas fa-clock me-2"></i>Horario de Atención</h4>
                    <p class="mb-1">Lunes-Viernes: 7:30 AM - 9:00 PM</p>
                    <p class="mb-1">Sábado: 7:00 AM - 12:00 AM</p>
                    <p class="mb-0">Domingo: 7:00 AM - 10:00 AM</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="store-hours" style="background: var(--dark-color);">
                    <h4><i class="fas fa-map-marker-alt me-2"></i>Ubicación</h4>
                    <p class="mb-1">Calle Principal 123</p>
                    <p class="mb-1">Ciudad, CP 12345</p>
                    <p class="mb-0">Teléfono: (555) 123-4567</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Exhibición de Pasillos -->
    <section id="pasillos" class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Explora Nuestros Pasillos</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="aisle-card card">
                        <span class="category-badge">Snacks</span>
                        <img src="{{ asset('img/snacks.jpg') }}" class="card-img-top" alt="Pasillo de Snacks">
                        <div class="card-body">
                            <h5 class="card-title">Snacks</h5>
                            <p class="card-text">Encuentra todos tus snacks favoritos, papas fritas y pretzels en este pasillo. Perfectos para fiestas o para picar.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary">Explorar</a>
                                <span class="badge bg-success">Popular</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="aisle-card card">
                        <span class="category-badge">Bebidas</span>
                        <img src="{{ asset('img/beverage.jpg') }}" class="card-img-top" alt="Pasillo de Bebidas">
                        <div class="card-body">
                            <h5 class="card-title">Bebidas</h5>
                            <p class="card-text">Refréscate con nuestra amplia selección de refrescos, jugos, agua y bebidas energéticas. También tenemos sección fría.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary">Explorar</a>
                                <span class="badge bg-info">Nuevos Productos</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="aisle-card card">
                        <span class="category-badge">Congelados</span>
                        <img src="{{ asset('img/frozen-foods.jpg') }}" class="card-img-top" alt="Alimentos Congelados">
                        <div class="card-body">
                            <h5 class="card-title">Alimentos Congelados</h5>
                            <p class="card-text">Desde helados hasta cenas congeladas, tenemos todo lo que necesitas para una comida rápida y fácil.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-primary">Explorar</a>
                                <span class="badge bg-warning text-dark">Oferta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="aisle-card card">
                        <span class="category-badge">Lácteos</span>
                        <img src="{{ asset('img/lacteos.jpg') }}" class="card-img-top" alt="Productos Lácteos">
                        <div class="card-body">
                            <h5 class="card-title">Lácteos y Huevos</h5>
                            <p class="card-text">Leche fresca, queso, yogur y huevos. Abastecemos de granjas locales para los productos más frescos.</p>
                            <a href="#" class="btn btn-primary">Explorar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="aisle-card card">
                        <span class="category-badge">Panadería</span>
                        <img src="{{ asset('img/bake.jpg') }}" class="card-img-top" alt="Productos de Panadería">
                        <div class="card-body">
                            <h5 class="card-title">Panadería</h5>
                            <p class="card-text">Pan fresco, pasteles y postres entregados diariamente. ¡No te pierdas nuestras famosas galletas con chispas de chocolate!</p>
                            <a href="#" class="btn btn-primary">Explorar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="aisle-card card">
                        <span class="category-badge">Hogar</span>
                        <img src="{{ asset('img/essentials.jpg') }}" class="card-img-top" alt="Productos para el Hogar">
                        <div class="card-body">
                            <h5 class="card-title">Productos para el Hogar</h5>
                            <p class="card-text">Desde productos de limpieza hasta artículos de tocador básicos, tenemos todos los esenciales que necesitas para tu hogar.</p>
                            <a href="#" class="btn btn-primary">Explorar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión y Visión -->
    <section class="mission-vision">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">Nuestra Misión</h2>
                    <p>En C. Store, nuestra misión es proporcionar a nuestra comunidad una experiencia de compra conveniente que ofrezca productos de calidad a precios justos. Nos esforzamos por ser tu tienda de barrio para artículos esenciales cotidianos y necesidades de último momento.</p>
                    <p>Estamos comprometidos a apoyar a proveedores locales y a brindar un servicio amable y eficiente a todos nuestros clientes.</p>
                </div>
                <div class="col-md-6">
                    <h2 class="section-title">Nuestra Visión</h2>
                    <p>Visualizamos una comunidad donde todos tengan acceso a artículos de conveniencia frescos y asequibles a poca distancia de su hogar. Nuestro objetivo es ser el rostro amable en el barrio en el que siempre puedas contar.</p>
                    <p>A medida que crecemos, planeamos incorporar más prácticas ecológicas y expandir nuestra selección de opciones saludables y orgánicas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Miembros del Equipo -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Conoce a Nuestro Equipo</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Gerente de Tienda" class="team-img">
                        <h4>Belen Ferrera</h4>
                        <p class="text-muted">Gerente de Tienda</p>
                        <p>Con más de 10 años en gestión minorista, María asegura que nuestra tienda funcione sin problemas y que nuestros clientes siempre estén satisfechos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Subgerente" class="team-img">
                        <h4>Dereck Leon</h4>
                        <p class="text-muted">Subgerente</p>
                        <p>James se encarga del inventario y las relaciones con los proveedores, asegurándose de que siempre estemos surtidos con tus productos favoritos.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Cajera Principal" class="team-img">
                        <h4>Brenda Serrano</h4>
                        <p class="text-muted">Cajera Principal</p>
                        <p>Es probable que veas a Sarah en la caja con una sonrisa. Lleva 5 años con nosotros y conoce a todos nuestros clientes habituales por su nombre.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Visítanos</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Información de la Tienda</h5>
                            <p><i class="fas fa-map-marker-alt me-2"></i> Calle Principal 123, Ciudad, CP 12345</p>
                            <p><i class="fas fa-phone me-2"></i> (555) 123-4567</p>
                            <p><i class="fas fa-envelope me-2"></i> info@cstore.com</p>
                            <div class="mt-4">
                                <h6>Horario de Atención:</h6>
                                <p class="mb-1">Lunes-Viernes: 6:00 AM - 11:00 PM</p>
                                <p class="mb-1">Sábado: 7:00 AM - 11:00 PM</p>
                                <p class="mb-0">Domingo: 7:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Envíanos un Mensaje</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="mensaje" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pie de Página -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>C. Store</h5>
                    <p>Tu tienda de conveniencia de barrio para todas tus necesidades diarias. Productos de calidad, servicio amable y horarios convenientes.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white">Inicio</a></li>
                        <li><a href="#pasillos" class="text-white">Pasillos</a></li>
                        <li><a href="#" class="text-white">Ofertas Semanales</a></li>
                        <li><a href="#" class="text-white">Contáctanos</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Conéctate con Nosotros</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="mt-3">
                        <p class="mb-0">¡Suscríbete a nuestro boletín para recibir actualizaciones y ofertas especiales!</p>
                    </div>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <p class="text-center mb-0">© 2023 C. Store. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>