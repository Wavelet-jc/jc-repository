<?php
/**
 * Created by PhpStorm.
 * User: jiangchao
 * Date: 2019/01/20
 * Time: 14:08
 */

namespace Home\Controller;
use Home\Model\FriendListViewModel;
use PDO;
use Think\Controller;

class MainController extends Controller
{
    public function ajax(){
        $this->display();
    }


    public function Main()
    {
        R('Friends/friendList');    //调用好友列表
        R('ChatGroups/chatGroupsList');     //群组列表
        R('User/userInfo');     //群组列表
        R("Messages/recentContact");  //好友聊天历史消息
        $this->display('Main/main');     //渲染主页模板        
    }

    //消息面版
    public function friendChat()
    {
        R("Friends/friendInfo");
        R("Messages/recentMessages");  //好友聊天历史消息
        R("Messages/messagesSend");  //聊天发送框
        $this->display("Main/friendChat");     //渲染好友聊天模板
    }

    //消息记录面版
    public function friendChatHistory()
    {
        R("Friends/friendInfo");
        R("Messages/messagesHistory");  //好友聊天历史消息
        R("Messages/messagesSend");  //聊天发送框
        $this->display("Main/friendChat");     //渲染好友聊天模板
    }

    //消息面版
    public function groupChat()
    {
        R("ChatGroups/chatGroupInfo");  //群组信息
        R("ChatGroupMembers/chatGroupMembersList");  //群组成员列表
        R("ChatGroupMsg/recentChatGroupMsg");  //群组历史消息
        R("ChatGroupMsg/chatGroupMsgSend");  //群组聊天发送框
        $this->display("Main/groupChat");     //渲染群组聊天模板
    }

    //消息记录面版
    public function groupChatHistory()
    {
        R("ChatGroups/chatGroupInfo");  //群组信息
        R("ChatGroupMembers/chatGroupMembersList");  //群组成员列表
        R("ChatGroupMsg/chatGroupMsgHistory");  //群组历史消息
        R("ChatGroupMsg/chatGroupMsgSend");  //群组聊天发送框
        $this->display("Main/groupChat");     //渲染群组聊天模板
    }
}