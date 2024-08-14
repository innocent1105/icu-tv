<nav class="navbar">
       <button class="open-btn" onclick="openSidebar()">☰</button>
        <div class="logo">ICU ZAMBIA</div>
        <ul class="nav-links">
            <li><a href="./index.php">Home</a></li>
            <li><a href="#">Top news</a></li>
            <li><a href="#">Media Team</a></li>
            <!-- <li><a href="#"></a></li> -->

            <?php   
                if(!isset($_COOKIE['ICU_acc'])){
            ?>
            <li><a href="./signup.php">Sign In</a></li>
            <?php
                }
            ?>
        </ul>
        <div class="search-container">
            <input type="text" placeholder="Search..." id="search-bar">
            <button onclick="search()">Search</button>
        </div>
    </nav>