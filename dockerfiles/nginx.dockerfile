FROM nginx:alpine

COPY ./nginx/app.conf /etc/nginx/conf.d/app.conf
COPY . /var/www
