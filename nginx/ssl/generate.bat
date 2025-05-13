@echo off
REM Generate a private key
docker run --rm -v %cd%/nginx/ssl:/cert alpine/openssl genrsa -out /cert/kidsnexus.local.key 2048

REM Create a self-signed certificate directly (simpler approach)
docker run --rm -v %cd%/nginx/ssl:/cert alpine/openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /cert/kidsnexus.local.key -out /cert/kidsnexus.local.crt -subj "/CN=kidsnexus.local" -addext "subjectAltName=DNS:kidsnexus.local"

echo Certificate has been generated! 
