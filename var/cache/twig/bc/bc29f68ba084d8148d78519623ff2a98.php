<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* pages/blog-index.html.twig */
class __TwigTemplate_abdd06d6ca563581616b1b138f657f92 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'styles' => [$this, 'block_styles'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    <meta name=\"description\" content=\"Blog posts about modern PHP development, architecture, and best practices\">
    <meta name=\"keywords\" content=\"PHP, development, blog, programming, architecture\">
    <meta property=\"og:title\" content=\"Blog | ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "name", [], "any", false, false, false, 6), "html", null, true);
        yield "\">
    <meta property=\"og:description\" content=\"Blog posts about modern PHP development\">
    <meta property=\"og:type\" content=\"website\">
";
        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 12
        yield "<!-- Main -->
<section id=\"main\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-8 col-12-medium\">
                <!-- Main Content -->
                <article class=\"box post\">
                    <header>
                        <h2>Blog</h2>
                        <p>Insights into modern PHP development, architecture, and best practices</p>
                    </header>
                    
                    ";
        // line 24
        if ((($tmp = ($context["blog_posts"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "                        <p><strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["blog_posts"] ?? null)), "html", null, true);
            yield " posts available</strong></p>
                        
                        ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["blog_posts"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 28
                yield "                            <section class=\"box\">
                                <a href=\"blog.php?post=";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "post", [], "any", false, false, false, 29), "html", null, true);
                yield "\" class=\"image featured\">
                                    <img src=\"images/pic0";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 30) % 10) + 1), "html", null, true);
                yield ".jpg\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 30), "html", null, true);
                yield "\" />
                                </a>
                                <header>
                                    <h3><a href=\"blog.php?post=";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "post", [], "any", false, false, false, 33), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 33), "html", null, true);
                yield "</a></h3>
                                    <p class=\"post-meta\">
                                        ";
                // line 35
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "published", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 36
                    yield "                                            <time datetime=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "published", [], "any", false, false, false, 36), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "published", [], "any", false, false, false, 36), "html", null, true);
                    yield "</time>
                                        ";
                }
                // line 38
                yield "                                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 39
                    yield "                                            by ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 39), "html", null, true);
                    yield "
                                        ";
                }
                // line 41
                yield "                                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "readingTime", [], "any", false, false, false, 41)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 42
                    yield "                                            • ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "readingTime", [], "any", false, false, false, 42), "html", null, true);
                    yield "
                                        ";
                }
                // line 44
                yield "                                    </p>
                                </header>
                                <p>";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "description", [], "any", false, false, false, 46), 0, 200), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["post"], "description", [], "any", false, false, false, 46)) > 200)) {
                    yield "...";
                }
                yield "</p>
                                
                                ";
                // line 48
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tags", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 49
                    yield "                                    <div class=\"post-tags\">
                                        ";
                    // line 50
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "tags", [], "any", false, false, false, 50));
                    foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                        // line 51
                        yield "                                            <span class=\"tag\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["tag"], "html", null, true);
                        yield "</span>
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 53
                    yield "                                    </div>
                                ";
                }
                // line 55
                yield "                                
                                <footer>
                                    <ul class=\"actions\">
                                        <li><a href=\"blog.php?post=";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "post", [], "any", false, false, false, 58), "html", null, true);
                yield "\" class=\"button alt\">Read More</a></li>
                                    </ul>
                                </footer>
                            </section>
                        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            yield "                    ";
        } else {
            // line 64
            yield "                        <section class=\"box\">
                            <header>
                                <h3>No Posts Available</h3>
                            </header>
                            <p>There are currently no blog posts available. Check back soon for new content!</p>
                        </section>
                    ";
        }
        // line 71
        yield "                </article>
            </div>
            <div class=\"col-4 col-12-medium\">
                <!-- Sidebar Content -->
                <section class=\"box\">
                    <a href=\"#\" class=\"image featured\"><img src=\"images/pic02.png\" alt=\"\" /></a>
                    <header><h3>Development Journey</h3></header>
                    <p>Follow along as we explore modern PHP development practices, from legacy migrations to cutting-edge architectures.</p>
                    <footer><a href=\"#\" class=\"button alt\">Learn More</a></footer>
                </section>
                <section class=\"box\">
                    <header><h3>Categories</h3></header>
                    <ul class=\"divided\">
                        <li><a href=\"#\">Development</a></li>
                        <li><a href=\"#\">Architecture</a></li>
                        <li><a href=\"#\">Best Practices</a></li>
                        <li><a href=\"#\">Migration</a></li>
                        <li><a href=\"#\">Innovation</a></li>
                    </ul>
                </section>
                <section class=\"box\">
                    <header><h3>Recent Posts</h3></header>
                    ";
        // line 93
        if ((($tmp = ($context["blog_posts"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 94
            yield "                        <ul class=\"divided\">
                            ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ($context["blog_posts"] ?? null), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 96
                yield "                                <li><a href=\"blog.php?post=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "post", [], "any", false, false, false, 96), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 96), "html", null, true);
                yield "</a></li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            yield "                        </ul>
                    ";
        }
        // line 100
        yield "                </section>
            </div>
        </div>
    </div>
</section>
";
        yield from [];
    }

    // line 107
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 108
        yield "<style>
.post-meta {
    color: #666;
    font-size: 0.9em;
    margin-bottom: 1em;
}

.post-tags {
    margin: 1em 0;
}

.tag {
    display: inline-block;
    background: #f0f0f0;
    color: #333;
    padding: 0.2em 0.6em;
    border-radius: 3px;
    font-size: 0.8em;
    margin-right: 0.5em;
    margin-bottom: 0.3em;
}

.box {
    transition: transform 0.2s ease;
}

.box:hover {
    transform: translateY(-2px);
}

.post-meta time {
    font-weight: bold;
}

@media screen and (max-width: 736px) {
    .post-meta {
        font-size: 0.8em;
    }
}
</style>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/blog-index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  304 => 108,  297 => 107,  287 => 100,  283 => 98,  272 => 96,  268 => 95,  265 => 94,  263 => 93,  239 => 71,  230 => 64,  227 => 63,  208 => 58,  203 => 55,  199 => 53,  190 => 51,  186 => 50,  183 => 49,  181 => 48,  173 => 46,  169 => 44,  163 => 42,  160 => 41,  154 => 39,  151 => 38,  143 => 36,  141 => 35,  134 => 33,  126 => 30,  122 => 29,  119 => 28,  102 => 27,  96 => 25,  94 => 24,  80 => 12,  73 => 11,  64 => 6,  60 => 4,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"layouts/base.html.twig\" %}

{% block head %}
    <meta name=\"description\" content=\"Blog posts about modern PHP development, architecture, and best practices\">
    <meta name=\"keywords\" content=\"PHP, development, blog, programming, architecture\">
    <meta property=\"og:title\" content=\"Blog | {{ site.name }}\">
    <meta property=\"og:description\" content=\"Blog posts about modern PHP development\">
    <meta property=\"og:type\" content=\"website\">
{% endblock %}

{% block content %}
<!-- Main -->
<section id=\"main\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-8 col-12-medium\">
                <!-- Main Content -->
                <article class=\"box post\">
                    <header>
                        <h2>Blog</h2>
                        <p>Insights into modern PHP development, architecture, and best practices</p>
                    </header>
                    
                    {% if blog_posts %}
                        <p><strong>{{ blog_posts|length }} posts available</strong></p>
                        
                        {% for post in blog_posts %}
                            <section class=\"box\">
                                <a href=\"blog.php?post={{ post.post }}\" class=\"image featured\">
                                    <img src=\"images/pic0{{ loop.index % 10 + 1 }}.jpg\" alt=\"{{ post.title }}\" />
                                </a>
                                <header>
                                    <h3><a href=\"blog.php?post={{ post.post }}\">{{ post.title }}</a></h3>
                                    <p class=\"post-meta\">
                                        {% if post.published %}
                                            <time datetime=\"{{ post.published }}\">{{ post.published }}</time>
                                        {% endif %}
                                        {% if post.author %}
                                            by {{ post.author }}
                                        {% endif %}
                                        {% if post.readingTime %}
                                            • {{ post.readingTime }}
                                        {% endif %}
                                    </p>
                                </header>
                                <p>{{ post.description|slice(0, 200) }}{% if post.description|length > 200 %}...{% endif %}</p>
                                
                                {% if post.tags %}
                                    <div class=\"post-tags\">
                                        {% for tag in post.tags %}
                                            <span class=\"tag\">{{ tag }}</span>
                                        {% endfor %}
                                    </div>
                                {% endif %}
                                
                                <footer>
                                    <ul class=\"actions\">
                                        <li><a href=\"blog.php?post={{ post.post }}\" class=\"button alt\">Read More</a></li>
                                    </ul>
                                </footer>
                            </section>
                        {% endfor %}
                    {% else %}
                        <section class=\"box\">
                            <header>
                                <h3>No Posts Available</h3>
                            </header>
                            <p>There are currently no blog posts available. Check back soon for new content!</p>
                        </section>
                    {% endif %}
                </article>
            </div>
            <div class=\"col-4 col-12-medium\">
                <!-- Sidebar Content -->
                <section class=\"box\">
                    <a href=\"#\" class=\"image featured\"><img src=\"images/pic02.png\" alt=\"\" /></a>
                    <header><h3>Development Journey</h3></header>
                    <p>Follow along as we explore modern PHP development practices, from legacy migrations to cutting-edge architectures.</p>
                    <footer><a href=\"#\" class=\"button alt\">Learn More</a></footer>
                </section>
                <section class=\"box\">
                    <header><h3>Categories</h3></header>
                    <ul class=\"divided\">
                        <li><a href=\"#\">Development</a></li>
                        <li><a href=\"#\">Architecture</a></li>
                        <li><a href=\"#\">Best Practices</a></li>
                        <li><a href=\"#\">Migration</a></li>
                        <li><a href=\"#\">Innovation</a></li>
                    </ul>
                </section>
                <section class=\"box\">
                    <header><h3>Recent Posts</h3></header>
                    {% if blog_posts %}
                        <ul class=\"divided\">
                            {% for post in blog_posts|slice(0, 5) %}
                                <li><a href=\"blog.php?post={{ post.post }}\">{{ post.title }}</a></li>
                            {% endfor %}
                        </ul>
                    {% endif %}
                </section>
            </div>
        </div>
    </div>
</section>
{% endblock %}

{% block styles %}
<style>
.post-meta {
    color: #666;
    font-size: 0.9em;
    margin-bottom: 1em;
}

.post-tags {
    margin: 1em 0;
}

.tag {
    display: inline-block;
    background: #f0f0f0;
    color: #333;
    padding: 0.2em 0.6em;
    border-radius: 3px;
    font-size: 0.8em;
    margin-right: 0.5em;
    margin-bottom: 0.3em;
}

.box {
    transition: transform 0.2s ease;
}

.box:hover {
    transform: translateY(-2px);
}

.post-meta time {
    font-weight: bold;
}

@media screen and (max-width: 736px) {
    .post-meta {
        font-size: 0.8em;
    }
}
</style>
{% endblock %}", "pages/blog-index.html.twig", "/var/www/html/templates/pages/blog-index.html.twig");
    }
}
