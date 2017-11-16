  <div class="mdl-layout__drawer mdl-color--blue-grey-800 mdl-color-text--blue-grey-50">
       <div class="profile">
           <img src="images/i_tried.png" class="avatar">
           <h4><?php //echo $_SESSION['firstname'];echo $_SESSION['lastname']; ?></h4>           
           <span><?php //echo $_SESSION['email']; ?></span>
       </div>

    <nav class="mdl-navigation mdl-color-text--blue-grey-300">
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="index.php"><i class="material-icons" role="presentation">dashboard</i> Dashboard</a>
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="userprofile.php"><i class="material-icons" role="presentation">person_pin</i> User Profile</a>
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="session.php?page=browse-employees.php"><i class="material-icons" role="presentation">people</i> Employees</a>
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="browse-books.php"><i class="material-icons" role="presentation">view_list</i> Books</a>
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="browse-universities.php"><i class="material-icons" role="presentation">account_balance</i> Universities</a>
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="analytics.php"><i class="material-icons" role="presentation">insert_chart</i> Analytics</a>  
        <a class="mdl-navigation__link mdl-color-text--blue-grey-300" name = "page" href="aboutus.php"><i class="material-icons" role="presentation">contacts</i> About</a>
       
    </nav>
  </div>