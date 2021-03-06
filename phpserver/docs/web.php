<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="提供弹云 Web 端开发的相关帮助和指南。">
    <title>Android SDK 0.0.3 开发指南 - 弹云 BarrageCloud</title>
<?php include 'head.html';?>
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <?php include 'toolbar.html';?>
    <div class="container-fluid bs-docs-container mt60">
      <div class="row">
        <div class="col-md-2">
          <div class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
            <ul class="nav bs-docs-sidenav">
              <li><a href="android.html#前期准备">前期准备</a>
                <ul class="nav">
                  <li><a href="android.html#1、注册开发者ID">1、注册开发者ID</a></li>
                </ul>
              </li>
              <li><a href="android.html#集成环境">集成环境</a>
                <ul class="nav">
                  <li><a href="android.html#环境要求">1、环境要求</a></li>
                  <li><a href="android.html#创建项目">2、创建项目</a></li>
                </ul>
              </li>
              <li><a href="android.html#快速集成">快速集成</a>
                <ul class="nav">
                  <li><a href="android.html#1、环境配置">1、环境配置</a></li>
                  <li><a href="android.html#2、初始化">2、初始化</a></li>
                  <li><a href="android.html#3、绑定弹幕资源">3、绑定弹幕资源</a></li>
		  <li><a href="android.html#4、加载弹幕资源">4、加载弹幕资源</a></li>
		  <li><a href="android.html#5、展示弹幕">5、展示弹幕</a></li>
		  <li><a href="android.html#6、发送弹幕">6、发送弹幕</a></li>
                </ul>
              </li>
            </ul><a href="android.html#Android_SDK_开发指南" class="back-to-top">回到顶部</a>
          </div>
        </div>
        <div class="col-md-10 markdown"><h1 id="Android_SDK_开发指南">Android SDK 开发指南</h1>
<p><br></p>
<h2 id="前期准备">前期准备</h2>
<p><br></p>
<h3 id="1、注册开发者ID">1、注册开发者ID</h3>
<p><br>&emsp;&emsp;开发者在集成弹云即时弹幕前，需前往 <a href="../index.html">弹云官方网站</a> 注册创建弹云开发者ID。开发者ID推荐使用包名，如下:</p>
<div class="bs-callout bs-callout-info">
cn.nathin.barrage
</div>

<h2 id="集成环境">集成环境</h2>
<p><br></p>
<h3 id="1、环境要求">1、环境要求</h3>
<p><br>
&emsp;&emsp;在您集成弹云 SDK 前环境要求如下：</p>
<ul>
<li>Android SDK Build-tools 请升级到 21 及以上版本。</li>
<li>JAVA 编译版本 JDK 1.7 及以上版本。</li>
</ul>
<div class="bs-callout bs-callout-info">
Android SDK 最低支持 Android API 9: Android 2.3(Gingerbread)。
</div>

<h3 id="2、创建项目">2、创建项目</h3>
<p><br>
&emsp;&emsp;我们推荐您首先创建一个空项目集成弹云的 SDK，然后再考虑加入您的工程。</p>
<div class="bs-callout bs-callout-info">
我们建议初次接触集成 SDK 的用户，首先通过自建项目成功的引入弹云 SDK，再进行后续开发。
</div>

<h2 id="快速集成">快速集成</h2>
<h3 id="1、环境配置">1、环境配置</h3>
<p><br>eclipse用户请<a href="../downloads.php">下载jar包</a>复制到您工程的lib目录下。</p>
<p><br>android studio用户请添加以下代码到您工程的build.gradle文件中。</p>
<pre><code class="lang-xml">
dependencies {
    compile 'com.squareup.okhttp:okhttp:2.0.0' //网络通信能力库，适配android6.0
    compile 'com.zhy:okhttputils:2.3.8'		//同上
    compile 'cn.nathin.barrage:barrage:0.0.3'	//弹幕能力库
}

</code></pre>
<h3 id="2、初始化">2、初始化</h3>
<p>在构建您的项目时，您需要在  AndroidManifest 里配置好了 internet权限，以便获取弹幕。</p>
<pre><code class="lang-xml">
&lt;uses-permission android:name=&quot;android.permission.INTERNET&quot;/&gt; 

</code></pre>
<p><br>
使用BarrageCA注册开发者ID
</p>
<pre><code class="lang-java">
	BarrageCA.register("cn.nathin.barrage");
   
</code></pre>
<p><br>
更多内容，请参考靠<a href="api/android/index.html">androidAPI文档</a>
</p>
<h3 id="3、绑定弹幕资源">３、绑定弹幕资源</h3>
<p><br>
所有弹幕实例均需设定资源ID，资源ID由用户自己定义，推荐仅有字母数字构成的序列，例如：
</p>
<div class="bs-callout bs-callout-info">
d9082c29d1da7e8ab9b3ac444caaa38a
</div>
<p><br>
不同资源对应不同资源ID，如果您有多个资源，且不希望共用弹幕，请设置多个资源ID。<br>
将资源ID绑定到弹幕对象上，可使用setSourceId(String str)方法，更多内容，请参考<a href="api/android/index.html">androidAPI手册</a><br>
例如：
</p>
<pre><code class="lang-java">
obj.setSourceId("d9082c29d1da7e8ab9b3ac444caaa38a");

</code></pre>
<p><br>
视屏弹幕<br>
请再布局文件中添加cn.nathin.barrage.BarrageViewVideo组件，例如：
</p>
<pre><code class="lang-xml">
    &lt;cn.nathin.barrage.BarrageViewVideo
        android:id="@+id/barrage"
        android:layout_width="250dp"
        android:layout_height="200dp"
        /&gt;

</code></pre>
<p><br>
资源绑定示范：
</p>
<pre><code class="lang-java">
BarrageViewVideo bvv=(BarrageViewVideo)findViewById(R.id.barrage);
bvv.setSourceId("pq9081234n9u89q3218");

</code></pre>
<p><br>
照片弹幕<br>
请在布局中添加cn.nathin.barrage.BarrageViewImage组件，例如:
</p>
<pre><code class="lang-xml">
    &lt;cn.nathin.barrage.BarrageViewImage
        android:id="@+id/barrage"
        android:layout_width="250dp"
        android:layout_height="200dp"
        /&gt;

</code></pre>
<p><br>
资源绑定示范：
</p>
<pre><code class="lang-java">
BarrageViewImage bvv=(BarrageViewImage)findViewById(R.id.barrage);
bvv.setSourceId("pq9081234n9u89q3218");

</code></pre>
<h3 id="4、加载弹幕资源">4、加载弹幕资源</h3>
<p><br>
绑定资源ID后即可获取相对应的弹幕资源。<br>
弹幕资源获取时需要访问网络，为方便用户自由调用，采用阻塞调用。<br>
用户不可在主线程中调用，可按如下方式调用。
</p>
<pre><code class="lang-java">
new Thread(){
	run(){
		bvv.getText();
	}
}.start();
</code></pre>

<h3 id="5、展示弹幕">5、展示弹幕</h3>
<p><br>
待弹幕加载完成后，即可显示弹幕。由用户主动调用。<br>
视频弹幕<br>
可调用如下：
</p>
<pre><code class="lang-java">
bvv.start();

</code></pre>
<p><br>
图片弹幕<br>
可调用如下：
</p>
<pre><code class="lang-java">
bvv.updataBarrageView();

</code></pre>
<p><br>
以上方法执行完成后即可显示弹幕。
</p>

<h3 id="6、发送弹幕">6、发送弹幕</h3>
<p><br>
视频弹幕
</p>

<pre><code class="lang-java">
bvv.sendText("hello");

</code></pre>
<p><br>
照片弹幕
</p>
<pre><code class="lang-java">
bvv.sendText("hello",横坐标，纵坐标);

</code></pre>
<p><br>

</p>
<p><br></p>
 <script type="text/javascript" src="http://player.youku.com/jsapi">
 function showVideo(domid,vid){
 player = new YKU.Player(domid,{
  styleid: '0',
     client_id: 'ec650ba130790427',
     vid: vid,
  autoplay: false,
  show_related: true
     });
 }
 showVideo('youkuplayer_Android','XMTM2ODE4MjYwMA==');
 showVideo('youkuplayer','XMTM3MjgyODYzNg==');
 showVideo('youkuplayer_Friend','XMTM5MjM3MjM0MA==');
 </script>

        </div>
      </div>
    </div>
    <hr>
    <p class="text-center">
      <Copyright>© 2016 BarrageCloud. All Rights Reserved. Version 0.0.1</Copyright>
    </p>
    <script src="assets/js/jquery-2.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina.min.js"></script>
    <script src="assets/js/highlight.pack.js"></script>
    <script src="assets/js/ZeroClipboard.min.js"></script>
    <script src="assets/js/sequenced.min.js"></script>
    <script>
      // Heading3 id replacer.
      var heading3Keys = {}
      $('h3').each(function(){
      	var h3 = $(this);
      	var id = h3.attr('id');
      	console.log(id);
      	if (heading3Keys['_' + id]) {
      		h3.attr('id', id + heading3Keys['_' + id]++)
      	} else {
      		heading3Keys['_' + id] = 1
      	}
      });
      // Highlight
      hljs.initHighlightingOnLoad();
      
      // Markdown style
      $('.markdown table').addClass('table table-bordered');
      $('.markdown a').attr('target', '_blank');
      
      // Config ZeroClipboard
      ZeroClipboard.config({
      	moviePath: '/docs/assets/js/ZeroClipboard.swf',
      	hoverClass: 'btn-clipboard-hover'
      });
      
      // Insert copy to clipboard button before .highlight
      $('pre').each(function() {
      	//var btnHtml = '<div class="zero-clipboard"><span class="btn-clipboard">Copy</span></div>'
      	//$(this).before(btnHtml)
      });
      var zeroClipboard = new ZeroClipboard($('.btn-clipboard'));
      var htmlBridge = $('#global-zeroclipboard-html-bridge');
      
      // Handlers for ZeroClipboard
      zeroClipboard.on('load', function() {
      	htmlBridge
      		.data('placement', 'top')
      		.attr('title', 'Copy to clipboard')
      		.tooltip();
      });
      
      // Copy to clipboard
      zeroClipboard.on('dataRequested', function(client) {
      	var highlight = $(this).parent().nextAll('pre').first();
      	client.setText(highlight.text());
      });
      
      // Notify copy success and reset tooltip title
      zeroClipboard.on('complete', function() {
      	htmlBridge
      		.attr('title', 'Copied!')
      		.tooltip('fixTitle')
      		.tooltip('show')
      		.attr('title', 'Copy to clipboard')
      		.tooltip('fixTitle');
      });
      
      // Notify copy failure
      zeroClipboard.on('noflash wrongflash', function() {
      	htmlBridge
      		.attr('title', 'Flash required')
      		.tooltip('fixTitle')
      		.tooltip('show');
      });
      
      // Scrollspy
      var $body = $(document.body);
      
      $body.scrollspy({
      		target: '.bs-docs-sidebar',
      		offset: 120
      	});
      
      $(window).on('load', function() {
      	$body.scrollspy('refresh');
      
      	if(window.location.hash) {
      		window.scrollBy(0, -60);
      	}
      }).on('hashchange', function() { 
      	window.scrollBy(0, -60);
      });
      
      Sequenced.renderAll();
      
    </script>
  </body>
</html>
