<?php
use CodeIgniter\CodeIgniter;


/**
 * Read the value in the composer.json file
 * Note: NOT CURRENTLY BEING USED
 * @return mixed
 */
function cr_file(): mixed
{
    // Define the path to the composer.json file using the ROOTPATH constant
    $filePath = ROOTPATH . 'composer.json';

    // Check if the file exists before attempting to read it
    if (file_exists($filePath)) {
        // Read the file contents
        $jsonContents = file_get_contents($filePath);

        // Decode the JSON string into a PHP object
        $composerData = json_decode($jsonContents);

        // Optional: Decode into a PHP associative array instead of an object
        // $composerDataArray = json_decode($jsonContents, true);

        // You can now access the data, e.g., the "name" or "require" fields
        // echo "Project Name: " . $composerData->name;

        // Pass the data to a view to display it
        return $composerData;
    } else {
        // Handle the case where the file is not found
        return null;
    }
}


?>