<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - C.Store</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="cart-container">
                    <!-- Header del Carrito -->
                    <div class="cart-header">
                        <h2 class="mb-0">
                            <i class="fas fa-shopping-cart me-2"></i>Mi Carrito de Compras
                        </h2>
                    </div>

                    <!-- Tabla del Carrito -->
                    <div class="table-responsive">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Ejemplo de producto en el carrito -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                 alt="Snacks Variados" class="product-image me-3">
                                            <div>
                                                <h6 class="mb-1">Snacks Variados</h6>
                                                <small class="text-muted">Mezcla de snacks y papas fritas</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price">$5.99</td>
                                    <td>
                                        <div class="quantity-control">
                                            <button class="quantity-btn">-</button>
                                            <input type="number" class="quantity-input" value="2" min="1">
                                            <button class="quantity-btn">+</button>
                                        </div>
                                    </td>
                                    <td class="subtotal">$11.98</td>
                                    <td>
                                        <button class="remove-btn" title="Eliminar producto">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Segundo producto de ejemplo -->
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://images.unsplash.com/photo-1622483767028-3f66f32aef97?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                                                 alt="Refrescos" class="product-image me-3">
                                            <div>
                                                <h6 class="mb-1">Refrescos Variados</h6>
                                                <small class="text-muted">Pack de 6 bebidas diferentes</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price">$8.50</td>
                                    <td>
                                        <div class="quantity-control">
                                            <button class="quantity-btn">-</button>
                                            <input type="number" class="quantity-input" value="1" min="1">
                                            <button class="quantity-btn">+</button>
                                        </div>
                                    </td>
                                    <td class="subtotal">$8.50</td>
                                    <td>
                                        <button class="remove-btn" title="Eliminar producto">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Resumen del Carrito -->
                    <div class="cart-summary">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="summary-row">
                                    <span>Subtotal:</span>
                                    <span>$20.48</span>
                                </div>
                                <div class="summary-row">
                                    <span>Envío:</span>
                                    <span>$2.99</span>
                                </div>
                                <div class="summary-row">
                                    <span>Impuestos:</span>
                                    <span>$1.84</span>
                                </div>
                                <div class="summary-row total-row">
                                    <span>Total:</span>
                                    <span>$25.31</span>
                                </div>
                                
                                <button class="btn btn-checkout">
                                    <i class="fas fa-credit-card me-2"></i>Proceder al Pago
                                </button>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ url('/productos') }}" class="btn btn-outline-primary me-2">
                                    <i class="fas fa-arrow-left me-2"></i>Seguir Comprando
                                </a>
                                <button class="btn btn-outline-danger">
                                    <i class="fas fa-trash me-2"></i>Vaciar Carrito
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estado del Carrito Vacío (comentado) -->
    <!--
    <div class="container my-5">
        <div class="empty-cart">
            <i class="fas fa-shopping-cart"></i>
            <h3>Tu carrito está vacío</h3>
            <p>¡Descubre nuestros productos y añade algunos a tu carrito!</p>
            <a href="{{ url('/productos') }}" class="btn btn-primary mt-3">
                <i class="fas fa-store me-2"></i>Ir a Productos
            </a>
        </div>
    </div>
    -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>