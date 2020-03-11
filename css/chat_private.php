html, body{
	height:100%;
	overflow:hidden;
	padding: 0px;
	margin:0px;
}
a, p{
	font-size:12px;
	font-family:helvetica;
}
#container{
	box-shadow:2px 2px 10px #000000; 
	width:1200px; height:90%;
	margin:2% auto; 
	border-radius:1%; 
	overflow:hidden;
}
#menu{
	background:#00adee; 
	color:white; padding:1%; 
	font-size:30px;
	}
#left-col, #right-col{
	position:relative;
	float: left;
	height:90%;
}
#left-col{
	width: 30%;
	}
#right-col{
	width: 70%;
	border:1px;
	solid #efefef;
		}
#left-col-container, #right-col-container{
	width:100%;
	height:100%;
	margin:0px auto;
	height:100%;
	overflow:auto;
	border: 1px solid black;
}
.grey-back{
	border:1px solid black;
	padding:5px;
	background:#efefef;
	margin: 0px auto;
	margin-top: 2px;
	overflow: auto;
}
.image{
	float:left;
	margin-right:5px; 
	width:50px; 
	height:50px;
}
#messages-container{
	height:80%;
	overflow:auto;
}
.textarea{
	width:99%;
	height:10%;
	position:absolute;
	bottom:1%;
	margin:0px auto;
	resize:none;
}
.white-message{
	border:1px solid black;
	padding: 5px;
	margin-left:67px; 
	margin-top:2px;
	overflow:auto;
	width: 370px;
	border-radius: 5%;
}
.grey-message{
	background: gray;
	margin-left: 380px;
	width: 370px;
	border:1px solid black;
	border-radius: 5%;
	color: #fff;
	font-size: 18px;
	order: -1;
}
#new-message{
	display:none;
	box-shadow:2px 10px 30px; #000000;
	width:500px;
	position:fixed;
	top:20%;
	background:white;
	z-index:2;
	left:50%;
	transform: translate(-50%, 0);
	border-radius:5px;
	overflow:auto;
}
.m-header, .m-footer{
	background:#4d83ff;
	margin:0px;
	color: white;
	padding:5px;
}
.m-header{
	font-size:20px;
	text-align:center;
}
.m-body{
	padding:5px;
}
.message-input{
	width:96%;
}
.date-chat{
	margin-left: 575px;
}
.date-chat2{
	margin-left: 150px;
}
.me-chat{
	margin-left: 10px;
}
.txt-search_chat input[type="text"]{
	border: 1px solid black;
	background: white;
	outline: none;
	height: 40px;
	color: black;
	font-size: 16px;
	width: 100%;
}
.user-photo_sender img{
	width: 60px;
	height: 60px;
	background:#ccc;
	border-radius: 50%;
	float:right;
	margin-right: 5px;
}
.user-photo_receiver img{
	width: 60px;
	height: 60px;
	background:#ccc;
	border-radius: 50%;
	float:left;
	margin-left: 5px;
}
.button{
	background:coral;
	padding:1em 2em;
	color:white;
	border:0;
}
.button:hover{
	background:red;
}
.modal{
	display:none;
	position:fixed;
	z-index: 1;
	left:0;
	top:0;
	height:100%;
	width:100%;
	overflow: auto;
	background-color:rgba(0,0,0,0.5);
}
.modal-content{
	background-color:#f4f4f4;
	margin:20% auto;
	padding:20px;
	width:70%;
	box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2),0 7px 20px 0 rgba(0,0,0,0.17);
}
.closeBtn{
	color:#ccc;
	float:right;
	font-size:30px;
	
}
.closeBtn:hover, .closeBtn:focus{
	color:#000;
	text-decoration:none;
	cursor:pointer;
}
a{
	text-decoration: none;
}



