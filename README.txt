CS137/INF124 Thorne & Spindle [Group23] README.txt - PROGRAMMING ASSIGNMENT 2
Web Application using PHP, AJAX, and MySQL

Our project URL: http://andromeda-23.ics.uci.edu:56077/index.php.
(NOTE: MUST ADD THE '/index.php' as entry point for PROJECT 2).

NOTE: With how our website is setup (we are using AJAX for templating), our site will not run correctly locally (unless you use a cross-platform web server solution like XAMPP). In order to view our website correctly, you have to use the andromeda link with that port number (56077) displayed above. Thanks.

For the TA: We used Github as our version control system. The link (which is public) can be found here: https://github.com/john-ko/HTML5Application.
No password should be needed.


The numbers refer to their respective requirement found on the EEE canvas website:
-1. The basic layout of our site is essentially the same compared to our first project. (The information found in the README.txt file from project 1 will be appended to the bottom of this README.txt file as a reference for the description of the various features found on the website.) All of the information about the products is generated dynamically using PHP and MySQL (using PDO to query the backend MySQL database.)

-2. The order information is stored on the MySQL database (in order to complete step 3).

-3. The confirmation page is created after checkout is completed

-4. We implemented three non-trivial features that utilizes AJAX. 

As for the first AJAX feature (search bar), there will be an input text bar underneath the navigation bar in almost every page. In order to activate the AJAX functionality, type in at least 3 letters into the search bar, then after 3 letters, if the phrase is found in either the name, details, catergory, color, and brand, of a product a dropdown of the corresponding product's name will be displayed below the search bar. When the user clicks on the name, it will redirect the user to the individual product page.

The second AJAX feature is adding/removing/updating items from the cart.

The third AJAX feature is generating tax information based on the zip code that the user inputs during the 'checkout' process. (The tax information is in the bottom of the page).


===== NOTE: PROJECT1 README.txt Information/ Thorne & Spindle Feature Reference =====

The numbers refer to their respective requirement found on the EEE canvas website:
1. Our overview of our business can be found under the 'About' and 'Contact' links from the header.

2. There will be 20 overall products: 10 men products and 10 women products, which are displayed in their respective pages. To view all of the products by gender, just click on 'men' or 'women.' The product views can also be classified further: men's products can be divided to tops and bottoms, and women's products can be divided to tops, bottoms, and dresses.

3. Images are displayed for each product.

4. On the general product listing page, the additional information displayed are the brand name and price of the product.

5. Clicking on the pages on the 'listing' pages will lead to the individual product pages.

6-8. In terms of ordering, instead of implementing just individual orders (where the form is in each individual page), we implemented a front-end javascript functionality where users can order multiple products at once. 

When the user is satisfied with all the products in the cart, from the 'cart' page, the user can click 'checkout' to finally fill out the form with the user information (name, address, phone number, credit card etc.) 

When the user has finished filling out the form, the green 'purchase' button can be clicked to bring up the user browser's default email client or however the user's browser reacts to 'mailto:' links. 

Upon clicking 'purchase', if for some reason any of the form's fields is filled improperly, red error messages will pop up, prompting the user to fill out those fields appropriately.

At the end, once the user fills the form correctly, the email client will pop up with the cart purchase information as the body of the email (in a separate window), and the initial window will go back to the Thorne&Spindle home page with the cart cleared (0 items in it).

9. We used many stylistic CSS properties, which can be observed from our 'style.css' file in the assets folder.

10. In terms of image size increasing during hover, we chose to only enlarge only the images on the INDIVIDUAL PAGES, not the images found on the general product listing pages. So, only the images in the individual product pages will enlarge when the mouse hovers over it. NOTE: in addition, in the individual pages, you can CLICK on the alternate images to change the primary (bigger) picture. The bigger picture will be the one that will enlarge when the mouse hovers over it.

NOTE: Because our website is dependent on using cookies, if any weird behavior comes up, feel free to refresh the page, go in incognito, etc. (You shouldn't have to...but just in case).