# Create companies.php
nano companies.php
<?php
session_start();
require_once 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'index.php'; ?>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Companies Management</h4>
                    </div>
                    <div class="card-body">
                        <p>Companies list will appear here.</p>
                        <p>For now, focus on getting the bot working first!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();
require_once 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'index.php'; ?>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Management</h4>
                    </div>
                    <div class="card-body">
                        <p>Users list will appear here.</p>
                        <p>For now, focus on getting the bot working first!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
