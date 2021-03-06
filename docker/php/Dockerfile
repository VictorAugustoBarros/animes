FROM centos:6

# Instalação de dependencias
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
RUN yum -y install httpd && yum clean all

RUN chown -R apache:apache /var/www/html/

ENV APACHE_RUN_USER apache
ENV APACHE_RUN_GROUP apache

ADD apache-run.sh /apache-run.sh
ADD localtime /etc/localtime
RUN chmod -v +x /apache-run.sh

RUN ln -sf /dev/stdout /var/log/httpd/modsec_audit.log
RUN ln -sf /dev/stdout /var/log/httpd/modsec_debug.log
RUN ln -sf /dev/stderr /var/log/httpd/ssl_error_log
RUN ln -sf /dev/stdout /var/log/httpd/access_log
RUN ln -sf /dev/stderr /var/log/httpd/error_log

COPY ./httpd.conf /etc/httpd/conf/httpd.conf

RUN yum -y update \
        && yum -y install \
                php \
                php-common \
                php-mysql \
                php-pecl-mongo \
                php-curl \
                php-fpdf \
                php-soap \
                php-pear \
                php-pecl-apcu \
                php-pdo \
                php-gd \
                php-imap \
                php-mysql \
                php-xmlrpc \
                php-bcmath \
                php-cli \
                php-devel \
                php-xml \
                php-mcrypt \
                php-mbstring \
        && rm -rf /var/cache/yum/* \
        && yum clean all

RUN yum install -y dos2unix
RUN dos2unix /apache-run.sh && chmod 777 /apache-run.sh
RUN yum install -y php-pear
RUN yum install -y gcc
RUN yum install -y openssl-devel
RUN pecl install mongo-1.6.16 \
    && echo "extension=mongodb.so" >> /etc/php.d/mongo.ini

RUN sed -i "s/;default_charset\ =\ \"iso-8859-1\"/default_charset\ =\ \"iso-8859-1\"/" /etc/php.ini
RUN sed -i "s/short_open_tag\ =\ Off/short_open_tag\ =\ On/" /etc/php.ini

EXPOSE 80
EXPOSE 443

CMD ["/apache-run.sh"]
