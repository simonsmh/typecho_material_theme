<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (isset($_GET["action"]) && $_GET["action"] == "ajax_comments") {
$this->need('comments.php');
} else {
if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
$this->need('header.php');
?>
<div class="container" id="main">
<div class="row">
<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3 class="post-title"><a href="<?php $this->permalink() ?>" target="_blank"><?php $this->title() ?></a></h3>
			<div class="post-meta">
				<span>作者：<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> | </span>
				<span>时间：<?php $this->date(); ?> | </span>
				<span>分类：<?php $this->category(','); ?> | </span>
				<span>评论：<a href="<?php $this->permalink() ?>"><?php $this->commentsNum('暂无评论','%d 评论'); ?></a> </span>
			</div>
			<div class="post-content"><?php $this->content('- 阅读全文 -'); ?></div>
		</div>
	</div>
	<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php');$this->need('footer.php');} ?>