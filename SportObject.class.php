<?PHP
    class SportObject{
        private $type;
        public function __construct($type="DIY"){
            $this->type = $type;
        }
        public function myDream(){
            echo '调用的方法存在，直接执行此方法<p>';
        }
        public function getType(){
            return $this->type;
        }
        public function __call($method,$parameters){    
            //方法不存在，执行__call()函数;包含两个参数，及方法名和方法参数
            echo "方法名".$method;
            echo "参数有：";
            var_dump($parameters);
        }

        public function __get($name){
            //试图调用一个不存在的或不可见的成员变量时
            if(isset($this->$name))
                return $this->$name;
            else{
                echo "变量 ".$name." 未定义，初始化为0";
                $this->$name = 0;
                // return $this->$name;
            }
        }
        public function __set($name,$value){
            //试图写入一个不存在或不可见的成员变量时
            if(isset($this->$name)){
                $this->$name = $value;      //assign
            }else{
                $this->$name = $value;      //initialize 
            }
        }

        public function __toString(){
            //当使用 echo 或 print 输出对象时，将对象转化为字符串
            return $this->type;
        }
        public function __sleep(){
            // 使用serialize()函数将对象保存起来，可以存放到文本文件、数据库等地方
            return array('type');
        }
        public function __wakeup(){
            //当需要该数据时,使用unserialize()函数对已序列化的字符串进行操作，将其转化为对象
        }
    }
