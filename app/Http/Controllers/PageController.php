<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdministrator()
    {
        return view('admin.basic_setting.administrator');
    }

    public function getGoodManager()
    {
        return view('admin.item_manager.goods_managermant');
    }

    public function getInventoryHistory()
    {
        return view('admin.item_manager.inventory_history');
    }

    public function getSupplier()
    {
        return view('admin.item_manager.supplier');
    }

    public function getProducer()
    {
        return view('admin.item_manager.producer');
    }

    public function getImportManager()
    {
        return view('admin.item_manager.import_manager');
    }

    public function getSizeManagement()
    {
        return view('admin.item_manager.size_manager');
    }

    public function getColorManagement()
    {
        return view('admin.item_manager.color_management');
    }

    public function getTaxAdministration()
    {
        return view('admin.item_manager.taxadministration');
    }


    public function getTotalEarning()
    {
        return view('admin.statistical.Total_earning_statistical');
    }

    public function getStatisticalInformation()
    {
        return view('admin.statistical.Statistical_infomation');
    }

    public function getStatisticCard()
    {
        return view('admin.statistical.Statistic_card');
    }

    public function getSaleSatistic()
    {
        return view('admin.statistical.Sale_statistics');
    }

    public function getCashStatistical()
    {
        return view('admin.statistical.Cash_statistical');
    }

    public function getListServicePackages()
    {
        return view('admin.basic_setting.list_of_service_packages');
    }

    public function create()
    {
        return view('admin.basic_setting.list_of_service_packages');
    }

    public function getRentalListings()
    {
        return view('admin.basic_setting.rental_listings');
    }

    public function getShopMannager()
    {
        return view('admin.shop_manager.shop_manager');
    }

    public function getStaffManagement()
    {
        return view('admin.staff-management.staff-management');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
