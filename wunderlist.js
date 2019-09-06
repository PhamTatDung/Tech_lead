$( document ).ready(function() {
	$(window).resize(function(){
		var width = $(window).width();
		if (width<935) {
			$(".menu-l").addClass("thayDoi");
			$(".content").show();
		}
		else{
			$(".menu-l").removeClass("thayDoi");
		}
	});
    $(document).click(function(e) {
		avatar = $('.avatar');
		if (!avatar.is(e.target) && avatar.has(e.target).length === 0)
   		 {
       		$('.shows-menu').removeClass("hienThi");
    	}
    	else{
    		$('.shows-menu').toggleClass("hienThi");
    	}
	});
	$('.create-list').click(function(){
		$('.mask').addClass("hienThi");
		$('.createList').toggleClass("hienThi");
	});
	$('.footer input').click(function() {
		$('.mask').removeClass("hienThi");
	});
	$(".btn-show input").click(function(){
		$(".taskDone").toggleClass("hienThi");
	});
	$(".toggle svg.list-toggle").click(function () {
		$(".menu-l").toggleClass("thayDoi");
	});
	$(".add-todo input").click(function () {
		$(".menu-r").removeClass("block");
	});

	//////////////ajax////////////////////////
	 var idList;
	$(".list-scroll ul li").click(function () {
		$(".list-scroll ul li").css("background-color", "#f7f7f7");
		$(this).css("background-color", "#e0eefa");
		idList = $(this).attr('idList');
		var title = $(this).children("label").html();
		$(".main-title h1").html(title);
		$.get("task.php",{idList:idList},function(data){
			$('.task ul').html(data);
		})
		$.get("taskDone.php",{idList:idList},function(data){
			$('.taskDone ul').html(data);

		})		
	});
$('#atd').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
	 		if(keycode == '13'){
	 			content = $('#atd').val();
	 			content = content.trim();
	 			if(content!=''){	
		 			$( ".taskClone ul li label" ).html(content);
	   	 			$.ajax({
	   	 				async:true,
	   	 				url: "addTodo.php",
	   	 				type: "post",
	   	 				data: {
	   	 					idList:idList,
	   	 					content:content
	   	 				},success: function(data) {
	               			$( ".taskClone ul li").attr("idTask",data);
							$( ".taskClone ul li" ).clone().appendTo(".task ul");
							$('#atd').val("");
	           			 }

	   	 			});
	 			}	
		}
	})
	var idTask;
	var removeTask;
	$( ".task ul" ).on( "click", "li", function() {
		removeTask = $(this);
		$(window).resize(function(){
			var width = $(window).width();
			if (width<935 && width>530) {
				$(".menu-l").addClass("thayDoi");
				$(".menu-l").show();
				$(".menu-r").removeClass("flex-r");
			}
			else if(width<530){
				$(".menu-l").hide();
				$(".content").hide();
				$(".menu-r").addClass("flex-r");
			}
			else{
				$(".menu-l").removeClass("thayDoi");
			}
		});
		$(".menu-r .title svg.task-checked").hide();
		$(".menu-r .title svg.task-check").show();
		$(".menu-r").removeClass("AnDi");
		$(".task ul li").css("background-color","#fff");
		$(".taskDone ul li").css("background-color","#fff");
		$(this).css("background-color", "#e1f2fe");
		task = $(this);
		content = $(this).children("label").html();
		$(".title input").val(content);
		$(".menu-r").addClass("block");
 		idTask = $(this).attr('idTask');
		$.get("subTask.php",{idTask:idTask},function(data){
			$('.subtask ul').html(data);
		})
		$.get("file.php",{idTask:idTask},function(data){
			$('.fileName ul').html(data);
		})
		$.get("comment.php",{idTask:idTask},function(data){
			$('.commentList .cmt').html(data);
		})
		$.post("showNode.php",{idTask:idTask},function(data){
			$('.node input').val(data);
		})
		$.get("dueDate.php",{idTask:idTask},function(data){
			$('.set_date input').val(data);
		})
		$.get("reminder.php",{idTask:idTask},function(data){
			$('.reminder input').val(data);
		})
		$(".title input").change(function(){
			var content = $(".title input").val();
			task.children("label").html(content);
			$.ajax({
				async:true,
				url: "updateTask.php",
				type: "post",
				data: {
					content:content,
					idTask:idTask,
				},success: function() {

				}
			});
		})
	});
	$( ".taskDone ul" ).on( "click", "li", function() {
		removeTask = $(this);
		$(".taskDone ul li").css("background-color","#fff");
		$(".task ul li").css("background-color","#fff");
		$(this).css("background-color", "#e1f2fe");
		taskDone = $(this);
		content = $(this).children("label").html();
		node = $(".node input").val();
		$(".title input").val(content);
		$(".menu-r .title svg.task-check").hide();
		$(".menu-r .title svg.task-checked").show();
		$(".menu-r").addClass("block");
 		idTask = $(this).attr('idTask');
		$.get("subTask.php",{idTask:idTask},function(data){
			$('.subtask ul').html(data);
		})
		$.get("file.php",{idTask:idTask},function(data){
			$('.fileName ul').html(data);
		})
		$.get("comment.php",{idTask:idTask},function(data){
			$('.commentList ul').html(data);
		})
		$.post("showNode.php",{idTask:idTask,node:node},function(data){
			$('.node input').val(data);
		})
		$(".title input").change(function(){
			var content = $(".title input").val();
			taskDone.children("label").html(content);
			$.ajax({
				async:true,
				url: "updateTask.php",
				type: "post",
				data: {
					content:content,
					idTask:idTask,
				},success: function() {

				}
			});
		})
	});


	$( ".task ul" ).on( "click", "li svg.task-check", function(){
		idTask = $(this).parent().attr("idTask");
		$(this).hide();
		$(this).parent().children("svg.task-checked").show();
		$(this).parent().clone().appendTo(".taskDone ul");
		$(this).parent().remove();
		$.ajax({
			async:true,
			url: "update.php",
			type: "post",
			data: {
				idTask:idTask,
			},success: function() {

			}

		});
	});
	$( ".taskDone ul" ).on( "click", "li svg.task-checked", function(){
		idTask = $(this).parent().attr("idTask");
		$(this).hide();
		$(this).parent().children("svg.task-check").show();
		$(this).parent().clone().appendTo(".task ul");
		$(this).parent().remove();
		$.ajax({
			async:true,
			url: "updateDone.php",
			type: "post",
			data: {
				idTask:idTask,
			},success: function() {
			}
		});
	});
	$(".menu-r .title svg.task-check").click(function(){
		$(this).hide();
		$(".title svg.task-checked").show();
		removeTask.children("svg.task-check").hide();
		removeTask.children("svg.task-checked").show();
		removeTask.appendTo(".taskDone ul");
		$.ajax({
			async:true,
			url: "update.php",
			type: "post",
			data: {
				idTask:idTask,
			},success: function() {

			}
		});
	});
	$(".menu-r .title svg.task-checked").click(function(){
		$(this).hide();
		$(".title svg.task-check").show();
		removeTask.children("svg.task-checked").hide();
		removeTask.children("svg.task-check").show();
		removeTask.appendTo(".task ul");
		$.ajax({
			async:true,
			url: "updateDone.php",
			type: "post",
			data: {
				idTask:idTask,
			},success: function() {
			}
		});
	});
	$( ".task ul" ).on( "click", "li svg.star", function(){
		$(this).css("display","none");
		$(this).parent().children("svg.st").css("display","block");
	});
	$( ".task ul" ).on( "click", "li svg.st", function(){
		$(this).css("display","none");
		$(this).parent().children("svg.star").css("display","block");
	});
	var remove;
	$( ".task ul" ).on( "contextmenu", "li", function(e){
		remove = $(this);
		idTask = $(this).attr('idTask');
		$(".contextMenu").addClass("hienThi");
		e.preventDefault();
		if (e.pageY>300) {
			$(".contextMenu").css("left",e.pageX+10);
			$(".contextMenu").css("top",e.pageY-340);
		}
		else{
			$(".contextMenu").css("left",e.pageX+10);
			$(".contextMenu").css("top",e.pageY+10);
		}
	});
	$( ".taskDone ul" ).on( "contextmenu", "li", function(e){
		remove = $(this);
		idTask = $(this).attr('idTask');
		$(".contextMenu").addClass("hienThi");
		e.preventDefault();
		if (e.pageY>300) {
			$(".contextMenu").css("left",e.pageX+10);
			$(".contextMenu").css("top",e.pageY-340);
		}
		else{
			$(".contextMenu").css("left",e.pageX+10);
			$(".contextMenu").css("top",e.pageY+10);
		}
	});

	$(document).click(function () {
		$(".contextMenu").removeClass("hienThi");
	});

	$(".deleteTask").click(function(){
		remove.remove();
		$.ajax({
			async:true,
			url: "deleteTask.php",
			type: "post",
			data: {
				idTask:idTask,
			},success: function() {	
			}
		});
	});
	$(".detail svg.trash").click(function(){
		removeTask.remove();
		$.ajax({
			async:true,
			url: "deleteTask.php",
			type: "post",
			data: {
				idTask:idTask,
			},success: function() {
			}
		});
	});

	$(".subtask div input").change(function(){
		subTask = $(".subtask div input").val();
		$.ajax({
			async: true,
			url: "addSubTask.php",
			type: "post",
			data: {
				idTask:idTask,
				subTask:subTask
			},success: function(data){
				$(".cloneST ul li label").html(subTask);
				$(".cloneST ul li").attr("idsubtask",data);
				$( ".cloneST ul li" ).clone().appendTo(".subtask ul");
				$(".subtask div input").val("");
			}
		})
	});

	$(".node input").change(function(data){
		node = $(".node input").val();
		$.ajax({
			async: true,
			url: "node.php",
			type: "post",
			data: {
				idTask:idTask,
				node:node
			},success: function(){
			}
		})
	});
	var idSubtask;
	$(".subtask ul").on("click","li svg.delete",function(){
		idSubtask = $(this).parent().attr("idSubtask");
		subTask = $(this).parent();
		$.ajax({
			async:true,
			url:"deleteSubtask.php",
			type:"post",
			data:{
				idSubtask:idSubtask
			},success:function(){
				subTask.remove();
			}
		})
	});
	$(".subtask ul").on("click","li svg.task-check",function(){
		idSubTask = $(this).parent().attr("idSubtask");
		$(this).parent().addClass("stt0");
		$(this).parent().removeClass("stt1");
		$.ajax({
			async: true,
			url: "updateSubTask.php",
			type: "post",
			data: {
				idSubTask:idSubTask
			},success: function(){

			}
		})
		
	});
	$(".subtask ul").on("click","li svg.task-checked",function(){
		idSubTask = $(this).parent().attr("idSubtask");
		$(this).parent().addClass("stt1");
		$(this).parent().removeClass("stt0");
		$.ajax({
			async: true,
			url: "updateSubTaskDone.php",
			type: "post",
			data: {
				idSubTask:idSubTask
			},success: function(){

			}
		})
	});
	var cmt = $( ".cloneCmt li");
	$(".comment input").change(function(){
		comment = $(".comment input").val();
		$.ajax({
			async: true,
			url: "addComment.php",
			type: "post",
			data: {
				idTask:idTask,
				comment:comment
			},success:function(data){
				cmt.attr("idCmt",data);
				 a =$(".cloneCmt .contentComment .nd").html(comment);
				cmt.clone().appendTo(".cmt");
				$(".comment input").val("");
			}
		})
	});
	$(".commentList ul").on("click","li .deleteCmt",function(){
		comment = $(this).parent();
		idCmt = $(this).parent().attr("idcmt");
		$.ajax({
			async:true,
			url:"deleteCmt.php",
			type:"post",
			data:{
				idCmt:idCmt
			},success:function(){
				comment.remove();
			}
		})
	});
	$(".section .set_date input").change(function(){
		var dueDate = $(this).val();
		$.ajax({
			async:true,
			url:"setDueDate.php",
			type:"post",
			data:{
				idTask:idTask,
				dueDate:dueDate
			},success:function(){

			}
		})
	});
	$(".reminder input").change(function(){
		var reminder = $(this).val();
		console.log(reminder);
		$.ajax({
			async:true,
			url:"setReminder.php",
			type:"post",
			data:{
				idTask:idTask,
				reminder:reminder
			},success:function(){

			}
		})
	});
	$("#files").change(function () {
		var fileName = $('#files').val();
		fileName = fileName.split("\\").pop().toLowerCase();
		var typeFile = fileName.split(".").pop().toLowerCase();
		var type = ["txt","jpeg","jpg","docx","png"];
		var count = 0;
		for (var i = 0; i <= type.length-1; i++) {
			if (typeFile == type[i]) {
				count++;
			}
		}
		if (count==0) {
				$('#files').val("");
				alert('File không đúng định dạng!!!');
			}
		else{
			$(".file form label").html(fileName);
			$.ajax({
				async:true,
				url:"upload.php",
				type:"post",
				data:{
					idTask:idTask,
					fileName:fileName,
					typeFile:typeFile
				},success:function(data){
					$('#files').val("");
					console.log(data);
				}
			});
		}
		
		
	})
	var lanClick;
	$(".toggle input").click(function(){
		lanClick = 1;
		if(lanClick == 1){
			$(".toggle .search").css("display","none");
			$(".toggle .x").css("display","block");
			lanClick == 2;
		}
	});
	$(".toggle .search").click(function(){
		$(".toggle .search").css("display","none");
		$(".toggle .x").css("display","block");
		lanClick == 2;
	});
	$(".toggle .x").click(function(){
		$(".toggle .x").css("display","none");
		$(".toggle .search").css("display","block");
		lanClick == 2;
	});
	$(".detail .close-right").click(function () {
		$(".menu-r").addClass("AnDi");
	});
		

});	