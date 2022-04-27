<?php



function createTimebar()
{

$timeDelay = ($_SESSION['Delay'] / 1000000);

    echo '<div id="timebar" class="round-time-bar d-none" data-style="smooth" style="--duration:'.$timeDelay.';">
<div></div>
</div>';
echo '<script>toggleTimeBar()</script>';

}

?>