<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\House;
use App\Models\Query;
use App\Traits\Avatar;
use Illuminate\Http\Client\Request;

class MotaadminController extends Controller
{
	use Avatar;
	    // Dashboard
    public function dashboard_1()
    {
      
     
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $logo = "images/icon.png";
        $logoText = "images/logo-text.png";
        $active="active";
        $action = __FUNCTION__;
		
        return view('dashboard.index', compact('page_title', 'page_description','action','logo','logoText'));
    }
    
      // Dashboard-2
    public function dashboard_2()
    {
      
     
        $page_title = 'Dashboard 2';
        $page_description = 'Some description for the page';
        $logo = "images/logo-white.png";
        $logoText = "images/logo-text.png";
        $active="active";
        $action = __FUNCTION__;
		
        return view('dashboard.index2', compact('page_title', 'page_description','action','logo','logoText'));
    }
    
      // Dashboard-3
    public function dashboard_3()
    {
      
     
        $page_title = 'Dashboard 3';
        $page_description = 'Some description for the page';
        $logo = "images/icon.png";
        $logoText = "images/logo-text-white.png";
        $active="active";
        $action = __FUNCTION__;
		
        return view('dashboard.index3', compact('page_title', 'page_description','action','logo','logoText'));
    }
    
      // Dashboard-3
    public function dashboard_4()
    {
      
     
        $page_title = 'Dashboard 4';
        $page_description = 'Some description for the page';
        $logo = "images/logo-white.png";
        $logoText = "images/logo-text-white.png";
        $active="active";
        $action = __FUNCTION__;
		
        return view('dashboard.index4', compact('page_title', 'page_description','action','logo','logoText'));
    }
	    // Calender
    public function app_calender()
    {
        $page_title = 'Calender';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('app.calender', compact('page_title', 'page_description','action'));
    }
    
	    // Profile
    public function profile()
    {
        $page_title = 'Profile';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('def.profile', compact('page_title', 'page_description','action'));
    }
	    // Profile Details
    public function profile_details(Request $request)
    {
        if ($request->hasFile('avatar')){

            $avatar = $request->File('avatar');
            
            $this->uploadavatar($avatar);
        }
        return redirect()->route('profile');
    }
	
	    // Chart Chartist
    public function chart_chartist()
    {
        $page_title = 'Chart Chartist';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;

        return view('chart.chartist', compact('page_title', 'page_description','action'));
    }
	
	    // Chart Chartjs
    public function chart_chartjs()
    {
        $page_title = 'Chart Chartjs';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('chart.chartjs', compact('page_title', 'page_description','action'));
    }
	
	    // Chart Flot
    public function chart_flot()
    {
        $page_title = 'Chart Flot';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('chart.flot', compact('page_title', 'page_description','action'));
    }
	
	    // Chart Morris
    public function chart_morris()
    {
        $page_title = 'Chart Morris';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('chart.morris', compact('page_title', 'page_description','action'));
    }
	
	    // Chart Peity
    public function chart_peity()
    {
        $page_title = 'Chart Peity';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('chart.peity', compact('page_title', 'page_description','action'));
    }
	
	    // Chart Sparkline
    public function chart_sparkline()
    {
        $page_title = 'Chart Sparkline';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('chart.sparkline', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Checkout
    public function ecom_checkout()
    {
        $page_title = 'Checkout';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('ecom.checkout', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Customers
    public function ecom_customers()
    {
        $page_title = 'Ecom Customers';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ecom.customers', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Invoice
    public function ecom_invoice()
    {
        $page_title = 'Invoice';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ecom.invoice', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Product Detail
    public function ecom_product_detail()
    {
        $page_title = 'Product Detail';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ecom.productdetail', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Product Grid
    public function ecom_product_grid()
    {
        $page_title = 'Product Grid';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ecom.productgrid', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Product List
    public function ecom_product_list()
    {
        $page_title = 'Product List';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ecom.productlist', compact('page_title', 'page_description','action'));
    }
	
	    // Ecommerce Product Order
    public function ecom_product_order()
    {
        $page_title = 'Product Order';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ecom.productorder', compact('page_title', 'page_description','action'));
    }
	
	    // Email Compose
    public function email_compose()
    {
        $page_title = 'Compose';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('message.compose', compact('page_title', 'page_description','action'));
    }
	
	    // Email Inbox
    public function email_inbox()
    {
        $page_title = 'Inbox';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('message.inbox', compact('page_title', 'page_description','action'));
    }
	
	    // Email Read
    public function email_read()
    {
        $page_title = 'Read';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('message.read', compact('page_title', 'page_description','action'));
    }
	
	    // Form Editor Summernote
    public function form_editor_summernote()
    {
        $page_title = 'Summernote Editor';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('form.editorsummernote', compact('page_title', 'page_description','action'));
	}
	
	    // Form Element
    public function form_element()
    {
        $page_title = 'Form Element';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('form.element', compact('page_title', 'page_description','action'));
    }

	    // Form Pickers
    public function form_pickers()
    {
        $page_title = 'Form Pickers';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('form.pickers', compact('page_title', 'page_description','action'));
    }
	
	    // Form Validation Jquery
    public function form_validation_jquery()
    {
        $page_title = 'Form Validation';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('form.validationjquery', compact('page_title', 'page_description','action'));
    }
	
	    // Form Wizard
    public function form_wizard()
    {
        $page_title = 'Form Wizard';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('form.wizard', compact('page_title', 'page_description','action'));
    }
    
    	
	    // Map Jqvmap
    public function map_jqvmap()
    {
        $page_title = 'Map Jqvmap';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('map.jqvmap', compact('page_title', 'page_description','action'));
    }
	
	    // Page Error 400
    public function page_error_400()
    {
        $page_title = 'Page Error 400';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('page.error400', compact('page_title', 'page_description','action'));
    }
	
	    // Page Error 403
    public function page_error_403()
    {
        $page_title = 'Page Error 403';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('page.error403', compact('page_title', 'page_description','action'));
    }
	
	    // Page Error 404
    public function page_error_404()
    {
        $page_title = 'Page Error 404';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('page.error404', compact('page_title', 'page_description','action'));
    }
	
	    // Page Error 500
    public function page_error_500()
    {
        $page_title = 'Page Error 500';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('page.error500', compact('page_title', 'page_description','action'));
    }
	
	    // Page Error 503
    public function page_error_503()
    {
        $page_title = 'Page Error 503';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('page.error503', compact('page_title', 'page_description','action'));
    }
	
	    // Page Forgot Password
    public function page_forgot_password()
    {
        $page_title = 'Page Forgot Password';
        $page_description = 'Some description for the page';
        
        $action = __FUNCTION__;

        return view('page.forgot_password', compact('page_title', 'page_description','action'));
    }
	
	    // Page Lock Screen
    public function page_lock_screen()
    {
        $page_title = 'Page Lock Screen';
        $page_description = 'Some description for the page';
		
        $action = __FUNCTION__;

        return view('page.lockscreen', compact('page_title', 'page_description','action'));
    }
	
	    // Page Login
    public function page_login()
    {
        $page_title = 'Page Login';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('page.login', compact('page_title', 'page_description','action'));
    }
	
	    // Page Register
    public function page_register()
    {
        $page_title = 'Page Register';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('page.register', compact('page_title', 'page_description','action'));
    }
	
    //Tables
	    // Table Bootstrap Basic
    public function table_bootstrap_basic()
    {
        $page_title = 'Table Basic';
        $page_description = 'Some description for the page';
        $action = __FUNCTION__;
        return view('table.bootstrapbasic', compact('page_title', 'page_description','action'));
    }
	
	    // Properties
    public function table_properties()
    {
        $page_title = 'Properties';
        $page_description = 'Some description for the page';
        $houses = House::all();

		
		$action = "datatables";

        return view('def.propertiesTable', compact('page_title', 'page_description','action','houses'));
    }
        
        // Queries
    public function table_queries()
    {
        $page_title = 'Queries';
        $page_description = 'Some description for the page';
        $queries = Query::all();

		
		$action = "datatables";

        return view('table.queriesTable', compact('page_title', 'page_description','action','queries'));
    }
	    // UC Nestable.
    public function uc_nestable()
    {
        $page_title = 'Nestable';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('uc.nestable', compact('page_title', 'page_description','action'));
    }
	    // UC Lightgallery.
    public function uc_lightgallery()
    {
        $page_title = 'Lightgallery';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('uc.lightgallery', compact('page_title', 'page_description','action'));
    }
	
	    // UC NoUi Slider
    public function uc_noui_slider()
    {
        $page_title = 'Noui Slider';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('uc.nouislider', compact('page_title', 'page_description','action'));
    }
	
	    // UC Select2
    public function uc_select2()
    {
        $page_title = 'Select2';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('uc.select2', compact('page_title', 'page_description','action'));
    }
	
	    // UC Sweetalert
    public function uc_sweetalert()
    {
        $page_title = 'Sweetalert';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('uc.sweetalert', compact('page_title', 'page_description','action'));
    }
	
	    // UC Toastr
    public function uc_toastr()
    {
        $page_title = 'Toastr';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('uc.toastr', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Accordion
    public function ui_accordion()
    {
        $page_title = 'Accordion';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.accordion', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Alert
    public function ui_alert()
    {
        $page_title = 'Alert';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.alert', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Badge
    public function ui_badge()
    {
        $page_title = 'Badge';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.badge', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Button
    public function ui_button()
    {
        $page_title = 'Button';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.button', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Button Group
    public function ui_button_group()
    {
        $page_title = 'Button Group';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.buttongroup', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Card
    public function ui_card()
    {
        $page_title = 'Card';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.card', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Carousel
    public function ui_carousel()
    {
        $page_title = 'Carousel';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.carousel', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Dropdown
    public function ui_dropdown()
    {
        $page_title = 'Dropdown';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.dropdown', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Grid
    public function ui_grid()
    {
        $page_title = 'Grid';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.grid', compact('page_title', 'page_description','action'));
    }
	
	    // Ui List Group
    public function ui_list_group()
    {
        $page_title = 'List Group';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.listgroup', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Media Object
    public function ui_media_object()
    {
        $page_title = 'Media Object';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.mediaobject', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Modal
    public function ui_modal()
    {
        $page_title = 'Modal';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.modal', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Pagination
    public function ui_pagination()
    {
        $page_title = 'Pagination';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.pagination', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Popover
    public function ui_popover()
    {
        $page_title = 'Popover';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.popover', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Progressbar
    public function ui_progressbar()
    {
        $page_title = 'Progressbar';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.progressbar', compact('page_title', 'page_description','action'));
    }
	
	    // Ui Tab
    public function ui_tab()
    {
        $page_title = 'Tab';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.tab', compact('page_title', 'page_description','action'));
    }
	

	    // Ui Typography
    public function ui_typography()
    {
        $page_title = 'Typography';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('ui.typography', compact('page_title', 'page_description','action'));
    }
	
	    // Widget Basic
    public function widget_basic()
    {
        $page_title = 'Widget';
        $page_description = 'Some description for the page';
		
		$action = __FUNCTION__;

        return view('widget.widget_basic', compact('page_title', 'page_description','action'));
    }
}
