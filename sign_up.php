<!DOCTYPE html>
<html>
	<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<style>
 
</style> 
<script
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"
 type="text/javascript"></script>
<script
 src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
 type="text/javascript"></script>
<script
 src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"
 type="text/javascript"></script>
<script src="/resources/scripts/mysamplecode.js" type="text/javascript"></script>
<script src="/resources/scripts/date.js" type="text/javascript"></script>

<script type="text/javascript">
$('document').ready(function()
{
    $("#a").validate({
        rules:
        {
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 4
            },
            repw: {
                required: true,
                equalTo: '#pass'
            },
        },
        messages:
        {
            username: "<br> Chưa nhập tên",
            password:{
                required: "<br> Chưa nhập mật khẩu",
                minlength: "<br> Mật khẩu phải trên 4 ký tự"
            },
            repw:{
                required: "<br> Chưa xác nhận lại mật khẩu",
                equalTo: "<br> Mật khẩu chưa trùng nhau"
            }
        },
        submitHandler: submitForm
    });
    
    function submitForm()
    {
        var data = $("#a").serialize();

        $.ajax({

            type : 'POST',
            url  : 'insert.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
            },
            success :  function(data)
            {
                if(data=="trung"){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Ten da ton tai !</div>');
                    });
                }
                else if(data=="thanhcong")
                {

                    setTimeout('$(".sign").fadeOut(500, function(){ $(".form").html("Thanh cong"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){
                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                    });

                }
            }
        });
        return false;
    }
});
</script>
	</head>
	<body>
	<div class="form">
		<form id= "a"action="insert.php" method="post" name="a" class="sign">
			<div>
			Username:<input id="username" type="text" name="username"><br>
			</div>
			<div id="error"></div>
			<div>
			Password:<input id="pass" type="password" name="password"><br>
			</div>
			<div>
			Reconfirm password:<input id="repass" type="password" name="repw"><br>
			</div>
			 <button type="submit" name="connect" value="sign-up" id="submit">
			 Login
			 </button>
		</form>
	
	</div>
	</body>
	
</html>
