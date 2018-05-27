<?php
class Query{
    public static function conditions_this_month($field, $ym){
        if($ym === null){
            return [];
        }
        return  [
            "{$field} >= " => "{$ym}-01",
            "{$field} < " => date('Y-m-d', strtotime("{$ym}-01 + 1 month")),
            ];
    }

    public static function conditions_this_year($field, $year){
        return  [
            "{$field} >= " => "{$ym}-01",
            "{$field} < " => date('Y-m-d', strtotime("{$ym}-01 + 1 month")),
            ];
    }
}

?>