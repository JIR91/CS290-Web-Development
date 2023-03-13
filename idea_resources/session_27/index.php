<!DOCTYPE html>
<html>
<body>

<!-- Reauthenticate? Also broken...?  This may be beacuse of Apache's fastCGI not supportuing these PHP_ variables...? Comments here after materials: https://www.php.net/manual/en/features.http-auth.php -->
<?php
function authenticate() {
    header('WWW-Authenticate: Basic realm="Test Authentication System"');
    header('HTTP/1.0 401 Unauthorized');
    echo "You must enter a valid login ID and password to access this resource\n";
    exit;
}
 
if (!isset($_SERVER['PHP_AUTH_USER']) ||
    ($_POST['SeenBefore'] == 1 && $_POST['OldAuth'] == $_SERVER['PHP_AUTH_USER'])) {
    authenticate();
} else {
    echo "<p>Welcome: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "<br />";
    echo "Old: " . htmlspecialchars($_REQUEST['OldAuth']);
    echo "<form action='' method='post'>\n";
    echo "<input type='hidden' name='SeenBefore' value='1' />\n";
    echo "<input type='hidden' name='OldAuth' value=\"" . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "\" />\n";
    echo "<input type='submit' value='Re Authenticate' />\n";
    echo "</form></p>\n";
}
?>

<!-- somewhat more advanced use of auth, seems to be broken? -->
<!-- <?php
$realm = 'Restricted area';

//user => password
$users = array('admin' => 'mypass', 'guest' => 'guest');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Text to send if user hits Cancel button');
}


// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Wrong Credentials!');


// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Wrong Credentials!');

// ok, valid username & password
echo 'You are logged in as: ' . $data['username'];


// function to parse the http auth header
function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}
?> -->

<!-- basic http auth -->
<!-- <?php
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Text to send if user hits Cancel button';
        exit;
    } else {
        echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
        echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    }

    $message = 'here   is \t my string \n cat'; // PHP will count mixed white spaces as additional words...
    $bin = 0b11_1010;
    $float = 0.1e-3;
    $arr = ["cat", 1.2, TRUE, FALSE]; // careful with FALSE being converted to other data types, things can go oddly

    echo "Hello " . $message . " str_word_count(\$message): " . str_word_count($message) . "<br>\$bin: ". $bin . "!";
    echo "<br>\$float: $float";
    //echo "<br>\$arr: $arr"; //Array datatype "thing" (to be careful not to use the word Object or otherwise ambiguous terms...)
    foreach($arr as $item) {
        echo "<br>\$item: $item";
    }
    echo("<br><br>" . pi());
    $len = strlen(pi());
    echo("<br>$len");

    $my_object = ["one"=>1, "two"=>2, "three"=>3];
    echo "before function: " . $my_object['one'] . "<br>";
    function isReference(&$object) { // & will make this paarmeter into a reference...
        echo "inside function before argument chage: " . $object["one"] . "<br>";
        $object["one"] = 42;
        echo "inside function after argument chage: " . $object["one"] . "<br>";
    }
    isReference($my_object);
    echo "after function: " . $my_object["one"] . "<br>";

    const value = 999;
    echo "value: " . value;
?> -->

</body>
</html>