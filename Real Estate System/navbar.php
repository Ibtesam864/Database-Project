<?php
include 'db_connection.php';

$user_query = "SELECT * FROM users";
$result = mysqli_query($conn, $user_query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$client_query = "SELECT * FROM clients";
$result = mysqli_query($conn, $client_query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

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
                    <a class="nav-link active" aria-current="page" href="/Real%20Estate%20System/index.php" style="color: #FFFFFF;" onmouseover="this.style.color='#D4AF37';" onmouseout="this.style.color='#FFFFFF';">Home</a>
                </li>

                <!-- properties element for clients -->
                <?php
                if (isset($_SESSION['client_id'])) {
                    echo "
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">
                            Properties
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\" style=\"background-color: #003300; border:none;\">
                            <li><a class=\"dropdown-item\" href=\"/Real%20Estate%20System/property%20management/add_property.php\" style=\"color:  #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Add Property</a></li>
                            <li><a class=\"dropdown-item\" href=\"/Real%20Estate%20System/property%20management/list_properties.php\" style=\"color:  #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">List of Properties</a></li>
                        </ul>
                    </li>";
                }
                ?>

                <!-- properties element for agents and tenants -->
                <?php
                if (isset($_SESSION['agent_id']) || isset($_SESSION['tenant_id'])) {
                    echo "
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"/Real%20Estate%20System/property%20management/list_properties.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Properties List</a>
                    </li>";
                }
                ?>

                <!-- tenants element for agents only -->
                <?php
                if (isset($_SESSION['agent_id'])) {
                    echo "
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">
                            Tenents
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\" style=\"background-color: #003300; border:none;\">
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/tenants%20management/add_tenant.php\" style=\"color:  #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Add Tenent</a></li>
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/tenants%20management/list_tenant.php\" style=\"color:  #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">List Tenent</a></li>
                        </ul>
                    </li>";
                }
                ?>

                <!-- view tenants element for clients -->
                <?php
                if (isset($_SESSION['client_id'])) {
                    echo "
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"https://localhost/Real%20Estate%20System/tenants%20management/list_tenant.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">View Tenants</a>
                    </li>";
                }
                ?>

                <!-- leases element for client -->
                <?php
                if (isset($_SESSION['client_id'])) {
                    echo "
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">
                            Lease
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\" style=\"background-color: #003300; border:none;\">
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/lease%20management/add_lease.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Add Lease</a></li>
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/lease%20management/list_lease.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">List Lease</a></li>
                        </ul>
                    </li>";
                }
                ?>

                <!-- payment list element for clients -->
                <?php
                if (isset($_SESSION['client_id'])) {
                    echo "
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"https://localhost/Real%20Estate%20System/payments/payment_list.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Payment List</a>
                    </li>";
                }
                ?>

                <!-- payment element for agents and tenants -->
                <?php
                if (isset($_SESSION['agent_id']) || isset($_SESSION['tenant_id'])) {
                    echo "
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">
                            Payment
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\" style=\"background-color: #003300; border:none;\">
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/payments/add_payment.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Add Payment</a></li>
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/payments/payment_list.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">List Payment</a></li>
                        </ul>
                    </li>";
                }
                ?>

                <!-- maintenance element for tenants -->
                <?php
                if (isset($_SESSION['tenant_id'])) {
                    echo "
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">
                            Maintenance
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\" style=\"background-color: #003300; border:none;\">
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/complaints/add_complaint.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Add Requests</a></li>
                            <li><a class=\"dropdown-item\" href=\"https://localhost/Real%20Estate%20System/complaints/view_complaints.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Requests List</a></li>
                        </ul>
                    </li>";
                }
                ?>

                <!-- agent list element for clients -->
                <?php
                if (isset($_SESSION['client_id'])) {
                    echo "
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"https://localhost/Real%20Estate%20System/agents/agents_list.php\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#D4AF37';\" onmouseout=\"this.style.color='#FFFFFF';\">Agents List</a>
                    </li>";
                }
                ?>

                <!-- about us -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://localhost/Real%20Estate%20System/about_us.php" style="color: #FFFFFF;" onmouseover="this.style.color='#D4AF37';" onmouseout="this.style.color='#FFFFFF';">About Us</a>
                </li>
            </ul>

            <!-- log in, sign up, and logout elements -->
            <?php if (!isset($_SESSION['tenant_id']) && !isset($_SESSION['client_id']) && !isset($_SESSION['agent_id'])): ?>
                <a href="http://localhost/Real%20Estate%20System/user/login.php" class="btn btn-outline-primary me-2">Log In</a>
                <a href="http://localhost/Real%20Estate%20System/user/signup.php" class="btn btn-primary">Sign Up</a>
            <?php else: ?>
                <form class="d-flex" action="search_results.php" method="GET">
                    <!--                     <input
                        class="form-control me-2"
                        type="search"
                        name="query"
                        placeholder="Search"
                        aria-label="Search"
                        required>
                    <button class="btn" type="submit" style="border:1px solid #B0E0E6; color :#B0E0E6;">Search</button> -->
                </form>

                <a href="https://localhost/Real%20Estate%20System/user/logout.php" class="btn btn-danger ms-2">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>