<?php
    include 'database.php' ;

    session_start() ;
    if(isset($_POST['save'])) addBooks() ;
    if(isset($_POST['register'])) register() ;
    if(isset($_POST['signIn'])) signIn() ;
    if(isset($_POST['update'])) updateProfile() ;
    if(isset($_POST['edit'])) updateBook() ;
    if(isset($_POST['confirm'])) deleteBook() ;



function addBooks(){
    
    global $connection ;
    $title       = $_POST['title'] ;
    $author      = $_POST['author'] ;
    $category    = $_POST['category'] ;
    $photo       = $_FILES['img']['name'] ;
    $price = $_POST['price'] ;

    $upload = dirname(__DIR__,1)."/design/img/books/".$photo ;
    echo $upload ;
    move_uploaded_file($_FILES['img']['tmp_name'], $upload) ;

    $sql = "INSERT INTO `book` (`id-book`, `title`, `author`, `price`, `photo`, `categoryId`) 
    VALUES (null, '$title', '$author', $price, '$photo', $category)" ;

    $result = mysqli_query($connection, $sql) ;
    
    if($result){
        $data = 1 ;
        header("location: books.php?addModal=".$data) ;
    }
}

function getBooks(){
    global $connection ;
    $sql = "SELECT title, author, price, photo, categoryName, photo, `id-book` FROM book JOIN category ON book.categoryId = category.categoryId" ;
    $result = mysqli_query($connection, $sql) ;
    
        ?>
            <div class="table_books">
                <table class="table books bg-white">
                    <thead>
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th class="bookAuthor" scope="col">Author</th>
                            <th class="bookPrice" scope="col">Price</th>
                            <th book="bookCategory" scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td id="bookId<?php echo $row['id-book']?>" hidden> <?php echo $row['id-book'] ?> </td>
                            <td><img src="/design/img/books/<?php echo $row['photo'] ?>" width="30px" height="40px" id="bookPhoto<?php echo $row['id-book']?>"></td>
                            <td id="bookTitle<?php echo $row['id-book']?>"><?php echo $row['title'] ?></td>
                            <td class="bookPhoto" id="bookAuthor<?php echo $row['id-book']?>"> <?php echo $row['author'] ?></td>
                            <td class="bookPrice" id="bookPrice<?php echo $row['id-book']?>"><?php echo $row['price']?> DH</td>
                            <td class="bookCategory" id="bookCategory<?php echo $row['id-book']?>"><?php echo $row['categoryName'] ?></td>
                            <td class="">
                                <button onclick="editBook(<?php echo $row['id-book']?>)" class="btn btn-rounded btn-secondary p-0 col-6" data-bs-toggle="modal" data-bs-target="#editbook">Edit</button>
                                <form action="" method="post">
                                    <input type="hidden" name="id-book" value="<?php echo $row['id-book']?>">
                                <button type="button" class="btn btn-rounded btn-danger text-white p-0 col-6" name="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="confirmDelete(<?php echo $row['id-book']?>)">delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $_SESSION['id-book'] = $row['id-book'] ;
                        }
                        ?>
                    </tbody>
                </table>
                </div>
                <?php
            
    }
}

function countBooks(){
    global $connection ;
    $sql = " SELECT COUNT(title) AS numberBooks FROM book " ;
    $result = mysqli_query($connection, $sql) ;
    $data = mysqli_fetch_assoc($result) ;
    echo $data['numberBooks'] ;
}

function countUsers(){
    global $connection ;
    $sql = " SELECT COUNT(userId) AS numberUsers FROM user " ;
    $result = mysqli_query($connection, $sql) ;
    $data = mysqli_fetch_assoc($result) ;
    echo $data['numberUsers'] ;
}

function countCategories(){
    global $connection ;
    $sql = " SELECT COUNT(categoryName) AS numberCategories FROM category " ;
    $result = mysqli_query($connection, $sql) ;
    $data = mysqli_fetch_assoc($result) ;
    echo $data['numberCategories'] ;
}

function recentBooks(){ 
    global $connection ;
    $sql = " SELECT title, categoryName, photo, price, author FROM book JOIN category ON book.categoryId = category.categoryId ORDER BY title DESC LIMIT 3 " ;
    $result = mysqli_query($connection, $sql) ; ?>
    <table class="table bg-white">
                <thead>
                    <tr>
                        <th scope="col">photo</th>
                        <th scope="col">Name</th>
                        <th class="bookAuthor" scope="col">Author</th>
                        <th class="bookPrice" scope="col">Price</th>
                        <th class="bookCategory" scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    while ($data = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><img src="/design/img/books/<?php echo $data['photo'] ?>" width="30px" height="40px"></td>
                        <td><?php echo $data['title'] ?></td>
                        <td class="bookAuthor"><?php echo $data['author'] ?></td>
                        <td class="bookPrice"><?php echo $data['price'] ?> DH</td>
                        <td class="bookCategory"><?php echo $data['categoryName'] ?></td>
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
    $password   = ($_POST['password']) ;

    $check      = " SELECT * FROM `user` WHERE `email` = '$email' AND `username` = '$username' " ;
    $result     = mysqli_query($connection, $check) ;

    if (mysqli_num_rows($result) > 0) {
        header("location: signUp.php") ;
        $_SESSION['check'] = "This email or username already exists!" ;
    }

    else {
        $sql    = " INSERT INTO `user` VALUES (null, '$username', '$email', '$password') " ;
        $result2 = mysqli_query($connection, $sql) ;
        header("location: dashboard.php") ; 
        
    }
}

function signIn(){
    global $connection ;
    $email      = trim(strtolower($_POST['email'])) ;
    $password   = ($_POST['password']) ;

    $sql        = " SELECT * FROM `user` WHERE `email` = '$email' AND `userPassword` = '$password' "  ;
    $result     = mysqli_query($connection, $sql) ;
    $row        = mysqli_fetch_assoc($result) ;

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['id']         =  $row['userId'] ;
        $_SESSION['username']   =  $row['username'] ;
        $_SESSION['email']      =  $row['email'] ;
        $_SESSION['password']   =  $row['userPassword'] ;
        header("location: dashboard.php") ;
        $_SESSION['welcomeBack']    = " 👋 Welcome back<b> ".$_SESSION['username']."</b> !";

    }

    else {
        header("location: signIn.php") ;
        $_SESSION['invalid'] = " Invalid username or password! " ;
    }
}

function recentUsers(){
    global $connection ;
    $rec = " SELECT username, email FROM user ORDER BY username DESC LIMIT 3 " ;
    $res = mysqli_query($connection, $rec) ; ?>
    <table class="table bg-white">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center h3">Recent Users</th>
                    </tr>
                    <tr>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                    while ($data = mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                    </tr>
                <?php
                    } 
                ?>
                </tbody>
              </table>
<?php
}

function updateProfile(){
    global $connection ;
    $username   = trim(strtolower($_POST['username'])) ;
    $email      = trim(strtolower($_POST['email'])) ;
    $password   = ($_POST['password']) ;
    $id         = $_SESSION['id'] ;

    if($id)
    {
        $update  = " UPDATE user SET username = '$username', email = '$email', userPassword = '$password' WHERE userId = '$id' ";
        $result2    = mysqli_query($connection, $update);

        $sql        = " SELECT * FROM `user` WHERE `email` = '$email' AND `userPassword` = '$password' "  ;
        $result     = mysqli_query($connection, $sql) ;
        $row        = mysqli_fetch_assoc($result) ;
        $_SESSION['welcomeBack']    = " 👋 Welcome back<b> ".$row['username']."</b> !";
        $_SESSION['username'] = $row['username'] ;
        header('location: dashboard.php') ;
       
    }

}

function updateBook(){
    global $connection ;
    $id          = $_POST['id-book'] ;
    $title       = $_POST['title'] ;
    $author      = $_POST['author'] ;
    $category    = $_POST['category'] ;
    $photo       = $_FILES['img']['name'] ;
    $price       = $_POST['price'] ;

    $upload = dirname(__DIR__,1)."/design/img/books/".$photo ;
    move_uploaded_file($_FILES['img']['tmp_name'], $upload) ;

    $sql = " UPDATE book SET `title` = '$title', `author` = '$author', `categoryId` = $category, `photo` = '$photo', `price` = '$price' WHERE `id-book` = $id " ;
    $result = mysqli_query($connection, $sql);
    if($result){
        $data = 2 ;
        header('location: books.php?updateModal='.$data) ;
    }
}

function deleteBook(){
    global $connection ;
    $id     = $_POST['bookId'] ;
    $sql    = " DELETE FROM book WHERE `id-book` = $id " ;
    $result = mysqli_query($connection, $sql) ;

    if ($result) 
    {
        header("location: books.php") ;
    }
}
