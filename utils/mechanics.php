<?php
require __DIR__ . '/config.php';

// {
//     "mechid": {
//         "type": "int",
//         "length": 11,
//         "attributes": "AUTO_INCREMENT",
//         "primary_key": true
//     },
//     "mechName": {
//         "type": "varchar",
//         "length": 500
//     },
//     "mechEmail": {
//         "type": "varchar",
//         "length": 200
//     },
//     "mechaddr": {
//         "type": "varchar",
//         "length": 500
//     },
//     "mechno": {
//         "type": "varchar",
//         "length": 11
//     },
//     "mechpwd": {
//         "type": "varchar",
//         "length": 100
//     },
//     "mech_services": {
//         "type": "varchar",
//         "length": 100
//     },
//     "mech_pfp": {
//         "type": "varchar",
//         "length": 100
//     },
//     "mech_cover": {
//         "type": "varchar",
//         "length": 100
//     },
//     "business_permit": {
//         "type": "varchar",
//         "length": 100
//     },
//     "acc_status": {
//         "type": "varchar",
//         "length": 100
//     }
// }
  
function getMechanics(): array
{
    global $connect;


    $query = "SELECT * FROM mechanics";

    $result = $connect->query($query);

    if ($result && $result->num_rows > 0) {
        $mechanics = $result->fetch_all(MYSQLI_ASSOC);
        return $mechanics;
    } else {
        echo $connect->error;
        return [];
    }
}

function addMechanic(array $mechanic): bool
{
    global $connect;

    $mechName = $connect->real_escape_string($mechanic['mechName']);
    $mechEmail = $connect->real_escape_string($mechanic['mechEmail']);
    $mechaddr = $connect->real_escape_string($mechanic['mechaddr']);
    $mechno = $connect->real_escape_string($mechanic['mechno']);
    $mechpwd = $connect->real_escape_string($mechanic['mechpwd']);
    $mech_services = $connect->real_escape_string($mechanic['mech_services']);
    $mech_pfp = $connect->real_escape_string($mechanic['mech_pfp']);
    $mech_cover = $connect->real_escape_string($mechanic['mech_cover']);
    $business_permit = $connect->real_escape_string($mechanic['business_permit']);
    $acc_status = $connect->real_escape_string($mechanic['acc_status']);

    $query = "INSERT INTO mechanics (mechName, mechEmail, mechaddr, mechno, mechpwd, mech_services, mech_pfp, mech_cover, business_permit, acc_status) VALUES ('$mechName', '$mechEmail', '$mechaddr', '$mechno', '$mechpwd', '$mech_services', '$mech_pfp', '$mech_cover', '$business_permit', '$acc_status')";

    $result = $connect->query($query);

    if ($result) {
        return true;
    } else {
        echo $connect->error;
        return false;
    }
}

//delete
function deleteMechanic(int $mechid): bool
{
    global $connect;

    $query = "DELETE FROM mechanics WHERE mechid = $mechid";

    $result = $connect->query($query);

    if ($result) {
        return true;
    } else {
        echo $connect->error;
        return false;
    }
}

function updateMechanic(int $mechid, string $mechName, string $mechEmail, string $mechaddr, 
    string $mechno, ?string $mechpwd = null, string $mech_services, ?string $mech_pfp = null, 
    ?string $mech_cover = null, ?string $business_permit = null, ?string $acc_status = null): bool
{
    global $connect;

    $mechName = $connect->real_escape_string($mechName);
    $mechEmail = $connect->real_escape_string($mechEmail);
    $mechaddr = $connect->real_escape_string($mechaddr);
    $mechno = $connect->real_escape_string($mechno);
    $mech_services = $connect->real_escape_string($mech_services);

    $updates = [
        "mechName = '$mechName'",
        "mechEmail = '$mechEmail'",
        "mechaddr = '$mechaddr'",
        "mechno = '$mechno'",
        "mech_services = '$mech_services'"
    ];

    if ($mechpwd !== null && $mechpwd !== '') {
        $mechpwd = $connect->real_escape_string($mechpwd);
        $updates[] = "mechpwd = '$mechpwd'";
    }

    if ($mech_pfp !== null) {
        $mech_pfp = $connect->real_escape_string($mech_pfp);
        $updates[] = "mech_pfp = '$mech_pfp'";
    }

    if ($mech_cover !== null) {
        $mech_cover = $connect->real_escape_string($mech_cover);
        $updates[] = "mech_cover = '$mech_cover'";
    }

    if ($business_permit !== null) {
        $business_permit = $connect->real_escape_string($business_permit);
        $updates[] = "business_permit = '$business_permit'";
    }

    if ($acc_status !== null) {
        $acc_status = $connect->real_escape_string($acc_status);
        $updates[] = "acc_status = '$acc_status'";
    }

    $updateStr = implode(', ', $updates);
    $query = "UPDATE mechanics SET $updateStr WHERE mechid = $mechid";

    $result = $connect->query($query);

    if ($result) {
        return true;
    } else {
        echo $connect->error;
        return false;
    }
}

