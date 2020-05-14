APP_NAME="Біржа вантажів"

BROADCAST_DRIVER=redis <br>
CACHE_DRIVER=file <br>
QUEUE_CONNECTION=redis <br>
SESSION_DRIVER=file <br>
SESSION_LIFETIME=120

To run the application in real time, you need to execute the commands <br>
- laravel-echo-server start
- php artisan queue:work
- php artisan create:load {count} - where {count} -
amount of freight creation 
