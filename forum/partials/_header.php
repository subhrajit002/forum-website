<?php
session_start();

echo ' <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">iForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forum">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="contact.php"  class="nav-link ">Contact</a>
            </li>
        </ul>';

if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == true) {
    echo '<form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
           <p class="text-light my-0 mx-2"> Welcome ' . $_SESSION['user_email'] . '</p>
           <a href="partials/_logout.php" ><button type="button" class="btn mx-2 btn-outline-success" >Logout</button></a>
            </form>';
} else {
    echo '<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success" type="submit">Search</button>
    </form>
    <button type="button" class="btn mx-2 btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>

            <button type="button" class="btn ml-2 btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>';
}
echo ' </div>
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';


if (isset($_GET['signupsucess']) && $_GET['signupsucess'] == TRUE) {
    echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
    <strong>Success ! </strong>Sign Up success
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}


?>