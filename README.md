# Uni-t test Hot or not

# Install precedure 
sudo apt-get install php5-gd && sudo service apache2 restart;

git clone https://github.com/MerlijnCuypers/unit_tst;

cd unit_tst;

composer install;

php artisan migrate --seed;
