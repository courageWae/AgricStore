# Agric Store

Agric Store is an online store or e-commerce website that helps people to get easy access to agricultural products and equipments.

A user gets a personalized dashboard to manage ordered items, and profile. 
The Admin Always gets a dashboard to monitor all activities in the application.

## Installation

Agric Store was built with the Laravel framework, so it follows a typical Laravel project installation. However, for the sake of elaboration, the below indicates how to install this project on your computer.


### Step ONE

```bash
# You need to install git on your computer
git clone --branch master https://github.com/courageWae/AgricStore.git
```
### Step TWO

```bash
cd AgricStore

# You need to have composer installed on your computer
composer install --ignore-platform-reqs
```
### Step THREE

```bash
php artisan key:generate
```
### Step FOUR

```bash
php artisan migrate --seed
```

## Usage
A User is required to have a registered account to facilitate easy of ordering. 

The system assigns a personal dashboard for the user for managing the profile and orders.

### CONCLUSION
This application is not entirely tested, it was developed out of leisure and boredom. There may be bugs lurking all over.

Have fun.