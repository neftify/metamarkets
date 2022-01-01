<?php

    function is_current_q($q) {
        $get = $_GET['q'];

        if($q==$get) {
            echo 'current';
        }
    }


	// menu function to identify the one we are located at 
	function is_this_menu_active($page) {
        global $request;

		if($page==$request) {
			echo 'text-gray-900 bg-gray-100 hover:bg-gray-100 focus:bg-gray-200';
		}
		else {
			echo 'text-gray-600 hover:bg-gray-50 focus:bg-gray-100';
		}
	}

    function show_message($close_button = false) {
        global $form_success, $form_error, $form_info, $form_alert;

       if(!empty($form_success)) {
           $type = 'green';
           $message = $form_success;
       }
       elseif(!empty($form_info)) {
           $type = 'blue';
           $message = $form_info;
       }
       elseif(!empty($form_alert)) {
        $type = 'orange';
        $message = $form_alert;
        }
       else {
           $type = 'red';
           $message = $form_error;
       }
   
       if(!empty($form_success) || !empty($form_error) || !empty($form_info) || !empty($form_alert)) {
?>
            <div class="bg-<?php echo $type; ?>-50 border-l-4 border-<?php echo $type; ?>-400 p-4" style="margin-bottom: 10px;">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-<?php echo $type; ?>-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 text-<?php echo $type; ?>-700">
                            <span class="mr-1"><?php echo $message; ?></span>
                        </p>
                    </div>
                    <?php
                        if($close_button) {
                    ?>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button class="inline-flex rounded-md p-1.5 text-<?php echo $type; ?>-500 hover:bg-<?php echo $type; ?>-100 focus:outline-none focus:bg-<?php echo $type; ?>-100 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

<?php
        }
    }

    function show_bottom_banner($message, $close_button = true) {
?>

            <div class="fixed bottom-0 inset-x-0 pb-2 sm:pb-5" id="banner-block">
                <div class="max-w-screen-xl mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
                        <div class="flex items-center justify-between flex-wrap">
                            <div class="w-0 flex-1 flex items-center">
                                <span class="flex p-2 rounded-lg bg-indigo-800">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                </span>
                                <p class="ml-3 font-medium text-white truncate">
                                    <span class="md:inline"><?php echo $message; ?></span>
                                </p>
                            </div>
                            <?php
                                if($close_button) {
                            ?>
                            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                                <button id="close-banner" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 transition ease-in-out duration-150" type="button" aria-label="Dismiss">
                                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
    }
?>