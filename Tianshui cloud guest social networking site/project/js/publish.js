$(document).ready(function() {
    // 添加内容
    $("#addcontent").click(function() {
        if (!$("#news_title").val()) {
            $("#news_title").next("span").html("标题必填!");
            return;
        } else {
            $("#news_title").next("span").html("");
        }
        var $user_id = $('#user_id').val();
        // 提交数据
        $.ajax({
            url: './publishsubmit.php',
            type: 'POST',
            dataType: 'json',
            data: $('#addcontentform').serialize(), //对整个表单的数据进行序列化
            success: function(data) {
                /* body... */
                // console.log(data);
                if (data.result == 'success') {
                    alert('操作成功！');
                    window.location.href = './personal_center.php?user_id=' + $user_id;

                } else {
                    alert('操作失败！');
                }
            }
        });
    })
})
