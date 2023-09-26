#!/bin/bash

# Membuka ssh-agent
eval `ssh-agent -s`

# Menambahkan kunci SSH
ssh-add ~/.ssh/erik

