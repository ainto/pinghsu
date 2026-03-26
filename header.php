<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">

    <?php if ($this->options->DnsPrefetch): ?><meta http-equiv="x-dns-prefetch-control" content="on">
    <?php if ($this->options->cdn_add != '' && filter_var($this->options->cdn_add, FILTER_VALIDATE_URL) !== false): ?><link rel="dns-prefetch" href="//<?php echo parse_url($this->options->cdn_add, PHP_URL_HOST); ?>" />
    <?php endif; ?><?php if ($this->options->libCDN == 'able' && $this->options->cdn_prefix != '' && filter_var($this->options->cdn_prefix, FILTER_VALIDATE_URL) !== false): ?><link rel="dns-prefetch" href="//<?php echo parse_url($this->options->cdn_prefix, PHP_URL_HOST); ?>" />
    <?php endif; ?><?php if ($this->options->gravatar_mirror != '' && filter_var($this->options->gravatar_mirror, FILTER_VALIDATE_URL) !== false): ?><link rel="dns-prefetch" href="//<?php echo parse_url($this->options->gravatar_mirror, PHP_URL_HOST); ?>" /><?php endif; ?>
    <?php endif; ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/><?php if($this->options->favicon): ?>
    <link rel="shortcut icon" href="<?php $this->options->favicon(); ?>"><?php endif;?><?php if($this->options->iosicon): ?>
    <link rel="apple-touch-icon" href="<?php $this->options->iosicon();?>"><?php endif; ?>
    <title><?php $this->archiveTitle(array(
    'category'  =>  _t(' %s '),
    'search'    =>  _t(' %s '),
    'tag'       =>  _t(' %s '),
    'author'    =>  _t(' %s '),
    'date'      =>  _t(' %s ')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="keywords" content="<?php $this->keywords(); ?>" />
    <?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
    <link href="<?php echo ($this->options->libCDN == 'disable')? $this->options->themeUrl('libs/'):$this->options->cdn_prefix; ?>highlight.js/11.11.1/styles/xcode.min.css" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('style.min.css?20240216'); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo ($this->options->libCDN == 'disable')? $this->options->themeUrl('libs/'):$this->options->cdn_prefix; ?>html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="<?php echo ($this->options->libCDN == 'disable')? $this->options->themeUrl('libs/'):$this->options->cdn_prefix; ?>respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="<?php if (isset($this->___fields()['archive'])): ?>bg-grey<?php elseif($this->is('archive')&&($this->options->colorBgPosts == 'defaultColor')): ?>bg-grey<?php elseif($this->is('archive')&&($this->options->colorBgPosts == 'customColor')): ?>bg-white<?php elseif(!$this->is('single')): ?>bg-grey<?php endif; ?>" gtools_scp_screen_capture_injected="true">
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog">
    当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="https://browsehappy.com/" target="_blank">升级你的浏览器</a>。
</div>
<![endif]-->
<header id="header" class="header bg-white">
    <div class="navbar-container">
        <a href="<?php $this->options->siteUrl(); ?>" class="navbar-logo">
            <?php if($this->options->logoUrl): ?>
            <img src="<?php $this->options->logoUrl();?>" alt="<?php $this->options->title() ?>" />
            <?php else : ?>
            <?php $this->options->title() ?>
            <?php endif; ?>
        </a>
        <div class="navbar-menu">
			<?php if ($this->options->categoryNav == 'able'): ?>
            <?php $this->widget('Widget_Metas_Category_List')->to($category);?>
            <?php while ($category->next()):?>
            <a<?php if($this->is('post')):?> <?php if($this->category == $category->slug):?> class="current"<?php endif;?><?php else:?><?php if($this->is('category', $category->slug)):?> class="current"<?php endif;?> <?php endif;?> href="<?php $category->permalink();?>"><?php $category->name();?></a>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
            <?php endwhile; ?>
        </div>
        <?php if($this->options->searchPage): ?>
        <a href="<?php $this->options->searchPage(); ?>" class="navbar-search">
            <span class="icon-search"></span>
        </a>
        <?php else: ?>
        <div class="navbar-search" onclick="">
            <span class="icon-search"></span>
            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <span class="search-box">
                    <input type="text" id="input" class="input" name="s" required="true" placeholder="Search..." maxlength="30" autocomplete="off">
                </span>
            </form>
        </div>
        <?php endif;?>
        <div class="navbar-mobile-menu" onclick="">
            <span class="icon-menu cross"><span class="middle"></span></span>
            <ul>
			    <?php if ($this->options->categoryNav == 'able'): ?>
                <?php $this->widget('Widget_Metas_Category_List')->to($category);?>
                <?php while ($category->next()):?>
                <li><a<?php if($this->is('post')):?> <?php if($this->category == $category->slug):?> class="current"<?php endif;?><?php else:?><?php if($this->is('category', $category->slug)):?> class="current"<?php endif;?> <?php endif;?> href="<?php $category->permalink();?>"><?php $category->name();?></a></li>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</header>