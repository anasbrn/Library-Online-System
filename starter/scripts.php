<?php
    include 'database.php' ;

    session_start() ;
    if(isset($_POST['save'])) addBooks() ;
    if(isset($_POST['register'])) register() ;
    if(isset($_POST['signIn'])) signIn() ;


function addBooks(){
    global $connection ;
    $title       = $_POST['title'] ;
    $author      = $_POST['author'] ;
    $category    = $_POST['category'] ;
    $photo       = $_FILES['img']['name'] ;
    $description = $_POST['description'] ;

    $upload = "C:/Users/Youcode/Documents/Library-Online-System/design/img/books/".$photo ;
    move_uploaded_file($_FILES['img']['tmp_name'], $upload) ;

    $sql = "INSERT INTO `book` (`id-book`, `title`, `author`, `description`, `photo`, `categoryId`) 
    VALUES (null, '$title', '$author', '$description', '$photo', $category)" ;

    $result = mysqli_query($connection, $sql) ;
    if($result){
        echo "Book has been added successfully" ;
    }

    else {
        "error" ;
    }

}

function getBooks(){
    global $connection ;
    $sql = "SELECT title, author, description, photo, categoryName, photo FROM book JOIN category ON book.categoryId = category.categoryId" ;
    $result = mysqli_query($connection, $sql) ;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="card_books">
                <div class="card my-2">
                    <img class="card-img-top" src="/design/img/books/<?php echo $row['photo'] ?>" height="220px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title'] ?></h5>
                    <p class="card-text"><b>Author</b>: <?php echo $row['author'] ?></p>
                    <p ><b>Category</b> : <?php echo $row['categoryName'] ?></p>
                    <a href="#" class="btn btn-info text-white">Buy</a>
                </div>
            </div>
            <?php
        }
    }
}

function countBooks(){
    global $connection ;
    $sql = " SELECT COUNT(title) AS numberBooks FROM book " ;
    $result = mysqli_query($connection, $sql) ;
    $data = mysqli_fetch_assoc($result) ;
    echo $data['numberBooks'] ;
}

function recentBooks(){
    global $connection ;
    $sql = " SELECT title, categoryName FROM book JOIN category ON book.categoryId = category.categoryId ORDER BY title DESC LIMIT 3 " ;
    $result = mysqli_query($connection, $sql) ; ?>
    <table class="table bg-white">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center h3">Recent books</th>
                    </tr>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    while ($data = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $data['title'] ?></td>
                        <td><?php echo $data['categoryName'] ?></td>
                    </tr>
                <?php
                    } 
                ?>
                </tbody>
              </table>
<?php
}

function register(){
    global $connection ;
    $username   = trim(strtolower($_POST['username'])) ;
    $email      = trim(strtolower($_POST['email'])) ;
    $password   = md5($_POST['password']) ;

    $check      = " SELECT * FROM `user` WHERE `email` = '$email' " ;
    $result     = mysqli_query($connection, $check) ;
    $row        = mysqli_fetch_assoc($result) ;
    if (mysqli_num_rows($result) > 0) {
        header("location: signUp.php") ;
        $_SESSION['check'] = "This email already exists!" ;
    }

    else {
        $sql    = " INSERT INTO `user` VALUES (null, '$username', '$email', '$password') " ;
        $result2 = mysqli_query($connection, $sql) ;
    }

    if ($result2){
        header("location: dashboard.php") ; 
        // $_SESSION['welcome']    = " 👋 Welcome.$row['username']" ;
        echo "Add successfully" ;
        
    }

    else {
        echo "Failed!" ;
    }
    echo "end" ;
}

function signIn(){
    global $connection ;
    $email      = trim(strtolower($_POST['email'])) ;
    $password   = md5($_POST['password']) ;
    $sql        = " SELECT * FROM `user` WHERE `email` = '$email' AND `userPassword` = '$password' "  ;
    $result     = mysqli_query($connection, $sql) ;
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email']      = '$email' ;
        $_SESSION['password']   = '$password' ;
        header("location: dashboard.php") ;
    }

    else {
        header("location: signIn.php") ;
        $_SESSION['invalid'] = " Invalid username or password! " ;
    }
}