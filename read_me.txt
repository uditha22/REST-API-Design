Installation Steps:
    1. Move the "dadys_coffee" folder to your "htdocs" folder inside your xampp install directory.
    2. Turn on your local server and MySQL server.
    3. Create a new Database in MySQL named "dadys_coffee".
    4. Import the provided "dadys_coffee.sql" file to the MySQL Database from the Import section.
    
    5. To view all the Products:-
        4.1. Enter the following URL in a internet browser.
            http://localhost/dadys_coffee/api/post/read.php

    6. To view a single product.
        5.1. Enter the following URL in a internet browser with the specific item id at the end.
            http://localhost/dadys_coffee/api/post/read_single.php?id=3

    7. To create an order.
        7.1 Install PostMan from the following link.
            https://www.postman.com/downloads/
        7.2 From PostMan add a new tab.
        7.3 Change the request method to "POST".
        7.4 Enter the following URL in the text field.
            http://localhost/dadys_coffee/api/post/create.php
        7.5 Inside the headers section change the value of "KEY" column to "Content-Type".
        7.6 Inside the headers section change the value of "VALUE" column to "application/json". 
        7.7 Next move to the Body section.
        7.8 Inside the Body section select the "raw" radio button.
        7.9 Add the order details inside the text area and press Send.
            Order details examples:-
                {
                    "product_id": "3",
                    "user_id": "5"
                }