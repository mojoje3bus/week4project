<?php
    $Title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $Description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);

    $Title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_STRING);
    $Description = filter_input(INPUT_GET, "description", FILTER_SANITIZE_STRING);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href= "css/main.css">
</head>
<body>
    <main>
        <header>
            <h1>To Do List</h1>
        </header>
        <?php if (!$Title && !$newTitle) { ?>}
            <section>
                <h2> Add Item To List</h2>
                <form action ="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="description">Description:</label>
                    <input type="description" id="description" name="description" required>
                    <button>Add Item</button>
                </form>
            </section>
        <?php } else { ?>
            <?php require("database.php"); ?>

            <?php
                if ($newTitle) {
                    $query = "INSERT INTO todoitems
                                    (Title,Description)
                                VALUES
                                    (:newTitle, newDescription)";
                   
                    $statement = $db->prepare($query);

                    $statement->bindValue(':newTitle', $newTitle);
                    $statement->bindValue(':newDescription', $newDescription);
                    $statement->execute();
                    $statement->closeCursor();
                }
            
           //    if($Title || $newTitle) {
            //        $query = 'SELECT * FROM Title
              //                  ORDER BY ItemNum ASC';
                //    $statement = $db->prepare($query);
                 //  if ()
               }
               ?>
            <?php 
               $todoitems = $statement->query("SELECT * FROM todoitems ORDER BY ItemNum ASC");
            ?>

        
    </main>
</body>
</html>