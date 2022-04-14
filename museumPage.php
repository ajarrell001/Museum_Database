<!-- Alyssa Jarrell
CIS 244 Spring 2021
Professor Laurence Liss
Week 7: Museum Database Lab-->


<!-- INDEX: Use the following to search through page for specific parts of code

        BUTTONFULL: ALTER BASED ON FOLDER LOCATION -- SHOWS FULL LIST/REFRESHES PAGE

        ADD1, ADD2: Code involved in adding new rows
        DELETE1, DELETE2, DELETE3: Code involved in deleting existing rows
        DROP1, DROP2, DROP3, DROP4: Code involved in forming country drop down list
        DROPCITY1, DROPCITY2, DROPCITY3, DROPCITY4: Code involved in forming city drop down list
        FULL1, FULL2: Code involved in generating full museum list (default list)
        EDIT1, EDIT2, EDIT3, EDIT3: Code involved in updating museum records in db 

     
         -->

<?php
    // museumPage.php

    //connects to database file
    $museumDb = new PDO('sqlite:dbmuseums.db');

    if (isset($_POST['add'])) { //creates SQL query string to add data (ADD1)
    $queryString = "INSERT INTO museums(museum_name, country, city)
                    VALUES ('" . $_POST['museum_name'] . "', 
                    '" .  $_POST['country_name'] . "', 
                    '" .  $_POST['city'] . "')";    
    // var_dump($queryString);

    $query = $museumDb->prepare($queryString); //prepares query
    $query->execute(); //executes query
      }

    if (isset($_POST['delete'])) { // creates SQL query string to delete data (DELETE1)
    $queryString = 'DELETE FROM museums WHERE museum_id = ' . $_POST['museum_id'];
   // var_dump("<br>" . $queryString);

    $query = $museumDb->prepare($queryString); //prepares query
    $query->execute(); //executes query

    }

    
    if (isset($_POST['update'])) {//creates SQL query string to update information (EDIT1)
        $queryString = "UPDATE museums 
                        SET museum_name = '" . $_POST['museum_name'] . "',
                            country = '" . $_POST['country_name'] . "',
                            city = '" . $_POST['city'] . "'
                        WHERE museum_id = " . $_POST['museum_id'];

        //var_dump($queryString);
        $query = $museumDb->prepare($queryString); //prepares query
        $query->execute(); //executes query
    }


    if (isset($_GET['museum_id'])) { //creates SQL query string to retrieve museum_id
        $queryString = 'SELECT * FROM museums WHERE museum_id =' . $_GET['museum_id'];
        //var_dump($queryString);

        $query = $museumDb->prepare($queryString); //prepares query
        $query->execute(); //executes query
        $museumEdit = $query->fetch(PDO::FETCH_ASSOC); //fetches data from record to edit

        //var_dump($museumEdit);
    }

    //query to find full museum and country list--> full country table on page (FULL1)
    $query = $museumDb->prepare('SELECT * FROM museums ORDER BY museum_name ASC');
    $query->execute();
    $museums = $query->fetchAll(PDO::FETCH_ASSOC);

    //query to find all countries containing museums (listed once)-->select drop down list (DROP1)
    $country = $museumDb->prepare('SELECT DISTINCT country FROM museums ORDER BY country ASC');
    $country->execute();
    $countryLists = $country->fetchAll(PDO::FETCH_ASSOC);


    
    //query to find all cities containing museums (listed once)-->select drop down list (DROPCITY1)
    $city = $museumDb->prepare('SELECT DISTINCT city FROM museums WHERE city IS NOT NULL ORDER BY city ASC;');
    $city->execute();
    $cityLists = $city->fetchAll(PDO::FETCH_ASSOC);


   // var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>Art Museums of the World</title>
</head>

<body>

    <h1>Art Museums of the World</h1>

    <div id="form">
        <form method="GET"> 
            <fieldset>
                <legend><strong>Select from the drop down list below to narrow your search results by location</strong></legend>

                <!--START country drop down list (DROP2)-->
                    <select name="country" id="country">
                        <option value="countrydrop" label="Country" selected disabled hidden>Country</option>

                        <!-- foreach loop loops through db and sets country names from db as select list options (DROP3)-->
                        <?php foreach($countryLists as $countryList): ?>

                            <option value="<?php print $countryList['country']; ?>"><?php print $countryList['country']; ?></option>

                        <?php endforeach; ?>

                    </select>
            
                    <input type="submit" name="submit" value="Submit">
                    
                    <!--button to reset the page, alter based on folder-->
                    <a href="/MuseumDbLab2_Alyssa_Jarrell/museumPage.php" class="button">Show Full List</a> <!--clears data by reloading the page-->
                 <!--END country drop down list (DROP2)-->


                <!--START city drop down list (DROPCITY2)-->
                    <select name="city" id="citydrop">
                        <option value="citydrop" label="City" selected disabled hidden>City</option>

                        <!-- foreach loop loops through db and sets city names from db as select list options (DROP3)-->
                        <?php foreach($cityLists as $cityList): ?>
                            <option value="<?php print $cityList['city']; ?>"><?php print $cityList['city'];?></option>
                        <?php endforeach; ?>
                    </select>
            
                    <input type="submit" name="submit" value="Submit">
                    
                    <!--button to reset the page, alter based on folder (FULLBUTTON)-->
                    <a href="/MuseumDbLab2_Alyssa_Jarrell/museumPage.php" class="button">Show Full List</a> <!--clears data by reloading the page-->
                <!--END city drop down list (DROPCITY2)-->
            </fieldset>
        </form>
    </div>



<div class = "column1">

<!-- Get request to see which country was selected from drop down list (DROP4 - LIST)-->
    <?php if (isset($_GET['country']) && !empty($_GET)): ?>
        <?php $countryName = htmlspecialchars($_GET['country']); 
              
        print '<h2>Museums: ' . $countryName . '</h2>'; 
        //var_dump($countryName);

        //query to find country and museum_name and city for country selected from drop down list 
        $new = $museumDb->prepare("SELECT country, museum_name, city FROM museums WHERE country = '$countryName'");
        $new->execute();
        $newLists = $new->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!--If form is submitted, table will be generated on page with selected country info from above query -->
        <table>
            <tr>
                <th>Museum Name</th>
                <th id="col2">Country</th>
                <th>City</th>

            </tr>
        
            <!--loops through selected country data and prints it to page in table-->
            <?php foreach ($newLists as $newList): ?>
                
                <tr>
                    <td><?php print $newList['museum_name']; ?></td>
                    <td><?php print $newList['country']; ?></td>
                    <td><?php print $newList['city']; ?></td>
                </tr>
                
            <?php endforeach; ?>
        </table><br><br>  
        
<!-- END (DROP4 - LIST) -->


<!-- Get request to see which country was selected from drop down list (DROPCITY4 - LIST)-->
<?php elseif (isset($_GET['city']) && !empty($_GET)): ?>
        <?php $cityName = htmlspecialchars($_GET['city']); 
              
        print '<h2>Museums: ' . $cityName . '</h2>'; 


        //query to find country and museum_name and city for country selected from drop down list 
        $new = $museumDb->prepare("SELECT country, museum_name, city FROM museums WHERE city = '$cityName'");
        $new->execute();
        $newLists = $new->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!--If form is submitted, table will be generated on page with selected country info from above query -->
        <table>
            <tr>
                <th>Museum Name</th>
                <th id="col2">Country</th>
                <th>City</th>

            </tr>
        
            <!--loops through selected country data and prints it to page in table-->
            <?php foreach ($newLists as $newList): ?>
                
                <tr>
                    <td><?php print $newList['museum_name']; ?></td>
                    <td><?php print $newList['country']; ?></td>
                    <td><?php print $newList['city']; ?></td>
                </tr>
                
            <?php endforeach; ?>
        </table><br><br>  
        
<!-- END (DROPCITY4 - LIST) -->



    <?php else: ?> <!--If there is no selection submitted, the following will show full museum table (FULL2)-->
         
        <?php print '<h2>Full Museum List</h2>'; ?>
        
          <table>
                <tr>
                    <th>Museum Name</th>
                    <th id="col2">Country</th>
                    <th>City</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
        
                <?php foreach ($museums as $museum): ?>
            
                    <tr>
                        <td><?php print $museum['museum_name']; ?></td>
                        <td><?php print $museum['country']; ?></td>
                        <td><?php print $museum['city']; ?></td>
                        <td>
                            <form method ="GET">
                                <!--Hidden type for edit button to retrieve museum_id when Edit button is clicked (EDIT2)-->
                                <input type = "hidden" value="<?php print $museum['museum_id']; ?>" name="museum_id">
                                <!-- EDIT BUTTON (EDIT3) -->
                                <input type = "submit" value = "Edit" name = "edit"></form>  
                        </td>
                        <td>
                            <form method ="POST">
                                <!--Hidden type for delete button to retrieve correct info for deletion (DELETE2)-->
                                <input type = "hidden" value="<?php print $museum['museum_id']; ?>" name="museum_id">
                                <!-- DELETE BUTTON (DELETE3) -->
                                <input type = "submit" value = "Delete" name = "delete"></form>  
                        </td>
                    </tr>
            
                <?php endforeach; ?>
            </table>
<!-- END FULL2 -->

    <?php endif ?>
</div>

<div class="column2">
    <h3>Update List</h3>
    <!-- Form for when Edit button is clicked (EDIT4) -->
        <?php if (isset($museumEdit)): ?>

            <form method="POST">
            
            <div>
                <label for="museum_name">Museum Name:</label>
                <input required type="text" id="museum_name" name="museum_name" value = "<?php print $museumEdit['museum_name']; ?>">
            </div>
            <div>
                <label for="country_name">Country:</label>
                <input type="text" id="country_name" name="country_name" value = "<?php print $museumEdit['country']; ?>">
            </div>
            <div>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" value = "<?php print $museumEdit['city']; ?>">
            </div>
            <div>
                <input type = "hidden" value="<?php print $museumEdit['museum_id']; ?>" name="museum_id">
                <input type="submit" name="update" value="Edit Museum">
            </div>
            <div>
                <input type="submit" name="add" value="Add new museum">
            </div>
        </form>
    <!-- END EDIT ROW (EDIT4)-->

        <?php else: ?>

    <!-- ADD NEW ROW (ADD2)-->
        <form method="POST">
            <div>
                <label for="museum_name">Museum Name:</label>
                <input required type="text" id="museum_name" name="museum_name">
            </div>
            <div>
                <label for="country_name">Country:</label>
                <input required type="text" id="country_name" name="country_name">
            </div>
            <div>
                <label for="city">City:</label>
                <input required type="text" id="city" name="city">
            </div>
            <div>
                <input type="submit" name="add" value="Add new museum">
            </div>
        </form>
    <!-- END ADD NEW ROW (ADD2)-->
</div>

<?php endif; ?>




</body>
</html>