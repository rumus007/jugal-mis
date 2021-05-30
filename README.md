
<h1> Jugal Gaupalika Management Information System </h1> <br/>

## Prerequisite

The prerequisite for this GRMSS are:
- php>=8.0.0
- node>=14
- node package manager(npm)
- postgres
- composer>=2
- nginx server

## Install
Jugal-MIS can be cloned from gitlab repository and installed as follows:
- git clone git@gitlab.yipl.com.np:web-apps/jugal-mis.git <br />
OR<br />
  git clone git@gitlab.yipl.com.np:web-apps/jugal-mis.git
- cd jugal-mis


## Run
In order to run this app follow the commands listed below:
- Install the application dependencies with commands: `composer install` and `npm install`
- Copy .env.example file to .env file and update your database configuration.
- Generate APP_KEY with command : `php artisan key:generate`
- To compile all JS and CSS files run the cmd `npm run watch`.
- Serve the application using `php artisan serve` (append --port PORT_NUMBER to run in a port other than 8000)
- Access `localhost:8000` to run application in browser(`localhost:PORT_NUMBER` if different port number is specified)

## Framework
This application is coded in PHP using [Laravel](http://laravel.com) framework for the backend and [Vue.js](https://vuejs.org/) for frontend. The version of Laravel used for this project is 8.40 and for Vue.js is 2.60.


## Tools and packages
The packages used in this application can be seen in [composer.json](https://gitlab.yipl.com.np/web-apps/jugal-mis/-/blob/master/composer.json) file and [package.json](https://gitlab.yipl.com.np/web-apps/jugal-mis/-/blob/master/package.json) file.

## Important commands
The following commands should be run one after another for populating the database 
- `php artisan migrate:fresh --seed` Run all migrations and seed the necessary data into the database
- `php artisan import:resource` Import Resource profile data from excel and save into database
- `php artisan import:household` Import household(घरधुरीकाे विवरण) data from excel and save into database
- `php artisan import:household --type=livestock` Import livestock data from excel and save into database
- `php artisan import:individual` Import family member data from excel and save into database
- `php artisan import:home` Import household home/room data from excel and save into database
- `php artisan import:household --type=agri` Import livestock data from excel and save into database

## Structure for Backend
This application is structured in a simple way within `app` folder. The various folders and their corresponding contents are:
- Models : Contains all the eloquent model classes.
- Repositories : Contains all the classes for storage and retrieval from database.
- Services : Contains the classes which serves as a bridge between Controller and Repositories. All the application logic are handled here.

## Structure for Frontend
This application uses Vue.js for frontend all files related to frontend is found within `resources/js` for JavaScript and `resources/css` for CSS. The various folders and contents are as follows:
- app.js : Entry point for vue.js application
- src : Contains all the files for frontend part
    - src/views : contains all the vue files related to view
    - src/routes : vue router files
    - src/store : vuex store
