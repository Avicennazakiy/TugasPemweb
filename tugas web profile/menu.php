<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/sttnf.png" alt="Logo" width="40">
      My Web
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= ($hal == 'home') ? 'active' : '' ?>" href="index.php?hal=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($hal == 'about') ? 'active' : '' ?>" href="index.php?hal=about">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($hal == 'contact') ? 'active' : '' ?>" href="index.php?hal=contact">Contact Me</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Studies
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?hal=level_list">level</a></li>
            <li><a class="dropdown-item" href="index.php?hal=studies_list">studies</a></li>
          </ul>
        </li>

        <?php
        if(!isset($_SESSION['MEMBER'])){ //----belum/gagal login------
        ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?hal=login">Login</a>
          </li>
        <?php
        }
        else{ //---------user sudah login dan terotentikasi---------------
        $role     = $_SESSION['MEMBER']['role'] ?? 'user'; // default 'user' jika role tidak ada
        $username = $_SESSION['MEMBER']['username'] ?? 'User';
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars($username).' - '.htmlspecialchars($role) ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <?php if ($role == 'admin') { ?>
              <li><a class="dropdown-item" href="#">Kelola User</a></li>
              <?php } ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
      <form class="d-flex" role="search">
              <input class="form-control me-2" type="text" name="keyword" placeholder="Search" aria-label="Search">
              <button class=
              "btn btn-outline-success" type="submit">Search</button>
              <!-- hidden field untuk mengirim ke halaman produk cari -->
            <input type="hidden" name="hal" value="produk_cari" />
      </form>
    </div>
  </div>
</nav>