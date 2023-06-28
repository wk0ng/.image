<?php
    // 加载语言文件
	require_once __DIR__."/lang/zh-cn.php";
    $lang_id = '1';
	if(@isset($_GET['lang'])){
		if($_GET['lang'] == '1'){
			require_once __DIR__."/lang/en.php";
            $lang_id = '2';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title><?php echo $LANG_CONFIG['title'];?></title>
    <link rel="stylesheet" type="text/css" href="new_style/deepblue.css"/>
    <script src="/easyui/jquery.min.js"></script>
    <script src="js/json2.js"></script>
    <script src="js/crypto-js.js"></script>
    <script src="js/password_protector.js"></script>
    <!-- thick box -->
    <link rel="stylesheet" href="client/thickbox.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="client/thickbox.js"></script>
    <!-- thick box end -->
    <style>
        .main {
            background: #000c31 center no-repeat url(<?php echo $CONFIG['bgimg'];?>);
            height: 410px;
            min-width: 1000px;
            width: expression_r(document.body.clientWidth < 1000 ? "1000px": "auto" );
        }

        body {
            background: #fff;
            color: #666;
            font-family: "微软雅黑", "宋体", Arial;
            font-size: 14px;
            line-height: 17px;
            margin: 0;
            padding: 0;
        }

        .two-box {
            background: #fff;
            width: 160px;
            height: 160px;
            margin: 5px auto 5px auto;
        }

        .two-box img {
            width: 140px;
            height: 140px;
            margin: 10px;
        }

        .two {
            text-align: center;

        }

        .two a {
            color: #02BEF0;
        }

        .two .l {
            color: #fff;
        }

        .two .r {
            color: #fff;
        }

        .tab {
            border-bottom: 1px #0099C1 solid;
            margin-left: -30px;
            margin-right: -30px;
            margin-bottom: 18px;
            text-align: center;
        }

        .tab a {
            display: inline-block;
            text-align: center;
            width: 49%;
            line-height: 40px;
        }

        .tab a.tab-on {
            background-color: #0099C1;
        }

        .bottom {
            position: absolute;
            margin: 0 0 10px 0;
            padding: 0;
            bottom: 0;
            width: 80%;
        }

        .bottom a {
            color: #09BDEC;
        }

        .push {
            text-align: center;
            font-size: 12px;
        }

        .push .user {
            margin: 30px auto;
        }

        .push .btn {
            display: block;
            background: #09BDEC;;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
        }

        .push .text {
            margin-top: 10px;
        }

        .push .text span {
            display: block
        }

        .push .text a {
            display: block;
            color: #09BDEC;
            text-decoration: underline;
        }

        .link a {
            color: #09BDEC;
        }

        #qr_tips p {
            margin-top: 10px;
        }

        .advance_link {
            float: right;
            margin-top: 30px;
        }

        .advance_link a {
            color: #09BDEC;
        }

        #submit_div {
            width: 100%;
            margin-bottom: 15px;
        }

        #qrcode_div {
            margin-bottom: 20px;
        }

        #qr_logined_status span {
            color: #ccc;
        }

        #qr_confirm {
            display: none;
        }

        #qr_switch_user {
            display: none;
        }

        .qr_username {
            color: #ccc;
            font-size: 14px;
        }

        .input_button {
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
        <!--
        $(function () {
            $(".advance_qr").click(function (event) {
                $("#content").slideToggle(200);
            });
            $("#user_name").click(function (event) {
                if ($("#user_name").val() == "<?php echo $LANG_CONFIG['loginUser'];?>") {
                    $("#user_name").css("color", "#222");
                    $("#user_name").val("");
                }
                event.stopPropagation();
            });
            $("#user_name").focus(function (event) {
                if ($("#user_name").val() == "<?php echo $LANG_CONFIG['loginUser'];?>") {
                    $("#user_name").css("color", "#222");
                    $("#user_name").val("");
                }
                event.stopPropagation();
            });
            $("#user_name").blur(function (event) {
                if ($("#user_name").val() == "<?php echo $LANG_CONFIG['loginUser'];?>") {
                    $("#user_name").css("color", "#222");
                    $("#user_name").val("");
                }
                event.stopPropagation();
            });
            $("#show_pass").click(function (event) {
                $("#show_pass").hide();
                $("#pass").show().focus();
                $("#vk").show();
                event.stopPropagation();
            });
            $("#show_pass").focus(function (event) {
                $("#show_pass").hide();
                $("#pass").show().focus();
                $("#vk").show();
                event.stopPropagation();
            });
            $("#show_pass").blur(function (event) {
                $("#show_pass").hide();
                $("#pass").show().focus();
                $("#vk").show();
                event.stopPropagation();
            });
            $("#subjoin_code").click(function (event) {
                if ($("#subjoin_code").val() == "<?php echo $LANG_CONFIG['loginVerify'];?>") {
                    $("#subjoin_code").val("");
                    $("#subjoin_code").css("color", "#222");
                }
                event.stopPropagation();
            });
            $("#subjoin_code").focus(function (event) {
                if ($("#subjoin_code").val() == "<?php echo $LANG_CONFIG['loginVerify'];?>") {
                    $("#subjoin_code").val("");
                    $("#subjoin_code").css("color", "#222");
                }
                event.stopPropagation();
            });
            $("#subjoin_code").blur(function (event) {
                if ($("#subjoin_code").val() == "<?php echo $LANG_CONFIG['loginVerify'];?>") {
                    $("#subjoin_code").val("");
                    $("#subjoin_code").css("color", "#222");
                }
                event.stopPropagation();
            });
            $("#toggle").hover(function () {
                    $("#popup").toggle();
                },
                function (event) {
                    $("#popup").toggle();
                });
        });
        -->
    </script>
</head>

<body>
<div class="blueline">&nbsp;</div>
<div class="header">
    <div class="logo l"><img src="<?php echo $CONFIG['logo'];?>" height="44" alt="logo"/></div>
    <div class="help r">
        <a href="fw/app_list.php" target="_blank"><img src="images/2.png" width="28" height="28" title="<?php echo $LANG_CONFIG['download'];?>"/><?php echo $LANG_CONFIG['download'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="welcome.php?lang=<?php echo $lang_id;?>"><img src="images/1.png" width="28" height="28" title="<?php echo $LANG_CONFIG['changeLang'];?>"/><?php echo $LANG_CONFIG['changeLang'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="clear">&nbsp;</div>
</div>
<div class="main">
    <div class="block">
        <div class="slogan l">
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <h2><?php echo $LANG_CONFIG['infoTitle'];?></h2>
            <h3><?php echo $LANG_CONFIG['infoText'];?></h3></div>
        <div class="form l" style="position: relative">
            <div class="tab" id="head_3">
                <a href="javascript:void(0)">
                    <?php
                        if(@isset($_SESSION['user']) && @isset($_SESSION['action'])){
                            if($_SESSION['action'] == 'bindPhone'){
                                echo $LANG_CONFIG['smsLoginTitle'];
                            }
                        else{
                            echo $LANG_CONFIG['loginTitle'];
                        }
                    ?></a>
            </div>
            <div class="clear">&nbsp;</div>
            <form action="login_action.php?id=0" method="post" name="login_form" id="login_form">
                <div id="input_div">
                    <?php
                        if(@isset($_SESSION['user']) && @isset($_SESSION['action'])){
                            if($_SESSION['action'] == 'bindPhone'){
                    ?>
                                <input type="hidden" value="<?php echo $_SESSION['user']; ?>">
                                <div class="input_code l" style="position:relative;z-index:99">
                                    <img src="images/form_sms.gif" width="20" height="20"/>
                                    <input name="subjoin_code" id="subjoin_code" style="color:#999" type="text" maxlength="6"
                                        value="<?php echo $LANG_CONFIG['loginSms'];?>" onkeypress="return handleEnter(this, event)"/>
                                </div>
                                <div class="input_code_image r" style="position:relative;z-index:99">
                                    <button id="getSMSCode" class="input_button">获取验证码</button>
                                    <script>
                                        $('#getSMSCode').click(function(){
                                            this.attr("disabled", true);
                                            this.css("background-color", "#5CA7EE");
                                            var t = 60;

                                            this.html(t.toString()+"后重新获取");

                                            while(t>0){
                                                setTimeout(1000, "t=t-1");
                                                this.html(t.toString()+"后重新获取");
                                            }

                                            this.html("获取验证码");
                                            this.attr("disabled", false);
                                            this.css("background-color", "#025baf");
                                        });
                                    </script>
                                </div>
                    <?php
                            }
                        }else{

                    ?>

                    <div class="input" id="name_div" style="display:"><img src="images/form_user.gif" width="20"
                                                                           height="20" alt="<?php echo $LANG_CONFIG['loginUserAlt'];?>"/><input
                            name="user_name" id="user_name" type="text" autocomplete="off" value="<?php echo $LANG_CONFIG['loginUser'];?>"
                            style="color:#999" onkeypress="return handleEnter(this, event)"/></div>

                    <div class="input" id="pass_div" style="display:"><img src="images/form_password.gif" width="20"
                                                                           height="20" alt="<?php echo $LANG_CONFIG['loginPassAlt'];?>"/><input
                            name="show_pass" id="show_pass" autocomplete="off" style="color:#999" type="text"
                            value="<?php echo $LANG_CONFIG['loginPass'];?>"/><input name="pass" id="pass" autocomplete="off" type="password"
                                                           value="" onkeypress="return handleEnter(this, event)"
                                                           style="width:181px;display:none;"/>
                    </div>

                    <div class="input_code l" style="position:relative;z-index:99"><img src="images/form_key.gif"
                                                                                        width="20" height="20"
                                                                                        alt="<?php echo $LANG_CONFIG['loginVerifyAlt'];?>"/><input
                            name="subjoin_code" id="subjoin_code" style="color:#999" type="text" maxlength="4"
                            value="<?php echo $LANG_CONFIG['loginVerify'];?>" onkeypress="return handleEnter(this, event)"/></div>
                    <div class="input_code_image r" style="position:relative;z-index:99"><img
                            style="cursor:pointer;width: 88px;height: 32px" title="<?php echo $LANG_CONFIG['loginVerifyTitle'];?>" id="refresh" border='0'
                            src='/captcha.php?vtype=2&t=1687761021'
                            onclick="document.getElementById('refresh').src='/captcha.php?vtype=2&t='+Math.random()"/>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="clear">&nbsp;</div>
                    <div class="l" id="submit_div" style="position:relative;">
                        <input name="sub" type="button" value="<?php echo $LANG_CONFIG['loginBtn'];?>" class="input_button"
                               onClick="javascript:check_and_submit();"/>
                        <span class="advance_link">
                                                        <a href="javascript:void(0);" class="advance_qr"><?php echo $LANG_CONFIG['optionLink'];?></a>
                        </span>
                    </div>
                </div>
                <div class="clear">&nbsp;</div>
            </form>
        </div>
    </div>
    <div class="clear">&nbsp;</div>
</div>
<div class="content" id="content">
    <div id="popup"><?php echo $LANG_CONFIG['popupText'];?></div>
    <div class="r">
        <div class="title">
            <a href="app.php?placeValuesBeforeTB_=savedValues&amp;TB_iframe=true&amp;height=315&amp;width=704&amp;modal=false"
                class="thickbox">
                <img src="images/deepblue_download.gif" width="32" height="31" alt="<?php echo $LANG_CONFIG['moduleDownloadBtn'];?>"/>
                <?php echo $LANG_CONFIG['moduleDownloadBtn'];?>
            </a>
        </div>
        <div class="tip"><?php echo $LANG_CONFIG['moduleDownloadText'];?></div>
    </div>
    <div class="clear">&nbsp;</div>
</div>
<div class="footer">
    <P ALIGN='center'><FONT FACE='arial, helvetica' SIZE='-1'><?php echo $LANG_CONFIG['copyRight'];?></FONT></P></div>
</body>
</html>
<style>
    #keycon {
        margin: 100px auto;
        width: 388px;
        background: #051c37;
    }

    #keyboard {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    #keyboard li {
        float: left;
        margin: 2px 2px 2px 2px;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        background: #fff;
        border: 1px solid #f9f9f9;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
    }

    .capslock, .tab, .left-shift {
        clear: left;
    }

    #keyboard .tab, #keyboard .delete {
        width: 40px;
    }

    #keyboard .capslock {
        width: 41px;
    }

    #keyboard .return {
        width: 41px;
    }

    #keyboard .left-shift {
        width: 54px;
    }

    #keyboard .right-shift {
        width: 54px;
    }

    .lastitem {
        margin-right: 0;
    }

    .uppercase {
        text-transform: uppercase;
    }

    #keyboard .space {
        width: 287px;
    }

    #keyboard .close {
        width: 80px;
    }

    .on {
        display: none;
    }

    #keyboard li:hover {
        position: relative;
        top: 1px;
        left: 1px;
        border-color: #e5e5e5;
        cursor: pointer;
    }
</style>
<div id="keycon" style="position:absolute;z-index:10000; left: 60%; top: 225px; visibility: visible;display:none">
    <ul id="keyboard">
        <li class="symbol"><span class="off">`</span><span class="on">~</span></li>
        <li class="symbol"><span class="off">1</span><span class="on">!</span></li>
        <li class="symbol"><span class="off">2</span><span class="on">@</span></li>
        <li class="symbol"><span class="off">3</span><span class="on">#</span></li>
        <li class="symbol"><span class="off">4</span><span class="on">$</span></li>
        <li class="symbol"><span class="off">5</span><span class="on">%</span></li>
        <li class="symbol"><span class="off">6</span><span class="on">^</span></li>
        <li class="symbol"><span class="off">7</span><span class="on">&amp;</span></li>
        <li class="symbol"><span class="off">8</span><span class="on">*</span></li>
        <li class="symbol"><span class="off">9</span><span class="on">(</span></li>
        <li class="symbol"><span class="off">0</span><span class="on">)</span></li>
        <li class="symbol"><span class="off">-</span><span class="on">_</span></li>
        <li class="symbol"><span class="off">=</span><span class="on">+</span></li>
        <li class="delete lastitem">delete</li>
        <li class="tab">tab</li>
        <li class="letter">q</li>
        <li class="letter">w</li>
        <li class="letter">e</li>
        <li class="letter">r</li>
        <li class="letter">t</li>
        <li class="letter">y</li>
        <li class="letter">u</li>
        <li class="letter">i</li>
        <li class="letter">o</li>
        <li class="letter">p</li>
        <li class="symbol"><span class="off">[</span><span class="on">{</span></li>
        <li class="symbol"><span class="off">]</span><span class="on">}</span></li>
        <li class="symbol lastitem"><span class="off">\</span><span class="on">|</span></li>
        <li class="capslock">caps</li>
        <li class="letter">a</li>
        <li class="letter">s</li>
        <li class="letter">d</li>
        <li class="letter">f</li>
        <li class="letter">g</li>
        <li class="letter">h</li>
        <li class="letter">j</li>
        <li class="letter">k</li>
        <li class="letter">l</li>
        <li class="symbol"><span class="off">;</span><span class="on">:</span></li>
        <li class="symbol"><span class="off">'</span><span class="on">&quot;</span></li>
        <li class="return lastitem">return</li>
        <li class="left-shift">shift</li>
        <li class="letter">z</li>
        <li class="letter">x</li>
        <li class="letter">c</li>
        <li class="letter">v</li>
        <li class="letter">b</li>
        <li class="letter">n</li>
        <li class="letter">m</li>
        <li class="symbol"><span class="off">,</span><span class="on">&lt;</span></li>
        <li class="symbol"><span class="off">.</span><span class="on">&gt;</span></li>
        <li class="symbol"><span class="off">/</span><span class="on">?</span></li>
        <li class="right-shift lastitem">shift</li>
        <li class="space lastitem">&nbsp;</li>
        <li class="close lastitem" onclick="document.getElementById('keycon').style.display='none';">关闭</li>
    </ul>
</div>
<script type="text/javascript" src="easyui/keyboard.js"></script>
<script language="javascript">
    function handleResponse(response) {
        start_up(36000);
    }

    var g_port = 36000;

    function start_up() {
        var url = "http://127.0.0.1:" + g_port + "/broker?cmd=launch_client";
        document.getElementById('bt1').style.display = "none";
        document.getElementById('bt2').style.display = "";
        if (g_port > 36009) {
            document.getElementById('bt1').style.display = "";
            document.getElementById('bt2').style.display = "none";
            document.getElementById('info1').style.display = "none";
            document.getElementById('info2').style.display = "";
            g_port = 36000;
            return false;
        }
        $.ajax({
            async: true,
            type: "GET",
            url: url,
            data: "",
            success: function (msg) {
                document.getElementById('bt1').style.display = "";
                document.getElementById('bt2').style.display = "none";
                document.getElementById('info1').style.display = "";
                document.getElementById('info2').style.display = "none";
                return true;
            },
            error: function (msg) {
                g_port++;
                start_up();
            }
        });
        return false;
    }

    var qrcode_logined = 0;
    var mac_os = 1;
    var qrcode_logined_confirm = false;
    var authid = 0;
    var qrcode_push = 0;
    var clear_push = 0;
    var timeout_counter;

    function handleEnter(field, event) {
        var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
        if (keyCode == 13) {
            return check_and_submit();
        }
        return true;
    }

    function Trim(strVal) {
        var strTmp = strVal + "";
        if (strTmp.length == 0)
            return (strTmp);
        reVal = /^\s*|\s*$/g;
        return (strTmp.replace(reVal, ''));
    }

    function check_and_submit() {
        if (document.getElementById('name_div').style.display == "") {
            if ((Trim(document.login_form.user_name.value) == "") || (document.login_form.user_name.value == "<?php echo $LANG_CONFIG['loginUser'];?>")) {
                alert("<?php echo $LANG_CONFIG['nameError'];?>");
                document.login_form.user_name.focus();
                return;
            }
        }
        if (document.getElementById('pass_div').style.display == "") {
            if (document.login_form.pass.value == "") {
                alert("<?php echo $LANG_CONFIG['passError'];?>");
                document.login_form.pass.focus();
                return;
            }
        }
        if ((document.login_form.subjoin_code.value == "") || (document.login_form.subjoin_code.value == "<?php echo $LANG_CONFIG['loginVerify'];?>")) {
            alert("<?php echo $LANG_CONFIG['codeError'];?>");
            document.login_form.subjoin_code.focus();
            return false;
        }
        setTimeout("do_login_submit()", 0);
        return false;
    }

    function do_login_submit() {
        var pass_enc = password_encrypt("1687775212", $("#pass").val());
        $("#pass").val(pass_enc);
        document.login_form.submit();
        return false;
    }

    function change_show_content(obj) {
        var arr = obj.value.split("=@@=");
        var div = document.getElementById("subAuth");
        var input = document.getElementById("subAuthName");
        var name = document.getElementById("name_div");
        var pass = document.getElementById("pass_div");
        var passval = document.getElementById("show_pass");
        if (arr[5]) {
            authid = arr[2];
        }

        qrcode_push = arr[7];

        input.value = arr[3];
        if (arr[0] == arr[2]) div.style.display = "none";
        else div.style.display = "";

        if ((arr[4] == 4) || (arr[4] == 5) || (arr[4] == 6)) {
            name.style.display = "none";
            pass.style.display = "none";
        } else {
            name.style.display = "";
            pass.style.display = "";
        }
        if (arr[4] == 16) {
            if (arr[6] == 0)
                passval.value = "请输入奇安信ID动态口令";
            else if (arr[6] == 1)
                passval.value = "请输入奇安信ID密码+动态口令";
            else
                passval.value = "请输入前缀+奇安信ID动态口令";
        } else {
            passval.value = "<?php echo $LANG_CONFIG['loginPass'];?>";
        }
        if (arr[5]) {
            if (qrcode_logined == authid && qrcode_push) {
                qrcode_logined = authid;
                show_qrcode_logined(arr[5]);
            } else {
                show_qrcode(arr[5]);
            }
        }
        return true;
    }

    function show_qrcode(type) {  // type 0 is not show qrcode, 1 is show qrcode, 2 is only show qrcode.
        if (qrcode_logined == authid && qrcode_push) {
            show_qrcode_logined(type);
            return;
        }

        var div1 = document.getElementById("input_div");
        var div2 = document.getElementById("qrcode_div");
        var con1 = document.getElementById("qr1");
        var con2 = document.getElementById("qr2");
        var con3 = document.getElementById("qr3");
        var con_qr_tips = document.getElementById("qr_tips");
        var head_1 = document.getElementById("head_1");
        var head_2 = document.getElementById("head_2");
        var head_3 = document.getElementById("head_3");
        global_qr_do = false;

        if (type == 0) {
            div1.style.display = "";
            div2.style.display = "none";
            con1.style.display = "none";
//		con2.style.display="none";
//		con3.style.display="";
            con_qr_tips.style.display = "none";
            head_1.style.display = "none";
            head_2.style.display = "none";
            head_3.style.display = "";
        } else if (type == 1) {
            global_qr_do = true;
            reload_qrimg();
            div1.style.display = "none";
            div2.style.display = "";
            head_1.style.display = "";
            head_2.style.display = "none";
            head_3.style.display = "none";
            con1.style.display = "";
            con2.style.display = "";
            con3.style.display = "";
            con_qr_tips.style.display = "";
            con2.setAttribute("class", "tab-on");
            con3.removeAttribute("class", "tab-on");

            $(".bottom a").show();
            $('.bottom #qr_return').hide();
        } else if (type == 2) {
            global_qr_do = true;
            reload_qrimg();
            div1.style.display = "none";
            div2.style.display = "";
            head_1.style.display = "none";
            head_2.style.display = "";
            head_3.style.display = "none";
            con1.style.display = "";
            con_qr_tips.style.display = "";
        } else if (type == 99) {
            div1.style.display = "";
            div2.style.display = "none";
            head_1.style.display = "";
            head_2.style.display = "none";
            head_3.style.display = "none";
            con1.style.display = "none";
            con2.style.display = "";
            con3.style.display = "";
            con_qr_tips.style.display = "none";
            con2.removeAttribute("class", "tab-on");
            con3.setAttribute("class", "tab-on");
        }
        if (mac_os == 2) {
            $(".bottom").hide();
        }
        $('#qr_push').hide();
        return false;
    }

    function web_auto_login() {
        var login_server = "";
        var obj = document.login_form.auth_server;
        for (var i = 0; i < obj.options.length; i++) {
            if (obj.options[i].value == "")
                document.login_form.auth_server.options[i].selected = true;
        }
        change_show_content(obj);
    }

    function stopTimeout() {
        if (timeout_counter) {
            clearTimeout(timeout_counter);
        }
    }

    function reload_qrimg() {
        if (global_qrtoken != "") {
            var is_qr_exist = qrcode_logined == authid && qrcode_push ? 1 : 0;
            $.post("qr_status.php", {
                t: global_qrtoken,
                type: 1,
                authid: authid,
                is_logined: is_qr_exist,
                clear_push: clear_push
            }, function (txt) {
                var obj = JSON.parse(txt);
                global_qrtime = 60;
                global_qrtoken = obj.token;
                document.getElementById("qr_token").value = obj.token;
                clear_push = 0;
                if (!is_qr_exist) {
                    var tips = "请使用手机奇安信ID扫码登录";
                    var clickEvent = "";
                    if (!obj.qr_data) {
                        tips = "获取二维码失败";
                        clickEvent = "onclick='reload_qrimg();'";
                    }
                    $("#qr1").html("<a href='javascript:void(0);'" + clickEvent + "><img src='" + obj.qr_url + "&t=" + Math.random() + "'/></a>");
                    $("#qr_tips .qr_tips_main").html(tips);
                    qrcode_logined_confirm = false;
                }
                stopTimeout();
                check_qrcode_status();
            });
        }
        return true;
    }

    function do_qr_login_submit() {
        document.qr_form.submit();
    }

    function check_qrcode_status() {
        if (global_qr_do == false) return false;

        var is_qr_exist = qrcode_logined == authid ? 1 : 0;

        if (global_qrtime < 1) {
            $("#qr1").html("<a href='javascript:void(0);' onclick='reload_qrimg();'><img src='images/qr_timeout.png?t=" + Math.random() + "'/></a>");
            $("#qr_tips .qr_tips_main").html("二维码已过期，请刷新");

            stopTimeout();

            if (qrcode_logined_confirm) {
                qrcode_logined = 0;
                reload_qrimg();
                $("#qr_push").hide();
                $('.bottom a').show();
                $('.bottom #qr_return').hide();
                setTimeout('$("#qrcode_div").show()', 100);
            }
        } else {
            $.post("qr_status.php", {
                t: global_qrtoken,
                type: 0,
                authid: authid,
                is_logined: is_qr_exist,
                qrcode_push: qrcode_push
            }, function (txt) {
                var tmp = txt.split("@@");
                if (tmp[0] == "login") {
                    $("#qr_uid").val(decodeURI(tmp[1]));
                    setTimeout("do_qr_login_submit()", 10);
                    return false;
                } else if (tmp[0] == "waiting") {
                    global_qrtime = 60;
                    $('#qr_push .qr_username').html(decodeURI(tmp[1]));
                    show_qrcode_login_redirect();
                    return false;
                } else if (tmp[0] == "stop") {
                    global_qrtime = -1;
                    return false;
                } else {
                    return false;
                }
            });
            global_qrtime--;
            global_qrtime--;
            timeout_counter = setTimeout("check_qrcode_status()", 2000);
        }
        return true;
    }

    function show_qrcode_login_redirect() {
        qrcode_logined_confirm = true;
        $('#qrcode_div').hide();
        $('#submit_div').hide();
        $('#qr_login').hide();
        $('#qr_switch_user').hide();
        $('#qr_confirm').show();
        $("#qr_push").show();
        $('.bottom a').hide();
        $('#qr_return').show();
    }

    function show_qrcode_login_confirm() {
        qrcode_logined_confirm = true;
        $('#qr_login').hide();
        $('#qr_switch_user').hide();
        $('#qr_confirm').show();
        $('.bottom a').hide();
        $('#qr_return').show();
        reload_qrimg();
    }

    function switch_qrcode_login() {
        qrcode_logined = 0;
        clear_push = 1;
        reload_qrimg();
        setTimeout('$("#qrcode_div").show()', 100);
        $("#qr_push").hide();
        $("#qr1").show();
        $("#qr_tips").show();
        if (mac_os == 2) {
            $('.bottom').hide();
        } else {
            $(".bottom a").show();
            $('.bottom #qr_return').hide();
        }
    }

    function show_qrcode_logined(type) {  // type 0 is not show qrcode, 1 is show qrcode, 2 is only show qrcode.
        if (!qrcode_push) {
            show_qrcode(type);
            return;
        }

        var input_div = $("#input_div");
        var qrcode_div = $("#qrcode_div");
        var head_1 = $("#head_1");
        var head_2 = $("#head_2");
        var head_3 = $("#head_3");
        var con2 = $("#qr2");
        var con3 = $("#qr3");
        var qr_push = $("#qr_push");
        var qr_push_confirm = $("#qr_confirm");
        var qr_push_switch_user = $("#qr_switch_user");
        var qr_push_login = $("#qr_login");
        var bottom = $(".bottom");
        var bottom_a = $(".bottom a");
        var bottom_qr_return = $(".bottom #qr_return");

        global_qr_do = false;

        if (type == 0) {
            input_div.show();
            qrcode_div.hide();
            head_1.hide();
            head_2.hide();
            head_3.show();
            qr_push.hide();
            qr_push_confirm.hide();
            qr_push_switch_user.hide();
            if (mac_os == 2) {
                bottom.hide();
            } else {
                bottom_a.show();
                bottom_qr_return.hide();
            }
        } else if (type == 1) {
            global_qr_do = true;
            input_div.hide();
            qrcode_div.hide();
            head_1.show();
            head_2.hide();
            head_3.hide();
            qr_push.show();
            if (!qrcode_logined_confirm) {
                qr_push_confirm.hide();
                qr_push_login.show();
                qr_push_switch_user.show();
                bottom.show();
                bottom_a.show();
                bottom_qr_return.hide();
            } else {
                qr_push_confirm.show();
                bottom.show();
                bottom_a.hide();
                bottom_qr_return.show();
            }
            con2.addClass("tab-on");
            con3.removeClass("tab-on");
        } else if (type == 2) {
            global_qr_do = true;
            input_div.hide();
            qrcode_div.hide();
            head_1.hide();
            head_2.show();
            head_3.hide();
            qr_push.show();
            qr_push_confirm.hide();
            if (!qrcode_logined_confirm) {
                qr_push_confirm.hide();
                qr_push_switch_user.show();
                bottom.show();
                bottom_a.show();
                bottom_qr_return.hide();
            } else {
                qr_push_confirm.show();
                bottom.show();
                bottom_a.hide();
                bottom_qr_return.show();
            }
            con2.addClass("tab-on");
            con3.removeClass("tab-on");
        } else if (type == 99) {
            qrcode_logined_confirm = false;
            input_div.show();
            qrcode_div.hide();
            head_1.show();
            head_2.hide();
            head_3.hide();
            qr_push.hide();
            qr_push_confirm.hide();
            qr_push_switch_user.hide();
            con2.removeClass("tab-on");
            con3.addClass("tab-on");
            if (mac_os == 2) {
                bottom.hide();
            } else {
                bottom.show();
                bottom_a.show();
                bottom_qr_return.hide();
            }
        }
        return false;
    }

    function change_vpn() {
        var val = $("#vpninfo").val();
        if (val == "0") {
            return;
        }
        var url = "https://" + val;
        window.location.href = url;
        return;
    }

</script>
