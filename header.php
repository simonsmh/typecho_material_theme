<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="theme-color" content="#3f51b5">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'author'    =>  _t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php if ($this->options->siteIcon): ?>
<link rel="Shortcut Icon" href="<?php $this->options->siteIcon() ?>" />
<link rel="Bootmark" href="<?php $this->options->siteIcon() ?>" />
<?php endif; ?>
<?php $this->header(); ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/material.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/ripples.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/roboto.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/customs.min.css'); ?>">
<?php if($this->options->googleAnalyticsTrackingId): ?>
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', '<?php echo $this->options->googleAnalyticsTrackingId; ?>', 'auto');ga('send', 'pageview');</script>
<?php endif; ?>
</head>
<body>
<header>
	<div class="navbar navbar-fixed-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li <?php if($this->is('index')): ?>class="active"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><span class="mdi-action-explore md-12"></span> <?php $this->options->title() ?></a></li>
					<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
					<?php while($category->next()): ?>
					<?php if(count($category->children)):?>
					<li class="dropdown">
						<a data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category->name?><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $category->permalink(); ?>"><?php echo $category->name ?></a></li>
							<?php foreach($category->children as $k=>$v):?>
							<li><a href="<?php echo $v['permalink'] ?>"><?php echo $v['name'] ?></a></li>
							<?php endforeach; ?>
						</ul>
					</li>
					<?php else:?>
					<?php if($category->levels == 0):?>
					<li <?php if ($this->is('category', $category->slug)): ?>class="active" <?php endif; ?>><a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
					<?php endif;?>
					<?php endif;?>
					<?php endwhile; ?>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?>
					<li <?php if($this->is('page', $pages->slug)): ?>class="active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
				<?php if ( !empty($this->options->misc) && in_array('ShowLogin', $this->options->misc) ) : ?>
				<ul class="nav navbar-nav navbar-right">
				<?php if($this->user->hasLogin()): ?>
					<li><a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a></li>
					<li><a href="<?php $this->options->logoutUrl(); ?>">登出</a></li>
					<?php else: ?>
					<li><a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
					<?php endif; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>