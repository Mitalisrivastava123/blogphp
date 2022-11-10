<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light nav1">

  <a class="navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admindashboard.php"><span class="dash1">Admin Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userregister1.php"><span class="dash1">User Login Page</span></a>
      </li>

    </ul>
  </div>
</nav>



    <div class="container">
        <section class="h-100 h-custom" style="background-color: #0dcaf0;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                        <div class="card rounded-3">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;width:700px;" alt="Sample photo">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                                <form class="px-md-2" action="userregister.php" method="POST">

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1q" class="form-control" name="name" />
                                        <label class="form-label" for="form3Example1q">Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1q" class="form-control" name="email" />
                                        <label class="form-label" for="form3Example1q">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1q" class="form-control" name="password"/>
                                        <label class="form-label" for="form3Example1q">Password</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1q" class="form-control" name="cpassword"/>
                                        <label class="form-label" for="form3Example1q">Confirm Password</label>
                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="user_type">
                                        <option selected>Usertype</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                       
                                    </select>

                       <br>
                                    <button type="submit" class="btn btn-success btn-lg mb-1">Register Here</button>
                                    <p>Sign In <a href="userregister1.php">Login</a></p>
    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </section>
    </div>
</body>

</html>