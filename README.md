## About Case Study
### Setup
1) .env configuration
   a) Creating the database named case_study
   b) entering mail settings

2) composer install
3) php artisan migrate --seed



### Task 1
My Solution : divide the process into steps
The process in the backend was requested like this (1) File uploaded > stored in our database > (2) system decodes the PDF file and analyzes the text > sends it to a special service (neural network) to analyze keyword density > receives the result and sends it along with a report to our administrator for further evaluation. I divided the process into two parts as above.

In part (1), the user loads the file and goes to the page where the files are listed. In part (2), the user clicks to open the desired file from the file list and the analysis is done at that time. This dual action creates a feeling of reduction in cooldown.

## Task 2
MY Solution : Use DataTable And Yajra With Query
In order to increase the query speed, we pull only the necessary fields in the table with the select command during the query.
We can use cache.
AWS can be used as the pictures will come from the server anyway. (I haven't personally applied it before)
A picture placeholder (company logo) can be used as a starting point in the lists, and when the item is hovered, the picture can be uploaded separately via ajax.
Or we can use Yajra and Datatable as I have implemented. Here, by doing Model::query, not the whole list, but as pagination with ajax (25 items come by default when I apply it) as many items as desired can be drawn.

## Task 3
The customer becomes a member of the newsletter and receives a notification. This part was made with https://laravel.com/docs/9.x/notifications.
Then it sends cronjob mail according to the days in the sending_days array I used https://laravel.com/docs/9.x/mail class in mail.
Each client's is_subscribe setting can be managed.
If is_subscribe is 1, the client receives the newsletter mail.
I used sendinblue as mail server and ran it locally.
A cronjob has been set to send mail on certain days of the month.

For days to send mail in app/Console/Kernel.php
$sendingDays = array(3, 7, 14, 18,26); The "schedule" is run by creating an array and checking the day with foreach.
