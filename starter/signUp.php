<?php
    include 'scripts.php' ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/starter/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/starter/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="parent">
        <div class="child">
            <div class="sous-child">
            <form action="scripts.php" method="POST" class="myForm">
                <div class="mt-4 mx-5 text-center">
                    <img src="/design/img/form/utilisateur.png" width="150" height="150">
                </div>

                <?php if(isset($_SESSION['check'])) : ?> 
                        <div class="text-danger text-center">
                            <?php echo $_SESSION['check']; ?>
                        </div>
                        <?php unset($_SESSION['check']); ?>
                <?php endif ?>

                <div class="mb-3 mx-5 position-relative">
                    <i class="fa fa-user text-white position-absolute"></i>
                    <input class="form-control inputs text-white ps-4" type="text" name="username" id="username" placeholder="username" required>
                </div>

                <div class="mb-3 mx-5 position-relative">
                    <i class="fa fa-envelope text-white position-absolute"></i>
                    <input class="form-control inputs text-white ps-4" type="email" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="mb-3 mx-5 position-relative">
                    <i class="fa fa-lock text-white position-absolute"></i>
                    <input class="form-control inputs text-white ps-4" type="password" name="password" id="password" placeholder="password" required>
                </div>

                <div class="mb-3 mx-5 text-white">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Remember me ?</label>
                </div>

                <div class="mb-3 mx-5 text-center">
                    <button class="signUpButton text-white" type="submit" name="register">Sign Up</button>
                </div>

                <div class="text-center">
                    <a href="/starter/signIn.php" class="account text-white">Already have an account? <b>Sign In</b></a>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>