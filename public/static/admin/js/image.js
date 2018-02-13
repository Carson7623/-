$(function() {
    $("#file_upload").uploadify({
        'debug':true,
        'swf'               : swf,
        'uploader'          : upload_url,
        'buttonText'        : '图片上传',
        'fileObjName'       : 'file',
        'fileTypeDesc'      : 'Image Files',
        'fileTypeExts'      : '*.gif; *.jpg; *.png',
        'queueID'           : 'fileQueue',
        'auto'              : true,
        'multi'             : true,
        'wmode'             : 'transparent',
        'simUploadLimit'    : 999,
        'formData'          : {'someKey' : 'someValue', 'someOtherKey' : 1},
        'onError': function(e, queueId, fileObj,errorObj){
            alert(3)
            alert("类型:" + errorObj.type + "\r\n" +
                "错误信息：" + errorObj.info + "\r\n"
            )},

        'onComplete'  :function(event,queueId,fileObj,response,data){
                alert(2)
            indx++;
            var retJson = eval(response)[0];
        },
        onUploadSuccess     : function (file, data, response) {
            alert(1)
            if (response) {
                $("#upload_org_code_img").attr("src", "");
                console.log('11111111111111111111')
                console.log(file);
                console.log(response);
                console.log(data);
                var obj = JSON.parse(data);
                console.log(obj);
            }
        }
    });
});