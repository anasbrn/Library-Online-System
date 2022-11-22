<body class="dashboard_page">
    <div id="mySidebar" class="sidebar">
        <div class="logo ">
            <img src="/design/img/cloud-bookmark.svg" alt="">
            <h5 class="text-white">Cloud Library</h5>
        </div>

        <a href="javascript:void(0)" id="closebtn" class="closebtn" onclick="closeNav()">&times;</a>

        <div class="items">
            <li class="list active"> <i class="fa fa-desktop text-muted"></i><a  class="text-muted" href="dashboard.php">Dashboard</a> </li>
            <li class="list active"> <i class="fa fa-book text-muted"></i><a class="text-muted" href="books.php">Books</a> </li>
            <li class="list active"> <i class="fa fa-user text-muted"></i><a class="text-muted" href="profile.php">Profile</a> </li>
            <li class="list active"> <i class="fa fa-sign-out-alt text-muted"></i><a class="text-muted" href="logout.php">Logout</a> </li>
        </div>
      </div>
      
      <div id="main">
        <button id="openbtn" class="openbtn" onclick="openNav()">&#9776;</button>
      </div>
      

    <section id="interface">
        <div class="navigation">
            <div class="nav">
            <div class="profile">
                <i class="fa fa-user-circle text-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                </div>
                </div>
                </div>
            </div>
        </div> 