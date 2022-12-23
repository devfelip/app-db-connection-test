<?php

namespace App\Http\Controllers;

use App\Models\MainModel;
use App\Http\Requests\StoreMainModelRequest;
use App\Http\Requests\UpdateMainModelRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MainModelController extends Controller
{
    public function index()
    {       
        return view('index');
    }

    public function populate_select_tables($conn, $host, $port, $db, $username, $password, $schema)
    {
        config(['database.default' => $conn]);
        config(['database.connections.pgsql.host' => $host]);
        config(['database.connections.pgsql.port' => $port]);
        config(['database.connections.pgsql.database' => $db]);
        config(['database.connections.pgsql.username' => $username]);
        config(['database.connections.pgsql.password' => $password]);

        return DB::connection()->select("SELECT table_name FROM information_schema.tables WHERE table_schema = '$schema'");
    }

    public function populate_select_schemas($conn, $host, $port, $db, $username, $password)
    {
        config(['database.default' => $conn]);
        config(['database.connections.pgsql.host' => $host]);
        config(['database.connections.pgsql.port' => $port]);
        config(['database.connections.pgsql.database' => $db]);
        config(['database.connections.pgsql.username' => $username]);
        config(['database.connections.pgsql.password' => $password]);

        return DB::connection()->select("SELECT DISTINCT table_schema FROM information_schema.tables ORDER BY table_schema");
    }
}
