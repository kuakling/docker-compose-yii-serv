# Ussing
Referance [jaynarol](https://www.jaynarol.com/docker-compose-part-1/).
###### Warning: This version can not use APC Extensions

## Packages
- loadbalance use nginx when request assets/\* url but other request use apache
- php 5.6 - apache
- nginx
- maysql:latest
- phpmyadmin (http://[host]:8080)

## Workspace directory
- Source files: src
- MySql Data: tmp/mysql



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

#### Step 4 Build (long time :clock8:)
```
sudo docker-compose build
```

#### Step 5 Run docker-compose
```
sudo docker-compose up -d
```

### SECTION 3 Test run web
Open web browser and enter http://localhost or http://[host ip address]


### SECTION 4 Installing [Yii Framework 2](http://www.yiiframework.com/)
#### Step 1 Install php5-cli
```
sudo apt-get install php5-cli
```

#### Step 2 Installing [Composer](https://getcomposer.org/)
```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```
Test Composer
```
composer
```
The composer command shows that successful installation this step.

#### Step 3 Installing fxp/composer-asset-plugin
```
composer global require "fxp/composer-asset-plugin:^1.2.0"
```

#### Step 4 Remove or Rename "src" directory
```
mv ./src/ ./src_bk/
```

#### Step 5 Installing Yii (long time :clock8:)
##### [Basic template](http://www.yiiframework.com/doc-2.0/guide-start-installation.html)
```
composer create-project --prefer-dist yiisoft/yii2-app-basic src
```
##### Or [Advanced template](https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md)
```
composer create-project --prefer-dist yiisoft/yii2-app-advanced src
```

#### Step 6 Configs Yii and .htaccess
This step was built using [mickgeek/yii2-advanced-one-domain-config](https://github.com/mickgeek/yii2-advanced-one-domain-config)



### SECTION 5 (Last) Restart docker-compose
```
sudo docker-compose stop
sudo docker-compose up -d
```
