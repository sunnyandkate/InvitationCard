<div class="nav-container">
   
   <nav>
       <h2><a class="logo" href="index.php">Sunnys Wishlist</a></h2>
        <div class="toggle-menu">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
      
        <div class="desktop-menu">
            <ul>         
            <?php if (isset($_SESSION['user_logged_in']) || isset($_SESSION['admin_logged_in'])): ?>
                <li><a href="wishlist.php">Wishlist</a></li>
             <?php endif; ?>
             <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>               
                <li><a href="choosenitems.php">Chosen Presents</a></li>         
            <?php endif; ?>
             <?php if (isset($_SESSION['user_logged_in']) || isset($_SESSION['admin_logged_in'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
        </div>
    </nav>
    
</div>
<div class="mobile-menu">
        <ul>         
            <?php if (isset($_SESSION['user_logged_in']) || isset($_SESSION['admin_logged_in'])): ?>
                <li><a href="wishlist.php">Wishlist</a></li>
             <?php endif; ?>
             <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>               
                <li><a href="choosenitems.php">Chosen Presents</a></li>          
            <?php endif; ?>
            <?php if (isset($_SESSION['user_logged_in']) || isset($_SESSION['admin_logged_in'])): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>

        </ul>
</div>