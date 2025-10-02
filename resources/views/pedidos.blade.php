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
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1000px;
        }
        
        .header-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border: none;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .pedido-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border: none;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .pedido-header {
            background: linear-gradient(135deg, var(--dark-color), #3a3f5c);
            color: white;
            padding: 20px;
        }
        
        .pedido-body {
            padding: 30px;
        }
        
        .item-card {
            background: var(--light-color);
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        
        .item-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .producto-info {
            width: 100%;
        }
        
        .producto-nombre {
            font-size: 1.2em;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .producto-detalles {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        
        .producto-precio {
            font-size: 1.3em;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .total-section {
            background-color: var(--light-color);
            padding: 20px;
            border-radius: 10px;
            margin-top: 25px;
            border-top: 4px solid var(--primary-color);
        }
        
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 5em;
            margin-bottom: 25px;
            opacity: 0.5;
            color: var(--dark-color);
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .info-item {
            background: var(--light-color);
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border-left: 4px solid var(--secondary-color);
        }
        
        .info-label {
            font-size: 0.9em;
            color: #6c757d;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .info-value {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 1.1em;
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
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
            padding: 12px 25px;
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 1.1rem;
        }
        
        .total-row {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-color);
            border-top: 2px solid #ddd;
            padding-top: 15px;
            margin-top: 15px;
        }
        
        .price {
            font-weight: bold;
            color: var(--primary-color);
            font-size: 1.2rem;
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

    <div class="container py-4">
        <!-- Header -->
        <div class="header-card p-4 mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="h3 mb-2">
                        <i class="fas fa-shopping-bag me-2" style="color: var(--primary-color);"></i>
                        Historial de Pedidos
                    </h1>
                    <p class="text-muted mb-0">Revisa todos tus pedidos realizados</p>
                </div>
                <div class="col-md-4 text-end">
                    <a class="btn btn-primary" href="{{ url('/carrito') }}">
                        <i class="fas fa-plus me-2"></i>Nuevo Pedido
                    </a>
                </div>
            </div>
        </div>

        @auth
            @php
                // Solo obtener los pedidos del usuario autenticado
                $pedidos = \App\Models\Pedido::with('items')
                    ->where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();
            @endphp

            @if($pedidos->count() > 0)
                <!-- Lista de Pedidos -->
                <div class="row">
                    <div class="col-12">
                        @foreach($pedidos as $pedido)
                            <div class="pedido-card">
                                <div class="pedido-header">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <h4 class="mb-1">
                                                <i class="fas fa-receipt me-2"></i>
                                                Pedido #{{ str_pad(auth()->user()->pedidos()->count(), 6, '0', STR_PAD_LEFT) }}
                                            </h4>
                                            <small>
                                                <i class="far fa-calendar me-1"></i>
                                                {{ $pedido->created_at->format('d/m/Y \\a \\l\\a\\s H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="pedido-body">
                                    <!-- Información del pedido -->
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">Usuario</div>
                                            <div class="info-value">{{ auth()->user()->name }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Productos</div>
                                            <div class="info-value">{{ $pedido->items->count() }}</div>
                                        </div>
                                    </div>

                                    <!-- Items Section -->
                                    <h5 class="section-title">
                                        <i class="fas fa-boxes me-2"></i>
                                        Productos ({{ $pedido->items->count() }})
                                    </h5>
                                    
                                    @if($pedido->items->count() > 0)
                                        <div class="row">
                                            @foreach($pedido->items as $item)
                                                <div class="col-12 mb-3">
                                                    <div class="item-card">
                                                        <div class="producto-info">
                                                            <div class="producto-nombre">{{ $item->product_name }}</div>
                                                            <p class="producto-descripcion">
                                                                {{ $item->product_description ?? 'Descripción no disponible' }}
                                                            </p>
                                                            <div class="producto-detalles">
                                                                <div class="detalles-izquierda">
                                                                    <span class="text-muted"><strong>Cantidad:</strong> {{ $item->quantity }}</span>
                                                                    <span class="text-muted"><strong>Precio:</strong> <span class="price">${{ number_format($item->price, 2) }}</span></span>
                                                                </div>
                                                                <div class="producto-precio">
                                                                    ${{ number_format($item->subtotal, 2) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            No se encontraron productos para este pedido.
                                        </div>
                                    @endif

                                    <!-- Totales Section -->
                                    <div class="row mt-4 pt-4 border-top">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="total-section">
                                                <div class="summary-row">
                                                    <span>Subtotal:</span>
                                                    <span>${{ number_format($pedido->SubTotal, 2) }}</span>
                                                </div>
                                                <div class="summary-row">
                                                    <span>Envío:</span>
                                                    <span>${{ number_format($pedido->Envio, 2) }}</span>
                                                </div>
                                                <div class="summary-row">
                                                    <span>Impuesto:</span>
                                                    <span>${{ number_format($pedido->Impuesto, 2) }}</span>
                                                </div>
                                                <hr>
                                                <div class="total-row">
                                                    <span>Total:</span>
                                                    <span style="color: var(--primary-color);">${{ number_format($pedido->Total, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Estado vacío -->
                <div class="header-card">
                    <div class="empty-state">
                        <i class="fas fa-shopping-bag"></i>
                        <h3 class="h4 mb-3">No hay pedidos registrados</h3>
                        <p class="text-muted mb-4">Aún no has realizado ningún pedido.</p>
                        <button class="btn btn-primary btn-lg">
                            <i class="fas fa-plus me-2"></i>Realizar Primer Pedido
                        </button>
                    </div>
                </div>
            @endif
        @else
            <!-- Usuario no autenticado -->
            <div class="header-card">
                <div class="empty-state">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3 class="h4 mb-3">Acceso no autorizado</h3>
                    <p class="text-muted mb-4">Debes iniciar sesión para ver tu historial de pedidos.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                    </a>
                </div>
            </div>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>