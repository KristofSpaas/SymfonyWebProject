<?php

/* AppBundle:TeamledenController:showTeamleden.html.twig */
class __TwigTemplate_b421f1f6161ca008da2f58fcd1fcda552f3e60472b13048dfe6fefce7048b8bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "AppBundle:TeamledenController:showTeamleden.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b38d14183b4e73d72eea1fbb59b167d2af4552757c2f40dc6ae93d08ec720520 = $this->env->getExtension("native_profiler");
        $__internal_b38d14183b4e73d72eea1fbb59b167d2af4552757c2f40dc6ae93d08ec720520->enter($__internal_b38d14183b4e73d72eea1fbb59b167d2af4552757c2f40dc6ae93d08ec720520_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:TeamledenController:showTeamleden.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b38d14183b4e73d72eea1fbb59b167d2af4552757c2f40dc6ae93d08ec720520->leave($__internal_b38d14183b4e73d72eea1fbb59b167d2af4552757c2f40dc6ae93d08ec720520_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_7c9c5445e1ce5d31467b3cd630df4c9aecf8ca514f73e6688be0f32a80f9edde = $this->env->getExtension("native_profiler");
        $__internal_7c9c5445e1ce5d31467b3cd630df4c9aecf8ca514f73e6688be0f32a80f9edde->enter($__internal_7c9c5445e1ce5d31467b3cd630df4c9aecf8ca514f73e6688be0f32a80f9edde_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "AppBundle:TeamledenController:showTeamleden";
        
        $__internal_7c9c5445e1ce5d31467b3cd630df4c9aecf8ca514f73e6688be0f32a80f9edde->leave($__internal_7c9c5445e1ce5d31467b3cd630df4c9aecf8ca514f73e6688be0f32a80f9edde_prof);

    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        $__internal_b7fc478a995e3c0f05ef5996fba6214573848dc104957e9ae335ce91265293ce = $this->env->getExtension("native_profiler");
        $__internal_b7fc478a995e3c0f05ef5996fba6214573848dc104957e9ae335ce91265293ce->enter($__internal_b7fc478a995e3c0f05ef5996fba6214573848dc104957e9ae335ce91265293ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 6
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "
    ";
        // line 12
        $this->displayBlock('javascripts', $context, $blocks);
        
        $__internal_b7fc478a995e3c0f05ef5996fba6214573848dc104957e9ae335ce91265293ce->leave($__internal_b7fc478a995e3c0f05ef5996fba6214573848dc104957e9ae335ce91265293ce_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_dc6f0f2ff8175dac9940055b18fdb67b8d826529ee4c1c4103d3577807d2ae73 = $this->env->getExtension("native_profiler");
        $__internal_dc6f0f2ff8175dac9940055b18fdb67b8d826529ee4c1c4103d3577807d2ae73->enter($__internal_dc6f0f2ff8175dac9940055b18fdb67b8d826529ee4c1c4103d3577807d2ae73_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/opmaak.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
        <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/teamledenOpmaak.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"/>
    ";
        
        $__internal_dc6f0f2ff8175dac9940055b18fdb67b8d826529ee4c1c4103d3577807d2ae73->leave($__internal_dc6f0f2ff8175dac9940055b18fdb67b8d826529ee4c1c4103d3577807d2ae73_prof);

    }

    // line 12
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_b225de2f1425b9bf3f85c50f13a0f68245e9fad6f8d5c95b49d25e6052b3e185 = $this->env->getExtension("native_profiler");
        $__internal_b225de2f1425b9bf3f85c50f13a0f68245e9fad6f8d5c95b49d25e6052b3e185->enter($__internal_b225de2f1425b9bf3f85c50f13a0f68245e9fad6f8d5c95b49d25e6052b3e185_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 13
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery-1.11.2.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    ";
        
        $__internal_b225de2f1425b9bf3f85c50f13a0f68245e9fad6f8d5c95b49d25e6052b3e185->leave($__internal_b225de2f1425b9bf3f85c50f13a0f68245e9fad6f8d5c95b49d25e6052b3e185_prof);

    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        $__internal_7873e8fa6892ee3d9ccf83f88923829da2b0aa0a125d3e9e33174f468fff1f64 = $this->env->getExtension("native_profiler");
        $__internal_7873e8fa6892ee3d9ccf83f88923829da2b0aa0a125d3e9e33174f468fff1f64->enter($__internal_7873e8fa6892ee3d9ccf83f88923829da2b0aa0a125d3e9e33174f468fff1f64_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 19
        echo "    ";
        $this->loadTemplate("layout/navBar.html", "AppBundle:TeamledenController:showTeamleden.html.twig", 19)->display(array());
        // line 20
        echo "
    <div>
        <img class=\"banner\" src=\"./images/banner.jpg\" width=\"100%\"/>

        <div class=\"transparent-wrapper\">
            <div id=\"div-transparent\"></div>
        </div>
        <div class=\"div-not-transparent\">
            <section id=\"team\">
                <div class=\"container-team\">
                    <h1>Meet the team</h1>

                    <div id=\"members\">
                        <div class=\"member one-third column\">
                            <div class=\"thumbnail\">
                                <img width=\"254\" height=\"254\" src=\"images/user.png\"/>
                            </div>
                            <h2>Rafael Tureluren</h2>

                            <p>Phasellus a nisi urna, facilisis facilisis diam. Vivamus enim ligula, sollicitudin nec
                                porttitor nec,
                                commodo vel justo. Nunc in mattis ipsum. Mauris accumsan pretium diam, sit amet iaculis
                                purus
                                ullamcorper ac. Donec pulvinar metus a ipsum varius suscipit. Mauris ut nisi at tortor
                                molestie
                                rhoncus ultrices quis nisi.</p>

                        </div>
                        <div class=\"member one-third column\">
                            <div class=\"thumbnail\">
                                <img width=\"254\" height=\"254\" src=\"images/user.png\"/>
                            </div>
                            <h2>Kristof Spaas</h2>

                            <p>Phasellus a nisi urna, facilisis facilisis diam. Vivamus enim ligula, sollicitudin nec
                                porttitor nec,
                                commodo vel justo. Nunc in mattis ipsum. Mauris accumsan pretium diam, sit amet iaculis
                                purus
                                ullamcorper ac. Donec pulvinar metus a ipsum varius suscipit. Mauris ut nisi at tortor
                                molestie
                                rhoncus ultrices quis nisi.</p>

                        </div>
                        <div class=\"member one-third column\">
                            <div class=\"thumbnail\">
                                <img width=\"254\" height=\"254\" src=\"images/user.png\"/>
                            </div>
                            <h2>Lander Ghekiere</h2>

                            <p>Phasellus a nisi urna, facilisis facilisis diam. Vivamus enim ligula, sollicitudin nec
                                porttitor nec,
                                commodo vel justo. Nunc in mattis ipsum. Mauris accumsan pretium diam, sit amet iaculis
                                purus
                                ullamcorper ac. Donec pulvinar metus a ipsum varius suscipit. Mauris ut nisi at tortor
                                molestie
                                rhoncus ultrices quis nisi.</p>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

";
        
        $__internal_7873e8fa6892ee3d9ccf83f88923829da2b0aa0a125d3e9e33174f468fff1f64->leave($__internal_7873e8fa6892ee3d9ccf83f88923829da2b0aa0a125d3e9e33174f468fff1f64_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:TeamledenController:showTeamleden.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 20,  119 => 19,  113 => 18,  104 => 14,  99 => 13,  93 => 12,  84 => 9,  80 => 8,  75 => 7,  69 => 6,  62 => 12,  59 => 11,  56 => 6,  50 => 5,  38 => 3,  11 => 1,);
    }
}
/* {% extends "::base.html.twig" %}*/
/* */
/* {% block title %}AppBundle:TeamledenController:showTeamleden{% endblock %}*/
/* */
/* {% block head %}*/
/*     {% block stylesheets %}*/
/*         <link href="{{ asset('css/opmaak.css') }}" rel="stylesheet"/>*/
/*         <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>*/
/*         <link href="{{ asset('css/teamledenOpmaak.css') }}" rel="stylesheet"/>*/
/*     {% endblock %}*/
/* */
/*     {% block javascripts %}*/
/*         <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>*/
/*         <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>*/
/*     {% endblock %}*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include 'layout/navBar.html' only %}*/
/* */
/*     <div>*/
/*         <img class="banner" src="./images/banner.jpg" width="100%"/>*/
/* */
/*         <div class="transparent-wrapper">*/
/*             <div id="div-transparent"></div>*/
/*         </div>*/
/*         <div class="div-not-transparent">*/
/*             <section id="team">*/
/*                 <div class="container-team">*/
/*                     <h1>Meet the team</h1>*/
/* */
/*                     <div id="members">*/
/*                         <div class="member one-third column">*/
/*                             <div class="thumbnail">*/
/*                                 <img width="254" height="254" src="images/user.png"/>*/
/*                             </div>*/
/*                             <h2>Rafael Tureluren</h2>*/
/* */
/*                             <p>Phasellus a nisi urna, facilisis facilisis diam. Vivamus enim ligula, sollicitudin nec*/
/*                                 porttitor nec,*/
/*                                 commodo vel justo. Nunc in mattis ipsum. Mauris accumsan pretium diam, sit amet iaculis*/
/*                                 purus*/
/*                                 ullamcorper ac. Donec pulvinar metus a ipsum varius suscipit. Mauris ut nisi at tortor*/
/*                                 molestie*/
/*                                 rhoncus ultrices quis nisi.</p>*/
/* */
/*                         </div>*/
/*                         <div class="member one-third column">*/
/*                             <div class="thumbnail">*/
/*                                 <img width="254" height="254" src="images/user.png"/>*/
/*                             </div>*/
/*                             <h2>Kristof Spaas</h2>*/
/* */
/*                             <p>Phasellus a nisi urna, facilisis facilisis diam. Vivamus enim ligula, sollicitudin nec*/
/*                                 porttitor nec,*/
/*                                 commodo vel justo. Nunc in mattis ipsum. Mauris accumsan pretium diam, sit amet iaculis*/
/*                                 purus*/
/*                                 ullamcorper ac. Donec pulvinar metus a ipsum varius suscipit. Mauris ut nisi at tortor*/
/*                                 molestie*/
/*                                 rhoncus ultrices quis nisi.</p>*/
/* */
/*                         </div>*/
/*                         <div class="member one-third column">*/
/*                             <div class="thumbnail">*/
/*                                 <img width="254" height="254" src="images/user.png"/>*/
/*                             </div>*/
/*                             <h2>Lander Ghekiere</h2>*/
/* */
/*                             <p>Phasellus a nisi urna, facilisis facilisis diam. Vivamus enim ligula, sollicitudin nec*/
/*                                 porttitor nec,*/
/*                                 commodo vel justo. Nunc in mattis ipsum. Mauris accumsan pretium diam, sit amet iaculis*/
/*                                 purus*/
/*                                 ullamcorper ac. Donec pulvinar metus a ipsum varius suscipit. Mauris ut nisi at tortor*/
/*                                 molestie*/
/*                                 rhoncus ultrices quis nisi.</p>*/
/* */
/*                         </div>*/
/* */
/*                     </div>*/
/*                 </div>*/
/*             </section>*/
/*         </div>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
