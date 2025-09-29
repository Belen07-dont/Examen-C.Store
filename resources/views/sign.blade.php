<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Iniciar Sesión - C.Store</title>
    
</head>
<body>

<div class="hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card aisle-card border-0">
                    <div class="card-header bg-transparent border-0 text-center pt-4">
                        <h2 class="fw-bold" style="color: var(--dark-color);">
                            <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                        </h2>
                        <p class="text-muted">Bienvenido de vuelta a C.Store</p>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Success Message Display -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Error Message Display -->
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="/login" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input name="loginname" type="name" class="form-control border-start-0" id="name" placeholder="Tu Nombre de Usuario">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input name="loginpassword" type="password" class="form-control border-start-0" placeholder="Ingresa tu contraseña">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-semibold mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                            </button>
                        </form>
                        
                        <div class="text-center">
                            <p class="text-muted mb-0">¿No tienes cuenta? 
                                <a href="/login" class="text-primary text-decoration-none fw-semibold">Regístrate aquí</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>