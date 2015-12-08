<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_b36528a6b56d77e8c5ea0195aacb781db07de144f5f03cd26c57a14fd8a3cce9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bfef609e6408e4c630aef491bb3dcb69081670b5120f11ef6222f2e3b55bea21 = $this->env->getExtension("native_profiler");
        $__internal_bfef609e6408e4c630aef491bb3dcb69081670b5120f11ef6222f2e3b55bea21->enter($__internal_bfef609e6408e4c630aef491bb3dcb69081670b5120f11ef6222f2e3b55bea21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bfef609e6408e4c630aef491bb3dcb69081670b5120f11ef6222f2e3b55bea21->leave($__internal_bfef609e6408e4c630aef491bb3dcb69081670b5120f11ef6222f2e3b55bea21_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_cfa1f4fd7810972991c6cfe7910978e3f976459056be8fea1e3a8e4b84a6db2b = $this->env->getExtension("native_profiler");
        $__internal_cfa1f4fd7810972991c6cfe7910978e3f976459056be8fea1e3a8e4b84a6db2b->enter($__internal_cfa1f4fd7810972991c6cfe7910978e3f976459056be8fea1e3a8e4b84a6db2b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_cfa1f4fd7810972991c6cfe7910978e3f976459056be8fea1e3a8e4b84a6db2b->leave($__internal_cfa1f4fd7810972991c6cfe7910978e3f976459056be8fea1e3a8e4b84a6db2b_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_1b5509a3c6ae5f477e22fc5dcdce32b186cba74b2f72623066f019ec0aabb3d6 = $this->env->getExtension("native_profiler");
        $__internal_1b5509a3c6ae5f477e22fc5dcdce32b186cba74b2f72623066f019ec0aabb3d6->enter($__internal_1b5509a3c6ae5f477e22fc5dcdce32b186cba74b2f72623066f019ec0aabb3d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_1b5509a3c6ae5f477e22fc5dcdce32b186cba74b2f72623066f019ec0aabb3d6->leave($__internal_1b5509a3c6ae5f477e22fc5dcdce32b186cba74b2f72623066f019ec0aabb3d6_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_ef2070cafb8f0a80608e6d04ff2c874bfb8e454bbfe27bc7cfcd00251acbd143 = $this->env->getExtension("native_profiler");
        $__internal_ef2070cafb8f0a80608e6d04ff2c874bfb8e454bbfe27bc7cfcd00251acbd143->enter($__internal_ef2070cafb8f0a80608e6d04ff2c874bfb8e454bbfe27bc7cfcd00251acbd143_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_ef2070cafb8f0a80608e6d04ff2c874bfb8e454bbfe27bc7cfcd00251acbd143->leave($__internal_ef2070cafb8f0a80608e6d04ff2c874bfb8e454bbfe27bc7cfcd00251acbd143_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
