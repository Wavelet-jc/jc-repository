<?php
namespace Home\Controller;
use Think\Controller;
use think\image\Exception;
use Think\Model;

class UserController extends Controller
{
    /**     用户信息    */
    public function userInfo(){
        $user_Id=session('user.userId');
        $userModel = D("User");   //UserModel的简写形式，会先调用Model里的哦

        $user_myself  = $userModel->where('user_Id = '.$user_Id )->find();
        //dump($user_myself);
        $this->assign("user_myInfo",$user_myself);
    }

    /**     用户注册    */
    public function register(){
        $this->display("register");    //渲染输出注册的界面
    }

    /**     用户注册处理     */
    public function do_register()
    {
        $user = D("User");   //UserModel的简写形式，会先调用Model里的哦
        $data['user_Account']=I("post.userAccount");
        $data['user_Nickname']=I("post.userNickname");
        $data['user_Mail']=I("post.email");
        $data['user_Phone']=I("post.phone");
        $data['user_Password']=md5(I("post.pwd"));
        $data['user_RegisterTime'] = date("Y-m-d H:i:s",time());
        $data['user_StateName']="离线";

        $condition['user_Account']=I("post.userAccount");
        $theUser=$user->where($condition)->find();     /*********************** 这里可以使用AJAX的方式 *******************************/
        if(empty($theUser))     //判断用户是否已存在
        {
            $user->data($data)->add();      // 如果主键是自动增长型 成功后返回值就是最新插入的值
            $this->success('注册成功,进入登录页面!', 'login',0);
        }else{
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('用户已有，注册失败！','',2);
        }
    }

    /**     用户登陆     */
    public function login(){
        $this->display("login");    //获得的login.html模板
    }

    /**     用户登陆处理     */
    public function do_login(){
        $userModel = D("User");   //UserModel简写形式
        $user_Account=$_POST['userAccount'];
        $pwd =$_POST['pwd'];

        $user=$userModel->where(array('user_Account' => $user_Account ))->find();
        //dump($user);

        if (empty($user) || $user['user_password'] != md5($pwd)) {      //md5加密密码  ヾ(Ő∀Ő๑)ﾉ太好惹
            $this->error('登录失败，账号或密码错误','',2);
        }else{
            session('user.userId', $user['user_id']);   //用户id写入session
            $userId = $user['user_id'];
            session('user.account', $user['user_account']);
            session('user.nickname', $user['user_nickname']);

//            $userStateModel= D("UserState");
//            $data['us_Name'] = "在线";
//            $userStateModel->where('us_Id='.$user['user_id'])->save($data);     //设置用户在线
            $data['user_StateName'] = '在线';
            $userModel->where('user_Id = '.$userId)->save($data);

           $this->redirect('Main/main');
            //$this ->success("登陆成功！", U("Main/main"));

        }
   }

    /**     用户密码修改     */
    public function changePwd(){        
          $this->display("changePwd");    //获得的changePwd.html模板
    }

	 /**
     * 用户密码修改处理
     */
    public function do_changePwd()
    {
        $user = D("User");   //UserModel的简写形式，会先调用Model里的哦
        $condition['user_Account']=I("post.userAccount");

        $condition['user_Password']=md5(I("post.originalPwd"));

        $theUserId=$user->where($condition)->getField('user_id');     /*********************** 可以用上AJAX的方式 *******************************/
        //dump($theUser);
        if(!empty($theUserId))     //判断用户是否存在
        {
            $id = $theUserId;

            $data['user_Password']=md5(I("post.pwd"));
            $user->where("user_Id = '$id' ")->save($data);      // 如果主键是自动增长型 成功后返回值就是最新插入的值

            $this->success('修改成功,进入登录页面!', 'login');
        }else{
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('修改失败！','',2);

        }
    }


   /**     退出登陆    */
   public function logout()
   {
       $userId=session('user.userId');
       $userStateModel= D("User");
       $data['user_StateName'] = "离线";     //状态改为离线
       $userStateModel->where('user_Id = '.$userId)->save($data);

       session_destroy();   //启动自我毁灭模式，销毁会话中的数据
       $this->success('退出成功',U('User/login'));
   }

//    /**      检测登录     */
//    private function checkLogin()           //检测登陆状态
//    {
//        if (!session('user.userId'))
//        {
//            $this->error('请登录', U('User/login'),2);
//        }
//    }

}