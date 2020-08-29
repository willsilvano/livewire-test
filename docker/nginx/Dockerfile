FROM nginx:1.17

ENV DATA_DIR /var/www/html

ADD default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p $DATA_DIR && \
    chown -R www-data:www-data $DATA_DIR

WORKDIR /etc/nginx