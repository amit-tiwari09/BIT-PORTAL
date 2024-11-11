<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #343a40;
            height: 100vh; /* Full height for body */
        }

        .sidebar-heading {
            margin: 30px 0;
            font-weight: bold;
            font-size: 1.5rem; /* Increased font size */
            color: #007bff;
        }

        .card {
            margin-bottom: 30px;
            border-radius: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .list-group-item {
            font-size: 1.1rem; /* Adjusted font size */
        }

        .card-title {
            font-size: 1.4rem; /* Increased font size */
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .nav-link {
            color: #f8f9fa; /* Default color for nav links */
        }

        .nav-link:hover {
            color: #ffc107 !important; /* Hover color */
        }

        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            font-size: 1rem; /* Adjusted font size */
        }

        .container-fluid {
            height: calc(100vh - 56px); /* Full height minus navbar height */
        }

        .sidebar {
            height: 100vh; /* Full height for sidebar */
            position: fixed;
            overflow-y: auto;
            background-color: #f8f9fa; /* Sidebar background */
        }

        .main-content {
            margin-left: 16.67%; /* Adjust according to sidebar width */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                height: auto; /* Reset height for mobile */
            }

            .main-content {
                margin-left: 0; /* Reset margin for mobile */
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Student Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h4 class="sidebar-heading">Navigation</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-book"></i> Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-pencil-alt"></i> Assign ments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-graduation-cap"></i> Grades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
                <h2 class="mt-4">Dashboard Overview</h2>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Courses Enrolled</div>
                            <div class="card-body">
                                <h5 class="card-title">5 Courses</h5>
                                <p class="card-text">View your enrolled courses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Assignments Due</div>
                            <div class="card-body">
                                <h5 class="card-title">3 Assignments</h5>
                                <p class="card-text">Check your upcoming assignments.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Grades</div>
                            <div class="card-body">
                                <h5 class="card-title">Current GPA: 3.5</h5>
                                <p class="card-text">View your grades.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Recent Activity</h3>
                <ul class="list-group mb-4">
                    <li class="list-group-item">Submitted Assignment 1 - Math</li>
                    <li class="list-group-item">Joined Course: Web Development</li>
                    <li class="list-group-item">Received Grade: A - History</li>
                </ul>

                <h3>Upcoming Events</h3>
                <ul class="list-group mb-4">
                    <li class="list-group-item">Midterm Exam - March 15</li>
                    <li class="list-group-item">Project Presentation - March 20</li>
                    <li class="list-group-item">Career Fair - March 25</li>
                </ul>

                <h3>Calendar</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">March 2023</h5>
                        <ul class="list-group">
                            <li class="list-group-item">15: Midterm Exam</li>
                            <li class="list-group-item">20: Project Presentation</li>
                            <li class="list-group-item">25: Career Fair</li>
                        </ul>
                    </div>
                </div>

                <h3>Notifications</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">New grades posted for Math.</li>
                            <li class="list-group-item">Reminder: Assignment 2 due next week.</li>
                            <li class="list-group-item">Course registration opens on March 30.</li>
                        </ul>
                    </div>
                </div>

                <h3>Recent Messages</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Message from Prof. Smith: "Great job on your last assignment!"</li>
                            <li class="list-group-item">Message from Student Council: "Join us for the upcoming event!"</li>
                            <li class="list-group-item">Message from Admin: "Please update your profile information."</li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <span>&copy; 2023 Student Dashboard. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>