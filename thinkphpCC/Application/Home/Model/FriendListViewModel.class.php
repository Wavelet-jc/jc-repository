<?php
/**
 * Created by PhpStorm.
 * User: jiangchao
 * Date: 2019/01/20
 * Time: 14:19
 */

namespace Home\Model;
use Think\Model\ViewModel;

class FriendListViewModel extends ViewModel
{
    public $viewFields = array(
        'User'=>array('user_Account','user_Nickname','user_Mail','user_Phone','user_StateName'),
        'Friends'=>array('user_Id','friend_Remark','friend_GroupId','friend_Id','_on'=>'User.user_Id = Friends.friend_Id')
    );
}
