<div class="left" id="sideBar">
    <i class="fa-solid fa-close " id="closeIcon2"></i>
    <div class="uleft">
        <div class="uuleft">
            <i class="fa-solid fa-user" id='fa-user-icon' style="color: white; font-size:25px; margin-right:10px"></i> <a>
                <?= $_SESSION['userEmail'] ?>

            </a>
        </div>
        <div class=" luleft">
            <?php

            if ($_SESSION['userRole'] == 'admin') {
            ?>
                <a href="adminBooks.php">
                    <i class="fa-solid fa-book"></i> Books
                </a>
                <a href="#">
                    <i class="fa-solid fa-cart-shopping"></i>Order
                </a>
                <a href="#">
                    <i class="fa-solid fa-users"></i> Users
                </a>
                <a href="adminCatagory.php">
                    <i class="fa-solid fa-cart-shopping"></i>Catagories
                </a>
                
            <?php } ?>
            <a href="adminAuthor.php">
                    <i class="fa-solid fa-cart-shopping"></i>Authors
                </a>
            <a href="./adminEvents.php">
                <i class="fa-regular fa-calendar-days"></i>Events
            </a>


        </div>
    </div>
    <div class="lleft">
        <i class="fa-solid fa-right-from-bracket"></i> <a href="middleware/logout.php">
            Logout
        </a>
    </div>
</div>