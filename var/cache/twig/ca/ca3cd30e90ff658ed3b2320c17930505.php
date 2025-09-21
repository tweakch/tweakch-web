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

/* layouts/base.html.twig */
class __TwigTemplate_91f20a11fdcf8916afc8986b6a527562 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'page_meta' => [$this, 'block_page_meta'],
            'page_head_extra' => [$this, 'block_page_head_extra'],
            'page_styles' => [$this, 'block_page_styles'],
            'additional_css' => [$this, 'block_additional_css'],
            'header_content' => [$this, 'block_header_content'],
            'content' => [$this, 'block_content'],
            'page_scripts' => [$this, 'block_page_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE HTML>
<html lang=\"";
        // line 2
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "currentLanguage", [], "any", false, false, false, 2), "html", null, true);
        yield "\">
    <head>
        <title>";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["page_title"] ?? null), "html", null, true);
        yield "</title>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />
        <meta name=\"description\" content=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("meta_description", $context)) ? (Twig\Extension\CoreExtension::default(($context["meta_description"] ?? null), CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "description", [], "any", false, false, false, 7))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "description", [], "any", false, false, false, 7))), "html", null, true);
        yield "\" />
        <meta name=\"author\" content=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "author", [], "any", false, false, false, 8), "html", null, true);
        yield "\" />
        <meta property=\"og:title\" content=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["page_title"] ?? null), "html", null, true);
        yield "\" />
        <meta property=\"og:description\" content=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("meta_description", $context)) ? (Twig\Extension\CoreExtension::default(($context["meta_description"] ?? null), CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "description", [], "any", false, false, false, 10))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "description", [], "any", false, false, false, 10))), "html", null, true);
        yield "\" />
        <meta property=\"og:type\" content=\"website\" />
        <meta property=\"og:site_name\" content=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "name", [], "any", false, false, false, 12), "html", null, true);
        yield "\" />
        ";
        // line 13
        yield from $this->unwrap()->yieldBlock('page_meta', $context, $blocks);
        // line 14
        yield "        ";
        yield from $this->unwrap()->yieldBlock('page_head_extra', $context, $blocks);
        // line 15
        yield "        <link rel=\"stylesheet\" href=\"assets/css/main.css\" />
        ";
        // line 16
        yield from $this->unwrap()->yieldBlock('page_styles', $context, $blocks);
        // line 17
        yield "        ";
        yield from $this->unwrap()->yieldBlock('additional_css', $context, $blocks);
        // line 18
        yield "        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
    </head>
    <body class=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("body_class", $context)) ? (Twig\Extension\CoreExtension::default(($context["body_class"] ?? null), "is-preload")) : ("is-preload")), "html", null, true);
        yield "\">
        <div id=\"page-wrapper\">
            <section id=\"header\">
                ";
        // line 24
        yield "                <h1><a href=\"index.php\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["site"] ?? null), "name", [], "any", false, false, false, 24), "html", null, true);
        yield "</a></h1>
                
                ";
        // line 27
        yield "                ";
        yield from $this->load("components/navigation.html.twig", 27)->unwrap()->yield($context);
        // line 28
        yield "
                ";
        // line 30
        yield "                ";
        yield from $this->unwrap()->yieldBlock('header_content', $context, $blocks);
        // line 31
        yield "            </section>

            ";
        // line 34
        yield "            ";
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 35
        yield "
            ";
        // line 37
        yield "            ";
        yield from $this->load("components/footer.html.twig", 37)->unwrap()->yield($context);
        // line 38
        yield "        </div>
        
        ";
        // line 41
        yield "        ";
        yield from $this->load("components/scripts.html.twig", 41)->unwrap()->yield($context);
        // line 42
        yield "        ";
        // line 43
        yield "        ";
        yield from $this->unwrap()->yieldBlock('page_scripts', $context, $blocks);
        // line 44
        yield "    </body>
</html>";
        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_meta(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 14
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_head_extra(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_additional_css(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 34
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layouts/base.html.twig";
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
        return array (  213 => 43,  203 => 34,  193 => 30,  183 => 17,  173 => 16,  163 => 14,  153 => 13,  147 => 44,  144 => 43,  142 => 42,  139 => 41,  135 => 38,  132 => 37,  129 => 35,  126 => 34,  122 => 31,  119 => 30,  116 => 28,  113 => 27,  107 => 24,  101 => 20,  97 => 18,  94 => 17,  92 => 16,  89 => 15,  86 => 14,  84 => 13,  80 => 12,  75 => 10,  71 => 9,  67 => 8,  63 => 7,  57 => 4,  52 => 2,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE HTML>
<html lang=\"{{ lang.currentLanguage }}\">
    <head>
        <title>{{ page_title }}</title>
        <meta charset=\"utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />
        <meta name=\"description\" content=\"{{ meta_description|default(site.description) }}\" />
        <meta name=\"author\" content=\"{{ site.author }}\" />
        <meta property=\"og:title\" content=\"{{ page_title }}\" />
        <meta property=\"og:description\" content=\"{{ meta_description|default(site.description) }}\" />
        <meta property=\"og:type\" content=\"website\" />
        <meta property=\"og:site_name\" content=\"{{ site.name }}\" />
        {% block page_meta %}{% endblock %}
        {% block page_head_extra %}{% endblock %}
        <link rel=\"stylesheet\" href=\"assets/css/main.css\" />
        {% block page_styles %}{% endblock %}
        {% block additional_css %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\" />
    </head>
    <body class=\"{{ body_class|default('is-preload') }}\">
        <div id=\"page-wrapper\">
            <section id=\"header\">
                {# Site Logo #}
                <h1><a href=\"index.php\">{{ site.name }}</a></h1>
                
                {# Navigation #}
                {% include 'components/navigation.html.twig' %}

                {# Header content (banner, intro, etc.) #}
                {% block header_content %}{% endblock %}
            </section>

            {# Main page content #}
            {% block content %}{% endblock %}

            {# Footer #}
            {% include 'components/footer.html.twig' %}
        </div>
        
        {# Scripts #}
        {% include 'components/scripts.html.twig' %}
        {# Page-level scripts extension point #}
        {% block page_scripts %}{% endblock %}
    </body>
</html>", "layouts/base.html.twig", "/var/www/html/templates/layouts/base.html.twig");
    }
}
