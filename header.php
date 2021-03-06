<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="http://vito.westlakestuco.com">Vito</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if(strcmp($page_name,"home") == 0) echo "active"; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php if(strcmp($page_name,"faqs") == 0) echo "active"; ?>">
                    <a class="nav-link" href="faqs.php">FAQs</a>
                </li>
                <li class="nav-item <?php if(strcmp($page_name,"gallery") == 0) echo "active"; ?>">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <!-- <li class="nav-item <?php //if(strcmp($page_name,"credits") == 0) echo "active"; ?>">
                    <a class="nav-link" href="credits.php">Credits</a>
                </li> -->
            </ul> 

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-success" href="question.php">Ask a Question!</a>
                </li>
            </ul>
        </div>
    </nav>
</header>