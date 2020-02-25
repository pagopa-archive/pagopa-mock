FROM ubuntu:18.04

LABEL maintainer="walter.traspadini@pagopa.it"

ARG DEBIAN_FRONTEND=noninteractive 

RUN apt-get update -y

# install apache 2
RUN apt-get install apache2 -y 

# install php
RUN apt-get install php -y

ADD app /var/www/html/moc
RUN chown -R www-data:www-data /var/www/html 
ADD apache2/sites-available/ /etc/apache2/sites-available/
ADD certs/pagopatest.agid.gov.it.crt /etc/ssl/certs/pagopatest.agid.gov.it.crt
ADD certs/pagopatest.agid.gov.it.key /etc/ssl/private/pagopatest.agid.gov.it.key

# Enable ssl
RUN a2enmod ssl
# Enable Proxy
RUN a2enmod proxy
# Sym link
RUN rm /etc/apache2/sites-enabled/000-default.conf
RUN ln -s /etc/apache2/sites-available/pagopatest.agid.gov.it.conf /etc/apache2/sites-enabled/pagopatest.agid.gov.it.conf

EXPOSE 443
CMD ["apachectl", "-D", "FOREGROUND"]