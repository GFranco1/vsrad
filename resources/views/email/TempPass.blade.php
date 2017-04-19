<!DOCTYPE html>
<html>
<body>
<div class="qlt-confirmation">
	<div class="panel panel-default">
		<div class="panel-body">
			<center>
				<img src="https://cdn4.iconfinder.com/data/icons/social-communication/142/open_mail_letter-512.png" style="width:30px; height: 30px;">
				<p class="desc"><b>Correo: </b>{{$email}}<br><br><br><b>Contraseña: </b>{{$password_temporal}}<br><br><a href="{{url('/login')}}"><button type="button" class="btn btn-primary">Login</button></a>
			</center>
		</div>
	</div>
</div>
</body>