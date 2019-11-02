Creating an Instagram clone in Laravel - original Github project [here](https://github.com/coderstape/freeCodeGram)

[Laravel PHP Framework Tutorial - Full Course for Beginners (2019)](https://www.youtube.com/watch?v=ImtZ5yENzgE&t=572s) by FreeCodeCamp

Learned:
* You can find the blade file in the resources/views folder
* note to self: went down a stackoverflow rabbithold trying everything when ```php artisan make:auth``` command returned an error, turns out the command is now ```php artisan ui:auth```
* migrations are files that tells your database all the instructions to create itself (supposed to make life easier)
* the .env file will hold all of the configurations that are specific to your environment
* whenever you make changes to the .env file, you have to stop the server and boot it back up ```php artisan serve```
* whenever you make changes to the sass file you need to rerun ```npm run dev```.
* controllers are where all of the logic is stored
* shift + option + down to duplicate a line on Mac
* ```php tinker``` is useful in the dev environment.
* whenever you make changes to your database you need to run ```php artisan migrate:fresh``` which will erase everything in your database and create it again. Also whenever you make changes to your database, don't forget to update the ```app/User.php``` file or whatever file needs to be updated in the app folder!
* introduced to the concept of a <strong>RESTful Resource Controller</strong> which is a 'predetermined number of verbs that you can use where each of the actions are matched to a particular url, verb(get, post, patch, delete), action and route name (see Laravel documentation for details)
* did you know? a curly bracket notation in routes means that it is a variable
* a "model" represents a "table" in our database
* "Eloquent" is what Laravel calls the database layer of the framework, a fancy word for the implementation that Laravel uses behind the scenes to fetch queries and everything
* ran this command ```php artisan make:model Profile -m```
* use ```$user->push();``` in ```php artisan tinker``` to "save all"
* ran this command ```php artisan make:controller PostsController```
* '419 page expired' is actually a CSRF error; csrf allows laravel to limit who can post to our forms to make sure that only people who are on our website can submit the URL. It's an extra security measure that Laravel provides. This is why we use the @csrf in the create.blade.php file
* ran into the 'The POST method is not supported for this route. Supported methods: GET, HEAD. Laravel' error and it turns out that in the routes web.php file I wrote Route::get instead of Route::post
* ran ```php artisan storage:link``` to allow laravel to link to those files that are within our storage. It 'creates a symbolic link from 'public/storage' to 'storage/app/public'
* was having a hard time finding the Model class Profile and Post when using artisan tinker. User::all() would return information but Post::all() and Profile::all() would return 'not found.' Turns out I had to type \App\Post::all() and \App\Profile::all(). Not sure how to truncate that.
* ```App\Post::truncate(); ``` in artisan tinker to delete all post objects.

* ran ```composer require interve  ntion/image``` to install an open-source PHP image handling and manipulation library (http://image.intervention.io/);
* ran ```php artisan make:policy ProfilePolicy -m Profile``` which created a Policy folder in the app folder.
* note: you need to be careful of the order you put your routes in web.php; Anything with a variable should be at the end!
* implemented the Vue follow button! 
* axios request was returning with 500 server error and it turned out that I forgot to add ```use App\User;``` in the FollowsController.php file
* new term: we need to create a pivot table for the many to many relationship: it holds the id of the two related models.
* ran ```php artisan make:migration create_profile_user_pivot_table --create profile_user```
* ran ```composer require laravel/telescope``` then ```php artisan telescope:install``` then ```php artisan migrate``` - now you can visit /telescope
* telescope is a very complete toolset that hooks right up into your application and keeps track of everything that you need
* 'links()' gets added to the blade.php file whenever pagination gets added in the controller.
* run ```php artisan telescope:clear``` whenever you want to erase everything on telescope
* have to use ```use Illuminate\Support\Facades``` to enable caching
* we use the free service ```mailtrap.io``` to send emails
* ran ```php artisan make:mail NewUserWelcomeMail -m emails.welcome-email```

* TO DO - read Laravel documentation from top to bottom
* check our coderstape on Youtube (he was the one who made this tutorial)
* subscribe to laravel-news.com
