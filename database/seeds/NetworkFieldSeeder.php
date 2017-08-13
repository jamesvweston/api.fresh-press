<?php

use Illuminate\Database\Seeder;
use SoapBox\Formatter\Formatter;

class NetworkFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('network_fields')->insert(
            $this->getNetworkFields()
        );
    }

    private function getNetworkFields ()
    {
        //  select CONCAT('"', id, '","', label, '","', field, '","', network_id, '"' ) from network_fields;
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }

        $filePath = database_path() . '/seeds/CSVs/NetworkFields.csv';
        $string = file_get_contents($filePath);
        $string = str_replace("\n", "\r", $string);
        $formatter = Formatter::make($string, Formatter::CSV);
        $array = $formatter->toArray();

        return $array;
    }
}
