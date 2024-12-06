<nav class="navbar navbar-expand-lg" style="background-color: #002B5B;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Real%20Estate%20System/index.php">
            <img src="/Real%20Estate%20System/styling/assets/r_logo.png" alt="Logo" style="height: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Real%20Estate%20System/index.php" style="color: #E0E0E0;">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #E0E0E0;">
                        Properties
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147; border:none;">
                        <li><a class="dropdown-item" href="/Real%20Estate%20System/property%20management/add_property.php" style="color:  #B0E0E6;">Add Property</a></li>
                        <li><a class="dropdown-item" href="/Real%20Estate%20System/property%20management/list_properties.php" style="color:  #B0E0E6;">List of Properties</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #E0E0E0;">
                        Tenents
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147; border:none;">
                        <li><a class="dropdown-item" href="https://localhost/Real%20Estate%20System/tenants%20management/add_tenant.php" style="color:  #B0E0E6;">Add Tenent</a></li>
                        <li><a class="dropdown-item" href="https://localhost/Real%20Estate%20System/tenants%20management/list_tenant.php" style="color:  #B0E0E6;">List Tenent</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #E0E0E0;">
                        Lease
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147; border:none;">
                        <li><a class="dropdown-item" href="https://localhost/Real%20Estate%20System/lease%20management/add_lease.php" style="color:  #B0E0E6;">Add Lease</a></li>
                        <li><a class="dropdown-item" href="https://localhost/Real%20Estate%20System/lease%20management/list_lease.php" style="color:  #B0E0E6;">List Lease</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #E0E0E0;">
                        Payment
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147; border:none;">
                        <li><a class="dropdown-item" href="#" style="color:  #B0E0E6;">Add Payment</a></li>
                        <li><a class="dropdown-item" href="#" style="color:  #B0E0E6;">List Payment</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #E0E0E0;">
                        Maintenance Requests
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #002147; border:none;">
                        <li><a class="dropdown-item" href="#" style="color:  #B0E0E6;">Add Maintenance Requests</a></li>
                        <li><a class="dropdown-item" href="#" style="color:  #B0E0E6;">Edit Maintenance Requests</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://localhost/Real%20Estate%20System/about_us.php" style="color: #E0E0E0;">About Us</a>
                </li>
            </ul>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="http://localhost/Real%20Estate%20System/user/login.php" class="btn btn-outline-primary me-2">Log In</a>
                <a href="http://localhost/Real%20Estate%20System/user/signup.php" class="btn btn-primary">Sign Up</a>
            <?php else: ?>
                <form class="d-flex" action="search_results.php" method="GET">
                    <input
                        class="form-control me-2"
                        type="search"
                        name="query"
                        placeholder="Search"
                        aria-label="Search"
                        required>
                    <button class="btn" type="submit" style="border:1px solid #B0E0E6; color :#B0E0E6;">Search</button>
                </form>

                <a href="https://localhost/Real%20Estate%20System/user/logout.php" class="btn btn-danger ms-2">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>