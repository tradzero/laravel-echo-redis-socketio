# laravel-echo-redis-socketio
This is a example about how to use laravel echo with redis and socket.io  
It's a simple chatroom application.

# Installation
clone this project and run follow
```bash
$ composer install
$ cp .env.example .env
$ php artisan key:gen
$ npm install -g laravel-echo-server # see https://github.com/tlaverdure/laravel-echo-server
```
modify your `.env` file, enter your redis config  
use ``$ laravel-echo-server init `` init your `laravel-echo-server` environment.
# Run
```bash
$ laravel-echo-server start
$ php artisan queue:work # make sure queue working.
```
open two tabs and go to <http://yourproject/chat>  
enjoy.