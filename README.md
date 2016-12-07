# Ussing
Referance [jaynarol](https://www.jaynarol.com/docker-compose-part-1/).

## Packages
- loadbalance use nginx when request assets/\* url but other request use apache
- php 5.6 - apache
- nginx
- maysql
- phpmyadmin (http://[host]:8080)

## Workspace directory
- Yii Application: app
- MySql Data: database



## Install docker-compose
### SECTION 1 Install Docker-Compose
This section was built using [DigitalOcean Pages](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-14-04)

#### Step 1 — Installing Docker
```
wget -qO- https://get.docker.com/ | sh
sudo usermod -aG docker $(whoami)
```

#### Step 2 — Installing Docker Compose
```
sudo apt-get -y install python-pip
sudo pip install docker-compose
```


### SECTION 2 Clone repository
#### Step 1 Change directory to your workspace directory
```
cd ~/Docker
```

#### Step 2 Clone Repository
```
git clone https://github.com/kuakling/docker-compose-yii-serv.git your-docker-compose-name
```

#### Step 3 cd to your-docker-compose-name
```
cd your-docker-compose-name
```

#### Step 4 Update composer.sh
1. Create Personal Access Token from [github.com](https://github.com/settings/tokens) and copy it.
2. open [build/php/composer.sh](https://github.com/kuakling/docker-compose-yii-serv/blob/master/build/php/composer.sh) with any text editor
4. Find **composer config -g github-oauth.github.com ~~YOUR GITHUB TOKEN~~**
3. Replace your token in to YOUR GITHUB TOKEN and save file

##### Example: composer config -g github-oauth.github.com 1234567890abcdefghijklmnopqrstuvwxyz

#### Step 5 Build (long time :clock8:)
```
docker-compose build
```

#### Step 6 Run docker-compose
##### When run on linux(native) os. Please comment or remove shell command in mysql of docker-compose.yml line [48](https://github.com/kuakling/docker-compose-yii-serv/blob/master/docker-compose.yml#L48) and [52](https://github.com/kuakling/docker-compose-yii-serv/blob/master/docker-compose.yml#L52) 
```
docker-compose up -d
```


### SECTION 3 Installing [Yii Framework 2](http://www.yiiframework.com/)
#### Step 1 Install Yii Framework 2 (basic or advanced template) 
long time :clock8:
##### if cannot install please empty directory /var/www/html on container or app on machine (delete all normal and hidden)
```
docker-compose run --rm php composer create-project --prefer-dist yiisoft/yii2-app-advanced /var/www/html
```

#### Step 2 Change execute mode for ./init and execute it (for advanced template)
```
docker-compose run --rm php chmod +x ./init
```
execute ./init
```
docker-compose run --rm php ./init
```

#### Step 3 Migrate (for advanced template)
```
docker-compose run --rm php ./yii migrate
```

#### Step 4 Configs Yii and .htaccess (Dispensable)
This step was built using [mickgeek/yii2-advanced-one-domain-config](https://github.com/mickgeek/yii2-advanced-one-domain-config)


## Screenshot
* [Requirements 1](https://www.mx7.com/i/dd6/JaMuD4.png)
* [Requirements 2](https://www.mx7.com/i/93e/J8QLln.png)
* [Apache on normal](https://www.mx7.com/i/b18/itoPqk.png)
* [nginx on assets](https://www.mx7.com/i/d43/Qga0Xs.png)
