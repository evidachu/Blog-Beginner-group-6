<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About the Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header Section */
        .header {
            background: linear-gradient(90deg, #007bff, #6610f2);
            color: white;
            padding: 50px 0;
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 48px;
            font-weight: bold;
            margin: 0;
            animation: fadeIn 2s ease-in-out;
        }
        .header p {
            font-size: 20px;
            margin-top: 10px;
            animation: fadeIn 2s ease-in-out;
        }

        /* Section Titles */
        .section-title {
            text-align: center;
            margin: 40px 0 20px;
            font-size: 32px;
            font-weight: bold;
            color: #343a40;
            animation: slideIn 1.5s ease-in-out;
        }

        /* Cards for Members */
        .card img {
            height: 150px;
            width: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto 20px;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover img {
            transform: scale(1.1);
        }
        .card {
            margin-top: 20px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px);
        }

        /* About Our Group Section */
        .about-section {
            background: #007bff;
            color: white;
            padding: 40px;
            border-radius: 10px;
            animation: fadeIn 2s ease-in-out;
        }

        /* Smooth Scroll Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Footer Section */
        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background: #343a40;
            color: white;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <h1>About the Group</h1>
        <p>Get to know us better and learn about our amazing project!</p>
    </div>

    <div class="container">
        <!-- About Us Section -->
        <div class="section">
            <h2 class="section-title">About Us</h2>
            <div class="row text-center">
                <!-- Member 1 -->
                <div class="col-md-4">
                    <div class="card p-4">
                        <img src="https://via.placeholder.com/150" alt="Member 1">
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">NIM: 123456789</p>
                        </div>
                    </div>
                </div>
                <!-- Member 2 -->
                <div class="col-md-4">
                    <div class="card p-4">
                        <img src="https://via.placeholder.com/150" alt="Member 2">
                        <div class="card-body">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="card-text">NIM: 987654321</p>
                        </div>
                    </div>
                </div>
                <!-- Member 3 -->
                <div class="col-md-4">
                    <div class="card p-4">
                        <img src="https://via.placeholder.com/150" alt="Member 3">
                        <div class="card-body">
                            <h5 class="card-title">Alex Johnson</h5>
                            <p class="card-text">NIM: 135792468</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Our Group Section -->
        <div class="section">
            <h2 class="section-title">About Our Group</h2>
            <div class="about-section">
                <p>
                    We are a passionate group of web developers committed to creating innovative and functional applications. 
                    Our team thrives on collaboration, creativity, and continuous learning to deliver impactful solutions.
                </p>
                <p>
                    Each of us brings unique skills, from backend development to user experience design, making our team dynamic and diverse.
                </p>
            </div>
        </div>

        <!-- About This Project Section -->
        <div class="section">
            <h2 class="section-title">About This Project</h2>
            <p>
                This project is a part of our Web Programming course assignment. The goal is to build a complete Laravel-based web application with the following features:
            </p>
            <ul>
                <li>Homepage: Displays a list of articles dynamically.</li>
                <li>Article Page: View details of a single article.</li>
                <li>Static Text Page: A simple page like this "About the Group".</li>
                <li>Admin Page: Allows authors to manage articles, categories, and tags efficiently.</li>
            </ul>
            <p>
                Through this project, we aim to showcase our understanding of MVC architecture, database handling, and CRUD functionality in Laravel.
            </p>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        &copy; 2024 Our Group. All Rights Reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
