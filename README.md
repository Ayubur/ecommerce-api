# File Structure
├─ api/<br />
├─── config/<br />
├────── core.php - file used for core configuration<br />
├────── database.php - file used for connecting to the database.<br />
├─── objects/<br />
├────── product.php - contains properties and methods for "product" database queries.<br />
├────── category.php - contains properties and methods for "category" database queries.<br />
├─── product/<br />
├────── create.php - file that will accept posted product data to be saved to database.<br />
├────── delete.php - file that will accept a product ID to delete a database record.<br />
├────── read.php - file that will output JSON data based from "products" database records.<br />
├────── read_one.php - file that will accept product ID to read a record from the database.<br />
├────── update.php - file that will accept a product ID to update a database record.<br />
├────── search.php - file that will accept keywords parameter to search "products" database.<br />
├─── category/<br />
├────── read.php - file that will output JSON data based from "categories" database records.<br />

