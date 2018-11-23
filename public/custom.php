<?php 

date_default_timezone_set("Asia/Manila");
ini_set('memory_limit', '-1');
function poop()
{
    $ci_dev = getenv('CI_ENVIRONMENT');
    if ($ci_dev == "development") {
        $debug = debug_backtrace();
        $args = func_get_args();
        echo "<pre style='position:absolute; top:0px; left:0px; margin:2%; z-index:999999;'>";
        echo "<div id='close_poop_log' onClick='delete_row(this);' style='
                display:block;
                box-sizing:border-box;
                width:20px;
                height:20px;
                border-width:3px;
                border-style: solid;
                border-color:red;
                border-radius:100%;
                background: -webkit-linear-gradient(-45deg, transparent 0%, transparent 46%, white 46%,  white 56%,transparent 56%, transparent 100%), -webkit-linear-gradient(45deg, transparent 0%, transparent 46%, white 46%,  white 56%,transparent 56%, transparent 100%);
                background-color:red;
                box-shadow:0px 0px 5px 2px rgba(0,0,0,0.5);
                transition: all 0.3s ease;
                float:right;
                cursor:pointer;
        '></div>";
        echo "<p><strong>Poop Log:</strong></p>";
        echo "<p>Path: {$debug[0]['file']}</p><hr>";
        echo "<div style='color:red;'>";
        if (count($args) == 0) {
            echo "No arguments passed to poop!";
        } else {
            foreach ($args as $i => $arg) {
                echo "<p><strong>Argument #{$i}:</strong></p>";
                if (is_array($arg)) {
                    print_r($arg);
                } else {
                    var_dump($arg);
                }
                echo "<br>";
            }
        }
        echo "</div><hr><p style='cursor:pointer;' onClick='showLog();'><strong>SESSION LOG:</strong> <span style='font-size:0.7em;'>Click to view</span></p><p id='poop_session_log' style='display:none; font-size:0.8em;'>";
        // print_r($_SESSION);
        echo "</p></pre>";
        echo "<script>
        function delete_row(e)
        {
            e.parentNode.parentNode.removeChild(e.parentNode);
        }
        var poop_session_log = 0;
        function showLog()
        {
            var show_type = poop_session_log == 0 ? 'block' : 'none';
            document.getElementById('poop_session_log').style.display = show_type;
            poop_session_log = poop_session_log == 0 ? 1 : 0;
        }
        </script>";
    }
}
