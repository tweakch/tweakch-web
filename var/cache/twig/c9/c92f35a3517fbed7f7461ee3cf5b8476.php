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

/* pages/blog-post.html.twig */
class __TwigTemplate_fa2800e1a6462ffcc4465a89c381b2c6 extends Template
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
            'page_meta' => [$this, 'block_page_meta'],
            'page_styles' => [$this, 'block_page_styles'],
            'main_content' => [$this, 'block_main_content'],
            'page_scripts' => [$this, 'block_page_scripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/flexible.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/flexible.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_meta(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "description", [], "any", false, false, false, 4)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<meta name=\"description\" content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "description", [], "any", false, false, false, 4), "html", null, true);
            yield "\" />";
        }
        // line 5
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["seo"] ?? null), "keywords", [], "any", false, false, false, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<meta name=\"keywords\" content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["seo"] ?? null), "keywords", [], "any", false, false, false, 5), "html", null, true);
            yield "\" />";
        }
        // line 6
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "author", [], "any", false, false, false, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<meta name=\"author\" content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "author", [], "any", false, false, false, 6), "html", null, true);
            yield "\" />";
        }
        // line 7
        yield "        ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "published", [], "any", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<meta name=\"article:published_time\" content=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "published", [], "any", false, false, false, 7), "html", null, true);
            yield "\" />";
        }
        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 11
        yield "    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css\" />
    <style>
        .blog-content h1,.blog-content h2,.blog-content h3,.blog-content h4,.blog-content h5,.blog-content h6{line-height:1.25}
        .blog-content h1:first-child{margin-top:0}
        pre{background:#0d1117;color:#e6edf3;padding:1.25rem 1.5rem;border-radius:8px;overflow:auto;margin:1.5rem 0;font-size:.9rem;line-height:1.5;position:relative}
        code{background:#f6f8fa;color:#24292f;padding:.15rem .4rem;border-radius:3px;font-size:.9em;font-family:Consolas,Monaco,'Courier New',monospace}
        pre code{background:transparent;padding:0;color:inherit}
        .code-block-container{position:relative}
        .copy-btn{position:absolute;top:8px;right:8px;background:#238636;color:#fff;border:none;padding:4px 8px;border-radius:4px;cursor:pointer;font-size:.7rem;opacity:.85;transition:opacity .2s ease}
        .copy-btn:hover{opacity:1;background:#2ea043}
        .copy-btn.copied{background:#1f883d}
        .table-of-contents{background:#f7fafc;padding:1.25rem 1.25rem;border-radius:6px;margin:1.75rem 0;border:1px solid #e2e8f0}
        .toc-list{list-style:none;margin:0;padding:0}
        .toc-list li{margin:.45rem 0}
        .toc-level-2{padding-left:0}.toc-level-3{padding-left:1rem}.toc-level-4{padding-left:2rem}.toc-level-5{padding-left:3rem}.toc-level-6{padding-left:4rem}
        .toc-link{color:#2d3748;text-decoration:none;display:block;padding:.2rem 0;border-radius:3px;transition:all .18s ease}
        .toc-link:hover{background:#e2e8f0;color:#1a365d;padding-left:.4rem}
        /* Metadata component styles */
        .meta-box-inline{padding:1.1rem 1.25rem}
        .meta-list{list-style:none;margin:0 0 .75rem;padding:0;font-size:.85rem}
        .meta-list li{margin:.35rem 0}
        .tag-list{list-style:none;margin:0;padding:0;display:flex;flex-wrap:wrap;gap:.4rem}
        .tag-item{background:#e2e8f0;color:#2d3748;padding:.3rem .55rem;border-radius:3px;font-size:.65rem;line-height:1;font-weight:500}
        .blog-navigation{margin-top:2rem;padding-top:1.75rem;border-top:1px solid #e2e8f0}
        .post-meta{color:#666;font-size:.8rem;margin:.35rem 0}
        @media (max-width:736px){.meta-box-inline{padding:1rem}.table-of-contents{padding:1rem}.copy-btn{position:static;display:block;margin:.5rem 0 0;width:auto}}
    </style>
";
        yield from [];
    }

    // line 41
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 42
        yield "    <article class=\"box post blog-content\">
        <a href=\"#\" class=\"image featured\"><img src=\"images/pic01.png\" alt=\"\"></a>
        <header>
            <h2>";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 45), "html", null, true);
        yield "</h2>
            <p>";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "subtitle", [], "any", false, false, false, 46), "html", null, true);
        yield "</p>
        </header>

        ";
        // line 50
        yield "        ";
        if ((($context["metadata_variant"] ?? null) == "inline")) {
            // line 51
            yield "            ";
            yield from $this->load("components/blog/_metadata.html.twig", 51)->unwrap()->yield(CoreExtension::merge($context, ["placement" => "inline"]));
            // line 52
            yield "        ";
        }
        // line 53
        yield "
        ";
        // line 55
        yield "        ";
        if ((($context["toc_variant"] ?? null) == "inline")) {
            // line 56
            yield "            ";
            yield from $this->load("components/blog/_toc.html.twig", 56)->unwrap()->yield(CoreExtension::merge($context, ["toc_html" => ($context["toc_html"] ?? null)]));
            // line 57
            yield "        ";
        }
        // line 58
        yield "
        <div class=\"blog-content\">";
        // line 59
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", false, false, false, 59);
        yield "</div>

        <div class=\"blog-navigation\">
            <div class=\"row\">
                <div class=\"col-6 col-12-small\"><a href=\"blog.php\" class=\"button\">&larr; Back to Blog</a></div>
                <div class=\"col-6 col-12-small\"><a href=\"#top\" class=\"button alt\">Back to Top &uarr;</a></div>
            </div>
        </div>

        ";
        // line 68
        if ((array_key_exists("relatedPosts", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["relatedPosts"] ?? null)) > 0))) {
            // line 69
            yield "            <div style=\"margin-top:2rem;padding-top:1.75rem;border-top:1px solid #e2e8f0;\">
                <h3>Related Posts</h3>
                <div class=\"row\">
                    ";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["relatedPosts"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["relatedPost"]) {
                // line 73
                yield "                        <div class=\"col-4 col-12-small\" style=\"margin-bottom:1rem;\">
                            <section class=\"box\">
                                <a href=\"blog.php?post=";
                // line 75
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "post", [], "any", false, false, false, 75), "html", null, true);
                yield "\" class=\"image featured\"><img src=\"images/pic0";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 75) % 10) + 1), "html", null, true);
                yield ".jpg\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "title", [], "any", false, false, false, 75), "html", null, true);
                yield "\" /></a>
                                <header><h4><a href=\"blog.php?post=";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "post", [], "any", false, false, false, 76), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "title", [], "any", false, false, false, 76), "html", null, true);
                yield "</a></h4><p class=\"post-meta\">";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "published", [], "any", false, false, false, 76)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<time datetime=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "published", [], "any", false, false, false, 76), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "published", [], "any", false, false, false, 76), "html", null, true);
                    yield "</time>";
                }
                yield "</p></header>
                                <footer><ul class=\"actions\"><li><a class=\"button alt\" href=\"blog.php?post=";
                // line 77
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["relatedPost"], "post", [], "any", false, false, false, 77), "html", null, true);
                yield "\">Read More</a></li></ul></footer>
                            </section>
                        </div>
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
            unset($context['_seq'], $context['_key'], $context['relatedPost'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            yield "                </div>
            </div>
        ";
        }
        // line 84
        yield "    </article>
";
        yield from [];
    }

    // line 89
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 90
        yield "    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/javascript.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/bash.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/json.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/yaml.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/sql.min.js\"></script>
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            hljs.highlightAll();
            document.querySelectorAll('pre code').forEach(function(block){
                const pre=block.parentNode;const wrap=document.createElement('div');wrap.className='code-block-container';
                const btn=document.createElement('button');btn.className='copy-btn';btn.textContent='Copy';btn.title='Copy code';
                btn.addEventListener('click',function(){const text=block.textContent;if(navigator.clipboard&&window.isSecureContext){navigator.clipboard.writeText(text).then(()=>{btn.textContent='Copied!';btn.classList.add('copied');setTimeout(()=>{btn.textContent='Copy';btn.classList.remove('copied');},1800);}).catch(()=>flashFail());}else{fallbackCopy(text);} });
                function flashFail(){btn.textContent='Failed';setTimeout(()=>{btn.textContent='Copy';},1500);} 
                function fallbackCopy(text){const ta=document.createElement('textarea');ta.value=text;ta.style.position='fixed';ta.style.left='-9999px';document.body.appendChild(ta);ta.select();try{document.execCommand('copy');btn.textContent='Copied!';btn.classList.add('copied');setTimeout(()=>{btn.textContent='Copy';btn.classList.remove('copied');},1800);}catch(e){flashFail();}document.body.removeChild(ta);} 
                pre.parentNode.insertBefore(wrap,pre);wrap.appendChild(pre);wrap.appendChild(btn);
            });
            document.querySelectorAll('.toc-link').forEach(a=>a.addEventListener('click',e=>{e.preventDefault();const id=a.getAttribute('href').substring(1);const t=document.getElementById(id);if(t){t.scrollIntoView({behavior:'smooth',block:'start'});}}));
            document.querySelector('a[href=\"#top\"]')?.addEventListener('click',e=>{e.preventDefault();window.scrollTo({top:0,behavior:'smooth'});});
        });
    </script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "pages/blog-post.html.twig";
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
        return array (  275 => 90,  268 => 89,  262 => 84,  257 => 81,  239 => 77,  225 => 76,  217 => 75,  213 => 73,  196 => 72,  191 => 69,  189 => 68,  177 => 59,  174 => 58,  171 => 57,  168 => 56,  165 => 55,  162 => 53,  159 => 52,  156 => 51,  153 => 50,  147 => 46,  143 => 45,  138 => 42,  131 => 41,  99 => 11,  92 => 10,  82 => 7,  75 => 6,  68 => 5,  61 => 4,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/flexible.html.twig' %}

{% block page_meta %}
        {% if post.description %}<meta name=\"description\" content=\"{{ post.description }}\" />{% endif %}
        {% if seo.keywords %}<meta name=\"keywords\" content=\"{{ seo.keywords }}\" />{% endif %}
        {% if post.author %}<meta name=\"author\" content=\"{{ post.author }}\" />{% endif %}
        {% if post.published %}<meta name=\"article:published_time\" content=\"{{ post.published }}\" />{% endif %}
{% endblock %}

{% block page_styles %}
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css\" />
    <style>
        .blog-content h1,.blog-content h2,.blog-content h3,.blog-content h4,.blog-content h5,.blog-content h6{line-height:1.25}
        .blog-content h1:first-child{margin-top:0}
        pre{background:#0d1117;color:#e6edf3;padding:1.25rem 1.5rem;border-radius:8px;overflow:auto;margin:1.5rem 0;font-size:.9rem;line-height:1.5;position:relative}
        code{background:#f6f8fa;color:#24292f;padding:.15rem .4rem;border-radius:3px;font-size:.9em;font-family:Consolas,Monaco,'Courier New',monospace}
        pre code{background:transparent;padding:0;color:inherit}
        .code-block-container{position:relative}
        .copy-btn{position:absolute;top:8px;right:8px;background:#238636;color:#fff;border:none;padding:4px 8px;border-radius:4px;cursor:pointer;font-size:.7rem;opacity:.85;transition:opacity .2s ease}
        .copy-btn:hover{opacity:1;background:#2ea043}
        .copy-btn.copied{background:#1f883d}
        .table-of-contents{background:#f7fafc;padding:1.25rem 1.25rem;border-radius:6px;margin:1.75rem 0;border:1px solid #e2e8f0}
        .toc-list{list-style:none;margin:0;padding:0}
        .toc-list li{margin:.45rem 0}
        .toc-level-2{padding-left:0}.toc-level-3{padding-left:1rem}.toc-level-4{padding-left:2rem}.toc-level-5{padding-left:3rem}.toc-level-6{padding-left:4rem}
        .toc-link{color:#2d3748;text-decoration:none;display:block;padding:.2rem 0;border-radius:3px;transition:all .18s ease}
        .toc-link:hover{background:#e2e8f0;color:#1a365d;padding-left:.4rem}
        /* Metadata component styles */
        .meta-box-inline{padding:1.1rem 1.25rem}
        .meta-list{list-style:none;margin:0 0 .75rem;padding:0;font-size:.85rem}
        .meta-list li{margin:.35rem 0}
        .tag-list{list-style:none;margin:0;padding:0;display:flex;flex-wrap:wrap;gap:.4rem}
        .tag-item{background:#e2e8f0;color:#2d3748;padding:.3rem .55rem;border-radius:3px;font-size:.65rem;line-height:1;font-weight:500}
        .blog-navigation{margin-top:2rem;padding-top:1.75rem;border-top:1px solid #e2e8f0}
        .post-meta{color:#666;font-size:.8rem;margin:.35rem 0}
        @media (max-width:736px){.meta-box-inline{padding:1rem}.table-of-contents{padding:1rem}.copy-btn{position:static;display:block;margin:.5rem 0 0;width:auto}}
    </style>
{% endblock %}

{# Main content area now placed into flexible layout's main_content block #}
{% block main_content %}
    <article class=\"box post blog-content\">
        <a href=\"#\" class=\"image featured\"><img src=\"images/pic01.png\" alt=\"\"></a>
        <header>
            <h2>{{ post.title }}</h2>
            <p>{{ post.subtitle }}</p>
        </header>

        {# Metadata inline only when variant requests it #}
        {% if metadata_variant == 'inline' %}
            {% include 'components/blog/_metadata.html.twig' with { placement: 'inline' } %}
        {% endif %}

        {# Inline TOC only if variant requests it; metadata stays above it #}
        {% if toc_variant == 'inline' %}
            {% include 'components/blog/_toc.html.twig' with { toc_html: toc_html } %}
        {% endif %}

        <div class=\"blog-content\">{{ post.content|raw }}</div>

        <div class=\"blog-navigation\">
            <div class=\"row\">
                <div class=\"col-6 col-12-small\"><a href=\"blog.php\" class=\"button\">&larr; Back to Blog</a></div>
                <div class=\"col-6 col-12-small\"><a href=\"#top\" class=\"button alt\">Back to Top &uarr;</a></div>
            </div>
        </div>

        {% if relatedPosts is defined and relatedPosts|length > 0 %}
            <div style=\"margin-top:2rem;padding-top:1.75rem;border-top:1px solid #e2e8f0;\">
                <h3>Related Posts</h3>
                <div class=\"row\">
                    {% for relatedPost in relatedPosts %}
                        <div class=\"col-4 col-12-small\" style=\"margin-bottom:1rem;\">
                            <section class=\"box\">
                                <a href=\"blog.php?post={{ relatedPost.post }}\" class=\"image featured\"><img src=\"images/pic0{{ loop.index % 10 + 1 }}.jpg\" alt=\"{{ relatedPost.title }}\" /></a>
                                <header><h4><a href=\"blog.php?post={{ relatedPost.post }}\">{{ relatedPost.title }}</a></h4><p class=\"post-meta\">{% if relatedPost.published %}<time datetime=\"{{ relatedPost.published }}\">{{ relatedPost.published }}</time>{% endif %}</p></header>
                                <footer><ul class=\"actions\"><li><a class=\"button alt\" href=\"blog.php?post={{ relatedPost.post }}\">Read More</a></li></ul></footer>
                            </section>
                        </div>
                    {% endfor %}
                </div>
            </div>
        {% endif %}
    </article>
{% endblock %}

{# Sidebars now fully composed in controller; no overrides required. #}

{% block page_scripts %}
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/javascript.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/bash.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/json.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/yaml.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/sql.min.js\"></script>
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            hljs.highlightAll();
            document.querySelectorAll('pre code').forEach(function(block){
                const pre=block.parentNode;const wrap=document.createElement('div');wrap.className='code-block-container';
                const btn=document.createElement('button');btn.className='copy-btn';btn.textContent='Copy';btn.title='Copy code';
                btn.addEventListener('click',function(){const text=block.textContent;if(navigator.clipboard&&window.isSecureContext){navigator.clipboard.writeText(text).then(()=>{btn.textContent='Copied!';btn.classList.add('copied');setTimeout(()=>{btn.textContent='Copy';btn.classList.remove('copied');},1800);}).catch(()=>flashFail());}else{fallbackCopy(text);} });
                function flashFail(){btn.textContent='Failed';setTimeout(()=>{btn.textContent='Copy';},1500);} 
                function fallbackCopy(text){const ta=document.createElement('textarea');ta.value=text;ta.style.position='fixed';ta.style.left='-9999px';document.body.appendChild(ta);ta.select();try{document.execCommand('copy');btn.textContent='Copied!';btn.classList.add('copied');setTimeout(()=>{btn.textContent='Copy';btn.classList.remove('copied');},1800);}catch(e){flashFail();}document.body.removeChild(ta);} 
                pre.parentNode.insertBefore(wrap,pre);wrap.appendChild(pre);wrap.appendChild(btn);
            });
            document.querySelectorAll('.toc-link').forEach(a=>a.addEventListener('click',e=>{e.preventDefault();const id=a.getAttribute('href').substring(1);const t=document.getElementById(id);if(t){t.scrollIntoView({behavior:'smooth',block:'start'});}}));
            document.querySelector('a[href=\"#top\"]')?.addEventListener('click',e=>{e.preventDefault();window.scrollTo({top:0,behavior:'smooth'});});
        });
    </script>
{% endblock %}", "pages/blog-post.html.twig", "/var/www/html/templates/pages/blog-post.html.twig");
    }
}
