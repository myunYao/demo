 $(document).ready(function(){

    $('.lis').click(function() {
        console.log(1);
    var $imgs=$("#imgs_<?=$catelist['news_id']?>").attr('src');
    var $nicks=$(".nicks_<?=$catelist['news_id']?>").html();
    var $title_type=$(".title_type_<?=$catelist['news_id']?>").html();
    var $title=$(".title__<?=$catelist['news_id']?>").text();
    var $content=$(".content_<?=$catelist['news_id']?>").html();
    var $nerws_id=$('#news_id').val();
       
        $.ajax({
            url: './detail.php',
            type: 'POST',
            dataType: 'json',
            data: {news_id:$news_id,imgs:$imgs,nicks:$nicks,title_type:$title_type,title:$title,content:$contnet},
            success:function (data) {
             if(data.result=='success'){
                window.location.href='content_list.php';
             }
             else{
                alert('操作失败');
             }
            }
        });
    });
 
  })
