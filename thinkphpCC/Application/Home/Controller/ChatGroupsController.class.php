<?php
namespace Home\Controller;
use Think\Controller;
use Think\Image;
use Think\Model;


class ChatGroupsController extends Controller
{
    /*  群组信息 */
    public function chatGroupInfo(){
        $groupId = I('get.id');
        $chatGroupModel = D("ChatGroups");             //群组模型
        $condition['cg_Id'] = $groupId;
        $theChatGroup= $chatGroupModel->where($condition)->find();

        $theChatGroupInfo = $theChatGroup;

        $ownerId = $theChatGroupInfo['cg_adminid'];
        $theUserModel = D("User");
        $owner = $theUserModel ->where("user_Id = ".$ownerId )->find();

        $theChatGroupInfo['ownerNickName'] =  $owner['user_nickname'];

        //ump($theChatGroup);
        $this->assign('chatGroupInfo',$theChatGroupInfo);       //将群组信息数据放入模板中
    }

    /* 群组列表页面*/
    public function chatGroupsList(){

        $userId = session('user.userId');                       //取出用户的id
        $data["user_Id"] = $userId;                             //作为sql语句的条件

        $chatGroupMembersModel = D("ChatGroupMembers");             //群组列表需要的模型
        $chatGroups = $chatGroupMembersModel->where('cgm_UserId = '.$userId)->field('cgm_groupId')->select();      //查询用户的所有群组
        //dump($chatGroups);
		if(!empty($chatGroups))
		{
        $goroupId_Set="";
        foreach ($chatGroups as $group)
        {
            $goroupId_Set .= $group['cgm_groupid'].",";
        }
        $goroupId_Set = chop($goroupId_Set,",");

        $chatGroupModel = D("ChatGroups");             //群组模型
        $chatGroupsList = $chatGroupModel->where('cg_Id in ('.$goroupId_Set.')')->select();      //查询用户的所有群组

        //dump($chatGroupsList);          //输出好友对象数组
        $this->assign('chatGroupsList',$chatGroupsList);       //将数据放入模板中
       }
        //$this->display("chatGroups/chatGroupsList");     //渲染好友列表模板
    }

    /*创建群组*/
    public function createChatGroup(){
        $this->display('createChatGroup');
   }
   /*处理创建群组*/
    public function do_createChatGroup(){
        $userId = session('user.userId');       //取出用户的id
        $groupName = I('post.groupName');       //获得群名称
        $groupBrief = I('post.groupBrief');     //获得群简介

        $data['cg_AdminId'] = $userId;
        $data['cg_Name'] = $groupName;
        $data['cg_Brief'] = $groupBrief;
        $data['cg_CreateTime'] = date("Y-m-d H:i:s",time());


        $chatGroup = D("ChatGroups");
        $newGroupId =  $chatGroup->add($data);      // 如果主键是自动增长型 成功后返回值就是最新插入的值
        $this->success('创建群组 "'.$groupName.'" 成功，群组id为 '.$newGroupId,'__URL__/../../Main/main',30);

        $ChatGroupMembers = D("ChatGroupMembers");
        $data['cgm_GroupId'] = $newGroupId;
        $data['cgm_UserId'] = $userId;
        $ChatGroupMembers->add($data);      // 创建者自动加入群组

    }

    /*加入群组*/
    public function addChatGroup(){
        $this->display('addChatGroup');
    }
    /*加入群组处理*/
    public function do_addChatGroup(){
        $userId = session('user.userId');       //取出用户的id
        $groupId = I('post.groupId');       //获得群id

        $chatGroup = D("ChatGroups");
        $condition['cg_Id']=$groupId;

        $theChatGroup=$chatGroup->where($condition)->find();
        $groupName = $theChatGroup['cg_name'];
        if(!empty($theChatGroup))     //判断是否存在
        {
            $ChatGroupMembers = D("ChatGroupMembers");
            $data['cgm_GroupId'] = $groupId;
            $data['cgm_UserId'] = $userId;

            $res=$ChatGroupMembers->where($data)->find();
            //dump($res);
            if (empty($res))
            {
                $ChatGroupMembers->add($data);      // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $this->success('加入群组“'.$groupName.'”成功','__URL__/../../Main/main',3);
            }else{
                $this->error('已加入该群组，加入群组失败');
            }
        }else{
            $this->error('不存在该群组，加入群组失败');
        }
    }

    /*处理退出群组*/
    public function do_quitChatGroup(){
        $userId = session('user.userId');       //取出用户的id
        $groupId= I('get.id');      //获得群组id

        $chatGroupMembersModel = D("ChatGroupMembers");             //群组成员模型

        $res=$chatGroupMembersModel->where('cgm_UserId='.$userId.' and cgm_GroupId = "'.$groupId.' " ')->delete();        //删除群组
        if($res==true)
            $this->success('成功退出群组','__URL__/../../Main/main');
        else
            $this->error('删除群组失败');

    }

    /*处理（群主）解散群组*/
    public function do_dissolveChatGroup(){
        $userId = session('user.userId');       //取出用户的id
        $groupId= I('get.id');      //获得群组id
        $chatGroup = D("ChatGroups");

//        $data['cg_adminId'] = $userId;
//        $data['cd_id'] = $groupId;

        $result= $chatGroup->where('cg_adminid='.$userId.' and cg_id = "'.$groupId.' " ')->find();  //查找是否存在该群组
        //dump($result);
        $groupName=$result['cg_name'];

        if(!empty($result)){
            $res1=$chatGroup->where('cg_adminid='.$userId.' and cg_id = "'.$groupId.' " ')->delete();        //删除群组

            $chatGroupMembersModel = D("ChatGroupMembers");             //群组成员模型
            $res2=$chatGroupMembersModel->where('cgm_GroupId = "'.$groupId.'"')->delete();        //删除群组

            if($res1 ==true && $res2==true)
                $this->success('解散群组'.$groupName.'成功','__URL__/../../Main/main');
            else
                $this->error('解散群组失败');
        }else{
            $this->error('没有该群组，解散群组失败');
        }
    }
}