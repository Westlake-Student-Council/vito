<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Felix Chen">

    <link rel="icon" type="image/png" href="assets/images/dog.png">

    <title>Vito</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/libraries/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/libraries/carousel.css" rel="stylesheet">
</head>

<body>
    <?php include "header.php"; ?>

    <main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="first-slide" src="assets/images/img1.jpg" alt="First slide">
                    <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Still curious?</h1>
                        <p>After reading the FAQs, feel free to ask about Vito!</p>
                        <p><a class="btn btn-lg btn-primary" href="ask.php" role="button">Ask a question!</a></p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="second-slide" src="assets/images/img2.jpg" alt="Second slide">
                    <div class="container">
                    <div class="carousel-caption">
                        <h1>Meet Vito.</h1>
                        <p>You've seen him around school on duty. Here's your chance to get to know him!</p>
                        <p><a class="btn btn-lg btn-primary" href="assets/images/img1.jpg" role="button">Read more!</a></p>
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="assets/images/img4.jpg" alt="Third slide">
                    <div class="container">
                    <div class="carousel-caption text-right">
                        <h1>See Vito in Action!</h1>
                        <p>Click below to see what Vito's been up to, on and off campus.</p>
                        <p><a class="btn btn-lg btn-primary" href="gallery.php" role="button">Browse gallery</a></p>
                    </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <!-- <span class="text-muted">It'll blow your mind.</span> -->
                    <h2 class="featurette-heading">Vito's Story</h2>
                    <p class="lead">
                        On May 5, 2015 somewhere in Mexico a yellow English Labrador Retriever is born.
                        His name is Vito. He is a cute, cuddly and fluffy puppy.
                        He spends the first two years of his life at a breeders in Mexico.
                        <br>
                        At two years old Vito made the journey from Mexico to Hill Country Dog Center in Texas.
                        In June 2017 an entourage from Eanes ISD made the journey to Pipe Creek
                        and selected Vito out of all the other dogs to come
                        and become part of the security team at Eanes ISD.
                        Vito remained at the trainers in Pipe Creek and in July,
                        Deputy Peals met Vito and together over the next two weeks they trained hard,
                        resulting in passing of required certification.
                        <br>
                        Vito arrived on campus and Deputy Peals began orientating him to the school.
                        They continue their training together with Travis County Sheriff's Office K9 unit.
                        Vito has been very successful since he first arrived here and is always looking for more to do.
                        He is happy when he is working and he is almost as happy when he is home relaxing.
                        <br>
                        <div class="smalltext">- Deputy B. Peals #3562 SRO Westlake High School</div>
                
                    </p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto"  alt="500x500" src="assets/images/img3.jpg" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- <hr class="featurette-divider"> -->

            <!-- /END THE FEATURETTES -->

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="assets/images/blank-profile-pic.png" alt="Deputy Peals" width="140" height="140">
                    <h2>Deputy Peals</h2>
                    <p>About the Deputy</p>
                    <p><a class="btn btn-secondary" href="#" role="button">Contact »</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <!-- <p>© 2021 Felix Chen</p> -->
        </footer>
    </main>

    <!-- Bootstrap Core JavaScript -->
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/libraries/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/libraries/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/libraries/popper.min.js"></script>
    <script src="assets/libraries/bootstrap.min.js"></script>

</body>
</html>