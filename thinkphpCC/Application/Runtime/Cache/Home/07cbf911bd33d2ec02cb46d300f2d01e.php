<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>CC聊天室</title>
	<link type="text/css" rel="stylesheet" href="/thinkphpCC/Public/css/1.css"/>
    <script src="/thinkphpCC/Public/js/jquery-3.3.1.js"></script> <!--jQuery框架-->
    <script src="/thinkphpCC/Public/js/1.js"></script> <!--jQuery框架-->

</head>
<body>
	<div id="Main">
        <div id="Main_left">
            <div id="FriendList">
                <div id="Myself">
                    <div id="My">   <!--我的信息-->
                        <p class="My_Name">我的名字</p>
                        <p class="My_Other">账号</p>
                        <p class="My_Other">我的邮箱</p>
                        <p class="My_Other">我的电话</p>
                    </div>    
                </div>

                <button id="btn" onclick="RecentContact()">最近联系</button>
                <button id="btn" onclick="MyFriend()">我的好友</button>
                <button id="btn" onclick="MyGroup()">我的群组</button>

                <div class="RecentContact" id="RecentContact" style="display:none;">    <!--最近联系-->
                    <div class="Friend_bd" style="background-color:rgb(255, 0, 0);">   <!--红色表示在线-->
                        <p class="Friend_Other">好友名称1号</p>
                        <p class="Friend_Other">好友账号</p>
                        <br>
                    </div>
                    <div class="Friend_bd" style="background-color:rgb(255, 230, 0);">    <!--黄色表示忙碌-->
                        <p class="Friend_Other">好友名称2号</p>
                        <p class="Friend_Other">好友账号</p>
                        <br>
                    </div>
                    <div class="Friend_bd" style="background-color:rgb(172, 172, 172);">    <!--灰色表示离线-->
                        <p class="Friend_Other">好友名称3号</p>
                        <p class="Friend_Other">好友账号</p>
                        <br>
                    </div>
                </div>

                <div class="MyFriend" id="MyFriend">    <!--我的好友-->
                    <table>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" onclick="openDiv(this)">好友分组1</a>
                                <div class="Friend">   
                                    <div class="Friend_bd" style="background-color:rgb(255, 0, 0);">   <!--红色表示在线-->
                                        <p class="Friend_Other">好友名称1号</p>
                                        <p class="Friend_Other">好友账号</p>
                                        <br>
                                    </div>
                                    <div class="Friend_bd" style="background-color:rgb(255, 230, 0);">    <!--黄色表示忙碌-->
                                        <p class="Friend_Other">好友名称2号</p>
                                        <p class="Friend_Other">好友账号</p>
                                        <br>
                                    </div>
                                    <div class="Friend_bd" style="background-color:rgb(172, 172, 172);">    <!--灰色表示离线-->
                                        <p class="Friend_Other">好友名称3号</p>
                                        <p class="Friend_Other">好友账号</p>
                                        <br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" onclick="openDiv(this)">好友分组2</a>
                                <div class="Friend">   
                                    <div class="Friend_bd" style="background-color:rgb(255, 0, 0);">   <!--红色表示在线-->
                                        <p class="Friend_Other">好友名称1号</p>
                                        <p class="Friend_Other">好友账号</p>
                                        <br>
                                    </div>
                                    <div class="Friend_bd" style="background-color:rgb(255, 230, 0);">    <!--黄色表示忙碌-->
                                        <p class="Friend_Other">好友名称2号</p>
                                        <p class="Friend_Other">好友账号</p>
                                        <br>
                                    </div>
                                    <div class="Friend_bd" style="background-color:rgb(172, 172, 172);">    <!--灰色表示离线-->
                                        <p class="Friend_Other">好友名称3号</p>
                                        <p class="Friend_Other">好友账号</p>
                                        <br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- <span><h3 class="Friend_h3">我的好友</h3></span> -->
                <div class="MyGroup" id="MyGroup" style="display:none;">   <!--我的群组-->
                    秦始皇<br />
                    刘邦<br />
                    李世民<br />
                    康熙<br />  
                </div>
            </div>
            
            <button type="submit" id="Add_friends" class="Add_friends">添加好友</button>
            <button type="submit" id="Add_group" class="Add_group">添加群组</button>
        </div>
        <div id="Main_center">
            <div id="MsgBoard">

            </div>
            <input type="text" name="SentText" class="SentText" id="SentText"/>
            <button type="submit" id="Sent" class="Sent">发送</button>
        </div>
        <div id="Main_right">
            <div id="Group_Members">
            
            </div>
        </div>
	</div>
</body>
</html>