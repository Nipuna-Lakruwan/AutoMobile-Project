<?php
// Assuming session is started and the admin is logged in.
session_start();
include('includes/db.php');

// Fetch admin details from the database
// $admin_id = $_SESSION['admin_id'];  // Assuming admin ID is stored in session
// $query = "SELECT * FROM admins WHERE id = '$admin_id'";
// $result = mysqli_query($conn, $query);
// $admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/style.css">
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/meeting.css">
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/admin-profile.css">
  <title>Admin Profile</title>
</head>

<body>

  <div class="dashboard-wrapper">
    <?php include 'includes/sideMenu.php'; ?>
    <div class="content">
      <?php include 'includes/navbar.php'; ?>

      <main>
        <div class="header">
          <h1>Update Profile</h1>
        </div>

        <div class="container">
          <form id="updateProfileForm" method="POST" action="admin_profile.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="profilePicture">Profile Picture</label>
              <div class="profile-picture">
                <img id="profilePreview" src="<?php echo $admin['profile_picture'] ?: '/default-avatar.png'; ?>" alt="Profile Picture">
              </div>
              <input type="file" id="profilePicture" name="profilePicture" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="form-group">
              <label for="adminName">Name</label>
              <input type="text" id="adminName" name="adminName" value="<?php echo htmlspecialchars($admin['name']); ?>" required>
            </div>
            <div class="form-group">
              <label for="adminEmail">Email</label>
              <input type="email" id="adminEmail" name="adminEmail" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
            </div>
            <div class="form-group">
              <label for="adminPassword">Password</label>
              <div class="password-container">
                <input type="password" id="adminPassword" name="adminPassword" placeholder="Enter new password">
                <i class="fa fa-eye toggle-password" onclick="togglePassword('adminPassword')"></i>
              </div>
            </div>
            <div class="form-group">
              <label for="adminConfirmPassword">Confirm Password</label>
              <div class="password-container">
                <input type="password" id="adminConfirmPassword" name="adminConfirmPassword" placeholder="Confirm new password">
                <i class="fa fa-eye toggle-password" onclick="togglePassword('adminConfirmPassword')"></i>
              </div>
              <small id="passwordFeedback"></small>
            </div>
            <button type="submit" class="btn-primary" name="updateProfile">Update Profile</button>
          </form>
        </div>
      </main>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
  <script src="/AutoMobile Project/admin/assets/js/admin-profile.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
</body>

</html>

<?php
if (isset($_POST['updateProfile'])) {
    $name = mysqli_real_escape_string($conn, $_POST['adminName']);
    $email = mysqli_real_escape_string($conn, $_POST['adminEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['adminPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['adminConfirmPassword']);

    // Handle profile picture upload
    if (!empty($_FILES['profilePicture']['name'])) {
        $profilePicture = 'uploads/' . basename($_FILES['profilePicture']['name']);
        move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profilePicture);
    } else {
        $profilePicture = $admin['profile_picture'];
    }

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $admin['password'];

        $updateQuery = "UPDATE admins SET name='$name', email='$email', profile_picture='$profilePicture', password='$hashedPassword' WHERE id='$admin_id'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Profile updated successfully!'); window.location.href='admin_profile.php';</script>";
        } else {
            echo "<script>alert('Error updating profile.');</script>";
        }
    }
}
?>