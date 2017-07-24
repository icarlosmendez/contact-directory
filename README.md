# Contacts Directory

### Initial push on July 11, 2017

This is a simple opt-in style directory application that requires a user to log in to add their information to the directory.

Project originally created in late 2015 with Kelly Rhodes and Jeff Mendez. It was developed as an Advanced Server-side Languages class project while studying Web Development at Full Sail University. It's original form will not be preserved here but will evolve to meet the needs of an actual small business environment.

It is written in vanilla HTML/CSS/PHP with no use of frameworks or libraries. Well, I did roll in the phpdotenv library (https://github.com/vlucas/phpdotenv) to allow for the use of environmental variables. So theres that...

Special thanks to Orcun for his style guidance on building the primary controller and models.

### Update July 16, 2017

Currently undergoing some massive refactoring. Providing for two categories of records in the database: Users and Contacts. Users will be able to create an account for themselves and then once logged in can access the records stored in the Contacts table, and perform CRUD operations on those records and against the Contacts table.

Breaking up the monolithic controller and model files into more categorical files dealing with essentially either users or contacts. Expecting to build a search feature as well and that will like get its own controller and model files for modularity.

### Update July 24, 2017

Database does in fact now contain two tables. One for Contacts and one for Users. This was critcal since this application will likely grow to include new features but continue using the same database. I will just add new tables as the need arises.

Some crud functionality is not working but adding new Users and Contacts does work properly. Can't delete Contacts via the application currently. The "monolithic controller" still exists. I haven't tackled that as yet.

Successfully implemented a dynamic filter feature on the directory page allowing for the location of specific records in the contacts list. This is done through Javascript and not by PHP against the database as I had originally thought. This is much more performant though in that it is done in the browser against the set of records already delivered by the call to populate the "Directory" instead of making new calls as the search term is defined or even a single call actiated by a submit button. As it is now the list updates dynamically as the filter string changes. 