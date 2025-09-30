<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - C.Store</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- In your main layout file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link active" href="{{ url('/index') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Productos</a>
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
    @auth
        @if(auth()->id() === 8) {{-- Replace 8 with your specific user ID --}}
            <div class="form-container">
        <div class="form-header">
            <h2><i class="fas fa-plus-circle me-2"></i>Agregar Nuevo Producto</h2>
            <p>Completa la información del producto que deseas agregar al catálogo</p>
        </div>
        
        <!-- Form Body -->
        <div class="form-body">
            <form action="/create-product" method="POST">
                @csrf
                
                <!-- Información Básica del Producto -->
                <div class="form-section">
                    <h4 class="section-title">Información del Producto</h4>
                    
                    <!-- Product Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label">Nombre del Producto</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </span>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Ej: Snacks Variados, Refrescos, etc." required>
                        </div>
                    </div>
                    
                    <!-- Product Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label">Descripción</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-align-left"></i>
                            </span>
                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Describe el producto en detalle..." required></textarea>
                        </div>
                    </div>
                    
                   <div class="mb-4">
                        <label for="category" class="form-label">Categoría</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-list"></i>
                            </span>
                            <select name="category" class="form-control" id="category" required>
                                <option value="" disabled selected>Selecciona una categoría</option>
                                <option value="Snacks">Snacks</option>
                                <option value="Bebidas">Bebidas</option>
                                <option value="Congelados">Congelados</option>
                                <option value="Lácteos">Lácteos</option>
                                <option value="Panadería">Panadería</option>
                            </select>
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div class="mb-4">
                        <label for="image" class="form-label">Imagen del Producto</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-image"></i>
                            </span>
                            <input name="image" type="file" class="form-control" id="image" placeholder="https://ejemplo.com/imagen.jpg">
                        </div>
                        <div class="form-text">Opcional - Puedes pegar la URL de una imagen del producto</div>
                    </div>
                </div>
                
                <!-- Precio -->
                <div class="form-section">
                    <h4 class="section-title">Precio</h4>
                    
                    <!-- Price -->
                    <div class="mb-4">
                        <label for="price" class="form-label">Precio ($)</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                            <input name="price" type="number" class="form-control" id="price" step="0.01" min="0" placeholder="0.00" required>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save me-2"></i>Guardar Producto
                </button>
            </form>
        </div>
            </div>
            </div>
        @else
        <div class="form-container" style="margin: 2.5rem; ">
        <div class="form-header" style="">
            <h2>Nuestros Productos</h2>
            <p>Explora nuestra amplia selección organizada por categorías</p>
        </div>    
        <div class="form-body" style=" background-color: #5d607c;">
            @if(isset($productsByCategory) && $productsByCategory->count())
                @foreach($productsByCategory as $category => $products)
                <div class="category-section">
                    <h2 style="color: white;" class="category-title">{{ $category ?: 'Sin Categoría' }}</h2>
                    <div class="products-grid">
                        @foreach($products as $product)
                            <div class="product-card">
                                <div class="product-image-container">
                                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                                    <span class="category-badge">{{ $category }}</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                    <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                                    <div class="product-footer">
                                        <p class="price">${{ number_format($product->price, 2) }}</p>
                                         <button class="btn btn-primary btn-sm add-to-cart-btn"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#addToCartModal"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->name }}"
                                                data-product-price="{{ $product->price }}"
                                                data-product-image="{{ asset('storage/' . $product->image) }}">
                                            <i class="fas fa-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img id="modalProductImage" src="" alt="" class="img-fluid mb-3" style="max-height: 150px;">
                                            <h4 id="modalProductName"></h4>
                                            <p class="price" id="modalProductPrice"></p>
                                        </div>
                                        <form action="{{route('cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" id="modalProductId">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Quantity:</label>
                                                <input type="number" name="quantity" class="form-control" value="1" min="1">
                                            </div>
                                            <button type="" class="btn btn-success w-100">
                                                <i class="fas fa-cart-plus"></i> Add to Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="empty-cart">
                    <i class="fas fa-box-open"></i>
                    <h3>No hay productos disponibles</h3>
                    <p>No se encontraron productos en esta categoría.</p>
                </div>
            @endif
        </div>
        @endif   
    @else
    <div class="form-container" style="margin: 2.5rem; ">
        <div class="form-header" style="">
            <h2>Nuestros Productos</h2>
            <p>Explora nuestra amplia selección organizada por categorías</p>
        </div>    
        <div class="form-body" style=" background-color: #5d607c;">
            @if(isset($productsByCategory) && $productsByCategory->count())
                @foreach($productsByCategory as $category => $products)
                <div class="category-section">
                    <h2 style="color: white;" class="category-title">{{ $category ?: 'Sin Categoría' }}</h2>
                    <div class="products-grid">
                        @foreach($products as $product)
                            <div class="product-card">
                                <div class="product-image-container">
                                    <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                                    <span class="category-badge">{{ $category }}</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                    <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                                    <div class="product-footer">
                                        <p class="price">${{ number_format($product->price, 2) }}</p>
                                         <button class="btn btn-primary btn-sm add-to-cart-btn"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#addToCartModal"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->name }}"
                                                data-product-price="{{ $product->price }}"
                                                data-product-image="{{ asset('storage/' . $product->image) }}">
                                            <i class="fas fa-cart-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img id="modalProductImage" src="" alt="" class="img-fluid mb-3" style="max-height: 150px;">
                                            <h4 id="modalProductName"></h4>
                                            <p class="price" id="modalProductPrice"></p>
                                        </div>
                                        <form action="{{route('cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" id="modalProductId">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Quantity:</label>
                                                <input type="number" name="quantity" class="form-control" value="1" min="1">
                                            </div>
                                            <button type="" class="btn btn-success w-100">
                                                <i class="fas fa-cart-plus"></i> Add to Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="empty-cart">
                    <i class="fas fa-box-open"></i>
                    <h3>No hay productos disponibles</h3>
                    <p>No se encontraron productos en esta categoría.</p>
                </div>
            @endif
        </div>
    </div>
    @endauth

    <!-- JavaScript for form enhancements -->
    <script>
    // Populate modal with product data
    document.getElementById('addToCartModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        
        document.getElementById('modalProductId').value = button.getAttribute('data-product-id');
        document.getElementById('modalProductName').textContent = button.getAttribute('data-product-name');
        document.getElementById('modalProductPrice').textContent = '$' + button.getAttribute('data-product-price');
        document.getElementById('modalProductImage').src = button.getAttribute('data-product-image');
    });    
    document.addEventListener('DOMContentLoaded', function() {
        // Add input animations
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    });
    </script>
</body>
</html>