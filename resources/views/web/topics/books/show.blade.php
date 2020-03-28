@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="panel panel-default" style="padding: 15px">
                <div class="ui vertical following fluid accordion text menu">
                    <div class="item">
                        <a class="ui logo icon image" href="/">
                            <img src="https://semantic-ui.com/images/logo.png">
                        </a>
                        <a href="/"><b>UI 文档</b></a>
                    </div>
                    <a class="item" href="/introduction/getting-started.html">
                        <b>起步</b>
                    </a>
                    <a class="item" href="/introduction/new.html">
                        <b>New in 2.4</b>
                    </a>
                    <div class="item">
                        <div class="header">介绍</div>
                        <div class="menu">

                            <a class="item" href="http://larabbs.test/book/show">集成 </a>

                            <a class="item" href="/book/show">构建工具 </a>

                            <a class="item" href="/book/shows">配置 </a>

                            <a class="item" href="/introduction/glossary.html">词汇表 </a>

                        </div>
                    </div>
                    <div class="item">
                        <div class="header">用法</div>
                        <div class="menu">

                            <a class="item" href="/usage/theming.html">主题化 </a>

                            <a class="item" href="/usage/layout.html">布局 </a>

                        </div>
                    </div>
                    <div class="item">
                        <div class=" header">全局</div>
                        <div class="menu">

                            <a class="item" href="/globals/reset.html">样式重置 </a>

                            <a class="item" href="/globals/site.html">站点 </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 class="text-center">
                        Jenkins  自动化部署
                    </h1>

                    <div class="article-meta text-center">
                        2个月前
                        ⋅
                        <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        0
                    </div>

                    <div class="topic-body">
                        <p>之前在第一家公司工作的时候，运维同学给我们部署了代码发布工具 <a href="https://jenkins.io/zh/doc/"><b>Jenkins</b></a> ，那时候感觉好方便，可以多分支，多版本，随时回滚，这极大地提高了工作效率和代码安全性，那时候只知道怎么用，不知道原理，现在就来系统的看下，算是一个补充吧。</p>

                        <p><b>Jenkins 是什么？</b></p>

                        <blockquote><p>Jenkins 是一款开源 CI &amp; CD 软件，用于自动化各种任务，包括构建、测试和部署软件。</p><p>Jenkins 支持各种运行方式，可通过系统包、Docker 或者通过一个独立的 Java 程序。</p></blockquote>

                        <p><b>Jenkins 的构建方式：</b></p>

                        <blockquote><ul><li><b>jenkins 触发式构建</b>：用户开发环境部署，开发人员 push 代码或者合并代码到 git 项目的 master 分支，jenkins 就部署代码到对应的服务器。</li><li><b>jenkins 参数化构建</b>：用于测试环境预上线环境部署，开发 push 代码或者合并代码到 git 项目的 master 分支之后，并不会部署代码，而是需要登录到 jenkins 的 web 界面，点击构建按钮，传入对应的参数（比如参数需要构建的tag，需要部署的分支）然后再回部署。</li><li><b>jenkins 定时构建</b>：用于 APP 自动打包，定时构建是在参数化构建的基础上添加的，开发人可以登录 jenkins 手动传入 tag 进行打包，如果不手动打包，那么jenkins 就每天定时从 git 拉取最新的 APP 代码打包。</li></ul></blockquote>

                        <p><b>Jenkins 的其他用法：</b></p>

                        <blockquote><ul><li>各种服务的备份也可以放在 jenkins 上面，每天使用 jenkins 定时备份，还可以在 jenkins 看每天备份的输出信息。</li><li>同步生产数据库到开发环境</li><li>·········（持续更新）</li></ul></blockquote>

                        <p><b>系统工作流程：</b></p>

                        <blockquote><ol><li>开发者将新版本 push 到 git server。</li><li>git server 随后触发 jenkins master 结点进行一次 build（构建），【通过 web hook 或者定时检测】。</li><li>jenkins master 结点将这个 build 任务分配给若干个注册的 slave 结点中的一个，这个 slave 结点根据一个事先设置好的脚本进行 build。这个脚本可以做的事情很多，比如编译、测试、生成测试报告等等。这些原本需要手动完成的任务都可以交给 jenkins 来做。</li><li>在 build 中要进行编译，这里使用了分布式编译器 distcc 来加快编辑速度。</li></ol></blockquote>

                        <p><b>系统工作原理：</b></p>

                        <p>                                  <img alt="Image" src="https://phpmianshiwang-typecho.oss-cn-beijing.aliyuncs.com/images/731956-20170314155110635-940135026.png" width="500" height="334" /><br /></p>

                        <p><b>安装 Jenkins：</b></p>

                        <p>Jenkins 是 java 编写的，先安装 jdk，centos 使用 yum 安装：</p>

                        <pre><code>yum -y install java-1.8.0 java-devel-1.8.0<br /></code></pre>

                        <p>Jenkins 需要从 git 拉去代码，需要安装 git 客户端：</p>

                        <pre><code>yum -y install git</code></pre>

                        <p>正式安装：</p>

                        <pre><code>cd /etc/yum.repos.d/
wget http://pkg.jenkins.io/redhat/jenkins.repo
rpm --import http://pkg.jenkins.io/redhat/jenkins.io.key
yum install -y jenkins<br /></code></pre>

                        <p>启动 Jenkins ：</p>

                        <pre><code>systemctl start jenkins<br /></code></pre>

                        <p>然后访问地址查看</p>

                        <pre><code>IP:8080<br /></code></pre>

                        <p>输入密码（查看密码）</p>

                        <pre><code>cat /var/lib/jenkins/secrets/initialAdminPassword<br /></code></pre>

                        <p>下一步会提示你安装插件：</p>

                        <p><img alt="Image" src="https://phpmianshiwang-typecho.oss-cn-beijing.aliyuncs.com/images/WechatIMG327.png" width="1200" height="718" /><br /></p>

                        <p><br /></p>

                        <p>在这里选择安装推荐的插件，后续有需要可以在插件系统里边进行安装其他插件。</p>

                        <p>正在安装插件.........有点多......</p>

                        <p><img alt="Image" src="https://phpmianshiwang-typecho.oss-cn-beijing.aliyuncs.com/images/WechatIMG328.png" width="1033" height="705" /><br /></p>

                        <p>安装完成，登录即可，账户密码需要重新设置。</p>

                        <p><img alt="Image" src="https://phpmianshiwang-typecho.oss-cn-beijing.aliyuncs.com/images/WechatIMG329.png" width="1089" height="717" /><br /></p>

                        <p>后边会介绍如何用 Jenkins 发布代码上线。</p>
                    </div>


                </div>
            </div>



            <div class="panel panel-default topic-reply">
            <div class="panel-body">
                <div class="reply-list">
                </div>
            </div>
        </div>
        </div>
        </div>

@stop
{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">--}}
{{--@stop--}}
{{--@section('scripts')--}}
{{--    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">--}}
{{--    <script src="{{ asset('js/semantic.min.js')}}"></script>--}}

{{--@stop--}}