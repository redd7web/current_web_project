     <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#accordion" ).accordion({
             collapsible: true,
             active: false 
        });
      } );
    </script>
<h1 style="color: rgb(210,10,10);">Upcoming UFC Events</h1>
<div id="accordion">
                 
<?php

function get_eventDetails($eventID){
    $event = 'https://api.sportsdata.io/v3/mma/scores/json/Event/'.$eventID.'?key=0e25381f23b44cd8aa86b854bba7077e';
    $ch2 = curl_init($event);
    curl_setopt($ch2, CURLOPT_HTTPGET, true);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    $response_jsonx = curl_exec($ch2);
    curl_close($ch2);
    $response_event = json_decode($response_jsonx, true);
     echo "<table style='width:100%'>";  
    if(count($response_event)> 0){
        for($j=0;$j<count($response_event); $j++){
            if($j== 0){
                echo "<tr><td colspan='2'><span style='font-weight:bold;'>Main Event:</span></td></tr>";
            }else{
                $mc = "";
            }
            if($response_event['Fights'][$j]['Fighters'][0]['Active'] == true){
                echo "<tr style='border-bottom:1px #bbbbbb solid;'><td style='text-align:left'>".$response_event['Fights'][$j]['Fighters'][0]['FirstName']." ". $response_event['Fights'][$j]['Fighters'][0]['LastName']." <br/>".$response_event['Fights'][$j]['Fighters'][0]['PreFightWins']."-".$response_event['Fights'][$j]['Fighters'][0]['PreFightLosses']." </td><td style='text-align:right;'> ".$response_event['Fights'][$j]['Fighters'][1]['FirstName']." ". $response_event['Fights'][$j]['Fighters'][1]['LastName']." <br/>".$response_event['Fights'][$j]['Fighters'][1]['PreFightWins']."-".$response_event['Fights'][$j]['Fighters'][1]['PreFightLosses']."</td></tr>";
            }
        }
    }
    echo "</table>";
}

  $url = 'https://api.sportsdata.io/v3/mma/scores/json/Schedule/UFC/'.date('Y').'?key=0e25381f23b44cd8aa86b854bba7077e';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response_json = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response_json, true);
    for( $i=0;$i<count($response);$i++){ // only get current month's events'
        if(date("Y-m") == date("Y-m", strtotime($response[$i]['DateTime'])   ) ){ 
             $thisMonthId[] = array (
                "date"=>date("m-d-Y h:i:s", strtotime($response[$i]['DateTime']) ),
                "event_id" =>$response[$i]['EventId'],
                "shortname"=>$response[$i]['ShortName']
            );
        }
    }
    
    
    
    for($i=0; $i<count($thisMonthId); $i++){//show this months current and upcoming events
        if($thisMonthId[$i]['date']>= date("m-d-Y H:i:s")){
            echo "<h3 style='color:white;'>".date("F j, Y", strtotime($response[$i]['DateTime']) )." ".$thisMonthId[$i]['shortname']."</h3>";
            echo "<div>";
            get_eventDetails($thisMonthId[$i]['event_id']);
            echo "</div>";
        }
    }


?>
</div>
