#
#
FROM ubuntu:14.04
MAINTAINER Thomas Kuryura <thomas.adm@gmail.com>

# Install packages
RUN DEBIAN_FRONTEND=noninteractive apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y -q apache2 curl php5 php5-mysql mysql-server php5-mcrypt php5-json

# Make mysql listen on the outside
RUN sed -i "s/^bind-address/#bind-address/" /etc/mysql/my.cnf

RUN easy_install supervisor
ADD ./start.sh /start.sh
ADD ./foreground.sh /etc/apache2/foreground.sh
ADD ./supervisord.conf /etc/supervisord.conf

# Open port 80
EXPOSE 80
CMD ["/bin/bash", "/start.sh"]
