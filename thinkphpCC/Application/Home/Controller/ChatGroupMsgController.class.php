<?php
namespace Home\Controller;
use Home\Model\user_stateModel;
use Org\Util\Rbac;
use Think\Controller;
use Think\Model;


class ChatGroupMsgController extends Controller
{
    public  $global_groupId;

    public function index(){
       echo '/Home/ChatGroupMsgController/index() <br>';

   }

//   public function chatGroupMsg(){
//
//       $this->chatGroupMsgHistory();
//       $this->chatGroupMsgSend();
//   }

    /*消息历史记录*/
    public function recentChatGroupMsg()
    {
        if (empty($global_groupId))
        {
            $gm_GroupId = $_GET['id'];        //取出id
            $global_groupId = $gm_GroupId;
        }
        $chatGroupMsgModel = D('ChatGroupMsg');


//        $count      = $chatGroupMsgModel->where('gm_GroupId = '.$global_groupId)->count();// 查询满足要求的总记录数
       // $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
       // $show       = $Page->show();// 分页显示输出

        $chatGroupMsg=$chatGroupMsgModel->where('gm_GroupId = '.$global_groupId)->order('gm_FromTime desc')->limit(6)->select();
        $chatGroupMsg = array_reverse($chatGroupMsg);

        /*搜索发送者昵称*/
        $user = D("User");   //FriendModel简写形式
        $i = 0;
        foreach ($chatGroupMsg as $Members)
        {
            $userId = $Members["gm_fromid"];
            $theUser=$user->where("user_Id='$userId'")->find();   // 查询用户信息
            $chatGroupMsg[$i]['from_nickname'] = $theUser['user_nickname'];
            $i++;
        }

        //dump($chatGroupMsg);
        $this->assign('chatGroupMsg',$chatGroupMsg);
        //echo $global_groupId;
        $this -> assign('groupId',$global_groupId);
//        $this->assign('page',$show);// 赋值分页输出
        // $this->display('Messages/chatGroupMsgHistory');
    }

    public function get_message() {
        //这段AJAX请求时间永不过期
        set_time_limit(0);
        $gm_GroupId = $_GET['id'];        //取出id
        $chatGroupMsgModel = D('ChatGroupMsg');
        $chatGroupMsg=$chatGroupMsgModel->where('gm_GroupId = '.$gm_GroupId)->order('gm_FromTime desc')->limit(6)->select();
        $chatGroupMsg = array_reverse($chatGroupMsg);

        /*搜索发送者昵称*/
        $user = D("User");   //FriendModel简写形式
        $i = 0;
        foreach ($chatGroupMsg as $Members)
        {
            $userId = $Members["gm_fromid"];
            $theUser=$user->where("user_Id='$userId'")->find();   // 查询用户信息
            $chatGroupMsg[$i]['from_nickname'] = $theUser['user_nickname'];
            $i++;
        }

//        print_r(json_encode(array('success'=>'存在数据，返回')));

        print_r(json_encode($chatGroupMsg));
        exit(); //输出数据，退出。然后客户端不间断继续发起请求
    }

    /*消息历史记录*/
    public function chatGroupMsgHistory()
    {
        if (empty($global_groupId))
        {
            $gm_GroupId = $_GET['id'];        //取出id
            $global_groupId = $gm_GroupId;
        }
        $chatGroupMsgModel = D('ChatGroupMsg');

        $count      = $chatGroupMsgModel->where('gm_GroupId = '.$global_groupId)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        $chatGroupMsg=$chatGroupMsgModel->where('gm_GroupId = '.$global_groupId)->order('gm_FromTime')->limit($Page->firstRow.','.$Page->listRows)->select();

        /*搜索发送者昵称*/
        $user = D("User");   //FriendModel简写形式
        $i = 0;
        foreach ($chatGroupMsg as $Members)
        {
            $userId = $Members["gm_fromid"];
            $theUser=$user->where("user_Id='$userId'")->find();   // 查询用户信息
            $chatGroupMsg[$i]['from_nickname'] = $theUser['user_nickname'];
            $i++;
        }

        //dump($chatGroupMsg);
        $this->assign('chatGroupMsg',$chatGroupMsg);
        $this->assign('page',$show);// 赋值分页输出
		//$this -> assign('userId',$userId);
        $this -> assign('groupId',$global_groupId);
        // $this->display('Messages/chatGroupMsgHistory');
    }

    public function chatGroupMsgSend(){
        if (empty($global_groupId))
        {
            $gm_GroupId = $_GET['id'];        //取出id
            $global_groupId = $gm_GroupId;
        }
        $this->assign('id',$global_groupId);
       // $this->display('Messages/chatGroupMsgSend');
    }

    public function  do_chatGroupMsgSend(){
        $userId = session('user.userId');       //取出用户的id
        $content = I('post.content');
        $groupId =I('get.id');
        $data['gm_FromId']=$userId;
        $data['gm_Content']=$content;
        $data['gm_GroupId']=$groupId;
        $data['gm_FromTime']=date("Y-m-d H:i:s",time());

        $chatGroupMsgModel = D('ChatGroupMsg');
        $chatGroupMsgModel->data($data)->add();
        //echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        R("Main/groupChat");
    }


//    public function  do_chatGroupMsgSendAjax(){
//        $userId = session('user.userId');       //取出用户的id
//        $userNickName = session('user.nickname');
//        $content = htmlspecialchars($_POST['content']);
//        $groupId =htmlspecialchars($_POST['id']);
//        $data['gm_FromId']=$userId;
//        $data['gm_Content']=$content;
//        $data['gm_GroupId']=$groupId;
//        $data['gm_FromTime']=date("Y-m-d H:i:s",time());
//
//        $chatGroupMsgModel = D('ChatGroupMsg');
//        $chatGroupMsgModel->data($data)->add();
//
//        $oneMsg['content'] = $content;
//        $oneMsg['time'] = $data['gm_FromTime'];
//        $oneMsg['$userNickName'] = $userNickName;
//        $json_onMsg=json_encode($oneMsg);
//        echo $json_onMsg;
//    }
//

}