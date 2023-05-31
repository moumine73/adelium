<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <span class="text-white"><?=isset($_SESSION['user'])?$_SESSION['user']:"Inconnu2"?></span>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="login.html">Logout</a>
      </li>
    </ul>
  </div>
</nav>

