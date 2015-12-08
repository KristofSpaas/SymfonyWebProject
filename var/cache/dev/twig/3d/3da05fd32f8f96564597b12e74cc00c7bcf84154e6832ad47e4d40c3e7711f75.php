<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_3c9a47c91eddd59b6c4751d359ee495e5e5bca562083440754ffa08cfacf5f1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5a9bda48be882f64ecca7163998637dbd15e809d2bc19145358351173abc9861 = $this->env->getExtension("native_profiler");
        $__internal_5a9bda48be882f64ecca7163998637dbd15e809d2bc19145358351173abc9861->enter($__internal_5a9bda48be882f64ecca7163998637dbd15e809d2bc19145358351173abc9861_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a9bda48be882f64ecca7163998637dbd15e809d2bc19145358351173abc9861->leave($__internal_5a9bda48be882f64ecca7163998637dbd15e809d2bc19145358351173abc9861_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_63e54a45356b407d32598ad8ca4767c3b12759d41de9c422973755034c05ef2c = $this->env->getExtension("native_profiler");
        $__internal_63e54a45356b407d32598ad8ca4767c3b12759d41de9c422973755034c05ef2c->enter($__internal_63e54a45356b407d32598ad8ca4767c3b12759d41de9c422973755034c05ef2c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_63e54a45356b407d32598ad8ca4767c3b12759d41de9c422973755034c05ef2c->leave($__internal_63e54a45356b407d32598ad8ca4767c3b12759d41de9c422973755034c05ef2c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_741bc994dfca83d6e5c0728815a0c86e76e89e03a302c98a2b15d3d88ed5ac9a = $this->env->getExtension("native_profiler");
        $__internal_741bc994dfca83d6e5c0728815a0c86e76e89e03a302c98a2b15d3d88ed5ac9a->enter($__internal_741bc994dfca83d6e5c0728815a0c86e76e89e03a302c98a2b15d3d88ed5ac9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_741bc994dfca83d6e5c0728815a0c86e76e89e03a302c98a2b15d3d88ed5ac9a->leave($__internal_741bc994dfca83d6e5c0728815a0c86e76e89e03a302c98a2b15d3d88ed5ac9a_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_9a69c4b66337e57f5b4af43aa27e237a26b91775a52125d0a0ec77e9a5d999a2 = $this->env->getExtension("native_profiler");
        $__internal_9a69c4b66337e57f5b4af43aa27e237a26b91775a52125d0a0ec77e9a5d999a2->enter($__internal_9a69c4b66337e57f5b4af43aa27e237a26b91775a52125d0a0ec77e9a5d999a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_9a69c4b66337e57f5b4af43aa27e237a26b91775a52125d0a0ec77e9a5d999a2->leave($__internal_9a69c4b66337e57f5b4af43aa27e237a26b91775a52125d0a0ec77e9a5d999a2_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
