<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="asset/img/images.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact US</title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="asset/css/navbar-dukaan.css">
    <link rel="stylesheet" href="asset/css/styles.css">
</head>

<body >
    <form action="db_connect.php" method="POST">
    <body style="background-image: url(&quot;asset/img/asd.jpg&quot;);">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-md fixed-top bg-info border-info">
                <div class="container-fluid"><img id="logo" src="asset/img/images.png"><a class="navbar-brand" id="brand" href="/AD/index.php"><strong>Apni Dukaan</strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="/AD/index.php"><strong>Home</strong></a></li>
                            <li class="nav-item" role="presentation"></li>
                        </ul>
                </div>
        </div>
        </nav>
        <h1 style="color: rgb(2,6,10);">Contact Information</h1>
        <hr>
        <form id="contactForm" action="javascript:void(0);" method="get"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.apnidukan.com"><input class="form-control" type="hidden" name="subject" value="Apnidukan.com Contact Form"><input class="form-control" type="hidden"
                name="to" value="gapu8540@gmail.com">
            <div class="form-row">
                <div class="col-md-6">
                    <div id="successfail"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-md-6" id="message" style="padding-right: 10px;">
                    <h2 class="h4" style="color: rgb(3,5,7);font-size: 28px;"><i class="fa fa-envelope"></i> <strong> Contact Us</strong><small><small class="required-input"><strong>&nbsp; (*required)</strong></small></small>
                    </h2>
                    <div class="form-group"><label for="from-name">Name</label><span class="required-input">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" id="from-name" name="name" required="" placeholder="Full Name"></div>
                    </div>
                    <div class="form-group"><label for="from-email"><strong>Email</strong></label><span class="required-input">*</span>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" id="from-email" name="email" required="" placeholder="Email Address"></div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                            <div class="form-group"><label for="from-phone"><strong>Phone</strong></label><span class="required-input">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" id="from-phone" name="phone" required="" placeholder="Primary Phone"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                            <div class="form-group"><label for="from-calltime"><strong>Best Time to Call</strong></label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div><select class="form-control" id="from-calltime" name="calltime"><optgroup label="Best Time to Call"><option value="Morning" selected="">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></optgroup></select></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label for="from-comments"><strong>Comments</strong></label><textarea class="form-control" id="from-comments" name="comments" placeholder="Enter Comments" rows="5"></textarea></div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col"><button class="btn btn-primary btn-block" type="reset"><i class="fa fa-undo"></i> Reset</button></div>
                            
                            
                            
                            <div class="col"><button class="btn btn-primary btn-block" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                        </div>
                    </div>
                    <hr class="d-flex d-md-none">
                </div>
                <div class="col-12 col-md-6">
                    <h2 class="h4" style="font-size: 28px;"><i class="fa fa-location-arrow"></i> <strong>Locate Us</strong></h2>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="static-map"><a rel="noopener" href="https://www.google.com/maps/place/Shri+Madhwa+Vadiraja+Institute+of+Technology+and+Management/@13.2546004,74.7828844,17z/data=!3m1!4b1!4m5!3m4!1s0x3bbcaffcb81452c5:0xb18b6b77e04b088b!8m2!3d13.2545952!4d74.7850731"
                                    target="_blank"> <img class="img-fluid" src="asset/img/map1.png" alt="Google Map of Daytona International Speedway" style="height: 350px;width: 750px;padding-top: 40px;padding-left: 20px;padding-right: 20px;"></a></div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6" style="background-color: t;">
                            <h2 class="h4" style="font-size: 28px;"><i class="fa fa-user"></i><strong> Our Info</strong></h2>
                            <div><span><strong>Apni Dukaan</strong><br></span></div>
                            <div><span>help.apnidukan@gmail.com</span></div>
                            <div><span>www.troupertech.com</span></div>
                            <hr class="d-sm-none d-md-block d-lg-none">
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <h2 class="h4" style="font-size: 28px;"><i class="fa fa-location-arrow"></i> <strong>Our Address</strong></h2>
                            <div><span><strong>Office Name</strong></span></div>
                            <div><span>CEE Department, SMVITM</span></div>
                            <div><span>Vishwothama Nagar,Bantakal</span></div>
                            <div><span>574115, Ph:7019731845</span></div>
                            <hr class="d-sm-none">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
    </form>
</body>

</html>