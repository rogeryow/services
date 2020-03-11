<!DOCTYPE html>
<html>
	<head>
		<meta name = "viewport" content = "width = device-width, initial-scale=1">
		<link href = "css/chat_design.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
		<section class = "container">
		<h2> Chat </h2>
		
		<button class = "open-button" onclick = "openform()">Chat</button>
		<div class = "chat-popup" id = "myform">
			<form action = "" class = "form-container">
				<h1>Chat</h1>
					<label for = "msg"><b>Message</b></label>
					<textarea placeholder = "Type a message" name = "msg"
					required></textarea>
					<button type = "submit" class = "btn">Send</button>
					<button type = "button" class = "btn cancel"
					onclick = "closeform()">Close</button>
			</form>
		</div>
<script>
function openform(){
		document.getElementById("myform").style.display = "block";
}
function closeform(){
		document.getElementById("myform").style.display = "none";
}		
</script>

	</body>
</html>
<script>
	