<?php
namespace Home\Controller;
use http\Message;
use PDO;
use Think\Controller;
use Think\Model;

class MessagesController extends Controller
{
//   public function messages(){
//    $this->recentMessages();
//    $this->messagesSend();
//   }

    /*最近接收消息*/
    public function recentMessages()
    {
        $userId = session('user.userId');       //取出用户的id
        $userNickName = session('user.nickname');       //取出用户的昵称

        $friendId = $_GET['id'];        //取出好友的id
        $str = '(msg_FromUserId = '.$userId.' and msg_ToUserId = '.$friendId.') or (msg_FromUserId = '.$friendId.' and msg_ToUserId = '.$userId.')';

        $messageModel = D('messages');

        $messages=$messageModel->where($str)->order('msg_Time desc')->limit(6)->select();

        $messages = array_reverse($messages);

        $this->assign('messages',$messages);
        $this -> assign('userId',$userId);
        $this -> assign('friendId',$friendId);
        $this -> assign('userNickName',$userNickName);

    }

    public function get_message() {
        //这段AJAX请求时间永不过期
        set_time_limit(0);

        $userId = session('user.userId');       //取出用户的id

        $friendId = $_GET['id'];        //取出好友的id
        $str = '(msg_FromUserId = '.$userId.' and msg_ToUserId = '.$friendId.') or (msg_FromUserId = '.$friendId.' and msg_ToUserId = '.$userId.')';

        $messageModel = D('messages');

        $messages=$messageModel->where($str)->order('msg_Time desc')->limit(6)->select();

        $messages = array_reverse($messages);

        $user = D("User");   //FriendModel简写形式
        $i = 0;
        foreach ($messages as $msg)
        {
            $userId = $msg["msg_fromuserid"];
            $theUser=$user->where("user_Id='$userId'")->find();   // 查询用户信息
            $messages[$i]['from_nickname'] = $theUser['user_nickname'];
            $i++;
        }
//      print_r(json_encode(array('success'=>'存在数据，返回')));
        print_r(json_encode($messages));
        exit(); //输出数据，退出。然后客户端不间断继续发起请求
    }

    /*消息历史记录*/
    public function messagesHistory()
    {
        $userId = session('user.userId');       //取出用户的id
        $userNickName = session('user.nickname');       //取出用户的昵称

        $friendId = $_GET['id'];        //取出好友的id
        $str = '(msg_FromUserId = '.$userId.' and msg_ToUserId = '.$friendId.') or (msg_FromUserId = '.$friendId.' and msg_ToUserId = '.$userId.')';

        $messageModel = D('messages');

        $count      = $messageModel->where($str)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        $messages=$messageModel->where($str)->order('msg_Time')->limit($Page->firstRow.','.$Page->listRows)->select();
       // $Page->setConfig('last','尾页');

        $this->assign('messages',$messages);

        $this->assign('page',$show);// 赋值分页输出

        $this -> assign('userId',$userId);
        $this -> assign('friendId',$friendId);
        $this -> assign('userNickName',$userNickName);
        //$this->display('messagesHistory');
    }

    /*消息发送*/
    public function messagesSend()
    {
        $friendId = $_GET['id'];        //取出好友的id
        $this->assign('id',$friendId);
        //$this->display('messageSend');
    }

    /*消息发送处理*/
    public function do_messagesSend()
    {
        $userId = session('user.userId');       //取出用户的id
        $friendId = $_GET['id'];        //取出好友的id
        $content = $_POST['content'];        //获得聊天内容
        $data["msg_FromUserId"] = $userId;                             //作为sql语句的条件
        $data['msg_ToUserId']=$friendId;
        $data['msg_Content']=$content;
        $data['msg_Time'] = date("Y-m-d H:i:s",time());
        $messageModel = D('messages');
        $messageModel->data($data)->add();
        $this->redirect('Main/friendChat?id='.$friendId);
    }

    public function recentContact(){
        $userId = session('user.userId');       //取出用户的id

        $messageModel = D('messages');
        $recentContact=$messageModel->group('msg_ToUserId')->where('msg_FromUserId = '.$userId)->order('msg_Time')->limit(10)->select();

        $userModel = D("User");   //FriendModel简写形式
        $nearestContacts = array();
        foreach ($recentContact as $Contact)
        {
            $nearestContactId = $Contact['msg_touserid'];
            $nearestContact =$userModel->where("user_Id='$nearestContactId'")->select();   // 查询用户信息
            $nearestContacts = array_merge($nearestContacts,$nearestContact);          //合并最近联系人信息
        }
        $this->assign('nearestContacts',$nearestContacts);

    }

}