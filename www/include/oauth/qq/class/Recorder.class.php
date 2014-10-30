<?php
require_once(CLASS_PATH."ErrorCase.class.php");
class Recorder{
    private static $data;
    private $inc;
    private $error;
    public function __construct(){
        $this->error = new ErrorCase();
        $incFileContents = file_get_contents(ROOT."comm/inc.php");
        $this->inc = json_decode($incFileContents);
        $this->inc->{'appid'} = QQ_AKEY;
        $this->inc->{'appkey'}= QQ_SKEY;
        $this->inc->{'callback'} = QQ_CALLBACK_URL;
        if(empty($this->inc)){
            $this->error->showError("20001");
        }
        if(empty($_SESSION['QC_userData'])){
            self::$data = array();
        }else{
            self::$data = $_SESSION['QC_userData'];
        }
    }
    public function write($name,$value){
        self::$data[$name] = $value;
    }
    public function read($name){
        if(empty(self::$data[$name])){
            return null;
        }else{
            return self::$data[$name];
        }
    }
    public function readInc($name){
        if(empty($this->inc->$name)){
            return null;
        }else{
            return $this->inc->$name;
        }
    }
    public function delete($name){
        unset(self::$data[$name]);
    }
    function __destruct(){
        $_SESSION['QC_userData'] = self::$data;
    }
}
