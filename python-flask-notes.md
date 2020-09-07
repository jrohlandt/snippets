### Get python and venv installed locally:
```
$ sudo apt update
$ sudo apt install software-properties-common
$ sudo add-apt-repository ppa:deadsnakes/ppa
$ sudo apt update
$ sudo apt install python3.8
$ sudo apt install python3.8-venv

```

### Setup project and venv:
```
!!! First close and re-open terminal (because you ran sudo above, it will cause venv to be created as root user 
  and that will cause problems when installing certain packages like restx).
$ mkdir my-flask-project && cd my-flask-project
$ mkdir project
$ python3.8 -m venv env
$ source env/bin/activate
(env)$ pip install flask==1.1.1
(env)$ pip install flask-restx==0.1.1 --user
```
