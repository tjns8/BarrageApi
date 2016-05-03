<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="提供弹云的基础知识概念介绍。">
    <title>SDK 0.0.3 快速入门 - 弹云 BarrageCloud</title>
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
              <li class="active"><a href="index.html#简介">简介</a>
                <ul class="nav">
                  <li><a href="index.html#架构介绍">架构介绍</a></li>
                  <li><a href="index.html#集成流程">集成流程</a></li>
                </ul>
              </li>
              <li><a href="index.html#基础概念_-_业务篇">基础概念 - 业务篇</a>
                <ul class="nav">
                  <li><a href="index.html#视频弹幕">视频弹幕</a></li>
                </ul>
              </li>
              <li><a href="index.html#基础概念_-_开发篇">基础概念 - 开发篇</a>
                <ul class="nav">
                  <li><a href="index.html#App_Key___Secret">App Key / Secret</a></li>
                  <li><a href="index.html#Sid">Sid</a></li>
                </ul>
              </li>
            </ul><a href="index.html#SDK_0_1_快速入门" class="back-to-top">回到顶部</a>
          </div>
        </div>
        <div class="col-md-10 markdown"><h1 id="SDK_0_1_快速入门">SDK 0.1 快速入门</h1>
<h2 id="简介">简介</h2>
<p>弹云是国内首家专业的即时弹幕云服务提供商，专注为互联网、移动互联网开发者提供免费的即时弹幕基础能力和云端服务。通过弹云平台，开发者不必搭建服务端硬件环境，就可以将即时弹幕、实时网络能力快速集成至应用中。</p>
<p>针对开发者所需的不同场景，弹云平台提供了一系列产品、技术解决方案。利用这些解决方案，开发者可以直接在自己的应用中构建出即时弹幕产品，也可以无限创意出自己的即时弹幕场景。</p>

<h3 id="架构介绍">架构介绍</h3>
<p>弹云提供的即时弹幕传输服务，不在 App 之外建立并行的用户体系，不需要同步用户账户，不影响 App 现有的系统架构与帐号体系，与现有业务体系能够实现完美融合。</p>
<p>弹云的架构设计上具有如下特点：</p>
<ul>
<li>无需改变现有 App 的架构，直接嵌入现有代码框架中；</li>
<li>无需改变现有 App Server 的架构；</li>
<li>专注于提供弹幕能力，使用私有的二进制通信协议，消息轻量、有序、不丢消息；</li>
</ul>
<div style="width:600px;margin:auto">
<img src="assets/img/guide/archietecture.png" alt="image">
</div>

<p>如图：</p>
<p>蓝色为您的应用（App）和应用服务器（App Server），用户数据（User Data）保存在您的应用服务器上，弹云不需要同步 App 的用户系统和弹幕关系；绿色为弹云服务器（BarrageCloud Server）和弹云 SDK，支持快速集成和平滑迁移。</p>
<p>蓝色箭头表示您自己的业务数据经由您自己的应用服务器；绿色箭头表示消息需要经过弹云服务器转发。</p>
<h3 id="集成流程">集成流程</h3>
<p>弹云的集成流程如下图所示，其中几个关键环节需要注意：</p>
<ol>
<li>客户端集成流程，可以参考 <a href="android.html">Android 开发指南</a></li>
</ol>

<h2 id="基础概念_-_业务篇">基础概念 - 业务篇</h2>
<h3 id="视频弹幕">视频弹幕</h3>
<p>指多用户对同一视频收发弹幕，弹幕关系由弹云负责建立并保持。</p>
<h3 id="图片弹幕">图片弹幕</h3>
<p>指多用户对同一图片收发弹幕，弹幕关系由弹云负责建立并保持。</p>
<h3 id="自定义弹幕">自定义弹幕</h3>
<p>指多用户由于客观需求自定义弹幕的显示方式，弹幕关系由弹云负责建立并保持。</p>
<h2 id="基础概念_-_开发篇">基础概念 - 开发篇</h2>
<h3 id="App_Key___Secret">开发者ID</h3>
<p>开发者ID 相当于您的 App 在弹云的账号和密码。是弹云 SDK 连接服务器所必须的标识，每一个 App 对应一套 开发者ID。</p>
<h3 id="Sid">Sid</h3>
<p>Sid 即资源id，相当于您APP上当前用户连接弹云的资源的编号。每个资源都需要一个 Sid，资源更换即需要更换 Sid。每次初始化连接服务器时，都需要向服务器提交 Sid。</p>

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
