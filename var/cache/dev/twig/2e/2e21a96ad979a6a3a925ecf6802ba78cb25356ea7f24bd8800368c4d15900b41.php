<?php

/* ::base.html.twig */
class __TwigTemplate_1dba970702b712521dc37ff2a95db89d47aeb31d12adcfbeb20bc030a1eb18fd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5fdd77377d67dfbbe3b3178ee3e5811034275b10967b64c6295d29f36d8f2a1a = $this->env->getExtension("native_profiler");
        $__internal_5fdd77377d67dfbbe3b3178ee3e5811034275b10967b64c6295d29f36d8f2a1a->enter($__internal_5fdd77377d67dfbbe3b3178ee3e5811034275b10967b64c6295d29f36d8f2a1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_5fdd77377d67dfbbe3b3178ee3e5811034275b10967b64c6295d29f36d8f2a1a->leave($__internal_5fdd77377d67dfbbe3b3178ee3e5811034275b10967b64c6295d29f36d8f2a1a_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_2db5ea52c44fecfd71208bfcedc1366e03c9d0da47abba78a230d2a321a3e8df = $this->env->getExtension("native_profiler");
        $__internal_2db5ea52c44fecfd71208bfcedc1366e03c9d0da47abba78a230d2a321a3e8df->enter($__internal_2db5ea52c44fecfd71208bfcedc1366e03c9d0da47abba78a230d2a321a3e8df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_2db5ea52c44fecfd71208bfcedc1366e03c9d0da47abba78a230d2a321a3e8df->leave($__internal_2db5ea52c44fecfd71208bfcedc1366e03c9d0da47abba78a230d2a321a3e8df_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_0526184d20ebd9e9399270aa81835cae193b6100fde866427bbbf31c291c69a5 = $this->env->getExtension("native_profiler");
        $__internal_0526184d20ebd9e9399270aa81835cae193b6100fde866427bbbf31c291c69a5->enter($__internal_0526184d20ebd9e9399270aa81835cae193b6100fde866427bbbf31c291c69a5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_0526184d20ebd9e9399270aa81835cae193b6100fde866427bbbf31c291c69a5->leave($__internal_0526184d20ebd9e9399270aa81835cae193b6100fde866427bbbf31c291c69a5_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_48e55fe7394a12466a7eb1a72be0bc8aedbe1c6060cafc59745bff721be5a4fe = $this->env->getExtension("native_profiler");
        $__internal_48e55fe7394a12466a7eb1a72be0bc8aedbe1c6060cafc59745bff721be5a4fe->enter($__internal_48e55fe7394a12466a7eb1a72be0bc8aedbe1c6060cafc59745bff721be5a4fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_48e55fe7394a12466a7eb1a72be0bc8aedbe1c6060cafc59745bff721be5a4fe->leave($__internal_48e55fe7394a12466a7eb1a72be0bc8aedbe1c6060cafc59745bff721be5a4fe_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_2de0c2748d313ab666cbc63395ae1d362e31c1fbe53096c10750641bc1c2a0a4 = $this->env->getExtension("native_profiler");
        $__internal_2de0c2748d313ab666cbc63395ae1d362e31c1fbe53096c10750641bc1c2a0a4->enter($__internal_2de0c2748d313ab666cbc63395ae1d362e31c1fbe53096c10750641bc1c2a0a4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_2de0c2748d313ab666cbc63395ae1d362e31c1fbe53096c10750641bc1c2a0a4->leave($__internal_2de0c2748d313ab666cbc63395ae1d362e31c1fbe53096c10750641bc1c2a0a4_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
