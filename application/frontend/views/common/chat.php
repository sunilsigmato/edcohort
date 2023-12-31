<style>
.chat-header{
        background: #c4d7e6;
    width: 90%;
    float: left;
} 
.chat-close-btn{
  width: 9%;
    float: left;
} 
.chat_box .chat_message_wrapper ul.chat_message > li + li {
    margin-top: 4px;
}
.popup-box-on {
    display: block !important;
}
a:focus {
    outline: none;
    outline-offset: 0px;
}
.pull-left{padding-bottom:5px;}
.popup-head-left.pull-left h1 {
    color: #fff;
    float: left;
    font-family: oswald;
    font-size: 18px;
    margin: 2px 0 0 5px;
    padding-top:7%;
   
}
.popup-head-left a small {
    display: table;
    font-size: 11px;
    color: #fff;
    line-height: 4px;
    opacity: 0.5;
    padding: 0 0 0 7px;
}
.chat-header-button {
    color:white;
    background: transparent none repeat scroll 0 0;
    border: 1px solid #fff;
    border-radius: 7px;
    font-size: 15px;
    height: 26px;
    opacity: 0.9;
    padding: 0;
    text-align: center;
    width: 26px;
}
.popup-head-right {
    margin: 9px 0 0;
}
.popup-head .btn-group {
    margin: -5px 3px 0 -1px;
}
.gurdeepoushan .dropdown-menu {
    padding: 6px;
}
.gurdeepoushan .dropdown-menu li a span {
    border: 1px solid;
    border-radius: 50px;
    display: list-item;
    font-size: 19px;
    height: 40px;
    line-height: 36px;
    margin: auto;
    text-align: center;
    width: 40px;
}
.gurdeepoushan .dropdown-menu li {
    float: left;
    text-align: center;
    width: 33%;
}
.gurdeepoushan .dropdown-menu li a {
    border-radius: 7px;
    font-family: oswald;
    padding: 3px;
   transition: all 0.3s ease-in-out 0s;
}
.gurdeepoushan .dropdown-menu li a:hover {
    background:#304445 none repeat scroll 0 0 !important;
    color: #fff;
}
.popup-head {
    background: #4585bd none repeat scroll 0 0 !important;
    border-bottom: 3px solid #ccc;
    color: #fff;
    display: table;
    width: 100%;
    padding: 8px 8px 0 8px;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
}
.popup-head .md-user-image {
    border: 2px solid #5a7172;
    border-radius: 12px;
    float: left;
    width: 44px;
    height:44px;
}
.uk-input-group-addon .glyphicon.glyphicon-send {
    color: #ffffff;
    font-size: 21px;
    line-height: 36px;
    padding: 0 6px;
}
.chat_box_wrapper.chat_box_small.chat_box_active {
    border-left: 2px solid #4585bd;
    border-bottom: 2px solid #4585bd;
    border-right: 2px solid #4585bd;
    height: 353px;
    overflow-y: scroll;
    width: 300px;
}
aside {
     background-attachment: fixed;
    background-clip: border-box;
    background-color: rgba(0, 0, 0, 0);
    background-image: url("https://scontent.fluh1-1.fna.fbcdn.net/v/t1.0-9/12670232_624826600991767_3547881030871377118_n.jpg?oh=226475bcd22faf19705858eb58e776cd&oe=59CE39E7");
    background-origin: padding-box;
    background-position: center top;
    background-repeat: repeat;
    bottom: 0;
    display: none;
    height: 488px;
    position: fixed;
    right: 70px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
}
.chat_box,#chat {
    padding: 16px;
    background: #d2d8e4;
}
.chat_box .chat_message_wrapper::after {
    clear: both;
}
.chat_box .chat_message_wrapper::after, .chat_box .chat_message_wrapper::before {
    content: " ";
    display: table;
}
.chat_box .chat_message_wrapper .chat_user_avatar {
    float: left;
}
.chat_box .chat_message_wrapper {
    margin-bottom: 32px;
}
.md-user-image {
    border-radius: 50%;
    width: 34px;
    height:34px;
}
img {
    border: 0 none;
    box-sizing: border-box;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
}
.chat_box .chat_message_wrapper ul.chat_message, .chat_box .chat_message_wrapper ul.chat_message > li {
    list-style: outside none none;
    padding: 0;
}
.chat_box .chat_message_wrapper ul.chat_message {
    float: left;
    margin: 0 0 0 20px;
    max-width: 77%;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-right-color: #616161;
}
.chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-color: transparent #ededed transparent transparent;
    border-style: solid;
    border-width: 0 16px 16px 0;
    content: "";
    height: 0;
    left: -14px;
    position: absolute;
    top: 0;
    width: 0;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li {
    background: #FCFBF6 none repeat scroll 0 0;
    color: #000000;
}
.open-btn {
    border-radius: 32px;
    color: #757575 !important;
    display: inline-block;
    margin: 10px 0 0;
    padding: 9px 16px;
    text-decoration: none !important;
    text-transform: uppercase;
}
.chat_box .chat_message_wrapper ul.chat_message > li {
    background: #ededed none repeat scroll 0 0;
    border-radius: 4px;
    clear: both;
    color: #212121;
    display: block;
    float: left;
    font-size: 13px;
    padding: 8px 16px;
    position: relative;
    word-break: break-all;
}
.chat_box .chat_message_wrapper ul.chat_message, .chat_box .chat_message_wrapper ul.chat_message > li {
    list-style: outside none none;
    padding: 0;
}
.chat_box .chat_message_wrapper ul.chat_message > li {
    margin: 0;
}
.chat_box .chat_message_wrapper ul.chat_message > li p {
    margin: 0;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li .chat_message_time {
    color: rgba(185, 186, 180, 0.9);
}
.chat_box .chat_message_wrapper ul.chat_message > li .chat_message_time {
    color: #727272;
    display: block;
    font-size: 11px;
    padding-top: 2px;
    text-transform: uppercase;
}
.chat_box .chat_message_wrapper.chat_message_right .chat_user_avatar {
    float: right;
}
.chat_box .chat_message_wrapper.chat_message_right ul.chat_message {
    float: right;
    margin-left: 0 !important;
    margin-right: 24px !important;
}
.chat_box.chat_box_colors_a .chat_message_wrapper.chat_message_right ul.chat_message > li:first-child::before {
    border-left-color: #E8FFD4;
}
.chat_box.chat_box_colors_a .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-right-color: #FCFBF6;
}
.chat_box .chat_message_wrapper.chat_message_right ul.chat_message > li:first-child::before {
    border-color: transparent transparent transparent #ededed;
    border-width: 0 0 29px 29px;
    left: auto;
    right: -14px;
}
.chat_box .chat_message_wrapper ul.chat_message > li:first-child::before {
    border-color: transparent #ededed transparent transparent;
    border-style: solid;
    border-width: 0 29px 29px 0;
    content: "";
    height: 0;
    left: -14px;
    position: absolute;
    top: 0;
    width: 0;
}
.chat_box.chat_box_colors_a .chat_message_wrapper.chat_message_right ul.chat_message > li {
    background: #E8FFD4 none repeat scroll 0 0;
}
.chat_box .chat_message_wrapper ul.chat_message > li {
    background: #ededed none repeat scroll 0 0;
    border-radius: 12px;
    clear: both;
    color: #212121;
    display: block;
    float: left;
    font-size: 13px;
    padding: 8px 16px;
    position: relative;
}
.gurdeep-chat-box {
    background: #fff none repeat scroll 0 0;
    border-radius: 5px;
    padding: 3px;
}
#msg {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    padding: 4px;
}
.gurdeep-chat-box i {
    color: #333;
    font-size: 21px;
    line-height: 1px;
}
.chat_submit_box {
    bottom: 80px;
    box-sizing: border-box;
    left: 0;
    overflow: hidden;
    position: absolute;
    width: 98%;
    margin-left: 2px;
}
.uk-input-group {
    border-collapse: separate;
    position: relative;
}
</style>
<script type="text/javascript">
	window.setInterval(function(){
        loadMsg();
    }, 5000);
		$(document).ready(function(){
			
			loadMsg();			
						
			$("#msg").keypress(function(event){
			    var keycode = (event.keyCode ? event.keyCode : event.which);
			    name = $("#name").val();
    			msg = $("#msg").val();
	            if(keycode == '13' && msg != '')
	            {
    			    jQuery.ajax({
                        url: '<?php echo base_url(); ?>update-chat-visitor',
                        dataType: 'text',
                        type: 'post',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {'name':name,'msg':msg},
                        success: function( data, textStatus, jQxhr ){
                            $("#messagesbox").append('<div class="chat_message_wrapper chat_message_right"><ul class="chat_message"><li><p>'+$("#msg").val()+'</p></li></ul></div>');
        					$("#msg").val("");					
        					$("#msg").focus();
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );
                        }
                    });					
    				return false;
	            }
			});
		});
		function loadMsg() 
    		{
                ip = $("#current_ip").val();
                $.ajax({
                    url: '<?php echo base_url(); ?>getall-visitor',
                    dataType: 'text',
                    type: 'get',
                    contentType: 'application/x-www-form-urlencoded',
                    data: {'ip':ip},
                    success: function( data, textStatus, jQxhr ){
                        $("#loading").remove();				
        			    $("#messagesbox").html(data);
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
    		}
</script>

<aside id="sidebar_secondary" class="tabbed_sidebar ng-scope chat_sidebar">
<div class="popup-head">
    <div class="popup-head-left pull-left">
        <img class="md-user-image" alt="<?php echo $operator->NM_USER_FULLNAME; ?>" title="<?php echo $operator->NM_USER_FULLNAME; ?>" src="../../uploads/chat/profile/<?php echo $operator->profile_pic; ?>" title="<?php echo $operator->NM_USER_FULLNAME; ?>" alt="<?php echo $operator->NM_USER_FULLNAME; ?>">
        <h1><?php echo $operator->NM_USER_FULLNAME; ?></h1>
    </div>
    <div class="popup-head-right pull-right">
        <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
    </div>
</div>
<div id="chat" class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
    <div class="chat_box touchscroll chat_box_colors_a" id="messagesbox">
    </div>
</div>
<div class="chat_submit_box">
    <div class="uk-input-group ">
        <div class="gurdeep-chat-box">
            <input type="text" placeholder="Type a message" id="msg" name="msg" class="md-input">
        </div>
        
        <!--<div class="col-md-2 ">-->
        <!--    <a href="#" id="insert-btn"><i class="glyphicon glyphicon-send"></i></a>-->
        <!--</div>-->
    </div>
</div>
</div>