<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

/*************************************    Website       **************************************************/

Route::group([ 'namespace' => 'Website'], function () {
	
	Route::get('/about_us', 'WebsiteHomeController@aboutUs');
	
	Route::get('/', 'WebsiteHomeController@landingPage');
	Route::get('/product_page/{category_id}', 'WebsiteHomeController@productPage');
	Route::get('/product_details_page/{product_id}', 'WebsiteHomeController@productDetailsPage');
	Route::get('/product_page_for_programs/{program_id}/{dish_type}', 'WebsiteHomeController@productPageForPrograms');
	Route::get('/product_details_page_for_programs/{package_id}/{dish_type}', 'WebsiteHomeController@productDetailsPageForPrograms');
	Route::get('/get_sub_categories', 'WebsiteHomeController@getSubCategories');
	Route::get('/get_sub_category_products', 'WebsiteHomeController@getSubCategoryProducts');
	Route::post('/get_package_details', 'WebsiteHomeController@getPackageDetails');
	Route::get('/cart_checkout_info_page', 'WebsiteHomeController@cartCheckoutInfoPage');
	Route::get('/create_custom_menu/{program_id}/{dish_type}', 'WebsiteHomeController@createCustomMenu');
	Route::get('/gallery', 'WebsiteHomeController@gallery');
	Route::get('/menu_book', 'WebsiteHomeController@menuBook');
	Route::get('/career', 'WebsiteHomeController@career');
	Route::post('/submit_cv', 'WebsiteHomeController@submitCv');
	Route::get('/contact_us', 'WebsiteHomeController@contactUs');
	Route::post('/submit_query', 'WebsiteHomeController@submitQuery');
	Route::get('/searchProduct', 'SearchController@search');
	Route::get('/getSuggestion', 'SearchController@autoCompleteSuggestion');
	
});


/***************************************     END     *******************************************************/


/************************************************************************************************************/
/************************************  Cart Routes Start   ***************************************************/
/************************************************************************************************************/


/************* Products **********************/
Route::post('/add-to-cart',[
	'uses'	=> 'CartController@getAddToCart',
	'as'	=> 'product.addToCart'
]);

/**** update cart product *****/

Route::get('/update-add-to-cart/{id}',[
	'uses'	=> 'CartController@getUpdateAddToCart',
	'as'	=> 'product.updateAddToCart'
]);

Route::get('/update-subtract-to-cart/{id}',[
	'uses'	=> 'CartController@getUpdateSubtractToCart',
	'as'	=> 'product.updateSubtractToCart'
]);

Route::post('/update-change-to-cart',[
	'uses'	=> 'CartController@getUpdateChangeToCart',
	'as'	=> 'product.updateChangeToCart'
]);

/*****************************/

Route::get('/remove-from-cart/{id}/{redirect_page}',[
	'uses'	=> 'CartController@getRemoveFromCart',
	'as'	=> 'product.removeFromCart'
]);

Route::get('/shopping-cart',[
	'uses'	=> 'CartController@getCart',
	'as'	=> 'product.shoppingCart'
]);

Route::get('/checkout',[
	'uses'	=> 'CartController@getCheckout',
	'as'	=> 'checkout'
]);

Route::post('/checkout',[
	'uses'	=> 'CartController@postCheckout',
	'as'	=> 'checkout'
]);

Route::get('/delivery-confirmation/{order_id}',[
	'uses'	=> 'CartController@deliveryConfirmation',
	'as'	=> 'deliveryConfirmation'
]);

/************* END **********************/

/************* Packages **********************/


Route::post('/add-package-to-cart',[
	'uses'	=> 'CartController@getAddPackageToCart',
	'as'	=> 'package.addPackageToCart'
]);


Route::get('/remove-package-from-cart/{id}/{quantity}/{package_price}/{redirect_page}',[
	'uses'	=> 'CartController@getRemovePackageFromCart',
	'as'	=> 'package.removeFromCart'
]);


Route::get('/update-package-add-to-cart/{id}/{package_price}',[
	'uses'	=> 'CartController@getUpdatePackageAddToCart',
	'as'	=> 'package.updateAddToCart'
]);

Route::get('/update-package-subtract-to-cart/{id}/{package_price}',[
	'uses'	=> 'CartController@getUpdatePackageSubtractToCart',
	'as'	=> 'package.updateSubtractToCart'
]);

Route::post('/update-package-change-to-cart',[
	'uses'	=> 'CartController@getUpdatePackageChangeToCart',
	'as'	=> 'package.updateChangeToCart'
]);

/************* END **********************/

/************* Custom Menu **********************/


Route::post('/add-custom-menu-to-cart',[
	'uses'	=> 'CartController@getAddCustomMenuToCart',
	'as'	=> 'custom-menu.addCustomMenuToCart'
]);

Route::get('/remove-custom-menu-from-cart/{id}/{quantity}/{custom_price}/{redirect_page}',[
	'uses'	=> 'CartController@getRemoveCustomMenuFromCart',
	'as'	=> 'custom-menu.removeFromCart'
]);

Route::get('/update-custom-menu-add-to-cart/{id}/{custom_menu_price}',[
	'uses'	=> 'CartController@getUpdateCustomMenuAddToCart',
	'as'	=> 'custom-menu.updateAddToCart'
]);

Route::get('/update-custom-menu-subtract-to-cart/{id}/{custom_menu_price}',[
	'uses'	=> 'CartController@getUpdateCustomMenuSubtractToCart',
	'as'	=> 'custom-menu.updateSubtractToCart'
]);

Route::post('/update-custom-menu-change-to-cart',[
	'uses'	=> 'CartController@getUpdateCustomMenuChangeToCart',
	'as'	=> 'custom-menu.updateChangeToCart'
]);


/************* END **********************/


/************************************************************************************************************/
/************************************        END          ***************************************************/
/************************************************************************************************************/


/*************************************** Website-User     **************************************************/

Route::group([ 'namespace' => 'Website_User'], function () {
	Route::get('/user_account', 'WebsiteUserController@userAccount');
	Route::get('/personal_information', 'WebsiteUserController@personalInformation');
	Route::get('/address_book', 'WebsiteUserController@addressBook');
	Route::get('/my_order', 'WebsiteUserController@myOrder');
	Route::post('/change_account_informations', 'WebsiteUserController@changeAccountInformations');
	Route::get('/change_user_password_form', 'WebsiteUserController@changeUserPasswordForm');
	Route::post('/change_user_password', 'WebsiteUserController@changeUserPassword');
	Route::get('/change_user_address_form', 'WebsiteUserController@changeUserAddressForm');
	Route::post('/change_delivery_address', 'WebsiteUserController@changeDeliveryAddress');
	Route::get('/get_user_orders', 'WebsiteUserController@getUserOrders');
	Route::get('/view_order_details/{order_id}', 'WebsiteUserController@viewOrderDetails');
});

/***************************************     END     *******************************************************/

/***************************************     Admin   *******************************************************/

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	//Products
	Route::get('/all_products', 'Admin\AdminProductsController@allProducts')->name('admin.all-products');
	Route::get('/add_new_product_form', 'Admin\AdminProductsController@addNewProductForm')->name('admin.add-new-product-form');
	Route::post('/create_product', 'Admin\AdminProductsController@createProduct')->name('admin.create-product');
	Route::get('/delete_product/{product_id}', 'Admin\AdminProductsController@deleteProduct')->name('admin.delete-product');
	Route::post('/update_product', 'Admin\AdminProductsController@updateProduct')->name('admin.update-product');
	Route::get('/add_product_gallery_images/{product_id}', 'Admin\AdminProductsController@addProductGalleryImages')->name('admin.add-product-gallery-images');
	Route::get('/view_product_gallery_images/{product_id}', 'Admin\AdminProductsController@viewProductGalleryImages')->name('admin.view-product-gallery-images');
	Route::post('/delete_product_gallery_image', 'Admin\AdminProductsController@deleteProductGalleryImage')->name('admin.delete-product-gallery-image');
	Route::post('/update_product_gallery_image', 'Admin\AdminProductsController@updateProductGalleryImage')->name('admin.update-product-gallery-image');
	Route::post('/upload_product_gallery_images', 'Admin\AdminProductsController@uploadProductGalleryImages')->name('admin.upload-product-gallery-images');
	Route::post('/upload_product_gallery_full_images', 'Admin\AdminProductsController@uploadProductGalleryFullImages')->name('admin.upload-product-gallery-full-images');
	//Banner Sliders
	Route::get('/add_new_banner_slider_form', 'Admin\AdminBannerSlidersController@addNewBannerSliderForm')->name('admin.add-new-banner-slider-form');
	Route::post('/create_banner_slider', 'Admin\AdminBannerSlidersController@createBannerSlider')->name('admin.create-banner-slider');
	Route::get('/banner_sliders_list', 'Admin\AdminBannerSlidersController@bannerSlidersList')->name('admin.banner-sliders-list');
	Route::get('/edit_banner_slider_form/{banner_slider_id}', 'Admin\AdminBannerSlidersController@editBannerSliderForm')->name('admin.edit-banner-slider-form');
	Route::post('/update_banner_slider', 'Admin\AdminBannerSlidersController@updateBannerSlider')->name('admin.update-banner-slider');
	Route::post('/delete_banner_slider', 'Admin\AdminBannerSlidersController@deleteBannerSlider')->name('admin.delete-banner-slider');
	//Category
	Route::get('/category_list', 'Admin\AdminProductsController@categoryList')->name('admin.category-list');
	Route::get('/add_new_category_form', 'Admin\AdminProductsController@addNewCategoryForm')->name('admin.add-new-category-form');
	Route::post('/create_category', 'Admin\AdminProductsController@createCategory')->name('admin.create-category');
	Route::post('/delete_category', 'Admin\AdminProductsController@deleteCategory')->name('admin.delete-category');
	Route::get('/edit_category_form/{category_id}', 'Admin\AdminProductsController@editCategoryForm')->name('admin.edit-category-form');
	Route::post('/update_category', 'Admin\AdminProductsController@updateCategory')->name('admin.update-category');
	Route::get('/get_sub_category_list', 'Admin\AdminProductsController@getSubCategoryList')->name('admin.get-sub-category-list');
	//Tags
	Route::get('/tags', 'Admin\AdminProductsController@tags')->name('admin.tags');
	Route::post('/create_tag', 'Admin\AdminProductsController@createTag')->name('admin.create-tag');
	Route::post('/delete_tag', 'Admin\AdminProductsController@deleteTag')->name('admin.delete-tag');
	Route::get('/edit_tag_form/{tag_id}', 'Admin\AdminProductsController@editTagForm')->name('admin.edit-tag-form');
	Route::post('/update_tag', 'Admin\AdminProductsController@updateTag')->name('admin.update-tag');
	//Program
	Route::get('/program_list', 'Admin\AdminProgramsController@programList')->name('admin.program-list');
	Route::get('/add_new_program', 'Admin\AdminProgramsController@addNewProgram')->name('admin.add-new-program');
	Route::post('/create_program', 'Admin\AdminProgramsController@createProgram')->name('admin.create-program');
	Route::post('/delete_program', 'Admin\AdminProgramsController@deleteProgram')->name('admin.delete-program');
	Route::get('/edit_program_form/{program_id}', 'Admin\AdminProgramsController@editProgramForm')->name('admin.edit-program-form');
	Route::post('/update_program', 'Admin\AdminProgramsController@updateProgram')->name('admin.update-program');
	//Package
	Route::get('/package_list', 'Admin\AdminPackagesController@packageList')->name('admin.package-list');
	Route::get('/add_new_package', 'Admin\AdminPackagesController@addNewPackage')->name('admin.add-new-package');
	Route::post('/create_package', 'Admin\AdminPackagesController@createPackage')->name('admin.create-package');
	Route::post('/get_packages_for_program', 'Admin\AdminPackagesController@getPackagesForProgram')->name('admin.packages-for-programs');
	Route::get('/get_packages_list_for_program/{program_id}', 'Admin\AdminPackagesController@getPackagesListForProgram')->name('admin.package-list-for-program');
	Route::post('/update_package_information', 'Admin\AdminPackagesController@updatePackageInformation')->name('admin.update-package-information');
	Route::post('/delete_package', 'Admin\AdminPackagesController@deletePackage')->name('admin.delete-package');
	Route::get('/get_products_for_package/{package_id}', 'Admin\AdminPackagesController@getProductsForPackage')->name('admin.get-products-for-package');
	Route::post('/change_product_for_package', 'Admin\AdminPackagesController@changeProductForPackage')->name('admin.change-product-for-package');
	Route::post('/remove_product_from_package', 'Admin\AdminPackagesController@removeProductFromPackage')->name('admin.remove-product-from-package');
	Route::post('/add_product_for_package', 'Admin\AdminPackagesController@addProductForPackage')->name('admin.add-product-for-package');
	//Orders
	Route::get('/view_order_details/{order_id}', 'Admin\AdminController@viewOrderDetails')->name('admin.view-order-details');
	//Gallery
	Route::get('/upload_image_form', 'Admin\AdminGalleryController@uploadImageForm')->name('admin.upload-image-form');
	Route::post('/upload_gallery_image', 'Admin\AdminGalleryController@uploadGalleryImage')->name('admin.upload-gallery-image');
	Route::get('/upload_video_form', 'Admin\AdminGalleryController@uploadVideoForm')->name('admin.upload-video-form');
	Route::post('/upload_gallery_video', 'Admin\AdminGalleryController@uploadGalleryVideo')->name('admin.upload-gallery-video');
	Route::get('/view_gallery_list', 'Admin\AdminGalleryController@viewGalleryList')->name('admin.view-gallery-list');
	Route::post('/update_gallery_image', 'Admin\AdminGalleryController@updateGalleryImage')->name('admin.update-gallery-image');
	Route::post('/update_gallery_video', 'Admin\AdminGalleryController@updateGalleryVideo')->name('admin.update-gallery-video');
	Route::post('/delete_gallery_image', 'Admin\AdminGalleryController@deleteGalleryImage')->name('admin.delete-gallery-image');
	Route::post('/delete_gallery_video', 'Admin\AdminGalleryController@deleteGalleryVideo')->name('admin.delete-gallery-video');
	
	//Clients (Company/Partners)
    Route::get('/clientList', 'Admin\AdminClientController@clientList')->name('admin.client-list');
    Route::get('/addclient', 'Admin\AdminClientController@addClient')->name('admin.add-client');
    Route::post('/editclient', 'Admin\AdminClientController@editClient')->name('admin.edit-client');
    Route::get('/deleteClient/{id}', 'Admin\AdminClientController@deleteClient')->name('admin.delete-client');
    Route::post('/submitclientinfo', 'Admin\AdminClientController@submitClientInfo')->name('admin.submit-client-info');
	
	//Registered Clients (Customers)
	Route::get('/view_registered_clients_list', 'Admin\AdminClientController@viewRegisteredClientsList')->name('admin.view-registered-clients-list');
	Route::get('/view_registered_clients_orders_list/{user_id}', 'Admin\AdminClientController@viewRegisteredClientsOrdersList')->name('admin.view-registered-clients-orders-list');
	Route::get('/view_registered_clients_order_details/{order_id}/{user_id}', 'Admin\AdminClientController@viewRegisteredClientsOrderDetails')->name('admin.view-registered-clients-orders-details');
	
	//Unregistered Clients (Customers)
	Route::get('/view_unregistered_clients_list', 'Admin\AdminClientController@viewUnregisteredClientsList')->name('admin.view-unregistered-clients-list');
	Route::get('/view_unregistered_clients_orders_details/{primary_id}', 'Admin\AdminClientController@viewUnregisteredClientsOrdersDetails')->name('admin.view-unregistered-clients-orders-details');
	
	
	//Curriculum Vitae
	Route::get('/cv_job_list', 'Admin\AdminCurriculumVitaeController@cvJobList')->name('admin.view-cv-job-list');
	Route::get('/view_cv_details/{id}', 'Admin\AdminCurriculumVitaeController@viewCvDetails')->name('admin.view-cv-details');
	
});

/***************************************      END     *******************************************************/