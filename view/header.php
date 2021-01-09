
<body class="d-flex flex-column">
    
<header>
    <nav id="nav-bar" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-lg">
        <a class="navbar-brand" href="../home/">
            Soft Animals
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav ml-auto navbar-right">
            <li class="nav-item h-100 <?php if($page == 'home'){echo 'active';}?>">
                <a class="nav-link" href="../home/">Home</a>
            </li>
            <li class="nav-item h-100 <?php if($page == 'products'){echo 'active';}?>">
                <a class="nav-link" href="../products/">Products</a>
            </li>
            <li class="nav-item h-100 <?php if($page == 'cart'){echo 'active';}?>">
                <a class="nav-link" href="../cart/">Your Cart</a>
            </li>
            
            <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item h-100 <?php if($page == 'profile'){echo 'active';}?>">
                <a class="nav-link" href="../profile/">Profile</a>
            </li>
            <?php else: ?>
            <li class="nav-item h-100 <?php if($page == 'sign-in'){echo 'active';}?>">
                <a class="nav-link" href="../sign-in/">Sign In</a>
            </li>
            <?php endif ?>

        </ul>
        </div>
        </div>
    </nav>
</header>