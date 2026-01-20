<?php
session_start();
require_once 'config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Handle actions
$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $action === 'add') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    
    // In real app, save to database
    $message = "Job '$title' added successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jobs Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'index.php'; // Reuse header/sidebar ?>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Jobs Management</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
                            <i class="fas fa-plus"></i> Add Job
                        </button>
                    </div>
                    <div class="card-body">
                        <?php if (isset($message)): ?>
                            <div class="alert alert-success"><?php echo $message; ?></div>
                        <?php endif; ?>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Software Engineer</td>
                                    <td>Addis Ababa</td>
                                    <td>₦25,000 - ₦40,000</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- More rows will appear here from database -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Job Modal -->
    <div class="modal fade" id="addJobModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="jobs.php?action=add">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Job Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Salary Range</label>
                            <input type="text" name="salary" class="form-control" placeholder="e.g., ₦25,000 - ₦40,000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
