# Ussing
Referance [jaynarol](https://www.jaynarol.com/docker-compose-part-1/).

## Package
- loadbalance use nginx when request assets/\* url but other request use apache
- php 5.6 - apache
- nginx
- maysql:latest
- phpmyadmin (http://[host]:8080)

## Workspace directory.
- Source files: src
- MySql Data: tmp/mysql


## Install docker-compose
### SECTION 1 Install Docker-Compose
This section was built using [DigitalOcean Pages](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-14-04).

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
    
### SECTION 2 Clone Repo
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
-Open web browser and enter http://localhost or http://[host ip address]


###### Warning: This version can not use APC Extensions
