# Docker

###### Create a container:
```
docker container run --publish 3000:80 --detach --name mynginx nginx
```
1. This download the nginx image from Docker Hub. 
2. Starts a new container from that image.
3. --publish (or -p) maps port 3000 on the host to port 80 on the container.
4. --detach (or -d) runs the container in the background and outputs the container id to terminal.


