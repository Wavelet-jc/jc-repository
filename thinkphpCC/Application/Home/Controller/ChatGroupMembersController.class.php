<?php
namespace Home\Controller;
use Home\Model\user_stateModel;
use Think\Controller;
use Home\Controller\ChatGroupMsgController;


class ChatGroupMembersController extends Controller
{

   public function chatGroupMembers(){

       //$chatGroupMembers =  D("chat_group_members");   //UserModel简写形式
       //dump($chatGroupMembers->getDbFields());    //获取表格字段s
       //$this->chatGroupMembersList();
       //R("ChatGroupMsg/chatGroupMsg");  //调用其他模块 控制器名/方法名

   }

    public function chatGroupMembersList(){
        $UserId=session('user.userId');
        $chatGroupId = I('get.id');

        /*查询所有成员*/
        $data["cgm_GroupId"] = I('get.id');                             //群号
        $chatGroupMembersModel = D("ChatGroupMembers");             //群组列表需要的模型
        $chatGroupMembersList = $chatGroupMembersModel->where($data)->select();      //查询用户的所有好友

        /*查询成员信息*/
        $user = D("User");   //FriendModel简写形式

        $i = 0;
        foreach ($chatGroupMembersList as $Members)
        {
            $userId = $Members["cgm_userid"];
            $theUser=$user->where("user_Id='$userId'")->find();   // 查询好友信息
            $chatGroupMembersList[$i]['memberName'] = $theUser['user_nickname'];
            $chatGroupMembersList[$i]['memberStateName'] = $theUser['user_statename'];
            //dump($theUser);
            $i++;
        }

        //dump($chatGroupMembersList);
        /*判断是否群主*/
        $chatGroup = D("ChatGroups");
        $condition['cg_Id'] = $chatGroupId;
        $theChatGroup =  $chatGroup->where($condition)->find();      // 如果主键是自动增长型 成功后返回值就是最新插入的值
        $chatGroupOwnerId = $theChatGroup['cg_adminid'];
        if($chatGroupOwnerId==$UserId){$status = 'owner';}
        else{ $status = 'member';}

        //dump($chatGroupMembersList);          //输出好友对象数组
        $this->assign('chatGroupMembersList',$chatGroupMembersList);       //将数据放入模板中
        $this->assign('chatGroupId',$chatGroupId);
        $this->assign('status',$status);
    }
}