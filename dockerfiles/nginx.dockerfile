FROM nginx:alpine

COPY ./config/nginx/app.conf /etc/nginx/conf.d/app.conf
COPY . /var/www