<?php

  function guestChart() {

    include 'data.php';

    $lab = $_GET["label"];
    $type = $graphs["fatturato"]["type"];
    $inc = $graphs["fatturato"]["data"];

    $chart = [

      "type" => $type,
      "data" => [

        "labels" => $lab,
        "datasets" => [[

          "label" => "Incomings",
          "backgroundColor" => ["blue", "red", "green", "yellow", "black"],
          "borderColor" => "blue",
          "data" => $inc
          ]]
        ]
      ];

    return $chart;
  }

  function employeeChart() {

    include 'data.php';

    $type1 = $graphs["fatturato_by_agent"]["type"];
    $arr1 = $graphs["fatturato_by_agent"]["data"];
    $labels = [];
    $inc1 = [];

    foreach ($arr1 as $name => $sale) {

      $labels[] = $name;
      $inc1[] = $sale;
    }

    $chart1 = [

    "type" => $type1,
    "data" => [

    "labels" => $labels,
    "datasets" => [[

    "label" => "Fatturato by agent",
    "backgroundColor" => ["blue", "red", "green", "yellow", "black"],
    "borderColor" => "blue",
    "data" => $inc1
    ]]
    ]
    ];

    return $chart1;
  }

  function clevelChart() {

    include 'data.php';

    $lab = $_GET["label"];
    $type2 = $graphs["team_efficiency"]["type"];
    $arr2 = $graphs["team_efficiency"]["data"];
    $labels1 = [];
    $inc2 = [];

    foreach ($arr2 as $name => $sale) {

      $labels1[] = $name;
      $inc2[] = $sale;
    }

    $chart2 = [

    "type" => $type2,
    "data" => [

    "labels" => $lab,
    "datasets" => [[

    "label" => $labels1[0],
    "backgroundColor" => "transparent",
    "borderColor" => "blue",
    "data" => $inc2[0]
    ],
    [

    "label" => $labels1[1],
    "backgroundColor" => "transparent",
    "borderColor" => "red",
    "data" => $inc2[1]
    ],
    [

    "label" => $labels1[2],
    "backgroundColor" => "transparent",
    "borderColor" => "green",
    "data" => $inc2[2]
    ]]
    ]
    ];

    return $chart2;
  }

  if ($_GET["access"]) {

    $access = $_GET["access"];

    if ($access == "guest") {

      $guest = [];

      $guest["guest"] = guestChart();

      echo json_encode($guest);
      } elseif ($access == "employee") {

        $employee = [];

        $employee["guest"] = guestChart();
        $employee["employee"] = employeeChart();

        echo json_encode($employee);
        }elseif ($access == "clevel") {

          $clevel = [];

          $clevel["guest"] = guestChart();
          $clevel["employee"] = employeeChart();
          $clevel["clevel"] = clevelChart();

          echo json_encode($clevel);
        }
  }else {

    $noAccess = "Devi specificarmi un livello di accesso!";
    echo json_encode($noAccess);
  }

?>
