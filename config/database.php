<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "isatojt";
// Create database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function save($table, $data)
{
    global $conn;
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param(str_repeat("s", count($data)), ...array_values($data));
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
//sample save('table_name',['column1' => 'value1', 'column2' => 'value2']);
//sample save in data  save('table_name',$data);

function update($table, $id, $data)
{
    global $conn;
    $id_column = array_keys($id)[0];
    $id_value = array_values($id)[0];
    $set = implode(", ", array_map(function ($column) {
        return "$column = ?";
    }, array_keys($data)));
    $sql = "UPDATE $table SET $set WHERE $id_column = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        return false;
    }
    $values = array_values($data);
    array_push($values, $id_value);
    $stmt->bind_param(str_repeat("s", count($data)) . "i", ...$values);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


//sample update('users', ['id' => $id], ['username' => $username]);


function delete($table, $conditions)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE ";
    $params = [];
    foreach ($conditions as $column => $value) {
        $sql .= "$column = ? AND ";
        $params[] = $value;
    }
    $sql = substr($sql, 0, -4);
    $stmt = mysqli_prepare($conn, $sql);
    $types = str_repeat("s", count($params));
    $stmt->bind_param($types, ...$params);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
//sample delete('tablename', ['id' => $id]);

function find($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";
    $params = [];
    foreach ($conditions as $column => $value) {
        $sql .= "$column = ? AND ";
        $params[] = $value;
    }
    $sql = substr($sql, 0, -4);
    $stmt = mysqli_prepare($conn, $sql);
    $types = str_repeat("s", count($params));
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
// usage example: find('tablename', ['username' => $username]);
function findAll($table)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
//sample findAll('table_name')

function find_where($table, $columns_and_values)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";
    $params = [];
    $types = "";
    $i = 0;
    foreach ($columns_and_values as $column => $value) {
        $sql .= "$column = ? ";
        $params[] = &$columns_and_values[$column];
        $types .= "s";
        if (++$i !== count($columns_and_values)) {
            $sql .= "AND ";
        }
    }
    $stmt = mysqli_prepare($conn, $sql);
    array_unshift($params, $types);
    call_user_func_array(array($stmt, "bind_param"), $params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

//sample find_where('table_name', ['column'=>$username]);

function first($table, $columns_and_values)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE ";
    $params = [];
    $types = "";
    $i = 0;
    foreach ($columns_and_values as $column => $value) {
        $sql .= "$column = ? ";
        $params[] = &$columns_and_values[$column];
        $types .= "s";
        if (++$i !== count($columns_and_values)) {
            $sql .= "AND ";
        }
    }
    $sql .= "LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    array_unshift($params, $types);
    call_user_func_array(array($stmt, "bind_param"), $params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
//sample $first = first('users', ['username'=>$username]);  return the first value find
function whereNotIn($table, $column, $values)
{
    global $conn;
    $placeholders = implode(',', array_fill(0, count($values), '?'));
    $sql = "SELECT * FROM $table WHERE $column NOT IN ($placeholders)";
    $stmt = mysqli_prepare($conn, $sql);
    $types = str_repeat("s", count($values));
    array_unshift($values, $types);
    call_user_func_array(array($stmt, "bind_param"), makeValuesReferenced($values));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
//sample $data = whereNotIn($table, 'column_name', ['value1', 'value2', 'value3']);
function makeValuesReferenced($arr)
{
    $refs = array();
    foreach ($arr as $key => $value)
        $refs[$key] = &$arr[$key];
    return $refs;
}

// function joinTable($table, $joins, $conditions = [])
// {
//     global $conn;
//     $query = "SELECT * FROM $table";
//     foreach ($joins as $join) {
//         $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
//     }
//     if (!empty($conditions)) {
//         $where_clauses = array();
//         $params = array();
//         foreach ($conditions as $column => $value) {s
//             $where_clauses[] = "$column = ?";
//             $params[] = $value;
//         }
//         $query .= " WHERE " . implode(" AND ", $where_clauses);
//         $stmt = mysqli_prepare($conn, $query);
//         $types = str_repeat("s", count($params));
//         $stmt->bind_param($types, ...$params);
//     } else {
//         $stmt = mysqli_prepare($conn, $query);
//     }
//     $stmt->execute();
//     $result = $stmt->get_result();
//     return mysqli_fetch_all($result, MYSQLI_ASSOC);
// }

//sample $result = join("users", [["departments", "users.department_id", "departments.department_id"]], ["users.name" => "John Doe"]);
//$result = join("users", [["departments", "users.department_id", "departments.department_id"]]);

function joinTable($table, $joins, $conditions = [])
{
    global $conn;
    $query = "SELECT * FROM $table";
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            $where_clauses[] = "$column = ?";
            $params[] = $value;
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
        $stmt = mysqli_prepare($conn, $query);
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function joinTableDistinct($table, $joins, $conditions = [])
{
    global $conn;
    $query = "SELECT DISTINCT * FROM $table"; // Add DISTINCT keyword
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            $where_clauses[] = "$column = ?";
            $params[] = $value;
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
        $stmt = mysqli_prepare($conn, $query);
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function joinTableDistinctByID($table, $joins, $conditions = [])
{
    global $conn;
    $query = "SELECT DISTINCT * FROM $table"; // Add DISTINCT keyword
    foreach ($joins as $join) {
        $query .= " INNER JOIN $join[0] ON $join[1] = $join[2]";
    }
    if (!empty($conditions)) {
        $where_clauses = array();
        $params = array();
        foreach ($conditions as $column => $value) {
            $where_clauses[] = "$column = ?";
            $params[] = $value;
        }
        $query .= " WHERE " . implode(" AND ", $where_clauses);
        $stmt = mysqli_prepare($conn, $query);
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        $stmt = mysqli_prepare($conn, $query);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[$row['user_ID']] = $row; // Use user_ID as the key to ensure distinct values
    }
    return array_values($rows); // Return only the values (distinct rows)
}
