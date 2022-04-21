<?php
/*
functions, header and navigation must be included
*/

/*
2022-04-07
Things TO DO and to find out:
STYLE STUFF:
-- How to keep multiple pages in one style , with one footer and header. Perhaps
-- how to make LIST of cars with its make in bold font over it

DATABASE STUFF:
-- How to link database and use it
-- How to create a page with a list of products from the database
-- Login and registration system https://www.youtube.com/watch?v=gCo6JqGMi30
-- How to output images which are assigned to the product in the DATABASE , perhaps?
-- How to use the same sample page for every product in database and just cahnge the parameters and description

-- Rating database is going to be more about style, shouldn't be too hard , to implement

NON-TECH stuff:
-- LIST OF CARS AND specs
-- Images from GT or Forza , maybe even a complete database of them

Steps:
-- Setup database for logins , so they work
-- Setup a basic page with the list of cars , which would be linked to the database
-- 

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple HTML document</title>
</head>
<body>
    
<?php include_once 'header.php' ?>
<section>
		<p>Welcome to the TWD sportcar website. Our company focuses primarily on the segment of exclusive and premium sports cars. We use a network of business partners across Europe to sell vehicles to meet our clients' needs as much as possible. Based on good contacts and low cost, TWD sportcar offers you the best vehicles on the market.</p>
		<p>In addition to sales, we offer test drives on the circuit. If you are interested, choose from our <a href="cars.php">cars</a>.</p>
		<p>If you have any questions, please feel free to contact us.</p>
		
</section>
    <?php include_once 'footer.php' ?>
    </body>
</html>
<?php
/*
footer must be included
*/
?>
