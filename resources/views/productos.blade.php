<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - C.Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
                .category-section {
            margin-bottom: 3rem;
            border-bottom: 2px solid #eee;
            padding-bottom: 2rem;
        }

        .category-title {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-transform: capitalize;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 8px;
            background: #fff;
        }

        .product-card img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .price {
            font-weight: bold;
            color: #2c5aa0;
            font-size: 1.2rem;
        }
                :root {
            --primary-color: #ff6b35;
            --secondary-color: #2EC4B6;
            --accent-color: #FF9F1C;
            --dark-color: #2D3047;
            --light-color: #F8F9FA;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--dark-color), #3a3f5c);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .form-header h2 {
            margin: 0;
            font-weight: 700;
        }
        
        .form-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        .form-body {
            padding: 40px;
        }
        
        .form-label {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .input-group {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .input-group:focus-within {
            box-shadow: 0 4px 20px rgba(255, 107, 53, 0.2);
            transform: translateY(-2px);
        }
        
        .input-group-text {
            background: linear-gradient(135deg, var(--light-color), #e9ecef);
            border: none;
            color: var(--dark-color);
            font-weight: 600;
            min-width: 50px;
            justify-content: center;
        }
        
        .form-control {
            border: none;
            padding: 15px;
            font-size: 1rem;
            background: white;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: #fafbfc;
            box-shadow: none;
        }
        
        .form-control:read-only {
            background: var(--light-color);
            color: var(--dark-color);
            font-weight: 600;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            padding: 18px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.6);
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
        }
        
        .btn-submit:active {
            transform: translateY(-1px);
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
            position: relative;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--primary-color);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-body {
                padding: 25px;
            }
            
            body {
                padding: 10px;
            }
        }
    </style>
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