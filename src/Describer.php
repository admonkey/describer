<?php

namespace admonkey;
use Sabre\Xml\Reader;

class Describer
{

  private function stripNamespace($string){
    return preg_replace("/(.*})/", "", $string);
  }

  private function countArrayElements(&$array, &$result){

    $local_count = [];

    // get collection of subnodes
    foreach ($array as $node){

      $name = $this->stripNamespace($node['name']);

      // get count of distinct subnodes
      if (empty($local_count[$name]["max_count"])){
        $local_count[$name]["max_count"] = 1;
      } else {
        $local_count[$name]["max_count"]++;
      }

      if(empty($result[$name]["max_count"])){
        $result[$name]["max_count"] = $local_count[$name]["max_count"];
      } else {
        $result[$name]["max_count"] = max(
          $local_count[$name]["max_count"],
          $result[$name]["max_count"]
        );
      }

      if (is_array($node['value'])){
        $this->countArrayElements($node['value'], $result[$name]["elements"]);
      }

    }
  }

  public function describe($xml){

    $reader = new Reader();
    $reader->xml($xml);
    $array = $reader->parse();

    // get root node name
    $root = $this->stripNamespace($array['name']);
    $result[$root] = ["max_count" => 1];

    $this->countArrayElements($array['value'], $result[$root]["elements"]);

    // for debugging purposes
    print_r($result);

    return $result;

  }

}
