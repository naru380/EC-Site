<img src="https://github.com/naru380/EC-Site/blob/image/my_ec_site.png">
<br>

# 僕が作ったECサイト
ECサイトの仕組みを理解するために、練習も兼ねて作ってみました。<br>
とは言っても、全然実用できるレベルではありませんが（笑）
<br>
<br>

## 実行環境
使用機材は次の通り。
* MacBook Air (Retina, 13-inch, 2018)
* macOS Mojave バージョン 10.14.6 (18G103)

ECサイトを動かすための環境構築はDocker上で行う。<br>
構成は次のようなLAMP環境とした。
* CentOS
* Apache
* MySQL 
* PHP
また、サイト作成のフレームワークとしてEthnamを利用した。<br>
以降は構築手順を順番に説明していく。<br>
（Dockerfileを作成してコマンド1つで構築できるのが理想だが、そこまで出来ていない、、。）
<br>

## 環境構築手順
### 1. Dockerコンテナの作成
Dockerの[公式ページ](https://hub.docker.com)にアクセスして、dockerアプリケーションを入手する。<br>
Dockerが正しくインストールされていることを確認するために、ターミナルで以下のコマンドで確認する。

```shell-session
$ docker --version
Docker version 18.09.2, build 6247962
```

次にDocker上で稼働させるOSをインストールする。次のコマンドでCentOS7のイメージをインストールする。

```shell-session
$ docker pull centos
Using default tag: latest
latest: Pulling from library/centos
8ba884070f61: Pull complete 
Digest: sha256:8d487d68857f5bc9595793279b33d082b03713341ddec91054382641d14db861
Status: Downloaded newer image for centos:latest
```

インストールしたイメージを確認するために次のコマンドを実行する。

```shell-session
$ docker images
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
centos              latest              9f38484d220f        4 weeks ago         202MB
```

次にコンテナを作成するために次のコマンドを実行する。

```shell-session
$ docker run --privileged -d -p 80:80 --name ec_site -it centos:centos7 /sbin/init
```

次のコマンドを実行し、コンテナの稼働状況を確認する。

```shell-session
$ docker ps
CONTAINER ID        IMAGE               COMMAND             CREATED             STATUS              PORTS                NAMES
900d9e68cdc0        centos              "/bin/bash"         5 hours ago         Up 5 hours          0.0.0.0:80->80/tcp   ec_site
```

コンテナが稼働していることが確認できたら、次のコマンドでコンテナにログインする。

```shell-session
$ docker attach ec_site
```

次のコマンドでもログイン可能で、この場合だとコンテナ内でexitしてもコンテナは停止しない。
```shell-session
$ docker exec -it ec_site /bin/bash
```


### 2. ミドルウェアの作成
まず、サイトを記述するためのプログラミング言語をインストールする。<br>
今回は、PHP 5.6 をインストールするために次のコマンドを実行する。

```shell-session
# yum -y install epel-release
# rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
# yum -y install --enablerepo=remi,remi-php56 php
```

ここまでで、Webサーバの構築に必要なApacheがインストールされていない場合は次のコマンドでインストールする。

```shell-session
# yum -y install httpd
```

Apacheがインストールできているかを確認するには、次のコマンドを実行すれば良い。

```shell-session
# httpd -v
Server version: Apache/2.4.6 (CentOS)
Server built:   Nov  5 2018 01:47:09
```

最後に、データベース管理システムをインストールする。今回用いるのはMySQLであるため、次のコマンドを実行する。

```shell-session
# yum -y install http://dev.mysql.com/get/mysql-community-release-el7-5.noarch.rpm
# yum -y install mysql-community-server
```

以上でLAMP環境の構築に最低限必要なミドルウェアのインストールは完了である。


### 3. サーバの起動とフレームワークの導入
まず、インストールしたサーバを起動する。<br>
このとき、サーバーを再起動しても起動時に自動的にサーバが起動するように次のコマンドを実行する。

```shell-session
# systemctl enable httpd.service
# systemctl enable mysqld.service
```

次にサーバを起動するために次のコマンドを実行する。

```shell-session
# systemctl start httpd.service
# systemctl start mysqld.service
```

以下の設定でunzipコマンドとgitコマンドが必要となるため次のコマンドを実行し、先にインストールしておく。

```shell-session
# yum install unzip
# yum install git
```

PHPで日本語を使用するために必要なmbstringモジュールを導入する。<br>
まず次のコマンドでmbstringが表示されるかを確認する。<br>
表示されればインストール作業は不要である。

```shell-session
# php -m
```

表示されなければ次のコマンドを実行してmbstringモジュールをインストールする。

```shell-session
# yum --enablerepo=remi-php56 --disablerepo=base install php-mbstring
```

変更された設定を反映させるために次のコマンドでサーバを再起動する。

```shell-session
# systemctl restart httpd
```

次に、PHPのフレームワークであるethnamを導入する。<br>
導入を簡単に行うためのPHPのパッケージ管理システムとしてComposerがあり、これを次のコマンドでインストールする。

```shell-session
# php -r "copy('https://getcomposer.org/installer', ‘composer-setup.php');"
# php composer-setup.php
# php -r “unlink('composer-setup.php');"
# mv composer.phar /usr/local/bin/composer
```

次のコマンドでComposerが使えるようになったか確認する。

```shell-session
# composer
```

Webアプリケーション（ECサイト）を作成するためのプロジェクト用ディレクトリを作成するため、次のコマンドを実行する。

```shell_session
# cd /var/www/
# mkdir EC-Site
```

そのディレクトリ内でcomposer.jsonを作成する。<br>
composer.jsonの内容は次のように編集する。

```json
{
  "require": {
    "ethnam/ethnam": "dev-master",
    "ethnam/generator": "dev-master",
    "smarty/smarty": "2.6.*"
  }
}
```

composer.jsonと同じ階層で次のコマンドを実行し、ethnamパッケージをインストールする。

```shell-session
# composer install
```

プロジェクトのスケルトンを作成するために次のコマンドを実行する。<br>
今回の場合だと、プロジェクト名はSampleとなっている。

```shell-session
# vendor/bin/ethnam-generator add-project -b . Sample
```

以上でWebアプリケーション（ECサイト）の雛形が完成するが、Apacheのプロジェクトルート(htmlファイル等の置き場)が`/var/www/html`となっている。<br>
設定ファイルを作成して、適切な位置にプロジェクトルートを変更する。設定ファイルを作成するために次のコマンドを実行する。

```shell-session
# vi /etc/httpd/conf.d/sample.ec.jp.conf
```

設定ファイルの内容は次のようにする。

```bash
<VirtualHost *:80>
  DocumentRoot /var/www/EC-Site/www
  ServerName sample.host.jp
</VirtualHost>
```

変更された設定を反映させるために次のコマンドでサーバを再起動する。

```shell-session
# systemctl restart httpd
```

ブラウザでlocalhostにアクセスしたときに次のようなページが表示されれば、環境構築は正しくできている。
<br>
<br>
<br>
<img src="https://github.com/naru380/EC-Site/blob/image/ethnam_top.png">
<br>
<br>

## プロジェクトの実行方法
`/var/www/EC-Site`の中身を全て削除し、本プロジェクトをクローンする。<br>
以下のコマンドを実行すればよい。

```she-session
# cd /var/www/
# rm -r EC-Site
# git clone https://github.com/naru380/EC-Site.git
```

