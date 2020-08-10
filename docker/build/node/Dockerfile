FROM node:lts-alpine

RUN apk add --no-cache --virtual .persistent-deps \
        curl \
        openssl \
        make \
        gcc \
        g++ \
        python \
        py-pip \
        git

WORKDIR /src

EXPOSE 3333

ENV HOST 0.0.0.0


