<?php
include 'auth_check.php';
include 'db.php';

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

// Count favorite movies
$stmt = $pdo->prepare("SELECT COUNT(*) FROM favorite_movies WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$favoriteCount = $stmt->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - Movie Hunter</title>
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

        .main-content {
            margin-top: 80px;
            padding: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .profile-card {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #ff6347;
            margin: 0 auto;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            color: #ff6347;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #fff;
            font-size: 14px;
        }

        .edit-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6347;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #e5533d;
        }

        .profile-info {
            margin-top: 30px;
        }

        .info-row {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #333;
        }

        .info-label {
            width: 120px;
            color: #888;
        }

        .info-value {
            color: #fff;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <a href="dashboard.php" class="logo">Movie Hub</a>
        <nav class="nav-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="edit_profile.php">Settings</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="main-content">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    <?php echo strtoupper(substr($user['username'], 0, 1)); ?>
                </div>
                <h1><?php echo htmlspecialchars($user['username']); ?></h1>
                <a href="edit_profile.php" class="edit-button">Edit Profile</a>
            </div>

            <div class="profile-info">
                <div class="info-row">
                    <div class="info-label">Email</div>
                    <div class="info-value"><?php echo htmlspecialchars($user['email']); ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Member Since</div>
                    <div class="info-value"><?php echo date('F Y', strtotime($user['created_at'])); ?></div>
                </div>
            </div>

            <div class="profile-stats">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $favoriteCount; ?></div>
                    <div class="stat-label">Favorite Movies</div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
