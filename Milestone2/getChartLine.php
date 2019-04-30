<?php

  include 'data.php';

  $inc = $graphs["fatturato"]["data"];
  $type = $graphs["fatturato"]["type"];

  $chart = [

    "type" => $type,
    "data" => [

      "labels" => $_GET["labels"],
      "datasets" => [[

        "label" => "Incomings",
        "backgroundColor" => "green",
        "borderColor" => "blue",
        "data" => $inc
        ]]
      ]
    ];

  echo json_encode($chart)
?>
