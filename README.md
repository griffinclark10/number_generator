# Random Number Generator
Project Overview
This Random Number Generator is a PHP-based web application that allows users to generate random numbers within specified bounds. It features a user-friendly interface for entering the range, viewing results, and analyzing the distribution of generated numbers.

## Technologies Used
PHP: Server-side scripting language used for backend logic.
JavaScript: Used for dynamic interactions on the client side, such as handling button clicks and updating the UI without reloading the page.
Bootstrap: For responsive and modern UI components.
Plotly.js: Utilized for rendering interactive graphs to visualize the distribution of generated numbers.
PHPUnit: Employed for unit testing PHP code to ensure functionality works as expected.
# Local Setup and Serving
To run this project locally, follow these steps:

## Clone the Repository:

### Copy code
```
git clone https://your-repository-url.git
cd number_generator
```
### Install Dependencies:
Ensure you have PHP and Composer installed on your machine. Then, run:

```
composer install
```
### Serve the Application:
Use PHP's built-in server to serve the application:
```
php -S localhost:8000 -t .
```
Access the application via http://localhost:8000/ in your web browser.

## Key Decisions
Framework Choice: Opted for Bootstrap to speed up the development process and ensure the application is responsive.
Testing with PHPUnit: Chosen for its wide acceptance and ease of integration into PHP projects.
Interactive Visuals: Integrated Plotly.js to provide meaningful insights through interactive data visualization, enhancing user engagement.
## How to Test
### Run PHPUnit Tests:
Ensure you navigate to the project's root directory and run:

```
./vendor/bin/phpunit tests
```
This will execute all configured tests and display the results.

## Test the Functionality Manually:
Navigate through the application in a web browser.
Try generating numbers with valid and invalid inputs and observe the behavior.
Interact with the visualizations to ensure they reflect the data accurately.

## Future Enhancements
- User Authentication: Implement user login functionality to track individual user sessions and history. This would make the logs & plot a lot more useful. 
- API Integration: Develop an API to allow other applications to generate random numbers through our service.
- Advanced Statistical Analysis: Integrate more complex statistical tools to provide deeper insights into the randomness quality.
