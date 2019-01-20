<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Site Checker</title>
</head>

<body>
    <div class="app">
        <div class="container">
            <header>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title pt-5">
                            <h1 class="text-center">
                                Site Checker
                            </h1>
                        </div>
                    </div>
                </div>
            </header>
            <div class="main-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form mx-auto pt-5" style="width:320px;">
                            <form action="formController.php" method="POST">
                                <div class="form-group">
                                    <label for="url">Enter URL</label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="robots" name="robots">
                                    <label class="form-check-label" for="robots">Get robots.txt</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="sitemap" name="sitemap">
                                    <label class="form-check-label" for="sitemap">Get sitemap</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Check!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>