<?php
/* A Maintenance php background process wrapper
* @author source:Peec http://php.net/manual/en/function.exec.php#88704
* @git repo https://github.com/renlight10/BackgroundProccess
*/

namespace renlight10\BProccess;
class BProccess {
	private $pid;
 	private $command;
 	private $logs;

 	public function __construct($cl=false,$log=false) {
		if ($cl != false) {
			$this->command = $cl;
 			if($log != false) {
				$this->logs = $log;
 			} else {
				$this->logs = "/dev/null";
 			}
 			$this->runCom();
 		}
 	}
 	private function runCom() {
		$command = 'nohup '.$this->command.' > '.$this->logs.' 2>&1 & echo $!';
 		exec($command ,$op);
 		$this->pid = (int)$op[0];
 	}

 	public function setPid($pid) {
		$this->pid = $pid;
 	}

 	public function getPid() {
		return $this->pid;
 	}

 	public function status() {
		$command = 'ps -p '.$this->pid;
 		exec($command,$op);
 		if (!isset($op[1]))
			return false;
 		else
			
 return true;
 	}

 	public function start() {
		if ($this->command != '')
$this->runCom();
 		else
			
 return true;
 	}

 	public function stop() {
		$command = 'kill '.$this->pid;
 		exec($command);
 		if ($this->status() == false)
			return true;
 		else
			
 return false;
 	}
 	public function read($file) {
 		if(file_exists($file)) {
 			$myfile=file($file);
 			return implode("\n",$myfile);
 		} else {
 			throw new Exception("file no found!");
 		}
	}
}
?>