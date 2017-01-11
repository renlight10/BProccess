A Maintenance for php background process wrapper [#88704](http://php.net/manual/en/function.exec.php#88704)

- require
 - Linux
 - nohup
- new function
 - log output
 - read output log

### Install
```
composer require renlight10/bproccess
```
### Usage
``` php
use renlight10\BProccess\BProccess;
$proccess = new BProccess(command,locationfile=optional);
echo $proccess->getPid();
```
if you already have pid
``` php
use renlight10\BProccess\BProccess;
$proccess = new BProccess;
$proccess->setPid(int);
```
possible method:
- getPid() - get process id
- setPid(int) - set process id
- status() - check process status
- start() - start process (process auto start when command in construct)
- stop() - stop process
- read("location file") - read output log

Secure your user input for process argument with [this](http://php.net/manual/en/function.escapeshellarg.php).