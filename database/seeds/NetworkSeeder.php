<?php

use Illuminate\Database\Seeder;
use SoapBox\Formatter\Formatter;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('networks')->insert(
            $this->getNetworks()
        );
    }

    private function getNetworks ()
    {
        //  select CONCAT('"', id, '","', label, '","', shorthand, '","', logo, '","', fmtc_network_id, '","', sub_id_key, '"' ) from networks;
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }

        $filePath = database_path() . '/seeds/CSVs/Networks.csv';
        $string = file_get_contents($filePath);
        $string = str_replace("\n", "\r", $string);
        $formatter = Formatter::make($string, Formatter::CSV);
        $array = $formatter->toArray();

        for ($i = 0; $i < sizeof($array); $i++)
        {
            if ($array[$i]['sub_id_key'] == 'null')
                $array[$i]['sub_id_key'] = null;

            if ($array[$i]['fmtc_network_id'] == 'null')
                $array[$i]['fmtc_network_id'] = null;

            $array[$i]['syncable']  = $array[$i]['syncable'] == 'true' ? true : false;
        }

        return $array;
    }
}
