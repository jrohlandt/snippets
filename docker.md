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

## Processes and container info

The processes running in a Docker container are normal system processes and are visible on the host system.
E.g. Processes running in a container can be found on the host system by running **ps aux | grep whatever**.

###### Find only the processes of one container:
```
docker container top container_name
```

###### Get config info of a container:
```
docker container inpsect container_name
```
Outputs a large json object. The inspect command includes a --format flag that is similar to [jq](https://stedolan.github.io/jq/) but it is just as easy to pipe the output of inspect to jq instead of learning another new parser.

###### Get performance stats (like Linux top):
```
docker container stats container_name
```

## Shell

Note: Docker can only use a shell if it is installed in the container.
Many images come with bash or sh.

###### Start and access the shell of a container:
```
docker container run --interactive --tty nginx bash
```
Tip: use the --rm flag to automatically remove the container when exiting the bash shell.
Very useful for quickly spinning up a container to test something and then having it automatically cleaned up when done.

###### Access the shell of a container that is already running:
```
docker container exec --interactive --tty mycontainer bash
```

###### Access sh on a container:
```
docker container exec --interactive --tty mycontainer sh
```

## Docker Networks

###### Check which ports are mapped to a container:
```
docker container port mycontainer
```

###### Get container ip:

with jq
```
docker container inspect mycontainer | jq '.[0] | .NetworkSettings.IPAddress'
```
or use -- format flag
```
docker container inspect --format '{{.NetworkSettings.IPAddress}}' mycontainer
```

###### Commands:

* docker network create mynetwork --driver
* docker network ls (list all networks)
* docker network inspect mynetwork
* docker network connect mynetwork mycontainer (attach a network to a container)
* docker network disconnect

###### Create a network:
```
docker network create mynetwork
```
Note: defaults to using the bridge driver.

###### Attach a network to a container:
```
docker container run --network mynetwork
```
or 
```
docker network connect mynetwork mycontainer
```

###### Find which containers are connected to a network:
```
docker network inspect mynetwork | jq '.[0] | {Containers: [.Containers]}'
```

###### Find all the networks that a container is connected to:
```
docker container inspect mycontainer | jq '.[0] | {Networks: [.NetworkSettings.Networks]}'
```

###### Have one container ping another:
```
docker container exec --interactive --tty mycontainer ping myothercontainer
```
Note: the two containers need to be on the same network and they both need ping installed.

### Images:

###### List images:
```
docker image ls
```

###### Download image:
```
docker pull nginx 
```
Note: fetches latest version use tag to get a specific version. E.g. nginx:1.11.9

###### See changes to image:
```
docker history nginx:latest
```

###### Get image info:
```
docker image inspect nginx:latest
```
Prints a json object.

Example, see which ports are exposed:
```
docker image inspect nginx:latest | jq '.[0] | {ExposedPorts: .Config.ExposedPorts}'
```

# TODO go back to the image building section, rewatch and make notes.

### Persistent Data

#### Volumes:
Volume can be specified in the Dockerfile, can be checked using inspect (or just check Dockerfile).
```
docker inspect mysql | jq ' .[0] | .ContainerConfig.Volumes '
```

Can also be checked on a container running off that image:
```
docker container inspect mymysql | jq ' .[0] | .Config.Volumes '
```

and then one can also see exactly where the file/s are stored
```
docker container inspect mymysql | jq ' .[0] | .Mounts '
```

###### List all volumes:
```
docker volume ls
```

###### Named volumes:
```
docker container run -d --name mymysql --volume mymysql-db:/var/lib/mysql mysql
```

#### Bind mounts:
```
docker container run -d --name mynginx --volume /home/me/code/myproject/public:/usr/share/nginx/html -p 80:80 nginx
```

### Docker Compose
https://docs.docker.com/compose/ https://docs.docker.com/compose/compose-file/

























