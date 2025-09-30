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
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td><strong>#{{ $item->id }}</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->image)
                                            <img src="{{ asset('img/' . $item->image) }}" 
                                                 alt="{{ $item->name }}" class="product-image me-3">
                                        @else
                                            <div class="product-image me-3 bg-light d-flex align-items-center justify-content-center">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-1">{{ $item->name }}</h6>
                                            <small class="text-muted">Product ID: {{ $item->product_id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $item->description }}</small>
                                </td>
                                <td>
                                    @if($item->image)
                                        <small>{{ $item->image }}</small>
                                    @else
                                        <small class="text-muted">Sin imagen</small>
                                    @endif
                                </td>
                                <td>
                                    <div class="quantity-control">
                                        <button class="quantity-btn" data-id="{{ $item->id }}" data-action="decrease">-</button>
                                        <input type="number" class="quantity-input" value="{{ $item->quantity }}" min="1" data-id="{{ $item->id }}">
                                        <button class="quantity-btn" data-id="{{ $item->id }}" data-action="increase">+</button>
                                    </div>
                                </td>
                                <td class="price">${{ number_format($item->price, 2) }}</td>
                                <td class="subtotal">${{ number_format($item->subtotal, 2) }}</td>
                                <td>
                                    <button class="remove-btn" title="Eliminar producto" data-id="{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                            @if($cartItems->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="empty-cart">
                                        <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                                        <h4>Tu carrito está vacío</h4>
                                        <p class="text-muted">Agrega algunos productos para continuar</p>
                                        <a href="{{ url('/productos') }}" class="btn btn-primary">
                                            <i class="fas fa-store me-2"></i>Ir a Productos
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                @if(!$cartItems->isEmpty())
                <!-- Resumen del Carrito -->
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-md-6">
                            @php
                                $subtotal = $cartItems->sum('subtotal');
                                $shipping = 2.99;
                                $tax = $subtotal * 0.08; // 8% tax
                                $total = $subtotal + $shipping + $tax;
                            @endphp
                            <div class="summary-row">
                                <span>Subtotal:</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="summary-row">
                                <span>Envío:</span>
                                <span>${{ number_format($shipping, 2) }}</span>
                            </div>
                            <div class="summary-row">
                                <span>Impuestos (8%):</span>
                                <span>${{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="summary-row total-row">
                                <span>Total:</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                            
                            <button class="btn btn-checkout">
                                <i class="fas fa-credit-card me-2"></i>Proceder al Pago
                            </button>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ url('/productos') }}" class="btn btn-outline-primary me-2">
                                <i class="fas fa-arrow-left me-2"></i>Seguir Comprando
                            </a>
                            <button class="btn btn-outline-danger" id="clearCart">
                                <i class="fas fa-trash me-2"></i>Vaciar Carrito
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>