<?php

  include 'data.php';

  $type = $graphs["fatturato_by_agent"]["type"];
  $arr = $graphs["fatturato_by_agent"]["data"];
  $labels = [];
  $inc = [];

  foreach ($arr as $name => $sale) {

    $labels[] = $name;
    $inc[] = $sale;
  }

  $chart = [

    "type" => $type,
    "data" => [

      "labels" => $labels,
      "datasets" => [[

        "label" => "Incomings",
        "backgroundColor" => ["blue", "red", "green", "yellow", "black"],
        "borderColor" => "blue",
        "data" => $inc
        ]]
      ]
    ];

  echo json_encode($chart)

?>
