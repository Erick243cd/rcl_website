<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?? "RCL" ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="<?= site_url() ?>public/assets/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="<?= site_url() ?>public/assets/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="<?= site_url() ?>public/assets/css/style.css"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script nonce="0755d8c3-8834-4088-b550-c48a6816d7a1">(function (w, d) {
            !function (f, g, h, i) {
                f[h] = f[h] || {};
                f[h].executed = [];
                f.zaraz = {deferred: [], listeners: []};
                f.zaraz.q = [];
                f.zaraz._f = function (j) {
                    return function () {
                        var k = Array.prototype.slice.call(arguments);
                        f.zaraz.q.push({m: j, a: k})
                    }
                };
                for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
                f.zaraz.init = () => {
                    var m = g.getElementsByTagName(i)[0], n = g.createElement(i),
                        o = g.getElementsByTagName("title")[0];
                    o && (f[h].t = g.getElementsByTagName("title")[0].text);
                    f[h].x = Math.random();
                    f[h].w = f.screen.width;
                    f[h].h = f.screen.height;
                    f[h].j = f.innerHeight;
                    f[h].e = f.innerWidth;
                    f[h].l = f.location.href;
                    f[h].r = g.referrer;
                    f[h].k = f.screen.colorDepth;
                    f[h].n = g.characterSet;
                    f[h].o = (new Date).getTimezoneOffset();
                    if (f.dataLayer) for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({...t[1], ...u[1]}))))) zaraz.set(s[0], s[1], {scope: "page"});
                    f[h].q = [];
                    for (; f.zaraz.q.length;) {
                        const v = f.zaraz.q.shift();
                        f[h].q.push(v)
                    }
                    n.defer = !0;
                    for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith("_zaraz_"))).forEach((x => {
                        try {
                            f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                        } catch {
                            f[h]["z_" + x.slice(7)] = w.getItem(x)
                        }
                    }));
                    n.referrerPolicy = "origin";
                    n.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                    m.parentNode.insertBefore(n, m)
                };
                ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);</script>
</head>
<body>

<header id="header">
    <div id="nav">
        <div id="nav-fixed">
            <div class="container">
                <div class="nav-logo">
                    <a href="index.html" class="logo"><img src="<?= site_url() ?>public/assets/img/logo.png" alt=""></a>
                </div>

                <ul class="nav-menu nav navbar-nav">
                    <li><a href="category.html">News</a></li>
                    <li><a href="category.html">Popular</a></li>
                    <li class="cat-1"><a href="category.html">Web Design</a></li>
                    <li class="cat-2"><a href="category.html">JavaScript</a></li>
                    <li class="cat-3"><a href="category.html">Css</a></li>
                    <li class="cat-4"><a href="category.html">Jquery</a></li>
                </ul>

                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="nav-aside">
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                </ul>
            </div>
            <div class="section-row">
                <h3>Recent Posts</h3>
                <?php foreach ($news as $new): ?>
                    <div class="post post-widget">
                        <a title="voir le detail" class="post-img"
                           href="<?= site_url('post-detail/' . $new->slug) ?>"><img
                                    src="<?= site_url() ?>public/assets/img/<?= $new->postImage ?>"
                                    alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="<?= site_url('post-detail/' . $new->slug) ?>"><?= $new->title ?></a></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
        </div>
    </div>




<?= $this->renderSection("content") ?>

<footer id="footer">

    <div class="container">

        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.html" class="logo"><img src="img/logo.png" alt=""></a>
                    </div>
                    <ul class="footer-nav">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Advertisement</a></li>
                    </ul>
                    <div class="footer-copyright">
<span>&copy;
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
            class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/"
                                                                target="_blank">Colorlib</a>
</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Join Us</a></li>
                                <li><a href="contact.html">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Catagories</h3>
                            <ul class="footer-links">
                                <li><a href="category.html">Web Design</a></li>
                                <li><a href="category.html">JavaScript</a></li>
                                <li><a href="category.html">Css</a></li>
                                <li><a href="category.html">Jquery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Join our Newsletter</h3>
                    <div class="footer-newsletter">
                        <form>
                            <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                            <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</footer>

<script src="<?= site_url() ?>public/assets/js/jquery.min.js"></script>
<script src="<?= site_url() ?>public/assets/js/bootstrap.min.js"></script>
<script src="<?= site_url() ?>public/assets/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"79a8d8d7cd3f9cc0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}'
        crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/webmag/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Feb 2023 05:57:06 GMT -->
</html>
