<?php if (isset($searchBookName) && $searchBookName != ''): ?>
    <script>
        $(document).ready(function () {
            location.href = '#search';
        });
    </script>
<?php endif; ?>
<?php if (isset($showingBookID) && $showingBookID != false): ?>
    <script>
        $(document).ready(function () {
            location.href = '#showbook';
        });
    </script>
<?php endif; ?>
<?php if (isset($showingClassifyID) && $showingClassifyID != false): ?>
    <script>
        $(document).ready(function () {
            location.href = '#bookcase';
        });
    </script>
<?php endif; ?>
<div data-role="page" data-control-title="Home" id="home">
    <div data-theme="a" data-role="header" data-position="fixed">
        <h3>
            移动阅读
        </h3>
    </div>
    <div data-role="content">
        <div data-controltype="textblock">
            <p>
                待定小组 - 移动阅读
            </p>
        </div>
    </div>
    <div data-role="tabbar" data-iconpos="left" data-theme="a">
        <ul>
            <li>
                <a href="#bookcase" data-transition="fade" data-theme="" data-icon="grid">
                    书柜
                </a>
            </li>
            <li>
                <a href="#search" data-transition="fade" data-theme="" data-icon="search">
                    找书
                </a>
            </li>
            <li>
                <a href="#about" data-transition="fade" data-theme="" data-icon="info">
                    关于
                </a>
            </li>
        </ul>
    </div>
</div>

<div data-role="page" data-control-title="Bookcase" id="bookcase">
    <div data-role="panel" id="panelClassify" data-position="left" data-display="reveal" data-theme="a">
        <ul data-role="listview" data-divider-theme="h" data-inset="false">
            <li data-role="list-divider" role="heading">
                图书分类
            </li>
            <?php if (isset($classifyArray)) : ?>
                <?php foreach ($classifyArray as $thisClassify): ?>
                    <li data-theme="a">
                        <a href="?cid=<?php echo($thisClassify['id']); ?>" data-transition="slide" data-ajax="false">
                            <?php echo $thisClassify['classname']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div data-role="content">
        <a data-controltype="panelbutton" data-role="button" data-inline="true" href="#panelClassify" data-icon="bars" data-iconpos="notext">
        </a>
        <ul data-role="listview" data-divider-theme="" data-inset="true">
            <li data-role="list-divider" role="heading">
                书籍列表
            </li>
            <?php if (isset($articleArray)): ?>
                <?php foreach ($articleArray as $thisArticle): ?>
                    <li data-theme="">
                        <a href="?bid=<?php echo($thisArticle['id']); ?>" data-transition="slide" data-ajax="false">
                            <?php echo $thisArticle['title']; ?>
                            <span class="ui-li-count">
                                <?php echo $thisArticle['createdate']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div data-role="tabbar" data-iconpos="left" data-theme="a">
        <ul>
            <li>
                <a href="#bookcase" data-transition="fade" data-theme="" data-icon="grid">
                    书柜
                </a>
            </li>
            <li>
                <a href="#search" data-transition="fade" data-theme="" data-icon="search">
                    找书
                </a>
            </li>
            <li>
                <a href="#about" data-transition="fade" data-theme="" data-icon="info">
                    关于
                </a>
            </li>
        </ul>
    </div>
</div>

<div data-role="page" data-control-title="Search" id="search">
    <div data-role="content">
        <div data-role="fieldcontain" data-controltype="searchinput">
            <form method="post" action="<?php echo base_url(); ?>" data-ajax="false">
                <input name="searchBookName" id="searchBookName" placeholder="输入要寻找的书名" value="<?php if (isset($searchBookName)) echo $searchBookName; ?>" type="search">
            </form>
        </div>
        <ul data-role="listview" data-divider-theme="" data-inset="true">
            <li data-role="list-divider" role="heading">
                搜索结果
            </li>
            <?php if (isset($searchResultArticleArray)): ?>
                <?php foreach ($searchResultArticleArray as $thisArticle): ?>
                    <li data-theme="">
                        <a href="<?php echo base_url('?bid=' . $thisArticle['id']); ?>" data-transition="slide" data-ajax="false">
                            <?php echo $thisArticle['title']; ?>
                            <span class="ui-li-count">
                                <?php echo $thisArticle['createdate']; ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div data-role="tabbar" data-iconpos="left" data-theme="a">
        <ul>
            <li>
                <a href="#bookcase" data-transition="fade" data-theme="" data-icon="grid">
                    书柜
                </a>
            </li>
            <li>
                <a href="#search" data-transition="fade" data-theme="" data-icon="search">
                    找书
                </a>
            </li>
            <li>
                <a href="#about" data-transition="fade" data-theme="" data-icon="info">
                    关于
                </a>
            </li>
        </ul>
    </div>
</div>

<div data-role="page" data-control-title="About" id="about">
    <div data-role="content">
        <div data-controltype="image">
            <img src="<?php echo base_url('public/image/Ib.jpg'); ?>" alt="image" style="width: 80%">
        </div>
        <div data-controltype="textblock">
            <p>
                <pre style="font-size:20px">
    黄文浩  系统分析员、软件工程师（前台） 
    廖若辰  架构师、软件工程师（后台）
    王珏    文档人员、测试人员
    袁科杰  数据库设计师、测试人员
    李瑞坤  项目经理
                </pre>
            </p>
        </div>
    </div>
    <div data-role="tabbar" data-iconpos="left" data-theme="a">
        <ul>
            <li>
                <a href="#bookcase" data-transition="fade" data-theme="" data-icon="grid">
                    书柜
                </a>
            </li>
            <li>
                <a href="#search" data-transition="fade" data-theme="" data-icon="search">
                    找书
                </a>
            </li>
            <li>
                <a href="#about" data-transition="fade" data-theme="" data-icon="info">
                    关于
                </a>
            </li>
        </ul>
    </div>
</div>

<div data-role="page" data-control-title="Showbook" id="showbook">
    <div data-theme="a" data-role="header" data-position="fixed">
        <a data-role="button" data-rel="back" class="ui-btn-left">
            返回
        </a>
        <h3>
            <?php if (isset($showingBook) && isset($showingBook['title'])) echo $showingBook['title']; ?>
        </h3>
    </div>
    <div data-role="content">
        <div data-controltype="textblock">
            <p>
                <?php if (isset($showingBook) && isset($showingBook['content'])) echo $showingBook['content']; ?>
            </p>
        </div>
    </div>
    <div data-role="tabbar" data-iconpos="left" data-theme="a">
        <ul>
            <li>
                <a href="#bookcase" data-transition="fade" data-theme="" data-icon="grid">
                    书柜
                </a>
            </li>
            <li>
                <a href="#search" data-transition="fade" data-theme="" data-icon="search">
                    找书
                </a>
            </li>
            <li>
                <a href="#about" data-transition="fade" data-theme="" data-icon="info">
                    关于
                </a>
            </li>
        </ul>
    </div>
</div>