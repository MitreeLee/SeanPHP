<?php
/******* SeanPHP *******
 * Redis Session
 * Author: SeanLee 929325776@qq.com
 */
class RedisSession{
	private $redis;
	private $savePath;
	private $name;
	private $expireTime = 30;
	private $_config = [
		'pwd'	=>	'',	
		'host'	=>	'127.0.0.1',
		'port'	=>	'6379',
	];

	public function __construct($config = null){
		$config = isset($config) && is_array($config) ? $config : $this->_config;
		$this->redis = new Redis();
		$this->redis->connect($config['host'], $config['port']);
		$this->redis->auth($config['pwd']);
		$retval = session_set_save_handler(
		 	array($this,"open"),
		 	array($this,"close"),
		  	array($this,"read"),
		  	array($this,"save"),
		  	array($this,"destroy"),
		  	array($this,"gc")
		);
		session_start();
	}

	//-[打开]-//
	public function open($path,$name){
	 	return true;
	}

	//-[关闭]-//
	public function close(){
	 	return true;
	}

	//-[读取session]-//
	public function read($id){
	 	$value = $this->redis->get($id);//获取redis中的指定记录
	 	if($value){
	  		return $value;
	 	}else{
	  		return '';
	 	}
	}

	//-[保存值]-//
	public function save($id,$data){
	 	if($this->redis->set($id,$data)){
	  		$this->redis->expire($id, $this->expireTime);
	  		return true;
		}
	 	return false;
	}

	//-[删除redis中的指定记录]-//
	public function destroy($id){
	 	if($this->redis->delete($id)){
	  		return true;
	 	}
	 	return false;
	}

	public function gc($maxlifetime){
		return true;
	}

	public function __destruct(){
	 	session_write_close();
	}
}