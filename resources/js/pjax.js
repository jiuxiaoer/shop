//定义加载区域
$(document).pjax('a[target!=_blank]', 'body');
//定义pjax有效时间，超过这个时间会整页刷新
$.pjax.defaults.timeout = 1200;
//显示加载动画
var index
$(document).on('pjax:click', function () {
  index = layer.load(1, {
    shade: [0.1, '#000'] //0.1透明度的白色背景
  });
});
//隐藏加载动画
$(document).on('pjax:end', function () {
  $.getScript("js/app.js");
  layer.close(index);
  layer.msg('加载成功')
});


