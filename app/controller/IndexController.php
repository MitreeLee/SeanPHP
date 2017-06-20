<?php
/******* SeanPHP *******
 * 
 * Author: SeanLee 929325776@qq.com
 */
class IndexController extends Controller{
	public function index(){
		echo $this->fetch('index', ['version'=>$this->getVersion()]);
	}
}