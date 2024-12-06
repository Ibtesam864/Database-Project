<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">
</head>

<body style="background-color: #FFE5B4;">
    <nav class="navbar navbar-expand-lg" style="background-color: #002B5B;;">
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
                </ul>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="http://localhost/Real%20Estate%20System/user/login.php" class="btn btn-outline-primary me-2">Log In</a>
                    <a href="http://localhost/Real%20Estate%20System/user/signup.php" class="btn btn-primary">Sign Up</a>
                <?php else: ?>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <a href="https://localhost/Real%20Estate%20System/user/login.php" class="btn btn-danger ms-2">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <h2>Sign Up</h2>
        <form action="processes/process_register.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>