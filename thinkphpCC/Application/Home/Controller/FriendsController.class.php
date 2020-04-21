<?php
namespace Home\Controller;
use Home\Model\user_stateModel;
use Think\Controller;
use Think\Model;


class FriendsController extends Controller
{
   public function index(){
       echo '/Home/FriendsController/index() <br>';
    }

    /*好友管理*/
    public function friend(){
        //$this->addFriend();
        //$this->deleteFriend();
    }
   
    /* 好友列表页面*/
    public function friendList(){
    $friendListViewModel = D("FriendListView");             //好友列表需要的视图模型
    $userId = session('user.userId');                       //取出用户的id

    $friendList = $friendListViewModel->where('friends.user_Id = '.$userId)->order('user_StateName,user_NickName')->select();      //查询用户的所有好友
   //dump($friendList);          //输出好友对象数组
    $this->assign('friendsList',$friendList);       //将数据放入模板中
    //$this->display("Friends/friendList");     //渲染好友列表模板
    }

    public function friendInfo(){
        $friendId = I('get.id');
        $user_Id=session('user.userId');
        $user = D("User");   //FriendModel简写形式
        $theFriend=$user->where("user_Id='$friendId'")->select();   // 查询好友信息
        $this->assign("theFriend",$theFriend[0]);
        //dump($theFriend);

        $friends = D("Friends");   //FriendModel简写形式
        $data['friend_Id']=$friendId;
        $data['user_Id']=$user_Id;
        $friend_remark=$friends->where('friend_Id='.$friendId.' and user_Id = '.$user_Id )->getField("friend_remark");
        $this->assign("friend_remark",$friend_remark);

       // dump($friend_remark);
    }

    public function setFriendRemark() {
        $friendId = I('get.id');
        $user_Id=session('user.userId');
        $userRemark = I('post.remark');

       echo  $data['friend_Remark']=$userRemark;
        $theFriend = D("Friends");   //FriendModel简写形式

        $theFriend->where('friend_Id='.$friendId.' and user_Id = '.$user_Id )->save($data);
        $this->redirect('Main/friendChat?id='.$friendId);
    }

     /* 添加好友页面*/
    public function addFriend(){
        $this->display('addFriend');
    }
    /*     添加好友处理     */
    public function do_addFriend(){
        $friendAccount= $_POST['friendAccount'];
        $user = D("User");   //FriendModel简写形式
        $theFriend=$user->where("user_Account='$friendAccount'")->select();   // 查询好友信息

        //插入friends表的属性值
        if(!empty($theFriend))     //判断用户存在
        {
            $friendId=$theFriend[0]['user_id'];     //返回好友的user_id
            $data['friend_Id']=$friendId;

            $data['user_Id']=session('user.userId');

            $friends = D("Friends");   //FriendModel简写形式
            $result=$friends->where($data)->find();

            if(empty($result))     //判断不存在
            {
                //$data['friend_Remark'] = $friendRemark;   //加备注
                $friends->add($data);      // 如果主键是自动增长型 成功后返回值就是最新插入的值

                $data['friend_Id']=session('user.userId');
                $data['user_Id']=$friendId;
                $friends->add($data);      // 如果主键是自动增长型 成功后返回值就是最新插入的值

                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                $this->success('添加好友成功!', U('Main/main'));
            }else{
                $this->error('已经添加过该好友了！');
            }

        }else{
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('添加失败');
        }
    }

    /*   删除好友处理     */
    public function do_deleteFriend(){
        $friend_Id=I('get.id');
        $user_Id=session('user.userId');

        $friends = D("Friends");   //FriendModel简写形式
        $data['friend_Id']=$friend_Id;
        $data['user_Id']=$user_Id;
        $result=$friends->where('friend_Id='.$friend_Id.' and user_Id = '.$user_Id )->find();

        if(!empty($result))     //判断好友关系存在
        {
            $friends = D("Friends");   //FriendModel简写形式
            $friends->where('friend_Id='.$friend_Id.' and user_Id = '.$user_Id )->delete();
            $friends->where('user_Id='.$friend_Id.' and friend_Id = '.$user_Id )->delete();
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('删除好友成功!', U('Main/main'));
        }else{
            $this->error('删除失败！','',2);
        }


    }




}