<?php

return [

  "Data" => [
    "max_count" => 1,
    "elements" => [

      "Record" => [
        "max_count" => 2,
        "elements" => [

          "DIFFERENT" => [
            "max_count" => 1,
            "elements" => [

              "TITLE" => [
                "max_count" => 2
              ]

            ] // END DIFFERENT elements
          ],
          "SAMPLE" => [
            "max_count" => 2,
            "elements" => [

              "TITLE" => [
                "max_count" => 1
              ],
              "SUBTITLE" => [
                "max_count" => 1
              ],
              "AUTH" => [
                "max_count" => 2,
                "elements" => [

                  "FNAME" => [
                    "max_count" => 1
                  ],
                  "DISPLAY" => [
                    "max_count" => 1
                  ]

                ] // END AUTH elements
              ],
              "ABSTRACT" => [
                "max_count" => 1
              ]

            ] // END SAMPLE elements
          ]

        ] // END Record elements
      ]

    ]
  ]

];
