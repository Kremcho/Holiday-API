set -e

echo "Deploying Holiday-API"

#Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true
# update codebase
git pull origin master
#exit maintenance mode
php artisan up
 echo "Holiday-API deployed!"
