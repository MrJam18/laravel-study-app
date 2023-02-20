sc start "MySQL80"
start /b "" php E:\projects\laravel-study-app\artisan serve
npm run dev
sc stop "MySQL80"

