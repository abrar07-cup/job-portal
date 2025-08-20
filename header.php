<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Job Portal'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .dark-mode-toggle {
            display: flex;
            align-items: center;
            margin-left: 15px;
            cursor: pointer;
            padding: 0.5rem 1rem;
        }
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
            margin-right: 8px;
        }
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #2196F3;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .toggle-text {
            color: white;
            font-size: 0.9rem;
        }
        
        /* Gradient Background for Dark Mode */
        body.dark-mode {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364) fixed;
            background-size: cover;
            color: #ffffff !important;
            min-height: 100vh;
        }
        
        /* Ensure content areas have appropriate background in dark mode */
        body.dark-mode .container {
            background-color: rgba(30, 30, 30, 0.85);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Text elements */
        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode h3,
        body.dark-mode h4,
        body.dark-mode h5,
        body.dark-mode h6,
        body.dark-mode p,
        body.dark-mode span,
        body.dark-mode label,
        body.dark-mode small,
        body.dark-mode .text-muted {
            color: #ffffff !important;
        }
        
        /* Cards */
        body.dark-mode .card {
            background-color: rgba(30, 30, 30, 0.9);
            border-color: #444;
            color: #ffffff;
        }
        body.dark-mode .card-header {
            background-color: rgba(37, 37, 37, 0.9);
            border-color: #444;
            color: #ffffff;
        }
        
        /* Tables */
        body.dark-mode .table {
            color: #ffffff;
            background-color: rgba(30, 30, 30, 0.8);
        }
        body.dark-mode .table th,
        body.dark-mode .table td {
            border-color: #444;
            color: #ffffff;
        }
        body.dark-mode .table-hover tbody tr:hover {
            color: #ffffff;
            background-color: rgba(45, 45, 45, 0.9);
        }
        body.dark-mode .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(37, 37, 37, 0.8);
        }
        
        /* Forms */
        body.dark-mode .form-control {
            background-color: rgba(45, 45, 45, 0.8);
            color: #ffffff;
            border-color: #555;
        }
        body.dark-mode .form-control:focus {
            background-color: rgba(45, 45, 45, 0.9);
            color: #ffffff;
            border-color: #2196F3;
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
        }
        body.dark-mode .form-control::placeholder {
            color: #aaa;
        }
        body.dark-mode .form-select {
            background-color: rgba(45, 45, 45, 0.8);
            color: #ffffff;
            border-color: #555;
        }
        body.dark-mode .form-label {
            color: #ffffff;
        }
        body.dark-mode .input-group-text {
            background-color: rgba(51, 51, 51, 0.8);
            border-color: #555;
            color: #ffffff;
        }
        
        /* Buttons */
        body.dark-mode .btn-outline-primary {
            color: #4da6ff;
            border-color: #4da6ff;
        }
        body.dark-mode .btn-outline-primary:hover {
            background-color: #4da6ff;
            color: #fff;
        }
        body.dark-mode .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }
        body.dark-mode .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }
        
        /* Navbar */
        body.dark-mode .navbar-dark {
            background-color: rgba(27, 58, 94, 0.95) !important;
        }
        
        /* List group */
        body.dark-mode .list-group-item {
            background-color: rgba(30, 30, 30, 0.8);
            border-color: #444;
            color: #ffffff;
        }
        
        /* Modals */
        body.dark-mode .modal-content {
            background-color: rgba(30, 30, 30, 0.95);
            color: #ffffff;
        }
        body.dark-mode .modal-header,
        body.dark-mode .modal-footer {
            border-color: #444;
        }
        body.dark-mode .close {
            color: #ffffff;
            text-shadow: 0 1px 0 #000;
        }
        
        /* Dropdowns */
        body.dark-mode .dropdown-menu {
            background-color: rgba(30, 30, 30, 0.95);
            border-color: #444;
        }
        body.dark-mode .dropdown-item {
            color: #ffffff;
        }
        body.dark-mode .dropdown-item:hover {
            background-color: rgba(45, 45, 45, 0.9);
            color: #ffffff;
        }
        body.dark-mode .dropdown-divider {
            border-color: #444;
        }
        
        /* Alerts */
        body.dark-mode .alert-success {
            background-color: rgba(30, 70, 32, 0.9);
            border-color: #2e7030;
            color: #a3d9a5;
        }
        body.dark-mode .alert-info {
            background-color: rgba(12, 60, 92, 0.9);
            border-color: #145388;
            color: #a3d1f2;
        }
        body.dark-mode .alert-warning {
            background-color: rgba(92, 75, 21, 0.9);
            border-color: #8e7422;
            color: #f2dea3;
        }
        body.dark-mode .alert-danger {
            background-color: rgba(92, 30, 30, 0.9);
            border-color: #8e2c2c;
            color: #f2a3a3;
        }
        
        /* Pagination */
        body.dark-mode .page-link {
            background-color: rgba(45, 45, 45, 0.8);
            border-color: #555;
            color: #ffffff;
        }
        body.dark-mode .page-link:hover {
            background-color: rgba(61, 61, 61, 0.9);
            border-color: #666;
            color: #ffffff;
        }
        body.dark-mode .page-item.disabled .page-link {
            background-color: rgba(37, 37, 37, 0.7);
            border-color: #555;
            color: #888;
        }
        
        /* Badges */
        body.dark-mode .badge {
            color: #ffffff;
        }
        
        /* Links */
        body.dark-mode a {
            color: #4da6ff;
        }
        body.dark-mode a:hover {
            color: #80c1ff;
        }
        
        /* Code */
        body.dark-mode code {
            color: #ff9da4;
            background-color: rgba(45, 45, 45, 0.8);
        }
        body.dark-mode pre {
            color: #ffffff;
            background-color: rgba(45, 45, 45, 0.8);
            border-color: #555;
        }
        
        /* Blockquotes */
        body.dark-mode blockquote {
            color: #ccc;
            border-left-color: #555;
        }
        
        /* Horizontal rule */
        body.dark-mode hr {
            border-color: #555;
        }
        
        /* Custom utility class for white text */
        .text-white-force {
            color: #ffffff !important;
        }

        .footer{
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important;
        }
      
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="/job-portal2/index.php">JobPortal+</a>
                </li>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['user_type'] == 'employer'): ?>
                        <!-- Employer-specific menu items -->
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employer/jobs.php">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employer/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employer/post_job.php">Post Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employer/view_jobs.php">View Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employer/applicants.php">View Applicants</a>
                        </li>
                <?php elseif ($_SESSION['user_type'] == 'employee'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employee/dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employee/build_cv.html">How to build CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employee/applications.php">My Applications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/job-portal2/employee/my_cv.html">Your CV</a>
                        </li>
                <?php endif; ?>     
            <?php endif; ?>
            </ul>
            
            <ul class="navbar-nav">
                <!-- Dark Mode Toggler - Placed before login/register items -->
                <li class="nav-item">
                    <div class="dark-mode-toggle">
                        <div class="toggle-switch" >
                            <input type="checkbox" id="darkModeToggle" >
                            <span class="slider"></span>
                        </div>
                        <span class="toggle-text">Dark Mode</span>
                    </div>
                </li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <?= htmlspecialchars($_SESSION['username']) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/job-portal2/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4 shadow" style ="
    border: 0.5px solid #a09186;
    border-radius: 8px;
    padding: 1rem;
    box-shadow: 0 6px 20px rgba(0,0,0,0.05);
    transition: transform .12s ease, box-shadow .18s ease, border-color .18s ease;
">

<!-- Move JavaScript to the end of the body -->
<script>
    // Wait for DOM to be fully loaded
    
// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    const toggleSwitch = document.querySelector('.toggle-switch'); // Select the toggle switch container
    const toggleText = document.querySelector('.toggle-text'); // Select the toggle text

    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        darkModeToggle.checked = true;
    }

    // Function to handle dark mode toggling
    function toggleDarkMode() {
        if (darkModeToggle.checked) {
            body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled');
        } else {
            body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', null);
        }
    }

    // Event listener for the checkbox itself
    darkModeToggle.addEventListener('change', toggleDarkMode);

    // Event listener for clicks on the toggle switch container
    toggleSwitch.addEventListener('click', function(event) {
        // Prevent the click from bubbling up if the actual checkbox was clicked
        // This ensures the toggleDarkMode function isn't called twice when clicking the input
        if (event.target !== darkModeToggle) {
            darkModeToggle.checked = !darkModeToggle.checked;
            toggleDarkMode();
        }
    });

    // Event listener for clicks on the toggle text
    toggleText.addEventListener('click', function() {
        darkModeToggle.checked = !darkModeToggle.checked;
        toggleDarkMode();
    });
});
</script>