# Docker


## Ubuntu 14.04 & 16.04
### 14.04
As of 14.04, Ubuntu uses Upstart as a process manager. By default, Upstart jobs are located in /etc/init and the docker Upstart job can be found at /etc/init/docker.conf.
https://docs.docker.com/engine/admin/

`$ sudo vi /etc/default/docker`
`DOCKER_OPTS="-H tcp://127.0.0.1:2376"`

### 16.04
The instructions below depict configuring Docker on a system that uses upstart as the process manager. As of Ubuntu 15.04, Ubuntu uses systemd as its process manager. For Ubuntu 15.04 and higher, refer to control and configure Docker with systemd.
https://docs.docker.com/engine/admin/systemd/
```bash
sudo mkdir /etc/systemd/system/docker.service.d
sudo vi /etc/systemd/system/docker.service.d/docker.conf
```

```
[Service]
ExecStart=
ExecStart=/usr/bin/dockerd -H fd:// -D --tls=true --tlscert=/var/docker/server.pem --tlskey=/var/docker/serverkey.pem -H tcp://192.168.59.3:2376
```

```bash
sudo systemctl daemon-reload
sudo systemctl restart docker
# Verify that the docker daemon is running as specified with the ps command.
ps aux | grep docker | grep -v grep
```