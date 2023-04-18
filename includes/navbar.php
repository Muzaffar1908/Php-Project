<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if(isset($_SESSION['auth_user'])) : ?>
      <div class="collapse navbar-collapse d-flex" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_name']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <form action="allcode.php" method="POST">
                  <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
        <?php else : ?>
        <ul class="d-flex auth">
          <li class="nav-item">
              <a href="../login.php" class="nav-item btn btn-success">Login</a>
            </li>
            <li class="nav-item">
              <a href="../register.php" class="nav-item btn btn-success registe1">Register</a>
          </li>
        </ul>
      </div>
    <?php endif; ?>
  </div>
</nav>