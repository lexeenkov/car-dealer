<!DOCTYPE html>
<html lang="en">
<head>
    <title>Premium Deluxe Motorsport</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
    
  
    <form action="action/rating-act.php" method="post" id='login'>
    <label for="rating">SELECT AMOUNT OF RATING POINTS:</label>
    <select class="rating" name="rating">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
        <button type="submit" id='book'>SUBMIT RATING</button>
    </form>
    
    <?php include_once 'footer.php' ?>
    </body>
</html>

