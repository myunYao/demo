 $(document).ready(function(){
//点赞数
    $('#praise').click(function() {
         var $news_id = $(this).attr('news_id');

         $.ajax({
             url: './detail.php',
             type: 'POST',
             dataType: 'json',
             data: { news_id: $news_id },
             success: function(data) {
                 //alert(1);
                 if (data.result == 'success') {
                     alert('点赞成功');
                     $('.share_ico_link').css('color', '#e86060');
                     // window.location.reload();
                     $('#praise_num').html(data.praise_num);
                 } else if (data.result == 'haved') {
                     alert('点赞过了');
                 } else {
                     alert('点赞失败');
                 }
             }
         });

     });

    //评论
    $('#commentli').click(function() {
        $('#comment_div').css('display','block');
    });
    $('#show').click(function(){
         var $news_id=$('#news').val();
        var $comment_content=$('#comment_content').val();
        $.ajax({
            url: './comment.php',
            type: 'POST',
            dataType: 'json',
            data: {news_id:$news_id,comment_content:$comment_content},
            success:function (data) {
             if(data.result=='success'){
                alert('评论成功');
                window.location.reload();

             }
             else{
                alert('评论失败');
             }
            }
        });
    })


    //分享
    $('#shareli').click(function() {
        $('#share_div').css('display','block');
    });
    $('#share_show').click(function() {
        console.log(1);
        var $user_id = $('#user_id').val();
        var $news_id=$('#news').val();
        var $share_content=$('#share_content').val();

       
        $.ajax({
            url: './sharesubmit.php',
            type: 'POST',
            dataType: 'json',
            data: {news_id:$news_id,share_content:$share_content},
            success:function (data) {
             if(data.result=='success'){
                alert('分享成功');
                window.location.href = './personal_center.php?user_id=' + $user_id;
             }
             else{
                alert('分享失败');
             }
            }
        });
    });
   
   $(".delete_share").click(function(){
    console.log(1);
        //当点击删除按钮时，删除当前按钮所对应的分类
        //获取到数据
        if(!confirm("点击确定按钮将删除这条信息！")){
            return;
        }

        //获取到当前分类的id
        // var $user_id = $(this).attr('user_id');
        var $news_id = $("#news_id").val();
        //发送ajax请求
        $.ajax({
            url:'./deleteshare.php',
            type:'POST',
            dataType:'json',
            data:{news_id:$news_id},
            success:function(data){
                console.log(data);
                if(data.result == 'ok'){
                    alert('删除成功！');
                    //删除成功后重新加载整个页面
                    window.location.reload();
                }else{
                    alert('删除失败！');
                }
            }
        });
    });
 
  })
