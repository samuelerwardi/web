<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * 	@author : CodesLab
 *  @support: support@codeslab.net
 * 	date	: 05 June, 2015
 * 	Easy Inventory
 * 	http://www.codeslab.net
 *  version: 1.0
 */

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('global_model');
    }

    /*     * * Dashboard ** */

    public function index() {
        $data['year'] = date('Y');


        // all information form admin
        // recent order
        $data['order_info'] = $this->dashboard_model->recently_added_order();
        //recently added product
        $data['product_info'] = $this->dashboard_model->recently_added_product();
        //total order
        $data['total_order'] = count($this->db->get('tbl_order')->result());
        //total invoice
        $data['total_invoice'] = count($this->db->get('tbl_invoice')->result());
        //total customer
        $data['total_customer'] = count($this->db->get('tbl_customer')->result());
        //total product
        $data['total_product'] = count($this->db->get('tbl_product')->result());
        //total buying, selling, tax
        //$data['total'] = $this->dashboard_model->get_revenue();
        //discount
        $data['discount'] = $this->dashboard_model->get_discount();

        // get yearly report
        $data['yearly_sales_report'] = $this->get_yearly_sales_report($data['year']);

        //total sales
        $data['sales_total'] = $this->dashboard_model->get_sales_total();
        $data['flag'] = 'flag';

        //get today sell
        $data['today_sale'] = $this->dashboard_model->get_today_sales();


        //get this year sales
        $data['yearly_sale'] = $this->dashboard_model->get_yearly_sales();

        //weekly Sales Report
        $data['weekly_sales'] = $this->dashboard_model->get_weekly_sales();



        //total revenue
        $first_day_this_month = date('Y-m-01');
        $last_day_this_month = date('Y-m-t');

        $invoiceList = $this->dashboard_model->get_invoice_by_date($first_day_this_month, $last_day_this_month);

        //best selling Product this year
        if (count($invoiceList)) {
            $order_id = array();
            foreach ($invoiceList as $item) {
                $order_id[] = $item->order_id;
            }

            $data['top_sell_product_month'] = $this->dashboard_model->get_top_selling_product($order_id);
        }


        if (!empty($invoiceList)) {
            foreach ($invoiceList as $invoice) {
                $order_id[] = $invoice->order_id;
            }
            $data['revenue'] = $this->dashboard_model->get_revenue($order_id);
            $data['profit'] = $this->dashboard_model->get_profit($order_id);
        }

//        echo '<pre>';
//        print_r($data['revenue'] );
//        print_r($data['profit'] );
//        exit();

        $data['quantity_sales'] = count($invoiceList);

        //stock value
        $stock = $this->dashboard_model->get_all_stock();

        //store
        $data['stock_value'] = 0;
        foreach ($stock as $item) {
            $product_inventory = $this->dashboard_model->get_product_inventory($item->product_id);
            $data['stock_value'] += $product_inventory->quantity * $item->buying_price;
        }

        $first_day_this_year = date('Y-01-01');
        $last_day_this_year = date('Y-12-31');

        $yearlyInvoiceList = $this->dashboard_model->get_invoice_by_date($first_day_this_year, $last_day_this_year);

        //best selling Product this year
        if (count($yearlyInvoiceList)) {
            $order_id = array();
            foreach ($yearlyInvoiceList as $item) {
                $order_id[] = $item->order_id;
            }

            $data['top_sell_product'] = $this->dashboard_model->get_top_selling_product($order_id);
        }


        $data['title'] = 'INVENTORI Sistem - Dashboard'; // title
        $data['subview'] = $this->load->view('admin/dashboard', $data, true); // sub view
        $this->load->view('admin/_layout_main', $data); // main page
    }

    /*     * * Get Yearly Report ** */

    public function get_yearly_sales_report($year) {

        for ($i = 1; $i <= 12; $i++) {
            if ($i >= 1 && $i <= 9) {
                $start_date = $year . '-' . '0' . $i . '-' . '01';
                $end_date = $year . '-' . '0' . $i . '/' . '31';
            } else {
                $start_date = $year . '-' . $i . '-' . '01';
                $end_date = $year . '-' . $i . '-' . '31';
            }
            $get_all_report[$i] = $this->dashboard_model->get_all_report_by_date($start_date, $end_date);
        }

        return $get_all_report;
    }

    /*     * * Login ** */

    public function login() {
        $data['title'] = 'Login';
        $this->load->view('admin/login');
    }

}
