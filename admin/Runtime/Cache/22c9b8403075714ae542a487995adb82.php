<?php if (!defined('THINK_PATH')) exit();?>

<ul style="padding: 5px;" id="send-message-box">
    <li style="margin-bottom: 5px;">
        <input type="hidden" name="message_type" value="<?php echo ($_POST['message_type']); ?>" />
        <input type="hidden" name="addressee_id" value="<?php echo ($_POST['addressee_id']); ?>" />
        <input type="text" name="name" style="width: 410px;padding-left: 2px;" placeholder="站内信标题" />
    </li>
    <li>
        <textarea name="details" style="visibility: hidden;"></textarea>
    </li>
</ul>
<script type="text/javascript">

    $.getScript(define_public_url+'/js/kindeditor/kindeditor-min.js', function() {
        KindEditor.basePath = define_public_url+'/js/kindeditor/';
        var editor = KindEditor.create('textarea[name=details]',{
                newlineTag : 'br',
                resizeType : 1,
                minHeight : 150,
                width:412,
                pasteType : 2,
                filterMode : false,
                items :  [
                    'source','clearhtml','fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough',
                    'lineheight', 'removeformat', 'emoticons', 'link', 'fullscreen'
                ],
            afterCreate : function() {
                this.sync();
            },
            afterBlur:function(){
                this.sync();
            }
        });
    });


    /*    initEditor();

        function loadJS(url,callback,charset)
        {
            var script = document.createElement('script');
            script.onload = script.onreadystatechange = function ()
            {
                if (script && script.readyState && /^(?!(?:loaded|complete)$)/.test(script.readyState)) return;
                script.onload = script.onreadystatechange = null;
                script.src = '';
                script.parentNode.removeChild(script);
                script = null;
                if(callback)callback();
            };
            script.charset=charset || document.charset || document.characterSet;
            script.src = url;
            try {document.getElementsByTagName("head")[0].appendChild(script);} catch (e) {}
        }
        function initEditor()
        {
            loadJS('Public/js/kindeditor/kindeditor-min.js',
                function(){
                    var editor;
                    KindEditor.ready(function(K) {
                        editor = K.create('#details', {
                            newlineTag : 'br',
                            resizeType : 1,
                            allowPreviewEmoticons : false,
                            allowImageUpload : true,
                            minHeight : 350,
                            width:500,
                            pasteType : 2,
                            filterMode : false,
                            items :  [
                                'source','justifyleft', 'justifycenter', 'justifyright','justifyfull', 'subscript','superscript', 'clearhtml', 'quickformat',
                                'formatblock', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough',
                                'lineheight', 'removeformat','image', 'insertfile','emoticons', 'baidumap', 'link', 'unlink', 'selectall',  'fullscreen'
                            ]
                        });
                    });
             //   $('#btnInit').trigger("click");
                });
        }*/

</script>