FROM nginx:latest

# Install extra utils
RUN apt-get update && apt-get install -y telnet

RUN rm /etc/nginx/conf.d/default.conf

COPY nginx.conf /etc/nginx/
