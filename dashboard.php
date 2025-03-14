<?php
include 'auth_check.php';
include 'db.php';
include 'api.php'; // Include the API functions

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM favorite_movies WHERE user_id = ?");
$stmt->execute([$user_id]);
$favorites = $stmt->fetchAll();

$movies = []; // Initialize an array to hold search results
$error = ''; // Initialize an error message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_query'])) {
    $query = $_POST['search_query'];
    $result = searchMovies($query); // Call the search function from api.php
    if (isset($result['Search'])) {
        $movies = $result['Search'];
    } else {
        $error = "No movies found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Hunter - Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-header {
            background-color: #1a1a1a;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            color: #ff6347;
            text-decoration: none;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: #333;
        }

        .search-bar {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-bar input {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            background-color: #333;
            color: #fff;
            width: 250px;
        }

        .search-bar button {
            padding: 8px 20px;
            border-radius: 20px;
            border: none;
            background-color: #ff6347;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #e5533d;
        }

        .main-content {
            margin-top: 80px;
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            color: #ff6347;
            margin: 30px 0 20px;
        }

        .favorite-movies {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            list-style: none;
            padding: 0;
        }

        .movie-card {
            background-color: #1a1a1a;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .movie-card:hover {
            transform: translateY(-5px);
        }

        .movie-poster {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .movie-info {
            padding: 15px;
        }

        .movie-title {
            font-size: 16px;
            color: #fff;
            margin-bottom: 10px;
        }

        .remove-btn {
            background-color: #ff4444;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .remove-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <a href="dashboard.php" class="logo">Movie Hunter</a>
        <div class="search-bar">
            <form method="POST">
                <input type="text" name="search_query" placeholder="Search for movies..." required>
                <button type="submit">Search</button>
            </form>
        </div>
        <nav class="nav-links">
            <a href="profile.php">Profile</a>
            <a href="edit_profile.php">Settings</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="main-content">
        <h2 class="section-title">Your Favorite Movies</h2>
        <ul class="favorite-movies">
            <?php foreach ($favorites as $movie): ?>
                <li class="movie-card">
                    <img class="movie-poster" 
                         src="<?php echo htmlspecialchars($movie['poster_url']); ?>" 
                         alt="<?php echo htmlspecialchars($movie['movie_title']); ?>">
                    <div class="movie-info">
                        <h3 class="movie-title"><?php echo htmlspecialchars($movie['movie_title']); ?></h3>
                        <form method="POST" action="remove_favorite.php">
                            <input type="hidden" name="movie_id" 
                                   value="<?php echo htmlspecialchars($movie['movie_id']); ?>">
                            <button type="submit" class="remove-btn">Remove</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if (isset($movies) && !empty($movies)): ?>
            <h2 class="section-title">Search Results</h2>
            <div class="favorite-movies">
                <?php foreach ($movies as $movie): ?>
                    <div class="movie-card">
                        <img class="movie-poster" 
                             src="<?php echo htmlspecialchars($movie['Poster']); ?>" 
                             alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                        <div class="movie-info">
                            <h3 class="movie-title"><?php echo htmlspecialchars($movie['Title']); ?></h3>
                            <form method="POST" action="add_favorite.php">
                                <input type="hidden" name="movie_title" 
                                       value="<?php echo htmlspecialchars($movie['Title']); ?>">
                                <input type="hidden" name="movie_id" 
                                       value="<?php echo htmlspecialchars($movie['imdbID']); ?>">
                                <input type="hidden" name="poster_url" 
                                       value="<?php echo htmlspecialchars($movie['Poster']); ?>">
                                <button type="submit" class="remove-btn" style="background-color: #4CAF50;">
                                    Add to Favorites
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
