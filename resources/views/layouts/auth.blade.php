<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PMB Online')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><path fill='%23007bff' d='M8.211 2.047a.5.5 0 0 0-.422 0L2.875 4.797a.5.5 0 0 0-.273.463v1.27a.5.5 0 0 0 .273.463l4.914 2.75a.5.5 0 0 0 .422 0l4.914-2.75a.5.5 0 0 0 .273-.463v-1.27a.5.5 0 0 0-.273-.463L8.211 2.047zM8 2.84l4.171 2.338L8 7.514 3.829 5.178 8 2.84zM1.5 8.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM2 10.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0-.5.5zM2.5 12.5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm10-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm.5 1.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1z'/></svg>" type="image/svg+xml">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        .auth-background {
            background-image: linear-gradient(rgba(0, 123, 255, 0.7), rgba(0, 123, 255, 0.7)), 
                            url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        .auth-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .auth-card .card-header {
            background: rgba(0, 123, 255, 0.9) !important;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="auth-background">
    <div class="min-vh-100 d-flex align-items-center p-3">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
