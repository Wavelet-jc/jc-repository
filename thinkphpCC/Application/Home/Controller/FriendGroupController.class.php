<?php
namespace Home\Controller;
use Home\Model\user_stateModel;
use Think\Controller;
use Think\Model;


class FriendGroupController extends Controller
{
   public function index(){
       echo '/Home/FriendGroupController/index() <br>';

   }

	/*创建好友分组*/
   public function createFriendGroup(){
       $data['fg_UserId'] = session('user.userId');
       $friendGroup =  D("FriendGroup");   //UserModel简写形式
       $FriendGroupList=$friendGroup->data($data)->select();
        dump($FriendGroupList);

       $this->display('createFriendGroup');     //创建
       $this->deleteFriendGroup();    //删除
       $this->display('updateFriendGroup');     //更新
   }

	/*创建好友分组处理*/
   public function do_createFriendGroup(){
		$userId = session('user.userId');                       //取出用户的id
        $groupName= $_POST['groupName'];

		$friendGroup =  D("FriendGroup");   //UserModel简写形式

       $data['fg_UserId'] = $userId;
       $data['fg_Name'] = $groupName;
       $result= $friendGroup->where('fg_UserId='.$userId.' and fg_Name = "'.$groupName.' " ')->find();  //查找是否存在该分组

       if(empty($result)){
           $friendGroup->data($data)->add();        //插入分组
           $this->success('添加好友分组'.$groupName.'成功','__URL__/../../Friends/friendList');
       }else{
           $this->error('已存在该好友分组，添加好友分组失败');
       }
   }

    /*删除好友分组*/
    public function deleteFriendGroup(){
        $this->display('deleteFriendGroup');
    }
    /*删除好友分组处理*/
    public function do_deleteFriendGroup(){
        $userId = session('user.userId');                       //取出用户的id
        $groupName= $_POST['groupName'];

        $friendGroup =  D("FriendGroup");   //UserModel简写形式

        $data['fg_UserId'] = $userId;
        $data['fg_Name'] = $groupName;
        $result= $friendGroup->where('fg_UserId='.$userId.' and fg_Name = "'.$groupName.' " ')->find();  //查找是否存在该分组

        if(!empty($result)){
            $res=$friendGroup->where('fg_UserId='.$userId.' and fg_Name = "'.$groupName.' " ')->delete();        //删除分组
            if($res==true)
                $this->success('删除好友分组'.$groupName.'成功','__URL__/../../Friends/friendList');
            else
                $this->error('删除好友分组失败！','',2);
        }else{
            $this->error('没有该好友分组，删除好友分组失败！','',2);
        }
    }

    /*修改好友分组*/
    public function updateFriendGroup(){
        $this->display('updateFriendGroup');     //更新
    }
    /*修改好友分组处理*/
    public function do_updateFriendGroup(){
        $userId = session('user.userId');                       //取出用户的id
        $groupName= $_POST['groupName'];
        $newGroupName = I('post.newGroupName');
        dump( $newGroupName);

        $friendGroup =  D("FriendGroup");   //UserModel简写形式

        $data['fg_UserId'] = $userId;
        $data['fg_Name'] = $newGroupName;
        $result= $friendGroup->where('fg_UserId='.$userId.' and fg_Name = "'.$groupName.' " ')->find();  //查找是否存在该分组

        if(!empty($result)){
           echo $res=$friendGroup->where('fg_UserId='.$userId.' and fg_Name = "'.$groupName.' " ')->save($data);        //修改分组
            if($res==true)
                $this->success('修改好友分组'.$groupName.'成功','__URL__/../../Friends/friendList');
            else
                $this->error('删除好友分组失败！','',2);
        }else{
            $this->error('修改好友分组失败，删除好友分组失败！','',2);
        }
    }

}