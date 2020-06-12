<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* baseFront.html.twig */
class __TwigTemplate_b0b96a684e1be5a1bb920d510a3877b652b3ad9160f39dac75d8454256f2fa4d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "baseFront.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "baseFront.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<!--[if IE 7]><html class=\"ie ie7\"><![endif]-->
<!--[if IE 8]><html class=\"ie ie8\"><![endif]-->
<!--[if IE 9]><html class=\"ie ie9\"><![endif]-->
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"format-detection\" content=\"telephone=no\">
    <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
    <link href=\"apple-touch-icon.png\" rel=\"apple-touch-icon\">
    <link href=\"favicon.png\" rel=\"icon\">
    <meta name=\"author\" content=\"Nghia Minh Luong\">
    <meta name=\"keywords\" content=\"Default Description\">
    <meta name=\"description\" content=\"Default keyword\">
    <title>";
        // line 17
        $this->displayBlock('title', $context, $blocks);
        echo " </title>
    <link href=\"https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900\" rel=\"stylesheet\">
    ";
        // line 19
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 37
        echo "
</head>
<body class=\"ps-loading\">
<div class=\"header--sidebar\"></div>
<header class=\"header\">
    <div class=\"header__top\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-lg-6 col-md-8 col-sm-6 col-xs-12 \">
                    <p>
                        Les berges du Lac 2020 Tunis  -  Infoline: +216 50-790-004 / +216 25-102-490</p>
                </div>
                <div class=\"col-lg-6 col-md-4 col-sm-6 col-xs-12 \">
                    <div class=\"header__actions\">                        ";
        // line 50
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 51
            echo "                            <a href=\"";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
            echo "\">
                                ";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.logout", [], "FOSUserBundle"), "html", null, true);
            echo "
                            </a><a href=\"";
            // line 53
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_profile_show");
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "user", []), "username", []), "html", null, true);
            echo "</a>
                        ";
        } else {
            // line 55
            echo "                            <a href=\"";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("layout.login", [], "FOSUserBundle"), "html", null, true);
            echo "</a>
                        ";
        }
        // line 57
        echo "
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class=\"navigation\">
        <div class=\"container-fluid\">
            <div class=\"navigation__column left\">
                <div class=\"header__logo\"><a class=\"ps-logo\" href=\"index.html\"><img src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("back/images/logo2.png"), "html", null, true);
        echo "\" alt=\"\"></a></div>
            </div>
            <div class=\"navigation__column center\">
                <ul class=\"main-menu menu\">
                    </li>
                    <li class=\"menu-item menu-item-has-children has-mega-menu\"><a href=\"#\">Boutique</a>
                        <div class=\"mega-menu\">
                            <div class=\"mega-wrap\">
                                <div class=\"mega-column\">
                                    <ul class=\"mega-item mega-features\">
                                        <li><a href=\"product-listing.html\">NEW RELEASES</a></li>
                                        <li><a href=\"product-listing.html\">FEATURES SHOES</a></li>
                                        <li><a href=\"product-listing.html\">BEST SELLERS</a></li>
                                        <li><a href=\"product-listing.html\">NOW TRENDING</a></li>
                                        <li><a href=\"product-listing.html\">SUMMER ESSENTIALS</a></li>
                                        <li><a href=\"product-listing.html\">MOTHER'S DAY COLLECTION</a></li>
                                        <li><a href=\"product-listing.html\">FAN GEAR</a></li>
                                    </ul>
                                </div>
                                <div class=\"mega-column\">
                                    <h4 class=\"mega-heading\">Shoes</h4>
                                    <ul class=\"mega-item\">
                                        <li><a href=\"product-listing.html\">All Shoes</a></li>
                                        <li><a href=\"product-listing.html\">Running</a></li>
                                        <li><a href=\"product-listing.html\">Training & Gym</a></li>
                                        <li><a href=\"product-listing.html\">Basketball</a></li>
                                        <li><a href=\"product-listing.html\">Football</a></li>
                                        <li><a href=\"product-listing.html\">Soccer</a></li>
                                        <li><a href=\"product-listing.html\">Baseball</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class=\"menu-item\"><a href=\"#\">Location</a></li>
                    <li class=\"menu-item\"><a href=\"#\">Club</a></li>

                    <li class=\"menu-item menu-item-has-children dropdown\"><a href=\"";
        // line 103
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("event_liste");
        echo "\">Evenement</a>
                        <ul class=\"sub-menu\">
                            ";
        // line 105
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? $this->getContext($context, "categories")));
        foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
            // line 106
            echo "                            <li class=\"menu-item\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("event_cat", ["id" => $this->getAttribute($context["categorie"], "id", [])]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["categorie"], "nomC", []), "html", null, true);
            echo "</a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        echo "                        </ul>
                    </li>

                    <li class=\"menu-item menu-item-has-children dropdown\"><a href=\"#\">Contact</a>
                        <ul class=\"sub-menu\">
                            <li class=\"menu-item\"><a href=\"contact-us.html\">Contact Us #1</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class=\"navigation__column right\">
                <form class=\"ps-search--header\" action=\"do_action\" method=\"post\">
                    <input class=\"form-control\" type=\"text\" placeholder=\"Search Product…\">
                    <button><i class=\"ps-icon-search\"></i></button>
                </form>
                <div class=\"ps-cart\"><a class=\"ps-cart__toggle\" href=\"#\"><span><i>20</i></span><i class=\"ps-icon-shopping-cart\"></i></a>
                    <div class=\"ps-cart__listing\">
                        <div class=\"ps-cart__content\">
                            <div class=\"ps-cart-item\"><a class=\"ps-cart-item__close\" href=\"#\"></a>
                                <div class=\"ps-cart-item__thumbnail\"><a href=\"product-detail.html\"></a><img src=\"images/cart-preview/1.jpg\" alt=\"\"></div>
                                <div class=\"ps-cart-item__content\"><a class=\"ps-cart-item__title\" href=\"product-detail.html\">Amazin’ Glazin’</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                            <div class=\"ps-cart-item\"><a class=\"ps-cart-item__close\" href=\"#\"></a>
                                <div class=\"ps-cart-item__thumbnail\"><a href=\"product-detail.html\"></a><img src=\"images/cart-preview/2.jpg\" alt=\"\"></div>
                                <div class=\"ps-cart-item__content\"><a class=\"ps-cart-item__title\" href=\"product-detail.html\">The Crusty Croissant</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                            <div class=\"ps-cart-item\"><a class=\"ps-cart-item__close\" href=\"#\"></a>
                                <div class=\"ps-cart-item__thumbnail\"><a href=\"product-detail.html\"></a><img src=\"images/cart-preview/3.jpg\" alt=\"\"></div>
                                <div class=\"ps-cart-item__content\"><a class=\"ps-cart-item__title\" href=\"product-detail.html\">The Rolling Pin</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class=\"ps-cart__total\">
                            <p>Number of items:<span>36</span></p>
                            <p>Item Total:<span>£528.00</span></p>
                        </div>
                        <div class=\"ps-cart__footer\"><a class=\"ps-btn\" href=\"cart.html\">Check out<i class=\"ps-icon-arrow-left\"></i></a></div>
                    </div>
                </div>
                <div class=\"menu-toggle\"><span></span></div>
            </div>
        </div>
    </nav>
</header>
";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "flashes", [0 => "success"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 158
            echo "    <div class=\"alert alert-success\">
        ";
            // line 159
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        echo "
<main class=\"ps-main\">
    <div class=\"ps-blog-grid pt-80 pb-80\">
        <div class=\"ps-container\">
            <div class=\"row\">
                <div class=\"col-lg-9 col-md-9 col-sm-12 col-xs-12 \">
                    ";
        // line 168
        $this->displayBlock('content', $context, $blocks);
        // line 172
        echo "                    <div class=\"mt-30\">
                        <div class=\"ps-pagination\">
                            <ul class=\"pagination\">
                                <li><a href=\"#\"><i class=\"fa fa-angle-left\"></i></a></li>
                                <li class=\"active\"><a href=\"#\">1</a></li>
                                <li><a href=\"#\">2</a></li>
                                <li><a href=\"#\">3</a></li>
                                <li><a href=\"#\">...</a></li>
                                <li><a href=\"#\"><i class=\"fa fa-angle-right\"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-3 col-sm-12 col-xs-12 \">
                    <aside class=\"ps-widget--sidebar ps-widget--search\">
                        <form class=\"ps-search--widget\" action=\"do_action\" method=\"post\">
                            <input class=\"form-control\" type=\"text\" placeholder=\"Search posts...\">
                            <button><i class=\"ps-icon-search\"></i></button>
                        </form>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Archive</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <ul class=\"ps-list--arrow\">
                                <li class=\"current\"><a href=\"product-listing.html\">Sky(321)</a></li>
                                <li><a href=\"product-listing.html\">Amazin’ Glazin’</a></li>
                                <li><a href=\"product-listing.html\">The Crusty Croissant</a></li>
                                <li><a href=\"product-listing.html\">The Rolling Pin</a></li>
                                <li><a href=\"product-listing.html\">Skippity Scones</a></li>
                                <li><a href=\"product-listing.html\">Mad Batter</a></li>
                                <li><a href=\"product-listing.html\">Confection Connection</a></li>
                            </ul>
                        </div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Ads Banner</h3>
                        </div>
                        <div class=\"ps-widget__content\"><a href=\"product-listing\"><img src=\"images/offer/sidebar.jpg\" alt=\"\"></a></div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Recent Posts</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <div class=\"ps-post--sidebar\">
                                <div class=\"ps-post__thumbnail\"><a href=\"#\"></a><img src=\"images/blog/sidebar/1.jpg\" alt=\"\"></div>
                                <div class=\"ps-post__content\"><a class=\"ps-post__title\" href=\"#\">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                            </div>
                            <div class=\"ps-post--sidebar\">
                                <div class=\"ps-post__thumbnail\"><a href=\"#\"></a><img src=\"images/blog/sidebar/2.jpg\" alt=\"\"></div>
                                <div class=\"ps-post__content\"><a class=\"ps-post__title\" href=\"#\">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                            </div>
                            <div class=\"ps-post--sidebar\">
                                <div class=\"ps-post__thumbnail\"><a href=\"#\"></a><img src=\"images/blog/sidebar/3.jpg\" alt=\"\"></div>
                                <div class=\"ps-post__content\"><a class=\"ps-post__title\" href=\"#\">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                            </div>
                        </div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Best Seller</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <div class=\"ps-shoe--sidebar\">
                                <div class=\"ps-shoe__thumbnail\"><a href=\"#\"></a><img src=\"images/shoe/sidebar/1.jpg\" alt=\"\"></div>
                                <div class=\"ps-shoe__content\"><a class=\"ps-shoe__title\" href=\"#\">Men's Sky</a>
                                    <p><del> £253.00</del> £152.00</p><a class=\"ps-btn\" href=\"#\">PURCHASE</a>
                                </div>
                            </div>
                            <div class=\"ps-shoe--sidebar\">
                                <div class=\"ps-shoe__thumbnail\"><a href=\"#\"></a><img src=\"images/shoe/sidebar/2.jpg\" alt=\"\"></div>
                                <div class=\"ps-shoe__content\"><a class=\"ps-shoe__title\" href=\"#\">Nike Flight Bonafide</a>
                                    <p><del> £253.00</del> £152.00</p><a class=\"ps-btn\" href=\"#\">PURCHASE</a>
                                </div>
                            </div>
                            <div class=\"ps-shoe--sidebar\">
                                <div class=\"ps-shoe__thumbnail\"><a href=\"#\"></a><img src=\"images/shoe/sidebar/3.jpg\" alt=\"\"></div>
                                <div class=\"ps-shoe__content\"><a class=\"ps-shoe__title\" href=\"#\">Nike Sock Dart QS</a>
                                    <p><del> £253.00</del> £152.00</p><a class=\"ps-btn\" href=\"#\">PURCHASE</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Tags</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <ul class=\"ps-tags\">
                                <li><a href=\"product-listing.html\">Men</a></li>
                                <li><a href=\"product-listing.html\">Female</a></li>
                                <li><a href=\"product-listing.html\">B&G</a></li>
                                <li><a href=\"product-listing.html\">ugly fashion</a></li>
                                <li><a href=\"product-listing.html\">Nike</a></li>
                                <li><a href=\"product-listing.html\">Dior</a></li>
                                <li><a href=\"product-listing.html\">Adidas</a></li>
                                <li><a href=\"product-listing.html\">Diour</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class=\"ps-subscribe\">
        <div class=\"ps-container\">
            <div class=\"row\">
                <div class=\"col-lg-3 col-md-12 col-sm-12 col-xs-12 \">
                    <h3><i class=\"fa fa-envelope\"></i>Sign up to Newsletter</h3>
                </div>
                <div class=\"col-lg-5 col-md-7 col-sm-12 col-xs-12 \">
                    <form class=\"ps-subscribe__form\" action=\"do_action\" method=\"post\">
                        <input class=\"form-control\" type=\"text\" placeholder=\"\">
                        <button>Sign up now</button>
                    </form>
                </div>
                <div class=\"col-lg-4 col-md-5 col-sm-12 col-xs-12 \">
                    <p>...and receive  <span>\$20</span>  coupon for first shopping.</p>
                </div>
            </div>
        </div>
    </div>
    <div class=\"ps-footer bg--cover\" data-background=\"images/background/parallax.jpg\">
        <div class=\"ps-footer__content\">
            <div class=\"ps-container\">
                <div class=\"row\">
                    <div class=\"col-lg-3 col-md-3 col-sm-12 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--info\">
                            <header><a class=\"ps-logo\" href=\"index.html\"><img src=\"images/logo-white.png\" alt=\"\"></a>
                                <h3 class=\"ps-widget__title\">Address Office 1</h3>
                            </header>
                            <footer>
                                <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-3 col-md-3 col-sm-12 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--info second\">
                            <header>
                                <h3 class=\"ps-widget__title\">Address Office 2</h3>
                            </header>
                            <footer>
                                <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--link\">
                            <header>
                                <h3 class=\"ps-widget__title\">Find Our store</h3>
                            </header>
                            <footer>
                                <ul class=\"ps-list--link\">
                                    <li><a href=\"#\">Coupon Code</a></li>
                                    <li><a href=\"#\">SignUp For Email</a></li>
                                    <li><a href=\"#\">Site Feedback</a></li>
                                    <li><a href=\"#\">Careers</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--link\">
                            <header>
                                <h3 class=\"ps-widget__title\">Get Help</h3>
                            </header>
                            <footer>
                                <ul class=\"ps-list--line\">
                                    <li><a href=\"#\">Order Status</a></li>
                                    <li><a href=\"#\">Shipping and Delivery</a></li>
                                    <li><a href=\"#\">Returns</a></li>
                                    <li><a href=\"#\">Payment Options</a></li>
                                    <li><a href=\"#\">Contact Us</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--link\">
                            <header>
                                <h3 class=\"ps-widget__title\">Products</h3>
                            </header>
                            <footer>
                                <ul class=\"ps-list--line\">
                                    <li><a href=\"#\">Shoes</a></li>
                                    <li><a href=\"#\">Clothing</a></li>
                                    <li><a href=\"#\">Accessries</a></li>
                                    <li><a href=\"#\">Football Boots</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"ps-footer__copyright\">
            <div class=\"ps-container\">
                <div class=\"row\">
                    <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 \">
                        <p>&copy; <a href=\"#\">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href=\"#\"> Alena Studio</a></p>
                    </div>
                    <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 \">
                        <ul class=\"ps-social\">
                            <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fa fa-google-plus\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fa fa-instagram\"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
";
        // line 395
        $this->displayBlock('javascripts', $context, $blocks);
        // line 429
        echo "</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 17
    public function block_title($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Baskel - Event";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 19
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 20
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/font-awesome/css/font-awesome.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/ps-icon/style.css"), "html", null, true);
        echo "\">
        <!-- CSS Library-->
        <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/owl-carousel/assets/owl.carousel.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/slick/slick/slick.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/bootstrap-select/dist/css/bootstrap-select.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/Magnific-Popup/dist/magnific-popup.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/jquery-ui/jquery-ui.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/css/settings.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/css/layers.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/css/navigation.css"), "html", null, true);
        echo "\">
        <!-- Custom-->
        <link rel=\"stylesheet\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\">

    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 168
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 169
        echo "

                    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 395
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 396
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/jquery/dist/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 397
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/bootstrap/dist/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 398
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/jquery-bar-rating/dist/jquery.barrating.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 399
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/owl-carousel/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 400
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/gmap3.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 401
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/imagesloaded.pkgd.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 402
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/isotope.pkgd.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 403
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/bootstrap-select/dist/js/bootstrap-select.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 404
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/jquery.matchHeight-min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 405
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/slick/slick/slick.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 406
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/elevatezoom/jquery.elevatezoom.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 407
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 408
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/jquery-ui/jquery-ui.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 409
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 410
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/jquery.themepunch.tools.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 411
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/jquery.themepunch.revolution.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 412
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/extensions/revolution.extension.video.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 413
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 414
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 415
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/extensions/revolution.extension.navigation.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 416
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/extensions/revolution.extension.parallax.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 417
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("plugins/revolution/js/extensions/revolution.extension.actions.min.js"), "html", null, true);
        echo "\"></script>
    <!-- Custom scripts-->
    <script type=\"text/javascript\" src=\"";
        // line 419
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/main.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 420
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("user-card.component.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 421
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("meteo-widget.component.js"), "html", null, true);
        echo "\"></script>
    <script>
        // Nous souhaitons intéragir avec le <user-card> :)
        document.querySelector('user-card').addEventListener('image-click', (event) => {
            console.log(\"L'image a été clickée\", event);
        })
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "baseFront.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  711 => 421,  707 => 420,  703 => 419,  698 => 417,  694 => 416,  690 => 415,  686 => 414,  682 => 413,  678 => 412,  674 => 411,  670 => 410,  666 => 409,  662 => 408,  658 => 407,  654 => 406,  650 => 405,  646 => 404,  642 => 403,  638 => 402,  634 => 401,  630 => 400,  626 => 399,  622 => 398,  618 => 397,  613 => 396,  604 => 395,  592 => 169,  583 => 168,  570 => 34,  565 => 32,  561 => 31,  557 => 30,  553 => 29,  549 => 28,  545 => 27,  541 => 26,  537 => 25,  533 => 24,  529 => 23,  524 => 21,  519 => 20,  510 => 19,  492 => 17,  481 => 429,  479 => 395,  254 => 172,  252 => 168,  244 => 162,  235 => 159,  232 => 158,  228 => 157,  177 => 108,  166 => 106,  162 => 105,  157 => 103,  117 => 66,  106 => 57,  98 => 55,  91 => 53,  87 => 52,  82 => 51,  80 => 50,  65 => 37,  63 => 19,  58 => 17,  40 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<!--[if IE 7]><html class=\"ie ie7\"><![endif]-->
<!--[if IE 8]><html class=\"ie ie8\"><![endif]-->
<!--[if IE 9]><html class=\"ie ie9\"><![endif]-->
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"format-detection\" content=\"telephone=no\">
    <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
    <link href=\"apple-touch-icon.png\" rel=\"apple-touch-icon\">
    <link href=\"favicon.png\" rel=\"icon\">
    <meta name=\"author\" content=\"Nghia Minh Luong\">
    <meta name=\"keywords\" content=\"Default Description\">
    <meta name=\"description\" content=\"Default keyword\">
    <title>{% block title %}Baskel - Event{% endblock %} </title>
    <link href=\"https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900\" rel=\"stylesheet\">
    {% block stylesheets %}
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/ps-icon/style.css') }}\">
        <!-- CSS Library-->
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/owl-carousel/assets/owl.carousel.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/slick/slick/slick.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/Magnific-Popup/dist/magnific-popup.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/revolution/css/settings.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/revolution/css/layers.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('plugins/revolution/css/navigation.css') }}\">
        <!-- Custom-->
        <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">

    {% endblock %}

</head>
<body class=\"ps-loading\">
<div class=\"header--sidebar\"></div>
<header class=\"header\">
    <div class=\"header__top\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-lg-6 col-md-8 col-sm-6 col-xs-12 \">
                    <p>
                        Les berges du Lac 2020 Tunis  -  Infoline: +216 50-790-004 / +216 25-102-490</p>
                </div>
                <div class=\"col-lg-6 col-md-4 col-sm-6 col-xs-12 \">
                    <div class=\"header__actions\">                        {% if is_granted(\"IS_AUTHENTICATED_REMEMBERED\") %}
                            <a href=\"{{ path('fos_user_security_logout') }}\">
                                {{ 'layout.logout'|trans({}, 'FOSUserBundle') }}
                            </a><a href=\"{{ path('fos_user_profile_show') }}\">{{ app.user.username }}</a>
                        {% else %}
                            <a href=\"{{ path('fos_user_security_login') }}\">{{ 'layout.login'|trans({}, 'FOSUserBundle') }}</a>
                        {% endif %}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class=\"navigation\">
        <div class=\"container-fluid\">
            <div class=\"navigation__column left\">
                <div class=\"header__logo\"><a class=\"ps-logo\" href=\"index.html\"><img src=\"{{ asset('back/images/logo2.png') }}\" alt=\"\"></a></div>
            </div>
            <div class=\"navigation__column center\">
                <ul class=\"main-menu menu\">
                    </li>
                    <li class=\"menu-item menu-item-has-children has-mega-menu\"><a href=\"#\">Boutique</a>
                        <div class=\"mega-menu\">
                            <div class=\"mega-wrap\">
                                <div class=\"mega-column\">
                                    <ul class=\"mega-item mega-features\">
                                        <li><a href=\"product-listing.html\">NEW RELEASES</a></li>
                                        <li><a href=\"product-listing.html\">FEATURES SHOES</a></li>
                                        <li><a href=\"product-listing.html\">BEST SELLERS</a></li>
                                        <li><a href=\"product-listing.html\">NOW TRENDING</a></li>
                                        <li><a href=\"product-listing.html\">SUMMER ESSENTIALS</a></li>
                                        <li><a href=\"product-listing.html\">MOTHER'S DAY COLLECTION</a></li>
                                        <li><a href=\"product-listing.html\">FAN GEAR</a></li>
                                    </ul>
                                </div>
                                <div class=\"mega-column\">
                                    <h4 class=\"mega-heading\">Shoes</h4>
                                    <ul class=\"mega-item\">
                                        <li><a href=\"product-listing.html\">All Shoes</a></li>
                                        <li><a href=\"product-listing.html\">Running</a></li>
                                        <li><a href=\"product-listing.html\">Training & Gym</a></li>
                                        <li><a href=\"product-listing.html\">Basketball</a></li>
                                        <li><a href=\"product-listing.html\">Football</a></li>
                                        <li><a href=\"product-listing.html\">Soccer</a></li>
                                        <li><a href=\"product-listing.html\">Baseball</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class=\"menu-item\"><a href=\"#\">Location</a></li>
                    <li class=\"menu-item\"><a href=\"#\">Club</a></li>

                    <li class=\"menu-item menu-item-has-children dropdown\"><a href=\"{{ path('event_liste')}}\">Evenement</a>
                        <ul class=\"sub-menu\">
                            {% for categorie in categories %}
                            <li class=\"menu-item\"><a href=\"{{ path('event_cat', { 'id': categorie.id }) }}\">{{ categorie.nomC }}</a></li>
                            {% endfor %}
                        </ul>
                    </li>

                    <li class=\"menu-item menu-item-has-children dropdown\"><a href=\"#\">Contact</a>
                        <ul class=\"sub-menu\">
                            <li class=\"menu-item\"><a href=\"contact-us.html\">Contact Us #1</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class=\"navigation__column right\">
                <form class=\"ps-search--header\" action=\"do_action\" method=\"post\">
                    <input class=\"form-control\" type=\"text\" placeholder=\"Search Product…\">
                    <button><i class=\"ps-icon-search\"></i></button>
                </form>
                <div class=\"ps-cart\"><a class=\"ps-cart__toggle\" href=\"#\"><span><i>20</i></span><i class=\"ps-icon-shopping-cart\"></i></a>
                    <div class=\"ps-cart__listing\">
                        <div class=\"ps-cart__content\">
                            <div class=\"ps-cart-item\"><a class=\"ps-cart-item__close\" href=\"#\"></a>
                                <div class=\"ps-cart-item__thumbnail\"><a href=\"product-detail.html\"></a><img src=\"images/cart-preview/1.jpg\" alt=\"\"></div>
                                <div class=\"ps-cart-item__content\"><a class=\"ps-cart-item__title\" href=\"product-detail.html\">Amazin’ Glazin’</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                            <div class=\"ps-cart-item\"><a class=\"ps-cart-item__close\" href=\"#\"></a>
                                <div class=\"ps-cart-item__thumbnail\"><a href=\"product-detail.html\"></a><img src=\"images/cart-preview/2.jpg\" alt=\"\"></div>
                                <div class=\"ps-cart-item__content\"><a class=\"ps-cart-item__title\" href=\"product-detail.html\">The Crusty Croissant</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                            <div class=\"ps-cart-item\"><a class=\"ps-cart-item__close\" href=\"#\"></a>
                                <div class=\"ps-cart-item__thumbnail\"><a href=\"product-detail.html\"></a><img src=\"images/cart-preview/3.jpg\" alt=\"\"></div>
                                <div class=\"ps-cart-item__content\"><a class=\"ps-cart-item__title\" href=\"product-detail.html\">The Rolling Pin</a>
                                    <p><span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span></p>
                                </div>
                            </div>
                        </div>
                        <div class=\"ps-cart__total\">
                            <p>Number of items:<span>36</span></p>
                            <p>Item Total:<span>£528.00</span></p>
                        </div>
                        <div class=\"ps-cart__footer\"><a class=\"ps-btn\" href=\"cart.html\">Check out<i class=\"ps-icon-arrow-left\"></i></a></div>
                    </div>
                </div>
                <div class=\"menu-toggle\"><span></span></div>
            </div>
        </div>
    </nav>
</header>
{% for message in app.flashes('success') %}
    <div class=\"alert alert-success\">
        {{ message }}
    </div>
{% endfor %}

<main class=\"ps-main\">
    <div class=\"ps-blog-grid pt-80 pb-80\">
        <div class=\"ps-container\">
            <div class=\"row\">
                <div class=\"col-lg-9 col-md-9 col-sm-12 col-xs-12 \">
                    {% block content %}


                    {% endblock %}
                    <div class=\"mt-30\">
                        <div class=\"ps-pagination\">
                            <ul class=\"pagination\">
                                <li><a href=\"#\"><i class=\"fa fa-angle-left\"></i></a></li>
                                <li class=\"active\"><a href=\"#\">1</a></li>
                                <li><a href=\"#\">2</a></li>
                                <li><a href=\"#\">3</a></li>
                                <li><a href=\"#\">...</a></li>
                                <li><a href=\"#\"><i class=\"fa fa-angle-right\"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-3 col-sm-12 col-xs-12 \">
                    <aside class=\"ps-widget--sidebar ps-widget--search\">
                        <form class=\"ps-search--widget\" action=\"do_action\" method=\"post\">
                            <input class=\"form-control\" type=\"text\" placeholder=\"Search posts...\">
                            <button><i class=\"ps-icon-search\"></i></button>
                        </form>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Archive</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <ul class=\"ps-list--arrow\">
                                <li class=\"current\"><a href=\"product-listing.html\">Sky(321)</a></li>
                                <li><a href=\"product-listing.html\">Amazin’ Glazin’</a></li>
                                <li><a href=\"product-listing.html\">The Crusty Croissant</a></li>
                                <li><a href=\"product-listing.html\">The Rolling Pin</a></li>
                                <li><a href=\"product-listing.html\">Skippity Scones</a></li>
                                <li><a href=\"product-listing.html\">Mad Batter</a></li>
                                <li><a href=\"product-listing.html\">Confection Connection</a></li>
                            </ul>
                        </div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Ads Banner</h3>
                        </div>
                        <div class=\"ps-widget__content\"><a href=\"product-listing\"><img src=\"images/offer/sidebar.jpg\" alt=\"\"></a></div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Recent Posts</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <div class=\"ps-post--sidebar\">
                                <div class=\"ps-post__thumbnail\"><a href=\"#\"></a><img src=\"images/blog/sidebar/1.jpg\" alt=\"\"></div>
                                <div class=\"ps-post__content\"><a class=\"ps-post__title\" href=\"#\">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                            </div>
                            <div class=\"ps-post--sidebar\">
                                <div class=\"ps-post__thumbnail\"><a href=\"#\"></a><img src=\"images/blog/sidebar/2.jpg\" alt=\"\"></div>
                                <div class=\"ps-post__content\"><a class=\"ps-post__title\" href=\"#\">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                            </div>
                            <div class=\"ps-post--sidebar\">
                                <div class=\"ps-post__thumbnail\"><a href=\"#\"></a><img src=\"images/blog/sidebar/3.jpg\" alt=\"\"></div>
                                <div class=\"ps-post__content\"><a class=\"ps-post__title\" href=\"#\">Micenas Placerat Nibh Loreming Fentum</a><span>SEP 29, 2017</span></div>
                            </div>
                        </div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Best Seller</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <div class=\"ps-shoe--sidebar\">
                                <div class=\"ps-shoe__thumbnail\"><a href=\"#\"></a><img src=\"images/shoe/sidebar/1.jpg\" alt=\"\"></div>
                                <div class=\"ps-shoe__content\"><a class=\"ps-shoe__title\" href=\"#\">Men's Sky</a>
                                    <p><del> £253.00</del> £152.00</p><a class=\"ps-btn\" href=\"#\">PURCHASE</a>
                                </div>
                            </div>
                            <div class=\"ps-shoe--sidebar\">
                                <div class=\"ps-shoe__thumbnail\"><a href=\"#\"></a><img src=\"images/shoe/sidebar/2.jpg\" alt=\"\"></div>
                                <div class=\"ps-shoe__content\"><a class=\"ps-shoe__title\" href=\"#\">Nike Flight Bonafide</a>
                                    <p><del> £253.00</del> £152.00</p><a class=\"ps-btn\" href=\"#\">PURCHASE</a>
                                </div>
                            </div>
                            <div class=\"ps-shoe--sidebar\">
                                <div class=\"ps-shoe__thumbnail\"><a href=\"#\"></a><img src=\"images/shoe/sidebar/3.jpg\" alt=\"\"></div>
                                <div class=\"ps-shoe__content\"><a class=\"ps-shoe__title\" href=\"#\">Nike Sock Dart QS</a>
                                    <p><del> £253.00</del> £152.00</p><a class=\"ps-btn\" href=\"#\">PURCHASE</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class=\"ps-widget--sidebar\">
                        <div class=\"ps-widget__header\">
                            <h3>Tags</h3>
                        </div>
                        <div class=\"ps-widget__content\">
                            <ul class=\"ps-tags\">
                                <li><a href=\"product-listing.html\">Men</a></li>
                                <li><a href=\"product-listing.html\">Female</a></li>
                                <li><a href=\"product-listing.html\">B&G</a></li>
                                <li><a href=\"product-listing.html\">ugly fashion</a></li>
                                <li><a href=\"product-listing.html\">Nike</a></li>
                                <li><a href=\"product-listing.html\">Dior</a></li>
                                <li><a href=\"product-listing.html\">Adidas</a></li>
                                <li><a href=\"product-listing.html\">Diour</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class=\"ps-subscribe\">
        <div class=\"ps-container\">
            <div class=\"row\">
                <div class=\"col-lg-3 col-md-12 col-sm-12 col-xs-12 \">
                    <h3><i class=\"fa fa-envelope\"></i>Sign up to Newsletter</h3>
                </div>
                <div class=\"col-lg-5 col-md-7 col-sm-12 col-xs-12 \">
                    <form class=\"ps-subscribe__form\" action=\"do_action\" method=\"post\">
                        <input class=\"form-control\" type=\"text\" placeholder=\"\">
                        <button>Sign up now</button>
                    </form>
                </div>
                <div class=\"col-lg-4 col-md-5 col-sm-12 col-xs-12 \">
                    <p>...and receive  <span>\$20</span>  coupon for first shopping.</p>
                </div>
            </div>
        </div>
    </div>
    <div class=\"ps-footer bg--cover\" data-background=\"images/background/parallax.jpg\">
        <div class=\"ps-footer__content\">
            <div class=\"ps-container\">
                <div class=\"row\">
                    <div class=\"col-lg-3 col-md-3 col-sm-12 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--info\">
                            <header><a class=\"ps-logo\" href=\"index.html\"><img src=\"images/logo-white.png\" alt=\"\"></a>
                                <h3 class=\"ps-widget__title\">Address Office 1</h3>
                            </header>
                            <footer>
                                <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-3 col-md-3 col-sm-12 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--info second\">
                            <header>
                                <h3 class=\"ps-widget__title\">Address Office 2</h3>
                            </header>
                            <footer>
                                <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--link\">
                            <header>
                                <h3 class=\"ps-widget__title\">Find Our store</h3>
                            </header>
                            <footer>
                                <ul class=\"ps-list--link\">
                                    <li><a href=\"#\">Coupon Code</a></li>
                                    <li><a href=\"#\">SignUp For Email</a></li>
                                    <li><a href=\"#\">Site Feedback</a></li>
                                    <li><a href=\"#\">Careers</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--link\">
                            <header>
                                <h3 class=\"ps-widget__title\">Get Help</h3>
                            </header>
                            <footer>
                                <ul class=\"ps-list--line\">
                                    <li><a href=\"#\">Order Status</a></li>
                                    <li><a href=\"#\">Shipping and Delivery</a></li>
                                    <li><a href=\"#\">Returns</a></li>
                                    <li><a href=\"#\">Payment Options</a></li>
                                    <li><a href=\"#\">Contact Us</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <div class=\"col-lg-2 col-md-2 col-sm-4 col-xs-12 \">
                        <aside class=\"ps-widget--footer ps-widget--link\">
                            <header>
                                <h3 class=\"ps-widget__title\">Products</h3>
                            </header>
                            <footer>
                                <ul class=\"ps-list--line\">
                                    <li><a href=\"#\">Shoes</a></li>
                                    <li><a href=\"#\">Clothing</a></li>
                                    <li><a href=\"#\">Accessries</a></li>
                                    <li><a href=\"#\">Football Boots</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"ps-footer__copyright\">
            <div class=\"ps-container\">
                <div class=\"row\">
                    <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 \">
                        <p>&copy; <a href=\"#\">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href=\"#\"> Alena Studio</a></p>
                    </div>
                    <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 \">
                        <ul class=\"ps-social\">
                            <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fa fa-google-plus\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fa fa-instagram\"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{% block javascripts %}
    <script type=\"text/javascript\" src=\"{{ asset('plugins/jquery/dist/jquery.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/gmap3.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/imagesloaded.pkgd.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/isotope.pkgd.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/jquery.matchHeight-min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/slick/slick/slick.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}\"></script>
    <script type=\"text/javascript\" src=\"{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}\"></script>
    <!-- Custom scripts-->
    <script type=\"text/javascript\" src=\"{{ asset('js/main.js') }}\"></script>
    <script src=\"{{ asset('user-card.component.js') }}\"></script>
    <script src=\"{{ asset('meteo-widget.component.js') }}\"></script>
    <script>
        // Nous souhaitons intéragir avec le <user-card> :)
        document.querySelector('user-card').addEventListener('image-click', (event) => {
            console.log(\"L'image a été clickée\", event);
        })
    </script>
{% endblock %}
</body>
</html>", "baseFront.html.twig", "C:\\wamp64\\www\\baskeltt\\app\\Resources\\views\\baseFront.html.twig");
    }
}
