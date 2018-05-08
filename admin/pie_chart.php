<?php
/* Establish the database connection */
 $mysql =mysqli_connect("localhost", "root", "", "subdata");
 /* select all the tasks from the table piechart */
 $result = $mysql->query('SELECT details.Cuisine,count(*) AS No_of_dishes FROM details,dish WHERE dish.Dish_ID = details.d_id GROUP BY details.Cuisine');

$rows = array();
$table = array();
$table['cols'] = array(     array('label' => 'Cuisine', 'type' => 'string'),
                            array('label' => 'No_of_dishes', 'type' => 'number')
                       );
foreach($result as $r)
{
  $temp = array();

   // The following line will be used to slice the Pie chart

   $temp[] = array('v' => (string) $r['Cuisine']);

   // Values of the each slice

   $temp[] = array('v' => (int) $r['No_of_dishes']);

   //rows of side title
   $rows[] = array('c' => $temp);
 }
  $table['rows'] = $rows;

  // convert data into JSON format
  $jsonTable = json_encode($table);
  echo $jsonTable;

 ?>

 
