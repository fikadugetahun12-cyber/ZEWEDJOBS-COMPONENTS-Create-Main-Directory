<?php
session_start();
require_once 'config/config.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ZewedJobs Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-briefcase"></i> ZewedJobs Admin
            </a>
            <span class="text-white">
                Welcome, <?php echo $_SESSION['username']; ?> | 
                <a href="logout.php" class="text-danger">Logout</a>
            </span>
        </div>
    </nav>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action active">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="jobs.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-briefcase"></i> Jobs
                    </a>
                    <a href="companies.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-building"></i> Companies
                    </a>
                    <a href="users.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i> Users
                    </a>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h5>Total Jobs</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <h5>Companies</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-white bg-warning">
                                    <div class="card-body">
                                        <h5>Users</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <h5>Applications</h5>
                                        <h2>0</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5>Quick Actions</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="jobs.php?action=new" class="btn btn-primary w-100 mb-2">
                                        <i class="fas fa-plus"></i> Add Job
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="companies.php?action=new" class="btn btn-success w-100 mb-2">
                                        <i class="fas fa-building"></i> Add Company
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-warning w-100 mb-2">
                                        <i class="fas fa-download"></i> Export Data
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-info w-100 mb-2">
                                        <i class="fas fa-chart-bar"></i> View Reports
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
