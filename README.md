# File Structure
├─ api/
├─── config/
├────── core.php - file used for core configuration
├────── database.php - file used for connecting to the database.
├─── objects/
├────── product.php - contains properties and methods for "product" database queries.
├────── category.php - contains properties and methods for "category" database queries.
├─── product/
├────── create.php - file that will accept posted product data to be saved to database.
├────── delete.php - file that will accept a product ID to delete a database record.
├────── read.php - file that will output JSON data based from "products" database records.
├────── read_paging.php - file that will output "products" JSON data with pagination.
├────── read_one.php - file that will accept product ID to read a record from the database.
├────── update.php - file that will accept a product ID to update a database record.
├────── search.php - file that will accept keywords parameter to search "products" database.
├─── category/
├────── read.php - file that will output JSON data based from "categories" database records.

