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

/* components/footer/recent-posts.html.twig */
class __TwigTemplate_c60a9f75320e5482ee07f40684f45d3b extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<section>
    <header>
        <h2>";
        // line 3
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.recent_posts.title"], "method", false, false, false, 3), "html", null, true);
        yield "</h2>
    </header>
    <ul class=\"dates\">
        ";
        // line 6
        $context["recent_posts"] = CoreExtension::getAttribute($this->env, $this->source, ($context["lang"] ?? null), "get", ["footer.recent_posts.posts"], "method", false, false, false, 6);
        // line 7
        yield "        ";
        if (is_iterable(($context["recent_posts"] ?? null))) {
            // line 8
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["recent_posts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 9
                yield "                <li>
                    <span class=\"date\">";
                // line 10
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 10), "html", null, true);
                yield "</span>
                    <h3><a href=\"#\">";
                // line 11
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 11), "html", null, true);
                yield "</a></h3>
                    <p>";
                // line 12
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "excerpt", [], "any", false, false, false, 12), "html", null, true);
                yield "</p>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['post'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            yield "        ";
        } else {
            // line 16
            yield "            ";
            // line 17
            yield "            <li>
                <span class=\"date\">Jan 27</span>
                <h3><a href=\"#\">Lorem dolor sit amet veroeros</a></h3>
                <p>Ipsum dolor sit amet veroeros consequat blandit ipsum phasellus lorem consequat etiam.</p>
            </li>
            <li>
                <span class=\"date\">Jan 23</span>
                <h3><a href=\"#\">Ipsum sed blandit nisl consequat</a></h3>
                <p>Blandit phasellus lorem ipsum dolor tempor sapien tortor hendrerit adipiscing feugiat lorem.</p>
            </li>
            <li>
                <span class=\"date\">Jan 15</span>
                <h3><a href=\"#\">Magna tempus lorem feugiat</a></h3>
                <p>Dolore consequat sed phasellus lorem sed etiam nullam dolor etiam sed amet sit consequat.</p>
            </li>
        ";
        }
        // line 33
        yield "    </ul>
</section>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "components/footer/recent-posts.html.twig";
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
        return array (  105 => 33,  87 => 17,  85 => 16,  82 => 15,  73 => 12,  69 => 11,  65 => 10,  62 => 9,  57 => 8,  54 => 7,  52 => 6,  46 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<section>
    <header>
        <h2>{{ lang.get('footer.recent_posts.title') }}</h2>
    </header>
    <ul class=\"dates\">
        {% set recent_posts = lang.get('footer.recent_posts.posts') %}
        {% if recent_posts is iterable %}
            {% for post in recent_posts %}
                <li>
                    <span class=\"date\">{{ post.date }}</span>
                    <h3><a href=\"#\">{{ post.title }}</a></h3>
                    <p>{{ post.excerpt }}</p>
                </li>
            {% endfor %}
        {% else %}
            {# Fallback content if no posts in translations #}
            <li>
                <span class=\"date\">Jan 27</span>
                <h3><a href=\"#\">Lorem dolor sit amet veroeros</a></h3>
                <p>Ipsum dolor sit amet veroeros consequat blandit ipsum phasellus lorem consequat etiam.</p>
            </li>
            <li>
                <span class=\"date\">Jan 23</span>
                <h3><a href=\"#\">Ipsum sed blandit nisl consequat</a></h3>
                <p>Blandit phasellus lorem ipsum dolor tempor sapien tortor hendrerit adipiscing feugiat lorem.</p>
            </li>
            <li>
                <span class=\"date\">Jan 15</span>
                <h3><a href=\"#\">Magna tempus lorem feugiat</a></h3>
                <p>Dolore consequat sed phasellus lorem sed etiam nullam dolor etiam sed amet sit consequat.</p>
            </li>
        {% endif %}
    </ul>
</section>", "components/footer/recent-posts.html.twig", "/var/www/html/templates/components/footer/recent-posts.html.twig");
    }
}
