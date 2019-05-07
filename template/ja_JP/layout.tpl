<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/css/ethna.css" type="text/css" />
<title>通販サイト</title>
</head>
    <header>
        <div id="header-inner">
            <div id="header-logo">
                <h1> 通販サイト</h1>
            </div>
            <nav>
            <div id= "header-Nav">
                <ul>
                    {if $session.auth == 'ok'}
                    <li>
                        <a href="/?action_mycart=true">マイカート</a>
                    </li>
                    <li>
                        <a href="/?action_mypage=true">マイページ</a>
                    </li>
                    <li>
                        <a href="/?action_logout=true">ログアウト</a>
                    </li>
                    {else}
                    <li>
                        <a href="/?action_login=true">ログイン</a>
                    </li>
                    {/if}
                    <li>
                        <a href="/?action_user_register=true">新規登録</a>
                    </li>
                </ul>
            </div>
            </nav>
        </div>
        <div id="header-menu">
            <nav>
            <div id="header-menu-contents">
                <ul>
                    <li>
                        <a href="/">HOME</a>
                    </li>
                    <li>
                        <a href="/?action_about=true">ABOUT</a>
                    </li>
                    <li>
                        <a href="/?action_shop=true">SHOP</a>
                    </li>
                    <li>
                        <a href="#">LOCATION</a>
                    </li>
                    <li>
                        <a href="?action_contact=true">CONTACT</a>
                    </li>
                </ul>
            </div>
            </nav>
        </div>
    </header>
    <body>
    <div id="sidebar">
    </div>
    <div id="main">
        {$content}
    </div>

    <footer>
        <p>COPYRIGHT(C) 通販サイト ALL RIGHTS RESERVED.<p>
    </footer>
</body>
</html>
