<?php
const SETS = "https://api.scryfall.com/sets";
require "env.php";


$sets = array();
echo "Fetching Sets..." . PHP_EOL;
$temp = CallAPI(SETS);
$sets = array_merge($sets, $temp->data);

foreach($sets as $set){
    echo $set->name . "(". $set->code .")" . PHP_EOL;
    insertSet(
            $set->code, 
            $set->name, 
            isset($set->set_type) ? $set->set_type : '', 
            isset($set->block_code) ? $set->block_code : '');
    
    $cards = fetchCards($set->search_uri);
    insertCards($cards, $set->code);
    echo "\n\n";
}

echo ".....DONE......." . PHP_EOL;

function insertCards($cards, $code)
{
    $conn = db_con();
    $count = 0;
    foreach($cards as $card){

        $check = $conn->prepare("SELECT * FROM cards WHERE name = ? AND card_set = ?");
        $check->bind_param("ss", $card->name, $card->set);
        $check->execute();
        
        $result = $check->get_result();
        if($result->num_rows === 0){
            $cardStmt = $conn->prepare("INSERT INTO cards (multiverseid, name, names, colors, rarity, card_set, cmc, types, subtypes, image) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $mid = isset($card->tcgplayer_id) ? $card->tcgplayer_id : -777;
            $names = isset($card->names) ? join(",", $card->names) : null;
            $subtypes = isset($card->subtypes) ? join(",", $card->subtypes) : null;
            $colors = isset($card->colors) ? join(",", $card->colors) : null;
            $rarity = isset($card->rarity) ? $card->rarity : null;
            $types = isset($card->types) ? join(",", $card->types) : null;
            $cmc = isset($card->cmc) ? $card->cmc : null;
            $img = isset($card->image_uris->normal) ? $card->image_uris->normal : null;

            $cardStmt->bind_param("isssssisss", $mid, $card->name, $names, $colors, $rarity, $card->set, $cmc, $types, $subtypes, $img);

            if ($cardStmt->execute()) {
                echo "\t\t {$card->name} inserted..." . PHP_EOL;
                $count++;
            } else {
                exit('Error : (' . $conn->errno . ') ' . $conn->error);
            }
        }else{
            echo "\t\t {$card->name} already in..." . PHP_EOL;
        }
    }
    $conn->close();
    echo "\tInserted {$count} new cards of ".count($cards)." total cards." . PHP_EOL;    
}

function insertSet($code, $name, $set, $block)
{
    $conn = db_con();
    $check = $conn->query("SELECT * FROM mtg_sets WHERE code = '{$code}'");
    $data = $check->fetch_object();
    if(!$data){
        $new = $conn->prepare("INSERT INTO mtg_sets VALUES (?,?,?,?)");
        $new->bind_param("ssss", $code, $name, $set, $block);
        if ($new->execute()) {
            echo "\tInserted new set named {$name} into database." . PHP_EOL;
        } else {
            exit('Error : (' . $conn->errno . ') ' . $conn->error);
        }
    }else{
        echo "\tOld Set. Checking for cards...".PHP_EOL;
    }
    $conn->close();
}


function fetchCards($set_api)
{
    echo "\tFetching Cards...";
    $cards = array();
    do{
        $bbd = CallAPI($set_api);
        $cards = array_merge($cards, $bbd->data);
        $set_api = isset($bbd->next_page) ? $bbd->next_page : $set_api;
    }while($bbd->has_more == "true");
    echo "...Done!" . PHP_EOL;
    return $cards;
}


function db_con()
{
    $conn = new mysqli("localhost", DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        exit("Failed to connect to db!");
    }

    $conn->set_charset("utf8mb4");
    return $conn;
}


function CallAPI($url)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $headers = [];
    curl_setopt($curl, CURLOPT_HEADERFUNCTION,
        function ($curl, $header) use (&$headers) {
            $len = strlen($header);
            $header = explode(':', $header, 2);
            if (count($header) < 2) // ignore invalid headers
            {
                return $len;
            }

            $name = strtolower(trim($header[0]));
            if (!array_key_exists($name, $headers)) {
                $headers[$name] = [trim($header[1])];
            } else {
                $headers[$name][] = trim($header[1]);
            }

            return $len;
        }
    );

    $result = curl_exec($curl);

    curl_close($curl);

    return json_decode($result);
}
