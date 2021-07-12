


<div id="hamburger">
    <div id = "ham" ></div> 
    <section id="links">
        <ul>
            <?php echo '<li class="search"><img src="images/search-icon.png"><a href="search.php?id='.$currId.'">חיפוש</a></li>' ?>
            <li class="home"><img src="images/home-icon.png"><a href="#">בית</a></li>
            <li class="work"><img src="images/work-icon.png"> <a href="#">עבודה</a></li>
            <?php 
                if($user_role != "admin")
                    echo '<li class="bad-park"><img src="images/outlined-flag-icon.png"><a href="#">דווח על חניה</a></li>';
                else 
                    echo '<li class="bad-park"><img src="images/outlined-flag-icon.png"><a id="add-parking" href="newParkingForm.php?id='.$currId.'">הוסף חניה</a></li>';
            ?>
            <li class="settings"><img src="images/settings-icon.png"> <a href="#">הגדרות</a></li>
            <li class="disconect"><img src="images/highlight-off-icon.png"><a href="login.php">התנתק</a></li>
        </ul>
    </section>
</div>

