<?php
namespace Jbig3Tryings\ServiceManager\Plugin;


class GreetingPlugin
{

    public function getGreeting()
    {

        if (date("H") <= 11)
            return "Guten Morgen die Herren.";
        else if (date("H") > 11 && date("H") < 17)
            return "Schönen Nachmittag gewünscht";
        else
            return "Guten Abend die Herren.";
    }
}