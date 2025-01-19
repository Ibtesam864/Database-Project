<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://localhost/Real%20Estate%20System/styling/assets/r_logo.png">

    <script>
        // Function to show role-specific fields based on the selected role
        function showRoleSpecificFields() {
            var role = document.getElementById("role").value;

            // Hide all fields initially
            document.getElementById("agentFields").style.display = "none";
            document.getElementById("clientFields").style.display = "none";
            document.getElementById("tenantFields").style.display = "none";

            // Show the appropriate fields based on the selected role
            if (role === "agent") {
                document.getElementById("agentFields").style.display = "block";
            } else if (role === "client") {
                document.getElementById("clientFields").style.display = "block";
            } else if (role === "tenant") {
                document.getElementById("tenantFields").style.display = "block";
            }
        }

        // Trigger the function on page load and when the role changes
        window.onload = showRoleSpecificFields;
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #013220;">
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
                        <a class="nav-link active" aria-current="page" href="/Real%20Estate%20System/index.php" style="color: #FFFFFF;">Home</a>
                    </li>
                </ul>
                <a href="http://localhost/Real%20Estate%20System/user/login.php" class="btn btn-outline-primary me-2">Log In</a>
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
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select" required onchange="showRoleSpecificFields()">
                    <option value="agent">Agent</option>
                    <option value="client">Client</option>
                    <option value="tenant">Tenant</option>
                </select>
            </div>

            <!-- Fields for Agent -->
            <div id="agentFields" style="display: none;">
                <div class="mb-3">
                    <label for="agentEmail" class="form-label">Agent Email</label>
                    <input type="email" name="agentEmail" id="agentEmail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="agentAddress" class="form-label">Agent Address</label>
                    <input type="text" name="agentAddress" id="agentAddress" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="agentPhone" class="form-label">Agent Phone</label>
                    <input type="text" name="agentPhone" id="agentPhone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="agentRole" class="form-label">Agent Role</label>
                    <input type="text" name="agentRole" id="agentRole" class="form-control">
                </div>
            </div>

            <!-- Fields for Client -->
            <div id="clientFields" style="display: none;">
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="clientRole" class="form-label">Client Role</label>
                    <input type="text" name="clientRole" id="clientRole" class="form-control">
                </div>
            </div>

            <!-- Fields for Tenant -->
            <div id="tenantFields" style="display: none;">
                <div class="mb-3">
                    <label for="tenantContact" class="form-label">Tenant Contact</label>
                    <input type="text" name="tenantContact" id="tenantContact" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="tenantEmail" class="form-label">Tenant Email</label>
                    <input type="email" name="tenantEmail" id="tenantEmail" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="tenantAddress" class="form-label">Tenant Address</label>
                    <input type="text" name="tenantAddress" id="tenantAddress" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
        </form>
    </div>
    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>