# Docker

###### Create a container:
```
docker container run --publish 3000:80 --detach --name mynginx nginx
```
1. This download the nginx image from Docker Hub. 
2. Starts a new container from that image.
3. --publish (or -p) maps port 3000 on the host to port 80 on the container.
4. --detach (or -d) runs the container in the background and outputs the container id to terminal.

###### List running containers:
```
docker container ls
```

###### List all containers:
```
docker container ls -a
```

###### Start a container:
```
docker container start container_name or id
```

###### Stop a container:
```
docker container stop container_name or id
```

###### Show container logs:
```
docker container logs mynginx
```
In this case it will output the nginx access logs.

###### Remove container/s:
```
docker container rm -f id id container_name id
```
Note: the -f flag tells docker to remove containers even if they are still running.

###### Processes:
The processes running in a Docker container are normal system processes and are visible on the host system.
E.g. Processes running in a container can be found on the host system by running **ps aux | grep whatever**.

###### Find only the processes of one container:
```
docker container top container_name
```







