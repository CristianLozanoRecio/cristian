$(document).ready(function(){
	$(".like, .like2").click(function(){
		var id = this.id;

		$.ajax({
			url: '../menu/megusta.php',
			type: 'POST',
			data: {id:id},
			dataType: 'json',

			success:function(data){
                var likes = data['likes'];
                var text = data['text'];

                $("#likes_" + id).text(likes);
                $("#likes2_" + id).text(likes);
                $("button.like#" + id + ", button.like2#" + id).html(text);
			}
		});
	});
});
