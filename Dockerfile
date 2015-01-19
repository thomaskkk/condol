#
#
FROM debian:7.8
MAINTAINER Thomas Kuryura <thomas.adm@gmail.com>

# Install packages
RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get install -y -q \
    apache2 \
    curl \
    php5 \
    php5-mysql \
    mysql-server \
    php5-mcrypt \
    php5-json \
    supervisor 
RUN DEBIAN_FRONTEND=noninteractive apt-get autoclean

# Make mysql listen on the outside
RUN sed -i "s/^bind-address/#bind-address/" /etc/mysql/my.cnf

RUN mkdir -p /var/lock/apache2 /var/run/apache2 /var/log/supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Open port 80
EXPOSE 80
CMD ["/usr/bin/supervisord"]
