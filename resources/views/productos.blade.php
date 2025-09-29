<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - C.Store</title>
    <<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
     @auth
<div class="form-container">
        <!-- Header -->
        @foreach($productsByCategory as $category => $products)
        <div class="category-section">
            <h2 class="category-title">{{ $category }}</h2>
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <p class="price">${{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    @else
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
    @endauth
    






    <!-- JavaScript for form enhancements -->
    <script>
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