<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts App</title>

     <!-- Bootstrap -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css"
        integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
    ></script>

    <script defer src="js/welcome.js"></script>

    <style>
        .welcome {
            background: url('img/background.jpg');
            background-position: center center;
            background-size: cover;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="home.php">
            <img class="mr-2" style="width: 2rem" src="https://lh3.googleusercontent.com/5xkPj76K_z91n78hmD1xf-U293ItzLnJsreSDUPvBsnh0UCMFRSiS7y4nP7IfENnePP1Lo2RUhlO1extIsv4pFMjOnp8x40wM3E9y1ocpj1GkAyGaJtVzlqHA9YgS3XveAwP1vlh=w1200-h630-p-k-no-nu" />
            ContactsApp
        </a>

        
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>


    <div class="welcome d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1>Store Your Contacts Now</h1>
            <a class="btn btn-lg btn-dark" href="register.php">Get Started</a>
        </div>
    </div>


</body>
</html>