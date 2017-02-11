This project is just for educational purpose only. 

This login registration system has many validations used in php and prevention from SQL injection. It also prevent users from using HTML5 or javascript tags in there username. 

There are currently three level of users Admin, Moderator, Normal Users.

Admin has all the power accessing the database, mass mailiing. 

By default user are subscribed to receive email from admin. But they are free to unsubscribe by just un-checking the option from settings.

Welcome Message on index page is visible accordingly.

User have to activate there account in order to get access to website. Pages are restricted to certain users like forum members and downloads page are only accessible to registered users.

Admin can access all pages.

There is user profile options as well. .htaccess is used and as soon user is registered with unique username, they can access there or others users profile just by typing there username after the website address.

Users can view only there own email address.

Password change option, forgot password option, forgot username option are too available. Forgotten password and username will be mailed to there registered email address. And user can easily change or access there account.

All the received data are sanitized before storing it in database.

https://www.youtube.com/watch?v=FzKz80Wu8CE here is the link to the video, check the working model of this project.

Create a Table named `users` with the following data and its type to use this project:
	> user_id (int11) (AUTO_INCREMENT)
	> username (varchar32)
	> password (varchar32)
	> first_name (varchar32)
	> last_name (varchar32)
	> email (varchar1024)
	> email_code (varchar32)
	> active (int11)
	> allow_email (int11)
	> profile (varchat55)

Create table in database using the provided credentials, you don't need to do anything else. You can fork this project and make this project more awesome. It'll be great. Thanks for using this project.