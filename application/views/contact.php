<style>
.modal-form {
	position: relative;
	display: inline-block;
	width: 100%;
	margin: 0 auto;
}
.button-modal:hover {
color:red;
background-color: black !important;
-webkit-transition: 0.2s ease-out;
-moz-transition: 0.2s ease-out;
-o-transition: 0.2s ease-out;
transition: 0.2s ease-out;
}
</style>
<div class="jumbotron">
	<h3>Welcome <span  style="color: #FF8C00">Guest</span>!</h3>
	<h3>Please, feel free to <span class="zf-green">contact me</span> to discuss your business.</h3>
	<form method="post" action="/email.php"  name="submit" id="myForm" class="forms">
		<div class="modal-form">
			<textarea style="font-size:0.8em;width: 222px;height:122px;float: left;padding:5px;margin:5px;" name="message" id="message" cols="20" lines="4" placeholder="message"></textarea>
			<input style="font-size:0.8em;width: 222px;height: 56px;border: 1px solid #cacaca;float: left;padding:5px;margin:5px;" type="text" name="name" id="name" maxlength="44" placeholder="name" value="<?php if(isset($_POST['name']) && $_POST['name']){echo $_POST['name'];}?>"/>
			<input style="font-size:0.8em;width: 222px;height: 56px;border: 1px solid #cacaca;float: left;padding:5px;margin:5px;" type="text" name="email" id="email" maxlength="44" placeholder="e-mail" value="<?php if(isset($_POST['email']) && $_POST['email']){echo $_POST['email'];}?>"/>
		</div>
		<div class="modal-form">
			<img style="width: 222px;height:56px;float: left;margin:5px;" src="/cool-php-captcha-0.3/captcha.php" id="captcha" />
			<input style="font-size:0.8em;width: 222px;height: 56px;border: 1px solid #cacaca;float: left;padding:5px;margin:5px;" type="text" name="captcha" id="captcha-form" autocomplete="off" placeholder="what do you see?" />
		</div>
		<span name="mailError" id="mailError" style="background-color: pink; color: red;"></span>
		<span name="myAjaxMessage" id="myAjaxMessage" style="background-color: pink; color: red;"></span>
		<br>
		<a href="javascript:void(0)" class="btn btn-success button-modal" id ="submit_button">&nbsp;&nbsp;Submit&nbsp;&nbsp;</a>
	</form>
		<span name="mailOK" id="mailOK" style="background-color: lightgreen; color: green;"></span>
					
	<script>					
		jQuery(function ($){
			myAjaxMessage = '';
			$('#submit_button').click(function(){
				var post_url = '/emailTest.php';							
				$.ajax({
					type : 'POST',
					url : post_url,
					data: $('#myForm').serialize(), //ID of your form
					//dataType : 'html',
					dataType : 'json',
					async: true,
					beforeSend:function(){
						$('#mailOK').html('');
						$('#mailError').html('');
						//add a loading gif so the broswer can see that something is happening
						//$('#modal_content').html('<div class="loading"><img scr="loading.gif"></div>');
					},
					success : function(data){
						$('#myAjaxMessage').html(data.emailErrors.join('<br/>'));
						if (data.emailSucces == 'OK') {
//							$('#myForm').submit();
							var post_url2 = '/email.php';							
							$.ajax({
								type : 'POST',
								url : post_url2,
								data: $('#myForm').serialize(), //ID of your form
								//dataType : 'html',
								dataType : 'json',
								async: true,
								beforeSend:function(){
									//add a loading gif so the broswer can see that something is happening
									//$('#modal_content').html('<div class="loading"><img scr="loading.gif"></div>');
								},
								success : function(data){
									$('#mailOK').html(data.mailOK.join('<br/>'));
									$('#mailError').html(data.mailError.join('<br/>'));
									if (data.mailSucces == 'OK') {
//										$('#myForm').submit();
										$('#myForm').hide();
									}
									//$('#modal_content').html(data);
								},
								error : function() {
									//$('#modal_content').html('<p class="error">Error in submit</p>');
								}
							});
						} else {
							document.getElementById('captcha').src='/cool-php-captcha-0.3/captcha.php?'+Math.random();
							document.getElementById('captcha-form').focus();
						}
						//$('#modal_content').html(data);
					},
					error : function() {
						//$('#modal_content').html('<p class="error">Error in submit</p>');
					}
				});
			})           
		});
	</script>
</div>