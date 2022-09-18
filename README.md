# BFI Assessment

## Installation

1. Download xampp at [https://www.apachefriends.org/download.html]
2. Open xampp start Apache and Mysql.
3. Go to phpmyadmin [http://localhost/phpmyadmin/] and create database (`bfi_assessment`).
4. Clone the repo and save it to your \xampp\htdocs folder.

   ```sh
   git clone https://github.com/dequilla3/supermarket.git
   ```

5. Import Schema from the repo and import schema to database you have created. (`bfi_assessment`).

   ```sh
   \supermarket\dbschema
   ```

6. Access \htdocs\supermarket\includes\config.php and update your database credentials.

   ```sh
   $con = new mysqli('localhost', 'root', '', 'bfi_assessment');
   ```

7. Open browser and access [http://localhost/supermarket/components/view-supplier.php]

#

## Overview

### View Supplier

![My Image](https://raw.githubusercontent.com/dequilla3/supermarket/main/img/add_customer.PNG)

### Save Supplier

![My Image2](https://github.com/dequilla3/supermarket/blob/main/img/save_supplier.PNG)

### Update Supplier

![My Image3](https://github.com/dequilla3/supermarket/blob/main/img/update_supplier.PNG)

### View Customer

![My Image4](https://github.com/dequilla3/supermarket/blob/main/img/view_customer.PNG)

### Add Customer

![My Image5](https://github.com/dequilla3/supermarket/blob/main/img/add_customer.PNG)

### Update Customer

![My Image6](https://github.com/dequilla3/supermarket/blob/main/img/update_customer.PNG)

### View Products

![My Image7](https://github.com/dequilla3/supermarket/blob/main/img/view_products.PNG)

### Add Products

![My Image8](https://github.com/dequilla3/supermarket/blob/main/img/add_product.PNG)

### Update Products

![My Image9](https://github.com/dequilla3/supermarket/blob/main/img/update_product.PNG)
### Goods Receive

![My Image10](https://github.com/dequilla3/supermarket/blob/main/img/gr.PNG)

### Purchase

![My Image11](https://github.com/dequilla3/supermarket/blob/main/img/purch.PNG)
