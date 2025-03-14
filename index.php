<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Hunter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="shell">
        <div id="header">
            <h1 id="logo"><a href="#">Movie Hunter</a></h1>
                       <div id="navigation">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="hero">
            <h1>Welcome to Movie Hunter</h1>
            <h2>Explore Your Favorite Movies</h2>
            <div class="button-container">
                <a href="register.php" class="button">Register</a>
                <a href="login.php" class="button">Login</a>
            </div>
        </div>

        <div class="movie-slider">
            <div class="slider-container">
                <!-- Slide 1 -->
                <div class="movie-slide active">
                    <div class="movie-poster">
                        <img src="images/movie9.jpg" alt="Captain America">
                        <div class="movie-dots">
                            <span class="dot active"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    <div class="movie-info">
                        <h2>Captain America</h2>
                        <div class="categories">
                            <span class="category active">All</span>
                            <span class="category">Action</span>
                            <span class="category">Comedy</span>
                            <span class="category">Romance</span>
                        </div>
                        <div class="popular-section">
                            <div class="section-header">
                                <h3>Most Popular</h3>
                                <a href="#" class="see-all">See all</a>
                            </div>
                            <div class="popular-movies">
                                <div class="thumbnail">
                                    <img src="images/movie1.jpg" alt="Aladdin">
                                </div>
                                <div class="thumbnail">
                                    <img src="images/movie2.jpg" alt="Joker">
                                </div>
                                <div class="thumbnail">
                                    <img src="images/movie3.jpg" alt="Spider-Man">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 - Aladdin Detail Page -->
                <div class="movie-slide movie-detail">
                    <div class="movie-detail-header">
                        <div class="back-button">←</div>
                        <div class="share-buttons">
                            <span class="share-icon">☆</span>
                            <span class="share-icon">↗</span>
                        </div>
                    </div>
                    <div class="movie-poster-large">
                        <img src="images/movie20.jpg" alt="Disney's Aladdin">
                    </div>
                    <div class="movie-detail-info">
                        <h2 class="movie-title">Disney's Aladdin</h2>
                        <p class="movie-meta">2019 • Adventure, Comedy • 2h 8m</p>
                        
                        <div class="movie-actions">
                            <button class="play-button">▶ Play</button>
                            <button class="download-button">↓ Download</button>
                        </div>
                        
                        <p class="movie-description">
                            Aladdin, a street boy who falls in love with a princess. 
                            With differences in caste and wealth, Aladdin tries to 
                            find a way to become a prince...
                            <a href="#" class="read-more">Read more</a>
                        </p>
                        
                        <div class="movie-tabs">
                            <span class="tab active">Episode</span>
                            <span class="tab">Similar</span>
                            <span class="tab">About</span>
                        </div>
                    </div>
                </div>
                
                <!-- Additional slides can be added here -->
            </div>
        </div>

        <div class="container">
            <h2>Featured Movies</h2>
            <div class="movie-list">
                <div class="movie-item">
                    <div class="movie-image">
                        <img class="movie-poster" src="images/movie1.jpg" alt="Movie 1">
                        <a href="#" class="play"></a>
                    </div>
                    <span class="name">Movie Title 1</span>
                </div>
                <div class="movie-item">
                    <div class="movie-image">
                        <img class="movie-poster" src="images/movie2.jpg" alt="Movie 2">
                        <a href="#" class="play"></a>
                    </div>
                    <span class="name">Movie Title 2</span>
                </div>
                <div class="movie-item">
                    <div class="movie-image">
                        <img class="movie-poster" src="images/movie3.jpg" alt="Movie 3">
                        <a href="#" class="play"></a>
                    </div>
                    <span class="name">Movie Title 3</span>
                </div>
            </div>
        </div>

        <div id="footer">
            <p>&copy; 2023 Movie Hub. All rights reserved.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let slideIndex = 0;
            const slides = document.querySelectorAll('.movie-slide');
            const dots = document.querySelectorAll('.dot');
            
            // Initial display
            showSlide(slideIndex);
            
            // Auto advance slides every 5 seconds
            setInterval(function() {
                slideIndex++;
                if (slideIndex >= slides.length) {
                    slideIndex = 0;
                }
                showSlide(slideIndex);
            }, 5000);
            
            // Show specific slide
            function showSlide(n) {
                for (let i = 0; i < slides.length; i++) {
                    slides[i].classList.remove('active');
                }
                
                for (let i = 0; i < dots.length; i++) {
                    dots[i].classList.remove('active');
                }
                
                slides[n].classList.add('active');
                if (dots[n]) {
                    dots[n].classList.add('active');
                }
                
                document.querySelector('.slider-container').style.transform = `translateX(-${n * 100}%)`;
            }
            
            // Click handlers for dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    slideIndex = index;
                    showSlide(slideIndex);
                });
            });
        });
    </script>
</body>
</html>