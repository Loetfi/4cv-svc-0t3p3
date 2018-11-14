<?php
// http://localhost/acv-dev/datatable/laratables-demo/public/get-custom-column-datatables-data?draw=10&columns[0][data]=0&columns[0][name]=name&columns[0][searchable]=true&columns[0][orderable]=true&columns[0][search][value]=&columns[0][search][regex]=false&columns[1][data]=1&columns[1][name]=mobile&columns[1][searchable]=true&columns[1][orderable]=true&columns[1][search][value]=&columns[1][search][regex]=false&columns[2][data]=2&columns[2][name]=email&columns[2][searchable]=true&columns[2][orderable]=true&columns[2][search][value]=&columns[2][search][regex]=false&columns[3][data]=3&columns[3][name]=gender&columns[3][searchable]=true&columns[3][orderable]=true&columns[3][search][value]=&columns[3][search][regex]=false&columns[4][data]=4&columns[4][name]=country&columns[4][searchable]=true&columns[4][orderable]=true&columns[4][search][value]=&columns[4][search][regex]=false&columns[5][data]=5&columns[5][name]=action&columns[5][searchable]=false&columns[5][orderable]=false&columns[5][search][value]=&columns[5][search][regex]=false&order[0][column]=0&order[0][dir]=asc&start=0&length=10&search[value]=&search[regex]=false&_=1542113397426

namespace App\Http\Controllers;

use App\User;
// use App\Product;
use Freshbitsweb\Laratables\Laratables;
// use Freshbitsweb\Laratables\request;

class ListDataOTPController extends Controller
{
    /**
     * Show the datatables examples.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datatables.index');
    }

    /**
     * return data of the simple datatables.
     *
     * @return Json
     */
    public function getSimpleDatatablesData()
    {
        return Laratables::recordsOf(User::class);
    }

    /**
     * return data of the Custom columns datatables.
     *
     * @return Json
     */
    public function getCustomColumnDatatablesData()
    {
        return Laratables::recordsOf(User::class);
    }

    /**
     * return data of the relation columns datatables.
     *
     * @return Json
     */
    public function getRelationshipColumnDatatablesData()
    {
        return Laratables::recordsOf(Product::class);
    }

    /**
     * return data of the Extra data datatables attribute data.
     *
     * @return Json
     */
    public function getExtraDataDatatablesAttributesData()
    {
        return Laratables::recordsOf(User::class);
    }
}
