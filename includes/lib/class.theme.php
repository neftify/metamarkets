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
			echo 'class="active"';
		}
		else {
			echo '';
		}
	}

    function show_message() {
        global $form_success, $form_error, $form_info, $form_alert;

       if(!empty($form_success)) {
           $type = 'success';
           $message = $form_success;
       }
       elseif(!empty($form_info)) {
           $type = 'notice';
           $message = $form_info;
       }
       elseif(!empty($form_alert)) {
        $type = 'warning';
        $message = $form_alert;
        }
       else {
           $type = 'error';
           $message = $form_error;
       }
   
       if(!empty($form_success) || !empty($form_error) || !empty($form_info) || !empty($form_alert)) {
?>

            <div class="notification <?php echo $type; ?> closeable" style="margin-top: 10px;">
				<p><?php echo $message; ?></p>
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