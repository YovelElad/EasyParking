    <section id="personal_details" class="system-message">
                <h1>פרטים אישיים</h1>
                <?php echo '<p id="name"><b>שם:</b> ' . $userRow["user_name"] .'</p>' ; ?>
                <?php echo '<p id="mail"><b>אימייל:</b> ' . $userRow["mail"] .'</p>';?>
                <?php echo '<p id="num"><b>מספר רכב:</b> ' . $userRow["license_plate"] . '</p>'; ?>
                <?php echo '<p id="address"><b>כתובת:</b> ' . $userRow["street"] . ' ' . $userRow["house"] . ', ' .$userRow["city"] . '</p>'; ?> 


                <?php echo '<a id="editButton" href="register.php?id='.$currId.'"></a>' ?>
                <a id="backButton" href="#"></a>
    
                <h3 id="edit">ערוך</h3>
                <h3 id="back">חזור</h3>
    </section>
