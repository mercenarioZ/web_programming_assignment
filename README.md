## Web Programming Assignment

### Description
Build a simple sales website using HTML, CSS, JS and PHP. The website should have the following features:
- A home page that displays a list of products, search bar and website information
- A product page that displays the details of a product
- A shopping cart page that displays the items in the cart added by the user
- A page that allows the seller to review all the products that have been posted by that seller
- Authentication (login/logout, register)
- Functionality to delete a product
- Functionality to add/remove items to/from the cart
- Functionality to post a new product (admin has to approve before it is displayed) (optional)

### Technologies
- HTML
- CSS
- JavaScript
- PHP (Vanilla PHP, no frameworks)

### Requirements
- Use MySQL to store the data (products, users, etc.). For this assignment, you should use a local MySQL server (XAMPP, WAMP, Laragon, etc.)
- Use PHP with MVC architecture to build the website
- Use Git for version control
- Use Bootstrap for styling (maybe change in the future)

### Naming conventions in MVC
1. Controller 
- The controller should be placed in the `controllers` folder.
- Name of controller should be *PascalCase*, e.g. `ProductController`. The file name should be the same as the class name in that file, e.g. `ProductController.php` will have a class `ProductController`.
- Action names should be the same as the folder name in the `views` folder, e.g. `product` folder should have a `index.php` file (because in `ProductController` has `index` action - or can be called as a method).
- Action naming convention: index, show, create, update, store, destroy, etc. Except the PageController, which has actions: home, about, contact, etc.
- The `render()` method should be called in the controller to render the view, e.g. `$this->render('index')` in `ProductController` will render the `index.php` file in the `views/product` folder.

2. Model
- The model should be placed in the `models` folder.
- Name of the model file should be the same as the class name in that file, e.g. `Product.php` will have a class `Product`.
- Class name should be the same as the table name in the database, e.g. `Product` class will have a table `products` in the database.
- Methods in model should be *camelCase*

3. View
- The view should be placed in the `views` folder.
- View file should be placed in a folder with the same name as the controller, e.g. `views/{controller_name}/{action_name}.php`. For example, `views/product/index.php` will be rendered when the `index` action in `ProductController` is called.