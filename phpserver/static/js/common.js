/**
 * js公共方法
 *
 */
//弹消息
function showMsgAfter(inputName, msg) {
    $(".help-block[target=" + inputName + "]").html(msg);
    $(".help-block[target=" + inputName + "]").show();
    $("div[target=" + inputName + "]").addClass('has-error');
}
//隐藏提示信息 移除高亮错误类
function hideAllMsg() {
    $(".help-block").hide();
    $("div").removeClass('has-error');
}

//消息提示  服务端的错误
function alertServerMsg(msg,timeRemained) {
    var timer = setInterval(function() {
        $('#serverMsg').text(msg).show();
        timeRemained -= 1;
        if (timeRemained == -1) {
            clearInterval(timer);
            $('#serverMsg').hide();
        }
    }, 1000);
}

function closeModalMsg(id){
    $('#'+id).modal('hide');
}

//上传加载中。
function uploadloading(oper) {
    if(oper == 1) {
        $('#upload_load').show();
    }else{
        $('#upload_load').hide();
    }
}



//刷新验证码
function con_code(oper){
    var random = Math.round((Math.random()) * 100000000);
    var url = '/site/getcode/'+random;
    if(oper == 1){
        url = '/site/getfindcode/'+random;
    }
    $('#code_img').attr('src',url);
}

//应用验证消息展示
function showMessage(msg,id) {
    $('#'+id+'-error dd').text(msg);
    $('#'+id+'-error').show();
}

function closeMessage(id) {
    $('#'+id+'-error').hide();
}

/*
 显示层
 */
function diloagShow(id,flag) {
    if(flag == 1){
        $(':input','#'+id+'_form')
            .not(':button, :submit')
            .val('')
            .removeAttr('checked')
            .removeAttr('selected');
    }else{
        closeMessage('test');
    }
    $('#'+id).show();
}

/**
 * 关闭层
 * @param id
 */
function diloagHide(id) {
    $('#'+id).hide();
}



/**
 * 公共 ajax 返回消息提示方法
 * @param msg   内容
 * @param timeRemained  延迟秒 执行
 * @param url   跳转url
 */
function showTips(msg,timeRemained,url) {
    var timer = setInterval(function() {
        $('#tips').addClass('btn-success');
        $('#tips').text(msg).css('display','');
        timeRemained -= 1;
        if (timeRemained == -1) {
            clearInterval(timer);
            window.location.href = url;
        }
    }, 1000);
}

/**
 * 公共 ajax 返回消息提示方法
 * @param msg   内容
 * @param timeRemained  延迟秒 执行
 * @param url   跳转url
 */
function showTipsModal(msg,timeRemained,modal) {
    var timer = setInterval(function() {
        $('.tips').addClass('btn-success');
        $('.tips').text(msg).css('display','');
        timeRemained -= 1;
        if (timeRemained == -1) {
            clearInterval(timer);
            $('#'+modal).modal('hide');
        }
    }, 1000);
}

/**
 * 消息展示
 * demo:
 * showTipsMsg('测试下下嘻嘻嘻嘻嘻嘻嘻嘻嘻想','showMessage');
 * @param message
 * @param modal
 */
function showTipsMsg(message,modal,timeRemained,url) {
    var timer = setInterval(function() {
        var tipsHtml = '<div class="modal fade" id="'+modal+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
                        <div class="modal-dialog">\
                            <div class="modal-content">\
                                <div class="modal-body" >\
                            '+message+'\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
        if($('#'+modal).length == 0) {
            $(document.body).append(tipsHtml);
        }
        $('#'+modal).modal('show');
        timeRemained -= 1;
        if (timeRemained == -1) {
            clearInterval(timer);
            $('#'+modal).modal('hide');
            if(url){
                window.location.href = url;
            }
        }
    }, 1000);



}
/**
 * 消息展示
 * demo:
 * showTipsMsg('测试下下嘻嘻嘻嘻嘻嘻嘻嘻嘻想','showMessage');
 * @param message
 * @param modal
 */
function showOpTipsMsg(message,modal,timeRemained) {
    $('.modal').modal('hide');
    var timer = setInterval(function() {
        var tipsHtml = '<div class="modal fade" id="'+modal+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
                        <div id="widthdiv" class="modal-dialog">\
                            <div class="modal-content">\
                                <div class="modal-body" >\
                            '+message+'\
                                </div>\
                            </div>\
                        </div>\
                    </div>';
        if($('#'+modal).length == 0) {
            $(document.body).append(tipsHtml);
        }
        $('#'+modal).modal('show');
        $("#widthdiv").width("auto");
        timeRemained -= 1;
        if (timeRemained == -1) {
            clearInterval(timer);
            $('#'+modal).modal('hide');
            window.location.reload();
        }
    }, 500);



}

//去掉新手引导工单提示层
function tips_hide() {
    $.ajax({
        type:'post',
        url:'/user/UpdateLead',
        data:{random:Math.round((Math.random()) * 100000000)},
        dataType:'json',
        success:function(data){
            if(data.code == '0000') {
                $('#ticket_tips').remove();
            }
        }
    });
}

/**
 * 工单脚本刷新
 * @param duration
 */
function refreshTicket(duration) {
    var timeRemained = duration;
    var timer = setInterval(function() {
        timeRemained -= 1;
        if (timeRemained == -1) {
            clearInterval(timer);
            window.location.reload();
        }
    }, 1000);
}
$(function(){
    $("#closeMoveInfo").click(function(event) {
        $("#identy_info").hide();
        $.ajax({
            type:'post',
            url:'/user/UpdateCertificateLead',
            data:{random:Math.round((Math.random()) * 100000000)},
            dataType:'json',
            success:function(data){
            }
        });
    });

    $("#closeMoveInfoTip").click(function(event) {
        $("#identy_info_tip").hide();
        $.ajax({
            type:'post',
            url:'/user/addtip',
            data:{random:Math.round((Math.random()) * 100000000)},
            dataType:'json',
            success:function(data){
            }
        });
    });

});

// 替换string args
String.stringFormat = function(str) {
    for (var i = 1; i < arguments.length; i++) {
        str = str.replace(new RegExp("\\{" + (i - 1) + "\\}", "g"), arguments[i] || "");
    }
    return str;
};

String.jsonFormat = function(str) {
    var n = 0;
    for (var i in arguments[1]) {
        str = str.replace(new RegExp("\\{" + (n) + "\\}", "g"), arguments[1][i] || "");
        n++;
    };
    return str;
};
