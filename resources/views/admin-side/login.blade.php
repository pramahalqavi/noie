<!DOCTYPE html>
<html>
<head>

    <title>Log In</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="http://archaea.sith.itb.ac.id/wp-content/themes/zerif-lite/custom/assets/login.css" > -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container">
        <div class="col-lg-10" style="width: 60%; margin: 8em 20%; text-align: center; font-weight: bold">
            <div class="jumbotron">
                <div class="form-group">
                    <h1>
                        LOGIN
                    </h1>
                </div>

                <form class="form-horizontal" style="margin: 0 10%" action="">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                      </div>
                      <input type="email" class="form-control" placeholder="Enter email..." aria-label="Email" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                      </div>
                      <input type="password" class="form-control" placeholder="Enter password..." aria-label="Password" aria-describedby="basic-addon1" required>
                    </div>
                    <!-- <div classs="form-group input-group-prepend">
                        <span class="input-group-text">
                            text
                        </span>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email..." required="">
                    </div>

                    <div classs="form-group row input-group" style="margin-top: 0.5em">
                        <input type="password" class="form-control" name="password" placeholder="Enter password...">
                    </div> -->

                    <div classs="form-group row input-group" style="margin-top: 2em">
                        <!-- <button class="btn btn-primary" style="width: 100%">Login</button> -->
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>