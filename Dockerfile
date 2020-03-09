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
# ADD certs/pagopa-mock.westeurope.azurecontainer.io.crt /etc/ssl/certs/pagopa-mock.westeurope.azurecontainer.io.crt
# ADD certs/pagopa-mock.westeurope.azurecontainer.io.key /etc/ssl/private/pagopa-mock.westeurope.azurecontainer.io.key


# Enable ssl
RUN a2enmod ssl
# Enable Proxy
RUN a2enmod proxy
# Sym link
# RUN rm /etc/apache2/sites-enabled/000-default.conf
# RUN ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf

# Enable SSH Connection. It's required in App Service it's not in Container Gruop
ENV SSH_PASSWD "root:Docker!"
RUN apt-get update \
        && apt-get install -y --no-install-recommends dialog \
        && apt-get update \
  && apt-get install -y --no-install-recommends openssh-server \
  && echo "$SSH_PASSWD" | chpasswd

COPY sshd_config /etc/ssh/

COPY init.sh /usr/local/bin/
RUN chmod u+x /usr/local/bin/init.sh

EXPOSE 80 2222
ENTRYPOINT [ "init.sh" ]