@extends('layouts.app')

@section('title', 'About Us : ArticleCraft')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
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
                            <h5 class="card-title">Anisah Khansa Zhafirah</h5>
                            <p class="card-text">NIM: 235150600111033</p>
                        </div>
                    </div>
                </div>
                <!-- Member 2 -->
                <div class="col-md-4">
                    <div class="card p-4">
                        <img src="https://via.placeholder.com/150" alt="Member 2">
                        <div class="card-body">
                            <h5 class="card-title">Evida Nur Churin'in</h5>
                            <p class="card-text">NIM: 235150600111034</p>
                        </div>
                    </div>
                </div>
                <!-- Member 3 -->
                <div class="col-md-4">
                    <div class="card p-4">
                        <img src="https://via.placeholder.com/150" alt="Member 3">
                        <div class="card-body">
                            <h5 class="card-title">Auliyaa Zulfa</h5>
                            <p class="card-text">NIM: 235150600111035</p>
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
@endsection
