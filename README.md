## reorg

This API contains 3 endpoints whose purposes and implementations are described below.

# POST /api/cms
This tells the API to fetch CMS records and index them for searching. I had to decide on an implementation that could reliably fetch all data and run continuosly to always have the most up to date data. The openpaymentsdata.cms.gov API has a pretty rich querying capability and after researching it I decided the easiest solution would be to fetch data by date. This endpoint therefor takes one required parameter and one optional. This call takes two parameters: "start" and "end". The start date is required and an end date is the optional parameter. The API then creates a series of asynchronous jobs that run in the background. One for each date in the specified range. If only a start date is given then just the one day specified is used. The response just lists all the dates being fetched. The values themselves can be anything Carbon dates accept in their constructor so a string like "today" or "yesterday" will work just as well as something like "2016-01-01".

The asynchronous jobs work using Laravel's built in queue system and the database driver to keep track of the jobs. This is very useful because these payloads can be several MB and the system will automatically retry jobs that fail up until a configured limit of attempts. The queue listener can be started with the "php artisan queue:listen command" run from the project's "laravel" directory. If this command is not run then data will not index unless you switch the queue configuration to use the sync driver.

The job itself calls the openpaymentsdata.cms.gov API and indexes the result into ElasticSearch. This indexing is done using the bulk API in order to maximize speed by reducing request overhead. Because ElasticSearch is not a real-time store and indexing is done in asynchronous jobs there will be some delay between calling this route and data being available.

To keep data up to date you could simply write a cron job that runs every 24 hours with "start":"today".

# GET api/cms
This call takes a "keyword" parameter and returns an array of all relevant records. The ElasticSearch algorithm uses fuzzy matching so matches that are off by 1 or 2 characters may occur but should be ranked lower in the results. Results are ordered by ElasticSearch's built in relevance scoring system. The maximum number of responses is 1000 but that config can be changed in config/cms.php

# GET api/cms/file
This is the exact same endpoint as GET api/cms including the keyword parameter but returns a .xls file rather than a JSON response. The first row of the spreadsheet are the headers for each column and each subsequent row is a single record.

If you use the Restlet DHC client for curling APIs a collection of premade curls is included in laravel/reorg_test_curls.json and is the easiest way to get started. Note that these include the 'X-Requested-With' : 'XMLHttpRequest' http Headers. The default larvel behavior when a bad request is made is to redirect to the index, but this header will instead return feedback as to what went wrong with your parameters.

## Setup

# Requirements
1. php
2. A php server like Apache
3. MySQL
4. ElasticSearch

# Instructions
1. Install the above services and ensure they are all running and your server is pointed to larvel/public/index.php
2. Check the laravel/.env file (be sure to check for hidden files if you cant find it) being sure to create a blank db in MySQL that matches the name listed under DB_DATABASE. Likewise configure DB_HOST, DB_PORT, DB_USERNAME and DB_PASSWORD to something that can connect to your MySQL server. Normally I wouldn't commit this file to keep these values secure, but this only connects to your local DB so its up to you how secure you want to be!
3. Ensure that your server user has read and write access to the entire laravel/storage directory and all subdirectories. This is where logs and temporary files are stored including the .xls exports.
4. Run "php artisan migrate" within the larvel directory. This will create the queue tracking tables in MySQL.
5. Run "php artisan queue:listen" in the background and laravel will automatically take care of any jobs that get dispatched. If you don't do this then data will never get saved to ElasticSearch.
6. If you want to run the included test suite configure phpunit.xml to point to a test database on your MySQL server and run "php phpunit.phar" from the laravel directory.

# Other Notes
The majority of interesting code is within the laravel/app/Packages directory with most of the rest being framework, third party and boilerplate type code.

There is of course a LOT more we could do here. Many weeks worth of work. The next thing I would do is add more robust filtering so you could only search specific fields or filter by specific field/value pairs but I had to draw the line somewhere and the current implementation certainly fulfills the requirement of "a search tool that returns all relevant data".

This does not actually store the records in MySQL (MySQL is only used to track the job queue). If we had models where large portions of the data were not meant to be searchable but needed to be returned in the response anyway I would duplicate the data there but since all fields are searchable it made sense to only store in ElasticSearch.

These records have a very large number of fields making them quite cumbersome to work with. I handled this by containing just about all of the logic dealing with these in the CMSRecord class. Its fairly long but its so simple that I don't consider it an issue. There are ways involving magic methods to dynamically define fields but that makes the models harder to work with and I'm not a fan of unstructured data. You could also consider some type of ORM but its another layer of software everyone would need to know and is quite a controversial topic on its own. In the end I though a bean class was simple and effective.
