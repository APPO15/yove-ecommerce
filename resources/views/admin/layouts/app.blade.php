<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yove Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width:250px;">

        <h3 class="text-center mb-4">
            Yove
        </h3>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-box-seam"></i>
                    Products
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-tags"></i>
                    Categories
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-cart-check"></i>
                    Orders
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people"></i>
                    Users
                </a>
            </li>

        </ul>

    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-white shadow-sm px-4">

            <h4 class="mb-0">
                Admin Dashboard
            </h4>

        </nav>

        <!-- Page Content -->
        <div class="container-fluid mt-4">

            @yield('content')

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
