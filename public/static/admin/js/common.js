/**
 * form中add提交的数据
 */
function singwaapp_save(form) {
    var data = $(form).serialize();
    // 调试给学生看的哦
    //console.log(data);
    // 将获取到的数据post给服务器
    url = $(form).attr('url');

    $.post(url,data,function(result){
        if(result.code == 1) {
            //layer.msg('已发布', {icon:6,time:2000});
            self.location=result.data.jump_url;
        }else if(result.code == 0) {
            layer.msg(result.msg, {icon:5,time:1000});
        }
    },"JSON");
}

function selecttime(flag){
    if(flag==1){
        var endTime = $("#countTimeend").val();
        if(endTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:endTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }else{
        var startTime = $("#countTimestart").val();
        if(startTime != ""){
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime})}else{
            WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})}
    }
}

/**
 * 通用化删除操作
 * @param obj
 */
function singwaapp_del(obj){
    url = $(obj).attr('del_url');
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function(data){
                if(data.code == 1) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:2000});
                }else if(data.code == 0) {
                    layer.msg(data.msg,{icon:2,time:2000});
                }
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}

/**
 * 通用化删除操作
 * @param obj
 */
function singwaapp_status(obj) {
    url = $(obj).attr('status_url');
    layer.confirm('确认要修改状态吗？',function(index){
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            success: function(data){
                if(data.code == 1){
                    $(this > 'span').text(data.data.status_title);
                    layer.msg('已修改!',{icon:1,time:2000});
                }else if(data.code == 0) {
                    layer.msg(data.msg,{icon:2,time:2000});
                }
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}
